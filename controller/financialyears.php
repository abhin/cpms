<?php 
$oFinancialYear = new FinancialYear();
$saveFlag = true;
$financialyearData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$financialyearId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (!isset($_POST['search_financialyear']) && ((isset($_POST['add_financialyear']) || (isset($_POST['name']) && isset($_POST["id"])))))
{
    $financialyearData = Security::cleanFormFields($_POST);
    
    if ($financialyearData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = FinancialYear::isNameExist($financialyearData['name'], $financialyearData['id']);

        if ($isExist){
            $errorMessage['name'] = "Name already exist";
            $saveFlag = false;
        }
    }
    
    if ($financialyearData['startDate'] == "")
    {
        $errorMessage['precentage'] = "Invalid start date";
        $saveFlag = false;
    }
    
    if ($financialyearData['endDate'] == "")
    {
        $errorMessage['endDate'] = "Invalid end date";
        $saveFlag = false;
    }
    
    if ($financialyearData['startDate'] != "" && $financialyearData['endDate'] != "")
    {
        $status = FinancialYear::isRangeExist($financialyearData['startDate'], $financialyearData['endDate'], $financialyearData['id']);
                
        if ($status === true){
            $errorMessage['endDate'] = "Financial year range already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oFinancialYear->setInfo($financialyearData);
        $status = $oFinancialYear->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $financialyearData = $_POST = array();
            $financialyearData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $financialyearData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $financialyearData['showForm'] = true;
        }
    }
    else{
        $financialyearData['showForm'] = true;
    }
}
else if (isset($_POST['search_financialyear']))
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
        $errorMessage['bulkAction'] = "Please select financialyear(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oFinancialYear->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}

if ($financialyearId > 0 & $do == 1){
    $financialyearData = $oFinancialYear->getDetails($financialyearId);
    $financialyearData['showForm'] = true;
    
}
else if ($financialyearId > 0 & $do == 2){
    $status = $oFinancialYear->delete($financialyearId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['financialyearData'] = $financialyearData;
$a_TemplateData['allFinancialYear'] = $oFinancialYear->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                        array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>true),
                                        array("name"=>"Start Date", "class"=>"columTextLeft", "orderable"=>true),
                                        array("name"=>"End Date", "class"=>"columTextLeft", "orderable"=>true),
                                        array("name"=>"Status", "class"=>"columTextLeft", "orderable"=>true),
                                        array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>true),
                                        array("name"=>"Action", "class"=>"columTextRight", "orderable"=>false));