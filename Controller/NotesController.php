<?php
class NotesController extends AppController 
{
	
	public $helpers = array('Html', 'Form');

	var $name = 'Notes';
	var $components = array('Session','Paginator');
	
	

	    public $paginate = array(
	        'fields' => array('Note.id', 'Note.title','Note.topic'),
	        'limit' => 25,
	        'order' => array(
	        'Post.title' => 'asc'
	        )
	    );
	
	function index() 
	{
		$this->Note->recursive = 0;
		$this->set('notes', $this->paginate());
		$notes = $this->paginate('Note');
		
		
	}

	function view($id = null) 
	{
		
	        $notes = $this->Note->find('all', array(
	        	'conditions' => array('Note.user_id' => $this->Auth->User('id'))
	        ));
		
		if($notes == null)
		{
			$this->Session->setFlash(__('You dont have any notes yet. Why not Post one.', true));
		}	
	        $this->set('notes', $notes);  
		
		
                
		
		
            
	}
	
	/*//HTML Notes
	function html($id = null) 
	{
		
	        $notesHtml = $this->Note->find('all', array(
	        	'conditions' => array('Note.user_id' => $this->Auth->User('id'),
									'Note.topic'=>"HTML")
	        ));
		
		if($notesHtml == null)
		{
			$this->Session->setFlash(__('You dont have any notes yet. Why not Post one.', true));
		}	
	        $this->set('noteHtml', $notesHtml);  
	}

	//JAVASCRIPT Notes
	function javascript($id = null) 
	{
		
	        $notesJavascript = $this->Note->find('all', array(
	        	'conditions' => array('Note.user_id' => $this->Auth->User('id'),
									'Note.topic'=>"Javascript")
	        ));
		
		if($notesJavascript == null)
		{
			$this->Session->setFlash(__('You dont have any notes yet. Why not Post one.', true));
		}	
	        $this->set('noteJavascript', $notesJavascript);  
	}
		
	//PHP Notes
	function php($id = null) 
	{
		
	        $notesPhp = $this->Note->find('all', array(
	        	'conditions' => array('Note.user_id' => $this->Auth->User('id'),
									'Note.topic'=>"Javascript")
	        ));
		
		if($notesPhp == null)
		{
			$this->Session->setFlash(__('You dont have any notes yet. Why not Post one.', true));
		}	
	        $this->set('notePhp', $notesPhp);  
	}
	*/
	function add()
	{
		if ($this->request->is('post')) 
		{
			$this->Note->create();
		    if ($this->Note->save($this->request->data)) 
			{
				$this->Session->setFlash(__('The note has been saved', true));
				$this->redirect('index');
			} 
			else 
			{
				$this->Session->setFlash(__('The note could not be saved. Please, try again.', true));
			}
		}
		 $this->set('topics', $this->Note->find('list'));
		
	}
	
	function view_note()
	{
		
		$note = $this->paginate('Note');
	    $notes = $this->Note->find('all', array(
	        	'conditions' => array('Note.user_id' => $this->Auth->User('id'),
									'Note.topic'=>$this->params['named']['topic_id'])
	        ));
		
		if($notes == null)
		{
			$this->Session->setFlash(__('You dont have any notes yet. Why not Post one.', true));
		}	
	        $this->set('notes', $notes); 	
	}
	function view_this_note($id)
	{
		
	        $notesHtml = $this->Note->find('all', array(
	        	'conditions' => array('Note.user_id' => $this->Auth->User('id'),
										'Note.id'=>$id)));
		
		
	        $this->set('notes', $notesHtml);  
		
	        
	       
		
		
	}

	function edit($id) 
	{
		$data= $this->Note->findById($id);
		if ($this->request->is('post') || $this->request->is('put')) 
		{
			$this->Note->id=$id;		       
			if ($this->Note->save($this->request->data)) 
			{
				$this->Session->setFlash(__('The note has been edited', true));
				$this->redirect('index');
			} 
			else 
			{
				$this->Session->setFlash(__('The note could not be saved. Please, try again.', true));
			}
		}
		$this->request->data=$data;
		
	}

	function delete($id) 
	{
		$topic_id= isset($this->request->query['topic_id']) ? $this->request->query['topic_id'] : null;
		$this->Note->id = $id;
		if ($this->request->is('post') || $this->request->is('put'))
		{
			if($this->Note->delete())
			{
				$this->Session->setFlash(__('Note DELETED!', true));
				$this->redirect('index');
			}	
			else
			{
				$this->Session->setFlash(__('Note was not deleted', true));
			}
		}
		
		$this->redirect('index');
	}
    	function logout() 
	{
       	 $this->redirect($this->Auth->logout());
    	}
	function view_user_notes()
	{
	        $notes = $this->Note->find('all', array(
	        	'conditions' => array('User.username' => $this->params['named']['id'])
	        ));
		if($notes == null)
		{
			$this->Session->setFlash(__('Sorry no notes to view from this user', true));
		}	
	        $this->set('notes', $notes);  
		
	}
   
    
}
