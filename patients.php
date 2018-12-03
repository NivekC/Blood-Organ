		<?php

	session_start();
	if (!isset($_SESSION['Username'])) {

		header("location: sign_in.php");
	}
	?>
	
		
<!--PHP Code to display users information -->
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

  $sql = "SELECT * FROM users WHERE Username =  '".$_SESSION['Username']."'";
  $result = $con->query($sql);


 
  $Name = "";
  $Username = "";
  $sex = "";
  $PhoneNo ="";
  $email = "";
  $NationalID = "";
  $Address = "";
  $dob = "";

  if($result-> num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

    $Name = $row['Name']; 
    $Username = $row['Username']; 
    $sex = $row['Sex']; 
    $PhoneNo = $row['PhoneNo'];
    $email = $row['email'];
    $Address = $row['Address'];
    $NationalID = $row['NationalID'];
    $dob = $row['DateOfBirth'];
    $img = $row['image'];
    }
  }
?>


<!--PHP code to update users Information-->
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
$Username = $mysqli->real_escape_string($_REQUEST['Username']);  
$Name = $mysqli->real_escape_string($_REQUEST['name']);  
$email = $mysqli->real_escape_string($_REQUEST['email']);
$NatId = $mysqli->real_escape_string($_REQUEST['NatId']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);

$target = "images/".basename($_FILES['Image']['name']);
$Image = $_FILES['Image']['name'];


// attempt insert query execution
$sql = "UPDATE `users` SET PhoneNo = '".$PhoneNo."', Address = '".$Address."', NationalID = '".$NatId."', Email = '".$email."', image = '".$Image."' WHERE users.Username = '".$Username."'";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
echo "Image Uploaded successfully";
}
else
{
echo "There was a problem uploading the Image ";
}
echo $sql;
if($mysqli->query($sql) === true ){
header("location: patients.php");
echo "Records inserted successfully."; 

} else {
echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
}

// Close connection
$mysqli->close();
?>
			 


			 
			<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
   		<link rel="stylesheet" type="text/css" media="screen"href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
	
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Medical</title>
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">=
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
			<style type="text/css">

			
  <style>
.contact form {
  background-color: #f0f0f0;
  border-radius: 4px;
  border-top: 8px solid #E74C3C;
  box-shadow: 0 1px 2px rgba(0,0,0,.15);
  padding: 10px;
  
}

.contact form input, .contact form textarea {
  border: none;
  border-radius: 4px;
  display: block;
  margin-bottom: 1em;
  padding: 1em;
  width: 100%;
}

.contact form textarea {
  height: 6em;
}

.contact form input[type="submit"] {
  background-color: #E74C3C;
  border-radius: 0;
  color: #fff;
  padding: 1em;
  text-transform: uppercase;
}

.top-bar{
  grid-area: top-bar ;
  background-color: red;
  color: white;
  height: auto;
  padding: 4px 12%; 
}

.top-bar a{
  float: right;
  color: white;
}

.top-bar .social-link{
  margin-right: 7px;
}

.top-bar .contact-link{
  margin-right: 26px;
}

.main-header{
  grid-area: main-header;
  padding: 0px 12%;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
   /*border: 2px solid black;
    border-radius: 4px;*/
}

.logo{
  color: #622b0d;
  font-size: 16px;
}

.logo span:nth-child(1){
  float: left;
  margin-left: -20px;
  margin-bottom: -10px;
}

.logo span:nth-child(2){
  clear: both;
  display: block;
  font-family: 'lobster two', serif;
  font-size: 34px;
}

.logo span:nth-child(3){
  float: left;
  margin-left: 143px;
  margin-top: -7px;
}

.main-nav ul, .footer-nav ul{
  list-style-type: none;  
}

nav ul li{
  float: left;
}

.main-nav ul li a{
  font-size: 18px;
  color: #c8825b;
  margin: 0 10px;
}

  </style>
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="#home" style="text-decoration: none; font-family: cursive; font-size: 20px; font-weight: 1000;"><img src="img/damu.png" alt=""><b><strong>Blood And Organ</strong></b></a> 
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<?php
									    if (!isset($_SESSION['Username'])) {
									      echo "
											<a href='index.php''>Home</a>
									        <a href='DonorIn.php'>Donors</a>
									        <a href='institution.php'>Institutions</a>
									        <a href='sign_in.php'>Login</a>
									    ";

									    }
									    else
									    {
									      echo "
											<a href='index.php''>Home</a>
									        <a href='DonorIn.php'>Donors</a>
									        <a href='institution.php'>Institutions</a>
									        <a href='logOut.php'>Log Out</a>
									   ";
									    }
									    
									    ?>
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->
				<section class="banner-area relative" id="home" style="font-size: 15px;">
				<div class="container">
							<div class="banner-content col-lg-12 col-md-12">
						
						
							<hr>
							<div class="container bootstrap snippet">
							    <div class="row">
							      <div class="col-sm-10"><h1><?php echo $Name;?></h1></div>
							      <div class="col-sm-2"><a href="#" class="pull-right"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGISURBVGhD7Zk/K0ZhGIcPGSSxySBkkMFmNfAhDCQGsfoSDHwBpUwomW1GRpNJ+QIy+M+gxPU7nVNP6pzn7q33PY/cV13Dc3rut/vXc/70dmeO47REF67iFX7id8M+4QlOoRmFOMDyR77woUFfsOzlFefRxAqq6Bl1Kv3YNON4hOrrDgcwim4nFShESuhOuUD1tq4LdWizngndTimcxG82UUH28lUNg6iNerhSZAnV33G+qsGDdAgPEqMHJwJH0EIvhnXDaKFtQUZR+0uv0cIshnVnaMGDxPAgGNZ5kCo8SKEHQQsdC3KLMwbXMKxLLkirepAqPEjhB+qvcswbDOuSC+KvX7TgQWJ4EAzrPEgVHqTwzwYZwvPAfbQwjWHdFlpoW5BO40FS4/8F6UNtfMtX6bGM6u8wX0V4RG3WuCs1tlG97eSrCJqelqm7dSERxlDDUfVmGohO4juq4BI17lpo0EXUSZQhrB/PHCW+RxWmpEKYJrohGoZuoAaPpw2qN9QuzqHjOC2RZT96/P+f4tw1aQAAAABJRU5ErkJggg=="></a></div>
							    </div>
							    <div class="row">
							     <div class="col-sm-3"><!--left col-->
							      <div class="text-center">
							        <img src="images/<?php echo $img; ?>" class="avatar img-rounded img-thumbnail" alt="avatar">
							       
							      </div></hr><br>

							        
							    
							          
							        </div><!--/col-3-->
							      <div class="col-sm-9">
							            <ul class="nav nav-tabs">
							               <li><a data-toggle="tab" href="#homee">Home</a></li>&nbsp;&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#Edit">Edit</a></li>&nbsp;&nbsp;&nbsp;
							                <!-- <li><a data-toggle="tab" href="#BloodBank">Blood Bank</a></li>&nbsp;&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#View_blood_bank">View Blood Bank</a></li>&nbsp;&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#transfusions">Transfusions</a></li>&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#Events">Events</a></li>&nbsp;&nbsp; -->
							                <li><a data-toggle="tab" href="#Appointments">Appointments</a></li>&nbsp;&nbsp;&nbsp;
							              </ul>
							            <div class="tab-content">
							            <div class="tab-pane active" id="homee">
							                <hr>
							                  <h4><?php echo "Name: " .$Name;?></h4><br>
							                   <h4><?php echo "User name: " .$Username;?></h4><br>
							                  <h4><?php echo "Contact: "."0" . $PhoneNo;?></h4><br>
							                  <h4><?php echo "Address: ". $Address;?></h4><br>
							                  <h4><?php echo "Email: ". $email;?></h4><br>
							                  <h4><?php echo "Date Of Birth: ". $dob;?></h4><br>
							                  <h4><?php echo "National ID: ". $NationalID;?></h4><br>
							                <hr>
							              
							             </div><!--/tab-pane-->
							        <div class="tab-pane" id="Edit">
							               
							               <h2></h2>
							               
							               <hr>
							                  <form class="form" action="patients.php" method="post" id="Edit"  enctype="multipart/form-data">
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="first_name"><h4>Username</h4></label>
							                              <input type="text" class="form-control" name="Username" id="first_name" readonly placeholder="first name" value='<?php echo $Username ?>'>
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          <div class="col-xs-6">
							                            <label for="last_name"><h4>Name</h4></label>
							                              <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $Name?>">
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
							                              <label for="location"><h4>Address</h4></label>
							                              <input type="text" class="form-control" id="location" name="address" placeholder="location" value="<?php echo $Address?>">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          <div class="col-xs-6">
							                              <label for="email"><h4>Email</h4></label>
							                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?php echo $email?>">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          <div class="col-xs-6">
							                              <label for="email"><h4>National ID</h4></label>
							                              <input type="text" class="form-control" name="NatId" id="email" placeholder="you@email.com" value="<?php echo $NationalID?>">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          <div class="col-xs-6">
							                              <label><h4>Upload a different photo...</h4></label><br>
							        					<input type="file" name="Image">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                           <div class="col-xs-12">
							                                <br>
							                                <button class="btn btn-lg btn-success" name="update" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
							                            </div>
							                      </div>
							                </form>
							               
							             </div><!--/tab-pane-->

							            
					
							<div class="tab-pane" id="Appointments">
							<h2 style="text-align: center;">View Appointments</h2>
							    <div class="login-form" >
							<section class="banner-area relative" id="home" style="font-size: 15px;">
							<div class="container">
							<div class="banner-content col-lg-12 col-md-12">								
								  <table class="table table-stripped" style="align-content: center;">
								    <thead>
								      <tr>
								      	<th>Name</th>
								       <th>Date</th>
								       <th>Time</th>
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

								
								 $result1=""; 
								  $sql = "SELECT * FROM users WHERE Username =  '".$_SESSION['Username']."'";
								  


								 $UserID = "";
								if (!$result = $con->query($sql)) {
									echo $con->error;
								}

								  if($result-> num_rows > 0) {

								    while ($row = $result->fetch_assoc()) {

								    $UserID = $row['UserID']; 
								   
								    }
								  }
								  
							   
							       $sql1  = "SELECT laDate,Temp,Name FROM `appointments` JOIN institution ON institution.InstitutionID = appointments.InstitutionID where appointments.UserID = '".$UserID."' ";  
							        
							        $result1 = $con->query($sql1);
							    
							
							      if(!($result1 = $con ->query($sql1))){
								        echo $con->error;
								      }

								  if($result1-> num_rows > 0) {

								    while ($row1 = $result1->fetch_assoc()) {
								     echo "
								    
								     <tbody>
								      <tr>
								       <td>".$row1['Name']."</td>
								        <td>".$row1['laDate']."</td>
								        <td>".$row1['Temp']."</td>
								       
								      </tr>
								      </tbody>";
								    }
								  }
								  ?>
								        
								 </table>
								</div>
							</div>
						</section>
				</div>
			</div>

			</div><!--/tab-pane-->
			</div><!--/tab-content-->
						

	        </div><!--/col-9-->
	    </div><!--/row--> 
		</div>
	</div>
</div>

</section>

		

			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container footer">
					<div class="row">
						<div class="col-lg-2  col-md-6">
							<div class="single-footer-widget">
								<h6>Organs donated</h6>
								<ul class="footer-nav">
									<li>Kidney</a></li>
									
									
								</ul>
							</div>
						</div>
						<div class="col-lg-4  col-md-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Contact Us</h6>
								<p>
									Get in touch with us. Your feedback is highly appreciated.
								</p>
								<h3>(+254) 702812342</h3>
								<h3>(+254) 702812342</h3>
							</div>
						</div>
						 <div class="col-lg-6  col-md-12">
						
										</div>
										<div class="info"></div>
									</form>
								</div>
							</div>
						</div> 
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script type="text/javascript"src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
<script type="text/javascript"src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.en.js"></script>

    <script type="text/javascript">
      $('#time').datetimepicker({
        format: 'hh:mm:ss',
        language: 'en',
        pickDate: false
      });
    </script>
    <script type="text/javascript">
      $('#date').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'en',
        pickTime: false
      });
    </script>
    

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>
			<script src="js/main.js"></script>

<script type="text/javascript">
					    $(document).ready(function() {

					    
					    var readURL = function(input) {
					        if (input.files && input.files[0]) {
					            var reader = new FileReader();

					            reader.onload = function (e) {
					                $('.avatar').attr('src', e.target.result);
					            }
					    
					            reader.readAsDataURL(input.files[0]);
					        }
					    }
					    

					    $(".file-upload").on('change', function(){
					        readURL(this);
					    });
					});
	</script>
</body>
</html>