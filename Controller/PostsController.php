<?php
class PostsController extends AppController
{
	var $name = 'Posts';
 
	function friend()
	{
	
        	$friends = $this->Friend->find('all', array(
        		'conditions' => array('Friend.friend_one' => $this->Auth->User('id'), 'Friend.friend_two' => $this->params['named']['id'])
        		));
        	$this->set('friends', $friends);  
	
	}
 
}