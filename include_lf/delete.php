<?php
  require('connect.php');
  $student_no=$_GET['student_no'];
  $result = mysqli_query($connect,"SELECT * FROM student_reg WHERE student_no = $student_no;");
  if($row = mysqli_fetch_array($result)){
    $stu_reg_id = $row['stu_reg_id'];
    $stu_reg_id = $stu_reg_id;

    $result = mysqli_query($connect,"DELETE FROM student_inf WHERE stu_reg_id = $stu_reg_id;");

    $result = mysqli_query($connect,"DELETE FROM student_reg WHERE student_no = $student_no;");

    header("Location: ../manage_users.php");
    exit();
  }
?>
