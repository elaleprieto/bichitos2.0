jQuery ->
	secuenciaAleatoria()

window.App = {}
window.App.ws = io.connect('http://192.168.10.104:3000/')

secuenciaAleatoria = () ->
	bichitoId = (Math.floor((Math.random() * 10)) % 4) + 1 # random between 1 (one) and 3 (three)
	bichitoColor = (Math.floor((Math.random() * 10)) % 3) + 1 # random between 1 (one) and 3 (three)
	red = if bichitoColor is 1 then 255 else (Math.floor((Math.random() * 1000)) % 255)
	green = if bichitoColor is 2 then 255 else (Math.floor((Math.random() * 1000)) % 255)
	blue = if bichitoColor is 3 then 255 else (Math.floor((Math.random() * 1000)) % 255)
	rgb = 
		r: red
		g: green
		b: blue
	window.broadcastChange(bichitoId, rgb)
	$.post WEBROOT + "bichitos/colorin", {id : bichitoId, color : rgb}, () ->
		secuenciaAleatoria()

window.broadcastChange = (element, rgb) ->
	window.App.ws.emit('colorChanged', {element: element, rgb: rgb})
		



