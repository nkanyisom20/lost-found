<?php
  require('connect.php');
  $result = mysqli_query($connect,"SELECT COUNT(`stu_lf_id`) FROM `lost_found` WHERE `collected` = 1;");

  exit();
?>
