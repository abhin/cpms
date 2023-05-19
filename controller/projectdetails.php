<?php

$oAdvance = new Advance();
$oStage = new Stage();
$oMaterialExpense = new MaterialExpense();
$projectId = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;

$a_TemplateData['projectId'] = $projectId;
$a_TemplateData['projects']  = Project::getNames();

$projectDetails = array("projectId"=>$projectId);
$a_TemplateData['allAdvance'] = $oAdvance->getAll($projectDetails);
$a_TemplateData['allStages'] = $oStage->getAll($projectDetails);
$a_TemplateData['allMaterialExpenses'] = $oMaterialExpense->getAll($projectDetails);
