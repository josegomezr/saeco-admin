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
    public $per_page = 10;

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
     *     no es necesario exponer ese filtro al querystrng ya que ya está
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

        $query_string = Arr::except($criterios, $omitir);

        return app('db')->table($tabla)
            ->select($campos)
            ->where($criterios)
            ->paginate($this->per_page)
            ->appends($query_string);
    }
}
