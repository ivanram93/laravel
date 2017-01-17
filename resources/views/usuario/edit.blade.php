@extends("layouts.admin")

@section("content")
	@include("alerts.request")
	{{-- model llenará el formulario de acuerdo a un modelo, y 
	automáticamente los valores se ajustarán a cada campo. Entonces 
	especificamos la ruta al nombre del controlador en este caso 
	"UsuarioController" y el nombre del método, que es "update", y cuando 
	el método es update, lo especificadmos como "method"=>"PUT"--}}
	{!!Form::model($user,[ "route"=>["usuario.update",$user->id], "method"=>"PUT" ])!!}
		{{-- Incluimos el formulario... esto para evitarnos repetir código --}}
		@include("usuario.forms.usr")
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}


	{!!Form::open([ "route"=>["usuario.destroy",$user->id], "method"=>"DELETE" ])!!}
		{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
@endsection
