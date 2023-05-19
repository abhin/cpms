<?php

class EmploymentDetails
{
    private $id;
    private $clientId;
    private $employeeId;
    private $salaryAmount;
    private $paymentTermId;
    private $departmentId;
    private $designationId;
    private $employmentTypeId;
    private $qualificationIds;
    private $joinDate;
    private $releaveDate;
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
    public function setInfo(array $employmentData)
    {
        $this->set("id", $employmentData['id']);
        $this->set("employeeId", $employmentData['employeeId']);
        $this->set("salaryAmount", $employmentData['salaryAmount']);
        $this->set("paymentTermId", $employmentData['paymentTermId']);
        $this->set("departmentId", $employmentData['departmentId']);
        $this->set("designationId", $employmentData['designationId']);
        $this->set("employmentTypeId", $employmentData['employmentTypeId']);
        $this->set("qualificationIds", $employmentData['qualificationIds']);
        $this->set("joinDate", $employmentData['joinDate']);
        $this->set("releaveDate", $employmentData['releaveDate']);
        $this->set("addedDate", "utc_timestamp()");
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE `hrm_employee_details` SET "
                 . " `salary_amount`=?,"
                 . " `payment_term_id`=?,`department_id`=?,`designation_id`=?,"
                 . " `employment_type_id`=?, `qualification_ids`=?, `join_date`=?,`releave_date`=?"
                 . " WHERE id = ? AND hrm_employee_details.client_id = ?   ";
            
            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("siiiisssii", $this->salaryAmount, $this->paymentTermId, $this->departmentId, 
                    $this->designationId, $this->employmentTypeId, $this->qualificationIds, $this->joinDate, $this->releaveDate, $this->id, $this->clientId);

            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "hrm_employee_details");
            $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
            
            $sql = "INSERT INTO `hrm_employee_details`(`id`, `client_id`, `employee_id`, "
                 . " `salary_amount`, `payment_term_id`, `department_id`, `designation_id`, "
                 . " `employment_type_id`, `qualification_ids`, `join_date`, `releave_date`, `added_date`) "
                 . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiisiiiissss", $maxId, $this->clientId, $this->employeeId, 
                    $this->salaryAmount, $this->paymentTermId, $this->departmentId, $this->designationId, 
                    $this->employmentTypeId, $this->qualificationIds, $this->joinDate, $this->releaveDate , $this->addedDate);

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
    
    public static function isDetailsExist($pEmployeeId, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM hrm_employee_details WHERE employee_id = '"  . $pEmployeeId . "' "
             . " AND hrm_employee_details.client_id = " . CLIENT_ID;

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
        $hrm_employee_details = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT `id`, `client_id` AS clientId, `employee_id` AS employeeId, "
             . "  `salary_amount` AS salaryAmount, `payment_term_id` AS paymentTermId, "
             . " `department_id` AS departmentId, `designation_id` AS designationId, "
             . " `employment_type_id` AS employmentTypeId, qualification_ids AS qualificationIds,"
             . "DATE_FORMAT(`join_date`, '" . MYSQL_DATE_FORMAT . "') AS joinDate, "
             . "DATE_FORMAT(`releave_date`, '" . MYSQL_DATE_FORMAT . "') AS releaveDate, "
             . "DATE_FORMAT(added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate "
             . "FROM hrm_employee_details "
             . "WHERE hrm_employee_details.client_id = " . CLIENT_ID;
        
        
        if (isset($searchData['employeeId']) && trim($searchData['employeeId']) > 0){
            $searchSql .= " hrm_employee_details.employee_id = '" . trim($searchData['employeeId']) . "' OR ";
        }
        
        if (isset($searchData['salaryAmount']) && trim($searchData['salaryAmount']) != ""){
            $searchSql .= " hrm_employee_details.salary_amount LIKE '%" . trim($searchData['salaryAmount']) . "%'";
        }
        
        if (isset($searchData['paymentTermId']) && trim($searchData['paymentTermId']) != "")
        {
            $searchSql .= " hrm_employee_details.payment_term_id = '" . trim($searchData['paymentTermId']) . "' OR ";
        }
        
        if (isset($searchData['departmentId']) && trim($searchData['departmentId']) != "")
        {
            $searchSql .= " hrm_employee_details.department_id = '" . trim($searchData['departmentId']) . "' OR ";
        }
        
        if (isset($searchData['designationId']) && trim($searchData['designationId']) != "")
        {
            $searchSql .= " hrm_employee_details.designation_id = '" . trim($searchData['designationId']) . "' OR ";
        }
        
        if (isset($searchData['employmentTypeId']) && trim($searchData['employmentTypeId']) != "")
        {
            $searchSql .= " hrm_employee_details.employment_type_id = '" . trim($searchData['employmentTypeId']) . "' OR ";
        }
        
        if (isset($searchData['qualificationIds']) && trim($searchData['qualificationIds']) != "")
        {
            $searchSql .= " hrm_employee_details.qualification_ids LIKE '%" . implode(",",trim($searchData['qualificationIds'])) . "',% OR ";
        }
        
        if (isset($searchData['joinDate']) && trim($searchData['joinDate']) != "")
        {
            $searchSql .= " hrm_employee_details.join_date = '" . trim($searchData['joinDate']) . "' OR ";
        }
        
        if (isset($searchData['releaveDate']) && trim($searchData['releaveDate']) != "")
        {
            $searchSql .= " hrm_employee_details.releave_date = '" . trim($searchData['releaveDate']) . "' OR ";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
//        $sql .= " ORDER BY hrm_employee_details.added_date DESC ";
        $sql .= " ORDER BY hrm_employee_details.added_date DESC  LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $hrm_employee_details[] = $row;
        }
        
        return $hrm_employee_details;
    }
    
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM hrm_employee_details WHERE id IN (" . $ids . ")  AND hrm_employee_details.client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT id, name FROM hrm_employee_details WHERE hrm_employee_details.client_id = " . CLIENT_ID;
        
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
        
        $sql = "SELECT id FROM hrm_employee_details WHERE hrm_employee_details.client_id = " . CLIENT_ID;
        
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
        
        $sql = "SELECT `id`, `client_id` AS clientId, `employee_id` AS employeeId, "
             . "  `salary_amount` AS salaryAmount, `payment_term_id` AS paymentTermId, "
             . " `department_id` AS departmentId, `designation_id` AS designationId, "
             . " `employment_type_id` AS employmentTypeId, `qualification_ids` AS qualificationIds,"
             . "DATE_FORMAT(`join_date`, '" . MYSQL_DATE_FORMAT . "') AS joinDate, "
             . "DATE_FORMAT(`releave_date`, '" . MYSQL_DATE_FORMAT . "') AS releaveDate, "
             . "DATE_FORMAT(added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate"
            . " FROM hrm_employee_details WHERE id = "  . $pId . " AND hrm_employee_details.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    public function getDetailsByEmployeeId($employeeId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id` AS clientId, `employee_id` AS employeeId, "
             . "  `salary_amount` AS salaryAmount, `payment_term_id` AS paymentTermId, "
             . " `department_id` AS departmentId, `designation_id` AS designationId, "
             . " `employment_type_id` AS employmentTypeId, `qualification_ids` AS qualificationIds,"
             . "DATE_FORMAT(`join_date`, '" . MYSQL_DATE_FORMAT . "') AS joinDate, "
             . "DATE_FORMAT(`releave_date`, '" . MYSQL_DATE_FORMAT . "') AS releaveDate, "
             . "DATE_FORMAT(added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate"
             . " FROM hrm_employee_details "
             . " WHERE employee_id = "  . $employeeId . " AND hrm_employee_details.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    
    public function getId($employeeId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id` "
            . " FROM hrm_employee_details "
            . " WHERE employee_id = "  . $employeeId . " AND hrm_employee_details.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        $row = $result->fetch_object();
        
        return $row->id;
    }
}