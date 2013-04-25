$(document).ready(function() {
	// setTimeout("secuencia", 5);

	setTimeout("secuencia()", 0);
});

function secuencia() {
	setTimeout("secuenciaR(1)", 0);
	setTimeout("secuenciaG(2)", 1000);
	setTimeout("secuenciaB(3)", 2000);

	setTimeout("secuenciaG(1)", 3000);
	setTimeout("secuenciaB(2)", 4000);
	setTimeout("secuenciaR(3)", 5000);

	setTimeout("secuenciaB(1)", 6000);
	setTimeout("secuenciaR(2)", 7000);
	setTimeout("secuenciaG(3)", 8000);

	setTimeout("secuencia()", 9000);
}

function secuenciaR(id) {
	var rgb = {r:255, g:0, b:0};
	$.post(WEBROOT + "bichitos/colorin", {
		id : id,
		color : rgb
	});
}
function secuenciaG(id) {
	var rgb = {r:0, g:255, b:0};
	$.post(WEBROOT + "bichitos/colorin", {
		id : id,
		color : rgb
	});
}
function secuenciaB(id) {
	var rgb = {r:0, g:0, b:255};
	$.post(WEBROOT + "bichitos/colorin", {
		id : id,
		color : rgb
	});
}
