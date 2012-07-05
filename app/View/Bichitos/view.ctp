<div class="bichitos view">
<h2><?php  echo __('Bichito'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bichito['Bichito']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($bichito['Bichito']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($bichito['Bichito']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IntensidadAzul'); ?></dt>
		<dd>
			<?php echo h($bichito['Bichito']['intensidadAzul']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IntensidadRojo'); ?></dt>
		<dd>
			<?php echo h($bichito['Bichito']['intensidadRojo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IntensidadVerde'); ?></dt>
		<dd>
			<?php echo h($bichito['Bichito']['intensidadVerde']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bichito'), array('action' => 'edit', $bichito['Bichito']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bichito'), array('action' => 'delete', $bichito['Bichito']['id']), null, __('Are you sure you want to delete # %s?', $bichito['Bichito']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bichitos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bichito'), array('action' => 'add')); ?> </li>
	</ul>
</div>
