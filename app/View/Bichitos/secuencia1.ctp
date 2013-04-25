<?php
# Se cargan las librerías
echo $this -> Html -> script(array("jquery-1.7.1.min", 'bichitos/secuencia1'));

# Se define la ruta base
		echo $this -> Html -> scriptBlock('WEBROOT="'.$this -> Html-> url('/', true).'"');
?>