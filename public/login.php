<?php 

if (User::isValidUser() === true)
{
    header("Location:" .  Security::actionUrl(HOME_PAGE));
    exit;
}
else if (isset($_POST["login"]))
{
    $username = filter_input(INPUT_POST, 'username');
    $password = trim($_POST['password']);
    
    if ($username == "" || $password == ""){
        $message["error"] = "Invalid login credentials!!";
    }
    else{
        $isDoLogin = User::login($username, $password);
        if ($isDoLogin === true){
            unset($_POST["login"]);
            unset($_POST);
            header("Location:" .  Security::actionUrl(HOME_PAGE));
            exit;
        }
        else{
            $message["error"] = "Invalid login credentials!!";
        }
    }
}