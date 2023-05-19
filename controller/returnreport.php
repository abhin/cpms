<?php

$oReturnItem = new ReturnItem();
$oSalesInvoice = new SalesInvoice();
$showForm = false;
$searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$searchData['invoiceItemId'] = isset($_GET[md5("invoiceItemId")]) ? (int)$_GET[md5("invoiceItemId")] : 0;

if (isset($_POST['search_data']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
    $startIndex = (int)trim($_POST['start']);
    $oPurchase = new Purchase();

    $i = $startIndex+1;
    $data = $oReturnItem->getAll(array(), $startIndex);
    $tableRow = $returnItemsData = array();
    foreach ($data as $index=>$details)
    {
        $returnItemsData["slno"] =  $i;
        $returnItemsData["invoiceNumber"] = $details->invoiceNumber;
        $returnItemsData["productName"] = $details->productName;

        $returnItemsData["quantity"] =  $details->quantity . $details->measuringUnit;
        $returnItemsData["returnDate"] =  $details->returnDate;
        $returnItemsData["notes"] = $details->notes;
         
        $returnItemsData["action"] = '<a class="btn btn-success btn-small" href="' . Security::actionUrl("returnitemdetails", array("id"=>$details->id, 'do'=>VIEW)) . '" target="_blank">
                                 <i class="glyphicon glyphicon-edit icon-white"></i>
                                 View
                             </a>
                             <a class="btn btn-danger btn-small details-control" href="' . Security::actionUrl("returnitemdetails", array("id"=>$details->id, 'do'=>DELETE)) . '">
                                                    <i class="glyphicon glyphicon-delete icon-white"></i>
                                                    Delete
                                                </a>';

      $i++;
      $tableRow[$i] = implode(", ", $returnItemsData);
    }
    
    ksort($tableRow);
    echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
    exit;
}
else if ($do === DELETE) 
{
    $status = $oReturnItem->deleteReturn($_GET[md5("id")]);
}
$a_TemplateData['allReturnItem'] = $oReturnItem->getAll($searchData);
$a_TemplateData['allInvoices']   = $oSalesInvoice->getAllInvoices();

//echo '<pre>';
//var_dump($a_TemplateData['allReturnItem']);
//exit();

$priceMarginSettingData['showForm'] = $showForm;
$a_TemplateData['searchData'] = $searchData;

$a_TemplateData['allPaymentMethod'] = PaymentMethod::getNames();
$a_TemplateData['thead'] = array(array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                 array("name"=>"Invoice Number", "class"=>null, "orderable"=>true),
                                 array("name"=>"Product Name", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Quantity", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Return Date", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Notes", "class"=>"null", "orderable"=>true),
                                 array("name"=>"Action", "class"=>"columTextRight", "orderable"=>false));