<?php
  include 'connect.php';
?>
<?php
if(isset($_POST['submit_register'])) {
$student_no = htmlspecialchars($_POST['student_no']);
$fullnames = ucwords( htmlspecialchars($_POST['fullnames']));
$surname = ucfirst( htmlspecialchars($_POST['surname']));
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
$gender = $_POST['gender'];

//Checking if the Student No is not already existing in the system.
$result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
if($row = mysqli_fetch_array($result) ){
  header("location: ../index.php");
  echo "<br>";
  echo "The Student Number already exists to the system";
  }
else
  {

  $sql = "INSERT INTO student_reg(student_no, fullnames, surname, password, date_of_birth, gender)
                          VALUES ('$student_no', '$fullnames', '$surname', '$password', '$date_of_birth', '$gender')";
  $connect->query($sql);

  $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
  if($row = mysqli_fetch_array($result)){
    $stu_reg_id = $row['stu_reg_id'];
    $stu_reg_id = $stu_reg_id;
    $sql = "INSERT INTO student_inf(stu_reg_id) VALUES ('$stu_reg_id')";
    $connect->query($sql);
  }
    header("location: ../index.php");
    echo "<br>";
    echo "You have successfully registered";
  }
}
?>
