<div class="bichitos form">
<?php echo $this->Form->create('Bichito'); ?>
	<fieldset>
		<legend><?php echo __('Add Bichito'); ?></legend>
	<?php
		echo $this->Form->input('direccion');
		echo $this->Form->input('estado');
		echo $this->Form->input('intensidadAzul');
		echo $this->Form->input('intensidadRojo');
		echo $this->Form->input('intensidadVerde');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bichitos'), array('action' => 'index')); ?></li>
	</ul>
</div>
