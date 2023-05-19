<?php 
$oAccountHead = new AccountHead();
$saveFlag = true;
$accountHeadData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$accountHeadId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (!isset($_POST['search_accountHead']) && ((isset($_POST['add_accountHead']) || (isset($_POST['name']) && isset($_POST["id"])))))
{
    $accountHeadData = Security::cleanFormFields($_POST);
    
    if ($accountHeadData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = AccountHead::isNameExist($accountHeadData['name'], $accountHeadData['id']);

        if ($isExist){
            $errorMessage['name'] = "Account head already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oAccountHead->setInfo($accountHeadData);
        $status = $oAccountHead->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $accountHeadData = $_POST = array();
            $accountHeadData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $accountHeadData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $accountHeadData['showForm'] = true;
        }
    }
    else{
        $accountHeadData['showForm'] = true;
    }
}
else if (isset($_POST['search_accountHead']))
{
    $searchData = Security::cleanFormFields($_POST);
    $searchData['showForm'] = true;
}
else if (isset($_POST['bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select account head(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oAccountHead->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}

if ($accountHeadId > 0 & $do == EDIT){
    $accountHeadData = $oAccountHead->getDetails($accountHeadId);
    $accountHeadData['showForm'] = true;
    
}
else if ($accountHeadId > 0 & $do == DELETE){
    $status = $oAccountHead->delete($accountHeadId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['accountHeadData'] = $accountHeadData;
$a_TemplateData['allAccountHeads'] = $oAccountHead->getAll($searchData);
$a_TemplateData['allAccountType'] = AccountType::getNames();

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"1%"), 
                                        array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Account Type Name", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                        array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"8%"));

