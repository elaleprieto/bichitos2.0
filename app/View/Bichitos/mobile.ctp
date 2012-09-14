<?php
# Se cargan los estilos
echo $this -> Html -> css(array('minicolors/jquery.miniColors', 'bichitos/mobile'));

# Se cargan las librerías
echo $this -> Html -> script('minicolors/jquery.miniColors');
?>
<div>
	<?php foreach ($bichitos as $bichito): ?>
		<div class="color">
			<input class="colorSelector" type="hidden" id="<?=$bichito['Bichito']['id'] ?>" 
				value="rgb(<?php echo h($bichito['Bichito']['intensidadRojo']); ?>,<?php echo h($bichito['Bichito']['intensidadVerde']); ?>,<?php echo h($bichito['Bichito']['intensidadAzul']); ?>)"/>
		</div>
	<?php endforeach; ?>
</div>