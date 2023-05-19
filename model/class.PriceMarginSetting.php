<?php

class PriceMarginSetting
{
    private $id;
    private $clientId;
    private $productId;
    private $priceMarginTypeId;
    private $margin;
    private $status;
    private $notes;
    private $lastUpdated;
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
        $this->set("productId", $buyerData['productId']);
        $this->set("priceMarginTypeId", $buyerData['priceMarginTypeId']);
        $this->set("margin", $buyerData['margin']);
        $this->set("notes", $buyerData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        $now = date("Y-m-d H:i:s");
        
        if ($this->id > 0)
        {
            $sql = "UPDATE price_margin_settings SET `product_id`= ?,`price_margin_type_id`= ?, "
                 . " `margin`= ?,`notes`= ?,`last_updated`= ? "
                 . " WHERE id = ?  AND price_margin_settings.client_id = ? ";
           
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iidssii",  $this->productId, $this->priceMarginTypeId, $this->margin, 
                                      $this->notes, $now, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "price_margin_settings");
            $sql = "INSERT INTO price_margin_settings (`id`, `client_id`, `product_id`, `price_margin_type_id`, `margin`, `notes`, `added_date`) "
                 . " VALUES(?,?,?,?,?,?,?) ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("iiiidss", $maxId, $this->clientId, $this->productId, $this->priceMarginTypeId, 
                                       $this->margin, $this->notes, $now);
            
            if (!$bind){
                return false;
            }
        }
        
        return $excute = $stmt->execute();
        
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
    public static function getPriceMarginSettingsId($priceMarginTypeId, $productId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT price_margin_settings.`id` FROM price_margin_settings  WHERE "
             . " price_margin_type_id = '"  . $priceMarginTypeId . "' AND product_id = '" . $productId . "' AND "
             . " price_margin_settings.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
            
        if (!$result->num_rows){
           return 0; 
        }
        
        $row = $result->fetch_object();
        return $row->id;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getAll($searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $priceSettings = array();
        $searchSql = "";
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT price_margin_settings.`id`, price_margin_settings.`client_id` AS clientId, "
             . " price_margin_settings.`product_id` AS productId, price_margin_settings.`price_margin_type_id` AS priceMarginTypeId, "
             . " price_margin_settings.`margin`, price_margin_settings.`notes`, price_margin_settings.`last_updated` AS lastUpdated, "
             . " price_margin_settings.`added_date` AS addedDate, "
             . " products.name AS productName, price_margin_types.name AS priceMarginTypeName "
             . " FROM price_margin_settings "
             . " LEFT JOIN price_margin_types ON price_margin_settings.price_margin_type_id = price_margin_types.id AND price_margin_types.client_id = " . CLIENT_ID
             . " LEFT JOIN products ON price_margin_settings.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " WHERE price_margin_settings.`client_id` = " . CLIENT_ID;
        
        if (isset($searchData['productId']) && $searchData['productId'] != ""){
            $searchSql .= " product_id = " . $searchData['productId'] . "  OR ";
        }
        
        if (isset($searchData['priceMarginTypeId']) && $searchData['priceMarginTypeId'] > 0){
            $searchSql .= " price_margin_type_id = " . $searchData['priceMarginTypeId'] . "  OR ";
        }
        
        if (isset($searchData['margin']) && $searchData['margin'] != ""){
            $searchSql .= " margin  LIKE '%" . $searchData['margin'] . "%'";
        }
        
        if (isset($searchData['notes']) && $searchData['notes'] != ""){
            $searchSql .= " notes  LIKE '%" . $searchData['notes'] . "%'";
        }
        
        if ($searchSql!== ""){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY price_margin_settings.last_updated DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return $priceSettings; 
        }
        
        $productId = array();
        while($row = $result->fetch_assoc()){
            if (!in_array($row['productId'], $productId)){
                $productId[] = $row['productId'];
                $typeRate = array();
            }
//            $typeRate[$row["priceMarginTypeName"]] = $row['margin'];
            $typeRate[$row["priceMarginTypeId"]] = $row['margin'];
            $priceSettings[$row['productId']]  = $row + $typeRate;
        }
        
        return $priceSettings;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $priceSettings = array();
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT price_margin_settings.`id`, price_margin_settings.`client_id` AS clientId, "
             . " price_margin_settings.`product_id` AS productId, price_margin_settings.`price_margin_type_id` AS priceMarginTypeId, "
             . " price_margin_settings.`margin`, price_margin_settings.`notes`, price_margin_settings.`last_updated` AS lastUpdated, "
             . " price_margin_settings.`added_date` AS addedDate, "
             . " products.name AS productName, price_margin_types.name AS priceMarginTypeName "
             . " FROM price_margin_settings "
             . " LEFT JOIN price_margin_types ON price_margin_settings.price_margin_type_id = price_margin_types.id AND price_margin_types.client_id = " . CLIENT_ID
             . " LEFT JOIN products ON price_margin_settings.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " WHERE price_margin_settings.product_id = " . $pId . " AND price_margin_settings.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }
        
        $typeRate = $settings = array();
        $productId = array();
        
        while($row = $result->fetch_assoc()){
//            $typeRate[$row["priceMarginTypeName"]] = $row['margin'];
            $typeRate[PriceMarginType::createTypeAsFiledName($row["priceMarginTypeName"])] = $row['margin'];
            $priceSettings = $row + $typeRate;
        }

        return $priceSettings;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function deleteByProdcuct($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM price_margin_settings WHERE product_id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT id FROM price_margin_settings WHERE client_id = " . CLIENT_ID;
        
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
    public static function getPrices($productId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $price = array();
        
        $sql = "SELECT price_margin_settings.id, price_margin_settings.margin, price_margin_types.name AS priceMarginTypeName "
             . " FROM price_margin_settings "
             . " LEFT JOIN price_margin_types ON price_margin_settings.price_margin_type_id = price_margin_types.id AND price_margin_types.client_id = " . CLIENT_ID
             . " WHERE price_margin_settings.client_id = " . CLIENT_ID . " AND price_margin_settings.product_id = " . $productId
             . " ORDER BY name ASC";
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $price; 
        }

        while($row = $result->fetch_object()){
            $price[] = $row;
        }
        
        return $price;
    }
    
    public static function delete($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM price_margin_settings WHERE price_margin_type_id IN (" . $ids . ")  AND client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    public static function getMargins($productId)
    {
        $margins = array();
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT price_margin_settings.id, price_margin_types.`id` AS priceMarginTypeId, price_margin_types.`client_id` AS clientId,"
            . " price_margin_types.name AS priceMarginTypeName, price_margin_settings.`margin` "
            . " FROM price_margin_types "
            . " LEFT JOIN price_margin_settings ON price_margin_settings.price_margin_type_id = price_margin_types.id "
            . " AND price_margin_settings.product_id = " . $productId . " AND price_margin_settings.client_id = " . CLIENT_ID
            . " WHERE price_margin_types.client_id = " . CLIENT_ID . " ORDER BY price_margin_types.name ASC";

        $result = $oMysqli->query($sql);

        if (!$result){
           return false; 
        }
        
        if (!$result->num_rows){
           return $priceSettings; 
        }
        
        while($row = $result->fetch_object()){
            $margins[] = $row;
        }

        return $margins;
    }
}