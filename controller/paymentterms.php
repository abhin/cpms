<?php 
$oPaymentTerm = new PaymentTerm();
$saveFlag = true;
$paymentTermData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_paymentTerm']) || isset($_POST['addPaymentTerm']))
{
    $paymentTermData = Security::cleanFormFields($_POST);
    $paymentTermData['status'] = (isset($paymentTermData["status"]) 
                                && ((int)$paymentTermData["status"] === ACTIVE || (int)$paymentTermData["status"] === INACTIVE))  
                                ? $paymentTermData["status"] : 1;
    
    if ($paymentTermData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = PaymentTerm::isNameExist($paymentTermData['name'], $paymentTermData['id']);

        if ($isExist){
            $errorMessage['name'] = "Payment Term already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oPaymentTerm->setInfo($paymentTermData);
        $status = $oPaymentTerm->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $paymentTermData = $_POST = array();
            $paymentTermData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $paymentTermData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $paymentTermData['showForm'] = true;
        }
    }
    else{
        $paymentTermData['showForm'] = true;
    }
}
else if (isset($_POST['search_paymentTerm']))
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
        $status = $oPaymentTerm->delete($ids);
        
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
    $status = PaymentTerm::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($taxId > 0 & $do == EDIT){
    $paymentTermData = $oPaymentTerm->getDetails($taxId);
    $paymentTermData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oPaymentTerm->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['paymentTermData'] = $paymentTermData;
$a_TemplateData['allPaymentTerms'] = $oPaymentTerm->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
