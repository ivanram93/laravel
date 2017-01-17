<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/*Importante esta línea, sino no funcionará la consulta realizada en el método
Movies()*/
use DB;

class Movie extends Model
{
    protected $table = "movies";

    protected $fillable = ['name', 'path', 'cast', 'direction', 'duration', 'genre_id'];

    /*Agregamos un mutador... un mutador sirve para modificar algunos elementos antes de ser guardados*/
    public function setPathAttribute($path) {
        /*Debemos validar que el campo de archivo no esté vacío*/
        if( !empty($path) ) {   
        	/*Guardamos el nombre en una variable*/
        	$name = Carbon::now()->second.$path->getClientOriginalName();

        	/*Obtenemos la hora, específicamente el segundo en el que es seguido, y le concatenamos el nombre
        	del archivo que está subiendo el usuario*/
        	$this->attributes["path"] = $name;

        	/* Procedemos ahora a lo que es la subida del archivo  */
        	\Storage::disk('local')->put( $name, \File::get($path) );
        }
    }

    public static function Movies() {
        /*Hacemos una consulta para obtener la película con el género 
        que le corresponde*/
        return DB::table("movies")
            /*mediante un join entre las tablas "genres" y "movies"*/
            ->join("genres","genres.id","=","movies.genre_id")
            /*Seleccionamos todos los campos de la tabla "movies" y obtenemos 
            solamente el campo "genre" de la tabla "genres" */
            ->select("movies.*", "genres.genre")
            /*Obtenemos los datos*/
            ->get();
    }
}
