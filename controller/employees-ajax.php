<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $name = trim($_POST['name']);
  $id = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

   $status = Employee::isNameExist($name, $id);
  
  if($status) {
    // Employee name is registered on another account
    $response = array('valid' => false, 'message' => 'This name already used.');
  } else {
    // Employee name is available
    $response = array('valid' => true);
  }
}
if(isset($_POST['email']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $email = trim($_POST['email']);
  $id = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

   $status = Employee::isEmailExist($email, $id);
   
  if($status) {
    // Employee name is registered on another account
    $response = array('valid' => false, 'message' => 'This name already used.');
  } else {
    // Employee name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  $startIndex = (int)trim($_POST['start']);
  $oEmployee = new Employee();
  
  $i = $startIndex+1;
  $data = $oEmployee->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        .  $details->branchName . ", "
                        . $details->name .", "
                        . $details->address .", "
                        . $details->email .", "
                        . $details->phone .", "
                        . $details->alternatePhone .", "
                        . $details->fatherName .", "
                        . $details->motherName .", ";
        
        if ($details->gender == MALE){
            $tableRow[$i] .= 'Male,';
        }
        else if ($details->gender == FEMALE){
            $tableRow[$i] .= 'Female,';
        }
         else{   
             $tableRow[$i] .= 'Unknown,';
        }
        
        if ($details->maritalStatus == MARRIED){
            $tableRow[$i] .= 'Married,';
        }
        else if ($details->maritalStatus == UNMARRIED){
            $tableRow[$i] .= 'Unmarried,';
        }
         else{   
             $tableRow[$i] .= 'Unknown,';
        }
        
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
            $tableRow[$i] .=$details->notes .", "
                           . $details->addedDate .", "
                          . '<a class="btn btn-success btn-small" data-toggle="tooltip" data-original-title="View All Employee Details." href="' . Security::actionUrl("employeedetails", array("employeeId"=>$details->id)) . '" target="_blank">
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
                                           ';
    $i++;
  }
  
    ksort($tableRow);
    echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
    exit;
}

echo json_encode($response);
exit;