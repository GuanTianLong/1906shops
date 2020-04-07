<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
        //
        '*',                    //对所有的请求不使用csrf
=======
        '*',
>>>>>>> 22d05047ef4fdc9ce601241992e890c966837162
    ];
}
