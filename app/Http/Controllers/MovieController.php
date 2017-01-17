<?php

namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;
use Cinema\Movie;

use Session;
use Redirect;
use Illuminate\Routing\Route;


class MovieController extends Controller
{

    public function __construct() {
        $this->middleware("auth");
        $this->middleware("admin");

        $this->beforeFilter( "@find", [ "only"=>["edit", "update", "destroy"] ] );
    }

    public function find(Route $route) {
        $this->movie = Movie::find( $route->getParameter("pelicula") );

        /*
        | Para evitar que el usuario busque cosas que no existen, 
        | redirigiendolo a una vista que dice "Objeto no localizado
        | El método notFound() está declarado en el controlador
        | padre, que se encuentra en /app/Http/Controllers/Controller.php
        */
        $this->notFound( $this->movie );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Havemos referencia a nuestro modelo Movie con el método Movies()
        ya especificado en el modelo ya mencionado*/
        $movies = Movie::Movies();
        return view("pelicula.index", compact("movies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Agregamos la variable que almacenará los géneros, para 
        posteriormente mostrarlos en el select de la vista*/
        $genres = Genre::lists('genre', 'id');
        return view( 'pelicula.create',compact('genres') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create( $request->all() );
        Session::flash("message", "Película creada correctamente.");
        return Redirect::to("/pelicula");
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
        /*$movie = Movie::find($id);*/
        /*Listamos los géneros para poder llenar el formulario de edición*/
        $genres = Genre::lists("genre", "id");
        return view( "pelicula.edit", ["movie"=>$this->movie], ["genres"=>$genres] );
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
        /*$movie = Movie::find($id);
        $movie->fill( $request->all() );
        $movie->save();*/

        $this->movie->fill( $request->all() );
        $this->movie->save();

        Session::flash("message", "Los datos de la película fueron modificados correctamente.");
        return Redirect::to("/pelicula");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$movie = Movie::find($id);*/
        $this->movie->delete();
        \Storage::delete($movie->path);
        Session::flash("message", "Película eliminada correctamente.");
        return Redirect::to("/pelicula");
    }
}