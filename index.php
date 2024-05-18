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
        function checkstudent_no(va) {
          $.ajax({
            type: "POST",
            url: "include_lf/stu_no_availability.php",
            data:'student_no='+va,
            success: function(data){
              $("#student_no_availability").html(data);
              }
            });
          }
      </script>
      <script>
        function checkstudent_no_for_login(va) {
          $.ajax({
            type: "POST",
            url: "include_lf/stu_no_for_login.php",
            data:'student_no='+va,
            success: function(data){
              $("#student_no_for_login").html(data);
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
      </style>
  </head>
  <body>
    <div class="container">
      <header>
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
                  <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                  <li><a href="services.php"><i class="glyphicon glyphicon-tasks"></i> Services</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#" data-toggle="modal" data-target="#myModal_sign-up"><span class="glyphicon glyphicon-pencil"></span> Sign Up</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#myModal_sign-in"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
                </ul>
              </div>
            </div>
          </nav>
      </header>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="page-heading"><i class="glyphicon glyphicon-home"></i> Home</div>
          </div> <!-- /panel-heading -->
          <div class="panel-body">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                  <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                  <div class="item active">
                    <img src="assets/images/1pic_lgq.jpg" alt="DL" style="width:100%;">
                    <div class="carousel-caption">
                    </div>
                  </div>

                  <div class="item">
                    <img src="assets/images/2pic_lfq.jpg" alt="ID" style="width:100%;">
                    <div class="carousel-caption">
                    </div>
                  </div>

                  <div class="item">
                    <img src="assets/images/3pic_idq.jpg" alt="ID" style="width:100%;">
                    <div class="carousel-caption">
                    </div>
                  </div>

                  <div class="item">
                    <img src="assets/images/4pic_scq.jpg" alt="Certificate" style="width:100%;">
                    <div class="carousel-caption">
                    </div>
                  </div>

                  <div class="item">
                    <img src="assets/images/5pic_lgq.jpg" alt="Certificate" style="width:100%;">
                    <div class="carousel-caption">
                    </div>
                  </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
        </div>
          <!--Start Modal Login -->
          <div class="modal fade" id="myModal_sign-in" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Sign In</h4>
                </div>
                <div class="container">
                  <form name="insertrecord" action="include_lf/sign_in.php" method="post">

                    <div class="row">
                      <div class="col-md-3"><b>Student No.</b>
                        <input type="text" id="student_no" name="student_no" maxlength="9" onblur="checkstudent_no_for_login(this.value)" class="form-control" value="" required="true">
                      </div>

                      <div class="col-md-3"><b>Password</b>
                        <input type="password" name="password" class="form-control" value="" required>
                      </div>
                    </div>
                    <small><span id="student_no_for_login"></span></small>

                    <div class="row" style="margin-top:1%">
                      <div class="col-md-8">
                        <button class="btn btn-success" type="submit" name="submit_login" id="submit_login" value="Submit"><i class="glyphicon glyphicon-log-in"></i> Sign in</button>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <hr>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                </div>
              </div>
            </div>
          </div>
          <!--End Modal Login -->

          <!--Start Modal Register -->
          <div class="modal fade" id="myModal_sign-up" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="container">
                  <form name="insertrecord" action="include_lf/sign_up.php" method="post">
                    <div class="row">
                      <div class="col-md-4"><b>Student No.</b>
                        <input type="text" id="student_no" name="student_no" maxlength="9" onblur="checkstudent_no(this.value)" class="form-control" required="true">
                      </div>
                    </div>
                    <small><span id="student_no_availability"></span></small>

                    <div class="row">
                      <div class="col-md-4"><b>Fullnames</b>
                        <input type="text" id="fullnames" name="fullnames" maxlength="20" class="form-control" required="true">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4"><b>Surname</b>
                        <input type="surname" id="surname" name="surname" maxlength="14" class="form-control" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4"><b>Password</b>
                        <input type="password" name="password" class="form-control" required>
                      </div>
                    </div>
                    <fieldset>
                      <legend >Gender</legend>
                        <div class="col-md-2"><b>Female</b>
                          <input type="radio" name="gender" value="Female" class="form-control" required>
                        </div>
                        <div class="col-md-2"><b>Male</b>
                          <input type="radio" name="gender" value="Male" class="form-control" required>
                        </div>
                    </fieldset>

                    <div class="row" style="margin-top:1%">
                      <div class="col-md-8">
                        <input class="btn btn-success" type="submit" name="submit_register" id="submit_register" value="Submit">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <hr>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                </div>
              </div>
            </div>
          </div>
          <!--End Modal Register -->
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
      $("#fullnames").alphaNumericOnly();
      $("#surname").lettersOnly();
  });
</script>
