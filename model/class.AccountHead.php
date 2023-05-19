<?php

class AccountHead
{
    private $id;
    private $clientId;
    private $accountTypeId;
    private $name;
    private $status;
    private $notes;
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
    public function setInfo(array $accountHeadData)
    {
        $this->set("id", $accountHeadData['id']);
        $this->set("accountTypeId", $accountHeadData['accountTypeId']);
        $this->set("name", $accountHeadData['name']);
        $this->set("status", $accountHeadData['status']);
        $this->set("notes", $accountHeadData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE account_heads SET `account_type_id` = ?, `name`= ?, `status`= ?, `notes`= ? "
                 . " WHERE id = ?  AND account_heads.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("isisii", $this->accountTypeId, $this->name, $this->status, $this->notes, 
                                      $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "account_heads");
            $sql = "INSERT INTO account_heads (`id`, `client_id`, `account_type_id`, `name`, `status`, `notes`) "
                 . " VALUES(?,?,?,?,?,?) ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiisis", $maxId, $this->clientId, $this->accountTypeId, $this->name, $this->status, $this->notes);
            
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
    public static function isNameExist($p_name, $p_id=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT account_heads.`id` FROM account_heads  WHERE "
             . " name = '"  . $p_name . "' AND account_heads.client_id = " . CLIENT_ID;
        
        if ($p_id > 0){
            $sql .= " AND id != " . $p_id;
        }
        
        $result = $oMysqli->query($sql);
        
        if (!$result || !$result->num_rows){
           return false; 
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $accountHeads = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT account_heads.`id`, account_heads.`client_id`, "
             . " account_heads.account_type_id AS accountTypeId, account_heads.`name`, "
             . " account_heads.`status`, account_heads.`notes`, account_heads.`added_date` AS addedDate, "
             . " account_types.name AS typeName "
             . " FROM account_heads "
             . " LEFT JOIN account_types ON account_heads.account_type_id = account_types.id AND account_types.client_id =  " . CLIENT_ID
             . " WHERE account_heads.`client_id` = " . CLIENT_ID;
        
        if (isset($searchData['accountTypeId']) && $searchData['accountTypeId'] != ""){
            $searchSql .= " account_heads.account_type_id  LIKE '%" . $searchData['accountTypeId'] . "%' OR ";
        }
        
        if (isset($searchData['name']) && $searchData['name'] != ""){
            $searchSql .= " account_heads.name  LIKE '%" . $searchData['name'] . "%' OR ";
        }
        
        if (isset($searchData['status']) && $searchData['status'] > 0){
            $searchSql .= " account_heads.status = " . $searchData['status'] . "  OR ";
        }
        
        if (isset($searchData['notes']) && $searchData['notes'] != ""){
            $searchSql .= " account_heads.notes  LIKE '%" . $searchData['notes'] . "%'";
        }
        
        if ($searchSql!== ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY account_heads.added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $accountHeads; 
        }
        
        while($row = $result->fetch_object()){
            $accountHeads[] = $row;
        }
        
        return $accountHeads;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id`, account_type_id AS accountTypeId, `name`, "
             . " `status`, `notes`, `added_date` AS addedDate "
             . " FROM `account_heads` WHERE id = " . $pId . " AND client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    
    //----------------------------------------------------------------------------------------------
    public static function delete($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM account_heads WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getCount($pStatus=0, $onlyNew=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM account_heads WHERE client_id = " . CLIENT_ID;
        
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
    
    //----------------------------------------------------------------------------------------------
    public static function getNames()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT account_heads.id, account_heads.name FROM account_heads "
            . " WHERE account_heads.client_id = " . CLIENT_ID . " ORDER BY name ASC";
        
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