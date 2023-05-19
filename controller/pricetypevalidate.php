<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == 1) 
{
  $name = trim($_POST['name']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = PriceMarginType::isNameExist($name, $userId);
  
  if($status) {
    // PriceMarginType name is registered on another account
    $response = array('valid' => false, 'message' => 'This account type already exist.');
  } else {
    // PriceMarginType name is available
    $response = array('valid' => true);
  }
}

echo json_encode($response);
exit;