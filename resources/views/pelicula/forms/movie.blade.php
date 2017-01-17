		<div class="form-group">
			{!! Form::label("nombre","Nombre:") !!}
			{!! Form::text("name",null,["class"=>"form-control", "placeholder"=>"Ingresa el nombre de la película"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("elenco","Elenco:") !!}
			{!! Form::text("cast",null,["class"=>"form-control", "placeholder"=>"Ingresa el elenco"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("direccion","Dirección:") !!}
			{!! Form::text("direction",null,["class"=>"form-control", "placeholder"=>"Ingresa al director"]) !!}
		</div>
		<div class="form-group">
			{!! Form::label("duracion","Duración:") !!}
			{!! Form::text("duration",null,["class"=>"form-control", "placeholder"=>"Ingresa la duración"]) !!}
		</div>
		{{-- Para cambiar la ruta de donde se almacenarán archivos, se debe de modificar
		el archivo /config/filesystems.php ...dicha ruta está en la línea 48-49 --}}
		<div class="form-group">
			{!! Form::label("poster","Poster:") !!}
			{!! Form::file("path") !!}
		</div>
		<div class="form-group">
			{!! Form::label("genero","Género:") !!}
			{!! Form::select("genre_id",$genres) !!}
		</div>