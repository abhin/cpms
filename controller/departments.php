<?php 
$oDepartment = new Department();
$saveFlag = true;
$departmentData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_department']) || isset($_POST['addDepartment']))
{
    $departmentData = Security::cleanFormFields($_POST);
    $departmentData['status'] = (isset($departmentData["status"]) 
                                && ((int)$departmentData["status"] === ACTIVE || (int)$departmentData["status"] === INACTIVE))  
                                ? $departmentData["status"] : 1;
    
    if ($departmentData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = Department::isNameExist($departmentData['name'], $departmentData['id']);

        if ($isExist){
            $errorMessage['name'] = "Payment Term already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oDepartment->setInfo($departmentData);
        $status = $oDepartment->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $departmentData = $_POST = array();
            $departmentData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $departmentData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $departmentData['showForm'] = true;
        }
    }
    else{
        $departmentData['showForm'] = true;
    }
}
else if (isset($_POST['search_department']))
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
        $status = $oDepartment->delete($ids);
        
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
    $status = Department::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($taxId > 0 & $do == EDIT){
    $departmentData = $oDepartment->getDetails($taxId);
    $departmentData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oDepartment->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['departmentData'] = $departmentData;
$a_TemplateData['allDepartments'] = $oDepartment->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );