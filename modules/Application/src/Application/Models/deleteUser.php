<?php

/**
 * Delete user by id
 * 
 * @param int $id
 * @param array $config
 * @return number or FALSE
 */


function deleteUser($config,$id)
{
    
    switch ($config['repository'])
    {
        case 'txt':
            $filename = 'usuarios.txt';
                // Leer los datos del usuario
            // Leer todo el fichero en un string
            $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
            // Separar por saltos de linea
            $data = explode("\n", $data);
            // Localizar el usuario por ID
            // Eliminar el usuario ID del array
            unset($data[$id]);
            // Juntarlo por saltos de linea
            $usuarios = implode("\n", $data);
            // Escribir todo el array al fichero
            return file_put_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt",
            $usuarios); 
        break;
        case 'db':    
            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'],
            $config['database']['user'],
            $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            // SELECT * FROM users;
            $sql = "DELETE FROM users WHERE iduser='$id'";
            $result = mysqli_query($link, $sql);

            break;
        case 'gd':
            break;
    
    }
       
}

