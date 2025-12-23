<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();

// register middleware alias using the router
try {
    // prefer the $app->router property if present
    $router = $app->router ?? $app->make('router');

    // alias the middleware so you can use 'admin' in your routes
    $router->aliasMiddleware('admin', \App\Http\Middleware\EnsureUserIsAdmin::class);
} catch (\Throwable $e) {
    // If the router is not available yet, you can log or ignore.
    // But typically the router will be available here.
}

return $app;