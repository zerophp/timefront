<?php
namespace Application\Controllers;

class Error
{
    public $layout = 'error.phtml';
    
    public static function error_400()
    {        
        http_response_code(400);
        $text = "Error 400: Bad Request";
        include ("../Modules/Application/Src/Application/Views/Error/error.phtml");
    }
    public static function error_404()
    {
        http_response_code(404);
        $text = "Error 404: Not Found";
        include ("../Modules/Application/Src/Application/Views/Error/error.phtml");
    }   
    public static function error_405()
    {
        http_response_code(405);
        $text = "Error 405: Method Not Allowed";
        include ("../Modules/Application/Src/Application/Views/Error/error.phtml");
    }
}