<?php

class Admin extends AppModel {

    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
				'allowEmpty' => false,
                'message' => 'メールアドレスを入力してください。'
            ),
            'data_type' => array(
                'rule' => 'email',
                'message' => 'ユーザIDに誤りがあります。'
            ),
        ),
        'password' => array(
            'required' => array(
				'rule' => 'notBlank',
                'message' => 'パスワードを入力してください。'
            )
        )
    );
}
