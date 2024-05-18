<?php
  include 'auth.php';
  include 'connect.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];

	if($_REQUEST['empid']) {
    $password = '$2y$10$.YqXCJkI.dAp0yZrH9KSCeW8VVsKZwTuNa29XQDKOUQsUfj2WFFze';
		$sql = "UPDATE student_reg SET password = '$password' WHERE stu_reg_id='".$_REQUEST['empid']."'";
		$resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));
		if($resultset) {
			echo "Record Reset";
		}
	}
?>
