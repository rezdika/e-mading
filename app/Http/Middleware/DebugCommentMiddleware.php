<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DebugCommentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Log semua request ke route komentar
        if ($request->is('articles/*/comments')) {
            Log::info('Comment request debug', [
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'user_authenticated' => Auth::check(),
                'user_id' => Auth::id(),
                'user_role' => Auth::user()->role ?? 'not_authenticated',
                'csrf_token' => $request->header('X-CSRF-TOKEN') ?? $request->input('_token'),
                'request_data' => $request->all(),
                'session_id' => session()->getId(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
        }

        return $next($request);
    }
}