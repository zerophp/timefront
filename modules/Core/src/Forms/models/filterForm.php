<?php

/**
 * Filtrado de campos de formularios
 * @param unknown $userForm
 * @param unknown $post
 * @return string
 */

function filterForm($userForm, $post)
{
    foreach($post as $key => $value)
    {
        foreach($userForm[$key]['filters'] as $filter)
        switch($filter){
            case ('stripTrim'):
                $value = trim($value);
            break;                                    
            case ('escape'):
                 $value = htmlentities($value);
            break; 
            case ('stripTags'):
                $value = strip_tags($value);
            break;
        }          
        $post[$key] = $value;       
    }
    return $post;
}
