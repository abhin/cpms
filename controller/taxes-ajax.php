<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $name = trim($_POST['name']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = Tax::isNameExist($name, $userId);
  
  if($status) {
    // Tax name is registered on another account
    $response = array('valid' => false, 'message' => 'This tax already exist.');
  } else {
    // Tax name is available
    $response = array('valid' => true);
  }
}
// Ajax set default tax
else if (isset($_POST['do']) && $_POST['do']  == "setASDefault" && $_POST['id']  > 0){
    $status = Tax::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}
else if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  $startIndex = (int)trim($_POST['start']);
  $oTax = new Tax();
  $i = $startIndex+1;
  $data = $oTax->getAll($searchData, $startIndex);
  
    foreach ($data as $index=>$details)
    {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details->id . '" />,'
                        .  $i . ", "
                        . $details->name .", "
                        . $details->precentage .", ";
        
        if ($details->isDefault != 1){
            $tableRow[$i] .= '<input type="radio" name="notDefaultTax" value="' . $details->id . '" />, ';
        }else{
            $tableRow[$i] .='<span id="defaultTax_' . $details->id . '">
                                <img src="../../images/icon-ok.png" border="0"/>
                            </span>, ';
        }
        
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