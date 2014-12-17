<?php
namespace Application\Controllers;

class Index
{
    public $layout = 'timeline.phtml';
    
    public function index()
    {
        $urlAPI ='http://timeback.local/timeline';
        include ("../Modules/Application/Src/Application/Views/Index/index.phtml");
    } 
}

