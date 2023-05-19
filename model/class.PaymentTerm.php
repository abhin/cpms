<?php

class PaymentTerm
{
    private $id;
    private $clientId;
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
    public function setInfo(array $termData)
    {
        $this->set("id", $termData['id']);
        $this->set("name", $termData['name']);
        $this->set("status", $termData['status']);
        $this->set("notes", $termData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE payment_terms SET `name`= ?, `status`= ?, `notes`= ? "
                 . " WHERE id = ?  AND payment_terms.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("sisii",  $this->name, $this->status, 
                                        $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "payment_terms");
            $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
            $sql = "INSERT INTO payment_terms (`id`, `client_id`, `name`, `status`, `notes`, `added_date`) "
                 . "VALUES(?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iisiss", $maxId, $this->clientId, $this->name, 
                                       $this->status, $this->notes, $this->addedDate);
            
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
        
        $sql = "SELECT payment_terms.`id` FROM payment_terms  WHERE "
             . " name = '"  . $p_name . "' AND payment_terms.client_id = " . CLIENT_ID;
        
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
    public static function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE, $pagination=true)
    {
        $payment_terms = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `id`, `client_id` AS clientId, `name`, "
             . " `status`, `notes`, `added_date` AS addedDate FROM payment_terms "
             . " WHERE payment_terms.`client_id` = " . CLIENT_ID;
        
        if (isset($searchData['name']) && $searchData['name'] != ""){
            $searchSql .= " name  LIKE '%" . $searchData['name'] . "%' OR ";
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
        
//        $sql .= " ORDER BY payment_terms.added_date DESC  LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $sql .= " ORDER BY payment_terms.added_date DESC  ";
        
        if ($pagination === true){
            $sql .= " LIMIT " . $limit ." OFFSET " . $startIndex;
        }
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $payment_terms; 
        }
        
        while($row = $result->fetch_object()){
            $payment_terms[] = $row;
        }
        
        return $payment_terms;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id` AS clientId, `name`, "
             . " `status`, `notes`, `added_date` AS addedDate "
             . " FROM `payment_terms` WHERE id = " . $pId . " AND client_id = " . CLIENT_ID;

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
        
        $sql = "DELETE FROM payment_terms WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT id FROM payment_terms WHERE client_id = " . CLIENT_ID;
        
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
    public static function getNames($status=ACTIVE)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT payment_terms.id, payment_terms.name FROM payment_terms "
             . " WHERE payment_terms.client_id = " . CLIENT_ID;
        
        if ((int)$status === ACTIVE || (int)$status === INACTIVE){
            $sql .= " AND payment_terms.status='" . $status . "' ";
        }
        
        $sql .= " ORDER BY payment_terms.name ASC";
        
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