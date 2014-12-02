<?php
class Friend extends AppModel {
	var $name = 'Friend';
	var $primaryKey = 'id';
	var $displayField = 'id';
	
	var $validate = array(
		'friends_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		));
		
		
	
	
		
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Friends' => array(
			'className' => 'Friends',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Notes' => array(
			'className' => 'Notes',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
	public $hasMany = array(
		'Note' => array(
			'className' => 'Note',
			'foreignKey' => 'id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
