<?php

namespace App\Helpers;

class ParametroAFiltroSQL
{
    /**
     * Check if a given ip is in a network
     *
     * @param  string $ip    IP to check in IPV4 format eg. 127.0.0.1
     * @param  string $range IP/CIDR netmask eg. 127.0.0.0/24, also 127.0.0.1 is accepted and /32 assumed
     * @return boolean true if the ip is in this range / false if not.
     */
    public static function transformar( $entrada, $transformaciones ){
        $salida = [];

        foreach ($transformaciones as $campo => $transformacion) {
            list($operador, $columna) = $transformacion;
            if (!isset($entrada[$campo])) {
                continue;
            } 

            $value = $entrada[$campo];
            if ($operador == 'IN') {
                $value = explode(',', $value);
            }
            $salida[] = [$columna, $operador, $value];
            unset($entrada[$campo]);
        }
        
        foreach ($entrada as $campo => $valor) {
            $salida[] = [$campo, '=', $valor];
        }

        return $salida;
    }
}