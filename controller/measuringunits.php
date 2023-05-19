<?php 
$oMeasuringUnit = new MeasuringUnit();
$saveFlag = true;
$measuringUnitData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$unitId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (!isset($_POST['search_unit']) && ((isset($_POST['add_unit']) || (isset($_POST['name']) && isset($_POST["id"])))))
{
    $measuringUnitData = Security::cleanFormFields($_POST);
    
    if ($measuringUnitData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = MeasuringUnit::isNameExist($measuringUnitData['name'], $measuringUnitData['id']);

        if ($isExist){
            $errorMessage['name'] = "MeasuringUnit already exist";
            $saveFlag = false;
        }
    }
    
    if ($measuringUnitData['shortCode'] == ""){
        $errorMessage['shortCode'] = "Short Code required";
        $saveFlag = false;
    }
    else{
        $isExist = MeasuringUnit::isShortCodeExist($measuringUnitData['shortCode'], $measuringUnitData['id']);

        if ($isExist){
            $errorMessage['shortCode'] = "Short code already exist";
            $saveFlag = false;
        }
    }
    
    
    if ($saveFlag === true)
    {
        $oMeasuringUnit->setInfo($measuringUnitData);
        $status = $oMeasuringUnit->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $measuringUnitData = $_POST = array();
            $measuringUnitData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $measuringUnitData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $measuringUnitData['showForm'] = true;
        }
    }
    else{
        $measuringUnitData['showForm'] = true;
    }
}
else if (isset($_POST['search_unit']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['do_bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select measuring  unit(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oMeasuringUnit->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}

if ($unitId > 0 & $do == EDIT){
    $measuringUnitData = $oMeasuringUnit->getDetails($unitId);
    $measuringUnitData['showForm'] = true;
    
}
else if ($unitId > 0 & $do == DELETE){
    $status = $oMeasuringUnit->delete($unitId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['measuringUnitData'] = $measuringUnitData;
$a_TemplateData['allUnits'] = $oMeasuringUnit->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"1%"), 
                                        array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Short Code", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"),
                                        array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                        array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                        array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%"));