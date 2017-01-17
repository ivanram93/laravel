	<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Operacion</th>
				</thead>
				@foreach($users as $user)
					<tbody>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td> 
							{{-- Hacemos referencia al método que usaremos para editar los datos de un usuario, le especificamos el texto que llevara el link (en este casi $title="Editar"), los parámetros (en este caso pasaremos el ID de cada usuario $parameters=$user->id) y agregaremos atributos al link (en este caso se le agregó la clase de bootstrap que muestra un botón) --}}
							{!! link_to_route('usuario.edit', $title = "Editar", $parameters = $user->id, $attributes = ["class"=>"btn btn-primary"]); !!} 
						</td>
					</tbody>
				@endforeach
			</table>
		</div>

		{{-- Referenciamos a la variable $users que es la que contiene el listado de todos los usuarios y así poder renderizar los resultados--}}
		{!! $users->render() !!}