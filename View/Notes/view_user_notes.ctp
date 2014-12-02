
<h1><?php echo $this->params['named']['id']; ?> Notes</h1>
<table>
<tr>
	<td>Topic</td>
	<td>Title</td>
	<td>Content</td>
</tr>
<?php foreach ($notes as $note): ?>

<tr>
<td><?php echo $note['Note']['topic'];?></td>	
<td><?php echo $note['Note']['title'];?></td>	
<td><?php echo $note['Note']['body'];?></td>
<tr>
	
<?php endforeach; ?>
</table>
<?php echo "<hr>" ;?>
   
    
    <?php unset($post); ?>
</table>