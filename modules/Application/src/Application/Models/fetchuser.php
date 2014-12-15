<?php

/**
 * Fetch user by id
 * @param int $id
 * @return array
 */
function fetchUser($config, $id)
{
    

    switch ($config['repository'])
	{
		case 'txt':
			// Leer los datos del usuario por ID
			// Leer todos los datos
			$data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/usuarios.txt");
			// Dividir por saltos de linea
			$data = explode("\n", $data);
			// Leer la fila ID
			$usuario = $data[$id];
			$usuario = explode("|", $usuario);
			return $usuario;
		break;
		case 'db':
			// Conectarse al DBMS
			$link = mysqli_connect($config['database']['host'],
			$config['database']['user'],
			$config['database']['password']);
			// Seleccionar la DB
			mysqli_select_db($link, $config['database']['database']);
			// SELECT * FROM users WHERE id;
			
			$sql = "SELECT iduser AS id, lastname, name, password, email, description, gender,
			city, group_concat( DISTINCT pet) AS pets,
			group_concat( DISTINCT language) AS languages, photo
			FROM users
			JOIN genders ON genders_idgender = idgender
			JOIN cities ON cities_idcity = idcity
			LEFT JOIN users_has_languages ON users_has_languages.users_iduser = iduser
			LEFT JOIN languages ON idlanguage = languages_idlanguage
			LEFT JOIN users_has_pets ON users_has_pets.users_iduser = iduser
			LEFT JOIN pets ON idpet = pets_idpet
			WHERE iduser = '".$id."'
			GROUP BY iduser;";
			// Retornar el data
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			$row['pets'] = explode(",", $row['pets']);
			$row['languages'] = explode(",", $row['languages']);
			return $row;

// 			// Seleccionar el usuario
//              $sql = "SELECT * FROM users WHERE iduser = " . $id;
//              $user = mysqli_query($link, $sql);
//              return mysqli_fetch_assoc($user);

		break;
		case 'gd':
		break;
	}
}