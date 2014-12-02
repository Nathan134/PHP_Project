<h1>Users</h1>
<table>
<?php foreach ($users as $user): ?>

<tr>
		
<td><?php echo $this->Html->link($user['User']['username'], array('controller' => 'users', 'action'=>'view_user','id' => $user['User']['username']));?></td>
<td><?php echo $this->Html->image($user['User']['photo'],array('width'=>'50px'));?></td>
<tr>
	
<?php endforeach; ?>
</table>
<?php echo "<hr>" ;?>
   
    
    <?php unset($post); ?>
</table>
 