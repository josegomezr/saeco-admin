<?php

namespace App\Http\Middleware;
Use App\Models\OrigenPermitido;
Use App\Helpers\ValidadorRangoIP;
Use App\Exceptions\OrigenNoPermitido;

use Closure;

class HostPermitidosMiddleware
{
    /**
     * Maneja la petición actual.
     *
     * @param  \Illuminate\Http\Request $request petición actual
     * @param  \Closure                 $next    siguiente acción
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $origenes = OrigenPermitido::all();

        foreach ($origenes as $origen) {
            $valid = ValidadorRangoIP::validar($ip, $origen->red);
            if (!$valid) {
                continue;
            }
            if ($origen->permitir) {
                return $next($request);
            }
            return response('Host bloqueado', 403);
        }

        return response('Host no permitido', 403);
    }
}
