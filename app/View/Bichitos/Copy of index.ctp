<div class="bichitos index">
	<h2><?php echo __('Bichitos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('intensidadAzul'); ?></th>
			<th><?php echo $this->Paginator->sort('intensidadRojo'); ?></th>
			<th><?php echo $this->Paginator->sort('intensidadVerde'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($bichitos as $bichito): ?>
	<tr>
		<td><?php echo h($bichito['Bichito']['id']); ?>&nbsp;</td>
		<td><?php echo h($bichito['Bichito']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($bichito['Bichito']['estado']); ?>&nbsp;</td>
		<td><?php echo h($bichito['Bichito']['intensidadAzul']); ?>&nbsp;</td>
		<td><?php echo h($bichito['Bichito']['intensidadRojo']); ?>&nbsp;</td>
		<td><?php echo h($bichito['Bichito']['intensidadVerde']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bichito['Bichito']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bichito['Bichito']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bichito['Bichito']['id']), null, __('Are you sure you want to delete # %s?', $bichito['Bichito']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Bichito'), array('action' => 'add')); ?></li>
	</ul>
</div>
