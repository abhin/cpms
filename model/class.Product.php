<?php

class Product
{
    private $id;
    private $clientId;
    private $name;
    private $unitPrice;
    private $measuringUnitId;
    private $taxId;
    private $discountRate;
    private $status;
    private $notes;
    private $addedDate;
    private $db;
    private static $DB = DEFAULT_DBO_NAME;


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
        $this->set("name", $projectData['name']);
        $this->set("unitPrice", $projectData['unitPrice']);
        $this->set("measuringUnitId", $projectData['measuringUnitId']);
        $this->set("taxId", $projectData['taxId']);
        $this->set("status", $projectData['status']);
        $this->set("notes", $projectData['notes']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE products SET name = ?, unit_price = ?, measuring_unit_id = ?, tax_id = ?, "
                 . " status = ?, notes = ? "
                 . " WHERE id = ? AND products.client_id = ? ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }
            
            $bind = $stmt->bind_param("sdiiisii",  $this->name, $this->unitPrice, $this->measuringUnitId, $this->taxId,
                                      $this->status, $this->notes, $this->id, $this->clientId);
            
            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "products");
            $sql = "INSERT INTO products (`id`, `client_id`, `name`, `unit_price`, `measuring_unit_id`, "
                 . " `tax_id`, `status`, `notes`) "
                 . " VALUES(?, ?, ?, ?, ?, ?, ?, ?) ";
            
            $stmt = $oMysqli->prepare($sql);
            
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iisdiiis", $maxId, $this->clientId, $this->name, $this->unitPrice, 
                                       $this->measuringUnitId, $this->taxId, $this->status, $this->notes);
            
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
    public static function isNameExist($pName, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM products WHERE name = '"  . $pName . "' "
             . " AND products.client_id = " . CLIENT_ID;

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
    public function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $data = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
//        $sql = "SELECT products.id, name, unit_price AS unitPrice, products.notes, products_mapping.parent_id "
//             . "FROM products "
//             . "LEFT JOIN products_mapping ON products_mapping.product_id = products.id "
//             . " AND products_mapping.client_id = " . CLIENT_ID
//             . " WHERE products.client_id = " . CLIENT_ID;
        
//        Procedure Used Query
        $sql = "SELECT products.id, "
             . " if (products_mapping.parent_id > 0,  getJoinedProductNameWithParentName(products.id, " . CLIENT_ID . "), products.name) AS joinedName, "
             . " products.name, products.unit_price AS unitPrice, products.measuring_unit_id AS measuringUnitId, "
             . " products.tax_id AS taxId, products.status, products.notes,  "
             . " getProductName(products_mapping.parent_id, " . CLIENT_ID . ") AS parentName, "
             . " taxes.name AS taxName, taxes.precentage AS taxPrecentage, measuring_units.name AS measuringUnitName, "
             . " measuring_units.short_code AS measuringUnitShortCode "
             . " FROM products "
             . " LEFT JOIN products_mapping ON products_mapping.product_id = products.id AND products_mapping.client_id = " . CLIENT_ID
             . " LEFT JOIN taxes ON taxes.id = products.tax_id "
             . " LEFT JOIN measuring_units ON measuring_units.id = products.measuring_unit_id "
             . " WHERE products.client_id = " . CLIENT_ID;
        
        if (isset($searchData['name']) && trim($searchData['name']) != ""){
            $searchSql .= " products.name LIKE '%" . trim($searchData['name']) . "%' OR ";
        }
        
        /*if (isset($searchData['parentId']) && trim($searchData['parentId']) > 0){
            $subCatIds = ProductMapping::getAllSubCategoryIds($searchData['parentId']);
            
            foreach ($subCatIds as $ids){
                $searchSql .=  " products.id = " . $ids . " OR ";
            }
        }*/
        
        if (isset($searchData['parentId']) && trim($searchData['parentId']) != ""){
            $searchSql .= " getJoinedProductNameWithParentName(products.id, " . CLIENT_ID . ") LIKE '%" . trim($searchData['parentId']) . "%' "
                    . " AND getProductName(products.id, " . CLIENT_ID . ") != '" . trim($searchData['parentId']) . "' OR ";
        }
        
        if (isset($searchData['unitPrice']) && trim($searchData['unitPrice']) > 0){
            $searchSql .= " products.unit_price LIKE '%" . trim($searchData['unitPrice']) . "%' OR ";
        }
        
        if (isset($searchData['measuringUnitId']) && trim($searchData['measuringUnitId']) > 0){
            $searchSql .= " products.measuring_unit_id = " . trim($searchData['measuringUnitId']) . " OR ";
        }
        if (isset($searchData['taxId']) && trim($searchData['taxId']) > 0){
            $searchSql .= " products.tax_id = " . trim($searchData['taxId']) . " OR ";
        }
        
        if (isset($searchData['status']) && trim($searchData['status']) > 0){
            $searchSql .= " products.status = " . trim($searchData['status']) . " OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " products.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
//        $sql .= " ORDER BY products.name ASC";
        $sql .= " ORDER BY products.added_date DESC  LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);
        
        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
//            $row->joinedName = self::getNameWithAllParentName($row->id);
//            
//            if ($row->parent_id > 0){
//                $row->parentName = self::getName($row->parent_id);
//            }
//            else{
//                $row->parentName = "";
//            }
            
            $data[] = $row;
        }
        
        return $data;
    }
    
    //----------------------------------------------------------------------------------------------
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM products WHERE id IN (" . $ids . ") "
             . "AND products.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        ProductMapping::deleteByCategory($ids);
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getNames($productId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT products.id, products.name FROM products ";
        
        if ($productId > 0){
            $subids = implode(', ', ProductMapping::getAllSubCategoryIds($productId));
            if ($subids != ""){
                $subids = ", " . $subids;
            }
            $sql .= " WHERE products.id NOT IN "
                 . " (" . $productId . $subids . ") AND ";
        }
        else{
            $sql .= "WHERE ";
        }
                
        $sql .= " products.client_id = " . CLIENT_ID . " ORDER BY name ASC";
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $names; 
        }

        while($row = $result->fetch_object()){
            $names[] = $row;
        }
        
        return $names;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getNamesWithParent()
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT products.id, products.name, products_mapping.parent_id AS parentId, products.unit_price AS unitPrice,"
             . " products.measuring_unit_id AS measuringUnitId "
             . " FROM products "
             . " LEFT JOIN products_mapping ON products_mapping.product_id = products.id AND products_mapping.client_id = " . CLIENT_ID
             . " WHERE products.client_id = " . CLIENT_ID
             . " ORDER BY name ASC";
            
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $names; 
        }

        while($row = $result->fetch_object()){
            if ($row->parentId > 0){
                $names[self::getName($row->parentId)][] = $row;
            }
            else{
                $names[""][] = $row;
            }
        }
        
        ksort($names);
        
        return $names;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT products.id, products.name, "
             . " products.unit_price AS unitPrice, products.measuring_unit_id AS measuringUnitId,"
             . " products.tax_id AS taxId, products.status, products.notes, "
             . " products_mapping.parent_id AS parentId, taxes.name AS taxName, taxes.precentage AS taxPrecentage, "
             . " measuring_units.name AS measuringUnitsName, measuring_units.short_code AS measuringUnitsShortCode "
             . " FROM products "
             . " LEFT JOIN products_mapping ON products.id = products_mapping.product_id AND products_mapping.client_id = " . CLIENT_ID
             . " LEFT JOIN taxes ON products.tax_id = taxes.id AND taxes.client_id = " . CLIENT_ID
             . " LEFT JOIN measuring_units ON products.measuring_unit_id = measuring_units.id AND measuring_units.client_id = " . CLIENT_ID
             . " WHERE products.id = "  . $pId . " AND products.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return $result->fetch_assoc();
    }
    
    //----------------------------------------------------------------------------------------------    
    public static function getName($productId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT products.name FROM products WHERE "
             . " products.id = " . $productId . " AND "
             . " products.client_id = " . CLIENT_ID;
        
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        if (!$result->num_rows){
           return ""; 
        }
        
        $row = $result->fetch_object();
        return $row->name;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function getNameWithAllParentName($pCategoryId, &$parentName="")
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT name, parent_id FROM products "
             . " LEFT JOIN products_mapping ON products.id = products_mapping.product_id "
             . "  AND products_mapping.client_id = " . CLIENT_ID
             . " WHERE products.id = " . $pCategoryId
             . " AND products.client_id = " . CLIENT_ID;
            
        $result = $oMysqli->query($sql);
        
        if (!$result){
           return false; 
        }

        if ($result->num_rows > 0)
        {
            $row = $result->fetch_object();
            $parentName = $row->name . ' > ' . $parentName;
            self::getNameWithAllParentName($row->parent_id, $parentName);
        }
        
        return rtrim($parentName, ' > ');
    }
}