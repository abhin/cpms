<?php
session_start();
// Report all PHP errors
error_reporting(-1);
// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('memory_limit','5120M');

$serverRoot = $_SERVER['DOCUMENT_ROOT'] . str_replace("index.php", "", $_SERVER["PHP_SELF"] . "../../");
require_once ($serverRoot . "globals/100_pathinfo.php");
require_once ($serverRoot . "init/init.php");

if (isset($_SESSION[PRODUCT_NAME]['userType']) && $_SESSION[PRODUCT_NAME]['userType'] === SUPER_ADMIN){
    $isSuperAdmin = true;
}

$a_TemplateData['CLIENT_ID'] = CLIENT_ID;
$a_TemplateData['IS_SUPER_ADMIN'] = $isSuperAdmin;
define("IS_SUPER_ADMIN", $isSuperAdmin);

if (isset($_GET[md5('action')]))
{
    if (isset($pages[$_GET[md5('action')]])){
        $actionPage = $pages[$_GET[md5('action')]];
    }
    else{
        $actionPage = 'logout';
    }
}
else {
    $actionPage = $pages[md5(HOME_PAGE)];
}

$activatedDate = $clientDetails->activated_date;
$licenseDays = $clientDetails->license_days;
$expiryDate = date('Y-m-d', strtotime($activatedDate . ' +' . $licenseDays . ' days'));

if(strtotime($expiryDate) < strtotime('now') && User::isValidUser() && $actionPage != 'login' && $actionPage != 'logout'){
    $controller = $template = $pages[md5(HOME_PAGE)];
    $a_TemplateData['expiryMessage'] = "Licensing for this product has expired";
}

$controllerPage = isset($controller) ? $controller : $actionPage;
$templatePage   = isset($template)   ? $template   : $actionPage;

/*echo 'Tpl::' . $templatePage;
echo 'Ctrl::' . $controllerPage;*/

$controllerFilePath = CONTROLLER_FOLDER_PATH . $controllerPage . '.php';
$publicFilePath = PUBLIC_FOLDER_PATH . $controllerPage . '.php';


$actionPage = str_replace("-ajax", "", $actionPage);
if (file_exists($controllerFilePath) && User::isValidUser()){
    require_once($controllerFilePath);
}
else if (file_exists($publicFilePath)){
    require_once($publicFilePath);
}
else{
    require_once(PUBLIC_FOLDER_PATH . "logout.php");
}

$a_TemplateData['errorMessage'] = $errorMessage;
$a_TemplateData['message'] = $message;
$a_TemplateData['SESSION'] = isset($_SESSION[PRODUCT_NAME]) ? $_SESSION[PRODUCT_NAME] : array();

$o_TemplateEngine->assign('a_TemplateData', $a_TemplateData);
$o_TemplateEngine->display($templatePage. ".tpl");