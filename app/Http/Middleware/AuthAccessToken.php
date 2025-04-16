<?php

namespace App\Http\Middleware;

use App\Models\AccessToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = $request->bearerToken();

        $token = AccessToken::where('access_token', $accessToken)->first();

        if(!$token) {
            return response()->json([
                'message' => 'Token inválido.'
            ], 401);
        }

        $dtCriacao = Carbon::parse($token->dt_criacao);

        if ($dtCriacao->addSeconds($token->expires_in) > now()) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Token expirado.'
        ], 401);
    }
}
