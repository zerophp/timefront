<?php

/**
 * write2txt
 * 
 * Escribe los datos en un archivo de texto 
 * separado por pipes, y por comas los de tipo array
 * 
 * @param array $filter
 * @param string $imagename
 * @param string $filename
 * @param boolean $append 
 * @return number int number of bytes | FALSE
 */

function write2txt($filter, $imagename, $filename, $append = FALSE)
{
    foreach($filter as $key => $value)
    {
        if(is_array($value))
            $value=implode(',', $value);
        $data[$key]=$value;
    }
    $data[]=$imagename;
    $data = implode('|', $data);
    if($append)
        return file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$filename,
                      $data."\n",
                      FILE_APPEND);
    else 
        return file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$filename,
            $data."\n");
     
}