<?php 
$oAccountType = new AccountType();
$saveFlag = true;
$accountTypeData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$accountTypeId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (!isset($_POST['search_accountType']) && (isset($_POST['addAccountType']) ||  isset($_POST['add_accountType'])))
{
    $accountTypeData = Security::cleanFormFields($_POST);
    
    if ($accountTypeData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = AccountType::isNameExist($accountTypeData['name'], $accountTypeData['id']);

        if ($isExist){
            $errorMessage['name'] = "AccountType already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oAccountType->setInfo($accountTypeData);
        $status = $oAccountType->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $accountTypeData = $_POST = array();
            $accountTypeData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $accountTypeData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $accountTypeData['showForm'] = true;
        }
    }
    else{
        $accountTypeData['showForm'] = true;
    }
}
else if (isset($_POST['search_accountType']))
{
    $searchData = Security::cleanFormFields($_POST);
    $searchData['showForm'] = true;
    
//    Debug::varDump($searchData);
//    exit;
}
else if (isset($_POST['do_bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select accountType(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oAccountType->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
// Ajax set default accountType
else if (isset($_POST['do']) && $_POST['do']  == 3 && $_POST['id']  > 0){
    $status = AccountType::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($accountTypeId > 0 & $do == EDIT){
    $accountTypeData = $oAccountType->getDetails($accountTypeId);
    $accountTypeData['showForm'] = true;
    
}
else if ($accountTypeId > 0 & $do == DELETE){
    $status = $oAccountType->delete($accountTypeId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['accountTypeData'] = $accountTypeData;
$a_TemplateData['allAccountTypes'] = $oAccountType->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"1%"), 
                                        array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                        array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%"));

