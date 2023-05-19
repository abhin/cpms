<?php
/*
 * Default client settings
 */
foreach (glob(SETTINGS_FOLDER_PATH . "*.php") as $filename) 
{
    $skipfile = explode("/", $filename);
    $skipfile = end($skipfile);
    if ($skipfile == "index.php"){
        continue;
    }
    
    require_once($filename);
}

/*
 * Loading the client specifiic config and setting files from config folder in client-users/foldername
 * client specific setting file will over write the global settings.php file values in settings folder
 */
foreach (glob(CONFIG_PATH . "*.php") as $filename) 
{
    $skipfile = explode("/", $filename);
    $skipfile = end($skipfile);
    if ($skipfile == "index.php"){
        continue;
    }
    
    require_once($filename);
}

/*
 * Loading all globals folder files
 */
foreach (glob(GLOBALS_FOLDER_PATH . "*.php") as $filename) 
{
    $skipfile = explode("/", $filename);
    $skipfile = end($skipfile);
    if ($skipfile == "index.php"){
        continue;
    }
    require_once($filename);
}

/*
 * Database Instantiation 
 */
$go_dataBase = new DataBase(DB_HOST,DB_NAME,DB_USER_NAME,DB_PASSWORD);

/**
 * Creating Action Pages array
 */
foreach (glob(VIEW_FOLDER_PATH. "*.tpl") as $filename) 
{
    $filename = explode("/", $filename);
    $action = rtrim(end($filename), ".tpl");
    $pages[md5($action)] = $action; 
}
foreach (glob(CONTROLLER_FOLDER_PATH. "*.php") as $filename) 
{
    $filename = explode("/", $filename);
    $action = rtrim(end($filename), ".php");
    $pages[md5($action)] = $action; 
}
foreach (glob(PUBLIC_FOLDER_PATH. "*.php") as $filename) 
{
    $filename = explode("/", $filename);
    $action = rtrim(end($filename), ".php");
    $pages[md5($action)] = $action; 
}

/*	
 * Template Engine Instantiation 
 */
$o_TemplateEngine = new TemplateEngine();

/**
 * Define setting constants and template variable
 */
foreach ($settings as $name=>$value){
    define($name, $value);
    $a_TemplateData[$name] = $value;
}

/*
 * Template data array
 */
//$a_TemplateData['page'] = $pages;
$clientDetails = Client::getDetails();

if (!$clientDetails){
    die("Please Contact Administrator");
    exit;
}
else{
    $a_TemplateData['clientDetails'] = $clientDetails;
    $a_TemplateData['clientName'] = $clientDetails->name;
}

$a_TemplateData['formValidChars'] = ',-._:&@()%;` ';
date_default_timezone_set(TIME_ZONE);