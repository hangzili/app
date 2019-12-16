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
        "*",
=======
<<<<<<< HEAD

        "*",
=======
      '*'
>>>>>>> f4e9373692efecc6ab6823f4ff96df02c747bb9a
>>>>>>> c4eaa3a275654b05e27959fe9b0762d5db3d7b09
    ];
}