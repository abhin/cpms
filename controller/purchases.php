<?php

$oPurchase = new Purchase();
$saveFlag = true;
$purchaseData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$purchaseId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_purchase']))
{
    $purchaseData = Security::cleanFormFields($_POST);
    
    $purchaseData['id'] = isset($purchaseData["id"]) ? (int)$purchaseData["id"] : 0;
    $purchaseData['supplierId'] = ((int)$purchaseData['supplierId'] > 0 )   ? (int)$purchaseData['supplierId'] : 0;
    $purchaseData['quantity'] = ((int)$purchaseData['quantity'] > 0 )       ? (int)$purchaseData['quantity'] : 1;
    $purchaseData['unitPrice'] = ((int)$purchaseData['unitPrice'] > 0 )     ? (int)$purchaseData['unitPrice'] : 0.00;
    $purchaseData['paidStatus'] = (isset($purchaseData['paidStatus']) && (int)$purchaseData['paidStatus'] === 1 ) ? 1 : 2;
    
    
    if ($purchaseData['productId'] <= 0){
        $errorMessage['name'] = "Invalid Product";
        $saveFlag = false;
    }
    
    if ($purchaseData['amount'] <= 0){
        $errorMessage['amount'] = "Invalid amount";
        $saveFlag = false;
    }
    
    if ($purchaseData['invoiceNumber'] == ""){
        $errorMessage['invoiceNumber'] = "Invalid invoice number";
        $saveFlag = false;
    }
    
    if ($purchaseData['purchaseDate'] == ""){
        $errorMessage['purchaseDate'] = "Invalid purchase date";
        $saveFlag = false;
    }
    
    if (isset($purchaseData['paidStatus']) && (int)$purchaseData['paidStatus'] === 1 && (int)$purchaseData['paymentMethodId'] <= 0){
        $errorMessage['paymentMethod'] = "Invalid payment method";
        $saveFlag = false;
    }
    else if (!isset($purchaseData['paidStatus']) && (!isset($purchaseData['paymentTermDuration']) || ($purchaseData['paymentTermDuration'] == "" )
            || !isset($purchaseData['paymentTermId']) || ($purchaseData['paymentTermId'] <= 0)))
    {
        $errorMessage['paymentTerm'] = "Invalid payment term";
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        $oPurchase->setInfo($purchaseData);
        $status = $oPurchase->add();
        
        // Added message
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $purchaseData = $_POST = array();
            $purchaseData['showForm'] = true;
        }
        // Updated Messagge
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $purchaseData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
        }
    }
    else{
        $purchaseData['showForm'] = true;
    }
}
else if (isset($_POST['search_purchase']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['do_bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = $_POST["selectedData"];
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkIds'] = "Please select purchase(s) for bulk action";
    }
    
    if ($_POST['bulkAction'] == ""){
        $errorMessage['bulkAction'] = "Please select a bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oPurchase->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($purchaseId > 0 && $do === EDIT){
    $purchaseData = $oPurchase->getDetails($purchaseId);
//    Debug::varDump($purchaseData);
//    exit;
    $purchaseData['showForm'] = true;
}
else if ($purchaseId > 0 && $do === DELETE){
    $status = $oPurchase->delete($purchaseId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == SHOW_ADD_FORM){
    $purchaseData['showForm'] = true;
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['purchaseData'] = $purchaseData;
$a_TemplateData['allProducts'] = Product::getNamesWithParent();
$a_TemplateData['allSuppliers'] = Supplier::getNames();
$a_TemplateData['allPurchase'] = $oPurchase->getAll($searchData);
$a_TemplateData['allUnit'] = MeasuringUnit::getNames();
$a_TemplateData['allPaymentTerm'] = PaymentTerm::getNames();
$a_TemplateData['allPaymentMethod'] = PaymentMethod::getNames();

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"1%"), 
                                        array("name"=>"Product", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Quantity", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                        array("name"=>"Measur Unit", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                        array("name"=>"Unit Price", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Amount", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Invoice Number", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Paid Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                        array("name"=>"Due Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"),
                                        array("name"=>"Purchase Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"12%"),
                                        array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false"),
                                        array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%"));