jQuery ->
	# window.App = {}
	# window.App.ws = io.connect('http://colectivolibre.com.ar:3000/')
	# window.App.ws = io.connect('http://192.168.10.104:3000/')
	# setTimeout (-> secuencia()), 0
	secuenciaChain()

window.App = {}
window.App.ws = io.connect('http://192.168.10.104:3000/')

# secuencia = () ->
	# setTimeout (-> secuenciaR(1)), 0
	# setTimeout (-> secuenciaG(2)), 600
	# setTimeout (-> secuenciaB(3)), 1200
# 
	# setTimeout (-> secuenciaG(1)), 1800
	# setTimeout (-> secuenciaB(2)), 2400
	# setTimeout (-> secuenciaR(3)), 3000
# 
	# setTimeout (-> secuenciaB(1)), 3600
	# setTimeout (-> secuenciaR(2)), 4200
	# setTimeout (-> secuenciaG(3)), 4800
# 
	# setTimeout (-> secuencia()), 5400

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

secuenciaChain = ()	->
	# CHAIN
	date = new Date()
	Hope.chain(
		[->
			secuenciaR(1)
		, (error, value) ->
			secuenciaG(2)
		, (error, value) ->
			secuenciaB(3)
		, (error, value) ->
			secuenciaG(1)
		, (error, value) ->
			secuenciaB(2)
		, (error, value) ->
			secuenciaR(3)
		, (error, value) ->
			secuenciaB(1)
		, (error, value) ->
			secuenciaR(2)
		, (error, value) ->
			secuenciaG(3)
		]).then (error, value) ->
			console.info '[chain] : ', (new Date() - date) + 'ms', error, value
			secuenciaChain()
		



