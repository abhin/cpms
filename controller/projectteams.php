<?php
$oProjectTeam = new ProjectTeam();
$oEmployee = new Employee();
$saveFlag = true;
$projectTeamData = $searchData = array();
$projectId = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
$stageId = isset($_REQUEST[md5("stageId")]) ? $_REQUEST[md5("stageId")] : 0;
$projectTeamId = isset($_REQUEST[md5("id")]) ? $_REQUEST[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_projectTeam']) && $projectId > 0)
{
    $projectTeamData = Security::cleanFormFields($_POST);
    $projectTeamData['id'] = isset($projectTeamData["id"]) ? $_POST["id"] : 0;
    $projectTeamData['projectId'] = $projectId;
    
    if (!$projectTeamData['employeeIds']){
        $errorMessage['employeeIds'] = "Invalid employees";
        $saveFlag = false;
    }
    
    if ($projectTeamData['assignedDate'] == ""){
        $errorMessage['assignedDate'] = "Invalid assigned date";
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        $projectTeamData['employeeId'] = 0;
        $oProjectTeam->setInfo($projectTeamData);
        
        foreach ($projectTeamData['employeeIds'] as $id)
        {
            $oProjectTeam->set("employeeId", (int)$id);
            $status = $oProjectTeam->add();
        }
        // Added message
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $projectTeamData = $_POST = array();
            $projectTeamData['showForm'] = true;
        }
        // Updated Messagge
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $projectTeamData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $projectTeamData['showForm'] = true;
    }
}
else if (isset($_POST['search_projectTeam']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['do_bulkAction']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = $_POST["selectedData"];
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkIds'] = "Please select projectTeam(s) for bulk action";
    }
    
    if ($_POST['bulkAction'] == ""){
        $errorMessage['bulkAction'] = "Please select a bulk action";
    }
    else if ($_POST['bulkAction'] == DELETE)
    {
        $status = $oProjectTeam->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($projectTeamId > 0 && $do == EDIT){
    $projectTeamData = $oProjectTeam->getDetails($projectTeamId);
    $projectTeamData['showForm'] = true;
}
else if ($projectTeamId > 0 && $do == DELETE){
    $status = $oProjectTeam->delete($projectTeamId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == SHOW_ADD_FORM){
    $projectTeamData['showForm'] = true;
    $projectTeamData['stageId'] = $stageId;
}

$projectTeamData['projectId'] = $searchData['projectId'] = $projectId;

$a_TemplateData['projectTeamData'] = $projectTeamData;
$a_TemplateData['searchData'] = $searchData;

$a_TemplateData['projects'] = Project::getNames();
$a_TemplateData['allStages'] = Stage::getNames($projectId);
$a_TemplateData['allEmployees'] = $oProjectTeam->getUnassignedEmployees($projectId);
$a_TemplateData['allProjectTeams'] = $oProjectTeam->getAll($searchData);

//Debug::varDump($a_TemplateData['allProjectTeams']);
//exit;

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Stage", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Employee", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Assigned Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Released Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
