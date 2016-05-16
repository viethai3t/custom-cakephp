<?php

class AdminsController extends AppController {

	public $components = array(
		'Session',
		'adminComponent' => array('className' => 'Admin')
	);
	public $helpers = array('Html', 'Form');

	public function login() {
		$this->render('login');
	}

	public function authAdmin() {
		if (!$this->request->is('post')){
			throw new NotFoundException('404');
		}
		$this->Admin->set($this->data);
		$isValidInput = $this->Admin->validates();
		if ($isValidInput) {
			$input = $this->request->data;
			$admin = $this->adminComponent->auth($input['Admin']);
			if (empty($admin)) {
				$this->setReturningMessage('error', 'ログインに失敗しました。');
				unset($input['Admin']['password']);
				$this->redirect(array(
						'action' => 'login',
						'?' => $input['Admin']
				));
			}
		}
	}
}
