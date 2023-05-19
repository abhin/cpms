<?php
$contants['UNKNOWN'] = 0;
$contants['VIEW']   = 1;
$contants['EDIT']   = 2;
$contants['DELETE'] = 3;
$contants['PAYMENT'] = 4;
$contants['SALES_RETURN'] = 5;

$contants['LOAD_PROFILE'] = 6;
$contants['DELETE_USER'] = 7;

$contants['SHOW_ADD_FORM'] = 8;
$contants['VALIDATE'] = 9;

$contants['ACTIVE'] = 1;
$contants['INACTIVE'] = 2;
$contants['DELETED'] = 3;
$contants['DO_PAY'] = 4;

$contants['MALE']   = 1;
$contants['FEMALE'] = 2;

$contants['MARRIED']   = 1;
$contants['UNMARRIED'] = 2;

$contants['UPDATE']   = 1;
$contants['INSERT'] = 2;

$contants['ADDITION'] = 1;
$contants['SUBSTRACTION'] = 2;

$contants['YES'] = 1;
$contants['NO'] = 2;

$contants['PAID'] = 1;
$contants['UNPAID'] = 2;

$contants['SUPER_ADMIN'] = 1;
$contants['ADMIN'] = 2;
$contants['MANAGER'] = 3;
$contants['USER'] = 4;

/**
 * Define template constants and  variable
 */
foreach ($contants as $name=>$value){
    define($name, $value);
    $a_TemplateData[$name] = $value;
}

