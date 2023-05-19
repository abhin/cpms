<?php

class Export
{
    public static function quickExportAsExcel($fileName, array $data)
    {
        function cleanData(&$str) 
        { 
            // escape tab characters 
             $str = preg_replace("/\t/", "\\t", $str); 
            // escape new lines 
             $str = preg_replace("/\r?\n/", "\\n", $str); 
            // convert 't' and 'f' to boolean values 
             if($str == 't') $str = 'TRUE'; if($str == 'f') $str = 'FALSE'; 

            // force certain number/date formats to be imported as strings 
             if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) { $str = "'$str"; } 

            // escape fields that include double quotes 
             if(strstr($str, '"')){ $str = '"' . str_replace('"', '""', $str) . '"'; }
        }
        // file name for download
        $filename = $fileName .   "-". date('Ymd-H-i-s') . ".xls";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        $flag = false;
        foreach($data as $row) {
          if(!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
          }
          array_walk($row, 'cleanData');
          echo implode("\t", array_values($row)) . "\n";
        }

        exit;
        
    }
    
    public static function exportAsExcel($fileName, array $data, array $skipFeilds)
    {
        
        echo "<pre>";
        var_dump($data);
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
}
