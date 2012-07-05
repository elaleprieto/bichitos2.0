<div class="bichitos form">
<?php echo $this->Form->create('Bichito'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bichito'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bichito.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Bichito.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bichitos'), array('action' => 'index')); ?></li>
	</ul>
</div>
