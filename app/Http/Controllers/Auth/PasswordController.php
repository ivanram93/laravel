<?php

namespace Cinema\Http\Controllers\Auth;

use Cinema\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Auth;
use Session;
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    
    /*Asignamos el direccionamiento*/
    protected $redirectTo = '/admin';

    protected function resetPassword($user, $password) {
        $user->password = $password;
        $user->save(); Auth::login($user);
        Session::flash("message", "Correo enviado, sino has recibo el correo, revisa la carpeta de spam.");
    }


    public function __construct()
    {
        $this->middleware('guest');
    }
}
