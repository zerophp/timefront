<?php

function __autoload($class)
{
    $class = explode("\\", $class);
    
    $path ='';
    $file = array_pop($class);
    foreach ($class as $value)
    {
        $path .=$value."/";
    }
    $module = array_shift($class);
    
    $path.=$file.".php";
    
    include "../modules/".$module."/src/".$path;    
}