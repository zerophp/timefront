<?php
/**
 * @param type: text|password|textarea|radio|checkbox|select|selectmultiple|submit|button|file
 * @param filters: stripTrim|stripTags|scape
 * @param validate: required|email|integer|inArray|password
 */

$userForm = array(
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
        'type'=>'text',
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
        'type'=>'text',
        'name'=>'name',
        'value'=>'',
        'label'=>'Nombre',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags', 'escape'),
        'validation'=>array('required')
    ),
    'password'=> array(
        'type'=>'password',
        'name'=>'password',
        'value'=>'',
        'label'=>'Password',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags'),
        'validation'=>array('required', 'password')
    ),
    
    'email'=> array(
        'type'=>'text',
        'name'=>'email',
        'value'=>'',
        'label'=>'Email',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('stripTrim', 'stripTags', 'escape'),
        'validation'=>array('required')
    ),
    'description'=> array(
        'type'=>'textarea',
        'name'=>'description',
        'value'=>'',
        'label'=>'Descripción',
        'hint'=>'Sobre tí...',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(),
        'validation'=>array('')
    ),
    'gender'=> array(
        'type'=>'radio',
        'name'=>'gender',
        'options'=>array('female'=>'Mujer', 'male'=>'Hombre', 'others'=>'Otro'),
        'value'=>array('others'),
        'label'=>'Sexo',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(''),
        'validation'=>array('required', 'inArray')
    ),
    'city'=> array(
        'type'=>'select',
        'name'=>'city',
//         'table'=>array('cities', 'idcity', 'city'),
        'options'=>array('zaragoza'=>'Zaragoza', 'madrid'=>'Madrid', 'barcelona'=>'Barcelona'),
        'value'=>array('zaragoza'),
        'label'=>'Ciudad',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(''),
        'validation'=>array('required', 'inArray')
    ),
    'pets'=> array(
        'type'=>'checkbox',
        'name'=>'pets',
        'options'=>array('cat'=>'Gato', 'dog'=>'Perro', 'tiger'=>'Tigre','lion'=>'León'),
        'value'=>array('cat'),
        'label'=>'Mascotas',
        'hint'=>'Selecciona tus mascotas',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(),
        'validation'=>array('inArray')
    ),
    'languages'=> array(
        'type'=>'selectmultiple',
        'name'=>'languages',
        'options'=>array('english'=>'Inglés', 
                        'french'=>'Francés', 
                        'german'=>'Alemán',
                        'spanish'=>'Castellano'),
        'value'=>array('english'),
        'label'=>'Idiomas',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(''),
        'validation'=>array('inArray')
    ),
    'photo'=> array(
        'type'=>'file',
        'name'=>'photo',
        'value'=>'',
        'label'=>'Foto',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array(''),
        'validation'=>array('')
    ),
    'submit'=> array(
        'type'=>'submit',
        'name'=>'submit',
        'label'=>'Enviar',
        'hint'=>'',
        'placeholder'=>'',
        'error_message'=>'',
        'filters'=>array('submit'),
        'validation'=>array('')
    ),
);
