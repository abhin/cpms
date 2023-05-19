<?php 

$oProject = new Project();
$oProgress = new Progress();
$oCompanyBranch = new CompanyBranch();
$saveFlag = true;
$projectData = $searchData = array();
$projectId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_project']) || isset($_POST['addProject']))
{
    $projectData = Security::cleanFormFields($_POST);
    $projectData['id'] = $projectId;
    $projectData['startedDate'] = isset($projectData["startedDate"]) ? $projectData["startedDate"] : '';
    $projectData['completedDate'] = isset($projectData["completedDate"]) ? $projectData["completedDate"] : '';
    $projectData['branchId'] = isset($projectData["branchId"]) ? $projectData["branchId"] : 0;
    
    
    if ($projectData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = Project::isNameExist($projectData['name'], $projectData['id']);
        
        if ($isExist){
            $errorMessage['name'] = "Name already used";
            $saveFlag = false;
        }
    }
    
    if ($projectData['progressId'] < 0){
        $errorMessage['progressId'] = "Please select a valid progressId";
        $saveFlag = false;
    }
    else {

       if ($projectData['progressId'] > 1 && ($projectData['startedDate'] == "")){
           $errorMessage['startedDate'] = "Please select started date";
           $saveFlag = false;
       }
       
       if (($projectData['progressId'] == 3 || $projectData['progressId'] == 5) && ($projectData['completedDate'] == "")){
           $errorMessage['completedDate'] = "Please select completed date";
           $saveFlag = false;
       }
    }
    
    if ($saveFlag === true){
        $oProject->setInfo($projectData);
        $status = $oProject->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $projectData = $_POST = array();
            $projectData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $projectData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $projectData['showForm'] = true;
    }
}
else if (isset($_POST['search_project']) || isset($_POST['export_action']))
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
        $errorMessage['bulkAction'] = "Please select project(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == DELETE)
    {
        $status = $oProject->deleteAllData($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($projectId > 0 & $do == EDIT){
    $projectData = $oProject->getDetails($projectId);
    $projectData['showForm'] = true;
    
}
else if ($projectId > 0 & $do == DELETE){
    $status = $oProject->deleteAllData($projectId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['projectData'] = $projectData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['allBranches'] = $oCompanyBranch->getNames(ACTIVE);
$a_TemplateData['allProjects'] = $oProject->getAll($searchData);
$a_TemplateData['progressId'] = $oProgress->getAll();

if (isset($_POST['export_action']))
{
//    Project::exportAsExcel("users", $a_TemplateData['allProjects']);
}


$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Branch", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Progress", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"started Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"),
                                 array("name"=>"Completed Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"),
                                 array("name"=>"Added Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"12%"),
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"20%")
                                );