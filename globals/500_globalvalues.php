<?php
$globalValues['dataStatus'] = array(UNKNOWN=>"Unknown",ACTIVE=>"Active", INACTIVE=>'Inactive', DELETED=>'Delete');


/**
 * Define global template variable
 */
foreach ($globalValues as $name=>$value){
    $$name = $value;
    $a_TemplateData[$name] = $value;
}
