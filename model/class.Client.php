<?php

class Client
{
    private $id;
    private $parentId;
    private $categoryId;
    private $db;

    public function __construct()
	{
        $this->set("db", $GLOBALS[DEFAULT_DBO_NAME]);
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
    
    //----------------------------------------------------------------------------------------------
    public function setInfo(array $data)
    {
        $this->set("id", $data['id']);
        $this->set("parentId", $data['parentId']);
        $this->set("categoryId", $data['categoryId']);
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getDetails()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `id`, `name`, `activated_date`, `license_days`, `added_date`, "
             . "DATE_FORMAT(clients.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate "
             . "FROM clients WHERE id = "  . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_object();
    }
    
    public static function getName()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `name` FROM clients WHERE id = "  . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        $row = $result->fetch_object();
        
        return $row->name;
    }
    
    public static function getAllClients()
    {
        $clients = array();
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `id`, `name`, `activated_date`, `license_days`, `added_date`, "
             . "DATE_FORMAT(clients.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate "
             . "FROM clients";

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $clients; 
        }
        
        while ($row = $result->fetch_object()){
            $clients[] = $row;
        }

        return $clients;
    }
}