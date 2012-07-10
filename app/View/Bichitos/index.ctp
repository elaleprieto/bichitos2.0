<?php
//<link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
echo $this -> Html -> css('colorpicker/colorpicker');

//<script type="text/javascript" src="js/colorpicker.js"></script>
echo $this -> Html -> script('colorpicker/colorpicker');
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
		<td>
			<div class="colorSelector" id="<?=$bichito['Bichito']['id'] ?>" title="Clic aquí para cambiar el color.">
				<div style="background-color: #0000ff"></div>
			</div>
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
