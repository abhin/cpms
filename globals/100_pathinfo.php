<?php
/*
 * Directory separator setting
 */
define('DS', '/');

$clientRoot  = $_SERVER['DOCUMENT_ROOT'] . str_replace("index.php", "", $_SERVER["PHP_SELF"]);

$configFolderName       = "config";
$classFolderFolderName  = "model";
$phpLibFolderFolderName = $classFolderFolderName . DS ."lib";
$controllerFolderName   = "controller";
$viewFolderName   	= "view";
$compilerFolderName     = "tpl_c";
$cacheFolderName   	= "tpl_cache";
$pluginFolderName   	= "plugin";
$globalsFolderName  	= "globals";
$settingsFolderName  	= "settings";
$publicFolderName  	= "public";
$employeePhotoFolder    = "employees-photo";

/*
 * Folder path setting
 */
define('SERVER_ROOT', $serverRoot); // Defined in index.php
define('CLASS_FOLDER_PATH', SERVER_ROOT . $classFolderFolderName . DS);
define('PHP_LIB_FOLDER_PATH', SERVER_ROOT . $phpLibFolderFolderName . DS);
define('CONTROLLER_FOLDER_PATH', SERVER_ROOT . $controllerFolderName . DS);
define('VIEW_FOLDER_PATH', SERVER_ROOT . $viewFolderName . DS);
define('PLUGIN_FOLDER_PATH', SERVER_ROOT . $pluginFolderName . DS);
define('GLOBALS_FOLDER_PATH', SERVER_ROOT . $globalsFolderName . DS);
define('SETTINGS_FOLDER_PATH', SERVER_ROOT . $settingsFolderName . DS);
define('PUBLIC_FOLDER_PATH', SERVER_ROOT . $publicFolderName . DS);

/**
 * Template engine folder paths constants
 */
define('CLIENT_ROOT', $clientRoot);
define('CONFIG_PATH', CLIENT_ROOT . $configFolderName . DS);
define('VIEW_COMPILER_FOLDER_PATH', CLIENT_ROOT . $compilerFolderName . DS);
define('VIEW_CACHE_FOLDER_PATH', CLIENT_ROOT . $cacheFolderName . DS);

/**
 * Upload employee photos folder constants
 */
define('EMPLOYEE_PHOTO_FOLDER', $employeePhotoFolder . DS);
define('EMPLOYEE_PHOTO_FOLDER_PATH', CLIENT_ROOT . EMPLOYEE_PHOTO_FOLDER);