	<?php

	session_start();
	if (!isset($_SESSION['Username'])) {

		header("location: sign_in.php");
	}
	?>
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
									         <a href='Patients.php'>Patients</a>
									        <a href='sign_in.php'>Login</a>
									    ";

									    }
									    else
									    {
									      echo "
											<a href='index.php''>Home</a>
									        <a href='DonorIn.php'>Donors</a>
									        <a href='institution.php'>Institutions</a>
									         <a href='Patients.php'>Patients</a>
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
								<br><br>								
								  <table class="table table-stripped" style="align-content: center;">
								    <thead>
								      <tr>
								       <th>Name</th>
								       <th>Phone Number</th>
								       <th>Address</th>
								       <th>Location</th>
								       <th>Email</th>
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

								$result = ""; 
								$result1=""; 

								  $BloodType = $con->real_escape_string($_REQUEST['BloodType']);

								  if ($BloodType=== 'O+') {
							        $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID HAVING BloodType = 'O+' or BloodType = 'O-'";
							        $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType HAVING bloodbank.BloodType = 'O+' or bloodbank.BloodType ='O-'";  

							        $result = $con->query($sql);
							        $result1 = $con->query($sql1);
							      }
							      elseif ($BloodType=== 'A+') {
							      	
							       $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID HAVING BloodType = 'O+' or BloodType = 'O-' or BloodType = 'A+' or BloodType = 'A-'";  
							        $result = $con->query($sql);
							        $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType HAVING bloodbank.BloodType = 'O+' or bloodbank.BloodType ='O-' or bloodbank.BloodType ='A+' or bloodbank.BloodType ='A-'";  

							        $result = $con->query($sql);
							        $result1 = $con->query($sql1);
							      }
							      elseif ($BloodType=== 'B+') {
							       $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID HAVING BloodType = 'O+' or BloodType = 'O-' or BloodType = 'B+' or BloodType = 'B-'"; 
							       $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType HAVING bloodbank.BloodType = 'O+' or bloodbank.BloodType ='O-' or bloodbank.BloodType ='B+' or bloodbank.BloodType ='B-'";  

							        $result1 = $con->query($sql1); 
							        $result = $con->query($sql);
							      }
							      elseif ($BloodType=== 'AB+') {
							       $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID";  
							       $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType";  

							        $result1 = $con->query($sql1);
							        $result = $con->query($sql);
							      }
							      elseif ($BloodType=== 'A-') {
							       $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID HAVING BloodType = 'A-' or BloodType = 'O-'";  
							       $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType HAVING bloodbank.BloodType = 'A-' or bloodbank.BloodType ='O-'";  

							        $result1 = $con->query($sql1);
							        $result = $con->query($sql);
							      }
							      elseif ($BloodType=== 'O-') {
							       $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID HAVING BloodType = 'O-'";  
							        $result = $con->query($sql);
							        $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType HAVING bloodbank.BloodType ='O-'";  

							        $result = $con->query($sql);
							        $result1 = $con->query($sql1);
							      }
							      elseif ($BloodType=== 'B-') {
							       $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID HAVING BloodType = 'B-' or BloodType = 'O-'";
							       $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType HAVING bloodbank.BloodType = 'B-' or bloodbank.BloodType ='O-'";  

							        $result1 = $con->query($sql1);  
							        $result = $con->query($sql);
							      }
							      else {
							       $sql = "SELECT donor.DonorID,Name,PhoneNo,email,Address,Sex,BloodType FROM `donor` JOIN blood ON donor.DonorID = blood.DonorID HAVING BloodType = 'AB-' or BloodType = 'A-' or BloodType = 'B-' or BloodType = 'O-'";  
							       $sql1  = "SELECT institution.InstitutionID,Name,PhoneNo,Address,Location,Email, BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType HAVING bloodbank.BloodType = 'AB-' or bloodbank.BloodType ='A-' or bloodbank.BloodType ='B-' or bloodbank.BloodType ='O-'";  
							        
							        $result1 = $con->query($sql1);
							        $result = $con->query($sql);
							      }
								  $status = "";
								  $a = 0;
								  if($a === 1)
								    {
								      $status = "disabled";
								    }

								    if(!($result = $con ->query($sql))){
								        echo $con->error;
								      }
								      if(!($result1 = $con ->query($sql1))){
								        echo $con->error;
								      }

								  if($result1-> num_rows > 0) {

								    while ($row1 = $result1->fetch_assoc()) {
								     echo "
								    
								     <tbody>
								      <tr>
								        <td>".$row1['Name']."</td>
								        <td>0".$row1['PhoneNo']."</td>
								        <td>".$row1['Address']."</td>
								        <td>".$row1['Location']."</td>
								        <td>".$row1['Email']."</td>
								        <td>".$row1['BloodType']."</td>
								        <td>
								        <a href='contact.php?InstitutionID=".$row1['InstitutionID']."'><input value='Book' type='submit' class='btn-primary' name='submit'></a>
								        </td>
								        
								      </tr>
								      </tbody>";
								    }
								  }

								  if($result-> num_rows > 0) {

								    
								    while ($row = $result->fetch_assoc()) {
								     echo "
								    
								     <tbody>
								      <tr>
								        <td>".$row['Name']."</td>
								        <td>0".$row['PhoneNo']."</td>
								        <td>".$row['Address']."</td>
								        <td>".$row['Sex']."</td>
								         <td>".$row['email']."</td>
								        <td>".$row['BloodType']."</td>
								        <td>
								        <a href='contact.php?DonorID=".$row['DonorID']."'><input value='Book' type='submit' class='btn-primary' name='submit'></a>
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

		

			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container footer">
					<div class="row">
						<div class="col-lg-2  col-md-6">
							<div class="single-footer-widget">
								<h6>Organs donated</h6>
								<ul class="footer-nav">
									<li>Kidney</a></li>
									<li>Liver</li>
									<li>Cornea</li>
									
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
		</body>
	</html>
