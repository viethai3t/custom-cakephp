<?php

class UsersController extends AppController {

	public $components = array(
		'Flash',
		'UserComponent' => array('className' => 'User')
	);
	public $helpers = array('Html', 'Form');

	public function index() {
		var_dump($this->User->find('all'));
		$this->render('login');
	}

	public function login() {
		$input = $this->request->data;
		$user = $this->UserComponent->auth($input['User']);
	}
}
