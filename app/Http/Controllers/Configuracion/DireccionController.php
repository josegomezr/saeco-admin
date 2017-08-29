<?php

/*
|--------------------------------------------------------------------------
| CONTROLADOR CONFIGURACION -> DIRECCION
|--------------------------------------------------------------------------
|
| Este tiene las tablas referentes a direcciones. 
|
| Ver *1 al final para notas.
|
*/
namespace App\Http\Controllers\Configuracion;
use App\Http\Controllers\Controller as BaseController;

class DireccionController extends BaseController
{
    
    /**
     * sector
     * 
     * Retorna la lista de sectores
     */
    public function sector()
    {
        $tabla="public.sector";
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
     * ciudad
     * 
     * Retorna la lista de ciudades
     */
    public function ciudad()
    {
        $tabla="public.ciudad";
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
     * estado
     * 
     * Retorna la lista de estados
     */
    public function estado()
    {
        $tabla="public.estado";
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
     * pais
     * 
     * Retorna la lista de paises
     */
    public function pais()
    {
        $tabla="public.pais";
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
     * municipio
     * 
     * Retorna la lista de municipios
     */
    public function municipio()
    {
        $tabla="public.municipio";
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
     * parroquia
     * 
     * Retorna la lista de parroquias
     */
    public function parroquia()
    {
        $tabla="public.parroquia";
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
     * edificio
     * 
     * Retorna la lista de edificios
     */
    public function edificio()
    {
        $tabla="public.edificio";
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
     * urbanizacion
     * 
     * Retorna la lista de urbanizaciones
     */
    public function urbanizacion()
    {
        $tabla="public.urbanizacion";
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
     * manzana
     * 
     * Retorna la lista de manzanas
     */
    public function manzana()
    {
        $tabla="public.manzana";
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
     * nomenclatura
     * 
     * Retorna la lista de nomenclaturas
     */
    public function nomenclatura()
    {
        $tabla="public.nomenclatura";
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
*/