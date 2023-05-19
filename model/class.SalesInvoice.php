<?php

class SalesInvoice
{
    private $id;
    private $clientId;
    private $buyerId;
    private $purchaseOrderNo;
    private $invoiceNumber;
    private $invoiceDate;
    private $paidStatus;
    private $paymentTermDuration;
    private $paymentTermId;
    private $grandTotalAmount;
    private $notes;
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
    public function setInfo(array $salesInvoice)
    {
        $this->set("id", 0);
        $this->set("buyerId", $salesInvoice['buyerId']);
        $this->set("purchaseOrderNo", $salesInvoice['purchaseOrderNo']);
        $this->set("invoiceNumber", $salesInvoice['invoiceNumber']);
        $this->set("invoiceDate", $salesInvoice['invoiceDate']);
        $this->set("paidStatus", $salesInvoice['paidStatus']);
        $this->set("paymentTermDuration", $salesInvoice['paymentTermDuration']);
        $this->set("paymentTermId", $salesInvoice['paymentTermId']);
        $this->set("grandTotalAmount", $salesInvoice['grandTotalAmount']);
        $this->set("notes", $salesInvoice['notes']);
        $this->set("addedDate", date("Y-m-d H:i:s"));
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            /*$sql = "UPDATE sales_invoices SET `supplier_id` = ?,`product_id` = ?,`quantity` = ?,`unit_price` = ?, "
                 . " `amount`= ?,`tax_id`= ?,`invoice_number`= ?,`purchase_order_no`= ?,`payment_term_duration`= ?,  "
                 . " `payment_term_id`= ?,`purchase_date`= ?,`paid_status`= ?, `notes`= ? "
                 . " WHERE id = ? AND sales_invoices.client_id = ? ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iiiddissiisiisii",  $this->supplierId, $this->productId, $this->quantity,
                                       $this->unitPrice, $this->amount, $this->taxId, $this->invoiceNumber, 
                                       $this->purchaseOrderNo, $this->paymentTermDuration, $this->paymentTermId,
                                       $this->purchaseDate, $this->paidStatus, $this->notes, 
                                       $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }*/
        }
        else{
            $maxId = $this->db->getMaxId("id", "sales_invoices");
            $sql = "INSERT INTO sales_invoices (`id`, `client_id`, `buyer_id`, "
                 . " `purchase_order_no`, `invoice_number`, `invoice_date`, `paid_status`, "
                 . " `payment_term_duration`, `payment_term_id`, "
                 . " `grand_total_amount`, `notes`, `added_date`) "
                 . " VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

           $bind = $stmt->bind_param("iiisssiiidss", $maxId, $this->clientId, $this->buyerId, $this->purchaseOrderNo, 
                                      $this->invoiceNumber, $this->invoiceDate, $this->paidStatus,
                                      $this->paymentTermDuration, $this->paymentTermId,
                                      $this->grandTotalAmount, $this->notes, $this->addedDate);
            
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
    public static function isInvoiceNumberExist($pInvoiceNumber)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM sales_invoices WHERE invoice_number = '"  . $pInvoiceNumber . "' "
             . " AND sales_invoices.client_id = " . CLIENT_ID;

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
    public static function getInvoiceNumber()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM sales_invoices WHERE sales_invoices.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result){
           return false; 
        }
        
        if (!$result->num_rows){
           return 1; 
        }

        return $result->num_rows + 1;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function delete($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM sales_invoices WHERE id IN (" . $ids . ") "
             . "AND sales_invoices.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        SalesInvoiceItem::deleteByInvoice($ids);
        SalesInvoicePayment::deleteByInvoice($ids);
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $salesInvoices = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT sales_invoices.`id`, sales_invoices.`client_id` AS  clientId, "
             . " sales_invoices.`buyer_id` AS buyerId, sales_invoices.`purchase_order_no` AS purchaseOrderNo, "
             . " sales_invoices.`invoice_number` AS invoiceNumber, sales_invoices.`invoice_date` AS invoiceDate, "
             . " sales_invoices.`paid_status` AS paidStatus,"
             . " sales_invoices.`payment_term_duration` AS paymentTermDuration, sales_invoices.`payment_term_id` AS paymentTermId, "
             . " sales_invoices.`grand_total_amount` AS grandTotalAmount, "
             . " sales_invoices.`notes`, sales_invoices.`added_date` AS addedDate, "
             . " DATE_FORMAT(sales_invoices.invoice_date, '" . MYSQL_DATE_FORMAT . "') AS invoiceDateFormated, "
             . " buyers.name AS buyerName "
             . " FROM sales_invoices "
             . " LEFT JOIN buyers ON sales_invoices.buyer_id = buyers.id  AND buyers.client_id = " . CLIENT_ID
             . " LEFT JOIN payment_terms ON sales_invoices.payment_term_id = payment_terms.id AND payment_terms.client_id = " . CLIENT_ID
             . " WHERE sales_invoices.client_id = " . CLIENT_ID;
        
        if (isset($searchData['buyerId']) && trim($searchData['buyerId']) > 0){
            $searchSql .= " sales_invoices.buyer_id = '" . trim($searchData['buyerId']) . "' OR ";
        }
        
        if (isset($searchData['purchaseOrderNo']) && trim($searchData['purchaseOrderNo']) != ""){
            $searchSql .= " sales_invoices.purchase_order_no LIKE '%" . trim($searchData['purchaseOrderNo']) . "%' OR ";
        }
        
        if (isset($searchData['invoiceNumber']) && trim($searchData['invoiceNumber']) != ""){
            $searchSql .= " sales_invoices.invoice_number LIKE '%" . trim($searchData['invoiceNumber']) . "%' OR ";
        }
        
        if (isset($searchData['invoiceDate']) && trim($searchData['invoiceDate']) != ""){
            $searchSql .= " sales_invoices.invoice_date = '" . trim($searchData['invoiceDate']) . "' OR ";
        }
        
        if (isset($searchData['paidStatus']) && trim($searchData['paidStatus']) > 0){
            $searchSql .= " sales_invoices.paid_status = '" . trim($searchData['paidStatus']) . "' OR ";
        }
        
        if (isset($searchData['paymentTermDuration']) && trim($searchData['paymentTermDuration']) > 0){
            $searchSql .= " sales_invoices.payment_term_duration LIKE '%" . trim($searchData['paymentTermDuration']) . "%' OR ";
        }
        
        if (isset($searchData['paymentTermId']) && trim($searchData['paymentTermId']) > 0){
            $searchSql .= " sales_invoices.payment_term_id = '" . trim($searchData['paymentTermId']) . "' OR ";
        }
        
        if (isset($searchData['grandTotalAmount']) && trim($searchData['grandTotalAmount']) > 0)
        {
            $searchSql .= " sales_invoices.grand_total_amount LIKE '%" . trim($searchData['grandTotalAmount']) . "%' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != "")
        {
            $searchSql .= " sales_invoices.notes LIKE '%" . trim($searchData['notes']) . "%' OR ";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY sales_invoices.added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            
            if ((int)$row->paidStatus !== 1){
                $row->dueDate = self::getDueDate($row->invoiceDate, $row->paymentTermDuration, $row->paymentTermId);
            }
            else {
                $row->dueDate = "";
            }
            
            $row->totalReturnQuantity = ReturnItem::getTotalReturnByInvoice($row->id);
            $row->totalReturnAmount   = ReturnItem::getTotalReturnAmountByInvoice($row->id);
            $row->totalReceivedAmount = SalesInvoicePayment::getTotalReceivedAmount($row->id);
            
            $salesInvoices[] = $row;
            
        }
        
        return $salesInvoices;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getDetails($pId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT sales_invoices.`id`, sales_invoices.`client_id` AS  clientId, "
             . " sales_invoices.`buyer_id` AS buyerId, sales_invoices.`purchase_order_no` AS purchaseOrderNo, "
             . " sales_invoices.`invoice_number` AS invoiceNumber, sales_invoices.`invoice_date` AS invoiceDate, "
             . " sales_invoices.`paid_status` AS paidStatus, "
             . " sales_invoices.`payment_term_duration` AS paymentTermDuration, sales_invoices.`payment_term_id` AS paymentTermId, "
             . " sales_invoices.`grand_total_amount` AS grandTotalAmount, "
             . " sales_invoices.`notes`, sales_invoices.`added_date` AS invoiceAddedDate, "
             . " DATE_FORMAT(sales_invoices.invoice_date, '" . MYSQL_DATE_FORMAT . "') AS invoiceDateFormated, "
             . " buyers.name AS buyerName, payment_terms.name AS paymentTermName "
             . " FROM sales_invoices "
             . " LEFT JOIN buyers ON sales_invoices.buyer_id = buyers.id  AND buyers.client_id = " . CLIENT_ID
             . " LEFT JOIN payment_terms ON sales_invoices.payment_term_id = payment_terms.id AND payment_terms.client_id = " . CLIENT_ID
             . " WHERE sales_invoices.id = "  . $pId . " AND sales_invoices.client_id = " . CLIENT_ID;

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
        
        $row['totalReturnQuantity'] = ReturnItem::getTotalReturnByInvoice($row['id']);
        $row['totalReturnAmount'] = ReturnItem::getTotalReturnAmountByInvoice($row['id']);
        $row['totalReceivedAmount'] = SalesInvoicePayment::getTotalReceivedAmount($row['id']);
        
        return $row;
    }
    
    //----------------------------------------------------------------------------------------------
    
    public static function getDueDate($purchaseDate, $dueInterval=0, $tremId=1)
    {
        $timeString = "";
        
        if ((int)$tremId === 1){
            $timeString = " +" . $dueInterval . " day";
        }
        else if ((int)$tremId === 2){
            $timeString = " +" .$dueInterval . " week";
        }
        else if ((int)$tremId === 3){
            $timeString = " +" .$dueInterval . " month";
        }
        else if ((int)$tremId === 4){
            $timeString = " +" .$dueInterval . " year";
        }
        
        return date("Y-m-d", strtotime($purchaseDate . $timeString));
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getGrandTotal($pId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT `grand_total_amount` AS grandTotalAmount "
             . " FROM `sales_invoices` WHERE `id` = " . $pId . " AND client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
            return 0;
        }
        
        $row = $result->fetch_object();
        return (float)$row->grandTotalAmount;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function changePaidStatus($paidStatus, $invoiceId)
    {
        $clientId = CLIENT_ID;
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "UPDATE `sales_invoices` SET `paid_status` = ?"
             . " WHERE id = ? AND sales_invoices.client_id = ? ";
            
        $stmt = $oMysqli->prepare($sql);

        if (!$stmt){
            return false;
        }

        $bind = $stmt->bind_param("iii", $paidStatus, $invoiceId, $clientId);

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
    public function getAllInvoices()
    {
        $salesInvoicesData = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT sales_invoices.`id`,  sales_invoices.`invoice_number` AS invoiceNumber "
             . " FROM sales_invoices "
             . " WHERE sales_invoices.client_id = " . CLIENT_ID;
        
        
        $sql .= " ORDER BY sales_invoices.invoice_number ASC ";
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $salesInvoicesData[] = $row;
        }
        
        return $salesInvoicesData;
    }
}