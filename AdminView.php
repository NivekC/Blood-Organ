<?php
session_start();
if (!isset($_SESSION['Username'])) {
 header("location: sign_in.php");
 die();
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
              <a href="admin.php">Institutions Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Donors Page</a>
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
      <h1>View</h1>
      <hr>
      
      <h2><center>INSTITUTIONS</center></h2>
        <section class="banner-area relative" id="home" style="font-size: 15px;">
        <div class="container">
              <div class="banner-content col-lg-12 col-md-12">
                <br><br>                
                  <table class="table table-stripped" style="align-content: center;">
                    <thead>
                      <tr>
                      <th>Institution Id</th>
                       <th>Name</th>
                       <th>Phone Number</th>
                       <th>Address</th>
                       <th>Location</th>
                       <th>Email</th>
                       <th>Action</th>
                      </tr>
                    </thead>

                  <?php
                  
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbName = "blood_organ";

                  $con = new mysqli($servername, $username,$password, $dbName);

                  if($con->connect_error)
                  {
                    die("connection failed: " . $con->connect_error);
                  }

                $result = ""; 
                 

                 

                  $sql = "SELECT InstitutionId, Name, Password, PhoneNo, Address, Location, Email FROM institution";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "
                    
                     <tbody>
                      <tr>
                        <td>".$row['InstitutionId']."</td>
                        <td>".$row['Name']."</td>
                        <td>0".$row['PhoneNo']."</td>
                        <td>".$row['Address']."</td>
                        <td>".$row['Location']."</td>
                        <td>".$row['Email']."</td>
                        
                        <td>
                        <a href='AdminUpdate.php'><input value='edit' type='submit' class='btn-primary' name='submit'></a>
                        </td>
                        
                      </tr>
                      </tbody>";
    }
} else {
    echo "0 results";
}
$con->close();                  

                  ?>
                        
                 </table>
                </div>
              </div>
        </div>
      </section>

<h2><center>DONORS</center></h2>
        <section class="banner-area relative" id="home" style="font-size: 15px;">
        <div class="container">
              <div class="banner-content col-lg-12 col-md-12">
                <br><br>                
                  <table class="table table-stripped" style="align-content: center;">
                    <thead>
                      <tr>
                      <th>Donor Id</th>
                       <th>Name</th>
                       <th>Phone Number</th>
                       <th>Date Of Birth</th>
                       <th>Address</th>
                       <th>Sex</th>
                       <th>Blood Type</th>
                       <th>Action</th>
                      </tr>
                    </thead>

                  <?php
                  
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbName = "blood_organ";

                  $con = new mysqli($servername, $username,$password, $dbName);

                  if($con->connect_error)
                  {
                    die("connection failed: " . $con->connect_error);
                  }

                $result1 = ""; 
                 

                 

                  $sql = "SELECT DonorId, Name, PhoneNo, DateOfBirth, Address, Sex, BloodType, email FROM donor";
if (!$result1 = $con->query($sql)) {
  echo $con->error;
}


if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
         echo "
                    
                     <tbody>
                      <tr>
                        <td>".$row['DonorId']."</td>
                        <td>".$row['Name']."</td>
                        <td>0".$row['PhoneNo']."</td>
                        <td>".$row['DateOfBirth']."</td>
                        <td>".$row['Address']."</td>
                        <td>".$row['Sex']."</td>
                        <td>".$row['BloodType']."</td>
                        <td>".$row['email']."</td>
                        
                        <td>
                        <a href='contact.php'><input value='edit' type='submit' class='btn-primary' name='submit'></a>
                        </td>
                        
                      </tr>
                      </tbody>";
    }
} else {
    echo "0 results";
}
$con->close();                  

                  ?>
                        
                 </table>
                </div>
              </div>
        </div>
      </section>




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