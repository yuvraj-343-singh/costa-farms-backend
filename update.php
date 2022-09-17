<?php
header('Content-Type: application/json; charset=utf-8');

require_once("./db.php");

$data = json_decode(file_get_contents('php://input'), true);
// $MFGNUM_0 = mysqli_real_escape_string($mysqli, $_GET['MFGNUM_0']);
foreach ($data as $el){
    $ID = mysqli_real_escape_string($mysqli, $el['ID']);
    $MFOTRKFLG_0 = mysqli_real_escape_string($mysqli, $el['MFOTRKFLG_0']);
    $TRKFIRST_0 = mysqli_real_escape_string($mysqli, $el['TRKFIRST_0']);
    $sql = "UPDATE data SET MFOTRKFLG_0 = '$MFOTRKFLG_0', TRKFIRST_0 = '$TRKFIRST_0' WHERE ID = $ID";
    $result = mysqli_query($mysqli, $sql);
}
