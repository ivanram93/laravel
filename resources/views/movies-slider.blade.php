<div class="review-slider">
	<ul id="flexiselDemo1">
		@foreach ($movies as $movie)
			<li><img src="movies/{{ $movie->path }}" alt="{{ $movie->name }}_Caratula-Slider"/></li>
		@endforeach
	</ul>
</div>