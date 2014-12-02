<div>
<header>
<?php echo $this->Html->image($this->Session->read('Auth.User.photo'),array('width'=>'200px','float'=>'right')); ?>
<h2>Welcome <?php print $this->Session->read('Auth.User.username'); ?></h2>
</header>
</div>
<footer>
	<?php echo $this->Html->link("Post Note",   array('controller'=>'notes','action'=>'add')); ?> 
	<?php echo "<hr>"; ?>   
        <?php echo $this->Html->link("View notes", array('controller'=>'notes','action' => 'index'))?>
	<?php echo "<hr>"; ?>
	<?php echo $this->Html->link("Your Friends",   array('controller'=>'friends','action'=>'show')); ?> 
	<?php echo "<hr>"; ?>   
	<?php echo $this->Html->link("Search Users",   array('controller'=>'users','action'=>'search')); ?> 
	<?php echo "<hr>"; ?>
	<?php echo $this->Html->link("Who's on Notified",   array('controller'=>'users','action'=>'view')); ?> 
	
	
</footer>






