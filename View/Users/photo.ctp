<div class="users form">
<h1>Notifed</h1>


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
<div> 
<div class="images-form">
<?php echo $this->Form->create('User', array('url' => array('action' => 'photo'), 'enctype' => 'multipart/form-data')); ?>
<?php echo $this->Form->input('upload', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Add Image'); ?></legend>
        <?php

        echo $this->Form->input('photo', array('type' => 'file'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="image-display">
<?php 

//if is set imageName show uploaded picture

if(isset($data['User']['image'])) {
echo $this->Html->image('uploads/users/' . $data['User']['image']); 
}
?>
</div>
</div>
 </div>    