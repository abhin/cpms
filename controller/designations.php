<?php 
$oDesignation = new Designation();
$saveFlag = true;
$designationData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_designation']) || isset($_POST['addDesignation']))
{
    $designationData = Security::cleanFormFields($_POST);
    $designationData['status'] = (isset($designationData["status"]) 
                                && ((int)$designationData["status"] === ACTIVE || (int)$designationData["status"] === INACTIVE))  
                                ? $designationData["status"] : 1;
    
    if ($designationData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = Designation::isNameExist($designationData['name'], $designationData['id']);

        if ($isExist){
            $errorMessage['name'] = "Payment Term already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oDesignation->setInfo($designationData);
        $status = $oDesignation->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $designationData = $_POST = array();
            $designationData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $designationData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $designationData['showForm'] = true;
        }
    }
    else{
        $designationData['showForm'] = true;
    }
}
else if (isset($_POST['search_designation']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select tax(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oDesignation->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
// Ajax set default tax
else if (isset($_POST['do']) && $_POST['do']  == 3 && $_POST['id']  > 0){
    $status = Designation::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($taxId > 0 & $do == EDIT){
    $designationData = $oDesignation->getDetails($taxId);
    $designationData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oDesignation->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['designationData'] = $designationData;
$a_TemplateData['allDesignations'] = $oDesignation->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
