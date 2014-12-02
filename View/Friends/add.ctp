<div class="friends form">
<?php echo $this->Form->create('Friend');?>
	<fieldset>
		<legend><?php __('Add Friend'); ?></legend>
	<?php
		echo $this->Form->input('friend_one', array('type'=>'hidden','value' => $this->Session->read('Auth.User.username')));
		echo $this->Form->input('friend_two',array('type'=>'hidden','value' => $this->params['named']['id']));
		echo $this->Form->input('status',array('type'=>'hidden','value' => 0));
	?>
	<p>Add <?php echo $this->params['named']['id'];?> as friend?</p>
	</fieldset>
	
<?php echo $this->Form->end(__('Add as Friend', true ));?>
</div>
<div class="actions">
        
</div>