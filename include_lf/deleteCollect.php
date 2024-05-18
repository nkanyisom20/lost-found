<?php
include 'auth.php';
include 'connect.php';

$student_no = $_SESSION['student_no'];
$role = $_SESSION['role'];

if($_REQUEST['empid']) {
	$sql = "DELETE FROM  lost_found WHERE stu_lf_id='".$_REQUEST['empid']."'";
	$inf_result = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));
	if ($inf_result)
 		{
		echo "Record Deleted";
		}
	}
?>
