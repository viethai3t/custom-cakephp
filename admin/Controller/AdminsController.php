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
		if (!$this->request->is('post')){
			throw new NotFoundException('404');
		}
		$this->Admin->set($this->data);
		$isValidInput = $this->Admin->validates();
		if ($isValidInput) {
			$input = $this->request->data;
			$admin = $this->adminComponent->auth($input['Admin']);
			if (empty($admin)) {
				$this->Flash->set('ログインに失敗しました。', ['key' => 'msgContent']);
				$this->Flash->set('error', ['key' => 'msgType']);
			}
		}
	}
}
