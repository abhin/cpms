<?php 
$oLabourWage = new LabourWage();

$saveFlag = true;
$payWageData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;

$projectId  = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
$wageId  = isset($_GET[md5("wageId")]) ? (int)$_GET[md5("wageId")] : 0;
$totalWages  = isset($_GET[md5("totalWages")]) ? (int)$_GET[md5("totalWages")] : 0;

if (isset($_POST["selectedData"]) && $_POST["selectedData"]){
    $wageId = implode(", ", $_POST["selectedData"]);
}

if (!$wageId){
    header("Location:" . Security::actionUrl("labourwages", array("projectId"=>$projectId)));
    exit;
}

if (isset($_POST['addLabourWage']) || isset($_POST['add_labourWage']))
{
    $payWageData = Security::cleanFormFields($_POST);
    $payWageData['projectId'] = $projectId;
    $payWageData['paidStatus'] = 1;
    $payWageData['supervisorId'] = $payWageData['labourTypeId'] = $payWageData['totalHours'] = $payWageData['amount'] = 0;
    $payWageData['labourDate'] = $payWageData['name'] = $payWageData['notes'] = $payWageData['salaryMonth'] = "";
    
    if ($payWageData['paymentDate'] == ""){
        $errorMessage['paymentDate'] = "Invalid payment date";
        $saveFlag = false;
    }
    if ($payWageData['receiptNo'] == ""){
        $errorMessage['receiptNo'] = "Invalid receipt no";
        $saveFlag = false;
    }

    if ($saveFlag === true)
    {
        foreach ($payWageData['selectedData'] as $id)
        {
            $payWageData['id'] = $id;
            $oLabourWage->setInfo($payWageData);
            $status = $oLabourWage->doPay();
        }

        $wageId = implode(", ", $payWageData['selectedData']);
        if ($status === true){
//            $message['success'] = "Payment made Successfully.";
//            $payWageData = $_POST = array();
//            $payWageData['showForm'] = false;
            header("Location:" . Security::actionUrl("labourwages", array("projectId"=>$projectId, "paidMessage"=>1)));
            exit;
        }
        else{
            $payWageData['salaryMonth'] = date("Y-m", strtotime($payWageData["salaryMonth"]));
            $message['error'] = "Unable to make the payment.";
            $payWageData['showForm'] = true;
        }
    }
}

$payWageData['showForm'] = true;
$payWageData['projectId'] = $searchData['projectId'] = $projectId;
$searchData['id'] = $wageId;
$searchData['paidStatus'] = UNPAID;
$a_TemplateData['allLabourWages'] = $oLabourWage->getAll($searchData,0,0,false);
$a_TemplateData['payWageData'] = $payWageData;

$a_TemplateData['thead'] = array(
//    array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"12%"), 
                1=>array("name"=>"Supervisor Name", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true"), 
                array("name"=>"Labour Type", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"12%"), 
                array("name"=>"Labour Date", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"12%"), 
                array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true"), 
                array("name"=>"Total Hours", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true", "width"=>"8%"), 
                array("name"=>"Amount", "class"=>"columTextRight", "orderable"=>"false", "visible"=>"true", "width"=>"12%"), 
                array("name"=>"Paid Status", "class"=>"columTextCenter", "orderable"=>"false", "visible"=>"true"),
               );

//Debug::varDump($a_TemplateData['allLabourWages']);
//exit;