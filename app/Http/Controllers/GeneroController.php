<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Requests\GenreRequest;
use Cinema\Http\Controllers\Controller;
/*Agregamos el modelo*/
use Cinema\Genre;

class GeneroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("genero.index");
    }

    /*Método para listar los diferente géneros*/
    public function listing() {
        /*Obtenemos todos los géneros que nos provee el modélo "Genre"*/
        $genres = Genre::all();

        /*Regresamos los datos en un array en formato json*/
        return response()->json([
            $genres->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("genero.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        /*Verificamos si la petición es AJAX*/
        if( $request->ajax() ) {
            Genre::create( $request->all() );
            return response()->json([
                "mensaje"=>"Creado correctamente"
            ]);
        }
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
        /*Buscamos el id que nos proporciona el modelo Genre*/
        $genre = Genre::find($id);

        /*Regresamos la respuesta en formato JSON*/
        return response()->json(
            $genre
        );
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
        $genre = Genre::find($id);
        $genre->fill( $request->all() );
        $genre->save();

        return response()->json([
            "mensaje"=>"Listo"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        return response()->json([
            "mensaje"=>"Eliminado"
        ]);
    }
}
