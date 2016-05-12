<?php

class User extends AppModel {

    public $validate = array(
        'email' => array(
            'required' => array(
                'required' => true,
                'message' => 'email is required'
            ),
            'data_type' => array(
                'rule' => 'email',
                'message' => 'valid email is required'
            ),
            'length' => array('lengthBetween', 5, 15),
        ),
        'password' => array(
            'required' => true,
            'message' => ''
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
