
<h1><?php echo $this->params['named']['id']; ?> Notes</h1>
<table>
</div>
<br/>
<br/>
<br/>
<table>
	<tr>
		<td><?php echo $this->Html->link("HTML",   array('controller'=>'notes','action'=>'view_user_note_topic', 'topic_id'=>'HTML', 'id'=>$this->params['named']['id'])); ?> </td>
	</tr>
	<tr>
		<td><?php echo $this->Html->link("Javascript",   array('controller'=>'notes','action'=>'view_user_note_topic','topic_id'=>'JAVASCRIPT', 'id'=>$this->params['named']['id'])); ?> </td>
	</tr>
	<tr>
		<td><?php echo $this->Html->link("PHP",   array('controller'=>'notes','action'=>'view_user_note_topic','topic_id'=>'PHP', 'id'=>$this->params['named']['id'])); ?> </td>
	</tr>
</table>

