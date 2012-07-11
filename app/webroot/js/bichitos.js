/**
 * @author ale
 */
$(document).ready(function() {
	$('#boton_direccion, #lamparita').click(function() {
		asignarDireccion();
	});
	$('#boton_color, #lamparita_color').click(function() {
		asignarColor();
	});
	$('#boton_prender, #lamparita_index_off').click(function() {
		prenderLamparita();
	});
	$('#boton_apagar, #lamparita_index_on').click(function() {
		apagarLamparita();
	});

	$('.colorSelector').each(function(index, element) {
		$(this).ColorPicker({
			color : '#ff9900',
			// flat: true,
			onShow : function(colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide : function(colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange : function(hsb, hex, rgb) {
				$(element).css('backgroundColor', '#' + hex);
				cambiarColor(element, rgb);
			}
		});
	});
});

function verificarDireccion() {
	if ($('#direccion').val() != "") {
		return true;
	}
	return false;
}

function verificarColor() {
	if ($('#color').val() != "") {
		return true;
	}
	return false;
}

function verificarPin() {
	var pin = $('#pin').val();
	if ((pin != "") && ($.isNumeric(pin)) && (pin >= 0) && (pin <= 3)) {
		return true;
	}
	return false;
}

function asignarDireccion() {
	if (verificarDireccion()) {
		$('#loading').show();
		$('#mensaje').hide();
		$.post(WEBROOT + "bichitos/direccionar", $("#formulario").serialize(), function() {
			$('#loading').hide();
			$('#mensaje').html('<h3>¡Bien! Se ha asignado la dirección.</h3>').fadeIn();
		}).error(function(data, textStatus, texto) {
			$('#loading').hide();
			if (data.status == '501') {
				$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Puede que falte un parámetro.)</p>').fadeIn();
			} else {
				$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Verifica el dispositivo elegido y los permisos.)</p>').fadeIn();
			}
		});
	} else {
		$('#mensaje').html('<h3 class="error">¡Cuidado! No haz especificado una dirección.</h3><p>(Ayuda: Escribe una dirección válida.)</p>').fadeIn();
	}
}

function asignarColor() {
	$('#mensaje').hide();
	if (verificarDireccion()) {
		if (verificarColor()) {
			if (verificarPin()) {
				$('#loading').show();
				$.post(WEBROOT + "bichitos/colorear", $("#formulario").serialize(), function() {
					$('#loading').hide();
					$('#mensaje').html('<h3>¡Bien! Se ha asignado un color.</h3>').fadeIn();
				}).error(function(data, textStatus, texto) {
					$('#loading').hide();
					if (data.status == '501') {
						$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Puede que falte un parámetro.)</p>').fadeIn();
					} else {
						$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Verifica el dispositivo elegido y los permisos.)</p>').fadeIn();
					}
				});
			} else {
				$('#mensaje').html('<h3 class="error">¡Cuidado! Pin erróneo.</h3><p>(Ayuda: Escribe un número entre 0 y 3.)</p>').fadeIn();
			}
		} else {
			$('#mensaje').html('<h3 class="error">¡Cuidado! No haz especificado un color.</h3><p>(Ayuda: Escribe un color válido.)</p>').fadeIn();
		}
	} else {
		$('#mensaje').html('<h3 class="error">¡Cuidado! No haz especificado una dirección.</h3><p>(Ayuda: Escribe una dirección válida.)</p>').fadeIn();
	}
}

function prenderLamparita() {
	$('#mensaje').hide();
	if (verificarDireccion()) {
		if (verificarPin()) {
			$('#loading').show();
			$.post(WEBROOT + "bichitos/accionar", {
				puerto : $('#puerto').val(),
				direccion : $('#direccion').val(),
				accion : '1',
				pin : $('#pin').val()
			}, function() {
				$('#loading').hide();
				$('#mensaje').html('<h3>Haz hecho clic sobre <span class="resaltar">Prender</span>, la luz debería estar prendida ahora.</h3>').fadeIn();
				$('#lampara').empty();
				lamparita = $('<img>').attr('src', WEBROOT + "img/lamparita_on.svg").attr('class', "lamparita").attr('id', "lamparita_index_on");
				lamparita.click(function() {
					apagarLamparita();
				});
				$('#lampara').append(lamparita);
			}).error(function(data, textStatus, texto) {
				$('#loading').hide();
				if (data.status == '501') {
					$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Puede que falte un parámetro.)</p>').fadeIn();
				} else {
					$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Verifica el dispositivo elegido y los permisos.)</p>').fadeIn();
				}
			});
		} else {
			$('#mensaje').html('<h3 class="error">¡Cuidado! Pin erróneo.</h3><p>(Ayuda: Escribe un número entre 0 y 3.)</p>').fadeIn();
		}
	} else {
		$('#mensaje').html('<h3 class="error">¡Cuidado! No haz especificado una dirección.</h3><p>(Ayuda: Escribe una dirección válida.)</p>').fadeIn();
	}
}

function apagarLamparita() {
	$('#mensaje').hide();
	if (verificarDireccion()) {
		if (verificarPin()) {
			$('#loading').show();
			$.post(WEBROOT + "bichitos/accionar", {
				puerto : $('#puerto').val(),
				direccion : $('#direccion').val(),
				accion : '0',
				pin : $('#pin').val()
			}, function() {
				$('#loading').hide();
				$('#mensaje').html('<h3>Haz hecho clic sobre <span class="resaltar">Apagar</span>, la luz debería estar apagada ahora.</h3>').fadeIn();
				$('#lampara').empty();
				lamparita = $('<img>').attr('src', WEBROOT + "img/lamparita_off.svg").attr('class', "lamparita").attr('id', "lamparita_index_off");
				lamparita.click(function() {
					prenderLamparita();
				});
				$('#lampara').append(lamparita);
			}).error(function(data, textStatus, texto) {
				$('#loading').hide();
				if (data.status == '501') {
					$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Puede que falte un parámetro.)</p>').fadeIn();
				} else {
					$('#mensaje').html('<h3 class="error">¡Cuidado! Se ha producido un error.</h3><p>(Ayuda: Verifica el dispositivo elegido y los permisos.)</p>').fadeIn();
				}
			});
		} else {
			$('#mensaje').html('<h3 class="error">¡Cuidado! Pin erróneo.</h3><p>(Ayuda: Escribe un número entre 0 y 3.)</p>').fadeIn();
		}
	} else {
		$('#mensaje').html('<h3 class="error">¡Cuidado! No haz especificado una dirección.</h3><p>(Ayuda: Escribe una dirección válida.)</p>').fadeIn();
	}
}

/**
 * cambiarColor: recibe un elemento y le cambia los valores de los 3 colores.
 * @param {Object} elemento
 * @param {Object} rgb
 */
function cambiarColor(elemento, rgb) {
	var idElemento = $(elemento).attr('id');
	
	// $("tr[title=" + idElemento +"] > td[title=rojo]").html(rgb['r']);
	// $("tr[title=" + idElemento +"] > td[title=verde]").html(rgb['g']);
	// $("tr[title=" + idElemento +"] > td[title=azul]").html(rgb['b']);
	
	$.post(WEBROOT + "bichitos/colorin", {
				id : $(elemento).attr('id'),
				color: rgb
			}, function() {
				actualizarValores(elemento);
			}
	);
}

/**
 * actualizarValores
 * @param {Object} elemento
 */
function actualizarValores(elemento) {
	var elementoId = $(elemento).attr('id');
	var url = WEBROOT + "bichitos/get_bichito/" + elementoId;
	
	/* Se obtienen los valores del bichito */
	$.getJSON(url, function(data) {
		console.log(data);
		$("tr[title=" + elementoId +"] > td[title=rojo]").html(data.intensidadRojo);
		$("tr[title=" + elementoId +"] > td[title=verde]").html(data.intensidadVerde);
		$("tr[title=" + elementoId +"] > td[title=azul]").html(data.intensidadAzul);
		$("tr[title=" + elementoId +"] > td[name=potenciaRojo]").html(data.potenciaRojo.toFixed(3));
		$("tr[title=" + elementoId +"] > td[name=potenciaVerde]").html(data.potenciaVerde.toFixed(3));
		$("tr[title=" + elementoId +"] > td[name=potenciaAzul]").html(data.potenciaAzul.toFixed(3));
		$("tr[title=" + elementoId +"] > td[name=potenciaTotal]").html(data.potenciaTotal.toFixed(3));
	});
}