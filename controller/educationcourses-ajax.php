<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $name = trim($_POST['name']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = EducationCourse::isNameExist($name, $userId);
  
  if($status) {
    // EducationCourse name is registered on another account
    $response = array('valid' => false, 'message' => 'This payment term already exist.');
  } else {
    // EducationCourse name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  
  $startIndex = (int)trim($_POST['start']);
  $oEducationCourse = new EducationCourse();
  $i = $startIndex+1;
  $data = $oEducationCourse->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->name .", ";
        
        
        if ($details->status == ACTIVE){
            $tableRow[$i] .= '<span class="label-default label label-success">' 
                            . $dataStatus[$details->status] 
                            . '</span>,';
        }
        else if ($details->status == INACTIVE){
            $tableRow[$i] .= '<span class="label-default label">'
                            . $dataStatus[$details->status]
                            . '</span>,';
        }
         else{   
             $tableRow[$i] .= '<span class="label-default label label-danger">'
                           . $a_TemplateData['status'][0]
                           . '</span>,';
        }
        
                 
       $tableRow[$i] .= $details->notes .", "
                    . '<a class="btn btn-info btn-small"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>EDIT)) . '">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>DELETE)) . '">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
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