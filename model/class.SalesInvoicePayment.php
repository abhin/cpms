<?php

class SalesInvoicePayment
{
    private $id;
    private $clientId;
    private $invoiceId;
    private $paymentMethodId;
    private $receivedAmount;
    private $notes;
    private $status;
    private $receivedDate;
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
        $this->set("paymentMethodId", $invoicePayment['paymentMethodId']);
        $this->set("receivedAmount", $invoicePayment['receivedAmount']);
        $this->set("notes", $invoicePayment['notes']);
        $this->set("status", 1);
        $this->set("receivedDate", $invoicePayment['receivedDate']);
        $this->set("addedDate", date("Y-m-d H:i:s"));
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE `sales_invoice_payments` SET `invoice_id`= ?, "
                 . " `payment_method_id`= ?,`received_amount`= ?,`notes`=?"
                 . " WHERE id = ? AND sales_invoice_payments.client_id = ? ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iiiddissiisiisii",  $this->invoiceId, $this->paymentMethodId, $this->receivedAmount,
                                       $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "sales_invoice_payments");
            $sql = "INSERT INTO `sales_invoice_payments`(`id`, `client_id`, `invoice_id`, "
                 . " `payment_method_id`, `received_amount`, `received_date`, `notes`, `status`, `added_date`) "
                 . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiiidssis", $maxId, $this->clientId, $this->invoiceId, 
                                       $this->paymentMethodId, $this->receivedAmount, $this->receivedDate, 
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
        
        $sql = "DELETE FROM sales_invoice_payments WHERE id IN (" . $ids . ") "
             . "AND sales_invoice_payments.client_id = " . CLIENT_ID;

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
        
        $sql = "DELETE FROM sales_invoice_payments WHERE invoice_id IN (" . $ids . ") "
             . " AND sales_invoice_payments.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getAll($invoiceId, $status=1)
    {
        $invoicePayments = array();
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT sales_invoice_payments.`id`, sales_invoice_payments.`client_id` AS clientId, "
             . " sales_invoice_payments.`invoice_id` AS invoiceId, sales_invoice_payments.`payment_method_id` AS paymentMethodId, "
             . " `received_amount` AS receivedAmount, sales_invoice_payments.`notes`, sales_invoice_payments.`status`, "
             . " sales_invoice_payments.received_date AS receivedDate, "
             . " sales_invoice_payments.`added_date` AS addedDate, sales_invoices.invoice_number AS invoiceNumber, "
             . " payment_methods.name AS paymentMethodName "
             . " FROM `sales_invoice_payments` "
             . " LEFT JOIN payment_methods ON sales_invoice_payments.payment_method_id = payment_methods.id AND payment_methods.client_id = " . CLIENT_ID
             . " LEFT JOIN sales_invoices ON sales_invoice_payments.invoice_id = sales_invoices.id AND sales_invoices.client_id = " . CLIENT_ID
             . " WHERE invoice_id = " . $invoiceId . " AND sales_invoice_payments.client_id = " . CLIENT_ID;
        
        if ($status > 0){
            $sql .= " AND sales_invoice_payments.status = " . $status;
        }
        
        $sql .= " ORDER BY sales_invoice_payments.added_date DESC ";
        
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
        
        $sql = "SELECT `id`, `client_id` AS clientId, `invoice_id` AS invoiceId, "
             . " `payment_method_id` AS paymentMethodId, `received_amount`, `notes`, `status`, "
            . " sales_invoice_payments.received_date AS receivedDate, "
             . " `added_date` AS addedDate FROM `sales_invoice_payments` "
             . " WHERE id = " . $pId . "sales_invoice_payments.client_id = " . CLIENT_ID;

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
    public static function deletePayment($pId, $status=3)
    {
        $clientId = CLIENT_ID;
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "UPDATE `sales_invoice_payments` SET `status` = ?"
             . " WHERE id = ? AND sales_invoice_payments.client_id = ? ";
            
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
    public static function getTotalReceivedAmount($pInvoiceId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT SUM(`received_amount`) AS totalReceivedAmount"
             . " FROM `sales_invoice_payments` WHERE `invoice_id` = " . $pInvoiceId . " AND "
             . " sales_invoice_payments.status = 1 AND client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
            return 0;
        }
        
        $row = $result->fetch_object();
        return (float)$row->totalReceivedAmount;
    }
}