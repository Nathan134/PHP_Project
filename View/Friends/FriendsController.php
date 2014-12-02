<?php
class FriendsController extends AppController {

	var $name = 'Friends';
	
	public $components = array('Session');
	
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('login','add');
        }

	function index() {
		$this->Friend->recursive = 0;
		$this->set('friends', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid friend', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('friend', $this->Friend->read(null, $id));
	}

	function add() {
		
		//$this->Friend->create();
	        //$friend_one = $this->request->data($this->Auth->User('username'));
		//$friend_two = $this->request->data($this->params['named']['id']);
		
		if (!empty($this->data)) {
			$this->Friend->create();
			if ($this->Friend->save($this->data)) {
				$this->Session->setFlash(__('The friend request has been sent', true));
				$this->redirect(array('controller' => 'users','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
			}
		}
		//$friends = $this->Friend->Friend->find('list');
		$this->set(compact('friends'));
		
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid friend', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Friend->save($this->data)) {
				$this->Session->setFlash(__('The friend has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Friend->read(null, $id);
		}
		$friends = $this->Friend->Friend->find('list');
		$this->set(compact('friends'));
	}

	
	
	function friend()
	{
		
		if (!empty($this->data)) {
			$this->Friend->create();
			if ($this->Friend->save($this->data)) {
				$this->Session->setFlash(__('The friend has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
			}
		}
		//$this->redirect(array('controller'=>'users','action' => 'index'));
		//$friends = $this->Friend->Friend->find('list');
		$this->set(compact('friends'));
		
        	//$friends = $this->Friend->find('all', array(
        		//'conditions' => array('Friend.friend_one' => $this->Auth->User('username'), 'Friend.friend_two' => $this->params['named']['id'])
        		//));
        	$this->set('friends', $friends);  
	}
	function show()
	{
		
		
		$friends = $this->Friend->find('all', array(
		'conditions' => array('Friend.friend_two' => $this->Auth->User('username'),'Friend.status' => 0)
		));
		
		$added = $this->Friend->find('all', array(
		'conditions' => array('Friend.friend_two' => $this->Auth->User('username'), 'Friend.status' => 1)
		));
				if($friends)
				{
					
					$this->Session->setFlash(__('You have a friend request.', true));
					$this->redirect(array('action' => 'confirm_friend'));
					$this->set('friends', $friends);  
				}
				
				else if(!$friends)
				{
					$this->Session->setFlash(__('No friends yet, you should add some', true));
				}	
				
				
				$this->set('friends', $friends);  
	}
	function show_friend()
	{
		$friends = $this->Friend->find('all', array(
		'conditions' => array('Friend.friend_two' => $this->Auth->User('username'), 'Friend.status' => 1)
		));
		$this->set('friends', $friends);  
	}
	
	function confirm_friend()
	{
		
		$friends = $this->Friend->find('all', array(
			'conditions' => array('Friend.friend_two' => $this->Auth->User('username'),'Friend.status' => 0)
		));
		$this->set('friends', $friends);  
	}
	function accept()
	{
		$value = $this->request->data['Friend']['id'];
		$data = array('id' => $value,'friend_two' =>  $this->Auth->User('username'), 'status' => 1);
		// This will update Recipe with id 10
		$this->Friend->save($data);
	}
	
	function delete() 
	{
		$value = $this->request->data['Friend']['id'];
		$this->Friend->delete($value);
		$this->Session->setFlash(__('Request denied', true));
	}
	
	function logout()
	{
		$this->redirect($this->Auth->logout());
	}
}
