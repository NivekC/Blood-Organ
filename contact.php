<?php


	session_start();
	if (!isset($_SESSION['Username'])) {

		header("location: sign_in.php");
	}

	  $servername = "localhost";
	  $username = "root";
	  $password = "";
	  $dbName = "blood_organ";

	  $con = new mysqli($servername, $username,$password, $dbName);

	  $result1 = "";
	  $result = "";

	  if($con->connect_error)
	  {
	    die("connection failed: " . $con->connect_error);
	  }

	  $sql = "select * from users where Username = '".$_SESSION['Username']."'";
	  $result = $con->query($sql); 
	

if (isset($_GET['DonorID'])) {
	$DonorID = $_GET['DonorID'];
	$sql1 = "select * from donor where DonorID = $DonorID";

	$result = $con->query($sql); 
	$result1 = $con->query($sql1); 
	if(!($result = $con ->query($sql))){
        echo $con->error;
      }

	if($result-> num_rows > 0) {

	while ($row = $result->fetch_assoc()) 
	{ 
		$uname = $row['Name'];
		$uemail = $row['email'];
	}
	}

	if($result1-> num_rows > 0) {

	while ($row1 = $result1->fetch_assoc()) 
	{ 
		$email = $row1['email'];
	}
	}

}
elseif (isset($_GET['InstitutionID'])) {
 	$InstitutionID = $_GET['InstitutionID'];
 	$sql1 = "select * from Institution where InstitutionID = $InstitutionID";

	$result = $con->query($sql); 
	$result1 = $con->query($sql1); 
	if(!($result = $con ->query($sql))){
        echo $con->error;
      }

	if($result-> num_rows > 0) {

	while ($row = $result->fetch_assoc()) 
	{ 
		$uname = $row['Name'];
		$uemail = $row['email'];
	}
	}

	if($result1-> num_rows > 0) {

	while ($row1 = $result1->fetch_assoc()) 
	{ 
		$email = $row1['Email'];
	}
	}
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
				<style type="text/css">
	
.contact form {
  background-color: #f0f0f0;
  border-radius: 20px;
  width: 100%;
  border-top: 8px solid #E74C3C;
  box-shadow: 0 1px 2px rgba(0,0,0,.15);
  padding: 50px;
  
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



	</style>
		</head>
		<body>
			<br><br>
 <!--  <?php
    if (!isset($_SESSION['Username'])) {
      echo "<nav class='main-nav'>
      <ul>

        <li><a href='/''>About</a></li>
        <li><a href='/about'>Donors</a></li>
        <li><a href='/join'>Contact</a></li>
        <li><a href='/care'>Institutions</a></li>
        <li><a href='/contact'>Admin</a></li>
        <li><a href='sign_in.php'>Sign In</a></li>
      </ul>
    </nav>";

    }
    else
    {
      echo "<nav class='main-nav'>
      <ul>

        <li><a href='/''>About</a></li>
        <li><a href='/about'>Donors</a></li>
        <li><a href='/join'>Contact</a></li>
        <li><a href='/care'>Institutions</a></li>
        <li><a href='/contact'>Admin</a></li>
        <li><a href='logOut.php'>log Out</a></li>
      </ul>
    </nav>";
    }
    
    ?> -->
    
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
																
								  	<div class="container-fluid contact" id="contact">
									  <div class="container">
									    <form name="myform" action="connect.php" method="POST">
									      <h2>Appointments</h2><br>
									      <input type="text" required="" placeholder="Name" value="<?php echo $uname?>" id="name" name="name" class="full-half">
									      <input type="email" required="" placeholder="Your Email" id="email" value="<?php echo $uemail ?>" name="email" class="full-half">
									      <input type="email" required="" placeholder="Donor's Email" id="leMail" value="<?php echo $email ?>" name="leMail" class="full-half">
									      <input type="text" required="" placeholder="Subject" id="subject" name="subject">
									      <textarea placeholder="Message" required="" id="message" name="message"></textarea>
									      <input type="submit" name="patient" value="Book">
									    </form>
									  </div>
									</div>

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
