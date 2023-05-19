<?php

$oAdvance = new Advance();
$saveFlag = true;
$advanceData = $searchData = array();
$projectId = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
$advanceId = isset($_GET[md5("id")]) ? $_GET[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_advance']) && $projectId > 0)
{
    $advanceData = Security::cleanFormFields($_POST);
    $advanceData["projectId"] = $projectId;
    $advanceData['id'] = isset($advanceData['id']) ? $advanceData['id'] : 0;
    $advanceData['receivedDate'] = isset($advanceData['receivedDate']) ? trim($advanceData['receivedDate']) : '';
    
    if ($advanceData['projectId'] <= 0){
        $errorMessage['name'] = "Choose a valid project";
        $saveFlag = false;
    }
    
    if ($advanceData['amount'] <= 0){
        $errorMessage['amount'] = "Please eneter a valid amount";
        $saveFlag = false;
    }
    
    if ($advanceData['receivedDate'] == ""){
        $errorMessage['receivedDate'] = "Please select a valid date";
        $saveFlag = false;
    }
    
    if ($saveFlag === true){
        $oAdvance->setInfo($advanceData);
        $status = $oAdvance->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $advanceData = $_POST =  array();
            $advanceData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $advanceData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $advanceData['showForm'] = true;
    }
}
else if (isset($_POST['search_advance']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = $_POST["selectedData"];
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select advance(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oAdvance->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($advanceId > 0 & $do == EDIT){
    $advanceData = $oAdvance->getDetails($advanceId);
    $advanceData['showForm'] = true;
}
else if ($advanceId > 0 & $do == DELETE){
    $status = $oAdvance->delete($advanceId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == SHOW_ADD_FORM){
    $advanceData['showForm'] = true;
}

$advanceData["projectId"] = $searchData["projectId"] = $projectId;

$a_TemplateData['projects'] = Project::getNames();
$a_TemplateData['advanceData'] = $advanceData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['allAdvance'] = $oAdvance->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Poject Name", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Amount", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Received Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
