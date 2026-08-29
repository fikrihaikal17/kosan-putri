<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackSiteVisits
{
    /**
     * Handle an incoming request and record page view in real time.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track successful GET web page requests (status 200)
        if ($request->isMethod('GET') && $response->getStatusCode() === 200) {
            $path = trim($request->path(), '/');
            $path = $path === '' ? '/' : '/'.$path;

            // Exclude internal admin, livewire, asset, and dev endpoints
            if (
                ! str_starts_with($path, '/admin') &&
                ! str_starts_with($path, '/livewire') &&
                ! str_starts_with($path, '/_') &&
                ! str_starts_with($path, '/api') &&
                ! str_contains($path, '.')
            ) {
                try {
                    PageView::create([
                        'ip_address' => $request->ip(),
                        'session_id' => $request->hasSession() ? $request->session()->getId() : null,
                        'path' => $path,
                        'url' => substr($request->fullUrl(), 0, 500),
                        'method' => 'GET',
                        'user_agent' => substr((string) $request->userAgent(), 0, 500),
                        'referer' => substr((string) $request->header('referer'), 0, 500),
                    ]);
                } catch (\Throwable) {
                    // Suppress any tracking write exceptions to never break user request
                }
            }
        }

        return $response;
    }
}
