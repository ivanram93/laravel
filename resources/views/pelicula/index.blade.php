@extends("layouts.admin")

@include("alerts.success")

@section("content")
	<div class="table-responsive">
		<table class="table stable-striped">
			<thead>
				<th>Nombre</th>
				<th>Género</th>
				<th>Duración</th>
				<th>Dirección</th>
				<th>Carátula</th>
				<th>Operaciones</th>
			</thead>
			@foreach($movies as $movie)
				<tbody>
					<td>{{ $movie->name }}</td>
					<td>{{ $movie->genre }}</td>
					<td>{{ $movie->duration }}</td>
					<td>{{ $movie->direction }}</td>
					<td>
						<img class="movie-img" src="movies/{{ $movie->path }}" alt="{{ $movie->name }}_Carátula">
					</td>
					<td>
						{!! link_to_route("pelicula.edit", $title="Editar", $parameter=$movie->id, $attributes=["class"=>"btn btn-primary"]) !!}
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
@endsection