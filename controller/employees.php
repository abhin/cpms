<?php 
$oEmployee = new Employee();
$oEmploymentDetails = new EmploymentDetails();
$oCompanyBranch = new CompanyBranch();
$oPaymentTerm = new PaymentTerm();
$oDepartment = new Department();
$oDesignation = new Designation();
$oEmploymentType = new EmploymentType();
$oEducationCourse = new EducationCourse();
$saveFlag = true;
$employeeData = $searchData = array();
$employeeId = $employeeData['id'] = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;
$do = isset($_GET[md5("do")]) ? $_GET[md5("do")] : 0;

if (isset($_POST['add_employee']) || isset($_POST['addEmployee']))
{
//    var_dump($_POST);
    $employeeData = Security::cleanFormFields($_POST);
    
//    var_dump($employeeData);
//        exit;
    $employeeData['id']       = $employeeId;
    $employeeData['branchId'] = isset($employeeData["branchId"]) ? $employeeData["branchId"] : 0;
    $employeeData['releaveDate'] = (isset($employeeData["releaveDate"]) && ($employeeData["releaveDate"] != "0000-00-00") > 0) ? $employeeData["releaveDate"] : "NULL";
    $employeeData['status']   = (isset($employeeData["status"]) 
                                && ((int)$employeeData["status"] === ACTIVE || (int)$employeeData["status"] === INACTIVE))  
                                ? $employeeData["status"] : 1;
    $employeeData['photoLink'] = "";
    
    if ($employeeData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = Employee::isNameExist($employeeData['name'], $employeeData['id']);
        
        if ($isExist){
            $errorMessage['name'] = "Name already exist";
            $saveFlag = false;
        }
    }
    
    if ($employeeData['email'] != "")
    {
        $isExist = Employee::isEmailExist($employeeData['email'], $employeeData['id']);
        
        if ($isExist){
            $errorMessage['email'] = "Email already exist";
            $saveFlag = false;
        }
    }
    
    if ($employeeData['phone'] == ""){
        $errorMessage['phone'] = "Phone required";
        $saveFlag = false;
    }
    
    if ($employeeData['alternatePhone'] == ""){
        $errorMessage['alternatePhone'] = "Alertnate phone number required";
        $saveFlag = false;
    }
    
    if ($employeeData['fatherName'] == ""){
        $errorMessage['fatherName'] = "Father's name required";
        $saveFlag = false;
    }
    
    if ($employeeData['motherName'] == ""){
        $errorMessage['motherName'] = "Mother's name required";
        $saveFlag = false;
    }
    
    if ($employeeData['gender'] == ""){
        $errorMessage['gender'] = "Gender required";
        $saveFlag = false;
    }
    
    if (isset($_FILES["photoLink"]["name"]) && $_FILES["photoLink"]["name"] !="")
    {
        // Check file size
        if ($_FILES["photoLink"]["size"] > 2000000) 
        {
            $errorMessage['photoLink'] = "Sorry, your file is too large. Maximum size is 2MB.";
            $saveFlag = false;
        }

        // Allow certain file formats
        $imageFileType = pathinfo(basename($_FILES["photoLink"]["name"]),PATHINFO_EXTENSION);
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $errorMessage['photoLink'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        if (isset($_FILES['photoLink']["name"]) && $_FILES["photoLink"]["name"] !="")
        {
            $employeeData['photoLink'] = $_FILES['photoLink']["name"];
            Employee::uploadImage($_FILES);
        }
        
        $oEmployee->setInfo($employeeData);
        $status = $oEmployee->add();
        
        if ((int)$status['status'] === INSERT){
            $message['success'] = "Added Successfully.";
            $employeeData['showForm'] = true;
        }
        else if ((int)$status['status'] === UPDATE){
            $message['success'] = "Updated Successfully.";
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $employeeData['showForm'] = true;
        }
        
        if ($status['status'] !== false)
        {
            $employmentData["employeeId"] = $employeeData["id"] = $status['id'];
            $employmentData["salaryAmount"] = $employeeData["salaryAmount"];
            $employmentData["paymentTermId"] = $employeeData['paymentTermId'];
            $employmentData['departmentId'] = $employeeData['departmentId'];
            $employmentData["designationId"] = $employeeData['designationId'];
            $employmentData["employmentTypeId"] = $employeeData['employmentTypeId'];
            $employmentData["qualificationIds"] = implode(",", $employeeData['qualificationIds']);
            $employmentData["joinDate"] = $employeeData['joinDate'];
            $employmentData["releaveDate"] = $employeeData['releaveDate'];
            $employmentData["id"] = $oEmploymentDetails->getId($employmentData["employeeId"]);
            $oEmploymentDetails->setInfo($employmentData);
            
            $detailsStatus = $oEmploymentDetails->add();
            
            if ($detailsStatus !== false){
                $employeeData = $_POST = array();
            }
            else{
                $message['error'] = "Failed to add the details.";
                $employeeData['showForm'] = true;
            }
        }
    }
    else{
        $employeeData['showForm'] = true;
    }
}
else if (isset($_POST['search_employee']) || isset($_POST['export_action']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['do_bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = $_POST["selectedData"];
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select employee(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == DELETE)
    {
        $status = $oEmployee->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
else if ($employeeId > 0 & $do == EDIT){
    $employeeData = $oEmployee->getDetails($employeeId);
    $employeeData['showForm'] = true;
}
else if ($employeeId > 0 & $do == DELETE){
    $status = $oEmployee->delete($employeeId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}
$a_TemplateData['employeeData'] = $employeeData;
$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['allEmployees'] = $oEmployee->getAll($searchData);
$a_TemplateData['allBranches'] = $oCompanyBranch->getNames(ACTIVE);
$a_TemplateData['allpaymentTerms'] = $oPaymentTerm->getNames(ACTIVE);
$a_TemplateData['allDepartment'] = $oDepartment->getNames(ACTIVE);
$a_TemplateData['allDesignation'] = $oDesignation->getNames(ACTIVE);
$a_TemplateData['allEmploymentTypes'] = $oEmploymentType->getNames(ACTIVE);
$a_TemplateData['allEducationCourse'] = $oEducationCourse->getNames(ACTIVE);

if (isset($_POST['export_action']))
{
//    Employee::exportAsExcel("users", $a_TemplateData['allEmployees']);
}

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Branch Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Address", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false"), 
                                 array("name"=>"Email", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                 array("name"=>"Phone", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"),
                                 array("name"=>"Alernate Phone", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"8%"),
                                 array("name"=>"Father Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false", "width"=>"8%"),
                                 array("name"=>"Mother Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false", "width"=>"8%"),
                                 array("name"=>"Gender", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"5%"),
                                 array("name"=>"Marital Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"5%"),
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"5%"),
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"false"),
                                 array("name"=>"Added date", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"false", "width"=>"8%"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"8%")
                                );