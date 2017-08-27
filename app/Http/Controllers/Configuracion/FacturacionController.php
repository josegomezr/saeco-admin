<?php

/*
|--------------------------------------------------------------------------
| CONTROLADOR CONFIGURACION -> FACTURACION
|--------------------------------------------------------------------------
|
| Este tiene las tablas referentes a facturacion. 
|
| Ver al final para notas.
|
*/
namespace App\Http\Controllers\Configuracion;
use App\Http\Controllers\Controller as BaseController;

class FacturacionController extends BaseController
{
    /**
     * oficina_cobro
     *
     * Retorna la lista de oficinas de cobro
     */
    public function oficina_cobro()
    {
        $tabla="public.oficina_cobro";
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
         * cobrador
         *
         * Retorna la lista de cobradores
         */
    public function cobrador()
    {
        $tabla="public.cobrador";
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
     * punto_venta_bancario
     *
     * Retorna la lista de puntos de venta bancarios
     */
    public function punto_venta_bancario()
    {
        $tabla = punto_venta_bancario
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
     * estacion_trabajo
     *
     * Retorna la lista de estaciones de trabajo
     */
    public function estacion_trabajo()
    {
        $tabla="public.estacion_trabajo";
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
     * caja
     *
     * Retorna la lista de cajas
     */
    public function caja()
    {
        $tabla="public.caja";
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
     * banco
     *
     * Retorna la lista de bancos
     */
    public function banco()
    {
        $tabla="public.banco";
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
     * cuenta_bancaria
     *
     * Retorna la lista de cuentas bancarias
     */
    public function cuenta_bancaria()
    {
        $tabla="public.cuenta_bancaria";
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
     * tipo_pago
     *
     * Retorna la lista de tipos de pagos
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