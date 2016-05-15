<?php

class Admin extends AppModel {

    public $validate = array(
        'email' => array(
            'required' => array(
                'required' => true,
                'message' => 'Please enter your email'
            ),
            'data_type' => array(
                'rule' => 'email',
                'message' => 'Please enter an valid email'
            ),
        ),
        'password' => array(
            'required' => array(
                'required' => true,
                'message' => 'Please enter your password'
            ),
            'length' => array(
                'rule' => array('minLength', 8),
                'message' => 'length of password must be at least 8 chars'
            )
        )
    );

    public function findByUsernameAndPassword($username, $password) {
        return $this->find('first',
            array('conditions' => array(
                'email' => $username,
                'password' => $password
            )
        ));
    }

}
