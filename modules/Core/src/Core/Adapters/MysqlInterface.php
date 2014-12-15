<?php
namespace Core\Adapters;

interface MysqlInterface
{
    /**
     * Connect to Mysql 
     * @param unknown $config
     */
    public function connect($config);
    
    /**
     * Disconenct from Mysql
     */
    public function disconnect();
    
    
    
    public function setTable($table);
    public function getTable();
}

