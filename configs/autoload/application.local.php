<?php
// Local identities configuration settings on $config variable
$config = array(
	'database'=>array(
        'user'=>'php',
        'password'=>'1234',
	    'database'=>'usuarios'
    ),
    'repository'=>'db',
    'adapter'=>'\Core\Adapters\Mysql',
    'filename'=> 'usuarios.txt',
    'default_controller'=>'index',
    'default_action'=>'index'
);
