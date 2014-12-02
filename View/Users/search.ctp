<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Search for a Friend'); ?></legend>
        <?php echo $this->Form->input('username');?>
        <?php echo $this->Form->submit('Search', array('class' => 'form-submit', 'title' => 'Enter a name to search','name'=>'search'));?>
    </fieldset>

    <?php foreach($users as $user) : ?>
    				<h3><?php echo $user['User']['username'];?><h3><br>
    				<?php echo "email: ".$user['User']['email'];?><br>
    				<?php echo $this->Html->image($user['User']['photo'],array('width'=>'200px'));?><br>
    		
<?php echo $this->Form->end(); ?>
<?php echo  $this->Html->link('Add Friend', array('controller' =>'friends','action'=>'add','id' => $user['User']['username']));?>
</div>
<?php endforeach; ?>
<?php
 //echo $this->Html->link( "Search for a friend",  array('action'=>'add') );
?>