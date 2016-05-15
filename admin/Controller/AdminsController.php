<?php

class AdminsController extends AppController {

	public $components = array(
		'Session',
		'adminComponent' => array('className' => 'Admin')
	);
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->render('login');
	}

	public function login() {


		$valid = $this->Admin->validates();
		if ($valid) {

		} else {
			$errors = $this->Admin->validationErrors;
		}
		$input = $this->request->data;
		$admin = $this->adminComponent->auth($input['Admin']);
		if (!empty($admin)) {
		}
	}
}
