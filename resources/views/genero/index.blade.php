@extends("layouts.admin")

@section("content")
	<div id="msg-success" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
		<button id="close-msg-success" type="button" class="close"><span aria-hidden="true">&times;</span></button>
		<strong>Éxito</strong> <span id="msgs-text"></span>.
	</div>

	<div id="msg-error" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
		<button id="close-msg-error" type="button" class="close"><span aria-hidden="true">&times;</span></button>
		<strong>Ocurrió un error: </strong> <span id="msge-text"></span>.
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Operaciones</th>
			</thead>
			<tbody id="datos"></tbody>
		</table>
	</div>
	@include("genero.modal")
@endsection

{{-- Esto para cargar el script únicamente en esta vista --}}
@section("script")
	{!!Html::script('js/script2.js')!!}
@endsection