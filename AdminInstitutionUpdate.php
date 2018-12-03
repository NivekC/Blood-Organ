<?php
session_start();
if (!isset($_SESSION['Username'])) {
 header("location: sign_in.php");
 die();
}
?>
<?php


$_GET['InstitutionID'];
$InstitutionID = $_GET['InstitutionID'];



$servername = "localhost";
$username = "root";
$password = "";
$dbName = "blood_organ";

$con = new mysqli($servername, $username,$password, $dbName);

if($con->connect_error)
{
die("connection failed: " . $con->connect_error);
}

$sql = "SELECT Name,PhoneNo,Address,Location,Email FROM institution where InstitutionID = '".$InstitutionID."'";
$result = $con->query($sql);



$name = "";
$PhoneNo ="";
$Address = "";
$Location = "";
$Email = "";

if($result-> num_rows > 0) {

while ($row = $result->fetch_assoc()) {

$name = $row['Name']; 
$PhoneNo = $row['PhoneNo'];
$Address = $row['Address'];
$Location = $row['Location'];
$Email = $row['Email'];
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ADMIN</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
      <link rel="stylesheet" href="css/bootstrap.css">

  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">WELCOME ADMIN</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
      
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Manage</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="AdminDonor.php">Donor</a>
            </li>
            <li>

              <a href="AdminInstitution.php">Institution</a>
            </li>
          </ul>
        </li>
        
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Views</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="index.php">Home Page</a>
            </li>
            <li>
              <a href="strathmore.php">Strathmore Blood Chart</a>
            </li>
            <li>
              <a href="knh.php">Kenyatta Blood Chart</a>
            </li>
           
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Contact</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="email.php">Send Email</a>
            </li>
            
            
           
          </ul>
        </li>
       
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            
            <i class="logOut.php"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div id="form">
  <div class="content-wrapper">
    <div class="container-fluid">


      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"></a>
        </li>
        
      </ol>
      <h1>Institution</h1>
      <hr>
     
     <div class="tab-pane" id="Edit">
                             
                             <h2></h2>
                             
                             <hr>
                                <form class="form" action="Update.php" method="post" id="Edit">
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>Full Name</h4></label>
                                            <input type="text" class="form-control" name="name" id="first_name" readonly placeholder="first name" value='<?php echo $name ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                          <label for="last_name"><h4>Address</h4></label>
                                            <input type="text" class="form-control" name="address" id="Address" placeholder="Address" value="<?php echo $Address?>">
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="phone"><h4>Phone</h4></label>
                                            <input type="text" class="form-control" name="phoneNo" id="phone" placeholder="enter phone" value="<?php echo "0".$PhoneNo?>">
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="location"><h4>Location</h4></label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="location" value="<?php echo $Location?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Email</h4></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?php echo $Email?>">
                                        </div>
                                    </div>
                                    
                                   
                                 
                                    <div class="form-group">
                                         <div class="col-xs-12">
                                              <br>
                                              <button class="btn btn-lg btn-success" name="update" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>

                                          </div>
                                    </div>
                              </form>
                             
                           </div>



      <div style="height: 1000px;"></div>
    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
       
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logOut.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <!-- Toggle between fixed and static navbar-->
    <script>
    $('#toggleNavPosition').click(function() {
      $('body').toggleClass('fixed-nav');
      $('nav').toggleClass('fixed-top static-top');
    });

    </script>
    <!-- Toggle between dark and light navbar-->
    <script>
    $('#toggleNavColor').click(function() {
      $('nav').toggleClass('navbar-dark navbar-light');
      $('nav').toggleClass('bg-dark bg-light');
      $('body').toggleClass('bg-dark bg-light');
    });

    </script>
  </div>
</body>

</html>

     <?php
                  
                  //setting up json
                  // header('Content-Type application/json');

                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbName = "blood_organ";

                  $con = new mysqli($servername, $username,$password, $dbName);

                  if($con->connect_error)
                  {
                    die("connection failed: " . $con->connect_error);
                  }

                  //query to get data from the database
                  $query = sprintf("SELECT BloodType, Amount FROM bloodbank ORDER BY BloodType  ");

                  //execute query
                  $result = $mysqli ->query($query);

                  $data = array();
                  foreach ($$result as $row) {
                    $data[] = $row;
                  }

                  //free memory associated with result

                  $result->close();

                  $mysqli->close();

                  //print the data

                  print json_encode($data);

?>