<?php 
$oPriceMarginType = new PriceMarginType();
$saveFlag = true;
$priceMarginTypeData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$priceMarginTypeId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (!isset($_POST['search_priceMarginType']) && ((isset($_POST['add_priceMarginType']) || (isset($_POST['name']) && isset($_POST["id"])))))
{
    $priceMarginTypeData = Security::cleanFormFields($_POST);
    
    if ($priceMarginTypeData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = PriceMarginType::isNameExist($priceMarginTypeData['name'], $priceMarginTypeData['id']);

        if ($isExist){
            $errorMessage['name'] = "Price margin type already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oPriceMarginType->setInfo($priceMarginTypeData);
        $status = $oPriceMarginType->add();
        
        var_dump($status);
        exit;
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $priceMarginTypeData = $_POST = array();
            $priceMarginTypeData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $priceMarginTypeData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $priceMarginTypeData['showForm'] = true;
        }
    }
    else{
        $priceMarginTypeData['showForm'] = true;
    }
}
else if (isset($_POST['search_priceMarginType']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select priceMarginType(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oPriceMarginType->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
// Ajax set default priceMarginType
else if (isset($_POST['do']) && $_POST['do']  == 3 && $_POST['id']  > 0){
    $status = PriceMarginType::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($priceMarginTypeId > 0 & $do == 1){
    $priceMarginTypeData = $oPriceMarginType->getDetails($priceMarginTypeId);
    $priceMarginTypeData['showForm'] = true;
    
}
else if ($priceMarginTypeId > 0 & $do == 2){
    $status = $oPriceMarginType->delete($priceMarginTypeId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['priceMarginTypeData'] = $priceMarginTypeData;
$a_TemplateData['allPriceMarginTypes'] = $oPriceMarginType->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true), 
                                        array("name"=>"Name", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Status", "class"=>"columTextRight", "orderable"=>true),
                                        array("name"=>"Notes", "class"=>"columTextCenter", "orderable"=>true),
                                        array("name"=>"Action", "class"=>"columTextRight", "orderable"=>false));
