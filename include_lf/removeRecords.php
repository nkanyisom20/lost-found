<?php
  include 'auth.php';
  include 'connect.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];

	if($_REQUEST['empid']) {
		$sql = "UPDATE student_reg SET removed = 'Yes' WHERE stu_reg_id='".$_REQUEST['empid']."'";
		$resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));
		if($resultset) {
			echo "Record Removed";
		}
	}
?>
