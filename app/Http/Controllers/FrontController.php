<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Movie;
class FrontController extends Controller
{

  public function __construct() {
        /*Middleware para evitar que el usuario se "salte" el formulario 
        de login*/
        $this->middleware("auth", ["only"=>"admin"]);
  }

   public function index(){
        $movies = Movie::Movies();
        return view('index', compact("movies"));
   }

   public function contacto(){
        return view('contacto');
   }

   public function reviews(){
        $movies = Movie::Movies();
        return view('reviews', compact("movies"));
   }

   public function admin(){
          /*Como está en la carpeta admin, entonces se debe de hacer la referencia a la carpeta después un punto para hacer referencia después al archivo al que apuntará, a diferencia, las anteriores se ponen sin la carpeta puesto que están en el directorio raíz*/

          /* ("carpeta.archivo") */
          return view('admin.index');
   }
}
