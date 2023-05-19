<?php 
$oTax = new Tax();
$saveFlag = true;
$taxData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (!isset($_POST['search_tax']) && ((isset($_POST['add_tax']) || (isset($_POST['name']) && isset($_POST["id"])))))
{
    $taxData = Security::cleanFormFields($_POST);
    
    if ($taxData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = Tax::isNameExist($taxData['name'], $taxData['id']);

        if ($isExist){
            $errorMessage['name'] = "Tax already exist";
            $saveFlag = false;
        }
    }
    
    if ($taxData['precentage'] == "")
    {
        $errorMessage['precentage'] = "Invalid precentage";
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        if ((int)$taxData['isDefault'] === 1){
            Tax::resetDefault();
        }
        $oTax->setInfo($taxData);
        $status = $oTax->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $taxData = $_POST = array();
            $taxData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $taxData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $taxData['showForm'] = true;
        }
    }
    else{
        $taxData['showForm'] = true;
    }
}
else if (isset($_POST['search_tax']))
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
        $status = $oTax->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($taxId > 0 & $do == EDIT){
    $taxData = $oTax->getDetails($taxId);
    $taxData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oTax->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['taxData'] = $taxData;
$a_TemplateData['allTaxes'] = $oTax->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"1%"),
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Precentage", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Is Default", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Actions", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true")
                                );