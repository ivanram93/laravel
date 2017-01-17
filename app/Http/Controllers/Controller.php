<?php

namespace Cinema\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function notFound($value) {
    	/*
    	| Si el valor no existe, redirige al usuario a una vista donde
    	| le dice que el objeto no ha sido localizado.
    	*/
    	if( !$value )
    		abort(404);
    }
}
