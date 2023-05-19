<?php

class ReturnItem
{
    private $id;
    private $clientId;
    private $invoiceId;
    private $invoiceItemId;
    private $quantity;
    private $returnDate;
    private $notes;
    private $status;
    private $addedDate;
    private $db;

    public function __construct()
    {
        $this->set("clientId", CLIENT_ID);
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
    public function setInfo(array $invoicePayment)
    {
        $this->set("id", 0);
        $this->set("invoiceId", $invoicePayment['invoiceId']);
        $this->set("invoiceItemId", $invoicePayment['invoiceItemId']);
        $this->set("quantity", $invoicePayment['quantity']);
        $this->set("returnDate", $invoicePayment['returnDate']);
        $this->set("notes", $invoicePayment['notes']);
        $this->set("status", 1);
        $this->set("addedDate", date("Y-m-d H:i:s"));
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE `return_items` SET `invoice_item_id`=?,`quantity`=?,`return_date`=?,`notes`= ?"
                 . " WHERE id = ? AND return_items.client_id = ? ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iissii",  $this->invoiceItemId, $this->quantity, $this->returnDate,
                                       $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "return_items");
            $sql = "INSERT INTO `return_items`(`id`, `client_id`, `invoice_id`, `invoice_item_id`, "
                 . " `quantity`, `return_date`, `notes`, `status`, `added_date`) "
                 . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiiiissis", $maxId, $this->clientId, $this->invoiceId, 
                                       $this->invoiceItemId,  $this->quantity, $this->returnDate, 
                                       $this->notes, $this->status,  $this->addedDate);
            
            if (!$bind){
                return false;
            }
        }
        
        $excute = $stmt->execute();
        
        if (!$excute){
            return false;
        }

        if ($oMysqli->affected_rows > 0){
            $this->set("id", $maxId);
            return $this->get("id");
        }
        else{
            return false;
        }
        
        $stmt->close();
        $oMysqli->close();
    }
    
    //----------------------------------------------------------------------------------------------
    public static function delete($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM return_items WHERE id IN (" . $ids . ") "
             . "AND return_items.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        SalesInvoiceItem::deleteByInvoice($ids);
        return true;
    }
    //----------------------------------------------------------------------------------------------
    public static function deleteByInvoice($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM return_items WHERE invoice_id IN (" . $ids . ") "
             . " AND return_items.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getAllByInvoice($invoiceId, $status=1)
    {
        $invoicePayments = array();
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT sales_invoice_items.`id`, sales_invoice_items.`client_id` AS clientId, "
             . " sales_invoice_items.`invoice_id` AS invoiceId, sales_invoice_items.`invoice_item_id` AS invoiceItemId, "
             . " sales_invoice_items.`quantity`, sales_invoice_items.`return_date` AS returnDate, "
             . " sales_invoice_items.`notes`, sales_invoice_items.`status`, sales_invoice_items.`added_date` AS addedDate, "
             . " products.name AS productName "
             . " FROM `return_items` "
             . " LEFT JOIN sales_invoice_items ON sales_invoice_items.invoice_item_id = sales_invoice_items.id AND sales_invoice_items.client_id = " . CLIENT_ID
             . " LEFT JOIN products ON sales_invoice_items.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " WHERE invoice_id = " . $invoiceId . " AND return_items.client_id = " . CLIENT_ID;
        
        if ($status > 0){
            $sql .= " AND return_items.status = " . $status;
        }
        
        $sql .= " ORDER BY return_items.added_date DESC ";
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
            return $invoicePayments;
        }

        while($row = $result->fetch_object()){
            $invoicePayments[] = $row;
        }
        
        return $invoicePayments;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getDetails($pId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT sales_invoice_items.`id`, sales_invoice_items.`client_id` AS clientId, "
             . " sales_invoice_items.`invoice_id` AS invoiceId, sales_invoice_items.`invoice_item_id` AS invoiceItemId, "
             . " sales_invoice_items.`quantity`, sales_invoice_items.`return_date` AS returnDate, "
             . " sales_invoice_items.`notes`, sales_invoice_items.`status`, sales_invoice_items.`added_date` AS addedDate, "
             . " products.name AS productName "
             . " FROM `return_items` "
             . " LEFT JOIN sales_invoice_items ON sales_invoice_items.invoice_item_id = sales_invoice_items.id AND sales_invoice_items.client_id = " . CLIENT_ID
             . " LEFT JOIN products ON sales_invoice_items.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " WHERE return_items.id = " . $pId . "return_items.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }
        
        $row = $result->fetch_assoc();
        
        if ((int)$row['paidStatus'] !== 1){
            $row['dueDate'] = self::getDueDate($row['invoiceDate'], $row['paymentTermDuration'], $row['paymentTermId']);
        }
        else {
            $row['dueDate'] = "";
        }
        
        return $row;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function deleteReturn($pId)
    {
        $clientId = CLIENT_ID;
        $status = 3;
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "UPDATE `return_items` SET `status` = ?"
             . " WHERE return_items.id = ? AND return_items.client_id = ? ";
            
        $stmt = $oMysqli->prepare($sql);

        if (!$stmt){
            return false;
        }

        $bind = $stmt->bind_param("iii", $status, $pId, $clientId);

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
        else{
            return false;
        }
        
        $stmt->close();
        $oMysqli->close();
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getTotalReturnByInvoice($pInvoiceId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $totalReturnQuantity = 0;
        
        $sql = "SELECT 	quantity "
             . " FROM `return_items` WHERE `invoice_id` = " . $pInvoiceId . " AND "
             . " return_items.status = 1 AND client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        if ($result->num_rows > 0){
            while($row = $result->fetch_object())
            {
                $totalReturnQuantity += $row->quantity;
            }
        }
        
        return $totalReturnQuantity;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getTotalReturnAmountByInvoice($pInvoiceId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $totalReturnAmount = $unitPrice = 0;
        $sql = "SELECT sales_invoice_items.margin, sales_invoice_items.unit_price AS unitPrice, "
             . " return_items.quantity AS returnQuantity  "
             . " FROM `return_items` "
             . " LEFT JOIN sales_invoice_items ON return_items.invoice_item_id = sales_invoice_items.id  AND sales_invoice_items.client_id = " . CLIENT_ID
             . " WHERE return_items.`invoice_id` = " . $pInvoiceId . " AND "
             . " return_items.status = 1 AND return_items.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
            return $totalReturnAmount;
        }
        
        while($row = $result->fetch_object())
        {
            $unitPrice = (float)$row->margin + (float)$row->unitPrice;
            $returnQuantity = (int)$row->returnQuantity;
            $totalReturnAmount += ($unitPrice * $returnQuantity);
        }
        return $totalReturnAmount;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getTotalReturnByInvoiceItem($pItemId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $totalReturnQuantity = 0;
        
        $sql = "SELECT 	quantity "
             . " FROM `return_items` WHERE `invoice_item_id` = " . $pItemId . " AND "
             . " return_items.status = 1 AND client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
            return 0;
        }
        
        while($row = $result->fetch_object())
        {
            $totalReturnQuantity += $row->quantity;
        }
        
        return $totalReturnQuantity;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $salesInvoices = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT return_items.`id`, return_items.`client_id` AS  clientId, return_items.quantity, "
             . " return_items.`notes`, return_items.status, return_items.`added_date` AS addedDate, "
             . " DATE_FORMAT(return_items.return_date, '" . MYSQL_DATE_FORMAT . "') AS returnDate,"
             . " sales_invoices.invoice_number AS invoiceNumber, products.name AS productName, measuring_units.short_code AS measuringUnit"
             . " FROM return_items "
             . " LEFT JOIN sales_invoices ON sales_invoices.id = return_items.invoice_id  AND sales_invoices.client_id = " . CLIENT_ID
             . " LEFT JOIN sales_invoice_items ON return_items.invoice_item_id = sales_invoice_items.id AND sales_invoice_items.client_id = " . CLIENT_ID
             . " LEFT JOIN products ON sales_invoice_items.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " LEFT JOIN measuring_units ON sales_invoice_items.measuring_unit_id = measuring_units.id AND measuring_units.client_id = " . CLIENT_ID
             . " WHERE return_items.status = 1  AND return_items.client_id = " . CLIENT_ID;
        
        if (isset($searchData['invoiceId']) && trim($searchData['invoiceId']) > 0){
            $searchSql .= " return_items.invoice_id = '" . trim($searchData['invoiceId']) . "' OR ";
        }
        
        if (isset($searchData['invoiceItemId']) && trim($searchData['invoiceItemId']) > 0){
            $searchSql .= " return_items.invoice_item_id = '" . trim($searchData['invoiceItemId']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != "")
        {
            $searchSql .= " return_items.notes LIKE '%" . trim($searchData['notes']) . "%' OR ";
        }
        
        if ($searchSql != ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY return_items.added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $salesInvoices[] = $row;
        }
        
        return $salesInvoices;
    }
}