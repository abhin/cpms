<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['email'])) 
{
  $email = trim($_POST['email']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;
  $clientId = isset($_GET[md5('client_id')]) ? $_GET[md5('client_id')] : 0;
  
  $status = User::isEmailExist($email, $userId, $clientId);

  if($status) {
    // Email is registered on another account
    $response = array('valid' => false, 'message' => 'This email is already registered.');
  } else {
    // Email is available
    $response = array('valid' => true);
  }
}

echo json_encode($response);
exit;