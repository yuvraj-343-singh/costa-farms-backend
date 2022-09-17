<?php

$mysqli = new mysqli("103.212.121.106:3306","farms","@8xy3a0D7","admin_farms");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>