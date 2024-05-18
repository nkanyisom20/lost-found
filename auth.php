<?php
session_start();
if(!isset($_SESSION["student_no"])){
    header("Location: index.php");
    exit();
}
?>
