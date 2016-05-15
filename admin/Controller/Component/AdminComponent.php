<?php

App::uses('Component', 'Controller');
App::import('Model', 'Admin');

class AdminComponent extends Component {

    protected $adminModel;

    public function __construct() {
        $this->adminModel = new Admin();
    }

    public function auth($input) {
        $admin = $this->adminModel->findByEmailAndPassword($input['email'], $input['password']);
        return $admin;
    }
}
