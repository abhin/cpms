<?php

class Invoice
{
    private $id;
    private $clientId;
    private $finacialYear;
    private $buyerId;
    private $productId;
    private $quantity;
    private $unitPrice;
    private $amount;
    private $taxId;
    private $paymentMethodId;
    private $purchaseOrderNo;
    private $invoiceNumber;
    private $issueDate;
    private $paymentTermId;
    private $dueDate;
    private $notes;
    private $invoiceNotes;
    private $addedDate;

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
        $this->set("productId", $projectData['productId']);
        $this->set("supplierId", $projectData['supplierId']);
        $this->set("quantity", $projectData['quantity']);
        $this->set("unitPrice", $projectData['unitPrice']);
        $this->set("amount", $projectData['amount']);
        $this->set("purchaseDate", $projectData['purchaseDate']);
        $this->set("notes", $projectData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE invoices SET `product_id`= ?,`supplier_id`= ?,`quantity`= ?, "
                 . " `unit_price`= ?,`amount`= ?,`purchase_date`= ?,`notes`= ?"
                 . " WHERE id = ? AND invoices.client_id = ? ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iiiddssii",  $this->productId, $this->supplierId, $this->quantity,
                                       $this->unitPrice, $this->amount, $this->purchaseDate, $this->notes, 
                                       $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "invoices");
            $sql = "INSERT INTO invoices (`id`, `client_id`, `product_id`, `supplier_id`, "
                 . " `quantity`, `unit_price`, `amount`, `purchase_date`, `notes`) "
                 . " VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiiiiddss", $maxId, $this->clientId, $this->productId, $this->supplierId, 
                                      $this->quantity, $this->unitPrice, $this->amount, $this->purchaseDate, $this->notes);
            
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
    public function getAll(array $searchData=array())
    {
        $invoices = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT invoices.`id`, invoices.`client_id` AS clientId, invoices.`product_id` AS productId, "
             . " invoices.`supplier_id` AS supplierId, invoices.`quantity`, invoices.`unit_price` AS unitPrice, "
             . " invoices.`amount`, invoices.`purchase_date`, invoices.`notes`, invoices.`added_date` AS addedDate, "
             . " DATE_FORMAT(invoices.purchase_date, '" . MYSQL_DATE_FORMAT . "') AS purchaseDate, "
             . " products.name AS productName, suppliers.name AS supplierName "
             . " FROM invoices "
             . " LEFT JOIN products ON invoices.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " LEFT JOIN suppliers ON invoices.supplier_id = suppliers.id  AND suppliers.client_id = " . CLIENT_ID
             . " WHERE invoices.client_id = " . CLIENT_ID;
        
        if (isset($searchData['productId']) && trim($searchData['productId']) > 0){
            $searchSql .= " invoices.product_id = '" . trim($searchData['stageId']) . "' OR ";
        }
        
        if (isset($searchData['supplierId']) && trim($searchData['supplierId']) > 0){
            $searchSql .= " invoices.supplier_id = '" . trim($searchData['supplierId']) . "' OR ";
        }
        
        if (isset($searchData['quantity']) && trim($searchData['quantity']) > 0){
            $searchSql .= " invoices.quantity LIKE '%" . trim($searchData['quantity']) . "%' OR ";
        }
        
        if (isset($searchData['unitPrice']) && trim($searchData['unitPrice']) > 0)
        {
            $searchSql .= " invoices.unit_price LIKE '%" . trim($searchData['unitPrice']) . "%' OR ";
        }
        
        if (isset($searchData['amount']) && trim($searchData['amount']) > 0)
        {
            $searchSql .= " invoices.amount LIKE '%" . trim($searchData['amount']) . "%' OR ";
        }
        
        if (isset($searchData['purchaseDate']) && trim($searchData['purchaseDate']) != "")
        {
            $searchSql .= " invoices.purchase_date = '" . trim($searchData['purchaseDate']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " invoices.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY invoices.added_date DESC";
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        $totalAmount = 0;
        
        while($row = $result->fetch_object()){
            $invoices[] = $row;
            $totalAmount += $row->amount;
        }
        
        $invoices["totalAmount"] = $totalAmount;
        
        return $invoices;
    }
    
    //----------------------------------------------------------------------------------------------
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM invoices WHERE id IN (" . $ids . ") "
             . "AND invoices.client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT invoices.`id`, invoices.`client_id` AS clientId, invoices.`product_id` AS productId, "
             . " invoices.`supplier_id` AS supplierId, invoices.`quantity`, invoices.`unit_price` AS unitPrice, "
             . " invoices.`amount`, invoices.`purchase_date`, invoices.`notes`, invoices.`added_date` AS addedDate, "
            . " DATE_FORMAT(purchase_date, '%Y-%m-%d') AS purchaseDate "
             . " FROM invoices WHERE id = "  . $pId . " AND invoices.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getCount($onlyNew=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT SUM(amount) AS totalAmount FROM invoices WHERE client_id = " . CLIENT_ID;
        
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
}