<?php 
$oPaymentType = new PaymentType();
$saveFlag = true;
$paymentTypeData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_paymentType']) || isset($_POST['addPaymentType']))
{
    $paymentTypeData = Security::cleanFormFields($_POST);
    $paymentTypeData['status'] = (isset($paymentTypeData["status"]) 
                                && ((int)$paymentTypeData["status"] === ACTIVE || (int)$paymentTypeData["status"] === INACTIVE))  
                                ? $paymentTypeData["status"] : 1;
    $paymentTypeData['calculationType'] = (isset($paymentTypeData["calculationType"]) 
                                && ((int)$paymentTypeData["calculationType"] === ADDITION || (int)$paymentTypeData["calculationType"] === SUBSTRACTION))  
                                ? $paymentTypeData["calculationType"] : 1;
    
    if ($paymentTypeData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = PaymentType::isNameExist($paymentTypeData['name'], $paymentTypeData['id']);

        if ($isExist){
            $errorMessage['name'] = "Payment Type already exist";
            $saveFlag = false;
        }
    }

    if ($saveFlag === true)
    {
        $oPaymentType->setInfo($paymentTypeData);
        $status = $oPaymentType->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $paymentTypeData = $_POST = array();
            $paymentTypeData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $paymentTypeData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $paymentTypeData['showForm'] = true;
        }
    }
    else{
        $paymentTypeData['showForm'] = true;
    }
}
else if (isset($_POST['search_paymentType']))
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
        $status = $oPaymentType->delete($ids);
        
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
    $status = PaymentType::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($taxId > 0 & $do == EDIT){
    $paymentTypeData = $oPaymentType->getDetails($taxId);
    $paymentTypeData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oPaymentType->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['paymentTypeData'] = $paymentTypeData;
$a_TemplateData['allPaymentTypes'] = $oPaymentType->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
//                                 array("name"=>"Calculation With Salary", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
