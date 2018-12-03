<?php
session_start();

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
									    if (!isset($_SESSION['Donorname'])) {
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
		

			<section class="blog-area section-gap">
				<div class="container">
					<div class="row justify-content-center">
						<!--  Request me for a signup form or any type of help  -->
<div class="login-form">    
    <form action="Donor_registration.php" method="post" enctype="multipart/form-data" >
    <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
      <h4 class="modal-title" style="text-align: center;">Register</h4><br>
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
      </select><br><br>
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
          </select><br><br>
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
      </select><br><br>
        </div>

        <div class="form-group" id="organDiv" style="display: none;">
      <select name="Organ" class="form-control" style="width: 330px;">
        <option disabled selected value>Select Organ</option>
        <option value="Kidney">Kidney</option>
      </select><br><br>

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
        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Register">              
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

</div>
</div>
</section>

<br>
<br><br>

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
							<!-- <div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send promo offers, not a single spam.</p>
								<div id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
											</div>

											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
											</div> -->
										</div>
										<div class="info"></div>
									</form>
								</div>
							</div>
						</div> 
					</div>
<!-- 
					<div class="row footer-bottom d-flex justify-content-between">
						
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							
						</div>
					</div> -->
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