<?php
namespace Application\Controllers;

class Index
{
    public $layout = 'index.phtml';
    
    public function index()
    {
        include ("../Modules/Application/Src/Application/Views/Index/index.phtml");
    } 
}

