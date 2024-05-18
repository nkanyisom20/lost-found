<?php
  include 'connect.php';
  $student_no = $_POST["student_no"];
  if(empty($student_no)){
    echo "<span style='color:red'> Please enter Student No.</span>";
    echo "<script>$('#submit_login').prop('disabled',true);</script>";
    }
  elseif(!ctype_digit($student_no)){
    echo "<span style='color:red'> Enter Only Numbers as Student No.</span>";
    echo "<script>$('#submit_login').prop('disabled',true);</script>";
    }
  elseif(strlen($student_no) < 9){
    echo "<span style='color:red'> Enter 9 Numbers as Student No.</span>";
    echo "<script>$('#submit_login').prop('disabled',true);</script>";
    }
  else
    {
    $sql_select = mysqli_query($connect,"SELECT student_no FROM student_reg  WHERE student_no = '$student_no' AND verified = 'Yes' AND removed ='No';");
    $sql_select_num = mysqli_num_rows($sql_select);
    if($sql_select_num > 0)
      {
        echo "<span style='color:green'> Student No.".$student_no." is valid, now enter password.</span>";
        echo "<script>$('#submit_login').prop('disabled',false);</script>";
      }
      else
        {
          $sql_select = mysqli_query($connect,"SELECT student_no FROM student_reg  WHERE student_no = '$student_no' AND verified = 'No' AND removed ='No';");
          $sql_select_num = mysqli_num_rows($sql_select);
          if($sql_select_num > 0)
          {
            echo "<span style='color:red'> Student No.".$student_no." has not yet verified.</span>";
            echo "<script>$('#submit_login').prop('disabled',true);</script>";
          }
          else
            {
              $sql_select = mysqli_query($connect,"SELECT student_no FROM student_reg  WHERE student_no = '$student_no' AND verified = 'Yes' AND removed ='Yes';");
              $sql_select_num = mysqli_num_rows($sql_select);
              if($sql_select_num > 0)
              {
                echo "<span style='color:red'> Student No.".$student_no." has been removed after verified.</span>";
                echo "<script>$('#submit_login').prop('disabled',true);</script>";
              }
              else
                {
                  $sql_select = mysqli_query($connect,"SELECT student_no FROM student_reg  WHERE student_no = '$student_no' AND verified = 'No' AND removed ='Yes';");
                  $sql_select_num = mysqli_num_rows($sql_select);
                  if($sql_select_num > 0)
                  {
                    echo "<span style='color:red'> Student No.".$student_no." has been removed before verified.</span>";
                    echo "<script>$('#submit_login').prop('disabled',true);</script>";
                  }
        else
          {
            echo "<span style='color:red'> Student No.".$student_no." does not exist, Please try again.</span>";
            echo "<script>$('#submit_login').prop('disabled',true);</script>";
          }
        }
      }
    }
  }
?>
