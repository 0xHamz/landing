<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Route middleware for individual routes.
     */
    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'penumpang' => \App\Http\Middleware\PenumpangMiddleware::class,
        'role' => \App\Http\Middleware\CheckRole::class,
    ];
}
