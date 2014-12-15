<?php
namespace Application\controllers;

class Timeline{
	
	public $layout = 'timeline.phtml';
	
	public function display(){
		include('../modules/Application/src/Application/views/timeline/display.phtml');
	}
}

