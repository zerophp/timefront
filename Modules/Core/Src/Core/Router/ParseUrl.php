<?php
namespace Core\Router;

use Core\Application\Application;

/**
 * @return array request ( 'controller' =>
 *                         'action' =>
 *                         'params' => array( 'param1' => 'value1'
 *                                            'param2' => 'value2'  
 *                                                .............          
 */
class ParseUrl
{
    public static function parseURL()
    { 
        $url = trim($_SERVER['REQUEST_URI'], '/');       
        $parts = explode('/', $url, 3);
        
        if ($url == '') {
            $controller = Application::getConfig()['default_controller'];
            $action = Application::getConfig()['default_action'];
            $params = [];
           
        } else {
            $controller = $parts[0];
 
            $controller_file = $_SERVER['DOCUMENT_ROOT']."/../Modules/Application/Src/Application/Controllers/$controller.php";
    
            if (file_exists($controller_file)) {
                
                if (isset($parts[1])) {
                    
                    $action = $parts[1];
                    
                    $aux_params = isset($parts[2]) ? explode('/', $parts[2]) : [];
                    
                    if (count($aux_params) % 2 != 0) {
                        // Wrong params. Bad Request
                        $controller = 'Error';
                        $action = 'error_400';
                        $params = [];
                    } else {
                        $params = [];
                        for ($i = 0, $l = count($aux_params); $i < $l; $i += 2) {
                            $params[$aux_params[$i]] = $aux_params[$i+1];
                        }
                    }                  
                } else {
                    // No method found
                    $controller = "Error";
                    $action = "error_405";
                    $params = [];
                }
    
            } else {
                // No controller found
                $controller = "Error";
                $action = "error_404";
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
