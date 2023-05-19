<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == 1) 
{
  $name = trim($_POST['name']);
  $id = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = Product::isNameExist($name, $id);
  
  if($status) {
    // Product name is registered on another account
    $response = array('valid' => false, 'message' => 'This product already exist.');
  } else {
    // Product name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
    parse_str($_POST['searchData'], $searchData);
$searchData = Security::cleanFormFields($searchData);
  $startIndex = (int)trim($_POST['start']);
  $oProduct = new Product();
  
  $i = $startIndex+1;
  $data = $oProduct->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        if ($details->measuringUnitName != ""){
            $measuringUnit = $details->measuringUnitName . " (" . $details->measuringUnitShortCode . ")";
        }
        else{
            $measuringUnit = "";
        }
        
        if ($details->taxPrecentage > 0){
            $taxPrecentage = $details->taxPrecentage;
        }
        else{
            $taxPrecentage = 0;
        }
        
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->joinedName .", "
                        . $details->parentName .", "
                        . $details->unitPrice .", "
                        . $measuringUnit . ", ";
        
        $tableRow[$i] .= $details->taxName . " (" . $taxPrecentage . " %), ";
      
        if ((int)$details->status === 1){
           $tableRow[$i] .= '<span class="label-default label label-success">
                               Active
                              </span>, ';
        }
        else if ((int)$details->status === 2){
           $tableRow[$i] .= '<span class="label-default label">
                            Inactive
                            </span>, ';
        }
        else{
           $tableRow[$i] .= '<span class="label-default labellabel-danger">
                            Unknown
                           </span>, ';
        }
                 
       $tableRow[$i] .= $details->notes .", "
                    . '<a class="btn btn-info btn-small" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, "do"=>1)) . '">
                           <i class="glyphicon glyphicon-edit icon-white"></i>
                           Edit
                       </a>
                       <a class="btn btn-danger btn-small delete" href="' . Security::actionUrl($actionPage, array("id"=>$details->id, "do"=>2)) . '">
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