<div class="friends form">
<?php foreach ($friends as $friend): ?>	
<?php echo $this->Form->create('Friend', array('type'=>'submit','controller'=>'friends','action'=>'accept'));?>
	<fieldset>
		
		<legend><?php __('Add' . $friend['Friend']['friend_one'] . ' as friend?'); ?></legend>
	<?php
		echo 'Confirm ' . $friend['Friend']['friend_one'] . ' as a friend?';
		echo $this->Form->input('id',array('type'=>'hidden','value' => $friend['Friend']['id']));
	?>
	
	</fieldset>
<?php echo $this->Form->end(__('Add as Friend', true ));?>

<?php echo $this->Form->create('Friend' ,array('type'=>'submit','controller'=>'friends','action'=>'delete'));?>
<?php echo $this->Form->input('id',array('type'=>'hidden','value' => $friend['Friend']['id']));?>
<?php echo $this->Form->end(__('Decline', true ));?>

<?php endforeach;?>


</div>
<div class="actions">
        
</div>

