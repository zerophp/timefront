<?php

/**
 * Controlador de las funciones de autenticación y logout de usuarios.
 * 
 * @param array $request using $request['action']
 * 
 */
echo "<pre>";
print_r($_POST);
echo "</pre>";

switch ($request['action'])
{
   case 'logout':
        unset($_SESSION['email']);
        session_regenerate_id();
        header("Location: /home/select");
        exit();
   break;
   case 'index':
       if($_POST)
       {
           // Conectarse al DBMS
           $link = mysqli_connect($config['database']['host'],
               $config['database']['user'],
               $config['database']['password']);
           // Seleccionar la DB
           mysqli_select_db($link, $config['database']['database']);
           // SELECT * FROM users WHERE id;
           	
           $sql = "SELECT iduser, name, email FROM users
                WHERE password = '".$_POST['password']."' 
                AND email ='".$_POST['email']."'";
                 
           // Retornar el data
           $result = mysqli_query($link, $sql);
           echo mysqli_num_rows($result);
           if(mysqli_num_rows($result)===1)
           {
               session_regenerate_id();
               $_SESSION['email']=$_POST['email'];
               
              header("Location: /users/select");
           }
           else
           {
               header("Location: /login/index");
           }                   
       }
       else 
       {
           include('../modules/Application/src/Application/views/login/index.phtml');
       }
       
   break;
}
