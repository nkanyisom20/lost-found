<?php
include 'auth.php';
include 'connect.php';

$student_no = $_SESSION['student_no'];
$role = $_SESSION['role'];

if($_REQUEST['empid']) {
	$inf_result = "DELETE FROM  student_inf WHERE stu_reg_id='".$_REQUEST['empid']."'";
	if ($inf_result == true) {
		$reg_result = "DELETE FROM student_reg  WHERE stu_reg_id='".$_REQUEST['empid']."'";
		$result_set = mysqli_query($connect, $reg_result) or die("database error:". mysqli_error($connect));
		if($result_set) {
			echo "Record Deleted";
				}
			}
		else
			{
				echo "Cannot be deleted";
			}

	}
?>
