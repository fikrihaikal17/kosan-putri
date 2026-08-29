<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sets aggressive cache-control headers on all responses.
 *
 * - Fingerprinted Vite build assets (/build/assets/*) get 1-year immutable cache.
 * - Static images, SVGs, fonts get 1-year cache.
 * - HTML pages get no-cache to always serve fresh content.
 *
 * This middleware exists because the production hosting server
 * does not honour .htaccess mod_expires / mod_headers directives.
 */
class SetCacheHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $path = $request->path();

        // Fingerprinted Vite build assets → 1 year immutable
        if (str_starts_with($path, 'build/assets/')) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            return $response;
        }

        // Static images, SVGs, fonts → 1 year
        if (preg_match('/\.(png|jpg|jpeg|gif|webp|svg|ico|woff2?|ttf|eot)$/i', $path)) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            return $response;
        }

        // CSS / JS outside build folder → 1 month
        if (preg_match('/\.(css|js)$/i', $path)) {
            $response->headers->set('Cache-Control', 'public, max-age=2592000');
            return $response;
        }

        return $response;
    }
}
