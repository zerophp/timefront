<?php

/**
 * Escribe los datos del nuevo usuario en el repositorio
 * Si el repositorio en un fichero de texto se 
 * separara por pipes, y por comas los de tipo array
 * 
 * @param array $filter
 * @param string $imagename
 * @param array $config
 * @param userForm $user
 * @return number int number of bytes | FALSE
 */


function createUser($filter, $imagename, $config)
{


    switch ($config['repository'])
    {
        case 'txt':
            //     foreach($filter as $key => $value)
                //     {
                //         if(is_array($value))
                    //             $value=implode(',', $value);
                    //         $data[$key]=$value;
                    //     }
            //     $data[]=$imagename;
            //     $data = implode('|', $data);
            $filename = 'usuarios.txt';
            return file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$filename,
                                        $data."\n",
                                        FILE_APPEND);
        break;
        case 'db':
            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'],
            $config['database']['user'],
            $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            
            // Add uuid in iduser
            if (empty($filter['id'])) 
                $filter['id'] = uuid_v4();
                        
            // Get idgender
            $sql = "SELECT idgender FROM usuarios.genders
                    WHERE gender = '".$filter['gender']."';";

            $result = mysqli_query($link, $sql);
            $gender = mysqli_fetch_row($result)[0];
            
            // Get idcity
            $sql = "SELECT idcity FROM cities
                    WHERE city = '".$filter['city']."';";

            $result = mysqli_query($link, $sql);
            $city = mysqli_fetch_row($result)[0];
            
            // Insert user
            $sql = "INSERT INTO users SET
			iduser = '".$filter['id']."',
			name = '".$filter['name']."',
            lastname = '".$filter['lastname']."',
            email = '".$filter['email']."',
            password = '".$filter['password']."',
            description = '".$filter['description']."',
            photo = '".$imagename."',
            cities_idcity = ".$city.",
            genders_idgender = ".$gender.";";
            

            // Retornar el data
            $result = mysqli_query($link, $sql);
    
            while ($row = mysqli_fetch_assoc($result))
            {
                $users[] = implode("|", $row);
            }
            return $users;
        break;
        case 'gd':
        break;

    }
    
}

