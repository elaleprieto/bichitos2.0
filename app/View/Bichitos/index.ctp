<?php
# Se cargan los estilos
// echo $this -> Html -> css('colorpicker/colorpicker');
echo $this -> Html -> css('minicolors/jquery.miniColors');

# Se cargan las librerías
// echo $this -> Html -> script('colorpicker/colorpicker');
echo $this -> Html -> script('minicolors/jquery.miniColors');
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
			<th class="actions"><?php echo __('Acciones'); ?></th>
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
		<td>
			<!-- <div class="colorSelector" id="<?=$bichito['Bichito']['id'] ?>" title="Clic aquí para cambiar el color.">
				<div style="background-color: #0000ff"></div>
			</div> -->
			<input class="colorSelector" type="hidden" id="<?=$bichito['Bichito']['id'] ?>"/>
		</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $bichito['Bichito']['id'])); ?>
			<?php echo $this -> Html -> link(__('Editar'), array('action' => 'edit', $bichito['Bichito']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Borrar'), array('action' => 'delete', $bichito['Bichito']['id']), null, __('¿Está seguro que quiere eliminar el Bichito # %s?', $bichito['Bichito']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this -> Paginator -> counter(array('format' => __('Página {:page} de {:pages}, mostrando el registro {:current} de un total de {:count}, empezando en el registro {:start}, terminando en {:end}.')));
	?>	</p>

	<div class="paging">
	<?php
	echo $this -> Paginator -> prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> numbers(array('separator' => ''));
	echo $this -> Paginator -> next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Crear Bichito'), array('action' => 'add')); ?></li>
	</ul>
</div>
