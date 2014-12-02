<div class="span4">
	<div class="well">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User'); ?>
		    <fieldset>
		        <legend><?php echo __('Please enter your username and password to login'); ?></legend>
		        <?php echo $this->Form->input('username');
		        echo $this->Form->input('password');
		    ?>
		    </fieldset>
		    
		<?php
		echo $this->Form->end(__('Login'));
		echo $this->Html->link( "Not a User! Click to Register",array('action'=>'add') );
		?>
	</div>
</div>
<?php
 
?>


