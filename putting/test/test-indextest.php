<?php
mysqli_connect("localhost","putting","MW01fPa$$w0rd","putting");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>
