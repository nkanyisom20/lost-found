<?php
  include 'include_lf/auth.php';
  include 'include_lf/connect.php';

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
              <li class="active">
                <?php if ($role == 'Student') { ?>
                  <a href="manage_lf.php"><i class="glyphicon glyphicon-folder-open"></i> View_L&F</a>
                <?php } ?>
              </li>
              <li class="active">
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

    <?php if ($role == 'Admin') { ?>
      <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
  		  <li class="active">Manage Collection</li>
  		</ol>
    <?php } ?>
    <?php if ($role == 'Student') { ?>
      <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
  		  <li class="active">View L&F</li>
  		</ol>
    <?php } ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <?php if ($role == 'Admin') { ?>
  				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Collection</div>
          <?php } ?>
          <?php if ($role == 'Student') { ?>
  				<div class="page-heading"> <i class="glyphicon glyphicon-eye-open"></i> View L&F</div>
          <?php } ?>
  			</div> <!-- /panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordred table-striped">
              <thead>
                <tr>
                  <th><strong>No.</strong></th>
                  <th><strong>Student No.</strong></th>
                  <th><strong>Surname</strong></th>
                  <th><strong>Fullnames</strong></th>
                  <th><strong>Type of Document</strong></th>
                  <th><strong>Venue for Collecting</strong></th>
                  <th><strong>Date Reported</strong></th>
                  <th><strong>Status</strong></th>
                  <?php if ($role == 'Admin') { ?>
                  <th>Reported By</th>
                  <th>Collecting</th>
                  <th>Delete</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                      $page_no = $_GET['page_no'];
                      }
                    else
                      {
                        $page_no = 1;
                      }

                    $total_records_per_page = 7;
                    $offset = ($page_no-1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `lost_found`");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    $count=1;
                    $result = mysqli_query($connect,"SELECT * FROM `lost_found`ORDER BY `date` DESC LIMIT $offset, $total_records_per_page ");
                    while($row = mysqli_fetch_array($result))
                      {
                        $status = '';
                        if($row['status'] == 'Collected') {
                          $status = '<span class="label label-success">Collected</span>';
                        } else {
                          $status = '<span class="label label-default">! Collected</span>';
                        }
                  ?>

                      <tr>

                        <td><?php echo $count; ?></td>
                        <td><?php echo $row["student_no"]; ?></td>
                        <td><?php echo $row["surname"]; ?></td>
                        <td><?php echo $row["fullnames"]; ?></td>
                        <td><?php echo $row["type_of_doc"]; ?></td>
                        <td><?php echo $row["location"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $status; ?></td>
                        <?php if ($role == 'Admin') { ?>
                        <td><?php echo $row["reported_by"]; ?></td>
                        <td>
            							<a class="update_collect" data-emp-id="<?php echo $row["stu_lf_id"]; ?>" href="javascript:void(0)">
            						    <button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>
            							</a>
                        </td>
                        <td>
                          <a class="delete_collect" data-emp-id="<?php echo $row["stu_lf_id"]; ?>" href="javascript:void(0)">
                            <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
            							</a>
                        </td>
                        <?php } ?>
                      </tr>
                    <?php
                    $count++;
                  }
                ?>
              </tbody>
            </table>

              <div class="col-md-6">
                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                  <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                </div>
              </div>

              <div class="col-md-6">

              <ul class="pagination pull-right">
                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                </li>

                  <?php
                    if ($total_no_of_pages <= 10){
                      for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                        if ($counter == $page_no) {
                         echo "<li class='active'><a>$counter</a></li>";
                          }else{
                             echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                          }
                        }
                    }
                    elseif($total_no_of_pages > 10){

                    if($page_no <= 4) {
                      for ($counter = 1; $counter < 8; $counter++){
                        if ($counter == $page_no) {
                         echo "<li class='active'><a>$counter</a></li>";
                          }
                        else
                          {
                             echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                          }
                      }
                      echo "<li><a>...</a></li>";
                      echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                      echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                      }

                  elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                    echo "<li><a href='?page_no=1'>1</a></li>";
                    echo "<li><a href='?page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                      for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                         if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                          }
                        else
                          {
                             echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                          }
                        }
                      echo "<li><a>...</a></li>";
                      echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                      echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                    }

                  else
                    {
                      echo "<li><a href='?page_no=1'>1</a></li>";
                      echo "<li><a href='?page_no=2'>2</a></li>";
                      echo "<li><a>...</a></li>";
                      for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                          if ($counter == $page_no) {
                              echo "<li class='active'><a>$counter</a></li>";
                            }
                          else
                            {
                               echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                      }
                    }
                  ?>

                  <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
                  </li>
                  <?php
                    if($page_no < $total_no_of_pages){
                    echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      <footer>
        <p style="color: lightgrey" align="center"><i><b> Copyright <i class="glyphicon glyphicon-registration-mark"></i> | All Rights Reserved | Designed by Nkanyiso Consulting Pty Ltd</b></i></p>
      </footer>
    </div>
  </body>
</html>
<script type="text/javascript" src="js_crud_script/bootbox.min.js"></script>

<script type="text/javascript" src="js_crud_script/deleteRecords.js"></script>
<script type="text/javascript" src="js_crud_script/deleteCollect.js"></script>
<script type="text/javascript" src="js_crud_script/updateRecords.js"></script>
<script type="text/javascript" src="js_crud_script/updateCollect.js"></script>

<script src="asset/jquery/jquery-3.7.0.slim.min.js"></script>
<script src="asset/jquery/maxlength.js"></script>
<script>
    $(() => {
        $('[maxlength]').maxlength();
    });
</script>
