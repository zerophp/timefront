<?php
// Global identities configuration settings on $config variable
$config = array(
	'database'=>array(
        'user'=>'username',
        'password'=>'password',
        'host'=>'localhost',
        'database'=>'timeline_db'
    ),
    'repository'=>'db|txt|gd',
    'layout'=>'timeline',
    'default_controller'=>'timeline',
    'default_action'=>'display'
);
