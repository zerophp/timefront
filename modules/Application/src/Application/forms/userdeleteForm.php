<?php
/**
 * @param type: text|password|textarea|radio|checkbox|select|selectmultiple|submit|button|file
 * @param filters: stripTrim|stripTags|scape
 * @param validate: required|email|integer|inArray|password
 */

$userdeleteForm = array(
    'ask'=> array(
        'type'=>'html',
        'name'=>'id',
        'value'=>'Seguro que deseas borrar a:',
        'label'=>'',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags', 'escape'),
        'validation'=>array()
    ),
    'id'=> array(
        'type'=>'hidden',
        'name'=>'id',
        'value'=>'',
        'label'=>'',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags', 'escape'),
        'validation'=>array()
    ),
    'lastname'=> array(
        'type'=>'html',
        'name'=>'lastname',
        'value'=>'',
        'label'=>'Apellidos',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags', 'escape'),
        'validation'=>array()
    ),
    'name'=> array(
        'type'=>'html',
        'name'=>'name',
        'value'=>'',
        'label'=>'Nombre',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags', 'escape'),
        'validation'=>array()
    ),
    'si'=> array(
        'type'=>'submit',
        'name'=>'borrar',        
        'value'=>'Si',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('submit'),
        'validation'=>array('')
    ),
    'no'=> array(
        'type'=>'submit',
        'name'=>'borrar',        
        'value'=>'No',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('submit'),
        'validation'=>array('')
    ),
    'token'=> array(
        'type'=>'hidden',
        'name'=>'token',
        'value'=>'',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'validation'=>array()
    ),
);
