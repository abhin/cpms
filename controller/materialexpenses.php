<?php

$oMaterialExpense = new MaterialExpense();
$oProgress = new Progress();
$saveFlag = true;
$materialExpenseData = $searchData = array();
$projectId = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
$stageId = isset($_REQUEST[md5("stageId")]) ? $_REQUEST[md5("stageId")] : 0;
$materialExpenseId = isset($_REQUEST[md5("id")]) ? $_REQUEST[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_materialExpense']) && $projectId > 0)
{
    $materialExpenseData = Security::cleanFormFields($_POST);
    $materialExpenseData['id'] = isset($materialExpenseData["id"]) ? $_POST["id"] : 0;
    $materialExpenseData['quantity'] = ($materialExpenseData['quantity'] > 0 ) ? $materialExpenseData['quantity'] : 1;
    $materialExpenseData['amount'] = ($materialExpenseData['amount'] > 0 ) ? $materialExpenseData['amount'] : 0.00;
    $materialExpenseData['unitPrice'] = ($materialExpenseData['unitPrice'] > 0 ) ? $materialExpenseData['unitPrice'] : 0.00;
    $materialExpenseData['projectId'] = $projectId;
    
    if ($materialExpenseData['productId'] <= 0){
        $errorMessage['name'] = "Invalid Material";
        $saveFlag = false;
    }
    
    if ($materialExpenseData['amount'] == ""){
        $errorMessage['amount'] = "Invalid amount";
        $saveFlag = false;
    }
    
    if ($materialExpenseData['purchaseDate'] == ""){
        $errorMessage['amount'] = "Invalid date";
        $saveFlag = false;
    }
    
    if ($saveFlag === true){
        $oMaterialExpense->setInfo($materialExpenseData);
        $status = $oMaterialExpense->add();
        // Added message
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $materialExpenseData = $_POST = array();
            $materialExpenseData['showForm'] = true;
        }
        // Updated Messagge
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $materialExpenseData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $materialExpenseData['showForm'] = true;
    }
}
else if (isset($_POST['search_materialExpense']))
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
        $errorMessage['bulkIds'] = "Please select materialExpense(s) for bulk action";
    }
    
    if ($_POST['bulkAction'] == ""){
        $errorMessage['bulkAction'] = "Please select a bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oMaterialExpense->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($materialExpenseId > 0 && $do == EDIT){
    $materialExpenseData = $oMaterialExpense->getDetails($materialExpenseId);
    $materialExpenseData['showForm'] = true;
}
else if ($materialExpenseId > 0 && $do == DELETE){
    $status = $oMaterialExpense->delete($materialExpenseId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == SHOW_ADD_FORM){
    $materialExpenseData['showForm'] = true;
    $materialExpenseData['stageId'] = $stageId;
}

$materialExpenseData['projectId'] = $searchData['projectId'] = $projectId;
$a_TemplateData['projects'] = Project::getNames();
$a_TemplateData['allStages'] = Stage::getNames($projectId);
$a_TemplateData['allProducts']   = Product::getNamesWithParent();
$a_TemplateData['allMaterialExpense'] = $oMaterialExpense->getAll($searchData);
$a_TemplateData['materialExpenseData'] = $materialExpenseData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['progressStatus'] = $oProgress->getAll();
$a_TemplateData['allUnit'] = MeasuringUnit::getNames();

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Stage", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Category", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Quantity", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Measur Unit", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Unit Price", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Amount", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Purchase/ Expense Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
