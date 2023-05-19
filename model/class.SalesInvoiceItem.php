<?php

class SalesInvoiceItem
{
    private $id;
    private $clientId;
    private $invoiceId;
    private $productId;
    private $tax;
    private $quantity;
    private $measuringUnitId;
    private $margin;
    private $unitPrice;
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
    public function setInfo(array $invoiceItem)
    {
        $this->set("id", 0);
        $this->set("invoiceId", $invoiceItem['invoiceId']);
        $this->set("productId", $invoiceItem['productId']);
        $this->set("tax", $invoiceItem['tax']);
        $this->set("quantity", $invoiceItem['quantity']);
        $this->set("measuringUnitId", $invoiceItem['measuringUnitId']);
        $this->set("margin", $invoiceItem['margin']);
        $this->set("unitPrice", $invoiceItem['unitPrice']);
        $this->set("addedDate", date("Y-m-d H:i:s"));
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            return false;
        }
        
        $maxId = $this->db->getMaxId("id", "sales_invoice_items");
        $sql = "INSERT INTO `sales_invoice_items`(`id`, `client_id`, `invoice_id`, "
             . " `product_id`, `tax`, `quantity`, `measuring_unit_id`, `margin`, "
             . " `unit_price`, `added_date`) "
             . " VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

      $stmt = $oMysqli->prepare($sql);

        if (!$stmt){
            return false;
        }

        $bind = $stmt->bind_param("iiiidiidis", $maxId, $this->clientId, $this->invoiceId, $this->productId, 
                                  $this->tax, $this->quantity, $this->measuringUnitId, $this->margin, $this->unitPrice,
                                  $this->addedDate);

        if (!$bind){
            return false;
        }
        
        $excute = $stmt->execute();
        
        if (!$excute){
            return false;
        }

        if ($oMysqli->affected_rows > 0){
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
    public static function deleteByInvoice($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM sales_invoice_items WHERE invoice_id IN (" . $ids . ") "
             . " AND sales_invoice_items.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getItems($invoiceId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $items = array();
        
        $sql = "SELECT sales_invoice_items.`id`, sales_invoice_items.`client_id` AS ClientId, "
             . " sales_invoice_items.`invoice_id` AS invoiceId, sales_invoice_items.`product_id` AS productId, "
             . " sales_invoice_items.`tax`, sales_invoice_items.`quantity`, "
             . " sales_invoice_items.`measuring_unit_id` AS measuringUnitId, sales_invoice_items.`margin`, "
             . " sales_invoice_items.`unit_price` AS unitPrice, "
             . " sales_invoice_items.`added_date` AS addedDate, products.name AS productName, "
             . " measuring_units.short_code AS measuringUnitName "
             . " FROM sales_invoice_items "
             . " LEFT JOIN products ON sales_invoice_items.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " LEFT JOIN measuring_units ON sales_invoice_items.measuring_unit_id = measuring_units.id AND products.client_id = " . CLIENT_ID
             . " WHERE sales_invoice_items.invoice_id = "  . $invoiceId . " AND sales_invoice_items.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }
        
        while($row = $result->fetch_object()){
            $row->returnQuantity = ReturnItem::getTotalReturnByInvoiceItem($row->id);
            $items[] = $row;
        }
        
        return $items;
    }
    //----------------------------------------------------------------------------------------------
}