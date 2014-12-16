<?php

function validateForm($formDefinition, $formPost)
{    
    $valid = true;
    $error = array();
    foreach ($formDefinition as $key => $formelement)
    {
        foreach ($formelement['validation'] as $validation)
        {
            
        
            switch($validation)
            {
                case 'required':
                    if(!isset($formPost[$key])){
                        $valid = false;
                        $error[]=$validation;
                    }
                break;
                case 'integer':
                     if(!is_numeric($formPost[$key])){  
                         $valid = false;
                        $error[]=$validation;
                     }
                 break;
                 case 'password':
                     if(strlen($formPost[$key])<8 || !preg_match('`[A-Z]`',$formPost[$key])){
                         $valid = false;
                        $error[]=$validation;
                     }
                 break;
                
            }
        }               
    }
    return array( 'valid'=>$valid,'error' => $error);
}