<?php

/*
|--------------------------------------------------------------------------
| Rutas de la aplicación
|--------------------------------------------------------------------------
|
| Aquí es donde estarán definidas todas las rutas, también está especificado
| el cómo agrupar rutas. En general, el primer parámetro es la URI del 
| recurso, y el segundo es el Controlador y el método separado por un @.
| 
| Leer *2 (abajo) para mas info sobre la ubicación de los controllers.
|
*/

$app->group([
    'prefix' => '/v1',
    'middleware' => [ 'origen-permitido', 'api-token']
], function ($app) {
    /*
    |--------------------------------------------------------------------------
    | VISTAS DE CONTRATO
    |--------------------------------------------------------------------------
    |
    | Aquí van las rutas referentes a contratos. 
    |
    */

    $app->get('/contrato', 'VistasController@vista_contrato');
    $app->get('/contrato/servicio', 'VistasController@vista_contrato_servicio');

    /*
    |--------------------------------------------------------------------------
    | VISTAS DE ORDEN
    |--------------------------------------------------------------------------
    |
    | Aquí van las rutas referentes a ordenes. 
    |
    */

    $app->get('/orden', 'VistasController@vista_orden');


    /*
    |--------------------------------------------------------------------------
    | VISTAS DE PAGOS
    |--------------------------------------------------------------------------
    |
    | Aquí van las rutas referentes a pagos. 
    | *1 (leer al final)
    */

    $app->get('/pagos', 'VistasController@vista_pago');
    $app->get('/pagos/{pago}/detalles', 'VistasController@vista_detalle_pago');


    /*
    |--------------------------------------------------------------------------
    | VISTAS DE FACTURAS
    |--------------------------------------------------------------------------
    |
    | Aquí van las rutas referentes a facturas. 
    | *1 (leer al final)
    */
    $app->get('/facturas', 'VistasController@vista_factura');

    $app->get('/facturas/{pago}/detalles', 'VistasController@vista_detalle_factura');

    /*
    |--------------------------------------------------------------------------
    | VISTAS DE SERVICIOS
    |--------------------------------------------------------------------------
    |
    | Aquí van las rutas referentes a servicios. 
    |
    */
    $app->get('/servicios', 'VistasController@vista_servicios');


    /*
    |--------------------------------------------------------------------------
    | VISTAS DE CONFIGURACION
    |--------------------------------------------------------------------------
    |
    | Aquí van las rutas referentes a configuracion, están a su vez en subgrupos
    | para mejor legibilidad.
    | 
    */
    $app->group([ 'prefix' => '/configuracion' ], function($app){
        /*
        |----------------------------------------------------------------------
        | VISTAS DE CONFIGURACION/DIRECCION
        |----------------------------------------------------------------------
        | 
        | Aquí van las vistas relacionadas a dirección:
        |
        |    |-- /direccion
        |        |-- /sector
        |        |-- /ciudad
        |        |-- /estado
        |        |-- /municipio
        |        |-- /parroquia
        |        |-- /edificio
        |        |-- /urbanizacion
        |        |-- /manzana
        |        |-- /nomenclatura
        |        |-- /pais*3
        */

        $app->group(['prefix' => '/direccion'], function($app){
            $app->get('/sector', 'Configuracion\DireccionController@sector');
            $app->get('/ciudad', 'Configuracion\DireccionController@ciudad');
            $app->get('/estado', 'Configuracion\DireccionController@estado');
            $app->get('/municipio', 'Configuracion\DireccionController@municipio');
            $app->get('/parroquia', 'Configuracion\DireccionController@parroquia');
            $app->get('/edificio', 'Configuracion\DireccionController@edificio');
            $app->get('/urbanizacion', 'Configuracion\DireccionController@urbanizacion');
            $app->get('/manzana', 'Configuracion\DireccionController@manzana');
            $app->get('/nomenclatura', 'Configuracion\DireccionController@nomenclatura');
            
            /*
            |------------------------------------------------------------------
            | Pais
            |------------------------------------------------------------------
            */
            $app->get('/pais', 'Configuracion\Direccion\PaisController@listar');
            $app->get('/pais/{id}', 'Configuracion\Direccion\PaisController@buscar');
            $app->post('/pais', 'Configuracion\Direccion\PaisController@crear');
            $app->put('/pais/{id}', 'Configuracion\Direccion\PaisController@editar');
            $app->delete('/pais/{id}', 'Configuracion\Direccion\PaisController@eliminar');
        });

        /*
        |----------------------------------------------------------------------
        | VISTAS DE CONFIGURACION/CLIENTE
        |----------------------------------------------------------------------
        | 
        | Aquí van las vistas relacionadas a cliente:
        |
        |    |-- /cliente
        |        |-- /nomenclatura
        |        |-- /franquicia
        |        |-- /empresa
        |        |-- /statuscont
        |        |-- /grupo_afinidad
        |        |-- /vendedor
        |        |-- /tipo_cliente
        |        |-- /tipo_documento
        */

        $app->group(['prefix' => '/cliente'], function($app){
            $app->get('/franquicia', 'Configuracion\ClienteController@franquicia');
            $app->get('/empresa', 'Configuracion\ClienteController@empresa');
            $app->get('/statuscont', 'Configuracion\ClienteController@statuscont');
            $app->get('/grupo_afinidad', 'Configuracion\ClienteController@grupo_afinidad');
            $app->get('/vendedor', 'Configuracion\ClienteController@vendedor');
            $app->get('/tipo_cliente', 'Configuracion\ClienteController@tipo_cliente');
            $app->get('/tipo_documento', 'Configuracion\ClienteController@tipo_documento');
        });

        /*
        |----------------------------------------------------------------------
        | VISTAS DE CONFIGURACION/FACTURACION
        |----------------------------------------------------------------------
        | 
        | Aquí van las vistas relacionadas a facturacion:
        |
        |    |-- /facturacion
        |        |-- /oficina_cobro
        |        |-- /cobrador
        |        |-- /punto_venta_bancario
        |        |-- /estacion_trabajo
        |        |-- /caja
        |        |-- /banco
        |        |-- /cuenta_bancaria
        |        |-- /tipo_pago
        */

        $app->group(['prefix' => '/facturacion'], function($app){
            $app->get('/oficina_cobro', 'Configuracion\FacturacionController@oficina_cobro');
            $app->get('/cobrador', 'Configuracion\FacturacionController@cobrador');
            $app->get('/punto_venta_bancario', 'Configuracion\FacturacionController@punto_venta_bancario');
            $app->get('/estacion_trabajo', 'Configuracion\FacturacionController@estacion_trabajo');
            $app->get('/caja', 'Configuracion\FacturacionController@caja');
            $app->get('/banco', 'Configuracion\FacturacionController@banco');
            $app->get('/cuenta_bancaria', 'Configuracion\FacturacionController@cuenta_bancaria');
            $app->get('/tipo_pago', 'Configuracion\FacturacionController@tipo_pago');
        });

        /*
        |----------------------------------------------------------------------
        | VISTAS DE CONFIGURACION/SERVICIOS
        |----------------------------------------------------------------------
        | 
        | Aquí van las vistas relacionadas a servicios:
        |
        |    |-- /servicios
        |        |-- /servicios
        |        |-- /tipo_servicio
        |        |-- /paquete
        |        |-- /cant_tv
        |        |-- /iva

        */
        $app->group(['prefix' => '/servicios'], function($app){
            $app->get('/servicios', 'Configuracion\ServiciosController@servicios');
            $app->get('/tipo_servicio', 'Configuracion\ServiciosController@tipo_servicio');
            $app->get('/paquete', 'Configuracion\ServiciosController@paquete');
            $app->get('/cant_tv', 'Configuracion\ServiciosController@cant_tv');
            $app->get('/iva', 'Configuracion\ServiciosController@iva');
        });

        /*
        |----------------------------------------------------------------------
        | VISTAS DE CONFIGURACION/OPERACIONES
        |---------------------------------------------------------------------
        | 
        | Aquí van las vistas relacionadas a operaciones:
        |
        |    |-- /operaciones
        |        |-- /grupo_trabajo
        |        |-- /tecnico
        |        |-- /detalle_orden
        |        |-- /tipo_orden
        */
        $app->group(['prefix' => '/operaciones'], function($app){
            $app->get('/grupo_trabajo', 'Configuracion\OperacionesController@grupo_trabajo');
            $app->get('/tecnico', 'Configuracion\OperacionesController@tecnico');
            $app->get('/detalle_orden', 'Configuracion\OperacionesController@detalle_orden');
            $app->get('/tipo_orden', 'Configuracion\OperacionesController@tipo_orden');
        });

    });

});


    /*
    |--------------------------------------------------------------------------
    | REFERENCIAS
    |--------------------------------------------------------------------------
    |
    | *1: Factura y Pago son la misma vista, pero están discriminadas por tipo_doc
    |     dentro del código, está la lógica, es bastante simple y autoexplicativa.
    |
    | *2: Los controllers se guardan en [app/Http/Controllers/] y de ahí en adelante
    |     siguen la PSR-4 para nomenclatura.
    |
    | *3: el recurso /configuracion/pais abarca todos los métodos para un CRUD.
    |
    */
