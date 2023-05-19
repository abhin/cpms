<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
    $name = trim($_POST['name']);
    $id = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;
    $projectId = isset($_GET[md5('projectId')]) ? $_GET[md5('projectId')] : 0;

     $status = Stage::isNameExist($projectId, $name, $id);

    if($status) {
      // Stage name is registered on another account
      $response = array('valid' => false, 'message' => 'This name already used.');
    } else {
      // Stage name is available
      $response = array('valid' => true);
    }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  $searchData['projectId'] = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
  
  $startIndex = (int)trim($_POST['start']);
  $oStage = new Stage();
  
  $i = $startIndex+1;
  $data = $oStage->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->name .", ";
        
        
        if ((int)$details->progressId == 2){
           $tableRow[$i] .= '<span class="label-default label label-success">';
        }
        else if ((int)$details->progressId == 3){
           $tableRow[$i] .= '<span class="label-default label" style="background-color:#2FA4E7;">';
        }
        else if ((int)$details->progressId == 4){
           $tableRow[$i] .= '<span class="label-default label  label-warning">';
        }
        else if ((int)$details->progressId == 5){
           $tableRow[$i] .= ' <span class="label-default label label-danger">';
        }
        else{
           $tableRow[$i] .= '<span class="label-default label">';
        }
        
        $tableRow[$i] .= $details->progressName ."</span>, "
                       . $details->startedDate .", "
                       . $details->completedDate .", "
                       . $details->addedDate .", "
                       . $details->notes .", "
                       . '<a class="btn btn-info btn-small"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'projectId'=>$details->projectId, 'do'=>EDIT)) . '">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'projectId'=>$details->projectId, 'do'=>DELETE)) . '">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                               <a class="btn btn-info btn-addStages btn-small"  href="' . Security::actionUrl("expenses", array("projectId"=>$details->projectId, 'stageId'=>$details->id, 'do'=>SHOW_ADD_FORM)) . '">
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Expense
                                               </a>
                                               ';
    
    $i++;
  }
  
    ksort($tableRow);
    echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
    exit;
}

echo json_encode($response);
exit;