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
			if(data.status == '501') {
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
					if(data.status == '501') {
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
			$.post(WEBROOT + "bichitos/asignar_accion", {
				puerto : $('#puerto').val(),
				direccion : $('#direccion').val(),
				accion : '1',
				pin: $('#pin').val()
			}, function() {
				$('#loading').hide();
				$('#mensaje').html('<h3>Haz hecho clic sobre <span class="resaltar">Prender</span>, la luz debería estar prendida ahora.</h3>').fadeIn();
				$('#lampara').empty();
				lamparita = $('<img>').attr('src', "img/lamparita_on.svg").attr('class', "lamparita").attr('id', "lamparita_index_on");
				lamparita.click(function() {
					apagarLamparita();
				});
				$('#lampara').append(lamparita);
			}).error(function(data, textStatus, texto) {
				$('#loading').hide();
				if(data.status == '501') {
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
			$.post(WEBROOT + "bichitos/asignar_accion", {
				puerto : $('#puerto').val(),
				direccion : $('#direccion').val(),
				accion : '0',
				pin: $('#pin').val()
			}, function() {
				$('#loading').hide();
				$('#mensaje').html('<h3>Haz hecho clic sobre <span class="resaltar">Apagar</span>, la luz debería estar apagada ahora.</h3>').fadeIn();
				$('#lampara').empty();
				lamparita = $('<img>').attr('src', "img/lamparita_off.svg").attr('class', "lamparita").attr('id', "lamparita_index_off");
				lamparita.click(function() {
					prenderLamparita();
				});
				$('#lampara').append(lamparita);
			}).error(function(data, textStatus, texto) {
				$('#loading').hide();
				if(data.status == '501') {
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