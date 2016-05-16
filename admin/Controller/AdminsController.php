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
				$this->setReturningMessage('error', Configure::read('msg')['auth_failed']);
				unset($input['Admin']['password']);
				$this->redirect(array(
						'action' => 'login',
						'?' => $input['Admin']
				));
			} else {
				$this->Session->write(Configure::read('acc_session'), $admin['Admin']);
				$this->redirect('');
			}
		}
		$this->render('login');
	}

	public function logout() {
		if ($this->Session->check(Configure::read('acc_session'))) {
			$this->Session->destroy();
		}
		$this->redirect('/');
	}
}
