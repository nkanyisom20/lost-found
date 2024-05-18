<?php
  include 'auth.php';
  include 'connect.php';
  $student_no = $_SESSION['student_no'];
 ?>
<?php
  if(isset($_POST['submit_reporting'])) {
    $student_no = htmlspecialchars($_POST['student_no']);
    $type_of_doc = htmlspecialchars($_POST['type_of_doc']);
    $location = htmlspecialchars($_POST['location']);

    $result = mysqli_query($connect,"SELECT * FROM student_reg WHERE student_no = $student_no;");
      if($row = mysqli_fetch_array($result)==false){
        $message = "The Student Number ".$student_no." do not exists in our system";
        header("location: ../report_lf.php");
      }
      else
      {
    $result = mysqli_query($connect,"SELECT * FROM student_reg WHERE student_no = $student_no;");
      if($row = mysqli_fetch_array($result)){
        $fullnames = $row['fullnames'];
        $surname = $row['surname'];
        $surname = $row['surname'];
      }
      $reported_by = $_SESSION['student_no'];
      $sql = "INSERT INTO lost_found(student_no, fullnames, surname, type_of_doc, location, reported_by)
                          VALUES ('$student_no', '$fullnames', '$surname', '$type_of_doc', '$location', '$reported_by')";
      $connect->query($sql);

      $message = "The student number ".$student_no." successful reported";
      header("location: ../report_lf.php");
    }
  }
?>
