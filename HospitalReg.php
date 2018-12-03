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
                <a href="#home" style="text-decoration: none; font-family: cursive; font-size: 20px; font-weight: 1000;"><img src="img/damu.png" alt=""></b><strong>Blood And Organ</strong><b></a> 
              </div>
              <div class="main-menubar d-flex align-items-center">
                <nav class="hide">
                 <?php
                      if (!isset($_SESSION['Name'])) {
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

      <section class="blog-area section-gap">
        <div class="container">
          <div class="row justify-content-center">
<div class="login-form">    
    <form action="HospitalReg.php" method="post">
    <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
      <h4 class="modal-title" style="text-align: center;">Institution Registration</h4><br>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="email" required="required">
        </div>
         <div class="form-group">
            <input type="password" class="form-control" name="passwords" placeholder="Password" required="required">
        </div>
         <div class="form-group">
            <input type="password" class="form-control" name="cpassword" placeholder="Confirm_Password" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="phoneNo" placeholder="Phone number" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="location" placeholder="location" required="required">
        </div>
       
        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Save">            
    </form>  
    <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "blood_organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if (isset($_POST['submit'])) {
   
// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$passwords = $mysqli->real_escape_string($_REQUEST['passwords']);
$cpassword = $mysqli->real_escape_string($_REQUEST['cpassword']);
$location = $mysqli->real_escape_string($_REQUEST['location']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);

$_SESSION['Name']=$name;
 if ($passwords == $cpassword) {
   # code...
  // attempt insert query execution
  $hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO Institution (Name,Password,PhoneNo,Address,Location, Email) VALUES ('$name','$hash','$PhoneNo','$Address', '$location', '$email')";


if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
     header("Location: Hospitalin.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
}
 }


// Close connection
$mysqli->close();

    ?>   
    
</div>
</div>
</div>

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
<!-- 
          <
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