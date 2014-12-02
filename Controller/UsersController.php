<?php
class UsersController extends AppController {
 
	var $name = 'Users';
	
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' )
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add');
    }
     
 
 
    public function login() {
         
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));     
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        }
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
	
        $this->paginate = array(
            'limit' => 6,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
	
        $users = $this->User->find('all');
       
        $this->set('users', $users);  
	
    }
   
	
	
 
 
    public function add() 
    {
	
        if ($this->request->is('post')) 
	{
                 
            $this->User->create();
            if ($this->User->save($this->request->data)) 
	    {
                $this->Session->setFlash(__('The user has been created'));
                $this->redirect(array('action' => 'index'));
            } 
	    else 
	    {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }  
	    
	    
		   
        }
	
	if(!empty($this->request->data))
	        {
	                //Check if image has been uploaded
	                if(!empty($this->request->data['User']['upload']['name']))
	                {
	                        $file = $this->request->data['User']['upload']; //put the data into a var for easy use
			
	                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
	                        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

	                        //only process if the extension is valid
	                        if(in_array($ext, $arr_ext))
	                        {
	                                //do the actual uploading of the file. First arg is the tmp name, second arg is 
	                                //where we are putting it
	                                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);

	                                //prepare the filename for database entry
	                                $this->data['User']['image'] = $file['name'];
	                        }
	                }

	                //now do the save
	                if($this->User->save($this->data)) 
			{
				$data = $this->User->find('all', array('fields' => array('User.image')));
				$this->Session->write('User.photo', $file['name']);
			}
	        }
       
    }
   
 
    public function edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash('Invalid User ID Provided');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function view()
    {
        $users = $this->User->find('all');
        $this->set('users', $users);  
    }
    public function view_user()
    {
            $users = $this->User->find('all', array('conditions' => array('User.username' => $this->params['named']['id'])));
            $this->set('users', $users);  
	    $this->Session->write($this->params['named']['id']);
	    $this->redirect(array('controller'=>'friends','action' => 'add', 'id'=> $this->params['named']['id']));
		
	
    }
    
    public function search(){

       $users = $this->User->find('all', array('fields' => array('User.username','User.email','User.photo'),
           'conditions'=>array('username'. ' '.'LIKE'=>$this->request->data('User.username'))
        ));
       $this->set('users', $users);

    }
 
}