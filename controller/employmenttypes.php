<?php 
$oEmploymentType = new EmploymentType();
$saveFlag = true;
$employmentTypeData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_employmentType']) || isset($_POST['addEmploymentType']))
{
    $employmentTypeData = Security::cleanFormFields($_POST);
    $employmentTypeData['status'] = (isset($employmentTypeData["status"]) 
                                && ((int)$employmentTypeData["status"] === ACTIVE || (int)$employmentTypeData["status"] === INACTIVE))  
                                ? $employmentTypeData["status"] : 1;
    
    if ($employmentTypeData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = EmploymentType::isNameExist($employmentTypeData['name'], $employmentTypeData['id']);

        if ($isExist){
            $errorMessage['name'] = "Payment Term already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oEmploymentType->setInfo($employmentTypeData);
        $status = $oEmploymentType->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $employmentTypeData = $_POST = array();
            $employmentTypeData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $employmentTypeData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $employmentTypeData['showForm'] = true;
        }
    }
    else{
        $employmentTypeData['showForm'] = true;
    }
}
else if (isset($_POST['search_employmentType']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['do_bulkAction']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select tax(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == DELETE)
    {
        $status = $oEmploymentType->delete($ids);
        
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
    $status = EmploymentType::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($taxId > 0 & $do == EDIT){
    $employmentTypeData = $oEmploymentType->getDetails($taxId);
    $employmentTypeData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oEmploymentType->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['employmentTypeData'] = $employmentTypeData;
$a_TemplateData['allEmploymentTypes'] = $oEmploymentType->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
