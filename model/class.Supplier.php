<?php

class Supplier
{
    private $id;
    private $clientId;
    private $name;
    private $contactName;
    private $email;
    private $phone;
    private $address;
    private $notes;
    private $status;
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
    public function setInfo(array $supplierData)
    {
        $this->set("id", $supplierData['id']);
        $this->set("name", $supplierData['name']);
        $this->set("contactName", $supplierData['contactName']);
        $this->set("email", $supplierData['email']);
        $this->set("phone", $supplierData['phone']);
        $this->set("address", $supplierData['address']);
        $this->set("status", $supplierData['status']);
        $this->set("notes", $supplierData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE suppliers SET `name`= ?, `contact_name`= ?, `email`= ?,"
                 . " `phone`=  ?, `address`= ?, `notes`= ?,`status`= ? "
                 . " WHERE id = ?  AND suppliers.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("ssssssiii",  $this->name, $this->contactName, $this->email, 
                                       $this->phone, $this->address, 
                                       $this->notes, $this->status, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "suppliers");
            $sql = "INSERT INTO suppliers (`id`, `client_id`, `name`, `contact_name`, `email`, "
                 . " `phone`, `address`, `notes`, `status`) "
                 . "VALUES(?,?,?,?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iissssssi", $maxId, $this->clientId, $this->name, $this->contactName, 
                                $this->email, $this->phone, $this->address, $this->notes, $this->status);
            
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
    public static function isNameExist($p_buyername, $p_id=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT suppliers.`id` FROM suppliers  WHERE "
             . " name = '"  . $p_buyername . "' AND suppliers.client_id = " . CLIENT_ID;
        
        if ($p_id > 0){
            $sql .= " AND id != " . $p_id;
        }
        
        $result = $oMysqli->query($sql);
        
        if (!$result || !$result->num_rows){
           return false; 
        }
        
        return true;
    }
    
    public static function isEmailExist($p_email, $p_id=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT suppliers.`id` FROM suppliers  WHERE "
             . " email = '"  . strtolower($p_email) . "' AND suppliers.client_id = " . CLIENT_ID;
        
        if ($p_id > 0){
            $sql .= " AND id != " . $p_id;
        }

        $result = $oMysqli->query($sql);
        
        if (!$result || !$result->num_rows){
           return false; 
        }
        
        return true;
    }
    
    public static function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $suppliers = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `id`, `client_id`, `name`, `contact_name` AS contactName, `email`, `phone`, "
             . " `address`, `notes`, `status`, `added_date` FROM suppliers "
             . " WHERE suppliers.`client_id` = " . CLIENT_ID;
        
        if (isset($searchData['name']) && $searchData['name'] != ""){
            $searchSql .= " name  LIKE '%" . $searchData['name'] . "%' OR ";
        }
        
        if (isset($searchData['contactName']) && $searchData['contactName'] != ""){
            $searchSql .= " contact_name  LIKE '%" . $searchData['contactName'] . "%' OR ";
        }
        
        if (isset($searchData['email']) && $searchData['email'] != ""){
            $searchSql .= " email  LIKE '%" . $searchData['email'] . "%' OR ";
        }
        
        if (isset($searchData['phone']) && $searchData['phone'] != ""){
            $searchSql .= " phone  LIKE '%" . $searchData['phone'] . "%' OR ";
        }
        
        if (isset($searchData['address']) && $searchData['address'] != ""){
            $searchSql .= " address  LIKE '%" . $searchData['address'] . "%' OR ";
        }
        
        if (isset($searchData['status']) && $searchData['status'] > 0){
            $searchSql .= " status = " . $searchData['status'] . "  OR ";
        }
        
        if (isset($searchData['notes']) && $searchData['notes'] != ""){
            $searchSql .= " notes  LIKE '%" . $searchData['notes'] . "%'";
        }
        
        if ($searchSql!== ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $suppliers; 
        }
        
        while($row = $result->fetch_object()){
            $suppliers[] = $row;
        }
        
        return $suppliers;
    }
    
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id`, `name`, `contact_name` AS contactName, `email`, `phone`, "
             . " `address`, `notes`, `status`, `added_date` "
             . " FROM `suppliers` WHERE id = " . $pId . " AND client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    
    public static function delete($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM suppliers WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    public static function getCount($pStatus=0, $onlyNew=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM suppliers WHERE client_id = " . CLIENT_ID;
        
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
    
    public static function getNames()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT suppliers.id, suppliers.name FROM suppliers WHERE suppliers.client_id = " . CLIENT_ID . " ORDER BY name ASC";
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $names; 
        }

        while($row = $result->fetch_object()){
            $names[] = $row;
        }
        
        return $names;
    }
}