<?php

class Payment
{
    private $id;
    private $clientId;
    private $employeeId;
    private $amount;
    private $isItSalary;
    private $salaryMonth;
    private $paymentTypeId;
    private $paymentMethodId;
    private $paymentTermId;
    private $totalHours;
    private $salaryDateStart;
    private $salaryDateEnd;
    private $receiptNo;
    private $paymentDate;
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
    public function setInfo(array $typeData)
    {
        $this->set("id", (int)$typeData['id']);
        $this->set("employeeId", (int)$typeData['employeeId']);
        $this->set("amount", (float)$typeData['amount']);
        $this->set("isItSalary", (int)$typeData['isItSalary']);
        $this->set("salaryMonth", $typeData['salaryMonth']);
        $this->set("paymentTypeId", (int)$typeData['paymentTypeId']);
        $this->set("paymentMethodId", (int)$typeData['paymentMethodId']);
        $this->set("paymentTermId", (int)$typeData['paymentTermId']);
        $this->set("totalHours", (int)$typeData['totalHours']);
        $this->set("salaryDateStart", $typeData['salaryDateStart']);
        $this->set("salaryDateEnd", $typeData['salaryDateEnd']);
        $this->set("receiptNo", $typeData['receiptNo']);
        $this->set("paymentDate", $typeData['paymentDate']);
        $this->set("notes", $typeData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE `hrm_employee_payments` SET "
                 . " `amount`=?, `is_it_salary`=?, `salary_month`=?, `payment_type_id`=?,"
                 . " `payment_method_id`=?,`payment_term_id`=?, `total_hours`=?, `salary_date_start`=?, "
                 . " `salary_date_end`=?, `receipt_no`=?, `payment_date`=?, `notes`=? "
                 . " WHERE id = ?  AND hrm_employee_payments.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return "false";
            }
            $bind = $stmt->bind_param("sisiiiisssssii",  $this->amount, $this->isItSalary, $this->salaryMonth, $this->paymentTypeId, 
                                      $this->paymentMethodId, $this->paymentTermId, $this->totalHours, $this->salaryDateStart, 
                                      $this->salaryDateEnd, $this->receiptNo, $this->paymentDate, $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "hrm_employee_payments");
            $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
            $sql = "INSERT INTO `hrm_employee_payments`"
                 . " (`id`, `client_id`, `employee_id`, `amount`, `is_it_salary`, "
                 . " `salary_month`, `payment_type_id`, `payment_method_id`, "
                 . " `payment_term_id`, `total_hours`, `salary_date_start`, "
                 . " `salary_date_end`, `receipt_no`, `payment_date`, `notes`, `added_date`) "
                 . " VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiisisiiiissssss", $maxId, $this->clientId, $this->employeeId, $this->amount, 
                                      $this->isItSalary, $this->salaryMonth, $this->paymentTypeId, $this->paymentMethodId, 
                                      $this->paymentTermId, $this->totalHours, $this->salaryDateStart, $this->salaryDateEnd,
                                      $this->receiptNo, $this->paymentDate, $this->notes, $this->addedDate);
            
            if (!$bind){
                return false;
            }
        }
        
        $excute = $stmt->execute();
//        var_dump($stmt->error);
//        exit;
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
    public static function isPaymentExist($p_name, $p_id=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT hrm_employee_payments.`id` FROM hrm_employee_payments  WHERE "
             . " name = '"  . $p_name . "' AND hrm_employee_payments.client_id = " . CLIENT_ID;
        
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
        $hrmEmployeePayments = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT ep.`id`, ep.`client_id` AS clientId, ep.`employee_id` AS employeeId, ep.`amount`, "
             . " ep.`is_it_salary` AS isItSalary, DATE_FORMAT(ep.`salary_month`, '%Y-%m') AS salaryMonth, "
             . " ep.`payment_type_id` AS paymentTypeId, ep.`payment_method_id` AS paymentMethodid, "
             . " ep.`payment_term_id` AS paymentTermId, ep.`total_hours` AS totalHours, "
             . " ep.`salary_date_start` AS salaryDateStart, ep.`salary_date_end`  AS salaryDateEnd, "
             . " ep.`receipt_no` AS receiptNo, ep.`payment_date` AS paymentDate, ep.`notes`, ep.`added_date` AS addedDate, "
             . " DATE_FORMAT(ep.salary_month, '%b - %Y') AS salaryMonthF, "
             . " DATE_FORMAT(ep.salary_date_start, '" . MYSQL_DATE_FORMAT . "') AS salaryDateStartF, "
             . " DATE_FORMAT(ep.salary_date_end, '" . MYSQL_DATE_FORMAT . "') AS salaryDateEndF, "
             . " DATE_FORMAT(ep.payment_date, '" . MYSQL_DATE_FORMAT . "') AS paymentDateF, "
             . " DATE_FORMAT(ep.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDateF, "
             . " e.name AS employeeName, payment_types.name AS paymentType, payment_terms.name AS paymentTerm, "
             . " payment_methods.name AS paymentMethod "
             . " FROM `hrm_employee_payments` AS ep "
             . " LEFT JOIN hrm_employees AS e ON ep.`employee_id` = e.id AND e.`client_id` = " . CLIENT_ID
             . " LEFT JOIN payment_types ON ep.`payment_type_id` = payment_types.id AND payment_types.`client_id` = " . CLIENT_ID
             . " LEFT JOIN payment_terms ON ep.`payment_term_id` = payment_terms.id AND payment_terms.`client_id` = " . CLIENT_ID
             . " LEFT JOIN payment_methods ON ep.`payment_method_id` = payment_methods.id AND payment_methods.`client_id` = " . CLIENT_ID
             . " WHERE ep.`client_id` = " . CLIENT_ID;
        
        if (isset($searchData['employeeId']) && $searchData['employeeId'] > 0){
            $searchSql .= " ep.`employee_id` = " . $searchData['employeeId'] . "  OR ";
        }
        
        if (isset($searchData['amount']) && $searchData['amount'] != ""){
            $searchSql .= " ep.`amount`  LIKE '%" . $searchData['amount'] . "%' OR ";
        }
        
        if (isset($searchData['isItSalary']) && $searchData['isItSalary'] > 0){
            $searchSql .= " ep.`is_it_salary` = " . $searchData['isItSalary'] . "  OR ";
        }
        
        if (isset($searchData['salaryMonth']) && $searchData['salaryMonth'] > 0){
            $searchSql .= " ep.`salary_month` = '" . date('Y-m-d', strtotime($searchData['salaryMonth'])) . "'  OR ";
        }
        
        if (isset($searchData['paymentTypeId']) && $searchData['paymentTypeId'] > 0){
            $searchSql .= " ep.`payment_type_id` = " . $searchData['paymentTypeId'] . "  OR ";
        }
        
        if (isset($searchData['paymentMethodId']) && $searchData['paymentMethodId'] > 0){
            $searchSql .= " ep.`payment_method_id` = " . $searchData['paymentMethodId'] . "  OR ";
        }
        
        if (isset($searchData['paymentTermId']) && $searchData['paymentTermId'] > 0){
            $searchSql .= " ep.`payment_term_id` = " . $searchData['paymentTermId'] . "  OR ";
        }
        
        if (isset($searchData['totalHours']) && $searchData['totalHours'] > 0){
            $searchSql .= " ep.`total_hours` = " . $searchData['totalHours'] . "  OR ";
        }
        
        if (isset($searchData['salaryDateStart']) && $searchData['salaryDateStart'] != ""){
            $searchSql .= " ep.`salary_date_start` = '" . $searchData['salaryDateStart'] . "'  OR ";
        }
        
        if (isset($searchData['salaryDateEnd']) && $searchData['salaryDateEnd'] != ""){
            $searchSql .= " ep.`salary_date_end` = '" . $searchData['salaryDateEnd'] . "'  OR ";
        }
        
        if (isset($searchData['receiptNo']) && $searchData['receiptNo'] != ""){
            $searchSql .= " ep.`receipt_no`  LIKE '%" . $searchData['receiptNo'] . "%' OR ";
        }
        
        if (isset($searchData['paymentDate']) && $searchData['paymentDate'] != ""){
            $searchSql .= " ep.`payment_date` = '" . $searchData['paymentDate'] . "'  OR ";
        }
        
        if (isset($searchData['notes']) && $searchData['notes'] != ""){
            $searchSql .= " ep.notes  LIKE '%" . $searchData['notes'] . "%'";
        }
        
        if ($searchSql!== ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY ep.added_date DESC  ";
        
        if ($pagination === true){
            $sql .= " LIMIT " . $limit ." OFFSET " . $startIndex;
        }
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $hrmEmployeePayments; 
        }
        
        while($row = $result->fetch_object()){
            $hrmEmployeePayments[] = $row;
        }
        
        return $hrmEmployeePayments;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT ep.`id`, ep.`client_id` AS clientId, ep.`employee_id` AS employeeId, ep.`amount`, "
             . " ep.`is_it_salary` AS isItSalary, DATE_FORMAT(ep.`salary_month`, '%Y-%m') AS salaryMonth, "
             . " ep.`payment_type_id` AS paymentTypeId, ep.`payment_method_id` AS paymentMethodId, "
             . " ep.`payment_term_id` AS paymentTermId, ep.`total_hours` AS totalHours, "
             . " ep.`salary_date_start` AS salaryDateStart, ep.`salary_date_end`  AS salaryDateEnd, "
             . " ep.`receipt_no` AS receiptNo, ep.`payment_date` AS paymentDate, ep.`notes`, ep.`added_date` AS addedDate, "
             . " DATE_FORMAT(ep.salary_month, '%b - %Y') AS salaryMonthF, "
             . " DATE_FORMAT(ep.salary_date_start, '" . MYSQL_DATE_FORMAT . "') AS salaryDateStartF, "
             . " DATE_FORMAT(ep.salary_date_end, '" . MYSQL_DATE_FORMAT . "') AS salaryDateEndF, "
             . " DATE_FORMAT(ep.payment_date, '" . MYSQL_DATE_FORMAT . "') AS paymentDateF, "
             . " DATE_FORMAT(ep.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDateF, "
             . " e.name AS employeeName, payment_types.name AS paymentType, payment_terms.name AS paymentTerm, "
             . " payment_methods.name AS paymentMethod "
             . " FROM `hrm_employee_payments` AS ep "
             . " LEFT JOIN hrm_employees AS e ON ep.`id` = e.id AND e.`client_id` = " . CLIENT_ID
             . " LEFT JOIN payment_types ON ep.`payment_type_id` = payment_types.id AND payment_types.`client_id` = " . CLIENT_ID
             . " LEFT JOIN payment_terms ON ep.`payment_term_id` = payment_terms.id AND payment_terms.`client_id` = " . CLIENT_ID
             . " LEFT JOIN payment_methods ON ep.`payment_method_id` = payment_methods.id AND payment_methods.`client_id` = " . CLIENT_ID
             . " WHERE ep.id = " . $pId . " AND ep.client_id = " . CLIENT_ID;

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
        
        $sql = "DELETE FROM hrm_employee_payments WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function isReceiptNoExist($receiptNo, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM hrm_employee_payments WHERE receipt_no = '"  . $receiptNo . "' "
             . " AND hrm_employee_payments.client_id = " . CLIENT_ID;

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
}