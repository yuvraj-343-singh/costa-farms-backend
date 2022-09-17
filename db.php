<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE');
header("Access-Control-Allow-Headers: Content-Type");
$mysqli = new mysqli("localhost","root","","costa_farms");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>