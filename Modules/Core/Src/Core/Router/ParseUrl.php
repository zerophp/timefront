<?php
namespace Core\Router;

use Core\Application\Application;

class ParseUrl
{
    public static function parseURL()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $parts = explode('/', $url, 3);
   
        if (empty($parts[0])){
            $controller = Application::getConfig()['default_controller'];
            $action = Application::getConfig()['default_action'];
            $params = [];
    
    
        } else {
            $controller = $parts[0];

            $controller_src = $_SERVER['DOCUMENT_ROOT'] . "/../modules/Application/src/Application/controllers/$controller.php";
    
            if (file_exists($controller_src)) {
                $action = isset($parts[1]) ? $parts[1] : '';
    
                $validActions = array ('insert', 'update', 'delete', 'select', 'index', 'logout');
    
                // Si la accion es un valor valido...
                if (in_array($action, $validActions)) {
                    // Si ademas se han pasado parametros en la url se asignan a una variable
                    $aux_params = isset($parts[2]) ? explode('/', $parts[2]) : [];
                    if (count($aux_params) % 2 != 0) {
                        // wrong params
                        header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed");
                        $controller = 'error';
                        $action = '405';
                        $params = [];
                    } else {
                        $params = [];
                        for ($i = 0, $l = count($aux_params); $i < $l; $i += 2) {
                            $params[$aux_params[$i]] = $aux_params[$i+1];
                        }
                    }
    
                } else {
                    // invalid action
                    header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
                    $controller = 'error';
                    $action = '400';
                    $params = [];
                }
    
            } else {
                // controller does not exist
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
                $controller = "error";
                $action = "404";
                $params = [];
            }
        }
     
        return [
            'controller' => $controller,
            'action' => $action,
            'params' => $params
        ];
    }
}
