$(document).ready(function() {
	$("#registro").click(function(e) {
		e.preventDefault();
		var data_genre = $("#genre").val();
		var route = "/genero";
		var token = $("#token").val();

		$.ajax({
			url: route,
			headers: { "X-CSRF-TOKEN":token },
			type: 'POST',
			dataType: 'json',
			data: {genre: data_genre},
			success: function() {
				$("#msg-success").fadeIn(500);
				$("#genre").val("");
			},
			error: function(msj){
				$("#msge-text").html(msj.responseJSON.genre);
				$("#msg-error").fadeIn(500);
			}
		});
	});
});