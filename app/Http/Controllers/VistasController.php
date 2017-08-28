<?php

/*
|--------------------------------------------------------------------------
| CONTROLADOR VISTAS
|--------------------------------------------------------------------------
|
| Este controlador tiene las llamadas a las vistas.
|
| Ver al final para notas.
|
*/

namespace App\Http\Controllers;
use App\Helpers\ParametroAFiltroSQL;

class VistasController extends Controller
{
    /**
     * vista_servicios
     *
     * Retorna la lista de servicios.
     */
    public function vista_servicios()
    {
        $tabla="public.vista_servicios";
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
     * vista_pago
     *
     * Retorna la lista de pagos.
     */
    public function vista_pago()
    {
        $tabla="public.vista_pago_cont";
        $campos = ['*'];
        $criterios = app('request')->except(['page']);
        $criterios['tipo_doc'] = 'PAGO';
        
        $transformaciones = [
            'desde' => ['>=', 'fecha_pago'],
            'hasta' => ['<=', 'fecha_pago']
        ];

        $criterios = ParametroAFiltroSQL::transformar($criterios, $transformaciones);
        
        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios,
            'omitir' => ['tipo_doc']
            ]
        );

        return response()->json($result);
    }

    /**
     * vista_detalle_pago
     *
     * Retorna la lista de detalles de pagos.
     */
    public function vista_detalle_pago($pago)
    {
        $tabla="public.vista_pago_ser";
        $campos = ['*'];
        $criterios = app('request')->except(['page']);

        $criterios['tipo_doc'] = 'PAGO';
        $criterios['id_pago'] = $pago;

        $result = $this->listar_tabla_paginada_filtrada(
            $tabla, [
            'criterios' => $criterios,
            'omitir' => ['tipo_doc', 'id_pago']
            ]
        );

        return response()->json($result);
    }

    /**
     * vista_orden
     *
     * Retorna la lista ordenes.
     */
    public function vista_orden()
    {
        $tabla="public.vista_orden";
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
     * vista_contrato
     *
     * Retorna la lista de contratos.
     */
    public function vista_contrato()
    {
        $tabla="public.vista_contrato_auditoria";
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
     * vista_contrato_servicio
     *
     * Retorna la lista suscripcion de clientes a servicios.
     */
    public function vista_contrato_servicio()
    {
        $tabla="public.vista_contrato_servicio";
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
     * vista_factura
     *
     * Retorna la lista facturas.
     */
    public function vista_factura()
    {
        $tabla="public.vista_pago_cont";
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
     * vista_detalle_factura
     *
     * Retorna la lista de detalles de factura.
     */
    public function vista_detalle_factura()
    {
        $tabla="public.vista_detalle_factura";
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
| *1: Nota que nunca se usa un require en los archivos de clases, ni de 
|     definición de rutas, esto lo logra el PSR-4, que nos provee una 
|     interfaz de resolución de Archivos parecida a como Java/Python/JS 
|     resolvería paquetes/módulos pero de manera automática a través del
|     spl_autoloader.
|
| *2: Por las mismas razones del spl_autoloader, es *IMPERATIVO* que el 
|     nombre de la clase sea el mismo del nombre de la clase. Sino, nunca
|     será accesible.
|
*/