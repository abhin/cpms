<?php

class ProductMapping
{
    private $id;
    private $clientId;
    private $parentId;
    private $productId;
    private $db;
    private static $DB = DEFAULT_DBO_NAME;


    public function __construct()
	{
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
    public function setInfo(array $data)
    {
        $this->set("id", $data['id']);
        $this->set("parentId", $data['parentId']);
        $this->set("productId", $data['productId']);
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE products_mapping SET parent_id = '" . $this->parentId . "', "
                 . "product_id = '" . $this->productId .  "' "
                 . " WHERE id = " . $this->id . " AND products_mapping.client_id = " . CLIENT_ID;
        }
        else{
            $maxId = $this->db->getMaxId("id", "products_mapping");
            $sql = "INSERT INTO products_mapping (id, client_id, parent_id, product_id) "
                 . " VALUES(" . $maxId . "," . CLIENT_ID . ", '" 
                 . $this->parentId . "', '" . $this->productId . "')";
        }
        
        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }

        if ($this->id > 0){
            return $this->id;
        }
        else if ($oMysqli->affected_rows > 0){
            $this->set("id", $maxId);
        }
        
        return true;
    }
    
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM products_mapping WHERE id IN (" . $ids . ") "
             . " AND products_mapping.client_id = " . CLIENT_ID; 

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    public static function deleteByCategory($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM products_mapping "
             . " WHERE parent_id  IN (" . $ids . ") OR product_id  IN (" . $ids . ") "
             . " AND products_mapping.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    
    public static function getMappingId($pCategoryId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM products_mapping WHERE product_id =" . $pCategoryId . " "
             . " AND products_mapping.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        $row = $result->fetch_assoc();
        
        return $row["id"];
    }
    
    public static function isMappingExist($pCategoryId)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM products_mapping WHERE product_id = " . $pCategoryId
             . " OR parent_id = " . $pCategoryId . " AND products_mapping.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        return true;
    }
    
    public static function getAllParentId($pCategoryId, &$parentId=array())
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT parent_id FROM products_mapping WHERE product_id = " . $pCategoryId
             . " AND products_mapping.client_id = " . CLIENT_ID;
            
        $result = $oMysqli->query($sql);
        
        if (!$result){
           return false; 
        }

        if ($result->num_rows > 0)
        {
            $row = $result->fetch_object();
            $parentId[$row->parent_id] = $row->parent_id;
            self::getAllParentId($row->parent_id, $parentId);
        }
        
        return $parentId;
    }
    
    public static function getAllSubCategoryIds($pParentId, &$subCatIds=array())
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT product_id FROM products_mapping WHERE parent_id = " . $pParentId
             . " AND products_mapping.client_id = " . CLIENT_ID;
            
        $result = $oMysqli->query($sql);
        
        if (!$result){
            return false;
        }
        
        while ($row = $result->fetch_object())
        {
            $subCatIds[$row->product_id] = $row->product_id;
            self::getAllSubCategoryIds($row->product_id, $subCatIds);
        }
        
        return $subCatIds;
    }
}