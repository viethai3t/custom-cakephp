<?php foreach($users as $user):?>
<h5> <?php echo $this->Html->link($user['User']['email'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?> </h5>

<?php endforeach; ?>