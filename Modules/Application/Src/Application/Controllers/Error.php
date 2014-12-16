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


// switch ($request['action']){
//     case 100: $text = 'Continue'; break;
//     case 101: $text = 'Switching Protocols'; break;
//     case 200: $text = 'OK'; break;
//     case 201: $text = 'Created'; break;
//     case 202: $text = 'Accepted'; break;
//     case 203: $text = 'Non-Authoritative Information'; break;
//     case 204: $text = 'No Content'; break;
//     case 205: $text = 'Reset Content'; break;
//     case 206: $text = 'Partial Content'; break;
//     case 300: $text = 'Multiple Choices'; break;
//     case 301: $text = 'Moved Permanently'; break;
//     case 302: $text = 'Moved Temporarily'; break;
//     case 303: $text = 'See Other'; break;
//     case 304: $text = 'Not Modified'; break;
//     case 305: $text = 'Use Proxy'; break;
//     case 400: $text = 'Bad Request'; break;
//     case 401: $text = 'Unauthorized'; break;
//     case 402: $text = 'Payment Required'; break;
//     case 403: $text = 'Forbidden'; break;
//     case 404: $text = 'Not Found'; break;
//     case 405: $text = 'Method Not Allowed'; break;
//     case 406: $text = 'Not Acceptable'; break;
//     case 407: $text = 'Proxy Authentication Required'; break;
//     case 408: $text = 'Request Time-out'; break;
//     case 409: $text = 'Conflict'; break;
//     case 410: $text = 'Gone'; break;
//     case 411: $text = 'Length Required'; break;
//     case 412: $text = 'Precondition Failed'; break;
//     case 413: $text = 'Request Entity Too Large'; break;
//     case 414: $text = 'Request-URI Too Large'; break;
//     case 415: $text = 'Unsupported Media Type'; break;
//     case 500: $text = 'Internal Server Error'; break;
//     case 501: $text = 'Not Implemented'; break;
//     case 502: $text = 'Bad Gateway'; break;
//     case 503: $text = 'Service Unavailable'; break;
//     case 504: $text = 'Gateway Time-out'; break;
//     case 505: $text = 'HTTP Version not supported'; break;
//     default:
//         exit('Unknown http status code "' . htmlentities($code) . '"');
//         break;

// }
// http_response_code($code);
// echo "Error ". $request['action'] .": ". $text;

