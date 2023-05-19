<?php

$oStage = new Stage();
$oProgress = new Progress();
$saveFlag = true;
$stageData = $searchData = array();
$projectId = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
$stageId = isset($_REQUEST[md5("id")]) ? $_REQUEST[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if ((isset($_POST['add_stage']) ||  isset($_POST['addStage'])) && $projectId > 0)
{
    $stageData = Security::cleanFormFields($_POST);
    $stageData['id'] = isset($stageData["id"]) ? $stageData["id"] : 0;
    $stageData['projectId'] = $projectId;
    $stageData['startedDate'] = isset($stageData['startedDate']) ? trim($stageData['startedDate']) : '';
    $stageData['completedDate'] = isset($stageData['completedDate']) ? trim($stageData['completedDate']) : '';
    
    if ($stageData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = Stage::isNameExist($stageData['projectId'], $stageData['name'], $stageData['id']);
        
        if ($isExist){
            $errorMessage['name'] = "Name already used";
            $saveFlag = false;
        }
    }
    if ($stageData['progressId'] < 1){
        $errorMessage['progressId'] = "Please select a valid progress";
        $saveFlag = false;
    }
    else {
       if ($stageData['progressId'] > 1 && (!strtotime($stageData['startedDate']))){
           $errorMessage['startedDate'] = "Please select started date";
           $saveFlag = false;
       }

       if (($stageData['progressId'] == 3 || $stageData['progressId'] == 5) && !strtotime($stageData['completedDate'])){
           $errorMessage['completedDate'] = "Please select completed date";
           $saveFlag = false;
       }
    }
    
    if ($saveFlag === true){
        $oStage->setInfo($stageData);
        $status = $oStage->add();
        
        // Added message
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $stageData = $_POST = array();
            $stageData['showForm'] = true;
        }
        // Updated Messagge
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $stageData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $stageData['showForm'] = true;
    }
}
else if (isset($_POST['search_stage']))
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
        $errorMessage['bulkIds'] = "Please select stage(s) for bulk action";
    }
    
    if ($_POST['bulkAction'] == ""){
        $errorMessage['bulkAction'] = "Please select a bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oStage->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($stageId > 0 && $do == EDIT){
    $stageData = $oStage->getDetails($stageId);
    $stageData['showForm'] = true;
}
else if ($stageId > 0 && $do == DELETE){
    $status = $oStage->delete($stageId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == SHOW_ADD_FORM){
    $stageData['showForm'] = true;
}

$stageData['projectId'] = $searchData['projectId'] = $projectId;
$a_TemplateData['projects'] = Project::getNames();
$a_TemplateData['stageData'] = $stageData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['allStages'] = $oStage->getAll($searchData);
$a_TemplateData['allProgress'] = $oProgress->getAll();
$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Progress", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"started Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Completed Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Added Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"12%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"15%")
                                );
