
<h2><?php echo $this->params['named']['topic_id']?> Notes</h2>
<table>
<tr>
	<th>Title</th>
	<th>Open</th>
	<th>created</th>
	<th>modified</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?php if(isset($notes)){foreach ($notes as $note): ?>
<tr>
	<td><?php echo $note['Note']['title'];?></td>
	<td>
	<?php if($note['Note']['visible']==0)
	{
		echo $this->Html->link('Open', array('controller' => 'notes', 'action'=>'view_this_note', $note['Note']['id']));
	}?>
	</td>
	<td><?php echo $note['Note']['created'] ;?></td>
	<td><?php echo $note['Note']['modified'] ;?></td>
</tr>
	
<?php endforeach;} ?>
</table>
