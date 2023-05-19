<?php 
$oSupplier = new Supplier();
$saveFlag = true;
$supplierData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$supplierId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (!isset($_POST['search_supplier']) && (isset($_POST['add_supplier']) || isset($_POST['addSupplier'])))
{
    $supplierData = Security::cleanFormFields($_POST);
    
    if ($supplierData['name'] == ""){
        $errorMessage['name'] = "Name requires";
        $saveFlag = false;
    }
    else{
        $isExist = Supplier::isNameExist($supplierData['name'], $supplierData['id']);

        if ($isExist){
            $errorMessage['suppliername'] = "Supplier already exist";
            $saveFlag = false;
        }
    }
    
    if ($supplierData['email'] != "")
    {
        $isExist = Supplier::isEmailExist($supplierData['email'], $supplierData['id']);

        if ($isExist){
            $errorMessage['email'] = "This email already used";
            $saveFlag = false;
        }
    }
    
    if ($supplierData['address'] == ""){
        $errorMessage['address'] = "Address required";
        $saveFlag = false;
    }
    
    
    if ($saveFlag === true)
    {
        $oSupplier->setInfo($supplierData);
        
        $status = $oSupplier->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $supplierData = $_POST = array();
            $supplierData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $supplierData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $supplierData['showForm'] = true;
        }
    }
    else{
        $supplierData['showForm'] = true;
    }
}
else if (isset($_POST['search_supplier']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['do_bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select supplier(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oSupplier->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}

if ($supplierId > 0 & $do == EDIT){
    $supplierData = $oSupplier->getDetails($supplierId);
    $supplierData['showForm'] = true;
    
}
else if ($supplierId > 0 & $do == DELETE){
    $status = $oSupplier->delete($supplierId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['supplierData'] = $supplierData;
$a_TemplateData['allSuppliers'] = $oSupplier->getAll($searchData);

//Debug::varDump($a_TemplateData['allSuppliers']);
//exit;

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"1%"),
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Contact Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Email", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Phone", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Address", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true",  "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Actions", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%"),
                                );