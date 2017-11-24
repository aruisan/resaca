<?php

namespace resaca\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Administrador
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->admin != 1)
        {
            return redirect()->to('misElementos');
        }
        return $next($request);
    }
}
