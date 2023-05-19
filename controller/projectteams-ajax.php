<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);
parse_str($_POST['searchData'], $searchData);
$searchData = Security::cleanFormFields($searchData);
$searchData['projectId'] = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;

if($searchData['projectId']  > 0 && isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  $startIndex = (int)trim($_POST['start']);
  $oExpense = new Expense();
  $i = $startIndex+1;
  $data = $oExpense->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        if (!isset($details->id)){
            continue;
        }
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->stageName .", "
                        . $details->productName .", "
                        . $details->quantity .", "
                        . $details->measuringUnitName ;
        if ($details->shortCode) {
            $tableRow[$i] .= " (" .$details->shortCode . "), ";
        }else{
            $tableRow[$i] .= ", ";
        }
                
        $tableRow[$i] .= $details->unitPrice .", "
                        . $details->amount .", "
                        . $details->purchaseDate .", "
                        . $details->notes .", "
                    . '<a class="btn btn-info btn-small" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'projectId'=>$details->projectId, 'do'=>EDIT)) . '">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, 'projectId'=>$details->projectId, 'do'=>DELETE)) . '">
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