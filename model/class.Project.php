<?php

class Project
{
    private $id;
    private $clientId;
    private $branchId;
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
    public function setInfo(array $projectData)
    {
        $this->set("id", $projectData['id']);
        $this->set("branchId", $projectData['branchId']);
        $this->set("name", $projectData['name']);
        $this->set("progressId", $projectData['progressId']);
        $this->set("startedDate", $projectData['startedDate']);
        $this->set("completedDate", $projectData['completedDate']);
        $this->set("notes", $projectData['notes']);
        $this->set("status", 1);
        $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE projects SET `branch_id`= ?, name = ?, progress_id = ?, "
                 . "started_date = ?, completed_date = ?, "
                 . "notes = ? WHERE id = ? AND projects.client_id = ?   ";
            
            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("isisssii", $this->branchId, $this->name, 
                    $this->progressId, $this->startedDate, $this->completedDate, $this->notes, $this->id, $this->clientId);

            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "projects");
            $sql = "INSERT INTO projects (id, client_id, branch_id, name, progress_id, started_date, completed_date, notes, status, added_date) "
                . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiisisssis", $maxId, $this->clientId, $this->branchId, $this->name, 
                    $this->progressId, $this->startedDate, $this->completedDate, $this->notes, $this->status, $this->addedDate);

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
    }
    
    public static function isNameExist($pName, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM projects WHERE name = '"  . $pName . "' "
             . " AND projects.client_id = " . CLIENT_ID;

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
        $projects = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT projects.id, projects.branch_id AS branchId, projects.name,  projects.progress_id AS progressId, "
             . " projects.started_date AS startedDate, projects.completed_date AS completedDate, "
             . " projects.notes, projects.added_date AS addedDate, "
             . " DATE_FORMAT(started_date, '" . MYSQL_DATE_FORMAT . "') AS startedDateF, "
             . " DATE_FORMAT(completed_date, '" . MYSQL_DATE_FORMAT . "') AS completedDateF, "
             . " DATE_FORMAT(projects.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDateF, "
             . " progress.name AS progressName, company_branches.name AS branchName "
             . " FROM projects "
             . " LEFT JOIN progress ON projects.progress_id = progress.id "
             . " LEFT JOIN company_branches ON company_branches.id = projects.branch_id AND company_branches.client_id = " . CLIENT_ID
             . " WHERE projects.status = 1 AND projects.client_id = " . CLIENT_ID;
        
        if (isset($searchData['name']) && trim($searchData['name']) != ""){
            $searchSql .= " projects.name LIKE '%" . trim($searchData['name']) . "%' OR ";
        }
        
        if (isset($searchData['progressId']) && trim($searchData['progressId']) > 0){
            $searchSql .= " projects.progress_id = '" . trim($searchData['progressId']) . "' OR ";
        }
        
        if (isset($searchData['startedDate']) && trim($searchData['startedDate']) != "")
        {
            $searchSql .= " projects.started_date = '" . trim($searchData['startedDate']) . "' OR ";
        }
        
        if (isset($searchData['completedDate']) && trim($searchData['completedDate']) != "")
        {
            $searchSql .= " projects.completed_date = '" . trim($searchData['completedDate']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " projects.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
//        $sql .= " ORDER BY projects.added_date DESC ";
        $sql .= " ORDER BY projects.added_date DESC  LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $projects[] = $row;
        }
        
        return $projects;
    }
    
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM projects WHERE id IN (" . $ids . ")  AND projects.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    public function deleteAllData($ids)
    {
        $deleteFlag = true;
        
        $deleteFlag = Advance::deleteByProject($ids);

        if ($deleteFlag){
            $deleteFlag = Stage::deleteByProject($ids);
        }

        if ($deleteFlag){
            $deleteFlag = Expense::deleteByProject($ids);
        }

        if ($deleteFlag){
            $this->delete($ids);
        }
        
        return $deleteFlag;
    }
    
    public static function getNames($pStatus=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT id, name FROM projects WHERE projects.client_id = " . CLIENT_ID;
        
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
    
    public static function getCount($pStatus=0, $isNewProjects=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM projects WHERE projects.client_id = " . CLIENT_ID;
        
        if ($isNewProjects == true){
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
    
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT projects.id, projects.branch_id AS branchId, projects.name,  projects.progress_id AS progressId, "
             . " projects.started_date AS startedDate, projects.completed_date AS completedDate, "
             . " projects.notes, projects.added_date AS addedDate, "
             . " DATE_FORMAT(started_date, '" . MYSQL_DATE_FORMAT . "') AS startedDateF, "
             . " DATE_FORMAT(completed_date, '" . MYSQL_DATE_FORMAT . "') AS completedDateF, "
             . " DATE_FORMAT(projects.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDateF, "
             . " progress.name AS progressName, company_branches.name AS branchName "
             . " FROM projects "
             . " LEFT JOIN progress ON projects.progress_id = progress.id "
             . " LEFT JOIN company_branches ON company_branches.id = projects.branch_id AND company_branches.client_id = " . CLIENT_ID
             . " WHERE projects.id = "  . $pId . " AND projects.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    
    public static function exportAsExcel($fileName, array $data, array $skipFeilds=array())
    {
        echo '<pre>';
        var_dump((array) $data[0]);
        exit;
        $fileName =  $fileName .  "-". date('Ymd-H-i-s') . ".xls";
            $heading = array( "First Name","Last Name","User Type","user Status","Email","Country","State","City","Company","Region","Department","Supervisor","Division","Discipline","License","State of Licensure","Statebar","Statebar Number","title","Phone Number","Zipcode","Reg: On","Reg: Duration","Reg: End date","Is Tutor","Course Regs:");
            $index   =array('firstname','lastname','usertypename','userstatus','email','country','state','city','company','region','department','supervisor','division','discipline','license','stateoflicensure','statebar','statebarnumber','title','phonenumber','zipcode','registereddate','registrationduration','registrationenddate','istutor','totalregistrations');
    
    $excelData =  '<html>
                    <body>
                        <table border="1" width="100%" cellpadding="0" cellspacing="0"  >
                            <tr bgcolor="#26aaff" ><td align="left" colspan="9">
                                <h2 style="color:#FFFFF">User Report</h2></td>
                            </tr>
                            <tr bgcolor="#dbeaf9">';
     //BUILD CSV CONTENT
    foreach ($heading as $name){
        $tableHead .= '<th>'. $name . '</th>';
    }
    
    $excelData .= $tableHead . '</tr>';
    
    //BUILD CSV ROWS
    foreach($userReport as $key=>$row)
    {
        $bgColor = (($key%2) == 0) ? '#efefef' : '#fff';
        $excelData .= '<tr bgcolor="' . $bgColor . '">';
        foreach ($index as $fieldName)
        {
            $align = (($fieldName=='totalregistrations')||($fieldName=='country')) ? 'center' : 'left';
            
            if ($fieldName == 'istutor'){
                
                $status = ($row->$fieldName == 0) ? "No" : "Yes";
                $excelData .= '<td align="' . $align . '" width="200">' . $status  . '</td>';
                continue;
            }
            else if ($fieldName == 'userstatus'){
                
                switch($row->$fieldName)
                {
                 case 1:
                     $status = "active";
                 break;
                 
                 case 2:
                     $status = "inacive and pending";
                 break;
             
                 case 3:
                     $status = "inactive but not pending";
                 break;
                 
                 case 4:
                     $status = "deleted";
                 break;
             
                 case 5:
                     $status = " not logged yet";
                 break;
                }
                
                $excelData .= '<td align="' . $align .'" width="200">' . $status . '</td>';
                continue;
            }
            $excelData .= '<td align="' . $align .'" width="200">'.$row->$fieldName.'</td>';
        }
        
        $excelData .= "</tr>";
    }

   //OUPUT HEADERS
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=$fileName");
    
    //OUTPUT CSV CONTENT
    echo($excelData); 
    }
}