<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['receiptNo']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $receiptNo = trim($_POST['receiptNo']);
  $id = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = Payment::isReceiptNoExist($receiptNo, $id);
  
  if($status) {
    // Payment name is registered on another account
    $response = array('valid' => false, 'message' => 'This receipt number already exist.');
  } else {
    // Payment name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  
  $startIndex = (int)trim($_POST['start']);
  $oPayment = new Payment();
  $i = $startIndex+1;
  $data = $oPayment->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->employeeName .", "
                        . $details->amount .", ";
        
        if ($details->salaryMonth && $details->salaryMonth != "0000-00")
        {
            $tableRow[$i] .= $details->salaryMonth .", ";
        }
        else{
            $tableRow[$i] .= " , ";
        }
        
        if ((int)$details->isItSalary === 1){
            $tableRow[$i] .= "Salary, ";
        }
        else{
           $tableRow[$i] .= $details->paymentType . ", ";
        }
        
        $tableRow[$i] .= $details->paymentMethod .", "
                       . $details->paymentTerm . ","
                       . $details->totalHours . ","
                ;
        
        if ($details->salaryDateStartF && $details->salaryDateStartF != "0000-00-00"){
            $tableRow[$i] .= $details->salaryDateStartF .", ";
        }
        else{
            $tableRow[$i] .= ", ";
        }
        
        if ($details->salaryDateEndF && $details->salaryDateEndF != "0000-00-00"){
            $tableRow[$i] .= $details->salaryDateEndF .", ";
        }
        else{
            $tableRow[$i] .= ", ";
        }
        
        $tableRow[$i] .= $details->receiptNo .", "
                       . $details->paymentDateF . ","
                       . $details->notes . ","
                ;
        
        $tableRow[$i] .= '<a class="btn btn-info btn-small"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>EDIT)) . '">
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