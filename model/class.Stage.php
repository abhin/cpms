<?php

class Stage
{
    private $id;
    private $clientId;
    private $projectId;
    private $name;
    private $progressId;
    private $startedDate;
    private $completedDate;
    private $notes;
    private $status;
    private $addedDate;
    private $db;
    private static $DB = DEFAULT_DBO_NAME;


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
    public function setInfo(array $projectData)
    {
        $this->set("id", $projectData['id']);
        $this->set("projectId", $projectData['projectId']);
        $this->set("name", $projectData['name']);
        $this->set("progressId", $projectData['progressId']);
        $this->set("startedDate", $projectData['startedDate']);
        $this->set("completedDate", $projectData['completedDate']);
        $this->set("notes", $projectData['notes']);
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
                $sql = "UPDATE project_stages SET name = '" . $this->name . "', progress_id = '" . $this->progressId . "', "
                     . "started_date = '" . $this->startedDate . "', completed_date = '" . $this->completedDate . "', "
                     . "notes = '" . $this->notes . "' WHERE id = " . $this->id . " AND project_stages.client_id = " . CLIENT_ID;
            }
            else{
                $maxId = $this->db->getMaxId("id", "project_stages");
                $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
                $sql = "INSERT INTO project_stages (id, client_id, project_id, name, progress_id, started_date, completed_date, notes, added_date) "
                    . "VALUES(" . $maxId . ", " . CLIENT_ID . ", '" . $this->projectId . "', '" . $this->name . "', '" . $this->progressId . "', '" 
                    . $this->startedDate . "', '" . $this->completedDate . "', '" . $this->notes . "', '" . $this->addedDate . "')";
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
    
    public static function isNameExist($pProjectId, $pName, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM project_stages WHERE name = '"  . $pName . "' AND "
             . " project_id = " . $pProjectId . " AND project_stages.client_id = " . CLIENT_ID;

        if ($pId > 0){
            $sql .= " AND id != " . $pId . "";
        }

        $result = $DB->query($sql);

        if (!$result->num_rows){
           return false; 
        }

        $row = $result->fetch_assoc();

        if ($row['id'] > 0){
            return true;
        }
        
        return false;
    }
    
    public function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $projectStages = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT project_stages.id, project_stages.project_id AS projectId, project_stages.name, projects.name AS projectName, "
             . "project_stages.progress_id AS progressId, project_stages.notes, progress.name AS progressName,"
             . "DATE_FORMAT(project_stages.started_date, '" . MYSQL_DATE_FORMAT . "') AS startedDate, "
             . "DATE_FORMAT(project_stages.completed_date, '" . MYSQL_DATE_FORMAT . "') AS completedDate, "
             . "DATE_FORMAT(project_stages.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate "
             . "FROM project_stages "
             . " LEFT JOIN projects ON project_stages.project_id = projects.id AND projects.client_id = " . CLIENT_ID
             . " LEFT JOIN progress ON project_stages.progress_id = progress.id "
             . " WHERE project_stages.client_id = " . CLIENT_ID;
        
        if (isset($searchData['projectId']) && trim($searchData['projectId']) > 0){
            $sql .= " AND project_stages.project_id = " . $searchData['projectId'];
        }
        
        if (isset($searchData['name']) && trim($searchData['name']) != ""){
            $searchSql .= " project_stages.name LIKE '%" . trim($searchData['name']) . "%' OR ";
        }
        
        if (isset($searchData['progressId']) && trim($searchData['progressId']) > 0){
            $searchSql .= " project_stages.progress_id = '" . trim($searchData['progressId']) . "' OR ";
        }
        
        if (isset($searchData['startedDate']) && trim($searchData['startedDate']) != "")
        {
            $searchSql .= " project_stages.started_date = '" . trim($searchData['startedDate']) . "' OR ";
        }
        
        if (isset($searchData['completedDate']) && trim($searchData['completedDate']) != "")
        {
            $searchSql .= " project_stages.completed_date = '" . trim($searchData['completedDate']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " project_stages.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY project_stages.added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $projectStages[] = $row;
        }
        
        return $projectStages;
    }
    
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $status = Expense::deleteByStage($ids);
        
        if(!$status){
            return false;
        }
        
        $sql = "DELETE FROM project_stages WHERE id IN (" . $ids . ") AND project_stages.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    public static function deleteByProject($pProjectIds)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM project_stages WHERE project_id IN (" . $pProjectIds . ") AND project_stages.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    
    public static function getNames($pProjectId, $pStatus=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT id, name FROM project_stages WHERE project_id = " . $pProjectId 
             . " AND project_stages.client_id = " . CLIENT_ID;
        
        if ($pStatus > 0){
            $sql .= " AND status = " . $pStatus;
        }
        
        $sql .= " ORDER BY name ASC";
            
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $names; 
        }

        while($row = $result->fetch_object()){
            $names[] = $row;
        }
        
        return $names;
    }
    
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT id, project_id, name, progress_id AS progressId, "
            . "DATE_FORMAT(started_date, '%Y-%m-%d') AS startedDate, "
            . "DATE_FORMAT(completed_date, '%Y-%m-%d') AS completedDate, notes"
            . " FROM project_stages WHERE id = " . $pId . " AND project_stages.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();;
    }
}