<?php

class Advance
{
    private $id;
    private $clientId;
    private $projectId;
    private $amount;
    private $receivedDate;
    private $notes;
    private $added_date;
    private $db;

    public function __construct()
    {
        $this->set("db", $GLOBALS[DEFAULT_DBO_NAME]);
        $this->set("clientId", CLIENT_ID);
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
        $this->set("projectId", $data['projectId']);
        $this->set("amount", $data['amount']);
        $this->set("receivedDate", $data['receivedDate']);
        $this->set("notes", $data['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        $saveFlag = true;

        if ($saveFlag == true)
        {
            if ($this->id > 0){
                $sql = "UPDATE advances SET amount = " . $this->amount . ", notes = '" . $this->notes . "',"
                     . " received_date = '" . $this->receivedDate . "' WHERE id = " . $this->id 
                     . " AND advances.client_id = " . CLIENT_ID;
            }
            else{
                $maxId = $this->db->getMaxId("id", "advances");
                $sql = "INSERT INTO advances (id, client_id, project_id, amount, received_date, notes) "
                     . "VALUES(" . $maxId . "," . CLIENT_ID .  "," . $this->projectId . ", " 
                     . $this->amount . ", '" . $this->receivedDate . "', '" . $this->notes . "')";
            }
            
            $result = $oMysqli->query($sql);
            
            if (!$result){
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
        }
    }
    //----------------------------------------------------------------------------------------------
    public function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $advances = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT advances.id, advances.project_id AS projectId, "
             . " advances.amount, advances.received_date, advances.notes, "
             . " DATE_FORMAT(advances.received_date, '" . MYSQL_DATE_FORMAT . "') AS receivedDate, "
             . " projects.name AS projectName "
             . " FROM advances "
             . " LEFT JOIN projects ON advances.project_id = projects.id AND projects.client_id = " . CLIENT_ID
             . " WHERE advances.client_id = " . CLIENT_ID;
        
        
        if (isset($searchData['projectId']) && trim($searchData['projectId']) >  0){
            $sql .= " AND advances.project_id = '" . trim($searchData['projectId']) . "' ";
        }
        
        if (isset($searchData['amount']) && trim($searchData['amount']) > 0){
            $searchSql .= " advances.amount LIKE '%" . trim($searchData['amount']) . "%' OR ";
        }
        
        if (isset($searchData['receivedDate']) && trim($searchData['receivedDate']) != "")
        {
            $searchSql .= " advances.received_date = '" . trim($searchData['receivedDate']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " advances.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY advances.added_date DESC  LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }
        
        $totalAmount = 0;
        
        while($row = $result->fetch_object()){
            $advances[] = $row;
            $totalAmount += $row->amount;
        }
        
        $advances["totalAmount"] = $totalAmount;
        return $advances;
    }
    //----------------------------------------------------------------------------------------------
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM advances WHERE id IN (" . $ids . ") AND advances.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    //----------------------------------------------------------------------------------------------
    public static function deleteByProject($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM advances WHERE project_id IN (" . $ids . ") AND advances.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    //----------------------------------------------------------------------------------------------
    public function getDetails($p_Id)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT advances.id, advances.project_id, advances.amount, advances.received_date AS receivedDate, advances.notes, "
             . "DATE_FORMAT(advances.received_date, '" . MYSQL_DATE_FORMAT . "') AS Received_Date "
             . "FROM advances WHERE id = "  . $p_Id . " AND advances.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    //----------------------------------------------------------------------------------------------
    public static function getCount($onlyNew=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT SUM(amount) AS totalAmount FROM advances WHERE client_id = " . CLIENT_ID;
        
        if ($onlyNew == true){
            $sql .= " AND received_date BETWEEN '" . General::convertDate(date('Y-m-d', strtotime("-15 days"))) . "' "
                  . " AND '" . General::convertDate(date('Y-m-d', strtotime("today"))) . "'";
        }
        
        $result = $oMysqli->query($sql);

        if (!$result){
           return false; 
        }
        
        $row = $result->fetch_object();
        return $row->totalAmount;
    }
}