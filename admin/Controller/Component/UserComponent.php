<?php

App::uses('Component', 'Controller');
App::import('Model', 'User');

class UserComponent extends Component {

    protected $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function auth($input) {
        $user = $this->userModel->findByUsernameAndPassword($input['email'], $input['password']);
        return $user;
    }
}
