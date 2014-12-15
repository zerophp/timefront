<?php

namespace Application\controllers;

class Timeline {
    public $layout = 'timeline.phtml';
    
    public function index() {
        include ("../modules/Application/src/Application/views/timeline/index.phtml");
    }
}
