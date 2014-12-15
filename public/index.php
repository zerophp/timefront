<?php
require_once '../autoload.php';

if(isset($_SERVER['APPLICATION_ENV']))
    if($_SERVER['APPLICATION_ENV']==='development')
        ini_set('display_errors', 1);
    else
        ini_set('display_errors', 0);
    
\Core\Application\Application::setConfig(__DIR__.'/../configs/global.php');
\Core\Application\Application::bootstrap();
\Core\Application\Application::dispatch();
