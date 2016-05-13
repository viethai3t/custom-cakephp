<?php

class UsersController extends AppController {

	public $components = array(
		'Session',
		'UserComponent' => array('className' => 'User')
	);
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->render('login');
	}

	public function login() {

		$valid = $this->User->validates();
		if ($valid) {

		} else {
			$errors = $this->User->validationErrors;
		}
		$input = $this->request->data;
		$user = $this->UserComponent->auth($input['User']);
		if (!empty($user)) {
		}
	}
}
