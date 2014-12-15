<?php

function __autoload($class_name)
{
    $class_name = explode("\\", $class_name);
    
    $path ='';
    $file = array_pop($class_name);
    foreach ($class_name as $value)
    {
        $path .= $value."/";
    }
    $module = array_shift($class_name);
    
    $path .= $file.".php";
    
    include "../Modules/".$module."/Src/".$path;    
}