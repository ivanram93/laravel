@extends("layouts.admin")

@section("content")
	{{-- Agregamos , "files"=>true para poder subir archivos --}}
	{!! Form::model( $movie, [ "route"=>["pelicula.update",$movie->id], "method"=>"PUT", "files"=>true ] ) !!}
		{{-- Incluimos el formulario --}}
		@include("pelicula.forms.movie")
		{!! Form::submit( "Actualizar", ["class"=>"btn btn-primary"] ) !!}
	{!! Form::close() !!}

	{!! Form::open( [ "route"=>["pelicula.destroy", $movie->id], "method"=>"DELETE" ] ) !!}
		{!! Form::submit("Eliminar", ["class"=>"btn btn-danger"]) !!}
	{!! Form::close() !!}
@endsection