<?php

/*
|--------------------------------------------------------------------------
| CONTROLADOR CONFIGURACION -> SERVICIOS
|--------------------------------------------------------------------------
|
| Este tiene las tablas referentes a facturacion. 
|
| Ver al final para notas.
|
*/
namespace App\Http\Controllers\Configuracion;
use App\Http\Controllers\Controller as BaseController;

class ServiciosController extends BaseController
{
    /**
     * serviciosago
     *
     * Retorna la lista de servicios
     */
    public function tipo_pago()
    {
        $tabla="public.tipo_pago";
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
     * tipo_servicio
     *
     * Retorna la lista de tipos de tipo de servicios
     */
    public function tipo_servicio()
    {
        $tabla="public.tipo_servicio";
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
     * paquete
     *
     * Retorna la lista de paquetes
     */
    public function paquete()
    {
        $tabla="public.paquete";
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
     * cant_tv
     *
     * Retorna la lista de cantidad tvs?
     */
    public function cant_tv()
    {
        $tabla="public.cant_tv";
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
     * iva
     *
     * Retorna la lista de ivas
     */
    public function iva()
    {
        $tabla="public.iva";
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