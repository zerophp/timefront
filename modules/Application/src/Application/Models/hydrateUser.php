<?php
/**
 * Hidrate user data
 * 
 * @param array $usuario
 * @return array $values
 */
 
function hydrateUser($config,$usuario)
{
    switch ($config['repository'])
    {
        case 'txt':
            $values = array ('id'=>$usuario[0],
                'lastname'=>$usuario[1],
                'name'=>$usuario[2],
                'password'=>$usuario[3],
                'email'=>$usuario[4],
                'description'=>$usuario[5],
                'gender'=>$usuario[6],
                'city'=>$usuario[7],
                'pets'=>explode(',',$usuario[8]),
                //'languages'=>(strpos($usuario[8],',')!==FALSE)?explode(',',$usuario[8]):$usuario[8],
                'languages'=>explode(',',$usuario[9]),
                'photo'=>$usuario[10]);
            
            return $values;
        break;
            
        case 'db':
            $values = array ('id'=>$usuario['id'],
                'lastname'=>$usuario['lastname'],
                'name'=>$usuario['name'],
                );
            
            return $values;
            
        break;
    }
}
            

