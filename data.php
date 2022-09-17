<?php
header('Content-Type: application/json; charset=utf-8');

require_once("./db.php");

if(isset($_GET['method']) && $_GET['method'] == 'getData') {
    $json = file_get_contents('php://input');

// Converts it into a PHP object
    $data = json_decode($json);
    print_r($data);die;
}

if(isset($_GET['MFGFCY_0'])) {
    $MFGFCY_0 = mysqli_real_escape_string($mysqli, $_GET['MFGFCY_0']);
    if ($MFGFCY_0) {
        $sql = "SELECT DISTINCT Grouping FROM farms WHERE MFGFCY_0 = '$MFGFCY_0'";
        $sqlAll = "SELECT * FROM farms WHERE MFGFCY_0 = '$MFGFCY_0'";
        $result = mysqli_query($mysqli, $sql);
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        $response['options'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        echo json_encode($response); die;
    }
}

if(isset($_GET['MFGFCY_0']) && isset($_GET['grouping'])) {
    $Grouping = mysqli_real_escape_string($mysqli, $_GET['grouping']);
    $MFGFCY_0 = mysqli_real_escape_string($mysqli, $_GET['MFGFCY_0']);
    if ($Grouping) {
        $sql = "SELECT DISTINCT FRCSTRDAT_0  FROM farms WHERE Grouping = '$Grouping'";
        $sqlAll = "SELECT * FROM  FROM farms WHERE Grouping = '$Grouping' && MFGFCY_0 ='$MFGFCY_0'";
        $result = mysqli_query($mysqli, $sql);
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        $response['options'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        echo json_encode($response); die;
    }
}

if(isset($_GET['MFGFCY_0']) &&  isset($_GET['grouping']) && isset($_GET['workCentre'])) {
    $Grouping = mysqli_real_escape_string($mysqli, $_GET['grouping']);
    $workCentre = mysqli_real_escape_string($mysqli, $_GET['workCentre']);
    if ($Grouping) {
        $sql = "SELECT DISTINCT workcentre  FROM farms WHERE Grouping = '$Grouping'";
        $sqlAll = "SELECT * FROM  FROM farms WHERE Grouping = '$Grouping' && workCentre ='$workCentre'";
        $result = mysqli_query($mysqli, $sql);
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        $response['options'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        echo json_encode($response); die;
    }
}


if(isset($_GET['MFGFCY_0']) && isset($_GET['grouping'])  && isset($_GET['workCentre']) && isset($_GET['FRCSTRDAT_0'])) {
    $Grouping = mysqli_real_escape_string($mysqli, $_GET['grouping']);
    $FRCSTRDAT_0 = mysqli_real_escape_string($mysqli, $_GET['FRCSTRDAT_0']);
    $workCentre = mysqli_real_escape_string($mysqli, $_GET['workCentre']);
    if ($Grouping) {
        $sqlAll = "SELECT * FROM  FROM farms WHERE Grouping = '$Grouping' && workCentre ='$workCentre' && FRCSTRDAT_0 = '$FRCSTRDAT_0'";
        $result = mysqli_query($mysqli, $sql);
        $resultAll = mysqli_query($mysqli, $sqlAll);
        $response = [];
        $response['data'] = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
        echo json_encode($response); die;
    }
}

?>