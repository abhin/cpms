<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['username']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $username = trim($_POST['username']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;
  $clientId = isset($_GET[md5('clientId')]) ? $_GET[md5('clientId')] : 0;

  $status = User::isUserNameExist($username, $userId, $clientId);
  
  if($status) {
    // User name is registered on another account
    $response = array('valid' => false, 'message' => 'This username is already registered.');
  } else {
    // User name is available
    $response = array('valid' => true);
  }
}
else if(isset($_POST['email']) && isset($_GET[md5('do')]) && $_GET[md5('do')] == VALIDATE) 
{
  $email = trim($_POST['email']);
  $userId = isset($_GET[md5('id')]) ? $_GET[md5('id')] : 0;
  $clientId = isset($_GET[md5('clientId')]) ? $_GET[md5('clientId')] : 0;

  $status = User::isEmailExist($email, $userId, $clientId);
  
  if($status) {
    // User name is registered on another account
    $response = array('valid' => false, 'message' => 'This email is already registered.');
  } else {
    // User name is available
    $response = array('valid' => true);
  }
}

echo json_encode($response);
exit;