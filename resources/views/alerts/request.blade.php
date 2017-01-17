@if( count($errors)>0 )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
			{{-- Recorremos $errors como error --}}
			@foreach( $errors->all() as $error )
				{{-- Imprimimos cada uno de los errores --}}
				<li>{!! $error !!}</li>
			@endforeach
		</ul>
	</div>
@endif