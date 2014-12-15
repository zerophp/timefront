<?php
namespace Core\Adapters;
use Core\Application\Application;

Class Txt implements AdapterInterface, TxtInterface
{
    private $filename;
    
    public function __construct() {
        $config = Application::getConfig();
        $this->setFilename($_SERVER['DOCUMENT_ROOT']."/".$config['filename']);
    }

    public function setFilename($filename) 
    {
        $this->filename = $filename;
    }
    
    public function getFilename() 
    {
        return $this->filename;
    }
    
    public function fetchAll()
    {
        $users = file_get_contents($this->filename);
        $users = explode("\n", $users);
        return $users;                 
    }
    
    public function fetch($id) 

    {
        
    }
    

	public function delete($id)
	{
		
	}
	
	public function insert($data)
	{
		foreach($filter as $key => $value)
      	{
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
			}
	}
	
	public function update($id,$data)
	{
		
	}
    
}

