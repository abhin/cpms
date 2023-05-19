<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['accountNumber']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $accountNumber = trim($_POST['accountNumber']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = BankDetails::isAccNumberExist($accountNumber, $userId);
  
  if($status) {
    // Account number is registered on another account
    $response = array('valid' => false, 'message' => 'This account number already exist.');
  } else {
    // Account number is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  $startIndex = (int)trim($_POST['start']);
  $oBankDetails = new BankDetails();
  $i = $startIndex+1;
  $data = $oBankDetails->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->name .", "
                        . $details->bankName . ";" . $details->branchName . "Branch, "
                        . $details->accountNumber .", "
                        . $details->branchCode .", "
                        . $details->ifscCode .", "
                        . str_replace(',', ';', $details->branchAddress) .", ";
        
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
        $tableRow[$i] .= $details->notes .", "
                    . '<a class="btn btn-info btn-small"  href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>EDIT, "isSupplierOrBuyer"=>$details->isSupplierOrBuyer)) . '">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'do'=>DELETE, "isSupplierOrBuyer"=>$details->isSupplierOrBuyer)) . '">
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