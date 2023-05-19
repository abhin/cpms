<?php 
$oEducationCourse = new EducationCourse();
$saveFlag = true;
$educationCourseData = $searchData = array();
$do = isset($_GET[md5("do")]) ? (int)$_GET[md5("do")] : 0;
$taxId = isset($_GET[md5("id")]) ? (int)$_GET[md5("id")] : 0;

if (isset($_POST['add_educationCourse']) || isset($_POST['addEducationCourse']))
{
    $educationCourseData = Security::cleanFormFields($_POST);
    $educationCourseData['status'] = (isset($educationCourseData["status"]) 
                                && ((int)$educationCourseData["status"] === ACTIVE || (int)$educationCourseData["status"] === INACTIVE))  
                                ? $educationCourseData["status"] : 1;
    
    if ($educationCourseData['name'] == ""){
        $errorMessage['name'] = "Name required";
        $saveFlag = false;
    }
    else{
        $isExist = EducationCourse::isNameExist($educationCourseData['name'], $educationCourseData['id']);

        if ($isExist){
            $errorMessage['name'] = "Payment Term already exist";
            $saveFlag = false;
        }
    }
    
    if ($saveFlag === true)
    {
        $oEducationCourse->setInfo($educationCourseData);
        $status = $oEducationCourse->add();
        
        if ($status === true){
            $message['success'] = "Added Successfully.";
            $educationCourseData = $_POST = array();
            $educationCourseData['showForm'] = true;
        }
        else if ($status > 0){
            $message['success'] = "Updated Successfully.";
            $educationCourseData = $_POST = array();
        }
        else{
            $message['error'] = "Unable to Add/Update.";
            $educationCourseData['showForm'] = true;
        }
    }
    else{
        $educationCourseData['showForm'] = true;
    }
}
else if (isset($_POST['search_educationCourse']))
{
    $searchData = Security::cleanFormFields($_POST);
}
else if (isset($_POST['bulk_action']))
{
    $ids = "";
    if (isset($_POST["selectedData"])){
        $a_selecteIds = Security::cleanFormFields($_POST["selectedData"]);
        $ids = implode(", ", $a_selecteIds);
    }
    
    if ($ids == ""){
        $errorMessage['bulkAction'] = "Please select tax(s) for bulk action";
    }
    else if ($_POST['bulkAction'] == 100)
    {
        $status = $oEducationCourse->delete($ids);
        
        if ($status){
            $message['success'] = "Bulk action delete success";
        }
        else{
            $message['error'] = "Failed bulk action delete";
        }
    }
}
// Ajax set default tax
else if (isset($_POST['do']) && $_POST['do']  == 3 && $_POST['id']  > 0){
    $status = EducationCourse::setDefault($_POST['id']);
    
     if ($status === true){
         echo 'true';
     }
     else{
         echo 'false';
     }
     exit(0);
}

if ($taxId > 0 & $do == EDIT){
    $educationCourseData = $oEducationCourse->getDetails($taxId);
    $educationCourseData['showForm'] = true;
    
}
else if ($taxId > 0 & $do == DELETE){
    $status = $oEducationCourse->delete($taxId);
    
    if ($status){
        $message['success'] = "Deleted Successfully";
    }
    else{
        $message['error'] = "Unable to Delete";
    }
}

$a_TemplateData['searchData'] = $searchData;
$a_TemplateData['educationCourseData'] = $educationCourseData;
$a_TemplateData['allEducationCourses'] = $oEducationCourse->getAll($searchData);

$a_TemplateData['thead'] = array(1=>array("name"=>"Slno", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"2%"), 
                                 array("name"=>"Name", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"), 
                                 array("name"=>"Status", "class"=>"columTextCenter", "orderable"=>"true", "visible"=>"true", "width"=>"8%"), 
                                 array("name"=>"Notes", "class"=>"columTextLeft", "orderable"=>"true", "visible"=>"true"),
                                 array("name"=>"Action", "class"=>"columTextLeft", "orderable"=>"false", "visible"=>"true", "width"=>"12%")
                                );
