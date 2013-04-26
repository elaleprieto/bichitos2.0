jQuery ->
	window.App = {}
	# window.App.ws = io.connect('http://192.168.10.104:3000/')
	window.App.ws = io.connect('http://192.168.10.84:3000/')
	# window.App.ws = io.connect('http://colectivolibre.com.ar:3000/')

	window.App.ws.on 'colorChanged', (data) ->
		actualizarValores($('input[id="' + data.element + '"]'), data.rgb)
		colorBox = $('.selector[data-id="' + data.element + '"] > a')
		$(colorBox).css('backgroundColor', rgb2hexNode(data.rgb.r, data.rgb.g, data.rgb.b))

window.broadcastChange = (element, rgb) ->
	window.App.ws.emit('colorChanged', {element: element, rgb: rgb})

rgb2hexNode = (r, g, b) ->
	return "#" +
		("0" + parseInt(r,10).toString(16)).slice(-2) +
		("0" + parseInt(g,10).toString(16)).slice(-2) +
		("0" + parseInt(b,10).toString(16)).slice(-2)
