<h1>Friends</h1>
<table>
<?php foreach ($friends as $friend): ?>

<tr><td><?php echo "<hr>" ;?></td></tr>
<tr>
		
<td><?php echo $this->Html->link($friend['Friend']['friend_one'] . "- View Their Notes",array('controller' => 'notes', 'action'=>'view_user_notes','id' => $friend['Friend']['friend_one']));?></td>

<tr>
	
<?php endforeach; ?>
</table>

   
