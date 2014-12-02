<div class="note_form">
	
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Note'); ?>
    <fieldset>
        <legend><?php echo __('Edit note'); ?></legend>
        <?php 
	echo $this->Html->script('ckeditor/ckeditor.js');
	echo $this->Form->input('topic',array('type'=>'select', 'options' => array('PHP' => 'PHP', 'Javascript' => 'Javascript', 'Html' =>'Html')));
        echo $this->Form->input('title');
	echo $this->Form->input('body', array('type'=>'textarea','class' => 'ckeditor'));
	echo $this->Form->input('user_id', array('type' => 'hidden','value'=>$this->Session->read('Auth.User.id')));
	echo $this->Form->end('Create Note');
    ?>
    </fieldset>

</div>