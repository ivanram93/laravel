<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\LoginRequest;
use Cinema\Http\Controllers\Controller;

/*Vamos a utilizar este package para la autentificación del usuario*/
use Auth;
use Session;
use Redirect;

class LogController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
				//
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
				//
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(LoginRequest $request)
		{
				/*Comprobamos si estan pasando las variables*/
				/*return $request->mail;*/

				/*Comprobamos los valores del formulario, si son correctos
				redirigirá al usuario al panel de administración, de lo contrario
				se enviará un mensaje de error*/
				if(Auth::attempt( ['email'=>$request["mail"], 'password'=>$request["pswd"]] )) {
					return Redirect::to("admin");
				}
				Session::flash("message-error", "Datos incorrectos");
				return Redirect::to("/");
		}


		public function logout() {
				Auth::logout();
				return Redirect::to("/");
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id)
		{
				//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
				//
		}
}
