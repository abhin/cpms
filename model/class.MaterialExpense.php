<?php

class MaterialExpense
{
    private $id;
    private $clientId;
    private $projectId;
    private $stageId;
    private $productId;
    private $quantity;
    private $measuringUnitId;
    private $unitPrice;
    private $amount;
    private $purchaseDate;
    private $notes;
    private $addedDate;
    private $db;
    private static $DB = DEFAULT_DBO_NAME;

    public function __construct()
    {
        $this->set("db", $GLOBALS[DEFAULT_DBO_NAME]);
        $this->set("clientId", CLIENT_ID);
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
        $this->set("projectId", $projectData['projectId']);
        $this->set("stageId", $projectData['stageId']);
        $this->set("productId", $projectData['productId']);
        $this->set("quantity", $projectData['quantity']);
        $this->set("measuringUnitId", $projectData['measuringUnitId']);
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
        $saveFlag = true;

        if ($saveFlag == true)
        {
            if ($this->id > 0){
                $sql = "UPDATE material_expenses SET project_id = '" . $this->projectId . "', "
                     . "project_stage_id = '" . $this->stageId . "', " 
                     . "product_id = '" . $this->productId . "', quantity = '" . $this->quantity . "',"
                     . " measuring_unit_id = '" . $this->measuringUnitId . "', "
                     . "unit_price = '" . $this->unitPrice . "', amount = '" . $this->amount . "', "
                     . "purchase_date = '" . $this->purchaseDate . "', " . "notes = '" . $this->notes . "' "
                     . " WHERE id = " . $this->id . " AND material_expenses.client_id = " . CLIENT_ID;
            }
            else{
                $maxId = $this->db->getMaxId("id", "material_expenses");
                $sql = "INSERT INTO material_expenses (`id`, `client_id`, `project_id`, `project_stage_id`, `product_id`, "
                     . "`quantity`, `measuring_unit_id`, `unit_price`, `amount`, `purchase_date`, `notes`) "
                     . "VALUES(" . $maxId . ", " . CLIENT_ID  . ", '" . $this->projectId . "', '" . $this->stageId . "', '" 
                     . $this->productId . "', '" . $this->quantity . "', '" . $this->measuringUnitId . "', '" 
                     . $this->unitPrice . "', '" . $this->amount . "', '" . $this->purchaseDate . "', '" . $this->notes . "')";
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
                return true;
            }
            else{
                return false;
            }
        }
    }
    
    //----------------------------------------------------------------------------------------------
    public static function isNameExist($pProjectId, $pName, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM material_expenses WHERE name = '"  . $pName . "' "
             . "AND project_id = " . $pProjectId . " AND material_expenses.client_id = " . CLIENT_ID;

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
        $materialExpenses = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT material_expenses.`id`, material_expenses.`project_id` AS projectId, material_expenses.`project_stage_id` AS stageId, "
                . " material_expenses.`product_id` AS productId, material_expenses.`quantity`, "
             . "material_expenses.`unit_price` AS unitPrice, material_expenses.`amount`, material_expenses.`notes`, "
             . "DATE_FORMAT(material_expenses.purchase_date, '" . MYSQL_DATE_FORMAT . "') AS purchaseDate, "
             . "projects.name AS projectName, project_stages.name AS stageName,  products.name AS productName, "
             . "measuring_units.name AS measuringUnitName, measuring_units.short_code As shortCode "
             . "FROM material_expenses "
             . " LEFT JOIN projects ON material_expenses.project_id = projects.id AND projects.client_id = " . CLIENT_ID
             . " LEFT JOIN project_stages ON material_expenses.project_stage_id = project_stages.id  AND project_stages.client_id = " . CLIENT_ID
             . " LEFT JOIN products ON material_expenses.product_id = products.id AND products.client_id = " . CLIENT_ID
             . " LEFT JOIN measuring_units ON material_expenses.measuring_unit_id = measuring_units.id AND measuring_units.client_id = " . CLIENT_ID
             . " WHERE material_expenses.client_id = " . CLIENT_ID;
        
        if (isset($searchData['projectId']) && trim($searchData['projectId']) > 0){
            $sql .= " AND material_expenses.project_id = " . $searchData['projectId'];
        }
        
        if (isset($searchData['stageId']) && trim($searchData['stageId']) > 0){
            $searchSql .= " material_expenses.project_stage_id = '" . trim($searchData['stageId']) . "' OR ";
        }
        
        if (isset($searchData['productId']) && trim($searchData['productId']) > 0){
            $searchSql .= " material_expenses.product_id = '" . trim($searchData['productId']) . "' OR ";
        }
        
        if (isset($searchData['quantity']) && trim($searchData['quantity']) != ""){
            $searchSql .= " material_expenses.quantity LIKE '%" . trim($searchData['quantity']) . "%' OR ";
        }
        
        if (isset($searchData['unitPrice']) && trim($searchData['unitPrice']) != "")
        {
            $searchSql .= " material_expenses.unit_price LIKE '%" . trim($searchData['unitPrice']) . "%' OR ";
        }
        
        if (isset($searchData['amount']) && trim($searchData['amount']) != "")
        {
            $searchSql .= " material_expenses.amount LIKE '%" . trim($searchData['amount']) . "%' OR ";
        }
        
        if (isset($searchData['purchaseDate']) && trim($searchData['purchaseDate']) != "")
        {
            $searchSql .= " material_expenses.purchase_date = '" . trim($searchData['purchaseDate']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " material_expenses.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY material_expenses.added_date DESC LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        $totalAmount = 0;
        
        while($row = $result->fetch_object()){
            $materialExpenses[] = $row;
            $totalAmount += $row->amount;
        }
        
        $materialExpenses["totalAmount"] = $totalAmount;
        
        return $materialExpenses;
    }
    
    //----------------------------------------------------------------------------------------------
    public function delete($ids)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM material_expenses WHERE id IN (" . $ids . ") "
             . "AND material_expenses.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function deleteByProject($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM material_expenses WHERE project_id IN (" . $ids . ") "
             . "AND material_expenses.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public static function deleteByStage($ids)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "DELETE FROM material_expenses WHERE project_stage_id IN (" . $ids . ") "
             . "AND material_expenses.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result){
            return false;
        }
        
        return true;
    }
    
    //----------------------------------------------------------------------------------------------
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT `id`, project_id AS projectId, project_stage_id AS stageId, "
             . " `product_id` AS productId, `quantity`, measuring_unit_id AS measuringUnitId, unit_price AS unitPrice, "
             . " `amount`, `purchase_date`, `notes`, `added_date`, "
             . " DATE_FORMAT(purchase_date, '%Y-%m-%d') AS purchaseDate "
             . " FROM material_expenses WHERE id = "  . $pId . " AND material_expenses.client_id = " . CLIENT_ID;

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
        
        $sql = "SELECT SUM(amount) AS totalAmount FROM material_expenses WHERE client_id = " . CLIENT_ID;
        
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