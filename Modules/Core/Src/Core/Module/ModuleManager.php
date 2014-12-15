<?php
namespace Core\Module;

class ModuleManager
{
    
    public static function moduleManager($config_file)
    {
        include_once $config_file;
        
        $global_config=array();
        $local_config=array();
          
        foreach($config['modules'] as $module)
        {   
            $global_file = __DIR__.'/../../../../../Configs/autoload/'.strtolower($module).'.global.php';
    
            if(file_exists($global_file))
            {
                include_once $global_file;
                $global_config = $config;
            }
            
            $local_file = __DIR__.'/../../../../../Configs/autoload/'.strtolower($module).'.local.php';
            
            if(file_exists($local_file))
            {
                include_once $local_file;
                $local_config = $config;
            }
            $config = array_replace_recursive($config, $global_config, $local_config);
        }   
            
        return $config;
    }
}
