<?php

class LabourWage
{
    private $id;
    private $clientId;
    private $projectId;
    private $supervisorId;
    private $labourTypeId;
    private $labourDate;
    private $name;
    private $totalHours;
    private $amount;
    private $receiptNo;
    private $paymentDate;
    private $notes;
    private $paidStatus;
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
    public function setInfo(array $labourWageData)
    {
        $this->set("id", (int)$labourWageData['id']);
        $this->set("projectId", (int)$labourWageData['projectId']);
        $this->set("supervisorId", (int)$labourWageData['supervisorId']);
        $this->set("labourTypeId", (int)$labourWageData['labourTypeId']);
        $this->set("labourDate", $labourWageData['labourDate']);
        $this->set("name", $labourWageData['name']);
        $this->set("totalHours", (int)$labourWageData['totalHours']);
        $this->set("amount", (float)$labourWageData['amount']);
        $this->set("receiptNo", $labourWageData['receiptNo']);
        $this->set("paymentDate", $labourWageData['paymentDate']);
        $this->set("notes", $labourWageData['notes']);
        $this->set("paidStatus", $labourWageData['paidStatus']);
        $this->set("addedDate", date('Y-m-d H:i:s', strtotime("now")));
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        if ($this->id > 0)
        {
            $sql = "UPDATE `labour_wages` SET `supervisor_id`=?,`labour_type_id`=?, `labour_date`=?, `name`=?,"
                 . " `total_hours`=?,`amount`=?, `notes`=? "
                 . " WHERE id = ? AND labour_wages.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return "false";
            }
            $bind = $stmt->bind_param("iississii",  $this->supervisorId, $this->labourTypeId, $this->labourDate, 
                                      $this->name, $this->totalHours, $this->amount, $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "labour_wages");
            $sql = "INSERT INTO `labour_wages`(`id`, `client_id`, `project_id`, "
                 . " `supervisor_id`, `labour_type_id`, `labour_date`, `name`, `total_hours`, `amount`, "
                 . " `receipt_no`, `payment_date`, `notes`, `paid_status`, `added_date`) "
                 . " VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiiiississssis", $maxId, $this->clientId, $this->projectId, $this->supervisorId, 
                                      $this->labourTypeId, $this->labourDate, $this->name, $this->totalHours, $this->amount, $this->receiptNo, 
                                      $this->paymentDate, $this->notes, $this->paidStatus, $this->addedDate);
            
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
    public static function isPaymentExist($p_name, $p_id=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT labour_wages.`id` FROM labour_wages  WHERE "
             . " name = '"  . $p_name . "' AND labour_wages.client_id = " . CLIENT_ID;
        
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
        $totalWages = 0;
        
        $sql = "SELECT labour_wages.`id`, labour_wages.`client_id` AS clientId, "
             . " labour_wages.`project_id` AS projectId, labour_wages.`supervisor_id` AS supervisorId, "
             . " labour_wages.`labour_type_id` AS labourTypeId, labour_wages.`labour_date` AS labourDate, labour_wages.`name`, "
             . " labour_wages.`total_hours` AS totalHours, labour_wages.`amount`, "
             . " labour_wages.`receipt_no` AS receiptNo, labour_wages.`payment_date` AS paymentDate, "
             . " labour_wages.`notes`, labour_wages.`paid_status` AS paidStatus, labour_wages.`added_date` AS addedDate,"
             . " hrm_employees.name AS supervisorName, labour_types.name AS labourTypeName,"
             . " DATE_FORMAT(labour_wages.`labour_date`, '" . MYSQL_DATE_FORMAT . "') AS labourDateF,"
             . " DATE_FORMAT(labour_wages.`payment_date`, '" . MYSQL_DATE_FORMAT . "') AS paymentDateF"
             . " FROM `labour_wages` "
             . " LEFT JOIN hrm_employees ON labour_wages.`supervisor_id` = hrm_employees.id AND hrm_employees.`client_id` = " . CLIENT_ID
             . " LEFT JOIN labour_types ON labour_wages.`labour_type_id` = labour_types.id AND labour_types.`client_id` = " . CLIENT_ID
             . " WHERE labour_wages.`client_id` = " . CLIENT_ID;
        
        if (isset($searchData['id']) && (int)$searchData['id'] > 0){
            $sql .= " AND labour_wages.`id` IN (" . $searchData['id'] . ")";
        }
        
        if (isset($searchData['projectId']) && (int)$searchData['projectId'] > 0){
            $sql .= " AND labour_wages.`project_id` = " . $searchData['projectId'];
        }
        
        if (isset($searchData['paidStatus']) && (int)$searchData['paidStatus'] > 0){
            $sql .= " AND labour_wages.`paid_status` = " . $searchData['paidStatus'];
        }
        
        if (isset($searchData['supervisorId']) && (int)$searchData['supervisorId'] > 0){
            $searchSql .= " labour_wages.`supervisor_id` = " . $searchData['supervisorId'] . "  OR ";
        }
        
        if (isset($searchData['labourTypeId']) && (int)$searchData['labourTypeId'] > 0){
            $searchSql .= " labour_wages.`labour_type_id` = " . $searchData['labourTypeId'] . "  OR ";
        }
        
        if (isset($searchData['labourDate']) && $searchData['labourDate'] != ""){
            $searchSql .= " labour_wages.`labour_date` = '" . $searchData['labourDate'] . "'  OR ";
        }
        
        if (isset($searchData['name']) && $searchData['name'] != ""){
            $searchSql .= " labour_wages.`name` LIKE '%" . $searchData['name'] . "%' OR ";
        }
        
        if (isset($searchData['totalHours']) && (int)$searchData['totalHours'] > 0){
            $searchSql .= " labour_wages.`total_hours` LIKE '%" . $searchData['totalHours'] . "%' OR ";
        }
        
        if (isset($searchData['amount']) && $searchData['amount'] != ""){
            $searchSql .= " labour_wages.`amount`  LIKE '%" . $searchData['amount'] . "%' OR ";
        }
        
        if (isset($searchData['receiptNo']) && $searchData['receiptNo'] != ""){
            $searchSql .= " labour_wages.`receipt_no`  LIKE '%" . $searchData['receiptNo'] . "%' OR ";
        }
        
        if (isset($searchData['paymentDate']) && $searchData['paymentDate'] != ""){
            $searchSql .= " labour_wages.`payment_date` = '" . $searchData['paymentDate'] . "'  OR ";
        }
        
        if (isset($searchData['notes']) && $searchData['notes'] != ""){
            $searchSql .= " labour_wages.notes  LIKE '%" . $searchData['notes'] . "%'";
        }
        
        if ($searchSql!== ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        if ((!isset($searchData['labourDate']) || $searchData['labourDate'] == "") 
                && isset($searchData['tableLabourDate']) && $searchData['tableLabourDate'] != "")
        {
            $sql .= " AND labour_wages.`labour_date` ";
            
            if (isset($searchData['tableToDate']) && $searchData['tableToDate'] != ""){
                $sql .= " BETWEEN '" . $searchData['tableLabourDate'] . "' AND '" . $searchData['tableToDate'] . "'" ;
            }
            else{
                $sql .= " = '" . $searchData['tableLabourDate'] . "'";
            }
        }
        
        $sql .= " ORDER BY labour_wages.labour_date DESC  ";
        
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
        
        while($row = $result->fetch_object())
        {
            
            $hrmEmployeePayments[$row->labourDateF][] = $row;
            $totalWages += (int)$row->amount;
        }
        
        $hrmEmployeePayments["totalWages"] = $totalWages;
        
        return $hrmEmployeePayments;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT labour_wages.`id`, labour_wages.`client_id` AS clientId, "
             . " labour_wages.`project_id` AS projectId, labour_wages.`supervisor_id` AS supervisorId, "
             . " labour_wages.`labour_type_id` AS labourTypeId, labour_wages.`labour_date` AS labourDate, labour_wages.`name`, "
             . " labour_wages.`total_hours` AS totalHours, labour_wages.`amount`, "
             . " labour_wages.`receipt_no` AS receiptNo, labour_wages.`payment_date` AS paymentDate, "
             . " labour_wages.`notes`, labour_wages.`paid_status` AS paidStatus, labour_wages.`added_date` AS addedDate,"
             . " hrm_employees.name AS supervisorName, labour_types.name AS labourTypeName,"
             . " DATE_FORMAT(labour_wages.`labour_date`, '" . MYSQL_DATE_FORMAT . "') AS labourDateF,"
             . " DATE_FORMAT(labour_wages.`payment_date`, '" . MYSQL_DATE_FORMAT . "') AS paymentDateF"
             . " FROM `labour_wages` "
             . " LEFT JOIN hrm_employees ON labour_wages.`supervisor_id` = hrm_employees.id AND hrm_employees.`client_id` = " . CLIENT_ID
             . " LEFT JOIN labour_types ON labour_wages.`labour_type_id` = labour_types.id AND labour_types.`client_id` = " . CLIENT_ID
             . " WHERE labour_wages.id = " . $pId . " AND labour_wages.client_id = " . CLIENT_ID;

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
        
        $sql = "DELETE FROM labour_wages WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT id FROM labour_wages WHERE receipt_no = '"  . $receiptNo . "' "
             . " AND labour_wages.client_id = " . CLIENT_ID;

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
    public function doPay()
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "UPDATE `labour_wages` SET `receipt_no`=?, `payment_date`=?, `paid_status`=?"
             . " WHERE id = ? AND project_id = ? AND labour_wages.client_id = ? ";

        $stmt = $oMysqli->prepare($sql);

        if (!$stmt){
            return false;
        }
        $bind = $stmt->bind_param("ssiiii", $this->receiptNo,$this->paymentDate, $this->paidStatus, 
                                  $this->id, $this->projectId, $this->clientId);

        if (!$bind){
            return false;
        }
        
        $excute = $stmt->execute();

        if (!$excute){
            return false;
        }

        if ($oMysqli->affected_rows > 0){
            return true;
        }
        
        $stmt->close();
        $oMysqli->close();
        
        return false;
    }
    //----------------------------------------------------------------------------------------------
}