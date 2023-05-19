<?php

$oStock = new Stock();
$priceMarginTypes = PriceMarginType::getNames();
$oTax = new Tax();
$saveFlag = true;
$showForm = false;
$stockData = $searchData = array();
$stockId = isset($_REQUEST[md5("id")]) ? $_REQUEST[md5("id")] : 0;
$productId = isset($_REQUEST[md5("productId")]) ? $_REQUEST[md5("productId")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_stock']) || (isset($_POST['name']) && isset($_POST['id'])))
{
    $stockData = Security::cleanFormFields($_POST);
    $stockData['productId'] = (isset($stockData['productId']) && ($stockData['productId'] > 0))? $stockData['productId'] : '0';
            
    if ($stockData['productId'] <= 0){
        $errorMessage['name'] = "Select a product";
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        foreach ($priceMarginTypes as $details)
        {
            $settingId = PriceMarginSetting::getPriceMarginSettingsId($details->id, $stockData['productId']);
            
            if ($settingId === false){
                $status = false;
            }
            else{
                $settingData['id'] = $settingId;
                $settingData['productId'] = $stockData['productId'];
                $settingData['priceMarginTypeId'] = $details->id;
                $settingData['rate'] = $stockData[$details->fieldName];
                $settingData['notes'] = $stockData['notes'];
                $oStock->setInfo($settingData);
                $status = $oStock->add();
            }
            
        }
        
        // Added message
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $showForm = true;
        }
        // Updated Message
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $status = true;
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $saveFlag = false;
        }
        
        if ($status === true){
            $stockData = $_POST = array();
        }
    }
    else{
        $showForm = true;
    }
}
else if (isset($_POST['search_stock']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if ($productId > 0 && $do == 1){
    $stockData = $oStock->getDetails($productId);
    $showForm = true;
}
else if ($do == 500){
    $stockData = array();
    $showForm = true;
}

$a_TemplateData['products'] = Product::getNames(0);
$a_TemplateData['priceMarginTypes'] = $priceMarginTypes;

//$DATA_PER_PAGE = (DATA_PER_PAGE * PriceMarginType::getCount());
$a_TemplateData['allStock'] = $oStock->getAll($searchData, 0, DATA_PER_PAGE);

$stockData['showForm'] = $showForm;
$a_TemplateData['stockData'] = $stockData;
$a_TemplateData['searchData'] = $searchData;
//$a_TemplateData['DATA_PER_PAGE'] = $DATA_PER_PAGE;

$a_TemplateData['thead'] = array(0=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                 array("name"=>"Product", "class"=>"columTextLeft", "orderable"=>true),
                                 array("name"=>"Available", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Measured unit", "class"=>"columTextCenter", "orderable"=>true),
                                 array("name"=>"Unit Price", "class"=>"columTextRight", "orderable"=>true),
                                 array("name"=>"Tax", "class"=>"columTextCenter", "orderable"=>true)
                                );
$i = count($a_TemplateData['thead']);
foreach ($a_TemplateData['priceMarginTypes'] as $details)
{
    $a_TemplateData['thead'][$i] = array("name"=>$details->name, "class"=>"columTextRight");
    
    $i++;
}

