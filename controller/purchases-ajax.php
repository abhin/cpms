<?php
$tableRow = "";
$data = array();
$response = array(
  'valid' => false,
  'message' => 'Data loading failed.'
);
parse_str($_POST['searchData'], $searchData);
$searchData = Security::cleanFormFields($searchData);
if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  $startIndex = (int)trim($_POST['start']);
  $oPurchase = new Purchase();
  
  $i = $startIndex+1;
  $data = $oPurchase->getAll($searchData, false, $startIndex);
  
  foreach ($data as $index=>$details)
  {
      $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                 .  $i . ", "
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
                    . $details->invoiceNumber .", ";
      
                 if ((int)$details->paidStatus === 1){
                    $tableRow[$i] .= '<span class="label-default label label-success">
                                        Paid
                                       </span>, ';
                 }
                 else if ((int)$details->paidStatus === 2){
                    $tableRow[$i] .= '<span class="label-default label label-danger">
                                                   Unpaid
                                                   </span>, ';
                 }
                 else{
                    $tableRow[$i] .= '<span class="label-default label">
                                                    Unknown
                                                   </span>, ';
                 }
                 
       $tableRow[$i] .=  $details->dueDate .  ", "
                        . $details->purchaseDateFormated .", "
                        . $details->notes .", "
                        . '<a class="btn btn-success btn-small" href="' . Security::actionUrl("purchasedetails", array("id"=>$details->id)) . '" target="_blank">
                               <i class="glyphicon glyphicon-edit icon-white"></i>
                               View
                           </a>
                           <a class="btn btn-info btn-small" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, "do"=>EDIT)) . '">
                               <i class="glyphicon glyphicon-edit icon-white"></i>
                               Edit
                           </a>
                           <a class="btn btn-danger btn-small delete" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, "do"=>DELETE)) . '">
                               <i class="glyphicon glyphicon-trash icon-white"></i>
                               Delete
                           </a>';
    
    $i++;
  }
  
}
ksort($tableRow);
echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
exit;