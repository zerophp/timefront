<?php
namespace Core\Application;

class Application
{
    protected static $request;
    private static $config;
    
    public static function setConfig($config_file)
    {
        self::$config = \Core\Module\ModuleManager::moduleManager($config_file);             
    }
    
    public static function getConfig()
    {
        return self::$config;
    }
    
    public static function setRequest()
    {
         self::$request = \Core\Router\ParseUrl::parseURL();
    }
    
    public static function getRequest() 
    {
        return self::$request;
    }
    
    public static function bootstrap()
    {
        session_start();
    }
    
    public static function dispatch()
    {                     
        ob_start();
        
            $controllerName = "Application\\Controllers\\".self::$request['controller'];
            $controller = new $controllerName(self::$config);
            $actionName = self::$request['action'];
            
            if(method_exists($controllerName, $actionName))
            {
               $controller -> $actionName(); 
            } 
            else 
            {
                $controller = new Error();
                $controller -> error_405();
            }

        $view = ob_get_contents();
        ob_end_clean();
        
        self::twoStep($view, $controller->layout);
    }
    
    public static function twoStep($view, $layout)
    {
        include_once '../Modules/Application/Src/Application/Layouts/'.$layout;
    } 
    
}


