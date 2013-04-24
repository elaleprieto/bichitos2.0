<?php
# Se cargan los estilos
echo $this -> Html -> css(array('minicolors/jquery.miniColors', 'bichitos/index'));

# Se cargan las librerías
echo $this -> Html -> script(array('minicolors/jquery.miniColors', 'http://192.168.10.104:3000/socket.io/socket.io.js', 'index'), FALSE);
?>
<div class="bichitos index">
	<h2><?php echo __('Bichitos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this -> Paginator -> sort('id'); ?></th>
			<th><?php echo $this -> Paginator -> sort('direccion', 'Dirección'); ?></th>
			<th><?php echo $this -> Paginator -> sort('estado'); ?></th>
			<th><?php echo $this -> Paginator -> sort('intensidadRojo', 'Rojo'); ?></th>
			<th><?php echo $this -> Paginator -> sort('intensidadVerde', 'Verde'); ?></th>
			<th><?php echo $this -> Paginator -> sort('intensidadAzul', 'Azul'); ?></th>
			<th><?php echo $this -> Paginator -> sort('potenciaRojo', 'Potencia Rojo [W]'); ?></th>
			<th><?php echo $this -> Paginator -> sort('potenciaVerde', 'Potencia Verde [W]'); ?></th>
			<th><?php echo $this -> Paginator -> sort('potenciaAzul', 'Potencia Azul [W]'); ?></th>
			<th><?php echo $this -> Paginator -> sort('potenciaTotal', 'Potencia Total [W]'); ?></th>
			<th>Color</th>
	</tr>
	<?php
	foreach ($bichitos as $bichito): ?>
	<tr title="<?=$bichito['Bichito']['id'] ?>">
		<td><?php echo h($bichito['Bichito']['id']); ?>&nbsp;</td>
		<td><?php echo h($bichito['Bichito']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($bichito['Bichito']['estado']); ?>&nbsp;</td>
		<td title="rojo"><?php echo h($bichito['Bichito']['intensidadRojo']); ?>&nbsp;</td>
		<td title="verde"><?php echo h($bichito['Bichito']['intensidadVerde']); ?>&nbsp;</td>
		<td title="azul"><?php echo h($bichito['Bichito']['intensidadAzul']); ?>&nbsp;</td>
		<td name="potenciaRojo"><?php echo sprintf('%.3f', $bichito['Bichito']['potenciaRojo']); ?>&nbsp;</td>
		<td name="potenciaVerde"><?php echo sprintf('%.3f', $bichito['Bichito']['potenciaVerde']); ?>&nbsp;</td>
		<td name="potenciaAzul"><?php echo sprintf('%.3f', $bichito['Bichito']['potenciaAzul']); ?>&nbsp;</td>
		<td name="potenciaTotal"><?php echo sprintf('%.3f', $bichito['Bichito']['potenciaTotal']); ?>&nbsp;</td>
		<td class="selector" data-id="<?=$bichito['Bichito']['id'] ?>">
			<input class="colorSelector" type="hidden" id="<?=$bichito['Bichito']['id'] ?>" 
				value="rgb(<?php echo h($bichito['Bichito']['intensidadRojo']); ?>,<?php echo h($bichito['Bichito']['intensidadVerde']); ?>,<?php echo h($bichito['Bichito']['intensidadAzul']); ?>)"/>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
