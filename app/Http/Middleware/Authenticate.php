<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
<<<<<<< HEAD
    
    protected function redirectTo(Request $request)
=======
    protected function redirectTo(Request $request): ?string
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    {
        return $request->expectsJson() ? null : route('login');
    }
}
