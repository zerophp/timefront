<?php
namespace Core\Adapters;

interface AdapterInterface
{
    /**
     * Get all data from repository
     */
    public function fetchAll();
    
    /**
     * Get id data from repository
     * @param array $id
    */
    public function fetch($id);
    
    /**
     * Delete id data from repository
     * @param unknown $id
    */
    public function delete($id);
    
    /**
     * Update id data from repository
     * @param unknown $id
     * @param unknown $data
    */
    public function update($id,$data);
    
    /**
     * Insert data into repository
     * @param unknown $data
    */
    public function insert($data);
}