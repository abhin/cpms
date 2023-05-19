<?php

$oStock = new Stock();
$saveFlag = true;
$stockData = $searchData = array();
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;
$stockId = isset($_GET[md5("id")]) ? $_GET[md5("id")] : 0;

if (isset($_POST['add_stock']))
{
    $stockData = Security::cleanFormFields($_POST);
    
    $stockData['id'] = isset($stockData["id"]) ? $stockData["id"] : 0;
    $stockData['supplierId'] = ($stockData['supplierId'] > 0 ) ? $stockData['supplierId'] : 0;
    $stockData['quantity'] = ($stockData['quantity'] > 0 ) ? $stockData['quantity'] : 0;
    $stockData['unitPrice'] = ($stockData['unitPrice'] > 0 ) ? $stockData['unitPrice'] : 0.00;
    
    if ($stockData['productId'] <= 0){
        $errorMessage['name'] = "Invalid Product";
        $saveFlag = false;
    }
    
    if ($stockData['amount'] <= 0){
        $errorMessage['amount'] = "Invalid amount";
        $saveFlag = false;
    }
    
    if ($stockData['purchaseDate'] == ""){
        $errorMessage['amount'] = "Invalid purchase date";
        $saveFlag = false;
    }
    
    if ($saveFlag === true){
        $oStock->setInfo($stockData);
        $status = $oStock->add();
        
        // Added message
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $stockData = $_POST = array();
            $stockData['showForm'] = true;
        }
        // Updated Messagge
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $stockData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $stockData['showForm'] = true;
    }
}
else if (isset($_POST['search_stock']))
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
        $errorMessage['bulkIds'] = "Please select stock(s) for bulk action";
    }
    
    if ($_POST['bulkAction'] == ""){
        $errorMessage['bulkAction'] = "Please select a bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oStock->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($stockId > 0 && $do == 1){
    $stockData = $oStock->getDetails($stockId);
    $stockData['showForm'] = true;
}
else if ($stockId > 0 && $do == 2){
    $status = $oStock->delete($stockId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == 500){
    $stockData['showForm'] = true;
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['allProducts'] = Product::getNamesWithParent();
$a_TemplateData['allSuppliers'] = Supplier::getNames();
$a_TemplateData['allStock'] = $oStock->getAll($searchData);
$a_TemplateData['stockData'] = $stockData;