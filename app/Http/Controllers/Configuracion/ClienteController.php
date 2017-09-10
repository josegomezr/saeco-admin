<?php

/*
|--------------------------------------------------------------------------
| CONTROLADOR CONFIGURACION -> CLIENTE
|--------------------------------------------------------------------------
|
| Este tiene las tablas referentes a clientes. 
|
| Ver al final para notas.
|
*/
namespace App\Http\Controllers\Configuracion;
use App\Http\Controllers\Controller as BaseController;

class ClienteController extends BaseController
{

    /**
     * franquicia
     *
     * Retorna la lista de franquicias
     */
    public function franquicia()
    {
        $tabla="public.franquicia";
        $campos = ['*'];
        $criterios = app('request')->except($this->parametros_reservados);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * empresa
     *
     * Retorna la lista de empresas
     */
    public function empresa()
    {
        $tabla = "public.empresa"
        $campos = ['*'];
        $criterios = app('request')->except($this->parametros_reservados);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * statuscont
     *
     * Retorna la lista de status contratos?
     */
    public function statuscont()
    {
        $tabla="public.statuscont";
        $campos = ['*'];
        $criterios = app('request')->except($this->parametros_reservados);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * grupo_afinidad
     *
     * Retorna la lista de grupos de afinidades?
     */
    public function grupo_afinidad()
    {
        $tabla="public.grupo_afinidad";
        $campos = ['*'];
        $criterios = app('request')->except($this->parametros_reservados);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * vendedor
     *
     * Retorna la lista de vendedores
     */
    public function vendedor()
    {
        $tabla="public.vendedor";
        $campos = ['*'];
        $criterios = app('request')->except($this->parametros_reservados);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * tipo_cliente
     *
     * Retorna la lista de tipos de clientes
     */
    public function tipo_cliente()
    {
        $tabla="public.tipo_cliente";
        $campos = ['*'];
        $criterios = app('request')->except($this->parametros_reservados);

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios
            ]
        );

        return response()->json($result);
    }

    /**
     * tipo_documento
     *
     * Retorna la lista de tipos de documentos
     */
    public function tipo_documento()
    {
        $tabla="public.tipo_documento";
        $campos = ['*'];
        $criterios = app('request')->except($this->parametros_reservados);

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