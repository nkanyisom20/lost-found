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
  if(isset($_POST['submit'])) {
    $salute = strtolower($_POST['salute']);
    $comment = strtolower($_POST['comment']);

    $sql = "INSERT INTO comments (salute, student_no, comment)VALUES ('$salute', '$student_no', '$comment')";
    $connect->query($sql);

    echo "<br>";
    $message = "Comment successfully sent";
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
              <li class="active">
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
  		  <li class="active">Contact Us</li>
  		</ol>

      <div class="panel panel-default">
        <div class="panel-heading">
          <?php if ($role == 'Admin') { ?>
  				<div class="page-heading"> <i class="glyphicon glyphicon-phone"></i> Contact Us</div>
          <?php } ?>
          <?php if ($role == 'Student') { ?>
  				<div class="page-heading"> <i class="glyphicon glyphicon-envelope"></i> Contact Us</div>
          <?php } ?>
  			</div> <!-- /panel-heading -->
        <div class="panel-body">
         <form class="form-horizontal" action="" method="post">
           <div class="col-md-6">
             <div class="form-group">
               <label for="salutation" class="col-sm-3 control-label">Salutation</label>
               <div class="col-sm-8">
                 <input type="text" class="form-control" name="salute" placeholder="Hellow" value="" required>
               </div>
             </div>

             <div class="form-group">
               <label for="comment" class="col-sm-3 control-label">Comments</label>
               <div class="col-sm-8">
                 <textarea name="comment" class="form-control" rows="8" cols="68" placeholder="Hi can I speak to...." maxlength="300"></textarea>
               </div>
             </div>

             <div class="form-group">
               <label for="feedback" class="col-sm-3 control-label">Feedback</label>
               <div class="col-sm-8">
               <small><div class="alert alert-success"><?php echo $message; ?></div></small>
               </div>
             </div>

          </div> <!--/col-md-6-->
          <div class="col-md-6">
            <div class="col-sm-12">
              <img src="assets/images/report.WEBP" class="responsive_pics" alt="Isithome">
            </div>
          </div> <!--/col-md-6-->

             <div class="form-group submitButtonFooter">
               <div class="col-sm-offset-3 col-sm-10">
                 <button type="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Send Message</button>
                 <button type="reset" class="btn btn-default" onclick="resetMessageForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
               </div>
             </div>
         </form>
        </div>
       </div>
       <footer>
         <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
       </footer>
      </div>
    </body>
</html>
<script src="assets/jquery/jquery-3.7.0.slim.min.js"></script>
<script src="assets/jquery/maxlength.js"></script>
<script>
    $(() => {
        $('[maxlength]').maxlength();
    });
</script>
