<?php
namespace Core\Entity;

interface HydrateInterface
{
    /**
     * Hydrate current entity
     * @param array $data
     */
    public function hydrate($data);
    
    /**
     * Extract properties from current entity to Assoc
     */
    public function extract();
}