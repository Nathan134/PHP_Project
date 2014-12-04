
<h1>Notes</h1>
<table>

<?php foreach ($notes as $note): ?>
	<h3>Title: <?php echo $note['Note']['title'] ;?></h3>
	<hr>
	<tr>
		<td>
		<pre style="line-height:0.8em;"><?php echo $note['Note']['body']; ?></pre>
		</td>
	<tr>
	<?php endforeach; ?>
</table>

<?php unset($post); ?>

