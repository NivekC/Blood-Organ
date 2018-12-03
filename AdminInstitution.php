<?php
session_start();
if (!isset($_SESSION['Username'])) {
 header("location: sign_in.php");
 die();
}
?>
     
                <?php
                           /* Attempt MySQL server connection. Assuming you are running MySQL
              server with default setting (user 'root' with no password) */
              $mysqli = new mysqli("localhost", "root", "", "blood_organ");
               
              // Check connection
              if($mysqli === false){
                  die("ERROR: Could not connect. " . $mysqli->connect_error);
              }

              if (isset($_POST['update'])) {
                 
              // Escape user inputs for security
              $Name = $mysqli->real_escape_string($_REQUEST['name']);  
              $email = $mysqli->real_escape_string($_REQUEST['email']);
              $location = $mysqli->real_escape_string($_REQUEST['location']);
              $PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
              $Address = $mysqli->real_escape_string($_REQUEST['address']);


              // attempt insert query execution
              $sql = "UPDATE `institution` SET PhoneNo = '".$PhoneNo."', Address = '".$Address."', Location = '".$location."', Email = '".$email."' WHERE institution.Name = '".$Name."'";


              if($mysqli->query($sql) === true ){
                  header("location: institution.php");
                  echo "Records inserted successfully."; 
                   
              } else {
                  echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
              }
              }

              // Close connection
              $mysqli->close();
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
              <a href="email.php
              ">Send Email</a>
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
          <a class="nav-link" data-toggle="modal" href="logOut.php" data-target="#exampleModal">
            
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
        
    <div class="container">
              <div class="banner-content col-lg-12 col-md-12">
                <br><br>                
                  <table class="table table-stripped" style="align-content: center;">
                    <thead>
                      <tr>
                       <th>Name</th>
                       <th>Phone Number</th>
                       <th>Address</th>
                       <th>Location</th>
                       <th>Email</th>
                       <th colspan="2">Action</th>
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

                $sql = "SELECT * FROM `institution`";
            
                    if(!($result = $con ->query($sql))){
                        echo $con->error;
                      }
                   if($result-> num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                     echo "
                     <tbody>
                      <tr>
                        <td>".$row['Name']."</td>
                        <td>0".$row['PhoneNo']."</td>
                        <td>".$row['Address']."</td>
                        <td>".$row['Location']."</td>
                         <td>".$row['Email']."</td>
                        <td>
                        <a href='chart.php?InstitutionID=".$row['InstitutionID']."'><i class='material-icons'>bar_chart</i></a>
                        </td>
                        <td>
                        <a href='AdminInstitutionUpdate.php?InstitutionID=".$row['InstitutionID']."'><i class='material-icons'>update</i></a>
                        </td>
                        <td>
                        <a href='AdminInstitutionDelete.php?InstitutionID=".$row['InstitutionID']."'><i class='material-icons'>delete</i></a>
                        </td>
                        <td>
                        <a href='AdminInstitutionAdd.php'><i class='material-icons'>add_circle_outline</i></a>
                        </td>
                        
                      </tr>
                      </tbody>";
                    }
                  }

                  ?>
                        
                 </table>
                </div>
              </div>
        </div>
      </section>

    

        </div>



      <div style="height: 1000px;"></div>
    </div>
    </div>
    <!-- /.container-fluid-->

    <!-- /.content-wrapper-->
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
            <a class="btn btn-primary"href="logOut.php">Logout</a>
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

    