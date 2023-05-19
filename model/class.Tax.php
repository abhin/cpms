<?php

class Tax
{
    private $id;
    private $clientId;
    private $name;
    private $precentage;
    private $isDefault;
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
    public function setInfo(array $buyerData)
    {
        $this->set("id", $buyerData['id']);
        $this->set("name", $buyerData['name']);
        $this->set("precentage", $buyerData['precentage']);
        $this->set("isDefault", $buyerData['isDefault']);
        $this->set("status", $buyerData['status']);
        $this->set("notes", $buyerData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE taxes SET `name`= ?, `precentage`= ?, `is_default`= ?,"
                 . " `status`= ?, `notes`= ? "
                 . " WHERE id = ?  AND taxes.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("sdiisii",  $this->name, $this->precentage, $this->isDefault, 
                                       $this->status, $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "taxes");
            $sql = "INSERT INTO taxes (`id`, `client_id`, `name`, `precentage`, `is_default`, `status`, `notes`) "
                 . "VALUES(?,?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iisdiis", $maxId, $this->clientId, $this->name, $this->precentage, 
                                $this->isDefault, $this->status, $this->notes);
            
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
        
        $sql = "SELECT taxes.`id` FROM taxes  WHERE "
             . " name = '"  . $p_name . "' AND taxes.client_id = " . CLIENT_ID;
        
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
        $taxes = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `id`, `client_id`, `name`, `precentage`, `is_default` AS isDefault, "
             . " `status`, `notes`, `added_date` AS addedDate FROM taxes "
             . " WHERE taxes.`client_id` = " . CLIENT_ID;
        
        if (isset($searchData['name']) && $searchData['name'] != ""){
            $searchSql .= " name  LIKE '%" . $searchData['name'] . "%' OR ";
        }
        
        if (isset($searchData['precentage']) && $searchData['precentage'] != ""){
            $searchSql .= " precentage  LIKE '%" . $searchData['precentage'] . "%' OR ";
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
           return $taxes; 
        }
        
        while($row = $result->fetch_object()){
            $taxes[] = $row;
        }
        
        return $taxes;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id`, `name`, `precentage`, `is_default` AS isDefault, "
             . " `status`, `notes`, `added_date` AS addedDate "
             . " FROM `taxes` WHERE id = " . $pId . " AND client_id = " . CLIENT_ID;

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
        
        $sql = "DELETE FROM taxes WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT id FROM taxes WHERE client_id = " . CLIENT_ID;
        
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
    public static function setDefault($taxId, $value=1)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "UPDATE `taxes` SET `is_default` = " . $value
             . " WHERE taxes.client_id = " . CLIENT_ID . " AND ";
        
        if ($taxId > 0){
            $sql .= " `id` = " . $taxId;
            self::resetDefault();
        }else{
            $sql .= " `is_default` = 1 ";
        }
        
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
    
    //----------------------------------------------------------------------------------------------
    public static function resetDefault()
    {
        return self::setDefault(0, 2);
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getNames()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT taxes.id, taxes.name FROM taxes WHERE taxes.client_id = " . CLIENT_ID . " ORDER BY name ASC";
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $names; 
        }

        while($row = $result->fetch_object()){
            $names[] = $row;
        }
        
        return $names;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getDefaultTax()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT taxes.id, taxes.name, taxes.precentage FROM taxes "
                . "WHERE taxes.	is_default = 1 AND taxes.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_object();
    }
}