<?php

class Progress
{
    private $id;
    private $name;
    private $status;
    private $db;
    
    public function __construct()
	{
        $this->set("db", $GLOBALS[DEFAULT_DBO_NAME]->connectToDb());
    }
    
    //----------------------------------------------------------------------------------------------
	public function set($propertyName, $value)
	{
	  if (property_exists($this, $propertyName))
	  {
	      $this->$propertyName = $value;
	  }
	}

    //----------------------------------------------------------------------------------------------
	public function get($propertyName)
	{
	    if (property_exists($this, $propertyName))
	    {
	        return $this->$propertyName;
	    }
	}
    
    public function getAll($status = 1)
    {
        $proress = array();
        
        $sql = "SELECT id, name, status FROM progress "
             . "WHERE status = " . $status . " ORDER BY id";

        $result = $this->db->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $proress[] = $row;
        }
        
        return $proress;
    }
}