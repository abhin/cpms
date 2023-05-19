<?php
$salesInvoiceId = isset($_GET[md5('id')]) ? (int)$_GET[md5('id')] : 0;
$do = isset($_GET[md5('do')]) ? (int)$_GET[md5('do')] : 0;

$salesInvoiceData = SalesInvoice::getDetails($salesInvoiceId);

if (!$salesInvoiceData && $do === 0){
    header("Location:" . Security::actionUrl("salesinvoices"));
    exit;
}
else if ($do === SALES_RETURN)
{
    $status = true;
    $errorMsg = "";
    $returnData = $_POST;
    if ($returnData["invoiceId"] <= 0 || $returnData["invoiceItemId"] <= 0){
        $errorMsg = "Invalid item";
        $status = false;
    }
    else if ($returnData["invoiceItemId"] <= 0){
        $errorMsg = "Invalid quantity";
        $status = false;
    }
    else if ($returnData["quantity"] <= 0){
        $errorMsg = "Invalid quantity";
        $status = false;
    }
    else if ($returnData["returnDate"] == ""){
        $errorMsg = "Invalid return date";
        $status = false;
    }
    
    if ($status === true)
    {
        $oReturnItem = new ReturnItem();
        $oReturnItem->setInfo($returnData);
        $status = $oReturnItem->add();
        if ($status > 0){
            $status = true;
        }
        else{
            $status = false;
        }
    }
    
    $returnData["status"] = $status;
    $returnData["errorMsg"] = $errorMsg;
    echo json_encode($returnData);
    exit;
}
else if (($do === DELETE) && ($_REQUEST[md5("paymentId")] > 0))
{
    $status = SalesInvoicePayment::deletePayment($_GET[md5("paymentId")]);
    
    if ($status === true){
        SalesInvoice::changePaidStatus(2, $salesInvoiceId);
    }
    
    header("Location:" . Security::actionUrl("salesinvoicedetails", array('id'=>$salesInvoiceId)));
    exit;
}

$salesInvoiceData["items"] = SalesInvoiceItem::getItems($salesInvoiceId);
$salesInvoiceData['payments'] = SalesInvoicePayment::getAll($salesInvoiceId);
$a_TemplateData['salesInvoiceData'] = (object)$salesInvoiceData;

$a_TemplateData['theadItems'] = array(array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                        array("name"=>"Product", "class"=>null, "orderable"=>true),
                                        array("name"=>"Tax", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Billed Quantity", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Returned Quantity", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Balance Quantity", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Margin", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Unit Price", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"MRP", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Total", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Action", "class"=>"columTextRight", "orderable"=>false));

$a_TemplateData['theadPayment'] = array(array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                        array("name"=>"Payment Method", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Received Amount", "class"=>"columTextRight", "orderable"=>true),
                                        array("name"=>"Received Date", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Notes", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Action", "class"=>"columTextRight", "orderable"=>false));