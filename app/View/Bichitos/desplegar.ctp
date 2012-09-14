<?php
# Se cargan los estilos
echo $this -> Html -> css(array('minicolors/jquery.miniColors', 'bichitos/desplegar'));

# Se cargan las librerías
echo $this -> Html -> script('minicolors/jquery.miniColors');
?>
<div class="bichitos index">
	<fieldset>
	<legend><?php echo __('Panel de Control'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?='Estructura' ?></th>
			<th><?='Rojo' ?></th>
			<th><?='Verde' ?></th>
			<th><?='Azul' ?></th>
			<th><?='Potencia Total [W]' ?></th>
			<th>Color</th>
	</tr>
	<?php
	foreach ($bichitos as $bichito): ?>
	<tr title="<?=$bichito['Bichito']['id'] ?>">
		<td><?php echo h($bichito['Bichito']['id']); ?>&nbsp;</td>
		<td title="rojo"><?php echo h($bichito['Bichito']['intensidadRojo']); ?>&nbsp;</td>
		<td title="verde"><?php echo h($bichito['Bichito']['intensidadVerde']); ?>&nbsp;</td>
		<td title="azul"><?php echo h($bichito['Bichito']['intensidadAzul']); ?>&nbsp;</td>
		<td name="potenciaTotal"><?php echo sprintf('%.3f', $bichito['Bichito']['potenciaTotal']); ?>&nbsp;</td>
		<td class="selector">
			<input class="colorSelector" type="hidden" id="<?=$bichito['Bichito']['id'] ?>" 
				value="rgb(<?php echo h($bichito['Bichito']['intensidadRojo']); ?>,<?php echo h($bichito['Bichito']['intensidadVerde']); ?>,<?php echo h($bichito['Bichito']['intensidadAzul']); ?>)"/>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</fieldset>
</div>
