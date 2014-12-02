<div class="users form">
<h1>Notifed</h1>
<?php echo $this->Html->image('blank.jpg', array('alt' => 'Profile','height' => 85, 'width' => 75));?>

<h2>Welcome <?php print $this->Session->read('Auth.User.username'); ?></h2>

<?php echo "<hr>"; ?>
<?php
$this->$file = 'files/note.txt';
$this->$content = file_get_contents($file);

echo $this->$form->input('content', array('type' => 'textarea', 'value' => $content));
?>
  </div>    