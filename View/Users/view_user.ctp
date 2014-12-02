<h1></h1>

<?php foreach ($users as $user): ?>
	<?php echo "<h1>" . $user['User']['username'] . "</h1>"; ?>
	<?php echo $this->Html->image($user['User']['photo'],array('width'=>'200px'));?>

<?php echo $this->Form->create('Friend',array('type'=>'submit','controller'=>'friends','action'=>'add', 'user_from' => $user['User']['username'], 'user_two' => $this->params['named']['id'], 'id' => $this->params['named']['id']));?>
<?php echo $this->Form->button('Add As Friend');?>
<?php echo $this->Form->end();?>
<?php endforeach; ?>
<?php echo "<hr>" ;?>
  
    
    <?php unset($post); ?>
</table>
 