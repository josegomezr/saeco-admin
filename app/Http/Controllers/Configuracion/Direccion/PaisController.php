<?php

/*
|--------------------------------------------------------------------------
| CONTROLADOR CONFIGURACION -> DIRECCION -> PAIS
|--------------------------------------------------------------------------
|
| Este controller expone la logica completa de un CRUD para el recurso
| /configuracion/direccion/pais.
|
| Ver *1 al final para notas.
|
*/
namespace App\Http\Controllers\Configuracion\Direccion;

Use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Arr;

class PaisController extends BaseController
{
    /**
     * campos_validacion
     *
     * Esta lista de nombre_campo => reglas contiene las reglas de validación
     * usadas en el crear y el editar.
     */
    protected $campos_validacion = [
        'id_pais' => 'sometimes|between:4,20',
        'co_pais' => 'required|between:2,20',
        'codigo'  => 'required|between:2,5',
        'tx_pais'  => 'required|between:4,80',
        'lenguaje'  => 'sometimes|between:4,50',
        'status_pais'  => 'sometimes|in:ACTIVO,INACTIVO',
        'nombre_pais'  => 'required|between:4,180',
    ];

    /**
     * campos_tabla
     *
     * Esta lista campos contendrá todos los campos que serán insertados o
     * editados, está diseñado para tomar solo los campos de las tablas 
     * de manera más automática, e ignorar el resto de la entrada.
     */
    protected $campos_tabla = [];

    /**
     * tabla
     *
     * Aqui va el nombre de la tabla, es mera conveniencia para no repetirla
     * en todas partes.
     */
    protected $tabla = "public.pais";

    function __construct()
    {
        $this->campos_tabla = array_keys($this->campos_validacion);
    }

    /**
     * listar
     * 
     * Retorna la lista de paises
     */
    public function listar()
    {
        // mostraremos solo estos 2 campos en el listar, para demostrar el uso
        // de esa variable.

        $campos = ['id_pais', 'nombre_pais'];
        $criterios = app('request')->except(['page']);

        $result = $this->listar_tabla_paginada_filtrada(
            $this->tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * buscar
     * 
     * Retorna un pais por clave primaria
     */
    public function buscar($id)
    {
        // mostraremos todos los campos, pues es una vista detallada de 1 pais.

        $campos = ['*'];
        $criterios = [
            'id_pais' => $id
        ];

        $result = app('db')->table($this->tabla)
            ->select($campos)
            ->where($criterios)
            ->get();


        if (count($result) == 0) { // *3
            throw new ModelNotFoundException("Pais no encontrado!", 1);
        }

        return response()->json($result);
    }

    /**
     * crear
     * 
     * Crea un pais en la base de datos
     */
    public function crear()
    {
        $entrada = app('request')->all();
        
        $validador = app('validator')->make($entrada, $this->campos_validacion);

        if ($validador->fails()) {
            $errores = $validador->getMessageBag()->toArray();
            return response()->json($errores, 401);
        }

        $data = Arr::only($entrada, $this->campos_tabla);

        app('db')->table($this->tabla)->insert($data);

        return response()->json($data, 201);
    }

    /**
     * editar
     * 
     * Edita un pais en la base de datos
     */
    public function editar($id)
    {
        $entrada = app('request')->all();
        
        Arr::forget($entrada, 'id_pais');

        $validador = app('validator')->make($entrada, $this->campos_validacion);

        if ($validador->fails()) {
            $errores = $validador->getMessageBag()->toArray();
            return response()->json($errores, 401);
        }

        $result = app('db')->table($this->tabla)
            ->where($criterios)
            ->get();

        if (count($result) == 0) { // *3
            throw new ModelNotFoundException("Pais no encontrado!", 1);
        }

        $data = Arr::only($entrada, $this->campos_tabla);

        app('db')->table($this->tabla)->where('id_pais', $id)->update($data);

        return response()->json($data, 200);
    }

    /**
     * eliminar
     * 
     * Elimina un pais de la base de datos
     */
    public function eliminar($id)
    {
        $affected = app('db')->table($this->tabla)->where('id_pais', $id)->delete();
        if ($affected == 0) { // *3
            throw new ModelNotFoundException("Pais no encontrado!", 2);
            
        }
        return response()->json(null, 200);
    }

}

/*
|--------------------------------------------------------------------------
| NOTAS
|--------------------------------------------------------------------------
| 
| *1: Notese que el namespace actual es `App\Http\Controllers\Configuracion\Direccion` 
|     y concuerda con la ruta del archivo actual 
|     `app/Http/Controllers/Configuracion/Direccion`.
|
|     Si no concuerdan la ruta con el namespace actual no se podrá acceder
|     a la clase desde ningun otro archivo, es imperativo que todo 
|     concuerde.
|
| *2: Como nos movimos de namespace, necesitamos importar al namespace
|     actual la clase Controller (nuestra)  `App\Http\Controllers\Controller`
|     (el as BaseController es un mero alias para no escribir el nombre 
|     calificado completo.) que usamos de base para exponer el ayudante   
|     `listar_tabla_paginada_filtrada` en esta clase.
|
| *3: Un ejemplo de errores manejados para los casos: buscar, editar y eliminar.
|     Si no se puede encontrar el pais por el id, entonces lanzamos una 
|     excepción que parará todo el ciclo de la petición y notificará el error.
*/