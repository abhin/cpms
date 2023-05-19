<?php

$oEmployee = new Employee();
$oPayment = new Payment();

$employeeId = isset($_REQUEST[md5("employeeId")]) && (int)$_REQUEST[md5("employeeId")] > 0 ? (int)$_REQUEST[md5("employeeId")] : 0;
$a_TemplateData['employeeId'] = $employeeId;

$a_TemplateData['employeeData'] = (object)$oEmployee->getDetails($employeeId);

$employeeDetails = array("employeeId"=>$employeeId);
$a_TemplateData['allPayments'] = $oPayment->getAll($employeeDetails,false, false, false);

//Debug::varDump($a_TemplateData['allPayment']);
//exit;

$a_TemplateData['thead']['payment'] = array(array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Employee Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Amount", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Salary Month", "class"=>"columTextRight", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Payment Type", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Payment Method", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Payment Term", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"8%"), 
                                 array("name"=>"Total Hours", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Salary Date Start", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"12%"), 
                                 array("name"=>"Salary Date End", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"12%"), 
                                 array("name"=>"Receipt No", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Payment/ Receipt Date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true",  "width"=>"12%"),
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false"),
                                );
