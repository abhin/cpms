<?php

class ProjectTeam
{
    private $id;
    private $clientId;
    private $projectId;
    private $projectStageId;
    private $employeeId;
    private $assignedDate;
    private $releasedDate;
    private $notes;
    private $addedDate;
    private $db;
    private static $DB = DEFAULT_DBO_NAME;

    //----------------------------------------------------------------------------------------------
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
    public function setInfo(array $projectTeamData)
    {
        $this->set("id", $projectTeamData['id']);
        $this->set("projectId", $projectTeamData['projectId']);
        $this->set("projectStageId", $projectTeamData['projectStageId']);
        $this->set("employeeId", $projectTeamData['employeeId']);
        $this->set("assignedDate", $projectTeamData['assignedDate']);
        $this->set("releasedDate", $projectTeamData['releasedDate']);
        $this->set("notes", $projectTeamData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE `project_teams` SET `project_stage_id`=?,"
                 . " `employee_id`=?,`assigned_date`=?,`released_date`=?,`notes`=?"
                 . " WHERE id = ?  AND project_teams.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iisssii",  $this->projectStageId, $this->employeeId, 
                                        $this->assignedDate, $this->releasedDate, $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "project_teams");
            $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
            $sql = "INSERT INTO `project_teams`"
                 . " (`id`, `client_id`, `project_id`, `project_stage_id`, `employee_id`, `assigned_date`, `released_date`, `notes`, `added_date`) "
                 . " VALUES (?,?,?,?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiiiissss", $maxId, $this->clientId, $this->projectId, 
                                       $this->projectStageId, $this->employeeId, $this->assignedDate, 
                                       $this->releasedDate, $this->notes, $this->addedDate);
            
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
            return true;
        }
        else{
            return false;
        }
        
        $stmt->close();
        $oMysqli->close();
    }
    
    //----------------------------------------------------------------------------------------------
    public static function isEmployeeExist($pProjectId, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM project_teams WHERE name = '"  . $pName . "' "
             . "AND project_id = " . $pProjectId . " AND project_teams.client_id = " . CLIENT_ID;

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
    
    //----------------------------------------------------------------------------------------------
    public function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE, $pagination=true)
    {
        $ProjectTeam_teams = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT project_teams.`id`, project_teams.`client_id` AS clientId,"
             . " project_teams.`project_id` AS projectId, project_teams.`project_stage_id` AS projectStageId, "
             . " project_teams.`employee_id` AS employeeId, project_teams.`assigned_date` AS assignedDate, "
             . " project_teams.`released_date` AS releasedDate, project_teams.`notes`, project_teams.`added_date` AS addedDate,"
             . " DATE_FORMAT(project_teams.assigned_date, '" . MYSQL_DATE_FORMAT . "') AS assignedDateF, "
             . " DATE_FORMAT(project_teams.released_date, '" . MYSQL_DATE_FORMAT . "') AS releasedDateF, "
             . " DATE_FORMAT(project_teams.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDateF,"
             . " projects.name AS projectName, project_stages.name AS stageName, hrm_employees.name AS employeeName "
             . " FROM project_teams "
             . " LEFT JOIN projects ON projects.id = project_teams.project_id AND projects.client_id = " . CLIENT_ID
             . " LEFT JOIN project_stages ON project_stages.id = project_teams.project_stage_id AND project_stages.client_id = " . CLIENT_ID
             . " LEFT JOIN hrm_employees ON hrm_employees.id = project_teams.employee_id AND hrm_employees.client_id = " . CLIENT_ID
             . " WHERE project_teams.client_id = " . CLIENT_ID;
        
        if (isset($searchData['projectId']) && trim($searchData['projectId']) > 0){
            $sql .= " AND project_teams.project_id = " . $searchData['projectId'];
        }
        
        if (isset($searchData['projectStageId']) && trim($searchData['projectStageId']) > 0){
            $searchSql .= " project_teams.project_stage_id = '" . trim($searchData['projectStageId']) . "' OR ";
        }
        
        if (isset($searchData['employeeId']) && trim($searchData['employeeId']) > 0){
            $searchSql .= " project_teams.employee_id = '" . trim($searchData['employeeId']) . "' OR ";
        }
        
        if (isset($searchData['assignedDate']) && trim($searchData['assignedDate']) > 0){
            $searchSql .= " project_teams.assigned_date = '" . trim($searchData['assignedDate']) . "' OR ";
        }
        if (isset($searchData['releasedDate']) && trim($searchData['releasedDate']) > 0){
            $searchSql .= " project_teams.released_date = '" . trim($searchData['releasedDate']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " project_teams.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY project_teams.added_date DESC  ";
        
        if ($pagination === true){
            $sql .= " LIMIT " . $limit ." OFFSET " . $startIndex;
        }
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        $totalAmount = 0;
        
        while($row = $result->fetch_object()){
            $ProjectTeam_teams[] = $row;
        }
        
        return $ProjectTeam_teams;
    }
    
    //----------------------------------------------------------------------------------------------
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM project_teams WHERE id IN (" . $ids . ") "
             . "AND project_teams.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function deleteByProject($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM project_teams WHERE project_id IN (" . $ids . ") "
             . "AND project_teams.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function deleteByStage($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM project_teams WHERE project_stage_id IN (" . $ids . ") "
             . "AND project_teams.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id` AS clientId, `project_id` AS projectId, `project_stage_id` AS projectStageId, "
             . " `employee_id` AS employeeId, `assigned_date` AS assignedDate, `released_date` AS releasedDate, `notes`, `added_date` AS addedDate"
             . " DATE_FORMAT(project_teams.assigned_date, '" . MYSQL_DATE_FORMAT . "') AS assignedDateF, "
             . " DATE_FORMAT(project_teams.released_date, '" . MYSQL_DATE_FORMAT . "') AS releasedDateF, "
             . " DATE_FORMAT(project_teams.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDateF "
             . " FROM project_teams WHERE id = "  . $pId . " AND project_teams.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getCount($onlyNew=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT SUM(amount) AS totalAmount FROM project_teams WHERE client_id = " . CLIENT_ID;
        
        if ($onlyNew == true){
            $sql .= " AND purchase_date BETWEEN '" . General::convertDate(date('Y-m-d', strtotime("-15 days"))) . "' "
                  . " AND '" . General::convertDate(date('Y-m-d', strtotime("today"))) . "'";
        }
        
        $result = $oMysqli->query($sql);

        if (!$result){
           return false; 
        }
        
        $row = $result->fetch_object();
        return $row->totalAmount;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getUnassignedEmployees($projectId, $pStatus=ACTIVE)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = " SELECT hrm_employees.id, hrm_employees.name "
             . " FROM hrm_employees "
             . " WHERE hrm_employees.id NOT IN "
             . " (SELECT employee_id from project_teams WHERE project_teams.project_id = '" . $projectId . "' "
             . " AND project_teams.released_date <= '" . date("Y-m-d", strtotime("now")) . "')"
             . " AND project_teams.client_id = " . CLIENT_ID . ")"
             . " AND hrm_employees.client_id = " . CLIENT_ID;
        
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
    
    //----------------------------------------------------------------------------------------------
    public static function getAssigneIds($projectId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        return $sql = " SELECT employee_id from project_teams "
             . " WHERE project_teams.project_id = '" . $projectId . "' AND project_teams.client_id = " . CLIENT_ID;
        
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
    
    //----------------------------------------------------------------------------------------------
}