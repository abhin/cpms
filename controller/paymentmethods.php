<?php 
$oPaymentMethod = new PaymentMethod();
$saveFlag = true;
$paymentMethodData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_paymentMethod']) || isset($_POST['addPaymentMethod']))
{
    $paymentMethodData = Security::cleanFormFields($_POST);
    
    if ($paymentMethodData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = PaymentMethod::isNameExist($paymentMethodData['name'], $paymentMethodData['id']);

        if ($isExist){
            $errorMessage['name'] = "PaymentMethod already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oPaymentMethod->setInfo($paymentMethodData);
        $status = $oPaymentMethod->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $paymentMethodData = $_POST = array();
            $paymentMethodData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $paymentMethodData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $paymentMethodData['showForm'] = true;
        }
    }
    else{
        $paymentMethodData['showForm'] = true;
    }
}
else if (isset($_POST['search_paymentMethod']))
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
        $status = $oPaymentMethod->delete($ids);
        
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
    $status = PaymentMethod::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}
else if ($taxId > 0 & $do == EDIT){
    $paymentMethodData = $oPaymentMethod->getDetails($taxId);
    $paymentMethodData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oPaymentMethod->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['paymentMethodData'] = $paymentMethodData;
$a_TemplateData['allPaymentMethods'] = $oPaymentMethod->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );