<?php
$oProduct = new Product();
$oSalesInvoice = new SalesInvoice();
$saveFlag = true;
$invoiceData = $searchData = array();
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;
$invoiceId = 0;

if (isset($_POST['add_and_print_invoice']) || isset($_POST['add_invoice']))
{
    $invoiceData = Security::cleanFormFields($_POST);
    
    $invoiceData['buyerId']         = ((int)$invoiceData['buyerId'] > 0 )     ? (int)$invoiceData['buyerId'] : 0;
    $invoiceData['invoiceNumber']   = ($invoiceData['invoiceNumber'] !== "" ) ? $invoiceData['invoiceNumber'] : "";
    $invoiceData['invoiceDate']    = ($invoiceData['invoiceDate'] !== "" )  ? $invoiceData['invoiceDate'] : "";
    $invoiceData['itemCount']       = ((int)$invoiceData['itemCount'] > 0 ) ? (int)$invoiceData['itemCount'] : 0;
    $invoiceData['grandTotalAmount'] = ((float)$invoiceData['grandTotalAmount'] > 0 ) ? (float)$invoiceData['grandTotalAmount'] : 0.00;
    $invoiceData['paidStatus']          = (isset($invoiceData['paidStatus']) && (int)$invoiceData['paidStatus'] === 2 ) ? 2 : 1;
    $invoiceData['paymentTermDuration'] = ((int)$invoiceData['paymentTermDuration'] > 0 ) ? (int)$invoiceData['paymentTermDuration'] : 0;
    $invoiceData['paymentTermId']       = ((int)$invoiceData['paymentTermId'] > 0 )    ? (int)$invoiceData['paymentTermId'] : 0;
    $invoiceData['paymentMethodId']     = ((int)$invoiceData['paymentMethodId'] > 0 )  ? (int)$invoiceData['paymentMethodId'] : 0;
    $invoiceData['receivedAmount']      = ((float)$invoiceData['receivedAmount'] > 0 ) ? (float)$invoiceData['receivedAmount'] : 0;
    
    if (isset($invoiceData['paidStatus']) && ($invoiceData['paidStatus'] === 2) && $invoiceData['buyerId'] <= 0){
        $errorMessage['buyerId'] = "Please select a buyer for unpaid invoice";
        $saveFlag = false;
    }
    
    if ($invoiceData['invoiceNumber']  === ""){
        $errorMessage['invoiceNumber'] = "Invalid invoice number";
        $saveFlag = false;
    }
    else{
        $isExist = SalesInvoice::isInvoiceNumberExist($invoiceData['invoiceNumber']);
        
        if ($isExist){
            $errorMessage['invoiceNumber'] = "Invoice number already exist";
            $saveFlag = false;
        }
    }
    
    if ($invoiceData['invoiceDate'] === ""){
        $errorMessage['invoiceDate'] = "Invalid invoice date";
        $saveFlag = false;
    }
    
    if (count($invoiceData['product']) <= 0){
        $errorMessage['product'] = "Please select product(s)";
        $saveFlag = false;
    }
    
    if ($invoiceData['grandTotalAmount'] <= 0){
        $errorMessage['grandTotalAmount'] = "Invalid grand total";
        $saveFlag = false;
    }
    
    
    if (isset($invoiceData['paidStatus']) && (int)$invoiceData['paidStatus'] === 2 && 
         ((!isset($invoiceData['paymentTermDuration']) || ($invoiceData['paymentTermDuration'] <= 0 ) || 
          !isset($invoiceData['paymentTermId']) || ($invoiceData['paymentTermId'] <= 0)))){
        $errorMessage['paymentMethod'] = "Invalid payment duration or term";
        $saveFlag = false;
    }
    else if ((!isset($invoiceData['paidStatus']) || (isset($invoiceData['paidStatus']) && ($invoiceData['receivedAmount'] > 0))) && ((int)$invoiceData['paymentMethodId'] <= 0))
    {
        $errorMessage['paymentTerm'] = "Invalid payment method";
        $saveFlag = false;
    }
    else if (($invoiceData['receivedAmount'] <=0) && ($invoiceData['paidStatus'] === 2)){
        $invoiceData['paymentMethodId'] = 0;
    }
    
    if (($invoiceData['paidStatus'] !== 2) && $invoiceData['receivedAmount'] <= 0){
        $errorMessage['receivedAmount'] = "Invalid received amount";
        $saveFlag = false;
    }
    else if (($invoiceData['paidStatus'] !== 2) && $invoiceData['receivedAmount'] < ($invoiceData['grandTotalAmount'] - MAX_INVOICE_DISCOUNT_AMOUNT)){
        $errorMessage['receivedAmount'] = "Discount should be less than Rs." . MAX_INVOICE_DISCOUNT_AMOUNT;
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        $oSalesInvoice->setInfo($invoiceData);
        $invoiceId = $oSalesInvoice->add();
        
        $itemAddedId = array();
        $itemSavedFlag = false;
        
        if ($invoiceId > 0)
        {
            $invoiceItemData = array();
            $oSalesInvoiceItem = new SalesInvoiceItem();
            foreach ($invoiceData['product'] as $id) 
            {
                $invoiceItemData["invoiceId"] = $invoiceId;
                $invoiceItemData["productId"] = $id;
                $invoiceItemData["tax"] = $invoiceData['tax'][$id];
                $invoiceItemData["quantity"] = $invoiceData['quantity'][$id];
                $invoiceItemData["measuringUnitId"] = $invoiceData['measuringUnitId'][$id];
                
                $priceMarginTypeId = (int)$invoiceData['priceMarginTypeId'][$id];
                $margin = 0;
                if ($priceMarginTypeId > 0){
                    $margin = $invoiceData['margin'][$id][$priceMarginTypeId];
                }
                $invoiceItemData["margin"] = $margin;
                $invoiceItemData["unitPrice"] = $invoiceData['unitPrice'][$id];
                $oSalesInvoiceItem->setInfo($invoiceItemData);
                $status = $oSalesInvoiceItem->add();
                
                if ($status === false){
                    $itemSavedFlag = false;
                    break;
                }
                else{
                    $itemSavedFlag = true;
                }
            }
            
            if ($itemSavedFlag === true && $invoiceData['receivedAmount'] > 0)
            {
                $invoicePayment['id'] = 0;
                $invoicePayment["invoiceId"] = $invoiceId;
                $invoicePayment['paymentMethodId'] = $invoiceData['paymentMethodId'];
                $invoicePayment['receivedAmount'] = $invoiceData['receivedAmount'];
                $invoicePayment['notes'] = "";
                $invoicePayment['receivedDate'] = $invoiceData['invoiceDate'];
                $oSalesInvoicePayment = new SalesInvoicePayment();
                $oSalesInvoicePayment->setInfo($invoicePayment);
                $itemSavedFlag = $oSalesInvoicePayment->add();
            }
            
            if ($itemSavedFlag === false){
                SalesInvoice::delete($invoiceId);
                $message['error'] = "Unable to Add";
            }
            else{
                header("Location:" . Security::actionUrl("addsales"));
                exit;
            }
        }
        else{
            $message['error'] = "Unable to Add";
        }
    }
}
else if (isset($_POST["cajdPdvtIwsqapxajatcudorpdda"]) && isset($_POST["eQpzlardthoyAldkwcBtmidtcudorp"]) && 
               $_POST["eQpzlardthoyAldkwcBtmidtcudorp"] > 0)
{
    $productRow = array();
    $taxAmount =  $unitPrice = 0.00;
    $pId = $_POST["eQpzlardthoyAldkwcBtmidtcudorp"];
    
    $productDetails = (object)$oProduct->getDetails($pId);
    $priceMarginTypes = PriceMarginSetting::getMargins($pId);
    
    $unitPriceWithTax = (float)$productDetails->unitPrice;
    
    if ($productDetails->taxId <= 0){
        $defaultTax = Tax::getDefaultTax();
        $taxPrecentage = (float)$defaultTax->precentage;
        $taxName = $defaultTax->name . '(' . $taxPrecentage . '%)<br/> (Default)';
    }
    else{
       $taxPrecentage = (float)$productDetails->taxPrecentage ;
       $taxName = $productDetails->taxName . '(' . $taxPrecentage . '%)';
    }
    
    $taxAmount = (($unitPriceWithTax * $taxPrecentage)/100);
    $unitPrice = ($unitPriceWithTax - $taxAmount);
    $mrp = $unitPriceWithTax;
    
    $productRow["slNo"] = ((int)$_POST['dfgYRFVVghhgcfdrfg'] + 1) ;
    
    $productRow["name"] = $productDetails->name 
                      . '<input type="hidden" name="product[]" '
                      . ' id="product_' . $productDetails->id . '"  value="' . $productDetails->id  . '"/>';
    
    $productRow["tax"] = $taxName
                       . ' <input type="hidden" name="tax[' . $pId . ']" id="tax_' . $pId . '"  value="' . $taxPrecentage . '"/>';
    
    $productRow["quantity"] = '<input type="text" name="quantity[' . $pId . ']" id="quantity_' . $pId . '" value="1" style="width:60px;text-align:right"/> ';
    
    $productRow["measurinUnitCode"] = $productDetails->measuringUnitsShortCode
                                    . ' <input type="hidden" name="measuringUnitId[' . $pId . ']" id="measuringUnitId_' . $pId . '"  value="' . $productDetails->measuringUnitId . '"/>';
    
    $margin = "";
    
    if ($priceMarginTypes){
        $priceMarginTypeMenu = ' <select class="chosen-select" id="priceMarginTypeId_' . $pId . '" name="priceMarginTypeId[' . $pId . ']" ><option value="">Select</option>';
        foreach ($priceMarginTypes as $details){
            if ($details->id <= 0){
                $details->id = 0;
                $details->margin = 0;
            }
            $margin .= '<input type="hidden" name="margin[' . $pId . '][' . $details->priceMarginTypeId . ']" id="margin_' . $pId . '_'. $details->priceMarginTypeId . '"  value="' . $details->margin . '"/>';
            $priceMarginTypeMenu .= ' <option value="' . $details->priceMarginTypeId . '">' . $details->priceMarginTypeName . '</option>';
        }
        $priceMarginTypeMenu .= ' </select>';
    }
    else{
       $margin = $priceMarginTypeMenu = "";
    }
    
    $productRow["marginTypes"] = $margin. $priceMarginTypeMenu;
    
    
    $productRow["unitPrice"] = '<span id="unitPrice_' . $pId . '">' . $unitPrice . '</span>'
            . '<input type="hidden" name="unitPrice[' . $pId . ']" id="unitPriceValue_' . $pId . '"  value="' . $unitPriceWithTax . '"/> ';
    
    $productRow["taxAmount"] = '<span id="taxAmount_' . $pId . '">' . $taxAmount . '</span>';
    
    $productRow["mrp"] = '<span id="mrp_' . $pId . '">' . $mrp . '</span> '
                 . '<input type="hidden" name="mrp[' . $pId . ']" id="mrpValue_' . $pId . '"  value="' . $mrp . '"/>';
    
    $productRow["total"] = '<span id="total_' . $pId . '">' . $mrp . '</span> '
                 . '<input type="hidden" name="total[' . $pId . ']" id="totalValue_' . $pId . '"  value="' . $mrp . '"/>';
    
    $tableRow[0] = implode(",", $productRow);

    echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
    exit;
}
else if(isset($_POST['invoiceNumber']) && isset($_GET[md5('isNumberExist')]) && $_GET[md5('isNumberExist')] == 1) 
{
    $invoiceNumber = trim($_POST['invoiceNumber']);

    $status = SalesInvoice::isInvoiceNumberExist($invoiceNumber);
  
    if($status) {
      $response = array('valid' => false, 'message' => 'This invoice number already exist.');
    } else {
      $response = array('valid' => true);
    }
    echo json_encode($response);
    exit;
}


/**
 * New Invoice number 
 */
$a_TemplateData['invoiceNumber'] = INVOICE_NUMBER_PREFIX . SalesInvoice::getInvoiceNumber() . INVOICE_NUMBER_SUFFIX;

$a_TemplateData['invoiceData']   = $invoiceData;
$a_TemplateData['allProducts']   = Product::getNamesWithParent();
$a_TemplateData['allBuyers']     = Buyer::getNames();

$a_TemplateData['allPaymentTerm'] = PaymentTerm::getNames();
$a_TemplateData['allPaymentMethod'] = PaymentMethod::getNames();

$a_TemplateData['thead'] = array(array("name"=>"Slno", "class"=>"columTextCenter", "width"=>"1%"), 
                                 array("name"=>"Product", "class"=>"null", "width"=>"auto"), 
                                 array("name"=>"Tax", "class"=>"columTextRight", "width"=>"auto"), 
                                 array("name"=>"Quantity", "class"=>"columTextRight", "width"=>"1%"), 
                                 array("name"=>"Measuring unit", "class"=>"null", "width"=>"20%"), 
                                 array("name"=>"Price Type", "class"=>"columTextRight", "width"=>"auto"), 
                                 array("name"=>"unit Price", "class"=>"columTextRight", "width"=>"10%"), 
                                 array("name"=>"Tax Amount", "class"=>"columTextRight", "width"=>"auto"), 
                                 array("name"=>"MRP", "class"=>"columTextRight", "width"=>"auto"), 
                                 array("name"=>"Total", "class"=>"columTextRight", "width"=>"auto"), 
                                );
