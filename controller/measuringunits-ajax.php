<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $name = trim($_POST['name']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = MeasuringUnit::isNameExist($name, $userId);
  
  if($status) {
    // MeasuringUnit name is registered on another account
    $response = array('valid' => false, 'message' => 'This unit already exist.');
  } else {
    // MeasuringUnit name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['shortCode']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $shortCode = trim($_POST['shortCode']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = MeasuringUnit::isShortCodeExist($shortCode, $userId);
  
  if($status) {
    // MeasuringUnit name is registered on another account
    $response = array('valid' => false, 'message' => 'This short code already exist.');
  } else {
    // MeasuringUnit name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  $startIndex = (int)trim($_POST['start']);
  $oMeasuringUnit = new MeasuringUnit();
  $i = $startIndex+1;
  $data = $oMeasuringUnit->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->name .", "
                        . $details->shortCode .", ";
        
        if ($details->status == 1)
        {
            $tableRow[$i] .=  '<span class="label-default label label-success">
                                Active
                            </span>, ';
        }else if ($details->status == 2){
            $tableRow[$i] .=  '<span class="label-default label">
                                                        Inactive
                                                       </span>, ';
        }else{
            $tableRow[$i] .=  '<span class="label-default label label-danger">
                                                        Unknown
                                                       </span>, ';
        }
        $tableRow[$i] .= str_replace(',', ';', $details->notes) .", "
                    . '<a class="btn btn-info btn-small"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>EDIT)) . '">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>DELETE)) . '">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>';
    
    $i++;
  }
  
    ksort($tableRow);
    echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
    exit;
}

echo json_encode($response);
exit;