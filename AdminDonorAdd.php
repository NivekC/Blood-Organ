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
$mysqli = new mysqli("localhost", "root", "", "Blood_Organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if (isset($_POST['Organ'])) {
  // Escape user inputs for security
$name = $mysqli->real_escape_string($_POST['name']);
$password = $mysqli->real_escape_string($_REQUEST['password']);
$cpassword = $mysqli->real_escape_string($_REQUEST['cpassword']);
$sex = $mysqli->real_escape_string($_REQUEST['Sex']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$DateOfBirth = $mysqli->real_escape_string($_REQUEST['DOB']);
$NatId = $mysqli->real_escape_string($_REQUEST['NationalID']);
$Organ = $mysqli->real_escape_string($_REQUEST['Organ']);

  $target = "images/".basename($_FILES['Image']['name']);
  $Image = $_FILES['Image']['name'];


$_SESSION['Donorname'] = $name;

if ($password===$cpassword) {
$hash = password_hash($password, PASSWORD_DEFAULT);
 // attempt insert query execution
$sql = "INSERT INTO donor (Name,Password,PhoneNo,NationalID,DateOfBirth,Address,Sex,email,Image) VALUES ('$name','$hash','$PhoneNo','$NatId','$DateOfBirth','$Address','$sex','$email','$Image')";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
$msg = "Image Uploaded successfully";
}
else
{
$msg = "There was a problem uploading the Image ";
}
/*if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
  //header("DonorIn.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}*/
$sql2 = "SELECT DonorID FROM donor WHERE Name = '".$name."'";
echo $sql2;
$result = $mysqli-> query($sql2) ;
$donorid = "";
if ($result-> num_rows > 0) {
  while ($row= $result-> fetch_assoc()) {
    $donorid = $row['DonorID'];
  }
}
echo $donorid;

$sql3 = "INSERT INTO organ (OrganType,DonorID) VALUES ('$Organ','".$donorid."')";
echo $sql3;

if ($mysqli->query($sql3)) {
  echo "Records inserted successfully."; 
  //header("location: admin.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

} else
{
 /*  if ($error == false) {
$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
}else {*/
    echo '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    header("location: admin.php");
  
}
} 


elseif (isset($_POST['BloodType'])) {
  // Escape user inputs for security
$name = $mysqli->real_escape_string($_POST['name']);
$password = $mysqli->real_escape_string($_REQUEST['password']);
$cpassword = $mysqli->real_escape_string($_REQUEST['cpassword']);
$sex = $mysqli->real_escape_string($_REQUEST['Sex']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$DateOfBirth = $mysqli->real_escape_string($_REQUEST['DOB']);
$NatId = $mysqli->real_escape_string($_REQUEST['NationalID']);
$blood_type = $mysqli->real_escape_string($_REQUEST['BloodType']);
$target = "images/".basename($_FILES['Image']['name']);
$Image = $_FILES['Image']['name'];

if ($password===$cpassword) {
$hash = password_hash($password, PASSWORD_DEFAULT);
$_SESSION['Donorname'] = $name;
$sql = "INSERT INTO donor (Name,Password,PhoneNo,NationalID,DateOfBirth,Address,Sex,email,Image) VALUES ('$name','$hash','$PhoneNo','$NatId','$DateOfBirth','$Address','$sex','$email','$Image')";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
$msg = "Image Uploaded successfully";
}
else
{
$msg = "There was a problem uploading the Image ";
}
if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
  //header("DonorIn.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
$sql2 = "SELECT DonorID FROM donor WHERE Name = '".$name."'";

$result = $mysqli-> query($sql2) ;
$donorid = "";
if ($result-> num_rows > 0) {
  while ($row= $result-> fetch_assoc()) {
    $donorid = $row['DonorID'];
  }
}

$sql3 = "INSERT INTO blood (BloodType, DonorID) VALUES ('$blood_type','$donorid')";

if ($mysqli-> query($sql3)) {
  echo "Records inserted successfully."; 
  header("location: admin.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}


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
      <h1>Add</h1>
      <hr>
     
     
  <div class="login-form">    
    <form action="AdminDonorAdd.php" method="post" enctype="multipart/form-data" >
    <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
      <h4 class="modal-title" style="text-align: center;">Donor</h4><br>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Full names" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="you@gmail.com" required="required">
        </div>
         <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
         <div class="form-group">
            <input type="password" class="form-control" name="cpassword" placeholder="Confirm_Password" required="required">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="NationalID" placeholder="National ID" required="required">
          </div>
         <div class="form-group">
        <select name="Sex"  class="form-control" style="width: 330px;">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
      </select>
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="phoneNo" placeholder="Contact" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" required="required">
        </div>
        <div class="form-group">
          <select name="type" class="form-control" style="width: 330px;" onchange="java_script_:show(this.options[this.selectedIndex].value)">
            <option>Select a Choice</option>
            <option>Donate My Blood</option>
            <option>Donate My Organ</option>
          </select>
        </div>
        <div class="form-group" id="bloodDiv" style="display: none">
        <select name="BloodType" class="form-control" style="width: 330px;">
          <option disabled selected value>Select Blood Type</option>
          <option value="A+">A+</option>
          <option value="O+">O+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="A-">A-</option>
          <option value="O-">O-</option>
          <option value="B-">B-</option>
          <option value="AB-">AB-</option>
      </select>
        </div>

        <div class="form-group" id="organDiv" style="display: none;">
      <select name="Organ" class="form-control" style="width: 330px;">
        <option disabled selected value>Select Organ</option>
        <option value="Kidney">Kidney</option>
      </select>

        </div>
      
         <div class="form-group">
            <input type="text" class="form-control" name="DOB" placeholder="yyyy/mm/dd" required="required">
        </div>
        <div class="form-group">
           Image:<br><input type="file" name="Image"><br>
          </div>
        <div class="form-group small clearfix">
            <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="forgot-link">Forgot Password?</a>
        </div> 
        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Add Donor">              
    </form>


    

</div>

<script type="text/javascript">
  function show(aval) {
    if ( aval == "Donate My Blood") {
    bloodDiv.style.display='block';
    } else
    {
      bloodDiv.style.display="none";
    }
    if (aval == "Donate My Organ") {
    organDiv.style.display='block';
    } else
    {
      organDiv.style.display="none";
      
    }
   }
</script>


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

