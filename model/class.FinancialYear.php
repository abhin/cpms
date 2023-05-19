<?php

class FinancialYear
{
    private $id;
    private $clientId;
    private $name;
    private $startDate;
    private $endDate;
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
        $this->set("startDate", $buyerData['startDate']);
        $this->set("endDate", $buyerData['endDate']);
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
            $sql = "UPDATE financial_years SET `name`= ?, `start_date` = ?, `end_date` = ?, `status`= ?, `notes`=  ? "
                 . " WHERE client_id = ? AND financial_years.id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("sssisii",  $this->name, $this->startDate, $this->endDate, 
                                        $this->status, $this->notes, $this->clientId, $this->id);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "financial_years");
            $sql = "INSERT INTO financial_years (`id`, `client_id`,  `name`, `start_date`, `end_date`, `status`, `notes`) "
                 . "VALUES(?,?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iisssis", $maxId, $this->clientId, $this->name, 
                                       $this->startDate, $this->endDate, $this->status, $this->notes);
            
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
        
        $sql = "SELECT financial_years.`id` FROM financial_years  WHERE "
             . " name = '"  . $p_name . "' AND financial_years.client_id = " . CLIENT_ID;
        
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
    public static function isRangeExist($p_startDate, $p_endDate, $p_id=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT financial_years.`id` FROM financial_years  WHERE "
             . " start_date = '"  . $p_startDate . "' AND  end_date = '"  . $p_endDate . "' "
             . " AND financial_years.client_id = " . CLIENT_ID;
        
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
    public static function getAll($searchData=array())
    {
        $financial_years = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `id`, `client_id`, `name`, `start_date` AS startDate, `end_date` AS endDate, `status`, `notes`, "
             . " `added_date` AS addedDate FROM financial_years WHERE financial_years.client_id = " . CLIENT_ID;
        
        if (isset($searchData['name']) && $searchData['name'] != ""){
            $searchSql .= " name  LIKE '%" . $searchData['name'] . "%' OR ";
        }
        
        if (isset($searchData['startDate']) && $searchData['startDate'] != ""){
            $searchSql .= " start_date = '" . $searchData['startDate'] . "'  OR ";
        }
        
        if (isset($searchData['endDate']) && $searchData['endDate'] != ""){
            $searchSql .= " end_date = '" . $searchData['endDate'] . "'  OR ";
        }
        
        if (isset($searchData['status']) && $searchData['status'] > 0){
            $searchSql .= " status = " . $searchData['status'] . "  OR ";
        }
        
        if (isset($searchData['notes']) && $searchData['notes'] != ""){
            $searchSql .= " notes  LIKE '%" . $searchData['notes'] . "%' OR ";
        }
        
        if ($searchSql!== ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY added_date DESC ";
        
//        var_dump($sql);
//        exit;
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $financial_years; 
        }
        
        while($row = $result->fetch_object()){
            $financial_years[] = $row;
        }
        
        return $financial_years;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id`, `name`, `start_date` AS startDate, `end_date` AS endDate, `status`, "
             . " `notes`, `added_date` AS addedDate "
             . " FROM `financial_years` WHERE id = " . $pId . " AND client_id = " . CLIENT_ID;

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
        
        $sql = "DELETE FROM financial_years WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getNames()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT financial_years.id, financial_years.name, financial_years.start_date, "
             . " financial_years.end_date FROM financial_years "
             . " WHERE financial_years.client_id = " . CLIENT_ID . " ORDER BY name ASC";
        
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