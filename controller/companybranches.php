<?php 

$oCompanyBranch = new CompanyBranch();
$saveFlag = true;
$branchData = $searchData = array();
$branchId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_branch']) || isset($_POST['addBranch']))
{
    $branchData = Security::cleanFormFields($_POST);
    $branchData['id'] = isset($branchData["id"]) ? $branchData["id"] : 0;
    
    if ($branchData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = CompanyBranch::isNameExist($branchData['name'], $branchData['id']);
        
        if ($isExist){
            $errorMessage['name'] = "Name already used";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true){
        $oCompanyBranch->setInfo($branchData);
        $status = $oCompanyBranch->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $branchData = $_POST = array();
            $branchData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $branchData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $branchData['showForm'] = true;
    }
}
else if (isset($_POST['search_branch']) || isset($_POST['export_action']))
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
        $errorMessage['bulkAction'] = "Please select branch(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == DELETE)
    {
        $status = $oCompanyBranch->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($branchId > 0 & $do == EDIT){
    $branchData = $oCompanyBranch->getDetails($branchId);
    $branchData['showForm'] = true;
    
}
else if ($branchId > 0 & $do == DELETE){
    $status = $oCompanyBranch->delete($branchId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['branchData'] = $branchData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['allBranches'] = $oCompanyBranch->getAll($searchData);

if (isset($_POST['export_action']))
{
//    CompanyBranch::exportAsExcel("users", $a_TemplateData['allBranches']);
}

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Address", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Email", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                 array("name"=>"Phone", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Added Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"12%"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"10%")
                                );