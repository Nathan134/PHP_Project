
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
<?php foreach ($notes as $note): ?>
<tr>
	<td><?php echo $note['Note']['title'];?></td>
	<td><?php echo $this->Html->link('Open', array('controller' => 'notes', 'action'=>'view_this_note', $note['Note']['id']));?></td>
	<td><?php echo $note['Note']['created'] ;?></td>
	<td><?php echo $note['Note']['modified'] ;?></td>
	<td><?php echo $this->Html->link('Edit', array('controller' => 'notes', 'action'=>'edit', $note['Note']['id']));?></td>
	<td><?php echo $this->Form->postLink('Delete', array('controller' => 'notes', 'action' =>
                'delete', $note['Note']['id']), array('confirm' => 'Are you sure you want to delete this topic?')) ;?></td>
</tr>
	
<?php endforeach; ?>
</table>
<?php echo "<hr>" ;?>
   
    
    <?php unset($post); ?>
</table>