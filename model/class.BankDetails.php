<?php

class BankDetails
{
    private $id;
    private $clientId;
    private $isSupplierOrBuyer;
    private $supplierOrBuyerId;
    private $bankName;
    private $accountNumber;
    private $branchName;
    private $branchCode;
    private $ifscCode;
    private $branchAddress;
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
        $this->set("isSupplierOrBuyer", $buyerData['isSupplierOrBuyer']);
        $this->set("supplierOrBuyerId", $buyerData['supplierOrBuyerId']);
        $this->set("bankName", $buyerData['bankName']);
        $this->set("accountNumber", $buyerData['accountNumber']);
        $this->set("branchName", $buyerData['branchName']);
        $this->set("branchCode", $buyerData['branchCode']);
        $this->set("ifscCode", $buyerData['ifscCode']);
        $this->set("branchAddress", $buyerData['branchAddress']);
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
            $sql = "UPDATE bank_details SET `is_supplier_or_buyer` = ?, `supplier_or_buyer_id`= ?, "
                 . " `bank_name` = ?, `account_number`= ?, "
                 . " `branch_name` = ?,`branch_code` = ?, `ifsc_code`= ?,"
                 . " `branch_address`= ?,`notes`= ? "
                 . " WHERE id = ?  AND bank_details.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iisssssssii", $this->isSupplierOrBuyer, $this->supplierOrBuyerId, 
                                      $this->bankName, $this->accountNumber, 
                                      $this->branchName, $this->branchCode, $this->ifscCode, 
                                      $this->branchAddress, $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "bank_details");
            $sql = "INSERT INTO bank_details (`id`, `client_id`, `is_supplier_or_buyer`, `supplier_or_buyer_id`, "
                 . " `bank_name`, `account_number`, "
                 . " `branch_name`, `branch_code`, `ifsc_code`, `branch_address`, `notes`) "
                 . " VALUES(?,?,?,?,?,?,?,?,?,?,?) ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiiisssssss", $maxId, $this->clientId, $this->isSupplierOrBuyer, 
                                        $this->supplierOrBuyerId, $this->bankName, $this->accountNumber, 
                                        $this->branchName, $this->branchCode, $this->ifscCode, 
                                        $this->branchAddress, $this->notes);
            
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
    public static function isAccNumberExist($p_accountNumber, $p_id=0)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT bank_details.`id` FROM bank_details  WHERE "
             . " account_number = '"  . $p_accountNumber . "' AND bank_details.client_id = " . CLIENT_ID;
        
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
    public static function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $bank_details = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT bank_details.`id`, bank_details.`client_id` AS clientId, bank_details.`is_supplier_or_buyer` AS isSupplierOrBuyer , "
             . " bank_details.`supplier_or_buyer_id` AS supplierOrBuyerId, bank_details.bank_name AS bankName, "
             . " bank_details.`account_number` AS accountNumber, bank_details.`branch_name` AS branchName, "
             . " bank_details.`branch_code` AS branchCode, bank_details.`ifsc_code` AS ifscCode, bank_details.`branch_address` AS branchAddress, "
             . " bank_details.`notes`, bank_details.`added_date` AS addedDate, ";
        
        if ($searchData['isSupplierOrBuyer'] === 1){
            $sql .= " suppliers.name AS name ";
        }
        else if ($searchData['isSupplierOrBuyer'] === 2){
            $sql .= " buyers.name AS name ";
        }
        
        $sql .= " FROM bank_details ";
        
        if ((int)$searchData['isSupplierOrBuyer'] === 1){
            $sql .= " LEFT JOIN suppliers ON bank_details.supplier_or_buyer_id = suppliers.id AND suppliers.client_id = " . CLIENT_ID;
        }
        else if ((int)$searchData['isSupplierOrBuyer'] === 2){
            $sql .= " LEFT JOIN buyers ON bank_details.supplier_or_buyer_id = buyers.id AND buyers.client_id = " . CLIENT_ID;
        }
                
        $sql .= " WHERE bank_details.`client_id` = " . CLIENT_ID . " AND bank_details.is_supplier_or_buyer = " . $searchData['isSupplierOrBuyer'];
        
        if (isset($searchData['isSupplierOrBuyer']) && $searchData['isSupplierOrBuyer'] > 0){
            $sql .= " AND bank_details.`is_supplier_or_buyer` = " . $searchData['isSupplierOrBuyer'];
        }
        
        if (isset($searchData['bankName']) && $searchData['bankName'] != ""){
            $searchSql .= " bank_details.bank_name  LIKE '%" . $searchData['bankName'] . "%' OR ";
        }
        
        if (isset($searchData['accountNumber']) && $searchData['accountNumber'] != ""){
            $searchSql .= " bank_details.account_number  LIKE '%" . $searchData['accountNumber'] . "%' OR ";
        }
        
        if (isset($searchData['branchName']) && $searchData['branchName']  != "" ){
            $searchSql .= " bank_details.branch_name  LIKE '%" . $searchData['branchName'] . "%' OR ";
        }
        
        if (isset($searchData['branchCode']) && $searchData['branchCode'] != ""){
            $searchSql .= " bank_details.branch_code  LIKE '%" . $searchData['branchCode'] . "%'";
        }
        
        if (isset($searchData['ifscCode']) && $searchData['ifscCode'] != ""){
            $searchSql .= " bank_details.ifsc_code  LIKE '%" . $searchData['ifscCode'] . "%'";
        }
        
        if (isset($searchData['branchAddress']) && $searchData['branchAddress'] != ""){
            $searchSql .= " bank_details.branch_address  LIKE '%" . $searchData['branchAddress'] . "%'";
        }
        
        if (isset($searchData['notes']) && $searchData['notes'] != ""){
            $searchSql .= " bank_details.notes  LIKE '%" . $searchData['notes'] . "%'  ";
        }
        
        if ($searchSql!== ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY bank_details.added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $bank_details; 
        }
        
        while($row = $result->fetch_object()){
            $bank_details[] = $row;
        }
        
        return $bank_details;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, `client_id` AS clientId, `is_supplier_or_buyer` AS isSupplierOrBuyer , "
             . " `supplier_or_buyer_id` AS supplierOrBuyerId, bank_name AS bankName, "
             . " `account_number` AS accountNumber, `branch_name` AS branchName, "
             . " `branch_code` AS branchCode, `ifsc_code` AS ifscCode, `branch_address` AS branchAddress, "
             . " `notes`, `added_date` AS addedDate "
             . " FROM `bank_details` WHERE id = " . $pId . " AND client_id = " . CLIENT_ID;

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
        
        $sql = "DELETE FROM bank_details WHERE id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT id FROM bank_details WHERE client_id = " . CLIENT_ID;
        
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
    public static function getNames()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT bank_details.id, bank_details.account_number FROM bank_details "
             . " WHERE bank_details.client_id = " . CLIENT_ID . " ORDER BY account_number ASC";
        
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