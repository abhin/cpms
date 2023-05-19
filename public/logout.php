<?php

if (isset($_SESSION['userId'])){
User::updateLoggedStatus($_SESSION['userId'], 2);
}

session_destroy();
unset($_SESSION);

header("Location:" . Security::actionUrl("login"));
exit;