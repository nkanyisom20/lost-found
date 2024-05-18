<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

  include 'include_lf/pagination_msg.php';

  $student_no = $_SESSION['student_no'];
  $role = $_SESSION['role'];
  $surname = $_SESSION['surname'];
  $fullnames = $_SESSION['fullnames'];
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
              <li>
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
              <li class="active">
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
		  <li class="active">Messages</li>
		</ol>

    <div class="panel panel-default">
      <div class="panel-heading">
        <?php if ($role == 'Admin') { ?>
				<div class="page-heading"> <i class="glyphicon glyphicon-envelope"></i> Messages</div>
        <?php } ?>
        <?php if ($role == 'Student') { ?>
				<div class="page-heading"> <i class="glyphicon glyphicon-envelope"></i> Messages</div>
        <?php } ?>
			</div> <!-- /panel-heading -->
      <div class="panel-body">
        <div class="col-md-6">
          <div class="col-sm-12">
            <img src="assets/images/report.WEBP" class="responsive_pics" alt="Isithome">
          </div>
        </div>
        <div class="col-md-6">
            <?php
            if (mysqli_num_rows($results) >= 1) {
              while($row = mysqli_fetch_array($results))
                {
                    $salute = ucwords($row['salute']);
                    $student_no = $row['student_no'];
                    $comment = ucfirst($row['comment']);
                    $comment_at= $row['comment_at'];

                    echo "<u>".$salute."</u>";
                    echo "<br>";
                    echo "<i><b>".$comment."</b></i>";
                    echo "<br>";
                    echo "<small>"."From ".$student_no." @ ".$comment_at."</small>";
                    echo "<br>";
                    echo "********** ********** ********** **********";
                    echo "<br>";
                  }
                }
              else
                {
                  echo "Nothing new have been reported for now";
                }
            ?>
            <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
          </div>
        <br>
      </div>
      </div>
      <footer>
        <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
      </footer>
    </div>
  </body>
</html>
<script src="asset/jquery/jquery-1.12.4.min.js"></script>
<script src="asset/jquery/numericInput.js"></script>
