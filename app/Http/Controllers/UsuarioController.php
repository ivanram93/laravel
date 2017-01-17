<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Cinema\User;


use Redirect;
use Session;

class UsuarioController extends Controller
{
		/*
		| -------------------------------------------------------------------------
		| OPTIMIZACION
		| -------------------------------------------------------------------------
		|
		| Crearemos un constructor con un filtro que se ejecutará antes de 
		| cualquier acción dentro del controlador
		*/
		public function __construct() {

				/*Aplicamos el middleware en todo el controlador, y una vez
				ya se pasa dicho middleware, se realiza el middleware de 
				administrador en los métodos 'edit' y 'create'*/
        		$this->middleware("auth");
        		$this->middleware("admin");
				/*
				| Filtro que se ejecutará antes de cualquier acción
				| 
				| Dentro de filtro ejecutaremos un método (@find) y le 
				| especificaremos en que métodos queremos que se ejecute el 
				| método @find, se ejecutará 'solamente' ([ "only"=>["..."] ]) 
				| en los metodos 'edit', 'update' y 'destroy'
				*/
				$this->beforeFilter("@find", [ "only"=>["edit","update","destroy"] ]);
		}
		/*
		| 
		| Creamos el método que especificamos en el filtro
		| 
		*/
		public function find(Route $route) {
				/*
				| Como aquí ya no podemos agregarle el id entonces procedemos a 
				| importar una librería, la cual es: "Illuminate\Routing\Route" 
				| la que servirá básicamente para obtener los parámetros que se 
				| encuentran dentro de nuestra ruta, y en este caso obtendrá la 
				| de nuestro recurso, que es "usuario"
				*/
				$this->user = User::find( $route->getParameter('usuario') );

				/*
				| Para evitar que el usuario busque cosas que no existen, 
				| redirigiendolo a una vista que dice "Objeto no localizado
				| El método notFound() está declarado en el controlador
				| padre, que se encuentra en /app/Http/Controllers/Controller.php
				*/
				$this->notFound( $this->user );
				/*
				| Si queremos saber que es lo que está haciendo, entonces lo 
				| mostramos con "return $this->user;"
				*/


				/*
				| Y para hacer referencia a esto, reemplazaremos algunas partes 
				| del código con $this->user, y están agregadas debajo del 
				| comentario "optimizando"
				*/
		}

		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
				/*
				| Creamos una variable y hacemos referencia al modelo User 
				| y al método All(), que servirá para recuperar los datos de 
				| la base de datos
				| 
				| Reemplazamos el metodo all() por el paginate para hacer una 
				| paginación y así no se amontonen todos los registros cuando 
				| ya existan demasiados.... en el metodo paginate indicamos el 
				| numero de resultados que queremos mostrar. Para poder mostrar 
				| los resultados restantes debemos modificar la vista en donde 
				| mostramos los registros, en este caso la vista es el index de 
				| los usuarios (usuario.index)
				| 
				| Si queremos mostrar los elementos que fueron "eliminados" 
				| usaremos el metodo onlyTrashed() para mostrarlos 
				| "$users = User::onlyTrashed()->paginate(2);"
				*/
				$users = User::paginate(2);
				/*Si la petición es mediante ajax, procederá a responder
				devolviendo los datos en formato json*/
				if( $request->ajax() ) {
					return response()->json(
						view('usuario.users',compact('users'))->render()
					);
				}
				return view('usuario.index',compact('users'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
				return view('usuario.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */

		/*
		| 
		| Recibimos las variables del formulario creado, se almacenarán 
		| en $requests
		| 
		*/
		public function store(UserCreateRequest $request)
		{
				/* 
				| Hacemos referencia al modelo y asignamos los valores de 
				| cada variable
				*/

				/*
				User::create([
						'name' => $request['name'],
						'email' => $request['email'],
						'password' => $request['password'],
				]);
				*/

				/*
				| ---------------------------------------------------------------------
				| Optimizacion
				| ---------------------------------------------------------------------
				*/
				User::create($request->all());

				/*
				| 
				| Agregamos mensaje para que lo muestre en nuestra vista
				| 
				*/
				Session::flash("message","Usuario registrado correctamente");
				
				return redirect('/usuario');
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
				/*$user = User::find($id);
				return view("usuario.edit",["user"=>$user]); */

				/*optimizando*/
				return view("usuario.edit",["user"=>$this->user]);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(UserUpdateRequest $request, $id)
		{
				/*$user = User::find($id);
				$user->fill( $request->all() );
				$user->save();*/

				/*
				| ---------------------------------------------------------------------
				| Optimizando
				| ---------------------------------------------------------------------
				*/
				$this->user->fill( $request->all() );
				$this->user->save();

				/*
				| 
				| Agregamos mensaje para que lo muestre en nuestra vista
				| 
				*/
				Session::flash("message","Usuario editado correctamente");

				/*
				| 
				| Redireccionamos
				| 
				*/
				return Redirect::to("/usuario");
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy()
		{
				/*
				| Ya que tenemos la columna deleted_at, no procederemos a destruir 
				| el elemento, sino que se ocultará
				*/
				/*User::destroy($id);*/
				/*$user=User::find($id);
				$user->delete();*/

				/*
				| ---------------------------------------------------------------------
				| Optimizando
				| ---------------------------------------------------------------------
				*/
				$this->user->delete();

				/*
				| 
				| Agregamos mensaje para que lo muestre en nuestra vista
				| 
				*/
				Session::flash("message","Usuario eliminado correctamente");

				/*
				| 
				| Redireccionamos
				| 
				*/
				return Redirect::to("/usuario");
		}
}
