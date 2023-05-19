<?php 
$oPayment = new Payment();
$oPaymentType = new PaymentType();
$oPaymentMethod = new PaymentMethod();
$oPaymentTerm = new PaymentTerm();
$oEmployee = new Employee();

$saveFlag = true;
$paymentData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$paymentId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_payment']) || isset($_POST['addPayment']))
{
    $paymentData = Security::cleanFormFields($_POST);
    
    $paymentData['id'] = (isset($paymentData['id']) && (int)$paymentData['id'] > 0) ? (int)$paymentData['id'] : 0;
            
    if ($paymentData['amount'] == ""){
        $errorMessage['amount'] = "Invalid salary amount";
        $saveFlag = false;
    }
    
    if ((int)$paymentData['paymentMethodId'] <= 0){
        $errorMessage['paymentMethodId'] = "Invalid payment method";
        $saveFlag = paymentTypeId;
    }
        
    if (!isset($paymentData['isItSalary']))
    {
        $paymentData['isItSalary'] = NO;
        $paymentData['paymentTermId'] = $paymentData['totalHours'] = 0;
        $paymentData['salaryMonth'] = $paymentData['salaryDateStart'] = $paymentData['salaryDateEnd'] = "";
        
        if ((int)$paymentData['paymentTypeId'] <= 0){
            $errorMessage['paymentTypeId'] = "Invalid payment type";
            $saveFlag = paymentTypeId;
        }
    }
    else
    {
        $paymentData['paymentTypeId'] = 0;
        $paymentData['isItSalary'] = YES;
        
        if ((int)$paymentData['paymentTermId'] <= 0){
            $errorMessage['paymentTermId'] = "Invalid salary term";
            $saveFlag = false;
        }
        else if ((int)$paymentData['paymentTermId'] === 1)
        {
            if ((int)$paymentData['totalHours'] <= 0){
                $errorMessage['totalHours'] = "Invalid total hours";
                $saveFlag = false;
            }
        }
        else if ((int)$paymentData['paymentTermId'] === 4)
        {
            if ($paymentData['salaryMonth'] == ""){
                $errorMessage['totalHours'] = "Invalid salary month";
                $saveFlag = false;
            }
            else{
                $paymentData['salaryMonth'] = date("Y-m-d", strtotime($paymentData["salaryMonth"]));
            }
        }
        else{
            $paymentData['totalHours'] = 0;
            $paymentData['salaryMonth'] = "NULL";
        }
        
        if ($paymentData['salaryDateStart'] == ""){
            $errorMessage['salaryDateStart'] = "Invalid salary start date";
            $saveFlag = false;
        }
        
        if ((int)$paymentData['paymentTermId'] !== 1 && $paymentData['salaryDateEnd'] == ""){
            $errorMessage['salaryDateEnd'] = "Invalid salary end date";
            $saveFlag = false;
        }
    }
    
    if ($paymentData['paymentDate'] == ""){
        $errorMessage['paymentDate'] = "Invalid payment date";
        $saveFlag = false;
    }

    if ($saveFlag === true)
    {
        $oPayment->setInfo($paymentData);
        $status = $oPayment->add();

        if ($status === true){
            $message['success'] = "Added Successfully.";
            $paymentData = $_POST = array();
            $paymentData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $paymentData = $_POST = array();
        }
        else{
            $paymentData['salaryMonth'] = date("Y-m", strtotime($paymentData["salaryMonth"]));
            $message['error'] = "Unable to Add/Update.";
            $paymentData['showForm'] = true;
        }
    }
    else{
        $paymentData['salaryMonth'] = date("Y-m", strtotime($paymentData["salaryMonth"]));
        $paymentData['showForm'] = true;
    }
}
else if (isset($_POST['search_payment']))
{
    $searchData = Security::cleanFormFields($_POST);
    $searchData['salaryMonth'] = (isset($searchData['salaryMonth']) && $searchData['salaryMonth'] != "") ? date('Y-m', strtotime($searchData['salaryMonth'])) : "";
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
        $status = $oPayment->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($paymentId > 0 & $do == EDIT){
    $paymentData = $oPayment->getDetails($paymentId);
    
//    Debug::varDump($paymentData);
//    exit;
    
    $paymentData['showForm'] = true;
}
else if ($paymentId > 0 & $do == DELETE){
    $status = $oPayment->delete($paymentId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
//$paymentData['showForm'] = true;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['paymentData'] = $paymentData;
$a_TemplateData['allPayments'] = $oPayment->getAll($searchData);
$a_TemplateData['allPaymentTypes'] = $oPaymentType->getNames();
$a_TemplateData['allPaymentTerms'] = $oPaymentTerm->getNames();
$a_TemplateData['allPaymentMethods'] = $oPaymentMethod->getNames();
$a_TemplateData['allEmployees'] = $oEmployee->getNames();

//Debug::varDump($a_TemplateData['allPayments']);
//exit;

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Employee Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Amount", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Salary Month", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"false", "width"=>"12%"), 
                                 array("name"=>"Payment Type", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Payment Method", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Payment Term", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"8%"), 
                                 array("name"=>"Total Hours", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"8%"), 
                                 array("name"=>"Salary Date Start", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"12%"), 
                                 array("name"=>"Salary Date End", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"12%"), 
                                 array("name"=>"Receipt No", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Payment/ Receipt Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true",  "width"=>"12%"),
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false"),
                                 array("name"=>"Action", "class"=>"columTextRight", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );