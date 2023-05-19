<?php

class User
{
    private $id;
    private $clientId;
    private $userType;
    private $username;
    private $password;
    private $email;
    private $phoneNumber;
    private $firstName;
    private $lastName;
    private $displayName;
    private $isLoggedIn;
    private $status;
    private $lastAccessTime;
    private $addedDate;

    private $db;

    //----------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->set('clientId', CLIENT_ID);
        $this->set('db', $GLOBALS[DEFAULT_DBO_NAME]);
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
    public function setInfo(array $userData)
    {
        $this->set("id", $userData['id']);
        if(IS_SUPER_ADMIN === true)
        {
            $this->set("clientId", $userData['clientId']);
            $this->set("userType", $userData['userType']);
            $this->set("status", $userData['status']);
            $this->set("password", md5($userData['password']));
        }
        
        $this->set("username", strtolower($userData['username']));
        $this->set("email", strtolower($userData['email']));
        $this->set("phoneNumber", $userData['phoneNumber']);
        $this->set("firstName", $userData['firstName']);
        $this->set("lastName", $userData['lastName']);
        $this->set("displayName", $userData['displayName']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function addUser()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE users SET `username` = ?, `email` = ?, "
                . " `phone_number` = ?, `first_name` = ?, "
                . " `last_name` = ?, `display_name` = ? ";
            
            if (IS_SUPER_ADMIN === true){
                $sql .= ", `user_type` = ?,  `status` = ? ";
            }

            $sql .= " WHERE id = ?  AND users.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            if (IS_SUPER_ADMIN === true){
                $bind = $stmt->bind_param("ssssssiiii",  $this->username, $this->email, $this->phoneNumber, $this->firstName, 
                                    $this->lastName, $this->displayName, $this->userType, $this->status,
                                    $this->id, $this->clientId);
            }
            else{
                $bind = $stmt->bind_param("ssssssii", $this->username, $this->email, $this->phoneNumber, 
                                $this->firstName, $this->lastName, $this->displayName, 
                                $this->id, $this->clientId);
            }
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "users");
            $sql = "INSERT INTO users (`id`, `client_id`, `user_type`, `username`, `password`, "
                 . " `email`, `phone_number`, `first_name`, `last_name`, `display_name`, `status`) "
                 . "VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiisssssssi", $maxId, $this->clientId, $this->userType, $this->username, 
                                $this->password, $this->email, $this->phoneNumber, $this->firstName, 
                                $this->lastName, $this->displayName, $this->status);
            
            if (!$bind){
                return false;
            }
        }
        
        $excute = $stmt->execute();
        
        if (!$excute){
            return false;
        }

        if ($this->id > 0){
            return $this->id;
        }
        else if ($oMysqli->affected_rows > 0){
            $this->set("id", $maxId);
            return true;
        }
        else{
            return false;
        }
        
        $stmt->close();
        $oMysqli->close();
    }
    
    //----------------------------------------------------------------------------------------------
    public static function isValidUser()
    {
        if (!isset($_SESSION[PRODUCT_NAME]['userId']) || !isset($_SESSION[PRODUCT_NAME]['userType']) 
            || !isset($_SESSION[PRODUCT_NAME]['userTypeName']) || !isset($_SESSION[PRODUCT_NAME]['userDisplayName']) 
            || $_SESSION[PRODUCT_NAME]['clientId'] !== CLIENT_ID)
        {
            return false;
        }
        
        return true;
    }
    
    public static function isUserExist($p_name, $p_passsword)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM users WHERE username = '"  . $p_name . "' AND password = '"  . md5($p_passsword) . "' AND client_id = " . CLIENT_ID;

        $result = $DB->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        $row = $result->fetch_assoc();

        if ($row['id'] > 0){
            return true;
        }
        
        return false;
    }
    
    public static function login($p_name, $p_passsword)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT users.`id`, users.client_id, users.`user_type`, users.`first_name`, users.`last_name`, "
             . " users.`display_name`, user_types.name AS userTypeName "
             . " FROM users "
             . " LEFT JOIN user_types ON users.user_type = user_types.id "
             . " WHERE (username = '"  . strtolower($p_name) . "' OR "
             . " email = '"  . strtolower($p_name) . "') AND password = '"  . md5($p_passsword) . "' AND "
             . " users.client_id = " . CLIENT_ID . " AND users.status = 1";

        $result = $DB->query($sql);
        
        if (!$result || !$result->num_rows){
           return false; 
        }
        
        $row = $result->fetch_object();
        self::updateLastLogin($row->id);
        
        $_SESSION[PRODUCT_NAME]['userId'] = (int)$row->id;
        $_SESSION[PRODUCT_NAME]['userType'] = (int)$row->user_type;
        $_SESSION[PRODUCT_NAME]['userTypeName'] = $row->userTypeName;
        $_SESSION[PRODUCT_NAME]['clientId'] = (int)$row->client_id;
        
        if ($row->display_name == ""){
            $_SESSION[PRODUCT_NAME]['userDisplayName'] = ucwords($row->first_name . " " . $row->last_name);
        }
        else{
            $_SESSION[PRODUCT_NAME]['userDisplayName'] = $row->display_name;
        }
        
        return true;
    }
    
    public static function updateLastLogin($userId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "UPDATE `users` SET `last_access_time` = CURRENT_TIMESTAMP "
             . " WHERE `id` = " . $userId . " AND users.client_id = " . CLIENT_ID;
        
            
        $result = $oMysqli->query($sql);
            
        if (!$result){
            return false;
        }

        else if ($oMysqli->affected_rows > 0){
            self::updateLoggedStatus($userId, 1);
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function updateLoggedStatus($userId, $status)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "UPDATE `users` SET  is_logged_in = " . $status
             . " WHERE `id` = " . $userId . " AND users.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);
            
        if (!$result){
            return false;
        }

        else if ($oMysqli->affected_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function updatePassword($password, $userId, $clientId=CLIENT_ID)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        if ($clientId <= 0){
            $clientId = CLIENT_ID;
        }
        
        $password = md5($password);
        
        $sql = "UPDATE `users` SET  password = ? "
             . " WHERE `id` = ? AND users.client_id = ? ";
        
            
        $stmt = $oMysqli->prepare($sql);
        
        if (!$stmt){
            return false;
        }

        $bind = $stmt->bind_param("sii", $password, $userId, $clientId);
        if (!$bind){
            return false;
        }
        
        $excute = $stmt->execute();
        
        if (!$excute || !$oMysqli->affected_rows){
            return false;
        }

        return true;
    }
    
    public static function isUserNameExist($userName, $id=0, $clientId=CLIENT_ID)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        if ((int)$clientId <= 0){
            $clientId = CLIENT_ID;
        }
        
        $sql = "SELECT users.`id` FROM users  WHERE username = '"  . strtolower($userName) . "' AND users.client_id = " . $clientId;
        
        if ($id > 0){
            $sql .= " AND id != " . $id;
        }
        
        $result = $DB->query($sql);
        
        if (!$result || !$result->num_rows){
           return false; 
        }
        
        return true;
    }
    
    public static function isEmailExist($p_email, $id=0, $clientId=CLIENT_ID)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        if ($clientId <= 0){
            $clientId = CLIENT_ID;
        }
        
        $sql = "SELECT users.`id` FROM users  WHERE email = '"  . strtolower($p_email) . "' AND users.client_id = " . $clientId;
        
        if ($id > 0){
            $sql .= " AND id != " . $id;
        }

        $result = $DB->query($sql);
        
        if (!$result || !$result->num_rows){
           return false; 
        }
        
        return true;
    }
    
    public static function getAll($searchData=array())
    {
        $users = array();
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT users.`id`, users.`client_id`, users.`user_type`, users.`username`, "
             . " users.`email`, users.`phone_number`, users.`first_name`, users.`last_name`, users.`display_name`, "
             . " users.`is_logged_in`, users.`status`, users.`last_access_time`, users.`added_date`, "
             . " user_types.name AS userTypeName, clients.name AS clientName, "
             . " DATE_FORMAT(users.last_access_time,'" . MYSQL_DATE_FORMAT . " " . MYSQL_DATE_FORMAT.  "') AS lastAccessTime,"
             . " DATE_FORMAT(users.added_date,'" . MYSQL_DATE_FORMAT . "') AS addedDate "
             . " FROM users "
             . " LEFT JOIN user_types ON users.user_type = user_types.id "
             . " LEFT JOIN clients ON users.client_id = clients.id ";
        
        if (IS_SUPER_ADMIN  === true){
            $sql .= " WHERE users.`client_id` = " . $searchData['clientId'];
        }
        else{
            $sql .= " WHERE users.`client_id` = " . CLIENT_ID;
        }
        
        $result = $DB->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $users; 
        }
        
        while($row = $result->fetch_object()){
            $users[] = $row;
        }
        
        return $users;
    }
    
    public function getDetails($pId, $clientId=CLIENT_ID)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id` AS clientId, `user_type` AS userType, `username`, `password`, `email`, "
             . " `phone_number` AS phoneNumber, `first_name` AS firstName, `last_name` AS lastName, `display_name` AS displayName, "
             . " `status`, `is_logged_in` AS  isLoggedIn, `last_access_time` AS lastAccessTime, `added_date` AS addedDate "
             . " FROM `users` WHERE id = " . $pId . " AND client_id = " . $clientId;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    
    public function delete($ids, $clientId=CLIENT_ID)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM users WHERE id IN (" . $ids . ")  AND client_id = " . $clientId;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    public static function getCount($pStatus=0, $onlyNew=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM users WHERE client_id = " . CLIENT_ID;
        
        if ($onlyNew == true){
            $sql .= " AND added_date BETWEEN '" . General::convertDate(date('Y-m-d', strtotime("-15 days"))) . "' "
                  . " AND '" . General::convertDate(date('Y-m-d', strtotime("today"))) . "'";
        }
        
        if ($pStatus > 0){
            $sql .= " AND status = " . $pStatus;
        }
        
        $result = $oMysqli->query($sql);

        if (!$result){
           return false; 
        }
        
        return $result->num_rows;
    }
}