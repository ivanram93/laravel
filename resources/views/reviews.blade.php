@extends('layouts.principal')
@section('content')
	<div class="review-content">
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
		<div class="reviews-section">
			<h3 class="head">Movie Reviews</h3>
			<div class="col-md-9 reviews-grids">
				@foreach($movies as $movie)
				<div class="review">
					<div class="movie-pic">
						<a href="#"><img src="movies/{{ $movie->path }}" alt="{{ $movie->name }}_Carátula"></a>
					</div>
					<div class="review-info">
						<a class="span" href="single.html"> {{ $movie->name }} </a>
						<p class="info">CAST:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $movie->cast }}</p>
						<p class="info">DIRECTION: &nbsp;&nbsp;&nbsp;&nbsp;{{ $movie->direction }}</p>
						<p class="info">GENRE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $movie->genre }}</p>
						<p class="info">DURATION:&nbsp;&nbsp;&nbsp; &nbsp; {{ $movie->duration }}</p>
					</div>

					<div class="clearfix"></div>
				</div>
				@endforeach

			</div>


			<div class="clearfix"></div>
		</div>
	</div>
	@include("movies-slider")

	<script>
		$(document).ready(function() {
			$(".movie-pic a").click(function(e) {
				e.preventDefault();
			});
		});
	</script>
@endsection