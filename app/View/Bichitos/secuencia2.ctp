<?php
# Se cargan las librerías
echo $this -> Html -> script(array("jquery-1.7.1.min", 'bichitos/secuencia2', 'http://192.168.10.84:3000/socket.io/socket.io.js', 'index'));

# Se define la ruta base
		echo $this -> Html -> scriptBlock('WEBROOT="'.$this -> Html-> url('/', true).'"');
?>