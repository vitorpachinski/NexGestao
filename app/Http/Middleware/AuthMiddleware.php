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
    public function handle(Request $request, Closure $next, $authMethod, $user): Response
    {
        if ($authMethod === 'default') {
            echo 'Usuario: '.$user . "<br>";
            echo "Verificar o usuario e senha no Banco de dados <br>";
        }
        if ($authMethod === 'LDAP') {
            echo 'Usuario: '.$user . "<br>";
            echo 'Verificar o usuario e senha no AD <br>';
        }
        if (true) {
            return $next($request);
        }

        // Retorna uma resposta com status 403 e a mensagem 'Acesso negado!' caso não seja autenticado
        return Response('Acesso negado!, rota necessita de autenticação');
    }
}
