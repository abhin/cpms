<?php

$oPriceMarginSetting = new PriceMarginSetting();
$priceMarginTypes = PriceMarginType::getNames();
$oTax = new Tax();
$saveFlag = true;
$showForm = false;
$priceMarginSettingData = $searchData = array();
$priceSettingId = isset($_REQUEST[md5("id")]) ? $_REQUEST[md5("id")] : 0;
$productId = isset($_REQUEST[md5("productId")]) ? $_REQUEST[md5("productId")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_priceSetting']) || (isset($_POST['name']) && isset($_POST['id'])))
{
    $priceMarginSettingData = Security::cleanFormFields($_POST);
    $priceMarginSettingData['productId'] = (isset($priceMarginSettingData['productId']) && ($priceMarginSettingData['productId'] > 0))? $priceMarginSettingData['productId'] : '0';
            
    if ($priceMarginSettingData['productId'] <= 0){
        $errorMessage['name'] = "Select a product";
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        foreach ($priceMarginTypes as $details)
        {
            $settingId = PriceMarginSetting::getPriceMarginSettingsId($details->id, $priceMarginSettingData['productId']);
            
            if ($settingId === false){
                $status = false;
            }
            else{
                $settingData['id'] = $settingId;
                $settingData['productId'] = $priceMarginSettingData['productId'];
                $settingData['priceMarginTypeId'] = $details->id;
                $settingData['margin'] = $priceMarginSettingData[$details->fieldName];
                $settingData['notes'] = $priceMarginSettingData['notes'];
                $oPriceMarginSetting->setInfo($settingData);
                $status = $oPriceMarginSetting->add();
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
            $priceMarginSettingData = $_POST = array();
        }
    }
    else{
        $showForm = true;
    }
}
else if (isset($_POST['search_priceSetting']))
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
        $errorMessage['bulkIds'] = "Please select priceSetting(s) for bulk action";
    }
    
    if ($_POST['bulkAction'] == ""){
        $errorMessage['bulkAction'] = "Please select a bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oPriceMarginSetting->deleteByProdcuct($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($productId > 0 && $do == 1){
    $priceMarginSettingData = $oPriceMarginSetting->getDetails($productId);
    $showForm = true;
}
else if ($productId > 0 && $do == 2){
    $status = $oPriceMarginSetting->deleteByProdcuct($productId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
else if ($do == 500){
    $priceMarginSettingData = array();
    $showForm = true;
}

$a_TemplateData['products'] = Product::getNames(0);
$a_TemplateData['priceMarginTypes'] = $priceMarginTypes;

$DATA_PER_PAGE = (DATA_PER_PAGE * PriceMarginType::getCount());
$a_TemplateData['allPriceMarginSetting'] = $oPriceMarginSetting->getAll($searchData, 0, $DATA_PER_PAGE);

$priceMarginSettingData['showForm'] = $showForm;
$a_TemplateData['priceMarginSettingData'] = $priceMarginSettingData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['DATA_PER_PAGE'] = $DATA_PER_PAGE;

$a_TemplateData['allUnit'] = MeasuringUnit::getNames();
$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                 2=>array("name"=>"Product", "class"=>"null", "orderable"=>true));
$i = count($a_TemplateData['thead']) + 1;
foreach ($a_TemplateData['priceMarginTypes'] as $details)
{
    $a_TemplateData['thead'][$i] = array("name"=>$details->name, "class"=>"columTextRight", "orderable"=>true);
    
    $i++;
}

$a_TemplateData['thead'][count($a_TemplateData['thead']) + 1] = array("name"=>"Notes", "class"=>"null", "orderable"=>true);
$a_TemplateData['thead'][count($a_TemplateData['thead']) + 1] = array("name"=>"Actions", "class"=>"columTextRight", "orderable"=>false);