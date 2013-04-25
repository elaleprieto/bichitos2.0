<?php
# Se cargan los estilos
echo $this -> Html -> css(array('minicolors/jquery.miniColors', 'bichitos/mobile'));

# Se cargan las librerías
echo $this -> Html -> script(array('minicolors/jquery.miniColors', 'http://192.168.10.104:3000/socket.io/socket.io.js', 'index'));
?>
<div>
	<?php foreach ($bichitos as $bichito): ?>
		<div class="color selector" data-id="<?=$bichito['Bichito']['id'] ?>">
			<input class="colorSelector" type="hidden" id="<?=$bichito['Bichito']['id'] ?>" 
				value="rgb(<?php echo h($bichito['Bichito']['intensidadRojo']); ?>,<?php echo h($bichito['Bichito']['intensidadVerde']); ?>,<?php echo h($bichito['Bichito']['intensidadAzul']); ?>)"/>
		</div>
	<?php endforeach; ?>
</div>