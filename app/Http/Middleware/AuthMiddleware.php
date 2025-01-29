<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(true){
            return $next($request);
        }
        
        // Retorna uma resposta com status 403 e a mensagem 'Acesso negado!' caso não seja autenticado
        return Response('Acesso negado!, rota necessita de autenticação');
    }
}
