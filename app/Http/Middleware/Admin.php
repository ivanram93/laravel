<?php

namespace Cinema\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;

use Closure;

class Admin
{

    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth=$auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* El administrador será el usuario que tenga '1' en el campo ID */
        if( $this->auth->user()->id!=1 ) {
            Session::flash("message-error", "No tienes privilegios.");
            return redirect()->to("admin");
        }
        return $next($request);
    }
}
