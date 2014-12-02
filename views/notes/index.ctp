<?php foreach ($notes as $note): ?>
	
	<?php endforeach; ?>
<div class="note form">
	<h1>Notifed</h1>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Note',array('action'=>'add')); ?>
    <fieldset>
        <legend><?php echo __('Type up your note'); ?></legend>
        <?php 
	echo $this->Form->input('topic',array('type'=>'select', 'options' => array('PHP','Javascript','Html')));
        echo $this->Form->input('title');
	echo $this->Form->input('text', array('type' => 'textarea'),'text');
	echo $this->Form->input('path', array('type' => 'hidden','value'=>'files/'));
	echo $this->Form->input('user_id', array('type' => 'hidden','value'=>$this->Session->read('Auth.User.id')));
	
    ?>
    </fieldset>
    
    <?php echo $form->create('Post',array('action'=>'search'));?>
        <fieldset>
            <legend><?php __('Post Search');?></legend>
        <?php
            echo $form->input('Search.keywords');
            echo $form->input('Search.id');
            echo $form->input('Search.name',array('after'=>__('wildcard is *',true)));
            echo $form->input('Search.body',array('after'=>__('wildcard is *',true)));
            echo $form->input('Search.active',array(
                'empty'=>__('Any',true),
                'options'=>array(
                    0=>__('Inactive',true),
                    1=>__('Active',true),
                ),
            ));
            echo $form->input('Search.created', array('after'=>'eg: >= 2 weeks ago'));
            echo $form->input('Search.category_id');
            echo $form->input('Search.tag');
            echo $form->input('Search.tag_id');
            echo $form->submit('Search');
        ?>
        </fieldset>
    <?php echo $form->end();?>
    
    <?php echo $this->Form->end(__('Upload Note',array('controller'=>'notes','action'=>'add'))); ?>
    
    <?php echo $this->Html->link( "Home",   array('controller'=>'users','action'=>'index')); ?>
    <?php echo "<hr>" ;?>
    <?php echo $this->Html->link( "Logout",   array('action'=>'logout'),array('escape' => false) ); ?>
	

