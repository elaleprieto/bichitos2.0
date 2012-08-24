<div class="bichitos form">
<?php echo $this -> Form -> create('Bichito'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Bichito'); ?></legend>
	<?php
	echo $this -> Form -> input('direccion', array('label' => 'Dirección', 'value' => '255'));
	echo $this -> Form -> hidden('estado', array('label' => 'Estado', 'value' => '0'));
	echo $this -> Form -> input('intensidadRojo', array('label' => 'Intensidad del Color Rojo', 'value' => '0'));
	echo $this -> Form -> input('intensidadVerde', array('label' => 'Intensidad del Color Verde', 'value' => '0'));
	echo $this -> Form -> input('intensidadAzul', array('label' => 'Intensidad del Color Azul', 'value' => '0'));
	?>
	</fieldset>
<?php echo $this -> Form -> end(__('Crear')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this -> Html -> link(__('Listar Bichitos'), array('action' => 'index')); ?></li>
	</ul>
</div>
