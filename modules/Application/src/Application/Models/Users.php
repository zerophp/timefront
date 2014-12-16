<?php
namespace Application\models;

class Users
{
    public function fetchAll()
    {
        switch ($config['repository'])
        {
            case 'txt':
                $users = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
                $users = explode("\n", $users);
                return $users;
            break;
            case 'db':
                
                // Conectarse al DBMS
                $link = mysqli_connect($config['database']['host'], 
                               $config['database']['user'], 
                               $config['database']['password']);
                // Seleccionar la DB
                mysqli_select_db($link, $config['database']['database']);
                // SELECT * FROM users;
                $sql = "SELECT iduser, lastname, name, password, email, description, gender, 
                        city, group_concat( DISTINCT pet), group_concat( DISTINCT language), photo 
                        FROM users 
                        JOIN genders ON genders_idgender = idgender
                        JOIN cities ON cities_idcity = idcity
                        LEFT JOIN users_has_languages ON users_has_languages.users_iduser = iduser
                        LEFT JOIN languages ON idlanguage = languages_idlanguage
                        LEFT JOIN users_has_pets ON users_has_pets.users_iduser = iduser
                        LEFT JOIN pets ON idpet = pets_idpet
                        GROUP BY iduser;";
               
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
    public function fetch();
    public function create();
    public function delete();
    public function update();
    
    
}