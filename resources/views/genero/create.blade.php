@extends("layouts.admin")

@section("content")
	<div id="msg-success" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Género creado correctamente.
	</div>
	<div id="msg-error" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<span id="msge-text"></span>
	</div>
	{!! Form::open() !!}
		{{-- Para poder procesar la petición mediante AJAX es necesario
		agregar un input oculto --}}
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		@include("genero.forms.genero")
		{!! link_to("#", $title="Registrar", $attributes=["id"=>"registro", "class"=>"btn btn-primary "], $secure=null) !!}
	{!! Form::close() !!}
@endsection

{{-- Esto para cargar el script únicamente en esta vista --}}
@section("script")
	{!!Html::script('js/script.js')!!}
@endsection