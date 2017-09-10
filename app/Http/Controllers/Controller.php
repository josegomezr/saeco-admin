<?php
/*
|-------------------------------------------------------------------------
| CONTROLADOR BASE
|-------------------------------------------------------------------------
|
| Este es el controlador base para todo el api, aplica globalmente los 
| middlewares (verlo como validaciones) a cada consulta en particular,
| y expone el método `listar_tabla_paginada_filtrada` para simplificar
| la creación de nuevos recursos.
|
| Todos los recursos que expondrá esta API serán recursos paginados.
|
*/
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    protected $parametros_reservados = ['page', '__asociar_lista', '__asociar', '__clave', '__no_paginar'];

    /**
     * Constructor
     *
     * Establece los middleware para autenticación y filtrado de ips.
     */
    function __construct()
    {
        // $this->middleware('lista-blanca-ip');
        // $this->middleware('autenticacion-api-token');
    }

    /**
     * per_page
     *
     * Fija la cantidad de elementos por página.
     */
    public $per_page = 30;

    /**
     * listar_tabla_paginada_filtrada
     *
     * Realiza una consulta SQL a una tabla, acepta una configuración para
     * paginar y filtrar los resultados.
     *
     * @param  string               $tabla  Nombre de la tabla a consultar. 
     * @param  array[string, mixed] $config Configuraciones para el método
     *        Dentro de las configuraciones se permite:
     *        @key    campos array[string] Lista de campos de la consulta, por 
     *                                  defecto, ['*'] para listar todos.
     *        @key    criterios array[string, string] Criterios de filtro para el
     *                                             WHERE de la consulta SQL.
     *        @key    omitir array[string] Lista de campos para omitir en los 
     *                                  parámetros del query-string. *1
     * @return Eloquent\Collection
     *
     * *1: Esto está diseñado para que Laravel no incluya filtros internos
     *     véase los casos de "pagos" donde el tipo_doc = "FACTURA" pero
     *     no es necesario exponer ese filtro al querystring ya que ya está
     *     siendo aplicado por el Controller internamente.
     */
    public function listar_tabla_paginada_filtrada($tabla, $config)
    {
        // Forzamos que se pase una tabla, si por alguna razon no hay
        // rompemos la consulta.

        if (!$tabla) {
            app('log')->error(
                'Se intentó realizar una consulta a la base de ' 
                . 'datos sin definir una tabla!'
            );

            throw new \BadMethodCallException(
                "Tabla no presente para la "
                . "consulta"
            );
        }

        $campos = Arr::get($config, 'campos', ['*']);
        $criterios = Arr::get($config, 'criterios', []);
        $omitir = Arr::get($config, 'omitir', []);

        $query_string = Arr::except(app('request')->except($this->parametros_reservados), $omitir);

        $result = app('db')->table($tabla)
            ->select($campos);
        
        $result = $this->_aplicar_criterios($result, $criterios);
        return $this->_aplicar_post_proceso($result, $query_string);
    }

    public function _aplicar_criterios($result, $criterios){
        foreach ($criterios as $campo => $valor) {
            $operador = '=';
            if (is_array($valor)) {
                $campo = $valor[0];
                $operador = $valor[1];
                $valor = $valor[2];    
            }
            if (is_array($valor)) {
                $result = $result->whereIn($campo, $valor);
            }else{
                $result = $result->where($campo, $operador, $valor);
            }
        }
        return $result;
    }

    public function _aplicar_post_proceso($result, $query_string){
        
        $reserved_params = app('request')->only($this->parametros_reservados);

        if ($reserved_params['__no_paginar']) {
            return ['data' => $result->get(), 'no_paginar' => true];
        }
        
        $result = $result->paginate($this->per_page)
            ->appends($query_string);
        
        if (isset($reserved_params['__asociar_lista'])) {
            if (empty($reserved_params['__clave'])) {
                throw new \RuntimeException("No se puede asociar sin clave");
            }
            $data = [];
            $column = $reserved_params['__clave'];
            foreach ($result as $row) {
                $array_key = $row->$column;
                if (!isset($data[$array_key])) {
                    $data[$array_key] = [];
                }
                $data[$array_key][] = $row;
            }
            return [
                'data' => $data, 
                'asociar_lista' => true,
                'current_page' => $result->currentPage(), 
                'from' => $result->firstItem(), 
                'to' => $result->lastItem(), 
                'last_page' => $result->lastPage(), 
                'per_page' => $result->perPage(), 
                'total' => $result->total(), 
                'next_page_url' => $result->nextPageUrl(),
                'prev_page_url' => $result->previousPageUrl(),
            ];
        }

        if (isset($reserved_params['__asociar'])) {
            if (empty($reserved_params['__clave'])) {
                throw new \RuntimeException("No se puede asociar sin clave");
            }
            $data = [];
            $column = $reserved_params['__clave'];
            foreach ($result as $row) {
                $array_key = $row->$column;
                $data[$array_key] = $row;
            }
            return [
                'data' => $data, 
                'asociar' => true,
                'current_page' => $result->currentPage(), 
                'from' => $result->firstItem(), 
                'to' => $result->lastItem(), 
                'last_page' => $result->lastPage(), 
                'per_page' => $result->perPage(), 
                'total' => $result->total(), 
                'next_page_url' => $result->nextPageUrl(),
                'prev_page_url' => $result->previousPageUrl(),
            ];
        }

        return $result;
    }
}
