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
								<a href="#home" style="text-decoration: none; font-family: cursive; font-size: 20px; font-weight: 1000;"><img src="img/damu.png" alt=""><b><strong>Blood And Organ</strong><b></a> 
							</div>

							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
								<?php
									    if (!isset($_SESSION['Username'])) {
									      echo "

									        <a href='index.php''>Home</a>
									        <a href='DonorIn.php'>Donors</a>
									        <a href='#appointment'>Contact</a>
									        <a href='institution.php'>Institutions</a>
									        <a href='Patients.php'>Patients</a>
									        <a href='sign_in.php'>Login</a>
									    ";

									    }
									    else
									    {
									      echo "
											<a href='Index.php''>Home</a>
									        <a href='DonorIn.php'>Donors</a>
									        <a href='#appointment'>Contact</a>
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

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container">
						<div class="row fullscreen align-items-center justify-content-center">
							<div class="banner-content col-lg-6 col-md-12">
								<h1 class="text-uppercase">
									Help those in need<br>
									by donating
								</h1>
								<p>
									We need donors to help us maintain our blood and organ banks
								</p>
								<a href="DonorReg.php">
									<button class="primary-btn2 mt-20 text-uppercase ">REGISTER AS DONOR<span class="lnr lnr-arrow-right"></span></button>
								</a>
								
							</div>
							<div class="col-lg-6 d-flex align-self-end img-right">
								<img class="img-fluid" src="img/volunteers.jpeg" alt="">
							</div>
						</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="service">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="single-feature d-flex flex-row pb-30">
								<div class="icon">
									<span class="lnr lnr-rocket"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">24/7 emergency</h4>
									<p>
										We offer quick and rapid help in times of emergencies in orde to save lives.
									</p>
								</div>
							</div>
							
							</div>
						
						</div>
						<div class="col-lg-6">
							<div class="single-feature d-flex flex-row pb-30">
								<div class="icon">
									<span class="lnr lnr-chart-bars"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">Blood & Organ Banks </h4>
									<p>
										Well co-ordinated donations will enable institutions to keep track of blood and organ banks effectively. 
									</p>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</section>
			<!-- End feature Area -->


			<!-- Start about Area -->
			<section class="about-area" id="appoinment">
				<div class="mini-header">
					<h2>Search Donor</h2>
				</div>
				<div class="container-fluid">
					<div class="row d-flex justify-content-end align-items-center">
						<div class="col-lg-6 col-md-12 about-left no-padding">
							<img class="img-fluid" src="img/blood-donor-match.png" style="padding-bottom: 30px;" alt="">
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter" style="color: black">
								<form action="blood.php" method="POST">
										<h6>Search Blood Type</h6>
										<div class="form-group row" style="width: 100%">
											<div class="col-lg-6 d-flex flex-column">
												<select name="BloodType">
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

											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Search</button>
											</div>
										</div>

										<br><br><br>
										<br>
									</form>
									<form action="organ.php" method="POST">
										<h6>Search Organ</h6>
										<div class="form-group row" style="width: 100%">
											<div class="col-lg-6 d-flex flex-column">
												<select name="Organ">
													<option value="Kidney">Kidney</option>
												</select>
												
											</div>

											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Search</button>
											</div>
										</div>
										
									</form>
								</div>
							</div>
						</div> 
			</section>
		
			<section class="blog-area section-gap">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 pb-30 header-text">
							<h1>News & Updates</h1>
							<p>
								
							</p>
						</div>
					</div>
					<div class="row">
						<div class="single-blog col-lg-4 col-md-4">

							<img class="f-img img-fluid mx-auto" src="img/question.jpeg" alt="">
							<h4>
								<a href="#">Why donate?</a>
							</h4>
							<p class="why">
								It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia.

								There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.

								Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma — which can be used individually for patients with specific conditions.
							</p>
							
						</div>
						<div class="single-blog col-lg-4 col-md-4">
							<img class="f-img img-fluid mx-auto" src="img/donate.jpeg" alt="">
							<h4>
								<a href="#">Can I be a donor?</a>
							</h4>
							<p>
								 Blood Donor  <br>
								YES!!! Anyone can be a donor. To donate blood or platelets, you must be in good general health, weigh at least 110 pounds, and be at least 16 years old. Parental consent is required for blood donation by 16 year olds; 16 year olds are NOT eligible to donate platelets. No parental consent is required for those who are at least 17 years old. If you are 76 or older, you will need your doctor’s written approval for blood or platelet donation.

								<br><br>
								Organ donors
								<br>
								All people should consider themselves potential organ and tissue donors—regardless of age, health, race, or ethnicity. Don’t rule yourself out! No one is too old or too young to be a deceased donor and most major religions support donation.
							</p>
							
						</div>
						<div class="single-blog col-lg-4 col-md-4">
							<img class="f-img img-fluid mx-auto" src="img/b3.jpg" alt="">
							<h4>
								<a href="#">Upcoming events</a>
							</h4>
							<p>
								We encourage campaigns as it enables us to register new donors and increase both blood and organ banks.
							</p>
							
						</div>
					</div>
				</div>
			</section>
			<!-- end blog Area -->

			<!-- Start about Area -->
		
	      <section class="about-area">
        <div class="container-fluid">
          <div class="row d-flex justify-content-end align-items-center">
            <div class="col-lg-6 col-md-12 about-left no-padding">
              <img class="img-fluid" src="img/contact.jpg" alt="">
            </div>
            <div id="appointment" class="col-lg-6 col-md-12 about-right no-padding">
              <h1>Contact Us <br> </h1>
              <form  method="post" action="connect.php">
                   <div class="row">
                    <div class="col-lg-12 d-flex flex-column">
                      <input name="name" placeholder="Name" class="form-control mt-20" required="" type="text" required>
                    </div>
                    <div class="col-lg-6 d-flex flex-column">
                      <input name="email" placeholder="Email"class="form-control mt-20" required="" type="email" required>
                    </div>
                    
                    <div class="col-lg-12 flex-column">
                      <textarea class="form-control mt-20" name="message" placeholder="Message / Queries" required=""></textarea>
                    </div>

                    <div class="col-lg-12 d-flex justify-content-end send-btn">
                      <button name="contact" class="submit-btn primary-btn mt-20 text-uppercase ">Send<span class="lnr lnr-arrow-right"></span></button>
                    </div>

                    <div class="alert-msg"></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
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
