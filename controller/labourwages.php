<?php 
$oLabourWage = new LabourWage();
$oLabourType = new LabourType();
$oEmployee = new Employee();

$saveFlag = true;
$labourWageData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;

$projectId  = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
$paymentId  = isset($_GET[md5("id")])            ? (int)$_GET[md5("id")] : 0;

// This varibale coming from 'paylabourwages' page after wages succesfully paid
if (isset($_GET[md5("paidMessage")]) && (int)$_GET[md5("paidMessage")] === 1){
    $message['success'] = "Payment made Successfully.";
}

$paidStatus = isset($_POST["paidStatus"])   ? (int)$_POST["paidStatus"] : 2;
$tableLabourDate  = isset($_POST["tableLabourDate"]) ? $_POST["tableLabourDate"] : "";
$tableToDate     = isset($_POST["tableToDate"])      ? $_POST["tableToDate"] : "";

if (isset($_POST['addLabourWage']) || isset($_POST['add_labourWage']))
{
    $labourWageData = Security::cleanFormFields($_POST);
    $labourWageData['projectId'] = $projectId;
    $labourWageData['id'] = (isset($labourWageData['id']) && (int)$labourWageData['id'] > 0) ? (int)$labourWageData['id'] : 0;
    $labourWageData['paidStatus'] = 2;
    $labourWageData['paymentDate'] = $labourWageData['receiptNo'] = "";
            
    if ((int)$labourWageData['supervisorId'] <= 0){
        $errorMessage['supervisorId'] = "Invalid supervisor";
        $saveFlag = false;
    }
    
    if ((int)$labourWageData['labourTypeId'] <= 0){
        $errorMessage['labourTypeId'] = "Invalid labour type";
        $saveFlag = false;
    }
    
    if ($labourWageData['labourDate'] == ""){
        $errorMessage['labourDate'] = "Invalid labour date";
        $saveFlag = false;
    }
    
    if ($labourWageData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    
    if ((int)$labourWageData['totalHours'] <= 0){
        $errorMessage['totalHours'] = "Invalid total hours";
        $saveFlag = false;
    }
        
    if ($labourWageData['amount'] == ""){
        $errorMessage['amount'] = "Invalid wage amount";
        $saveFlag = false;
    }
        
    if ($saveFlag === true)
    {
        $oLabourWage->setInfo($labourWageData);
        $status = $oLabourWage->add();

        if ($status === true){
            $message['success'] = "Added Successfully.";
            $labourWageData = $_POST = array();
            $labourWageData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $labourWageData = $_POST = array();
        }
        else{
            $labourWageData['salaryMonth'] = date("Y-m", strtotime($labourWageData["salaryMonth"]));
            $message['error'] = "Unable to Add/Update.";
            $labourWageData['showForm'] = true;
        }
    }
}
else if (isset($_POST['search_payment']))
{
    $searchData = Security::cleanFormFields($_POST);
    $tableLabourDate = $searchData['labourDate'];
    $tableToDate     = $searchData['labourDate'];
}
else if (isset($_POST['do_bulkAction']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select item(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == DELETE)
    {
        $status = $oLabourWage->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($paymentId > 0 & $do == EDIT){
    $labourWageData = $oLabourWage->getDetails($paymentId);
    $labourWageData['showForm'] = true;
}
else if ($paymentId > 0 & $do == DELETE){
    $status = $oLabourWage->delete($paymentId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == SHOW_ADD_FORM){
    $labourWageData['showForm'] = true;
}

//$labourWageData['showForm'] = true;
$labourWageData['projectId']   = $searchData['projectId'] = $projectId;
$searchData['paidStatus']      = $paidStatus;
$searchData['tableLabourDate'] = $tableLabourDate;
$searchData['tableToDate']     = $tableToDate;
$a_TemplateData['allLabourWages'] = $oLabourWage->getAll($searchData);
$a_TemplateData['projects']   = Project::getNames();
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['labourWageData'] = $labourWageData;
$a_TemplateData['allEmployees']   = $oEmployee->getNames();
$a_TemplateData['allLabourType']  = $oLabourType->getNames();

$a_TemplateData['thead'] = array(
//    array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"12%"), 
                1=>array("name"=>"Supervisor Name", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"20%"), 
                array("name"=>"Labour Type", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"12%"), 
                array("name"=>"Labour Date", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"12%"), 
                array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true"), 
                array("name"=>"Total Hours", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"8%"), 
                array("name"=>"Amount", "class"=>"columTextRight", "orderable"=>"false", "visible"=>"true", "width"=>"8%"), 
                array("name"=>"Receipt No", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"false"),
                array("name"=>"Payment/ Receipt Date", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true",  "width"=>"12%"),
                array("name"=>"Paid Status", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true"),
                array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"false"),
                array("name"=>"Action", "class"=>"columTextRight", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
               );

//Debug::varDump($a_TemplateData['allLabourWages']);
//exit;