<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $name = trim($_POST['name']);
  $id = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

   $status = Project::isNameExist($name, $id);
  
  if($status) {
    // Project name is registered on another account
    $response = array('valid' => false, 'message' => 'This name already used.');
  } else {
    // Project name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  $startIndex = (int)trim($_POST['start']);
  $oProject = new Project();
  $i = $startIndex+1;
  $data = $oProject->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->branchName .", "
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
        
        $tableRow[$i] .=  $details->progressName ."</span>, ";
        
        
        $tableRow[$i] .=  $details->startedDate .", "
                       . $details->completedDate .", "
                       . $details->addedDate .", ";
        
                 
       $tableRow[$i] .= $details->notes .", "
                    . '<a class="btn btn-success btn-small"  href="' . Security::actionUrl("projectdetails", array("projectId"=>$details->id)) . '">
                                                   <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                   View
                                               </a>
                                               <a class="btn btn-info btn-small"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>EDIT)) . '">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>DELETE)) . '">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                                   
                                               <a class="btn btn-info btn-addAdvance btn-small"  href="' . Security::actionUrl("advances", array("projectId"=>$details->id, 'do'=>SHOW_ADD_FORM)) . '">
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Advance
                                               </a>
                                                   
                                               <a class="btn btn-info btn-addStages btn-small" data-toggle="tooltip" data-original-title="Stages." href="' . Security::actionUrl("stages", array("projectId"=>$details->id, 'do'=>SHOW_ADD_FORM)) . '>
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Stage
                                               </a>
                                               <a class="btn btn-info btn-addStages btn-small" data-toggle="tooltip" data-original-title="Expenses." href="' . Security::actionUrl("expenses", array("projectId"=>$details->id, 'do'=>SHOW_ADD_FORM)) . '">
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