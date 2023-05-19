<?php
$oPurchase = new Purchase();

$purchaseId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

$purchaseData = $oPurchase->getDetails($purchaseId);

if (!$purchaseData){
    header("Location:" . Security::actionUrl("purchases"));
    exit;
}

$a_TemplateData['purchaseData'] = (object)$purchaseData;