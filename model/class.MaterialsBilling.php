<?php

class Purchase
{
    private $id;
    private $clientId;
    private $supplierId;
    private $productId;
    private $quantity;
    private $unitPrice;
    private $amount;
    private $taxId;
    private $invoiceNumber;
    private $purchaseOrderNo;
    private $paymentTermDuration;
    private $paymentTermId;
    private $purchaseDate;
    private $paidStatus;
    private $paymentMethodId;
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
    public function setInfo(array $projectData)
    {
        $this->set("id", $projectData['id']);
        $this->set("supplierId", $projectData['supplierId']);
        $this->set("productId", $projectData['productId']);
        $this->set("quantity", $projectData['quantity']);
        $this->set("unitPrice", $projectData['unitPrice']);
        $this->set("amount", $projectData['amount']);
        $this->set("taxId", $projectData['taxId']);
        $this->set("invoiceNumber", $projectData['invoiceNumber']);
        $this->set("purchaseOrderNo", $projectData['purchaseOrderNo']);
        $this->set("paymentTermDuration", $projectData['paymentTermDuration']);
        $this->set("paymentTermId", $projectData['paymentTermId']);
        $this->set("purchaseDate", $projectData['purchaseDate']);
        $this->set("paidStatus", $projectData['paidStatus']);
        $this->set("paymentMethodId", $projectData['paymentMethodId']);
        $this->set("notes", $projectData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE purchases SET `supplier_id` = ?,`product_id` = ?,`quantity` = ?,`unit_price` = ?, "
                 . " `amount`= ?,`tax_id`= ?,`invoice_number`= ?,`purchase_order_no`= ?,`payment_term_duration`= ?,  "
                 . " `payment_term_id`= ?,`purchase_date`= ?,`paid_status`= ?,`payment_method_id`= ?,`notes`= ? "
                 . " WHERE id = ? AND purchases.client_id = ? ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iiiddissiisiisii",  $this->supplierId, $this->productId, $this->quantity,
                                       $this->unitPrice, $this->amount, $this->taxId, $this->invoiceNumber, 
                                       $this->purchaseOrderNo, $this->paymentTermDuration, $this->paymentTermId,
                                       $this->purchaseDate, $this->paidStatus, $this->paymentMethodId, $this->notes, 
                                       $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "purchases");
            $sql = "INSERT INTO purchases (`id`, `client_id`, `supplier_id`, `product_id`, `quantity`, "
                 . " `unit_price`, `amount`, `tax_id`, `invoice_number`, `purchase_order_no`, "
                 . " `payment_term_duration`, `payment_term_id`, `purchase_date`, `paid_status`, "
                 . " `payment_method_id`, `notes`) "
                 . " VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiiiiddissiisiis", $maxId, $this->clientId, $this->supplierId, $this->productId, 
                                      $this->quantity, $this->unitPrice, $this->amount, $this->taxId, $this->invoiceNumber,
                                      $this->purchaseOrderNo, $this->paymentTermDuration, $this->paymentTermId, $this->purchaseDate,  
                                      $this->paidStatus, $this->paymentMethodId, $this->notes);
            
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
    public function getAll(array $searchData=array(), $setTotalAmount=true, $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $purchases = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT purchases.`id`, purchases.`client_id` AS clientId, purchases.`supplier_id` AS supplierId, "
             . " purchases.`product_id` AS productId, purchases.`quantity`, purchases.`unit_price` AS unitPrice, "
             . " purchases.`amount`, purchases.`tax_id` AS taxId, purchases.`invoice_number` AS invoiceNumber, "
             . " purchases.`purchase_order_no` AS purchaseOrderNo, purchases.`payment_term_duration` AS paymentTermDuration, "
             . " purchases.`payment_term_id` AS paymentTermId, purchases.`purchase_date` AS purchaseDate, "
             . " purchases.`paid_status` AS paidStatus, purchases.`payment_method_id` AS paymentMethodId, "
             . " purchases.`notes`, purchases.`added_date` AS addedDate, "
             . " DATE_FORMAT(purchases.purchase_date, '" . MYSQL_DATE_FORMAT . "') AS purchaseDateFormated, "
             . " products.name AS productName, suppliers.name AS supplierName, taxes.name AS taxName, taxes.precentage AS taxPrecentage, "
             . " payment_terms.name AS paymentTermName, payment_methods.name AS paymentMethodName "
             . " FROM purchases "
             . " LEFT JOIN products ON purchases.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " LEFT JOIN suppliers ON purchases.supplier_id = suppliers.id  AND suppliers.client_id = " . CLIENT_ID
             . " LEFT JOIN taxes ON purchases.tax_id = taxes.id  AND taxes.client_id = " . CLIENT_ID
             . " LEFT JOIN payment_terms ON purchases.payment_term_id = payment_terms.id "
             . " LEFT JOIN payment_methods ON purchases.payment_method_id = payment_methods.id "
             . " WHERE purchases.client_id = " . CLIENT_ID;
        
        if (isset($searchData['supplierId']) && trim($searchData['supplierId']) > 0){
            $searchSql .= " purchases.supplier_id = '" . trim($searchData['supplierId']) . "' OR ";
        }
        
        if (isset($searchData['productId']) && trim($searchData['productId']) > 0){
            $searchSql .= " purchases.product_id = '" . trim($searchData['stageId']) . "' OR ";
        }
        
        if (isset($searchData['taxId']) && trim($searchData['taxId']) > 0){
            $searchSql .= " purchases.tax_id = '" . trim($searchData['taxId']) . "' OR ";
        }
        
        
        if (isset($searchData['quantity']) && trim($searchData['quantity']) > 0){
            $searchSql .= " purchases.quantity LIKE '%" . trim($searchData['quantity']) . "%' OR ";
        }
        
        if (isset($searchData['unitPrice']) && trim($searchData['unitPrice']) > 0)
        {
            $searchSql .= " purchases.unit_price LIKE '%" . trim($searchData['unitPrice']) . "%' OR ";
        }
        
        if (isset($searchData['amount']) && trim($searchData['amount']) > 0)
        {
            $searchSql .= " purchases.amount LIKE '%" . trim($searchData['amount']) . "%' OR ";
        }
        
        if (isset($searchData['invoiceNumber']) && trim($searchData['invoiceNumber']) > 0)
        {
            $searchSql .= " purchases.`invoice_number` LIKE '%" . trim($searchData['invoiceNumber']) . "%' OR ";
        }
        
        if (isset($searchData['purchaseOrderNo']) && trim($searchData['purchaseOrderNo']) > 0)
        {
            $searchSql .= " purchases.`purchase_order_no` LIKE '%" . trim($searchData['purchaseOrderNo']) . "%' OR ";
        }
        
        if (isset($searchData['purchaseDate']) && trim($searchData['purchaseDate']) != "")
        {
            $searchSql .= " purchases.purchase_date = '" . trim($searchData['purchaseDate']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " purchases.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if (isset($searchData['paidStatus']) && ((int)$searchData['paidStatus'] === 1 || ((int)$searchData['paidStatus']) === 2)){
            $searchSql .= " purchases.paid_status = '" . trim($searchData['paidStatus']) . "' OR ";
        }
        
        if (isset($searchData['paymentTermDuration']) && trim($searchData['paymentTermDuration']) > 0){
            $searchSql .= " purchases.payment_term_duration = '" . trim($searchData['paymentTermDuration']) . "' OR ";
        }
        
        if (isset($searchData['paymentTermId']) && trim($searchData['paymentTermId']) > 0){
            $searchSql .= " purchases.payment_term_id = '" . trim($searchData['paymentTermId']) . "' OR ";
        }
        
        if (isset($searchData['paymentMethodId']) && trim($searchData['paymentMethodId']) > 0){
            $searchSql .= " purchases.payment_method_id = '" . trim($searchData['paymentMethodId']) . "' OR ";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY purchases.added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        $totalAmount = 0;
        
        while($row = $result->fetch_object()){
            
            if ((int)$row->paidStatus !== 1){
                $row->dueDate = self::getDueDate($row->purchaseDate, $row->paymentTermDuration, $row->paymentTermId);
            }
            else {
                $row->dueDate = "";
            }
            
            $purchases[] = $row;
            
            if ($setTotalAmount === true){
                $totalAmount += $row->amount;
            }
        }
        
        if ($setTotalAmount === true){
            $purchases["totalAmount"] = $totalAmount;
        }
        
        return $purchases;
    }
    
    //----------------------------------------------------------------------------------------------
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM purchases WHERE id IN (" . $ids . ") "
             . "AND purchases.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT purchases.`id`, purchases.`client_id` AS clientId, purchases.`supplier_id` AS supplierId, "
             . " purchases.`product_id` AS productId, purchases.`quantity`, purchases.`unit_price` AS unitPrice, "
             . " purchases.`amount`, purchases.`tax_id` AS taxId, purchases.`invoice_number` AS invoiceNumber, "
             . " purchases.`purchase_order_no` AS purchaseOrderNo, purchases.`payment_term_duration` AS paymentTermDuration, "
             . " purchases.`payment_term_id` AS paymentTermId, purchases.`purchase_date` AS purchaseDate, "
             . " purchases.`paid_status` AS paidStatus, purchases.`payment_method_id` AS paymentMethodId, "
             . " purchases.`notes`, purchases.`added_date` AS addedDate, "
             . " DATE_FORMAT(purchases.purchase_date, '" . MYSQL_DATE_FORMAT . "') AS purchaseDateFormated, "
             . " products.name AS productName, suppliers.name AS supplierName, taxes.name AS taxName, taxes.precentage AS taxPrecentage,"
             . " payment_terms.name AS paymentTermName, payment_methods.name AS paymentMethodName "
             . " FROM purchases "
             . " LEFT JOIN products ON purchases.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " LEFT JOIN suppliers ON purchases.supplier_id = suppliers.id  AND suppliers.client_id = " . CLIENT_ID
             . " LEFT JOIN taxes ON purchases.tax_id = taxes.id  AND taxes.client_id = " . CLIENT_ID
             . " LEFT JOIN payment_terms ON purchases.payment_term_id = payment_terms.id "
             . " LEFT JOIN payment_methods ON purchases.payment_method_id = payment_methods.id  "
             . " WHERE purchases.id = "  . $pId . " AND purchases.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }
        
        $row = $result->fetch_assoc();
        
        if ((int)$row['paidStatus'] !== 1){
            $row['dueDate'] = self::getDueDate($row['purchaseDate'], $row['paymentTermDuration'], $row['paymentTermId']);
        }
        else {
            $row['dueDate'] = "";
        }
        
        return $row;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getCount($onlyNew=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT SUM(amount) AS totalAmount FROM purchases WHERE client_id = " . CLIENT_ID;
        
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
    
    public static function getDueDate($purchaseDate, $dueInterval, $tremId)
    {
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
}