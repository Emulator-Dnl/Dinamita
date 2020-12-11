<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EsUsuario_o_Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if((\Auth::user()->tipo == 'usuario') || (\Auth::user()->tipo == 'admin')){
            //aquí estaría mejor que me redirijera a /factura directamente
            return $next($request);
        }else{
            return redirect('/dashboard')->with(['mensaje' => 'Bienvenido invitado']);
        }        
    }
}
