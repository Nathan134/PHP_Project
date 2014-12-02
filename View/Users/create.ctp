<div class="users form">


<?php echo $this->Html->image('blank.jpg', array('alt' => 'Profile','height' => 85, 'width' => 75));?>

<h2>Welcome <?php print $this->Session->read('Auth.User.username'); ?></h2>
	   
<?php echo $this->Html->link("Post Note",   array('controller'=>'notes','action'=>'add')); ?> 
 <?php echo "<hr>"; ?>           
         
<?php echo $this->Html->link("View notes", array('controller'=>'notes','action' => 'history'))?>
<?php echo "<hr>"; ?>



<p>Upload your profile image</p>
<?php
/* display message saved in session if any */
echo $this->Session->flash();
?>
<?php echo $this->Form->create('User', array('url' => array('action' => 'create'), 'enctype' => 'multipart/form-data')); ?>

<?php echo $this->Form->input('upload', array('type' => 'file')); ?>
        

<?php echo $this->Form->end('Save'); ?>