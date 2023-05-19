<?php

$oSalesInvoice = new SalesInvoice();
$showForm = false;
$searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;

if (isset($_POST['search_salesInvoice']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
    $startIndex = (int)trim($_POST['start']);
    $oPurchase = new Purchase();

    $i = $startIndex+1;
    $data = $oSalesInvoice->getAll(array(), $startIndex);
    $tableRow = $invoiceData = array();
    foreach ($data as $index=>$details)
    {
        $invoiceData["slno"] =  $i;
        $invoiceData["invoiceNumber"] = $details->invoiceNumber;
        $invoiceData["invoiceDate"] = $details->invoiceDate;
        
        if ((int)$details->paidStatus === 1){
            $paidStatus = '<span class="label-default label label-success">Paid</span>';
        }else if ((int)$details->paidStatus === 2){
            $paidStatus = '<span id="paidStatus_' . $details->id . '" class="label-default label label-danger">Unpaid</span>';
        }else{
            $paidStatus = '<span id="paidStatus_' . $details->id . '" class="label-default label">Unknown</span>';
        }
        $invoiceData["paidStatus"] = $paidStatus;

        $invoiceData["dueDate"] =  $details->dueDate;
        if (($details->dueDate != "") && (strtotime("now") > strtotime($details->dueDate))){
            $invoiceData["dueDate"] .= '<br/><span class="label-default label label-warning">Over Due</span>';
        }
        
        $invoiceData["grandTotalAmount"] =  $details->grandTotalAmount;
        $invoiceData["totalReturnQuantity"] =  $details->totalReturnQuantity;
        $invoiceTotal = $details->grandTotalAmount - $details->totalReturnAmount;
        $invoiceData["invoiceTotal"] = $invoiceTotal;
        $invoiceData["totalReceivedAmount"]   =  '<span id="currentTotalRecAmount_' . $details->id . '">' . $details->totalReceivedAmount . '</span>';
        $amountDue = round((float)$invoiceTotal - (float)$details->totalReceivedAmount, 2);
        
        if ($amountDue <= 0){
            $amountDue = 0;
        }
        $invoiceData["amountDue"] = '<span id="currentDue_' . $details->id . '">' . $amountDue . '</span>'
                                      . '<input type="hidden" name="amountDue[' . $details->id . ']" id="amountDue_' . $details->id . '" value="' . $amountDue . '"/>';
        $invoiceData["notes"] = $details->notes;
         
        $invoiceData["action"] = '<a class="btn btn-success btn-small" href="' . Security::actionUrl("salesinvoicedetails", array("id"=>$details->id)) . '" target="_blank">
                                 <i class="glyphicon glyphicon-search icon-white"></i>
                                 View
                             </a>';
        
        if ((int)$details->paidStatus === 2){
            $invoiceData["action"] .= '<a class="btn btn-info btn-small details-control dopay" href="#" target="_blank" id="dopay_' . $details->id. '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Do pay
            </a>';
        }

      $i++;
      $tableRow[$i] = implode(", ", $invoiceData);
    }
    
    ksort($tableRow);
    echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
    exit;
}
else if($do === PAYMENT) 
{
    $currentDue = 0;
    $invoicePayment = array();
    $status = true;
    $errorMsg = "";
    $paidStatus = 2;
    
    $invoiceId = (int)$_POST["invoiceId"];
    $amountDue = (float)$_POST["amountDue"];
    $paymentMethodId = (int)$_POST["paymentMethodId"];
    $receivedAmount = (float)$_POST["receivedAmount"];
    $balanceAmount = (float)$_POST["balanceAmount"];
    $receivedDate = $_POST["receivedDate"];
    $notes = $_POST["notes"];
    
    if ($invoiceId <= 0){
        $errorMsg = "Invalid invoice";
        $status = false;
    }
    else if ($amountDue <= 0){
        $errorMsg = "Invalid due amount";
        $status = false;
    }
    else if ($paymentMethodId <= 0){
        $errorMsg = "Invalid payment method";
        $status = false;
    }
    else if ($receivedAmount <= 0){
        $errorMsg = "Invalid received amount";
        $status = false;
    }
    else if ($receivedDate == ""){
        $errorMsg = "Invalid received date";
        $status = false;
    }
    
    if ($status === true)
    {
        $grandTotal = SalesInvoice::getGrandTotal($invoiceId);
        $returnTotal = ReturnItem::getTotalReturnAmountByInvoice($invoiceId);
        $grandTotal = $grandTotal - $returnTotal;
        $totalReceivedAmount = SalesInvoicePayment::getTotalReceivedAmount($invoiceId);
        $currTotalRecAmount = round(($totalReceivedAmount + $receivedAmount), 2);
        $currentDue = round(($grandTotal - $currTotalRecAmount), 2);


        /*if (($totalReceivedAmount !== 0) && ($grandTotal > $totalReceivedAmount))
        {
            $currentDue = ($grandTotal - $totalReceivedAmount);
            $currTotal = ($totalReceivedAmount + $receivedAmount);

            if (($currentDue <= $receivedAmount) || ($currTotal > $grandTotal)){
                $receivedAmount = $currentDue;
            }
            else{
                $currentDue = ($grandTotal - $currTotal);
            }
        }
        else{
            $currentDue = ($grandTotal - $receivedAmount);
        }*/

        if ($currentDue <= MAX_INVOICE_DISCOUNT_AMOUNT){
            $paidStatus = 1;
        }

        $invoicePayment['invoiceId'] = $invoiceId;
        $invoicePayment['receivedAmount'] = $receivedAmount;
        $invoicePayment['totalReceivedAmount'] = $currTotalRecAmount;
        $invoicePayment['currentDue'] = $currentDue;
        $invoicePayment['paidStatus'] = $paidStatus;
        $invoicePayment['paymentMethodId'] = $paymentMethodId;
        $invoicePayment['notes'] = $notes;
        $invoicePayment['receivedDate'] = $receivedDate;

        $oSalesInvoicePayment  = new SalesInvoicePayment();
        $oSalesInvoicePayment->setInfo($invoicePayment);
        $status = $oSalesInvoicePayment->add();

        if ($paidStatus === 1 && $status !== false){
            SalesInvoice::changePaidStatus($paidStatus, $invoiceId);
        }

        if ($status > 0){
            $status = true;
        }
    }
    
    $invoicePayment["status"] = $status;
    $invoicePayment["errorMsg"] = $errorMsg;
    echo json_encode($invoicePayment);
    exit;
}

$a_TemplateData['allSalesInvoice'] = $oSalesInvoice->getAll($searchData);

$priceMarginSettingData['showForm'] = $showForm;
$a_TemplateData['searchData'] = $searchData;

$a_TemplateData['allPaymentMethod'] = PaymentMethod::getNames();
$a_TemplateData['allUnit'] = MeasuringUnit::getNames();
$a_TemplateData['thead'] = array(array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                 array("name"=>"Number", "class"=>null, "orderable"=>true),
                                 array("name"=>"Date", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Paid Status", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Due Date", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Billed Total", "class"=>"columTextRight", "orderable"=>true),
                                 array("name"=>"Return Quantity", "class"=>"columTextRight", "orderable"=>true),
                                 array("name"=>"Invoice Total", "class"=>"columTextRight", "orderable"=>true),
                                 array("name"=>"Received Amount", "class"=>"columTextRight", "orderable"=>true),
                                 array("name"=>"Amount Due", "class"=>"columTextRight", "orderable"=>true),
                                 array("name"=>"Notes", "class"=>"null", "orderable"=>true),
                                 array("name"=>"Action", "class"=>"columTextRight", "orderable"=>false));