@extends("layouts.admin")

@section("content")
	{!! Form::open(["route"=>"pelicula.store", "method"=>"POST", "files"=>true]) !!}
		@include("pelicula.forms.movie")
		{!! Form::submit("Registrar", ["class"=>"btn btn-primary"]) !!}
	{!! Form::close() !!}
@endsection