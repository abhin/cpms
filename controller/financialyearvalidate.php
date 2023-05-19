<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['name']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == 1) 
{
  $name = trim($_POST['name']);
  $id = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;

  $status = FinancialYear::isNameExist($name, $id);
  
  if($status) {
    // Product name is registered on another account
    $response = array('valid' => false, 'message' => 'This name already exist.');
  } else {
    // Product name is available
    $response = array('valid' => true);
  }
}

echo json_encode($response);
exit;