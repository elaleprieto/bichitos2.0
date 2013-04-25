$(document).ready(function() {
	
	$.fn.parallax = function(options){
            var $$ = $(this);
            offset = $$.offset();
            var defaults = {
                "start": 0,
                "stop": offset.top + $$.height(),
                "coeff": 0.95
            };
            var opts = $.extend(defaults, options);
            return this.each(function(){
                $(window).bind('scroll', function() {
                    windowTop = $(window).scrollTop();  
                    if((windowTop >= opts.start) && (windowTop <= opts.stop)) {
                        newCoord = windowTop * opts.coeff;
                         
                        $$.css({
                            "background-position": "0 "+ newCoord + "px"
                        });
                    } 
                });
            });
        };
	
      $('.back').parallax({ "coeff":-1.3 });
		$('.back .middleback').parallax({ "coeff":0.50 });
		$('.back .middleback .middlefront').parallax({ "coeff":0.20 });
      

	$('.colorSelector').each(function(index, element) {
		actualizarValores(element, hexToRgb($(element).val()));
		$(this).miniColors({
			change : function(hex, rgb) {
				$(element).css('backgroundColor', '#' + hex);
				cambiarColor(element, rgb);
			}
		});
	});
	
	$(".colorSelector").miniColors({
		letterCase: 'uppercase',
		change: function(hex, rgb) {
			logData('change', hex, rgb);
		},
		open: function(hex, rgb) {
			logData('open', hex, rgb);
		},
		close: function(hex, rgb) {
			logData('close', hex, rgb);
		}
	});
	
}); 

/**
 * cambiarColor: recibe un elemento y le cambia los valores de los 3 colores.
 * @param {Object} elemento
 * @param {Object} rgb
 */
function cambiarColor(elemento, rgb) {
	var elementoId = $(elemento).attr('id');
	$.post(WEBROOT + "bichitos/colorin", {
				id : elementoId,
				color: rgb
			}, function() {
				actualizarValores(elemento, rgb);
				window.broadcastChange(elementoId, rgb);
			}
	);
}

/**
 * actualizarValores
 * @param {Object} elemento
 */
function actualizarValores(elemento, rgb) {
	var elementoId = $(elemento).attr('id');
	//Lienzo1 : Diseño
	//Lienzo2 : Sistemas
	//Lienzo3 : Hardware
	//Lienzo4 : Cultura Libre
	
	var lienza = document.getElementById('lienzo'+elementoId);
	var lienzo = lienza.getContext('2d');
	
	
	//var lienzo = $('#lienzo'+elementoId).getContext('2d');
		lienzo.fillStyle = 'rgba('+rgb['r']+', '+rgb['g']+', '+rgb['b']+',0.8)';
		lienzo.beginPath();
		
		if(elementoId == '1'){
			lienzo.moveTo(300,80);
			lienzo.lineTo(339,455);
			lienzo.lineTo(435,485);
			lienzo.lineTo(495,445);
			lienzo.lineTo(500, 72);
			lienzo.lineTo(405, 65);
		}
		if(elementoId == '2'){
			lienzo.moveTo(348,128);
			lienzo.lineTo(385,500);
			lienzo.lineTo(480,532);
			lienzo.lineTo(542,490);
			lienzo.lineTo(545, 118);
			lienzo.lineTo(455, 105);
		}
		if(elementoId == '3'){
			lienzo.moveTo(0,80);
			lienzo.lineTo(39,455);
			lienzo.lineTo(135,485);
			lienzo.lineTo(195,445);
			lienzo.lineTo(200, 72);
			lienzo.lineTo(105, 65);
		}
		if(elementoId == '4'){
			lienzo.moveTo(280,80);
			lienzo.lineTo(319,455);
			lienzo.lineTo(415,485);
			lienzo.lineTo(475,445);
			lienzo.lineTo(480, 72);
			lienzo.lineTo(385, 65);
		}
		lienzo.closePath();
		lienzo.fill();
}

// function rgb2hex(rgb){
 // rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
 // return "#" +
  // ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
  // ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
  // ("0" + parseInt(rgb[3],10).toString(16)).slice(-2);
// }

function hexToRgb(h) {
    // var r = parseInt((cutHex(h)).substring(0,2),16);
    // var g = ((cutHex(h)).substring(2, 4), 16);
    // var b = parseInt((cutHex(h)).substring(4, 6), 16);
    // return r + '' + b + '' + b;
    return {r:parseInt((cutHex(h)).substring(0,2),16), g:parseInt((cutHex(h)).substring(2, 4), 16), b:parseInt((cutHex(h)).substring(4, 6), 16)};
}

function cutHex(h) {
	return (h.charAt(0)=="#") ? h.substring(1,7) : h;
}