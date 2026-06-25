<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Logika untuk menendang user yang belum login ke halaman login
        $middleware->redirectGuestsTo(function () {

            return route('login', [
                'redirected' => 1
            ]);

        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
