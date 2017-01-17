$(document).ready(function() {

	loadTableData();

	$("#actualizar").click(function(e) {
		e.preventDefault();
		var value = $("#id").val();
		var genero = $("#genre").val();
		var route = "/genero/"+value+"";
		var token = $("#token").val();

		$.ajax({
			url: route,
			headers: { "X-CSRF-TOKEN":token },
			type: 'PUT',
			dataType: 'json',
			data: {genre: genero},
			success: function() {
				loadTableData();
				$("#myModal").modal("toggle");
				$("#msgs-text").text("al guardar el nuevo nombre del género");
				$("#msg-success").fadeIn(500);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$("#myModal").modal("toggle");
				$("#msg-error").fadeIn(500);	
				if (jqXHR.status === 0) {
			    $("#msge-text").text('Not connect: Verify Network');
			  } else if (jqXHR.status == 404) {
			    $("#msge-text").text('Requested page not found [404]');
			  } else if (jqXHR.status == 500) {
			    $("#msge-text").text('Internal Server Error [500]');
			  } else if (textStatus === 'parsererror') {
			    $("#msge-text").text('Requested JSON parse failed');
			  } else if (textStatus === 'timeout') {
			    $("#msge-text").text('Time out error');
			  } else if (textStatus === 'abort') {
			    $("#msge-text").text('Ajax request aborted');
			  } else {
			    $("#msge-text").text('Uncaught Error: ' + jqXHR.responseText);
			  }
			}
		});
	});

	$("#close-msg-error").click(function(e) {
		$("#msg-error").fadeOut(500, function() {
			$("#msge-text").text("");
		});
	});

	$("#close-msg-success").click(function(e) {
		$("#msg-success").fadeOut(500, function() {
			$("#msgs-text").text("");
		});
	});

});

function loadTableData() {
	var tablaDatos = $("#datos");
	var route = "/generos";

	$("#datos").empty();
	$.get(route, function(resp) {
		$(resp).each(function(index, value) {
			var num_elementos = value.length;
			var i;
			for( i=0; i<=num_elementos; i++ ) {
				tablaDatos.append(""+
					"<tr>"+
						"<td>"+value[i].genre+"</td>"+
						"<td>"+
							"<button value="+value[i].id+" onClick='show(this);' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal'>Editar</button>&nbsp;&nbsp;&nbsp;"+
							"<button value="+value[i].id+" onClick='del(this);' class='btn btn-danger btn-sm'>Eliminar</button>"+
						"</td>"+
					"</tr>");
			}
		});
	});
}

function show(btn) {
	var route = "/genero/"+btn.value+"/edit";

	/*Con este get estamos obteniendo el valor y el id para mostrarlo en el modal correspondiente*/
	$.get(route, function(data) {
		$("#genre").val(data.genre);
		$("#id").val(data.id);

		/*Posicionamos el cursor sobre el campo que queremos editar*/
		$("#genre").focus();
	});

}

function del(btn) {
	var route = "/genero/"+btn.value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: { "X-CSRF-TOKEN":token },
		type: 'DELETE',
		dataType: 'json',
		success: function() {
			loadTableData();
			$("#msgs-text").text("al eliminar género");
			$("#msg-success").fadeIn(500);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			$("#myModal").modal("toggle");
			$("#msg-error").fadeIn(500);	
			if (jqXHR.status === 0) {
		    $("#msge-text").text('Not connect: Verify Network.');
		  } else if (jqXHR.status == 404) {
		    $("#msge-text").text('Requested page not found [404]');
		  } else if (jqXHR.status == 500) {
		    $("#msge-text").text('Internal Server Error [500].');
		  } else if (textStatus === 'parsererror') {
		    $("#msge-text").text('Requested JSON parse failed.');
		  } else if (textStatus === 'timeout') {
		    $("#msge-text").text('Time out error.');
		  } else if (textStatus === 'abort') {
		    $("#msge-text").text('Ajax request aborted.');
		  } else {
		    $("#msge-text").text('Uncaught Error: ' + jqXHR.responseText);
		  }
		}
	});
}