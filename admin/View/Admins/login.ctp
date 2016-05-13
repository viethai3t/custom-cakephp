<?php
$this->Form->inputDefaults(array(
    'error' => false
));
    echo $this->Form->create(null, array(
        'url' => array('controller' => 'users', 'action' => 'login')
    ));

    echo $this->Form->input('email', array('label' => 'メール'));
    echo $this->Form->input('password', array('label' => 'パスワード'));
    echo $this->Form->end('Login');
?>
