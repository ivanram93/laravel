$(document).on("click", ".pagination a",function(e) {
	e.preventDefault();
	var page_var = $(this).attr("href").split("page=")[1];
	var route = "/usuario";
	
	$.ajax({
		url: route,
		type: 'GET',
		dataType: 'json',
		data: {page: page_var},
		success: function(data) {
			$(".users").html(data);
		}
	});
	
});