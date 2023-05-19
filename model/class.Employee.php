<?php

class Employee
{
    private $id;
    private $clientId;
    private $branchId;
    private $name;
    private $lastName;
    private $address;
    private $email;
    private $phone;
    private $alternatePhone;
    private $fatherName;
    private $motherName;
    private $gender;
    private $maritalStatus;
    private $photoLink;
    private $status;
    private $notes;
    private $addedDate;
    private $db;
    private static $DB = DEFAULT_DBO_NAME;


    public function __construct()
    {
        $this->set("db", $GLOBALS[DEFAULT_DBO_NAME]);
        $this->set("clientId", CLIENT_ID);
    }
    
    //----------------------------------------------------------------------------------------------
	public function set($propertyName, $value)
	{
	  if (property_exists($this, $propertyName))
	  {
	      $this->$propertyName = $value;
	  }
	}

    //----------------------------------------------------------------------------------------------
	public function get($propertyName)
	{
	    if (property_exists($this, $propertyName))
	    {
	        return $this->$propertyName;
	    }
	}
    
    //----------------------------------------------------------------------------------------------
    public function setInfo(array $employeeData)
    {
        $this->set("id", $employeeData['id']);
        $this->set("branchId", $employeeData['branchId']);
        $this->set("name", $employeeData['name']);
        $this->set("address", $employeeData['address']);
        $this->set("email", $employeeData['email']);
        $this->set("phone", $employeeData['phone']);
        $this->set("alternatePhone", $employeeData['alternatePhone']);
        $this->set("fatherName", $employeeData['fatherName']);
        $this->set("motherName", $employeeData['motherName']);
        $this->set("gender", $employeeData['gender']);
        $this->set("maritalStatus", $employeeData['maritalStatus']);
        $this->set("photoLink", $employeeData['photoLink']);
        $this->set("status", $employeeData['status']);
        $this->set("notes", $employeeData['notes']);
        $this->set("addedDate", "utc_timestamp()");
    }
    
    //----------------------------------------------------------------------------------------------
    public function add()
    {
        $status = array();
        $oMysqli = $this->db->connectToDb();
        $sql = "";
        $maxId = 0;
        
        if ($this->id > 0){
            $sql = "UPDATE hrm_employees SET branch_id = ?, name = ?, "
                 . "address = ?, email = ?, phone = ?, alternate_phone = ?, "
                 . " father_name = ?, mother_name = ?, gender=?, marital_status = ?, "
                 . " photo_link = ?, status = ?, "
                 . "notes = ? WHERE id = ? AND hrm_employees.client_id = ?   ";
            
            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("isssssssiisisii", $this->branchId, $this->name, 
                    $this->address, $this->email, $this->phone, $this->alternatePhone, $this->fatherName, 
                    $this->motherName, $this->gender, $this->maritalStatus, $this->photoLink, $this->status, $this->notes, $this->id, $this->clientId);

            if (!$bind){
                return false;
            }
        }
        else{
            $maxId = $this->db->getMaxId("id", "hrm_employees");
            $this->set('addedDate', date('Y-m-d H:i:s', strtotime("now")));
            
            $sql = "INSERT INTO `hrm_employees`(`id`, `client_id`, `branch_id`, `name`, `address`, "
                 . " `email`, `phone`, `alternate_phone`, `father_name`, `mother_name`, `gender`, `marital_status`, `photo_link`, "
                 . " `status`, `notes`, `added_date`) "
                 . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $oMysqli->prepare($sql);
            if (!$stmt){
                return false;
            }

            $bind = $stmt->bind_param("iiisssssssiisiss", $maxId, $this->clientId, $this->branchId, $this->name, 
                    $this->address, $this->email, $this->phone, $this->alternatePhone, 
                    $this->fatherName, $this->motherName, $this->gender, $this->maritalStatus, $this->photoLink, $this->status, $this->notes, $this->addedDate);

            if (!$bind){
                return false;
            }
        }
        
        $excute = $stmt->execute();
            
        if (!$excute){
            return false;
        }
        
        if ($this->id > 0){
            $status['id'] =  $this->get('id');
            $status['status'] = UPDATE;
        }
        else if ($oMysqli->affected_rows > 0){
            $this->set("id", $maxId);
            $status['status'] = INSERT;
            $status['id'] = $this->get('id');
        }
        else{
            $status['status'] = false;
        }
        
        if ($status !== false && $this->photoLink != ""){
            Employee::updateImagePath($this->photoLink, $this->id);
        }
        
        return $status;
    }
    
    public static function isNameExist($pName, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM hrm_employees WHERE name = '"  . $pName . "' "
             . " AND hrm_employees.client_id = " . CLIENT_ID;

        if ($pId > 0){
            $sql .= " AND id != " . $pId . "";
        }

        $result = $DB->query($sql);

        if (!$result->num_rows){
           return false; 
        }

        $row = $result->fetch_assoc();

        if ($row['id'] > 0){
            return true;
        }
        
        return false;
    }
    
    public static function isEmailExist($pEmail, $pId=0)
    {
        $DB = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM hrm_employees WHERE email = '"  . $pEmail . "' "
             . " AND hrm_employees.client_id = " . CLIENT_ID;

        if ($pId > 0){
            $sql .= " AND id != " . $pId . "";
        }

        $result = $DB->query($sql);

        if (!$result->num_rows){
           return false; 
        }

        $row = $result->fetch_assoc();

        if ($row['id'] > 0){
            return true;
        }
        
        return false;
    }
    
    public function getAll(array $searchData=array(), $startIndex=0, $limit=DATA_PER_PAGE)
    {
        $hrm_employees = array();
        $oMysqli = $this->db->connectToDb();
        $searchSql = $sql = "";
        
        $sql = "SELECT hrm_employees.`id`, hrm_employees.`client_id` AS clientId, hrm_employees.`branch_id` AS branchId, "
             . " hrm_employees.`name`, hrm_employees.`address`, hrm_employees.`email`, "
             . " hrm_employees.`phone`, hrm_employees.`alternate_phone` AS alternatePhone, hrm_employees.`father_name` AS fatherName, "
             . " hrm_employees.`mother_name` AS motherName, gender, marital_status AS maritalStatus, hrm_employees.`photo_link` AS photoLink, hrm_employees.`status`, hrm_employees.`notes`, "
             . " DATE_FORMAT(hrm_employees.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate, "
             . " company_branches.name AS branchName "
             . " FROM hrm_employees "
             . " LEFT JOIN company_branches ON company_branches.id =  hrm_employees.branch_id AND company_branches.client_id = " . CLIENT_ID
             . " WHERE hrm_employees.client_id = " . CLIENT_ID;
        
        if (isset($searchData['branchId']) && trim($searchData['branchId']) != ""){
            $searchSql .= " hrm_employees.`branch_id` = '" . trim($searchData['branchId']) . "' OR ";
        }
        
        if (isset($searchData['name']) && trim($searchData['name']) != ""){
            $searchSql .= " hrm_employees.name LIKE '%" . trim($searchData['name']) . "%' OR ";
        }
        
        if (isset($searchData['address']) && trim($searchData['address']) != ""){
            $searchSql .= " hrm_employees.address LIKE '%" . trim($searchData['address']) . "%' OR ";
        }
        
        if (isset($searchData['email']) && trim($searchData['email']) != ""){
            $searchSql .= " hrm_employees.email LIKE '%" . trim($searchData['email']) . "%' OR ";
        }
        
        if (isset($searchData['phone']) && trim($searchData['phone']) != ""){
            $searchSql .= " hrm_employees.phone LIKE '%" . trim($searchData['phone']) . "%' OR ";
        }
        
        if (isset($searchData['alternatePhone']) && trim($searchData['alternatePhone']) != ""){
            $searchSql .= " hrm_employees.alternate_phone LIKE '%" . trim($searchData['alternatePhone']) . "%' OR ";
        }
        
        if (isset($searchData['fatherName']) && trim($searchData['fatherName']) != ""){
            $searchSql .= " hrm_employees.father_name LIKE '%" . trim($searchData['fatherName']) . "%' OR ";
        }
        
        if (isset($searchData['motherName']) && trim($searchData['motherName']) != ""){
            $searchSql .= " hrm_employees.mother_name LIKE '%" . trim($searchData['motherName']) . "%' OR ";
        }
        
        if (isset($searchData['gender']) && trim($searchData['gender']) != ""){
            $searchSql .= " hrm_employees.gender = '" . trim($searchData['gender']) . "' OR ";
        }
        
        if (isset($searchData['maritalStatus']) && trim($searchData['maritalStatus']) != ""){
            $searchSql .= " hrm_employees.marital_status = '" . trim($searchData['maritalStatus']) . "' OR ";
        }
        
        if (isset($searchData['status']) && trim($searchData['status']) > 0){
            $searchSql .= " hrm_employees.status = '" . trim($searchData['status']) . "' OR ";
        }
        
        if (isset($searchData['notes']) && trim($searchData['notes']) != ""){
            $searchSql .= " hrm_employees.notes LIKE '%" . trim($searchData['notes']) . "%'";
        }
        
        if ($searchSql){
            $sql .= " AND (" . trim($searchSql, "OR ") . ") ";
        }
        
        $sql .= " ORDER BY hrm_employees.added_date DESC  LIMIT " . $limit ." OFFSET " . $startIndex;
        
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
            return false;
        }

        while($row = $result->fetch_object()){
            $hrm_employees[] = $row;
        }
        
        return $hrm_employees;
    }
    
    public function delete($ids)
    {
        $aPhotoPath = $this->getPhotoPath($pIds);
        $oMysqli = $this->db->connectToDb();
        
        $sql = "DELETE FROM hrm_employees WHERE id IN (" . $ids . ")  AND hrm_employees.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$oMysqli->affected_rows){
            return false;
        }
        
        foreach ($aPhotoPath as $path){
            unlink(CLIENT_ROOT . $path);
        }
        
        return true;
    }
    
    public static function getNames($pStatus=ACTIVE)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        $names = array();
        
        $sql = "SELECT id, name FROM hrm_employees WHERE hrm_employees.client_id = " . CLIENT_ID;
        
        if ($pStatus > 0){
            $sql .= " AND status = " . $pStatus;
        }
        
        $sql .= " ORDER BY name ASC";
            
        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return $names; 
        }

        while($row = $result->fetch_object()){
            $names[] = $row;
        }
        
        return $names;
    }
    
    public static function getCount($pStatus=0, $isNewProjects=false)
    {
        $oMysqli = $GLOBALS[DEFAULT_DBO_NAME]->connectToDb();
        
        $sql = "SELECT id FROM hrm_employees WHERE hrm_employees.client_id = " . CLIENT_ID;
        
        if ($isNewProjects == true){
            $sql .= " AND added_date BETWEEN '" . General::convertDate(date('Y-m-d', strtotime("-15 days"))) . "' "
                  . " AND '" . General::convertDate(date('Y-m-d', strtotime("today"))) . "'";
        }
        
        if ($pStatus > 0){
            $sql .= " AND status = " . $pStatus;
        }
        
        $result = $oMysqli->query($sql);

        if (!$result){
           return false; 
        }
        
        return $result->num_rows;
    }
    
    public function getDetails($pId)
    {
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT hrm_employees.`id`, hrm_employees.`client_id` AS clientId, hrm_employees.`branch_id` AS branchId, "
             . " hrm_employees.`name`, hrm_employees.`address`, hrm_employees.`email`, "
             . " hrm_employees.`phone`, hrm_employees.`alternate_phone` AS alternatePhone, hrm_employees.`father_name` AS fatherName, "
             . " hrm_employees.`mother_name` AS motherName, hrm_employees.gender, hrm_employees.marital_status AS maritalStatus, "
             . " hrm_employees.`photo_link` AS photoLink, hrm_employees.`status`, hrm_employees.`notes`, "
             . " DATE_FORMAT(hrm_employees.added_date, '" . MYSQL_DATE_FORMAT . "') AS addedDate,"
             . " hrm_employee_details.`salary_amount` AS salaryAmount, hrm_employee_details.`payment_term_id` AS paymentTermId, "
             . " hrm_employee_details.`department_id` AS departmentId, hrm_employee_details.`designation_id` AS designationId, "
             . " hrm_employee_details.`employment_type_id` AS employmentTypeId, hrm_employee_details.`qualification_ids` As qualificationIds, "
             . " hrm_employee_details.`join_date` AS joinDate, hrm_employee_details.`releave_date` AS releaveDate, "
             . " DATE_FORMAT(hrm_employee_details.`join_date`, '" . MYSQL_DATE_FORMAT . "') AS joinDateFormatted, "
             . " DATE_FORMAT(hrm_employee_details.`releave_date`, '" . MYSQL_DATE_FORMAT . "') AS releaveDateFormatted,"
             . " payment_terms.`name` AS paymentTermName, departments.`name` AS departmentName, designations.`name` AS designationName, "
             . " employment_types.`name` AS employmentTypeName"
             . " FROM hrm_employees "
             . " LEFT JOIN hrm_employee_details ON hrm_employee_details.employee_id = hrm_employees.id AND hrm_employee_details.client_id = " . CLIENT_ID
             . " LEFT JOIN payment_terms ON hrm_employee_details.payment_term_id = payment_terms.id AND payment_terms.client_id = " . CLIENT_ID
             . " LEFT JOIN departments ON hrm_employee_details.department_id = departments.id AND departments.client_id = " . CLIENT_ID
             . " LEFT JOIN designations ON hrm_employee_details.designation_id = designations.id AND designations.client_id = " . CLIENT_ID
             . " LEFT JOIN employment_types ON hrm_employee_details.employment_type_id = employment_types.id AND employment_types.client_id = " . CLIENT_ID
             . " WHERE hrm_employees.id = "  . $pId . " AND hrm_employees.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        $row = $result->fetch_assoc();
        
        $oEducationCourse = new EducationCourse();
        $row['qualificationNames'] = implode(", ", $oEducationCourse->getCourseNames($row['qualificationIds']));
        $row['qualificationIds'] = explode(",", $row['qualificationIds']);

        return $row;
    }
    
    public static function exportAsExcel($fileName, array $data, array $skipFeilds=array())
    {
        echo '<pre>';
        var_dump((array) $data[0]);
        exit;
        $fileName =  $fileName .  "-". date('Ymd-H-i-s') . ".xls";
            $heading = array( "First Name","Last Name","User Type","user Status","Email","Country","State","City","Company","Region","Department","Supervisor","Division","Discipline","License","State of Licensure","Statebar","Statebar Number","title","Phone Number","Zipcode","Reg: On","Reg: Duration","Reg: End date","Is Tutor","Course Regs:");
            $index   =array('firstname','lastname','usertypename','userstatus','email','country','state','city','company','region','department','supervisor','division','discipline','license','stateoflicensure','statebar','statebarnumber','title','phonenumber','zipcode','registereddate','registrationduration','registrationenddate','istutor','totalregistrations');
    
    $excelData =  '<html>
                    <body>
                        <table border="1" width="100%" cellpadding="0" cellspacing="0"  >
                            <tr bgcolor="#26aaff" ><td align="left" colspan="9">
                                <h2 style="color:#FFFFF">User Report</h2></td>
                            </tr>
                            <tr bgcolor="#dbeaf9">';
     //BUILD CSV CONTENT
    foreach ($heading as $name){
        $tableHead .= '<th>'. $name . '</th>';
    }
    
    $excelData .= $tableHead . '</tr>';
    
    //BUILD CSV ROWS
    foreach($userReport as $key=>$row)
    {
        $bgColor = (($key%2) == 0) ? '#efefef' : '#fff';
        $excelData .= '<tr bgcolor="' . $bgColor . '">';
        foreach ($index as $fieldName)
        {
            $align = (($fieldName=='totalregistrations')||($fieldName=='country')) ? 'center' : 'left';
            
            if ($fieldName == 'istutor'){
                
                $status = ($row->$fieldName == 0) ? "No" : "Yes";
                $excelData .= '<td align="' . $align . '" width="200">' . $status  . '</td>';
                continue;
            }
            else if ($fieldName == 'userstatus'){
                
                switch($row->$fieldName)
                {
                 case 1:
                     $status = "active";
                 break;
                 
                 case 2:
                     $status = "inacive and pending";
                 break;
             
                 case 3:
                     $status = "inactive but not pending";
                 break;
                 
                 case 4:
                     $status = "deleted";
                 break;
             
                 case 5:
                     $status = " not logged yet";
                 break;
                }
                
                $excelData .= '<td align="' . $align .'" width="200">' . $status . '</td>';
                continue;
            }
            $excelData .= '<td align="' . $align .'" width="200">'.$row->$fieldName.'</td>';
        }
        
        $excelData .= "</tr>";
    }

   //OUPUT HEADERS
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=$fileName");
    
    //OUTPUT CSV CONTENT
    echo($excelData); 
    }
    
    public static function uploadImage($imageData)
    {
        $uploadFilePath = EMPLOYEE_PHOTO_FOLDER_PATH . basename($imageData["photoLink"]["name"]);
        
        // Check  directory already exists
        if (!file_exists(EMPLOYEE_PHOTO_FOLDER_PATH)) {
            mkdir(EMPLOYEE_PHOTO_FOLDER_PATH);
        }

        // Check if file already exists
        if (file_exists($uploadFilePath)) {
            unlink($uploadFilePath);
        }

        if (move_uploaded_file($imageData["photoLink"]["tmp_name"], $uploadFilePath)) {
            return true;
        } 
        
        return false;
    }
    
    public function updateImagePath($imageName, $id)
    {
        $oMysqli = $this->db->connectToDb();
        $oldFile = EMPLOYEE_PHOTO_FOLDER_PATH . $imageName;
        $newFilePath = EMPLOYEE_PHOTO_FOLDER_PATH . md5($id). "." . pathinfo(basename($imageName),PATHINFO_EXTENSION);;
        $renameStatus = rename($oldFile, $newFilePath);
        
        if (!$renameStatus){
            return false;
        }
        
        $newFileName = "./" . EMPLOYEE_PHOTO_FOLDER . md5($id). "." . pathinfo(basename($imageName),PATHINFO_EXTENSION);;
        $this->set("photoLink", $newFileName);
        $this->set("id", $id);
        
        $sql = "UPDATE hrm_employees SET photo_link = ?  WHERE id = ? AND hrm_employees.client_id = ?";

        $stmt = $oMysqli->prepare($sql);
        
        if (!$stmt){
            return false;
        }

        $bind = $stmt->bind_param("sii", $this->photoLink, $this->id, $this->clientId);

        if (!$bind){
            return false;
        }
        
        $excute = $stmt->execute();
            
        if (!$excute){
            return false;
        }
        
        return true;
    }
    
    public function getPhotoPath($pIds)
    {
        $path = array();
        $oMysqli = $this->db->connectToDb();
        
        $sql = "SELECT  `photo_link` AS photoLink"
             . " FROM hrm_employees WHERE id IN ( "  . $pIds . ") AND hrm_employees.client_id = " . CLIENT_ID;

        $result = $oMysqli->query($sql);

        if (!$result || !$result->num_rows){
           return false; 
        }

        while($row = $result->fetch_object()){
            $path[] = $row;
        }
        
        return $path;
    }
}