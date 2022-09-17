<?php
header('Content-Type: application/json; charset=utf-8');
require_once("./db.php");
$MFGFCY_0 = "";
$Grouping = "";
$FRCSTRDAT_0 = [];
$WorkCentre = [] ;

if(isset($_GET['method']) && $_GET['method'] == 'getMFGFCY_0') {
    $sql = "SELECT MFGFCY_0 FROM farms WHERE MFGFCY_0 != '' GROUP BY MFGFCY_0";
    $result = mysqli_query($mysqli, $sql);
    $response = [];
    if($result) {
        $response['options'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    echo json_encode($response);
}
if(isset($_GET['method']) && $_GET['method'] == 'getData') {
    $data = json_decode(file_get_contents('php://input'));
    $MFGFCY_0 = $data->MFGFCY_0;
    $Grouping = $data->grouping;
    $FRCSTRDAT_0 = implode(",", $data->FRCSTRDAT_0);
    $WorkCentre = implode(",", $data->workCentre);
    if(!empty($MFGFCY_0) && !empty($Grouping) && !empty($FRCSTRDAT_0) && !empty($WorkCentre)) {
        $sqlAll = "SELECT * FROM  farms WHERE MFGFCY_0 ='$MFGFCY_0' && Grouping = '$Grouping' && FRCSTRDAT_0 In ('$FRCSTRDAT_0') && Work_Center IN ('$WorkCentre')";
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        if($resultAll) {
            $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        }
        echo json_encode($response); 
    } else if(!empty($MFGFCY_0) && !empty($Grouping) && !empty($FRCSTRDAT_0)) {
        $sql = "SELECT Work_Center  FROM farms WHERE MFGFCY_0 ='$MFGFCY_0' && Grouping = '$Grouping' && FRCSTRDAT_0 IN ('$FRCSTRDAT_0') && Work_Center != '' GROUP BY Work_Center";
        $sqlAll = "SELECT * FROM  farms WHERE MFGFCY_0 ='$MFGFCY_0' && Grouping = '$Grouping' && FRCSTRDAT_0 IN ('$FRCSTRDAT_0')";
        $result = mysqli_query($mysqli, $sql);
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        if($result) {
            $response['options'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        if($resultAll) {
            $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        }
        echo json_encode($response);
    }else if(!empty($MFGFCY_0) && !empty($Grouping)) {
        $sql = "SELECT FRCSTRDAT_0  FROM farms WHERE  MFGFCY_0 ='$MFGFCY_0' && Grouping = '$Grouping' && FRCSTRDAT_0 != '' GROUP BY FRCSTRDAT_0";
        $sqlAll = "SELECT * FROM  farms WHERE  MFGFCY_0 ='$MFGFCY_0' && Grouping = '$Grouping'";
        $result = mysqli_query($mysqli, $sql);
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        if($result) {
            $response['options'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        if($resultAll) {
            $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        }
        echo json_encode($response);
    } else if(!empty($MFGFCY_0)) {
        $sql = "SELECT Grouping FROM farms WHERE MFGFCY_0 = '$MFGFCY_0' && Grouping != '' GROUP BY Grouping";
        $sqlAll = "SELECT * FROM farms WHERE MFGFCY_0 = '$MFGFCY_0'";
        $result = mysqli_query($mysqli, $sql);
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        if($result) {
            $response['options'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        if($resultAll) {
            $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        }
        echo json_encode($response);
    }    
}

if(isset($_GET['method']) && $_GET['method'] == "updateData") {
    $data = json_decode(file_get_contents('php://input'), true);
    foreach ($data as $el){
        $ID = mysqli_real_escape_string($mysqli, $el['id']);
        $Qty = mysqli_real_escape_string($mysqli, $el['Qty']);
        $Location = mysqli_real_escape_string($mysqli, $el['Location']);
        $Start_Time = mysqli_real_escape_string($mysqli, $el['Start_Time']);
        $End_Time = mysqli_real_escape_string($mysqli, $el['End_Time']);
        $Crew_Size = mysqli_real_escape_string($mysqli, $el['Crew_Size']);
        $sql = "UPDATE farms SET Qty = '$Qty', Location = '$Location', Start_Time = '$Start_Time', End_Time = '$End_Time', Crew_Size = '$Crew_Size' WHERE id = $ID";
        $result = mysqli_query($mysqli, $sql);
    }
}

?>