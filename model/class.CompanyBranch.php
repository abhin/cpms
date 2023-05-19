<?php

class CompanyBranch
{
    private $id;
    private $clientId;
    private $name;
    private $address;
    private $email;
    private $phone;
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
    public function setInfo(array $companyBranchData)
    {
        $this->set("id", $companyBranchData['id']);
        $this->set("name", $companyBranchData['name']);
        $this->set("address", $companyBranchData['address']);
        $this->set("email", $companyBranchData['email']);
        $this->set("phone", $companyBranchData['phone']);
        $this->set("notes", $companyBranchData['notes']);
        $this->set("status", $companyBranchData['status']);
        $this->set("addedDate", "utc_timestamp()");
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE company_branches SET name = ?, address = ?, "
                 . "email = ?, phone = ?, status = ?, "
                 . "notes = ? WHERE id = ? AND company_branches.client_id = ?   ";
            
            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("ssssisii", $this->name, 
                    $this->address, $this->email, $this->phone, $this->status, $this->notes, $this->id, $this->clientId);

            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "company_branches");
            $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
            
            $sql = "INSERT INTO company_branches (id, client_id, name, address, email, phone, notes, status, added_date) "
                . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iisssssis", $maxId, $this->clientId, $this->name, 
                    $this->address, $this->email, $this->phone, $this->notes, $this->status, $this->addedDate);

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
        
        $sql = "SELECT id FROM company_branches WHERE name = '"  . $pName . "' "
             . " AND company_branches.client_id = " . CLIENT_ID;

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
        $company_branches = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT `id`, `client_id` AS clientId, `name`, `address`, `email`, `phone`, `notes`, `status`, "
             . "DATE_FORMAT(added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate "
             . "FROM company_branches "
             . "WHERE company_branches.client_id = " . CLIENT_ID;
        
        if (isset($searchData['status']) && trim($searchData['status']) != ""){
            $searchSql .= " company_branches.status = '" . trim($searchData['status']) . "' OR ";
        }
        
        if (isset($searchData['name']) && trim($searchData['name']) != ""){
            $searchSql .= " company_branches.name LIKE '%" . trim($searchData['name']) . "%' OR ";
        }
        
        if (isset($searchData['address']) && trim($searchData['address']) != ""){
            $searchSql .= " company_branches.address LIKE '%" . trim($searchData['address']) . "%' OR ";
        }
        
        if (isset($searchData['email']) && trim($searchData['email']) != ""){
            $searchSql .= " company_branches.email LIKE '%" . trim($searchData['email']) . "%' OR ";
        }
        
        if (isset($searchData['phone']) && trim($searchData['phone']) != ""){
            $searchSql .= " company_branches.phone LIKE '%" . trim($searchData['phone']) . "%' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " company_branches.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
//        $sql .= " ORDER BY company_branches.added_date DESC ";
        $sql .= " ORDER BY company_branches.added_date DESC  LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $company_branches[] = $row;
        }
        
        return $company_branches;
    }
    
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM company_branches WHERE id IN (" . $ids . ")  AND company_branches.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    public static function getNames($pStatus=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT id, name FROM company_branches WHERE company_branches.client_id = " . CLIENT_ID;
        
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
    
    public static function getCount($pStatus=0, $isNewCompanyBranchs=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM company_branches WHERE company_branches.client_id = " . CLIENT_ID;
        
        if ($isNewCompanyBranchs == true){
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
        
        $sql = "SELECT `id`, `client_id`, `name`, `address`, `email`, `phone`, `notes`, `status`, "
             . "DATE_FORMAT(added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate "
            . " FROM company_branches WHERE id = "  . $pId . " AND company_branches.client_id = " . CLIENT_ID;

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