
<h1>Notes</h1>
<table>
  <tr><td><u>TOPIC TITLE</u></td></tr>
<?php foreach ($notes as $note): ?>
        <tr><td>
   	     	<?php echo $note['Note']['topic']; ?>
		<?php echo $note['Note']['title']; ?>
		<?php echo $this->Html->link($note['Note']['title'], array('controller' => 'notes', 'action'=>'view_this_note','id' => $note['Note']['title']));?>
	</td></tr>
<?php endforeach; ?>
	
    </tr>
    
    <?php unset($post); ?>
</table>