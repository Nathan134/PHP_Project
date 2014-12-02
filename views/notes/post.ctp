<div class="note form">
	<h1>Notifed</h1>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Note'); ?>
    <fieldset>
        <legend><?php echo __('Type up your note'); ?></legend>
        <?php echo $this->Form->input('topic');
        echo $this->Form->input('title');
	echo $this->Form->input('text', array('type' => 'textarea'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Upload Note')); ?>

</div>
<?php
 echo $this->Html->link( "Add A New User",   array('action'=>'add') );
 echo $this->Html->link( "Logout",   array('action'=>'logout'),array('escape' => false) ); 
?>