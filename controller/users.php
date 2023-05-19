<?php 
$oUser = new User();
$saveFlag = true;
$userData = $searchData = array();
$userId = 0;
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;

if (IS_SUPER_ADMIN === true){
    $clientId = isset($_REQUEST[md5("clientId")]) ? trim($_REQUEST[md5("clientId")]) : 0;
    $userId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : $userId;
}
else{
    $clientId = CLIENT_ID;
    $userId = isset($_SESSION[PRODUCT_NAME]["userId"]) ? $_SESSION[PRODUCT_NAME]["userId"] : $userId;
    $do = LOAD_PROFILE;
}

if (isset($_POST['add_user']) || (isset($_POST['username']) && isset($_POST["id"])))
{
    $userData = Security::cleanFormFields($_POST);
    $userData['id'] = isset($userData['id']) ? $userData['id'] : $userId;
    $userData['clientId'] = $clientId;
    if (IS_SUPER_ADMIN === true)
    {
        $userData['userType'] = isset($userData['userType']) ? $userData['userType'] : 0;
        $userData['status']   = isset($userData['status'])   ? $userData['status'] : 1;
        $userData['password'] = isset($userData['password']) ? $userData['password'] : '';
        
        if ($userData['clientId'] <= 0){
            $errorMessage['name'] = "Invalid clientId";
            $saveFlag = false;
        }
        
        if ($userData['userType'] <= 0){
            $errorMessage['name'] = "Invalid user type";
            $saveFlag = false;
        }
        
        if ($userData['password'] == "" && $userData['id'] <= 0){
            $errorMessage['password'] = "Invalid passsword";
            $saveFlag = false;
        }
        else if ($userData['password'] != "" && (int)$userData['id'] > 0){
            $status = User::updatePassword($userData['password'], $userData['id'], $userData['clientId']);
            
            if (!$status){
                $errorMessage['password'] = "Password reset failed";
            }
        }
    }
    
    if ($userData['username'] == ""){
        $errorMessage['username'] = "Invalid username";
        $saveFlag = false;
    }
    else{
        $isExist = User::isUserNameExist($userData['username'], $userData['id'], $userData['clientId']);

        if ($isExist){
            $errorMessage['username'] = "username already registered";
            $saveFlag = false;
        }
    }
    
    if ($userData['email'] != "")
    {
        $isExist = User::isEmailExist($userData['email'], $userData['id'], $userData['clientId']);

        if ($isExist){
            $errorMessage['email'] = "Email already registered";
            $saveFlag = false;
        }
    }
    
    if ($userData['firstName'] == ""){
        $errorMessage['firstName'] = "First Name required";
        $saveFlag = false;
    }
    
    
    if ($userData['displayName'] == ""){
        $errorMessage['displayName'] = "Display Name required";
        $saveFlag = false;
    }
    
    if ($saveFlag === true)
    {
        $oUser->setInfo($userData);
        $status = $oUser->addUser();
        
        $userId = $oUser->get("id");
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $userData = $_POST = array();
            $userData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $userData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $userData['showForm'] = true;
        }
    }
    else{
        $userData['showForm'] = true;
    }
}
else if (isset($_POST['search_user']))
{
    $searchData = $_POST;
}
else if (isset($_POST['bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = $_POST["selectedData"];
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select user(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oUser->delete($ids, $clientId);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}

if ($userId > 0 & $do === LOAD_PROFILE){
    $userData = $oUser->getDetails($userId, $clientId);
    $userData['showForm'] = true;
    
}
else if ($userId > 0 & $do === DELETE_USER){
    $status = $oUser->delete($userId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

if (IS_SUPER_ADMIN === true){
    $userData['clientId'] = $searchData['clientId'] = $clientId;
}
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['userData'] = $userData;

if (IS_SUPER_ADMIN === true){
    $a_TemplateData['clients'] = Client::getAllClients();
    $a_TemplateData['userTypes'] = UserType::getAllType();
    $a_TemplateData['allUsers'] = $oUser->getAll($searchData,2);
    
    $a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>true, "visible"=>true), 
                                 array("name"=>"client Name", "class"=>"columTextCenter", "orderable"=>true, "visible"=>false), 
                                 array("name"=>"User Type", "class"=>null, "orderable"=>true, "visible"=>true), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>true, "visible"=>true), 
                                 array("name"=>"Username", "class"=>null, "orderable"=>true, "visible"=>true),
                                 array("name"=>"Email", "class"=>null, "orderable"=>true, "visible"=>true),
                                 array("name"=>"Phone Number", "class"=>null, "orderable"=>true, "visible"=>false),
                                 array("name"=>"First Name", "class"=>null, "orderable"=>true, "visible"=>true),
                                 array("name"=>"Last Name", "class"=>null, "orderable"=>true, "visible"=>true),
                                 array("name"=>"Display Name", "class"=>null, "orderable"=>true, "visible"=>true),
                                 array("name"=>"Online Status", "class"=>"columTextCenter", "orderable"=>true, "visible"=>true),
                                 array("name"=>"Last Access", "class"=>null, "orderable"=>true, "visible"=>true),
                                 array("name"=>"Added Date", "class"=>null, "orderable"=>true, "visible"=>false),
                                 array("name"=>"Action", "class"=>null, "orderable"=>false, "visible"=>true),
                                );
}