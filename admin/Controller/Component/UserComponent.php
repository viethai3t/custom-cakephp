<?php

App::uses('Component', 'Controller');
App::import('Model', 'User');

class UserComponent extends Component {

    public function auth($input) {
        $model = new User();
        $user = $model->findByUsernameAndPassword($input['email'], $input['password']);
        return $user;
    }
}