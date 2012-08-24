<div class="bichitos form">
<?php echo $this -> Form -> create('Bichito'); ?>
	<fieldset>
		<legend><?php echo __('Editar Bichito'); ?></legend>
	<?php
	echo $this -> Form -> input('id');
	echo $this -> Form -> input('direccion', array('label' => 'Dirección'));
	echo $this -> Form -> input('estado', array('label' => 'Estado'));
	echo $this -> Form -> input('intensidadRojo', array('label' => 'Intensidad del Color Rojo'));
	echo $this -> Form -> input('intensidadVerde', array('label' => 'Intensidad del Color Verde'));
	echo $this -> Form -> input('intensidadAzul', array('label' => 'Intensidad del Color Azul'));
	?>
	</fieldset>
<?php echo $this -> Form -> end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $this -> Form -> value('Bichito.id')), null, __('¿Está seguro que quiere eliminar el Bichito # %s?', $this -> Form -> value('Bichito.id'))); ?></li>
		<li><?php echo $this -> Html -> link(__('Listar Bichitos'), array('action' => 'index')); ?></li>
	</ul>
</div>
