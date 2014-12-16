<?php
namespace Application\Mappers;

use Core\Application\Application;
use Application\Models\EntityUser;

class Users
{
    private $adapterName;
    private $id;
    
    /**
     * Constructor que al instanciar recibe el adapter
     */
    public function __construct() 
    {
        $config = Application::getConfig();
        $request = Application::getRequest();
        $this->setAdapterName($config['adapter']);
        if(isset($request['params']['id']))
            $this->setId($request['params']['id']);
    }
    
    public function setAdapterName($adapterName) 
    {
        $this->adapterName = $adapterName;
    }
    
    public function setId($id) 
    {
        $this->id = $id;
    }

     /**
     * 
     * @return array de users
     */
    public function fetchAllUsers()
    {
        switch($this->adapterName){
           
            case'\Core\Adapters\Mysql':
                
                $adapter = new $this->adapterName();
                $adapter->setTable("USERS");
                $users = $adapter->fetchAll();
                $adapter->setTable("GENDERS");
                $genders = $adapter->fetchAll();
                $adapter->setTable("CITIES");
                $cities = $adapter->fetchAll();
                $adapter->setTable("PETS");
                $pets = $adapter->fetchAll();
                $adapter->setTable("LANGUAGES");
                $languages = $adapter->fetchAll();

                $usersHidrated = array();


                for($i=0; $i < sizeof($users); $i++)
                {
                    $userHidrated = new EntityUser();
                    $users[$i]['pets'] = array();
                    $users[$i]['languages'] = array();
                    $adapter->setTable("USERS_HAS_PETS");
                    $userPets = $adapter->fetch(array ('users_iduser'=>$users[$i]['iduser']));
                    $adapter->setTable("USERS_HAS_LANGUAGES");
                    $userLanguages = $adapter->fetch(array ('users_iduser'=>$users[$i]['iduser']));

                    foreach($genders as $gender)
                    {  
                        if($gender['idgender'] == $users[$i]['genders_idgender'])
                        {                   
                            $users[$i]['genders_idgender'] = $gender['gender'];
                        }                    
                    }
                    foreach($cities as $city)
                    {  
                        if($city['idcity'] == $users[$i]['cities_idcity'])
                        {                   
                            $users[$i]['cities_idcity'] = $city['city'];
                        }                    
                    }
                    foreach($pets as $pet)
                    {
                        foreach($userPets as $key => $userPet)
                        {
                            if($pet['idpet'] == $userPet['pets_idpet'])
                            {   
                                array_push($users[$i]['pets'], $pet['pet']);
                            }
                        }
                    }

                    foreach($languages as $language)
                    {
                        foreach($userLanguages as $key => $userLanguage)
                        {
                            if($language['idlanguage'] == $userLanguage['languages_idlanguage'])
                            {                   
                                array_push($users[$i]['languages'], $language['language']);
                            }
                        }
                    }
                    $userHidrated->hydrate($users[$i]);
                    array_push($usersHidrated, $userHidrated->extract());
                }

                $adapter->disconnect();

                return $usersHidrated;
            break;
            case'\Core\Adapters\Txt':
                $adapter = new $this->adapterName();
                $users = $adapter->fetchAll();
                return $users;
            break;
        }
    }
    
    public function fetchUser()
    {
        switch($this->adapterName){
           
            case'\Core\Adapters\Mysql':
                $adapter = new $this->adapterName();
                $adapter->setTable("USERS");
                $users = $adapter->fetch(array('iduser'=> $this->id));
                $adapter->setTable("GENDERS");
                $genders = $adapter->fetchAll();
                $adapter->setTable("CITIES");
                $cities = $adapter->fetchAll();
                $adapter->setTable("PETS");
                $pets = $adapter->fetchAll();
                $adapter->setTable("LANGUAGES");
                $languages = $adapter->fetchAll();


                for($i=0; $i < sizeof($users); $i++)
                {
                    $userHidrated = new EntityUser();
                    $users[$i]['pets'] = array();
                    $users[$i]['languages'] = array();
                    $adapter->setTable("USERS_HAS_PETS");
                    $userPets = $adapter->fetch(array ('users_iduser'=>$users[$i]['iduser']));
                    $adapter->setTable("USERS_HAS_LANGUAGES");
                    $userLanguages = $adapter->fetch(array ('users_iduser'=>$users[$i]['iduser']));

                    foreach($genders as $gender)
                    {  
                        if($gender['idgender'] == $users[$i]['genders_idgender'])
                        {                   
                            $users[$i]['genders_idgender'] = $gender['gender'];
                        }                    
                    }
                    foreach($cities as $city)
                    {  
                        if($city['idcity'] == $users[$i]['cities_idcity'])
                        {                   
                            $users[$i]['cities_idcity'] = $city['city'];
                        }                    
                    }
                    foreach($pets as $pet)
                    {
                        foreach($userPets as $key => $userPet)
                        {
                            if($pet['idpet'] == $userPet['pets_idpet'])
                            {   
                                array_push($users[$i]['pets'], $pet['pet']);
                            }
                        }
                    }

                    foreach($languages as $language)
                    {
                        foreach($userLanguages as $key => $userLanguage)
                        {
                            if($language['idlanguage'] == $userLanguage['languages_idlanguage'])
                            {                   
                                array_push($users[$i]['languages'], $language['language']);
                            }
                        }
                    }
                    $userHidrated->hydrate($users[$i]);
                }

                $adapter->disconnect();

                return $userHidrated->extract();
        }
    }
    
    public function insertUser()
    {
        
    }
}

