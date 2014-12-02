<div class="users form">
<div class="well">
<?php echo $this->Form->create('User', array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data')); 
?>

    <fieldset>
	
        <legend><?php echo __('Register'); ?></legend>
	<table>
	<tr><td><?php echo $this->Form->input('username');?></td></tr>
        <tr><td><?php echo $this->Form->input('email');?></td></tr>
        <tr><td><?php echo $this->Form->input('password');?></td></tr>
       <tr><td><?php echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));?></td></tr>
	<tr><td><?php echo $this->Form->input('photo', array('type' => 'file'));?></td></tr>
	<tr><td><?php echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') );?></td></tr>
	</table>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
</div>
<?php
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') );
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') );
}
?>