<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
        "*"
=======
<<<<<<< HEAD
        '*',
=======
        '*'
>>>>>>> bc17b500dbf45b2a0320b7ff5a4ba2be9ae99852
>>>>>>> cc1ea33a397f9399bbde4af3b830ea6ba9a8c563
    ];
}
