<?php 
$oBankDetails = new BankDetails();
$saveFlag = true;
$isSupplier = $isBuyer = false;
$bankDetailsData = $searchData = $supplierOrBuyerNames = $allBankDetails = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$bankDetailsId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;
$isSupplierOrBuyer = isset($_REQUEST[md5("isSupplierOrBuyer")]) ? (int)$_REQUEST[md5("isSupplierOrBuyer")] : 1;

if ($isSupplierOrBuyer === 1){
    $isSupplier = true;
}
else if ($isSupplierOrBuyer === 2){
    $isBuyer = true;
}

if (!isset($_POST['search_bankDetails']) && $isSupplierOrBuyer > 0 && (isset($_POST['add_bankDetails']) || isset($_POST['addBankDetails'])))
{
    $bankDetailsData = Security::cleanFormFields($_POST);
    
    $bankDetailsData['isSupplierOrBuyer'] = $isSupplierOrBuyer;
    
    if ($bankDetailsData['supplierOrBuyerId'] <= 0){
        $errorMessage['supplierOrBuyerId'] = "Name required";
        $saveFlag = false;
    }
    
    if ($bankDetailsData['accountNumber'] == ""){
        $errorMessage['accountNumber'] = "Account number required";
        $saveFlag = false;
    }
    else{
        $isExist = BankDetails::isAccNumberExist($bankDetailsData['accountNumber'], $bankDetailsData['id']);

        if ($isExist){
            $errorMessage['name'] = "Account number already exist";
            $saveFlag = false;
        }
    }
    
    if ($bankDetailsData['branchName'] == ""){
        $errorMessage['branchName'] = "Branch name required";
        $saveFlag = false;
    }
    
    if ($bankDetailsData['branchAddress'] == ""){
        $errorMessage['branchAddress'] = "Branch address Code required";
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        $oBankDetails->setInfo($bankDetailsData);
        $status = $oBankDetails->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $bankDetailsData = $_POST = array();
            $bankDetailsData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $bankDetailsData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $bankDetailsData['showForm'] = true;
        }
    }
    else{
        $bankDetailsData['showForm'] = true;
    }
}
else if (isset($_POST['search_bankDetails']))
{
    $searchData = Security::cleanFormFields($_POST);
    $bankDetailsData['showForm'] = true;
}
else if (isset($_POST['do_bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select bankDetails(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oBankDetails->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
// Ajax set default bankDetails
else if (isset($_POST['do']) && $_POST['do']  == 3 && $_POST['id']  > 0){
    $status = BankDetails::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($bankDetailsId > 0 & $do == EDIT){
    $bankDetailsData = $oBankDetails->getDetails($bankDetailsId);
    $bankDetailsData['showForm'] = true;
    
}
else if ($bankDetailsId > 0 & $do == DELETE){
    $status = $oBankDetails->delete($bankDetailsId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

if ($isSupplier === true){
    $supplierOrBuyerNames = Supplier::getNames();
}
else if ($isBuyer === true){
    $supplierOrBuyerNames = Buyer::getNames();
}
$bankDetailsData['isSupplierOrBuyer'] = $isSupplierOrBuyer;

$a_TemplateData['supplierOrBuyerName'] = $supplierOrBuyerNames;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['bankDetailsData'] = $bankDetailsData;

if ($isSupplierOrBuyer > 0){
    $searchData['isSupplierOrBuyer'] = $isSupplierOrBuyer;
    $allBankDetails = $oBankDetails->getAll($searchData);
}

$a_TemplateData['allBankDetails'] = $allBankDetails;

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"1%"), 
                                        array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Bank", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true",  "width"=>"12%"),
                                        array("name"=>"Account Number", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Branch Code", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true",  "width"=>"12%"),
                                        array("name"=>"IFSC Code", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true",  "width"=>"12%"),
                                        array("name"=>"Branch Address", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false"),
                                        array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false"),
                                        array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%"));