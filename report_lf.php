<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];
  $surname = $_SESSION['surname'];
  $fullnames = $_SESSION['fullnames'];
?>
<?php
  $message = '';
  if(isset($_POST['submit_reporting'])) {
    $student_no = htmlspecialchars($_POST['student_no']);
    $type_of_doc = htmlspecialchars($_POST['type_of_doc']);
    $location = htmlspecialchars($_POST['location']);

    $result = mysqli_query($connect,"SELECT * FROM student_reg WHERE student_no = $student_no;");
      if($row = mysqli_fetch_array($result)==false){
        $message = "The Student Number ".$student_no." do not exists in our system";
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
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Nkanyiso Consulting Pty Ltd</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Online scrips for css, jquery and js -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <!-- Localhost scrips for css, jquery and js -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <script src="assets/js/jquery-1.11.1.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script>
        function checkstudent_no_for_reporting(va) {
          $.ajax({
            type: "POST",
            url: "include_lf/stu_no_for_reporting.php",
            data:'student_no='+va,
            success: function(data){
              $("#student_no_for_reporting").html(data);
              }
            });
          }
      </script>
      <style media="screen">
      /* Set black background color, white text and some padding of a footer*/
      footer {
        background-color: black;
        color: white;
        padding: 15px;
      }
      .responsive_pics{
        width: 100%;
        height: auto;
      }
      </style>
  </head>
  <body>
    <div class="container">

      <hr/>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Brand</a> -->
            <div class="navbar-header">
              <a class="navbar-brand" href="#"><img src="assets/images/logos.png" alt="logo"></a>
            </div>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li>
                <a href="home.php"><i class="glyphicon glyphicon-home"></i> Home</a>
              </li>
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="manage_users.php"><i class="glyphicon glyphicon-wrench"></i> Manage Users</a>
                <?php } ?>
              </li>
              <li class="active">
                  <a href="report_lf.php"><i class="glyphicon glyphicon-inbox"></i> Report_L&F</a>
              </li>
              <li>
                <?php if ($role == 'Student') { ?>
                  <a href="manage_lf.php"><i class="glyphicon glyphicon-folder-open"></i> View_L&F</a>
                <?php } ?>
              </li>
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="manage_lf.php"><i class="glyphicon glyphicon-folder-open"></i> Manage_L&F</a>
                <?php } ?>
              </li>
              <li>
                <?php if ($role == 'Student') { ?>
                  <a href="contact.php"><i class="glyphicon glyphicon-envelope"></i> Contact Us</a>
                <?php } ?>
              </li>
              <li>
                <?php if ($role == 'Admin') { ?>
                  <a href="messages.php"><i class="glyphicon glyphicon-comment"></i> Messages</a>
                <?php } ?>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" style="color: lightblue" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="badge badge-light"> <i class="glyphicon glyphicon-user "></i><?php echo ucwords($surname.' '.$fullnames); ?> <span class="caret"></span></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="profile.php"><i class="glyphicon glyphicon-cog"></i> Profile</a></li>
                  <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li class="active">Report L&F</li>
      </ol>

      <div class="panel panel-default">
        <div class="panel-heading">
          <?php if ($role == 'Admin') { ?>
          <div class="page-heading"> <i class="glyphicon glyphicon-inbox"></i> Report L&F</div>
          <?php } ?>
          <?php if ($role == 'Student') { ?>
          <div class="page-heading"> <i class="glyphicon glyphicon-inbox"></i> Report L&F</div>
          <?php } ?>
        </div> <!-- /panel-heading -->
          <div class="panel-body">
            <div class="col-md-8">
              <p>Everything is important to us</p>
              <p>Take few munites to return it to owner</p>
              <p>Follow this few ticks </p>
            </div>
            <form class="form-horizontal" action="" method="post">

              <div class="col-md-6">

                <div class="form-group">
                  <label for="password" class="col-sm-4 control-label">Feedback on reporting</label>
                  <div class="col-sm-8">
                  <small><div class="alert alert-success"><?php echo $message; ?></div></small>
                  </div>
                </div>

                <div class="form-group">
                  <label for="student_no" class="col-sm-4 control-label">Enter Student No.</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="student_no" maxlength="9" id="student_no" value="" required/>
                  </div>
                </div> <!--/form-group-->
                <small><span id="student_no_for_reporting"></span></small>

                <div class="form-group">
                  <label for="contact_no" class="col-sm-4 control-label">Type of Doc:</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="type_of_doc" id="type_of_doc">
                      <option value="Identity Document">Identity Document</option>
                      <option value="Student Card">Student Card</option>
                      <option value="Drivers Licence">Drivers Licence</option>
                      <option value="Matric Certificate">Matric Certificate</option>
                      <option value="High Certificate">High Certificate</option>
                      <option value="Edu-Loan Card">Edu-Loan Card</option>
                    </select>
                  </div>
                </div> <!--/form-group-->

                <div class="form-group">
                  <label for="location" class="col-sm-4 control-label">Where to collect:</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="location" id="location">
                      <option value="Admin Building">Admin Building</option>
                      <option value="Main Gate">Main Entrance</option>
                      <option value="Student Centre">Student Centre</option>
                      <option value="Library">Univ Library</option>
                    </select>
                  </div>
                </div> <!--/form-group-->

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <div class="col-sm-12">
        			  	  <img src="assets/images/report.gif" class="responsive_pics" alt="Isithome">
                  </div>
        			  </div> <!--/col-md-6-->

              </div>

              <div class="form-group submitButtonFooter">
                <div class="col-sm-offset-4 col-sm-10">
                  <button type="submit" name="submit_reporting" id="submit_reporting" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                  <button type="reset" class="btn btn-default" onclick="resetReportForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
                </div>
              </div>


            </div>
          </form>
        </div>
        <footer>
          <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
        </footer>
      </div>
    </body>
</html>
<script type="text/javascript" src="assets/src/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/src/jquery-key-restrictions.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $("#student_no").numbersOnly();
  });
</script>
