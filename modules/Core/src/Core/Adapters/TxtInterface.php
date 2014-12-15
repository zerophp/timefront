<?php
namespace Core\Adapters;

interface TxtInterface
{
    /**
     * Ser el nombre del fichero donde irán guardados
     * los datos
     */
    public function setFilename($filename);
    
    public function getFilename();
}


