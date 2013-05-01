<?php
# Se cargan las librerías
echo $this -> Html -> script(array("jquery-1.7.1.min", 'http://192.168.10.104:3000/socket.io/socket.io.js', 'hope', 'bichitos/secuencia5'));

# Se define la ruta base
		echo $this -> Html -> scriptBlock('WEBROOT="'.$this -> Html-> url('/', true).'"');
?>