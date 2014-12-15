<?php
/**
 * Update data of an user
 *
 * @param array $filter
 * @param array $config
 * @param userForm $user
 * @return nothing just change data on repository
 */


function updateUser($filter, $config)

{
    switch ($config['repository'])
    {
        case 'txt':
            $filename = 'usuarios.txt';
            // Recorrer el array de datos
            $usuarios = file_get_contents($_SERVER['DOCUMENT_ROOT']."/".$filename);
            // Dividir por saltos de linea
            $usuarios = explode("\n", $usuarios);
            foreach($filter as $key => $value)
            {
                if(is_array($value))
                    $value=implode(',', $value);
                $data[$key]=$value;
            }
            $data = implode('|', $data);


            $usuarios[$filter['id']] = $data;
            $usuarios = implode("\n", $usuarios);
            // Escribir todo el array al fichero
            return file_put_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt", $usuarios);
        break;
        case 'db':
            
            //Movemos la foto
            if(!empty($_FILES['photo']['name']))
            {
                move_uploaded_file($_FILES['photo']['tmp_name'], 
                               $_SERVER['DOCUMENT_ROOT']."/uploads/".$_FILES['photo']['name']);
                
                $filter['photo'] = $_FILES['photo']['name'];
            }
            else
                $filter['photo'] = '';
            
            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'], 
                           $config['database']['user'], 
                           $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            // UPDATE user tabla a tabla...
            
            // Obtenemos los ID's de gender y city
            $sql = "SELECT idcity AS city FROM cities 
                    WHERE city = '".$filter['city']."'";
            
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            $filter['city'] = implode("|", $row);
            
            $sql = "SELECT idgender AS gender FROM genders 
                    WHERE gender = '".$filter['gender']."'";
            
            $resultGender = mysqli_query($link, $sql);
            $rowGender = mysqli_fetch_assoc($resultGender);
            $filter['gender'] = implode("|", $rowGender);
            
            $sql = "UPDATE users SET
                   lastname = '".$filter['lastname']."',
                   name = '".$filter['name']."',
                   password = '".$filter['password']."',
                   email = '".$filter['email']."',
                   description = '".$filter['description']."',
                   genders_idgender = '".$filter['gender']."',
                   cities_idcity = '".$filter['city']."',
                   photo = '".$filter['photo']."'
                   WHERE iduser = '".$filter['id']."';";
            
            mysqli_query($link, $sql);
            
            $sql = "DELETE FROM users_has_pets
                   WHERE users_iduser = '".$filter['id']."';";
            
            mysqli_query($link, $sql);
            
            foreach ($filter['pets'] as $pet)
            {
                $sql = "SELECT idpet FROM pets 
                    WHERE pet = '".$pet."'";
            
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                $idPet = implode("|", $row);
                
                $sql = "INSERT INTO users_has_pets SET
                   users_iduser = '".$filter['id']."',
                   pets_idpet = '".$idPet."';";
                
                mysqli_query($link, $sql);
            }
            
            $sql = "DELETE FROM users_has_languages
                   WHERE users_iduser = '".$filter['id']."';";

            mysqli_query($link, $sql);
            
            foreach ($filter['languages'] as $language)
            {
                $sql = "SELECT idlanguage FROM languages 
                    WHERE language = '".$language."'";
            
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                $idLanguage = implode("|", $row);
                
                $sql = "INSERT INTO users_has_languages SET
                   users_iduser = '".$filter['id']."',
                   languages_idlanguage = '".$idLanguage."';";
                
                mysqli_query($link, $sql);
            }
        break;
        case 'gd':
        break;     
    }   
}


