<?php

$response = array(
  'valid' => false,
  'message' => 'Validation failed.'
);

if(isset($_POST['loadDataAjax']) && isset($_POST['start'])) 
{
  parse_str($_POST['searchData'], $searchData);
  $searchData = Security::cleanFormFields($searchData);
  $searchData['projectId'] = isset($_REQUEST[md5("projectId")]) ? $_REQUEST[md5("projectId")] : 0;
  
  $startIndex = (int)trim($_POST['start']);
  $oLabourWage = new LabourWage();
  $i = $startIndex+1;
  $data = $oLabourWage->getAll($searchData, $startIndex);
  
    foreach ($data as $labourDate=>$wageData)
    {
        if  ($labourDate == 'totalWages'){
           continue;
        }
        $tableRow[$i] =  '<input type="checkbox" name="selectedData_' . $labourDate . '" value="' . $labourDate . '" />, '
                            . 'Labour Date - ' . $labourDate . ", "
                            . " , "
                            . " , "
                            . " , "
                            . " , "
                            . " , "
                            . " , "
                            . " , "
                            . " , "
                            . " , "
                            . " , "
                            . " , ";
        foreach ($wageData as $index=>$details)
        {
            $x = $i+1;
            $tableRow[$x] =  '<input type="checkbox" id="'. $labourDate . "-" . $i . '" name="selectedData[]" value="' . $details->id . '" />,'
//                            .  $i . ", "
                            . $details->supervisorName .", "
                            . $details->labourTypeName .", ";

            if ($details->labourDateF && $details->labourDateF != "0000-00")
            {
                $tableRow[$x] .= $details->labourDateF .", ";
            }
            else{
                $tableRow[$x] .= " , ";
            }

            $tableRow[$x] .= $details->name .", "
                            . $details->totalHours .", "
                            . $details->amount .", "
                            . $details->receiptNo .", ";

            if ($details->paymentDateF && $details->paymentDateF != "0000-00-00"){
                $tableRow[$x] .= $details->paymentDateF .", ";
            }
            else{
                $tableRow[$x] .= ", ";
            }

            if ((int)$details->paidStatus === PAID){
                $tableRow[$x] .= '<span class="label-default label label-success">
                                    Paid
                                </span>, ';
            }
            else if ((int)$details->paidStatus === UNPAID){
                $tableRow[$x] .= '<span class="label-default label">
                                        Unpaid
                                    </span>, ';
            }
            else {
                $tableRow[$x] .= '<span class="label-default label label-danger">
                                    Unknown
                                </span>, ';
            }

            $tableRow[$x] .= $details->notes . ",";

            $tableRow[$x] .= '<a class="btn btn-info btn-small"  href="' . Security::actionUrl($actionPage, array('projectId'=>$details->projectId, "id"=>$details->id, 'do'=>EDIT)) . '">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-small delete"  href="' . Security::actionUrl($actionPage, array('projectId'=>$details->projectId, "id"=>$details->id, 'do'=>DELETE)) . '">
                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                Delete
                            </a>
                            <a class="btn btn-success btn-small" href="' . Security::actionUrl("paylabourwages", array("projectId"=>$details->projectId, "wageId"=>$details->id, "do"=>SHOW_ADD_FORM)) . '">
                                <i class="fa fa-inr"></i>
                                Pay Wage
                            </a>';

            $i++;
        }
  }
  
    ksort($tableRow);
    echo json_encode($tableRow, JSON_FORCE_OBJECT, 500000);
    exit;
}

echo json_encode($response);
exit;