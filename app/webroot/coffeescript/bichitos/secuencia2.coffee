jQuery ->
	window.App = {}
	window.App.ws = io.connect('http://192.168.10.84:3000/')
	setTimeout (-> secuencia()), 0

secuencia = () ->
	setTimeout (-> secuenciaR(1)), 0
	setTimeout (-> secuenciaG(2)), 1000
	setTimeout (-> secuenciaB(3)), 2000

	setTimeout (-> secuenciaG(1)), 3000
	setTimeout (-> secuenciaB(2)), 4000
	setTimeout (-> secuenciaR(3)), 5000

	setTimeout (-> secuenciaB(1)), 6000
	setTimeout (-> secuenciaR(2)), 7000
	setTimeout (-> secuenciaG(3)), 8000

	setTimeout (-> secuencia()), 9000

secuenciaR = (id) ->
	rgb = 
		r: 255
		g: 0
		b: 0
	# $.post WEBROOT + "bichitos/colorin", {id : id, color : rgb}, () ->
		# window.broadcastChange(id, rgb)
	window.broadcastChange(id, rgb)
	$.post WEBROOT + "bichitos/colorin", {id : id, color : rgb}

secuenciaG = (id) ->
	rgb = 
		r:0
		g:255
		b:0
	window.broadcastChange(id, rgb)
	$.post WEBROOT + "bichitos/colorin", {id : id, color : rgb}

secuenciaB = (id) ->
	rgb = 
		r: 0
		g: 0
		b: 255
	window.broadcastChange(id, rgb)
	$.post WEBROOT + "bichitos/colorin", {id : id, color : rgb}

window.broadcastChange = (element, rgb) ->
	window.App.ws.emit('colorChanged', {element: element, rgb: rgb})