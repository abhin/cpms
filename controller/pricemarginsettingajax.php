<?php
$tableRow = "";
$data = array();
$priceTypes = PriceType::getNames();
$response = array(
  'valid' => false,
  'message' => 'Data loading failed.'
);
$DATA_PER_PAGE = (DATA_PER_PAGE * PriceType::getCount());

if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  $startIndex = (int)trim($_POST['start']);
  $oPriceMarginSetting = new PriceMarginSetting();
  
  $i =  ($startIndex / ($DATA_PER_PAGE / PriceType::getCount()));
  
  $data = $oPriceMarginSetting->getAll(array(), $startIndex, $DATA_PER_PAGE);
  
  foreach ($data as $index=>$details)
  {
        $tableRow[$i] =  '<input type="checkbox" name="selectedData[]" value="' . $details['productId'] . '" />,'
                 .  $i . ", "
                 . $details['productName'] . ", ";
      
        foreach ($priceTypes as $ptDetails)
        {
            $tableRow[$i] .= $details[$ptDetails->id] . ',';
        }
        
       $tableRow[$i] .= $details['notes'] .", "
                      . '<a class="btn btn-info btn-small" href="' . Security::actionUrl("pricemarginsettings", array("id"=>$details['productId'], "do"=>1)) . '">
                               <i class="glyphicon glyphicon-edit icon-white"></i>
                               Edit
                           </a>
                           <a class="btn btn-danger btn-small" href="' . Security::actionUrl("pricemarginsettings", array("id"=>$details['productId'], "do"=>2)) . '">
                               <i class="glyphicon glyphicon-trash icon-white"></i>
                               Delete
                           </a>';
    
    $i++;
  }
  
}
ksort($tableRow);
echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
exit;