<?php
// Global identities configuration settings on $config variable
$config = array(
	'database'=>array(
        'user'=>'username',
        'password'=>'password',
        'host'=>'localhost',
        'database'=>'cruddb_db'
    ),
    'repository'=>'db|txt|gd',
    'layout'=>'dashboard',
    'filename'=> 'usuarios.txt',
    'default_controller'=>'index',
    'default_action'=>'index'
);
