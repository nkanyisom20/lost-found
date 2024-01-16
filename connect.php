<?php
$servername = "localhost";
$server_user = "root";
$server_pass = "";
$db_name = "report_l_f";
// db connection
$connect = new mysqli($servername, $server_user, $server_pass, $db_name);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
