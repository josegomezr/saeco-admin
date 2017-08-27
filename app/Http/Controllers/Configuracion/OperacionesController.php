<?php

/*
|--------------------------------------------------------------------------
| CONTROLADOR CONFIGURACION -> OPERACIONES
|--------------------------------------------------------------------------
|
| Este tiene las tablas referentes a operaciones. 
|
| Ver al final para notas.
|
*/
namespace App\Http\Controllers\Configuracion;
use App\Http\Controllers\Controller as BaseController;

class OperacionesController extends BaseController
{
    /**
     * grupo_trabajo
     *
     * Retorna la lista de grupos de trabajo
     */
    public function grupo_trabajo()
    {
        $tabla = "grupo_trabajo";
        $campos = ['*'];
        $criterios = app('request')->except(['page']);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * tecnico
     *
     * Retorna la lista de tecnico
     */
    public function tecnico()
    {
        $tabla = "tecnico";
        $campos = ['*'];
        $criterios = app('request')->except(['page']);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * detalle_orden
     *
     * Retorna la lista de detalles de orden
     */
    public function detalle_orden()
    {
        $tabla = "detalle_orden";
        $campos = ['*'];
        $criterios = app('request')->except(['page']);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * tipo_orden
     *
     * Retorna la lista de tipos de orden
     */
    public function tipo_orden()
    {
        $tabla = "tipo_orden";
        $campos = ['*'];
        $criterios = app('request')->except(['page']);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }
}

/*
|--------------------------------------------------------------------------
| NOTAS
|--------------------------------------------------------------------------
| 
| *1: Notese que el namespace actual es `App\Http\Controllers\Configuracion` 
|     y concuerda con la ruta del archivo actual 
|     `app/Http/Controllers/Configuracion`.
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
*/