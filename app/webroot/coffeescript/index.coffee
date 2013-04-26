jQuery ->
	window.App = {}
	# App.ws = io.connect('/')
	window.App.ws = io.connect('http://192.168.10.84:3000/')
  # window.App.ws = io.connect('http://colectivolibre.com.ar:3000/')

	# App.ws.on 'ready', () ->
		# console.log 'WebSockets Listos!'
		# App.ws.emit('color', 'rojo')
		
	# App.ws.on 'color', (color) ->
      # console.log 'Color recibido: ' + color
	
	window.App.ws.on 'colorChanged', (data) ->
      console.log 'Elemento: ' + data.element, 'Color recibido: ' + data.rgb
      colorBox = $('.selector[data-id="' + data.element + '"] > a')
      console.log rgb2hexNode(data.rgb.r, data.rgb.g, data.rgb.b)
      $(colorBox).css('backgroundColor', rgb2hexNode(data.rgb.r, data.rgb.g, data.rgb.b))

window.broadcastChange = (element, rgb) ->
	window.App.ws.emit('colorChanged', {element: element, rgb: rgb})

rgb2hexNode = (r, g, b) ->
 # rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
 return "#" +
  ("0" + parseInt(r,10).toString(16)).slice(-2) +
  ("0" + parseInt(g,10).toString(16)).slice(-2) +
  ("0" + parseInt(b,10).toString(16)).slice(-2)
