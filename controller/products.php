<?php

$oProduct = new Product();
$oTax = new Tax();
$saveFlag = true;
$showForm = false;
$productData = $searchData = array();
$productId = isset($_REQUEST[md5("id")]) ? $_REQUEST[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_product']) || (isset($_POST['name']) && isset($_POST['id'])))
{
    $productData = Security::cleanFormFields($_POST);
    $productData['id'] = isset($productData["id"]) ? $productData["id"] : 0;
    $productData['parentId'] = (isset($productData['parentId']) && ($productData['parentId'] > 0))? $productData['parentId'] : '0';
    $productData['unitPrice'] = (isset($productData['unitPrice']) && ($productData['unitPrice'] > 0)) ? $productData['unitPrice'] : '0.00';
    
    if ($productData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = Product::isNameExist($productData['name'], $productData['id']);
        
        if ($isExist){
            $errorMessage['name'] = "Name already used";
            $saveFlag = false;
        }
    }
    
    if (($saveFlag == true) && isset($productData['addAsSub']))
    {
        if($productData['parentId'] <= 0){
            $errorMessage['parentId'] = "Please select a parent";
            $saveFlag = false;
        }
        else if ($productData['parentId'] == $productData['id']){
            $errorMessage['parentId'] = "Cannot add same product as a parent.";
            $saveFlag = false;
        }
        else if ($productData['id'] > 0)
        {
            $productParents = ProductMapping::getAllParentId($productData['parentId']);
            
            if ($productParents != false && in_array($productData['id'], $productParents)){
                $errorMessage['parentId'] = "Cannot add as sub. Selected parent is sub of the product.";
                $saveFlag = false;
            }
        }
    }
    else if(($saveFlag == true) && !isset($productData['addAsSub']) && ProductMapping::isMappingExist($productData['id'])){
        $mappedId = ProductMapping::getMappingId($productData['id']);
        $oMapping = new ProductMapping();
        $oMapping->delete($mappedId);
    }
    
    if ($saveFlag === true)
    {
        $oProduct->setInfo($productData);
        $status = $oProduct->add();
        
        // Added message
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $showForm = true;
        }
        // Updated Message
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $status = true;
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $saveFlag = false;
        }
        
        if (isset($productData['addAsSub']) && ($oProduct->get("id") > 0) && ($saveFlag === true))
        {
            $oProductMapping = new ProductMapping();
            $productId = $oProduct->get("id");
            $mappedId = ProductMapping::getMappingId($productId);
            
            $mapData['id'] = ($mappedId > 0) ? $mappedId : 0;
            $mapData['productId'] = $productId;
            $mapData['parentId'] = $productData['parentId'];
            $oProductMapping->setInfo($mapData);
            $status = $oProductMapping->add();
            
            if (!$status){
                $message['success'] .= '<span style=""color:red>Add as sub failed</span>';
            }
        }
        
        if ($status === true){
            $productData = $_POST = array();
        }
    }
    else{
        $showForm = true;
    }
}
else if (isset($_POST['search_product']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['do_bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = $_POST["selectedData"];
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkIds'] = "Please select product(s) for bulk action";
    }
    
    if ($_POST['bulkAction'] == ""){
        $errorMessage['bulkAction'] = "Please select a bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oProduct->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($productId > 0 && $do == 1){
    $productData = $oProduct->getDetails($productId);
    $showForm = true;
}
else if ($productId > 0 && $do == 2){
    $status = $oProduct->delete($productId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == 500){
    $showForm = true;
}

$productData['showForm'] = $showForm;
$a_TemplateData['parent'] = Product::getNames($productId);
$a_TemplateData['productData'] = $productData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['allProduct'] = $oProduct->getAll($searchData);
$a_TemplateData['allTax'] = Tax::getNames();
$a_TemplateData['allUnit'] = MeasuringUnit::getNames();
$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true"), 
                                 array("name"=>"Name", "class"=>"null", "orderable"=>"true"), 
                                 array("name"=>"Parent Product", "class"=>"null", "orderable"=>"true"), 
                                 array("name"=>"unit Price", "class"=>"null", "orderable"=>"true"), 
                                 array("name"=>"Measuring unit", "class"=>"null", "orderable"=>"true"), 
                                 array("name"=>"Tax(%)", "class"=>"null", "orderable"=>"true"), 
                                 array("name"=>"Status", "class"=>"null", "orderable"=>"true"), 
                                 array("name"=>"Notes", "class"=>"null", "orderable"=>"true"), 
                                 array("name"=>"Actions", "class"=>"null", "orderable"=>"false")
                                );
