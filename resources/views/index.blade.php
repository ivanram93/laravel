@extends('layouts.principal')
@section('content')

	<div class="header">
		<div class="top-header">
			<div class="logo">
				<a href="index.html"><img src="{!! URL::to("images/logo.png") !!}" alt="" /></a>
				<p>Movie Theater</p>
			</div>
			<div class="search">
				<form>
					<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
					<input type="submit" value="">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="header-info">
			<h1>BIG HERO 6</h1>
			
			@include("alerts.errors")
			@include("alerts.request")

			{!! Form::open(["route"=>"log.store", "method"=>"POST"]) !!}
				<div class="form-group">
					{!! Form::label("correo","Correo:") !!}
					{!! Form::email("mail",null,["class"=>"form-control", "placeholder"=>"Ingresa tu correo"]) !!}
				</div>

				<div class="form-group">
					{!! Form::label("contrasena","Contraseña:") !!}
					{!! Form::password("pswd",["class"=>"form-control", "placeholder"=>"Ingresa tu contraseña"]) !!}
				</div>
				{!! Form::submit("Iniciar",["class"=>"btn btn-primary"]) !!}
			{!! Form::close() !!}

			{!! link_to("password/email", $title="¿Olvidaste tu contraseña?", $attibutes=null, $secure=null) !!}
		</div>
	</div>
	@include("movies-slider")
@endsection