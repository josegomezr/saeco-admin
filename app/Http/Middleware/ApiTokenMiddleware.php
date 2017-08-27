<?php

namespace App\Http\Middleware;
Use App\Models\ApiToken;
Use App\Exceptions\RevokedToken;
Use Illuminate\Database\Eloquent\ModelNotFoundException;

use Closure;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request petición actual
     * @param  \Closure                 $next    siguiente acción
     * @return mixed
     */
    public function handle($request, Closure $next){
        
        if (!$request->hasHeader('Api-Token')) {
            return response('No autorizado', 403);
        }

        $token = $request->header('Api-Token');

        try {
            $token = ApiToken::where('token', $token)->firstOrFail();
            
            if (!$token->activo) {
                throw new RevokedToken("Token Revocado");
                
            }
            return $next($request);
        } catch (ModelNotFoundException $e) {
            return response('No autorizado, bad token', 403);
        } catch (RevokedToken $e) {
            return response('No autorizado, revocado', 403);
        }
    }
}
