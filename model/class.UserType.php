<?php

class UserType
{
    private $id;
    private $client_id;
    private $user_type;
    private $username;
    private $password;
    private $email;
    private $phone_number;
    private $first_name;
    private $last_name;
    private $display_name;
    private $is_logged_in;
    private $status;
    private $last_access_time;
    private $added_date;

    private $db;

    //----------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->set('client_id', CLIENT_ID);
        $this->set('db', DEFAULT_DBO_NAME);
    }

    //----------------------------------------------------------------------------------------------
    public function setInfo(array $a_Data)
    {
    }

    //----------------------------------------------------------------------------------------------
	public function set($propertyName, $value)
	{
	  if (property_exists($this, $propertyName))
	  {
	      $this->$$propertyName = $value;
	  }
	}

    //----------------------------------------------------------------------------------------------
	public function get($propertyName)
	{
	    if (property_exists($this, $propertyName))
	    {
	        return $this->$$propertyName;
	    }
	}

    //----------------------------------------------------------------------------------------------
    
    
    public static function getAllType($loadSuperAdmin=false)
    {
        $userTypes = array();
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `id`, name FROM user_types ";
        
        if (IS_SUPER_ADMIN === false){
            $sql .= "WHERE id > 1";
        }

        $result = $DB->query($sql);
        
        if (!$result || !$result->num_rows){
           return false; 
        }
        
        if (!$result || !$result->num_rows){
           return $userTypes; 
        }
        
        while ($row = $result->fetch_object()){
            $userTypes[] = $row;
        }

        return $userTypes;
    }
}