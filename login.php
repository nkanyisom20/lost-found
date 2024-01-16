<?php
include 'connect.php';
$success=false;
if(isset($_POST['Submit'])) {

  $student_no = $_POST['student_no'];
  $password = $_POST['password'];
  //Checking if the Student No. is existing in the system.
  $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
  if($row = mysqli_fetch_array($result) == false){
    echo "The Student Number ".$student_no." do not exists to the system";
    }
  else
    {
      //Checking if the Student No. is verified in the system.
      $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no AND verified = 0;");
      if($row = mysqli_fetch_array($result) == true){
        echo "The Student Number ".$student_no." exists to the system but not verified";
        }
      else
        {
          //Checking if the Student No. is removed or not in the system.
          $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no AND removed = 1;");
          if($row = mysqli_fetch_array($result) == true){
            echo "The Student Number ".$student_no." have been removed from the system";
            }
          else
            {
              $result = mysqli_query($connect, "SELECT * FROM student_reg WHERE student_no = '$student_no' AND verified = 1 AND removed = 0;");
              while($row = mysqli_fetch_array($result))
              {
              	if(password_verify($password, $row['password'])){
              		$success = true;
              		$student_no = $row['student_no'];
              		$surname = $row['surname'];
              		$fullnames= $row['fullnames'];
              	}
              }
            if ($success == true) {
                session_start();
                $_SESSION['student_no'] = $student_no;
                $student_no = $_SESSION['student_no'];

              	header("location: ../home.php");
              }
            else
              {
                echo "Username/Password is incorrect";
                header("location: ../index.php");
        	    }
            }
          }
      }
  }
?>
