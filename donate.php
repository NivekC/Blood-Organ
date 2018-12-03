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

          <section class="about-area">
        <div class="container-fluid">
          <div class="row d-flex justify-content-end align-items-center">
            <div class="col-lg-6 col-md-12 about-left no-padding">
              <img class="img-fluid" src="img/contact.jpg" alt="">
            </div>
            <div class="col-lg-6 col-md-12 about-right no-padding">
              <h1>Contact Us <br> </h1>
              <form class="booking-form" id="myForm" method="post" action="connect.php">
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
