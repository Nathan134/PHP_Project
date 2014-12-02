<class="users form">
<div><header>
<?php echo $this->Html->image($this->Session->read('Auth.User.photo'),array('width'=>'200px')); ?>
<h2>Welcome <?php print $this->Session->read('Auth.User.username'); ?></h2>
</header>
</div>
<br/>
<br/>
<br/>
<table>
	<tr>
		<td><?php echo $this->Html->link("HTML",   array('controller'=>'notes','action'=>'view_note','topic_id'=>'HTML')); ?> </td>
	</tr>
	<tr>
		<td><?php echo $this->Html->link("Javascript",   array('controller'=>'notes','action'=>'view_note','topic_id'=>'JAVASCRIPT' )); ?> </td>
	</tr>
	<tr>
		<td><?php echo $this->Html->link("PHP",   array('controller'=>'notes','action'=>'view_note','topic_id'=>'PHP')); ?> </td>
	</tr>
</table>






