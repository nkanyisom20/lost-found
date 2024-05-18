<?php
include 'connect.php';
$success=false;
if(isset($_POST['submit_login'])) {

  $student_no = $_POST['student_no'];
  $password = $_POST['password'];
  //Checking if the Student No. is existing in the system.
  $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
  if($row = mysqli_fetch_array($result) == false){
    $message = "The Student Number ".$student_no." do not exists to the system";
    header("location: ../index.php");
    }
  else
    {
      //Checking if the Student No. is verified in the system.
      $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no AND verified = 'No';");
      if($row = mysqli_fetch_array($result) == true){
        $message = "The Student Number ".$student_no." exists to the system but not verified";
        header("location: ../index.php");
        }
      else
        {
          //Checking if the Student No. is removed or not in the system.
          $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no AND removed = 'Yes';");
          if($row = mysqli_fetch_array($result) == true){
            $message = "The Student Number ".$student_no." have been removed from the system";
            header("location: ../index.php");
            }
          else
            {
              $result = mysqli_query($connect, "SELECT * FROM student_reg WHERE student_no = '$student_no' AND role='Admin' AND verified = 'Yes' AND removed = 'No';");
              while($row = mysqli_fetch_array($result))
              {
              	if(password_verify($password, $row['password'])){
              		$success = true;
              		$student_no = $row['student_no'];
              		$surname = $row['surname'];
              		$fullnames= $row['fullnames'];
                  $role= $row['role'];
              	}
              }
            if ($success == true)
            {
                session_start();
                $_SESSION['student_no'] = $student_no;
                $reported_by = $_SESSION['student_no'];

                $_SESSION['role'] = $role;
                $role = $_SESSION['role'];
                $_SESSION['surname'] = $surname;
                $surname = $_SESSION['surname'];
                $_SESSION['fullnames'] = $fullnames;
                $fullnames = $_SESSION['fullnames'];

                header("location: ../home.php");
              }
            else
              {
              $result = mysqli_query($connect, "SELECT * FROM student_reg WHERE student_no = '$student_no' AND role='Student' AND verified = 'Yes' AND removed = 'No';");
              while($row = mysqli_fetch_array($result))
              {
              	if(password_verify($password, $row['password'])){
              		$success = true;
              		$student_no = $row['student_no'];
              		$surname = $row['surname'];
              		$fullnames= $row['fullnames'];
                  $role= $row['role'];
              	}
              }
            if ($success == true)
              {
                session_start();
                $_SESSION['student_no'] = $student_no;
                $reported_by = $_SESSION['student_no'];

                $_SESSION['role'] = $role;
                $role = $_SESSION['role'];
                $_SESSION['surname'] = $surname;
                $surname = $_SESSION['surname'];
                $_SESSION['fullnames'] = $fullnames;
                $fullnames = $_SESSION['fullnames'];

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
    }
?>
