<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiKeyAndTokenAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check for API key in the request query string
        //$apiKey = $request->query('api_key'); 

        // Check for API key in the request headers
        // $apiKey = $request->header('X-API-KEY');

        // if ($apiKey && $this->isValidApiKey($apiKey)) {
        //     // Valid API key found, grant access
        //     return $next($request);
        // }

        // Check for Bearer token (for user authentication)
        if (Auth::guard('api')->check()) {
            // Valid Bearer token found, grant access
            return $next($request);
        }

        // Unauthorized: No valid API key or bearer token found
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    /**
     * Validate the provided API key.
     *
     * @param  string  $apiKey
     * @return bool
     */
    private function isValidApiKey($apiKey)
    {
        // Implement your validation logic for the API key here
        // For example, you could check if the API key exists in your database or a valid list of API keys.

        // For demonstration purposes, we'll assume that a valid API key is 'secret-api-key'.
        return $apiKey === 'secret-api-key';
    }
}
