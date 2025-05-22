<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ApiKey;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerifyApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKeyValue = $request->header('x-api-key');

        if (!$apiKeyValue) {
            return response()->json(['message' => 'Clé API manquante'], 401);
        }

        $apiKey = ApiKey::where('key', $apiKeyValue)->first();

        if (!$apiKey) {
            return response()->json(['message' => 'Clé API invalide'], 401);
        }

        Auth::loginUsingId($apiKey->user_id);

        return $next($request);
    }
}