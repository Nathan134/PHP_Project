
<h1>Notes</h1>
<table>
<?php foreach ($notes as $note): ?>
<tr>
	
<td><?php echo $note['Note']['body'];?></td>
<tr>
	
<?php endforeach; ?>
</table>
<?php echo "<hr>" ;?>
   
    
    <?php unset($post); ?>
</table>
