@extends('layouts.principal')
	@section('content')
		@include('alerts.success')
		<div class="contact-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<!---contact-->
<div class="main-contact">
		 <h3 class="head">Reseteando contraseña</h3>
		 <p style="text-transform: none !important;">Una vez hayas elegido la contraseña, guardala en un lugar seguro.</p>
		 <div class="contact-form">
			 {!! Form::open( ["url"=>"/password/reset"] ) !!}
			 	<div class="col-md-6 contact-left">
			 		{{-- Establecemos el input oculto en el que se recibirá el token de la cuenta --}}
			 		{!! Form::hidden("token",$token,null) !!}
			 		{{-- En este campo asignaremos el email de la cuenta a la que se le cambiará la password --}}
			 		{!! Form::text("email", null, ["value"=>"{{ old(email) }}"]) !!}

			 		{!! Form::password("password", ["placeholder"=>"Nueva contraseña"]) !!}
			 		{!! Form::password("password_confirmation", ["placeholder"=>"Repite la nueva contraseña"]) !!}
			 	</div>

			 	{{-- Como el controlador nos enviará a la vista Home, iremos al controlador "app/Http/Controller/Auth/PasswordController" a cambiar dicho redireccionamiento, Y una vez hecho eso, hay que irnos a la carpeta
			 	/Http/Controller/Auth/PasswordController --}}
			 		{!! Form::submit("Reestablecer contraseña") !!}
			 {!! Form::close() !!}
	     </div>
</div>
	@endsection	