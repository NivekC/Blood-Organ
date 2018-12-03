			<?php
		session_start();

		if (!isset($_SESSION['Name'])) {

		 header("location: Hospitalin.php");
		 die();
		}
		?>
<!-- <?php
			 //setting header to json
			//header('Content-Type: application/json');

		/*	//database
			define('DB_HOST', 'localhost');
			define('DB_USERNAME', 'root');
			define('DB_PASSWORD', '');
			define('DB_NAME', 'blood_organ');

			//get connection
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if(!$mysqli){
				die("Connection failed: " . $mysqli->error);
			}
			$sql = "SELECT InstitutionID FROM Institution WHERE Name = '".$_SESSION['Name']."'";

				$result1 = $mysqli-> query($sql) ;


				$institutionid = "";
				if ($result1-> num_rows > 0) {
				  while ($row1= $result1-> fetch_assoc()) {
				    $institutionid = $row1['InstitutionID'];
				  }
				}
				else
					die();

echo $institutionid;
			//query to get data from the table
			$query = "SELECT BloodType, Amount FROM bloodbank WHERE InstitutionID = '".$institutionid."'";

			//execute query
			$result = $mysqli->query($query);

			//loop through the returned data
			$data = array();
			foreach ($result as $row) {
				$data[] = $row;
			}
			echo $data;

			//free memory associated with result
			$result->close();

			//close connection
			$mysqli->close();
			print json_encode($data);
*/
			?>
 -->
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

  $sql = "SELECT Name,PhoneNo,Address,Location,Email,Image FROM institution WHERE Name =  '".$_SESSION['Name']."'";
  $result = $con->query($sql);


 
  $name = "";
  $PhoneNo ="";
  $Address = "";
  $Location = "";
  $Email = "";
  $Image="";

  if($result-> num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

    $name = $row['Name']; 
    $PhoneNo = $row['PhoneNo'];
    $Address = $row['Address'];
    $Location = $row['Location'];
    $Email = $row['Email'];
    $Image = $row['Image'];
    }
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

$target = "images/".basename($_FILES['Image']['name']);
$Image = $_FILES['Image']['name'];

// attempt insert query execution
$sql = "UPDATE `institution` SET PhoneNo = '".$PhoneNo."', Address = '".$Address."', Location = '".$location."', Email = '".$email."', Image = '".$Image."' WHERE institution.Name = '".$Name."'";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
echo "Image Uploaded successfully";
}
else
{
echo "There was a problem uploading the Image ";
}
print_r($_FILES);

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
			   <?php
							$mysqli = new mysqli("localhost", "root", "", "Blood_Organ");
							 
							// Check connection
							if($mysqli === false){
							    die("ERROR: Could not connect. " . $mysqli->connect_error);
							}

							if (isset($_POST['Save'])) {
							  // Escape user inputs for security
							$BloodType = $mysqli->real_escape_string($_POST['BloodType']);
							$amount = $mysqli->real_escape_string($_REQUEST['amount']);
							$date = $mysqli->real_escape_string($_REQUEST['date']);

							$sql = "SELECT InstitutionID FROM Institution WHERE Name = '".$name."'";

							$result = $mysqli-> query($sql) ;


							$institutionid = "";
							if ($result-> num_rows > 0) {
							  while ($row= $result-> fetch_assoc()) {
							    $institutionid = $row['InstitutionID'];
							  }
							}
							$sql2 ="UPDATE `bloodbank` SET `Amount`=`Amount`+'".$amount."' WHERE InstitutionID = '".$institutionid."' AND `BloodType`= '".$BloodType."'";
							if ($mysqli-> query($sql2)) {
							   header("location: institution.php");
							} else {
							    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
							}
							}

							// Close connection
							$mysqli->close();

			?>

			   <?php
							              $mysqli = new mysqli("localhost", "root", "", "Blood_Organ");
							 
							// Check connection
							if($mysqli === false){
							    die("ERROR: Could not connect. " . $mysqli->connect_error);
							}

							if (isset($_POST['savedata'])) {
							  // Escape user inputs for security
							$BloodType = $mysqli->real_escape_string($_POST['BloodType']);
							$amount = $mysqli->real_escape_string($_REQUEST['amount']);
							$date = $mysqli->real_escape_string($_REQUEST['date']);


							$sql = "SELECT InstitutionID FROM Institution WHERE Name = '".$name."'";

							$result = $mysqli-> query($sql) ;


							$institutionid = "";
							if ($result-> num_rows > 0) {
							  while ($row= $result-> fetch_assoc()) {
							    $institutionid = $row['InstitutionID'];
							  }
							}
					
							
							$sql2 = "INSERT INTO transfusionbank (laDate,Amount,BloodType,institutionID) VALUES ('$date','$amount','$BloodType','".$institutionid."')";
							$sql3 ="UPDATE `bloodbank` SET `Amount`=`Amount`-'".$amount."' WHERE InstitutionID = '".$institutionid."' AND `BloodType`= '".$BloodType."'";
							
							if ($mysqli-> query($sql2) && $mysqli-> query($sql3)) {
							   header("location: institution.php");
							} else {
							    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
							}
							}

							// Close connection
							$mysqli->close();

			?>

			<!-- Adding events to the database php code -->
			<?php
				$mysqli = new mysqli("localhost", "root", "", "Blood_Organ");
				 
				// Check connection
				if($mysqli === false){
				    die("ERROR: Could not connect. " . $mysqli->connect_error);
				}

				if (isset($_POST['event'])) {
				  // Escape user inputs for security
				$name = $mysqli->real_escape_string($_POST['event_name']);
				$Description = $mysqli->real_escape_string($_REQUEST['event_description']);
				$Event_date = $mysqli->real_escape_string($_POST['event_date']);
				$Venue = $mysqli->real_escape_string($_REQUEST['event_venue']);
				$Time = $mysqli->real_escape_string($_REQUEST['event_time']);


				$sql = "SELECT InstitutionID FROM Institution WHERE Name = '".$_SESSION['Name']."'";

				$result = $mysqli-> query($sql) ;


				$institutionid = "";
				if ($result-> num_rows > 0) {
				  while ($row= $result-> fetch_assoc()) {
				    $institutionid = $row['InstitutionID'];
				  }
				}
		
				
				$sql2 = "INSERT INTO massevents (Name,Description,Event_date,Venue,Temp,InstituitionID) VALUES ('$name','$Description','$Event_date','$Venue','$Time','".$institutionid."')";
				
				if ($mysqli-> query($sql2)) {
				   header("location: institution.php");
				} else {
				    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
				}
				}

				// Close connection
				$mysqli->close();

			?>

			<!-- Adding appointments to the database php code -->

<?php
				$mysqli = new mysqli("localhost", "root", "", "Blood_Organ");
				 
				// Check connection
				if($mysqli === false){
				    die("ERROR: Could not connect. " . $mysqli->connect_error);
				}

				if (isset($_POST['Appointments'])) {
				  // Escape user inputs for security
				$NatID = $mysqli->real_escape_string($_POST['NatID']);
				$appointment_date = $mysqli->real_escape_string($_REQUEST['appointment_date']);
				$appointment_time = $mysqli->real_escape_string($_POST['appointment_time']);
				

				$sql = "SELECT InstitutionID FROM Institution WHERE Name = '".$_SESSION['Name']."'";

				$result = $mysqli-> query($sql) ;


				$institutionid = "";
				if ($result-> num_rows > 0) {
				  while ($row= $result-> fetch_assoc()) {
				    $institutionid = $row['InstitutionID'];
				  }
				}

				$sql3 = "SELECT UserID FROM users WHERE NationalID = '".$NatID."'";

				$result1 = $mysqli->query($sql3);


				$UserID = "";
				if ($result1-> num_rows > 0) {
				  while ($row1= $result1-> fetch_assoc()) {
				    $UserID = $row1['UserID'];
				  }
				}
			
		
				
				$sql2 = "INSERT INTO appointments (laDate,Temp,UserID,InstitutionID) VALUES ('$appointment_date','$appointment_time','".$UserID."','".$institutionid."')";
				
				if ($mysqli-> query($sql2)) {
				   header("location: institution.php");
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
			<!-- End Header Area -->
				<section class="banner-area relative" id="home" style="font-size: 15px;">
				<div class="container">
							<div class="banner-content col-lg-12 col-md-12">
						
							<hr>
							<div class="container bootstrap snippet">
							    <div class="row">
							      <div class="col-sm-10"><h1><?php echo $name;?></h1></div>
							      <div class="col-sm-2"><a href="#" class="pull-right"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGISURBVGhD7Zk/K0ZhGIcPGSSxySBkkMFmNfAhDCQGsfoSDHwBpUwomW1GRpNJ+QIy+M+gxPU7nVNP6pzn7q33PY/cV13Dc3rut/vXc/70dmeO47REF67iFX7id8M+4QlOoRmFOMDyR77woUFfsOzlFefRxAqq6Bl1Kv3YNON4hOrrDgcwim4nFShESuhOuUD1tq4LdWizngndTimcxG82UUH28lUNg6iNerhSZAnV33G+qsGDdAgPEqMHJwJH0EIvhnXDaKFtQUZR+0uv0cIshnVnaMGDxPAgGNZ5kCo8SKEHQQsdC3KLMwbXMKxLLkirepAqPEjhB+qvcswbDOuSC+KvX7TgQWJ4EAzrPEgVHqTwzwYZwvPAfbQwjWHdFlpoW5BO40FS4/8F6UNtfMtX6bGM6u8wX0V4RG3WuCs1tlG97eSrCJqelqm7dSERxlDDUfVmGohO4juq4BI17lpo0EXUSZQhrB/PHCW+RxWmpEKYJrohGoZuoAaPpw2qN9QuzqHjOC2RZT96/P+f4tw1aQAAAABJRU5ErkJggg=="></a></div>
							    </div>
							    <div class="row">
							     <div class="col-sm-3"><!--left col-->
							      <div class="text-center">
							        <img src="images/<?php echo $Image; ?>" class="avatar img-rounded img-thumbnail" alt="avatar">
							        
							      </div></hr><br>

							        
							    
							          
							        </div><!--/col-3-->
							      <div class="col-sm-9">
							            <ul class="nav nav-tabs">
							               <li><a data-toggle="tab" href="#homee">Home</a></li>&nbsp;
							                <li><a data-toggle="tab" href="#Edit">Edit</a></li>&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#BloodBank">Blood Bank</a></li>&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#View_blood_bank">View Blood Bank</a></li>&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#transfusions">Transfusions</a></li>&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#Events">Events</a></li>&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#Appointments">Appointments</a></li>&nbsp;&nbsp;
							                <li><a data-toggle="tab" href="#BloodChart">Blood Chart</a></li>&nbsp;&nbsp;
							                <li><a  href="messo.php">Send Alert</a></li>&nbsp;&nbsp;
							              </ul>
							            <div class="tab-content">
							            <div class="tab-pane active" id="homee">
							                <hr>
							                  <h4><?php echo "Name: " .$name;?></h4><br>
							                  <h4><?php echo "Contact: "."0" . $PhoneNo;?></h4><br>
							                  <h4><?php echo "Address: ". $Address;?></h4><br>
							                  <h4><?php echo "Location: ". $Location;?></h4><br>
							                  <h4><?php echo "Email: ". $Email;?></h4><br>
							                <hr>
							              
							             </div><!--/tab-pane-->
							        <div class="tab-pane" id="Edit">
							               
							               <h2></h2>
							               
							               <hr>
							                <form class="form" action="institution.php" method="post" enctype="multipart/form-data">
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="first_name"><h4>Full Name</h4></label>
							                              <input type="text" class="form-control" name="name" id="first_name" readonly placeholder="first name" value='<?php echo $name ?>'>
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                            <label for="last_name"><h4>Address</h4></label>
							                              <input type="text" class="form-control" name="address" id="Address" placeholder="Address" value="<?php echo $Address?>">
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
							                              <label for="location"><h4>Location</h4></label>
							                              <input type="text" class="form-control" id="location" name="location" placeholder="location" value="<?php echo $Location?>">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="email"><h4>Email</h4></label>
							                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?php echo $Email?>">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          <div class="col-xs-6">
							                              <label><h4>Upload a different photo...</h4></label><br>
							        				<input type="file" name="Image" class="text-center center-block file-upload">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                           <div class="col-xs-12">
							                                <br>
							                                <button class="btn btn-lg btn-success" name="update" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Update</button>
							                            </div>
							                      </div>
							                </form>
							               
							             </div><!--/tab-pane-->

							            
						    <div class="tab-pane" id="BloodBank">
							    <div class="login-form">    
							    <form action="institution.php" method="post">
							      <h4 class="modal-title">Blood Bank</h4>

							        <div class="form-group">
							            <select name="BloodType" class="form-control" style="min-height: 40px;">
							        <option value="A+">A+</option>
							        <option value="O+">O+</option>
							        <option value="B+">B+</option>
							        <option value="AB+">AB+</option>
							        <option value="A-">A-</option>
							        <option value="O-">O-</option>
							        <option value="B-">B-</option>
							        <option value="AB-">AB-</option>
							      </select>
							        </div><br><br>
							         <div class="form-group">
							            <input type="text" class="form-control" name="amount" style="min-height: 40px;" placeholder="Amount in units" required="required">
							        </div>
							        <input type="submit" name="Save" class="btn btn-primary btn-block btn-lg" value="Save">              
							    </form>     
							</div>
							               
							</div><!--/tab-pane-->
							<div class="tab-pane" id="View_blood_bank">
							<h2 style="text-align: center;">Blood Bank</h2>
							    <div class="login-form" >
							<section class="banner-area relative" id="home" style="font-size: 15px;">
							<div class="container">
							<div class="banner-content col-lg-12 col-md-12">								
								  <table class="table table-stripped" style="align-content: center;">
								    <thead>
								      <tr>
								       <th>Name</th>
								       <th>Blood Type</th>
								       <th>Amount</th>
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

								  
							        
							       $sql1  = "SELECT Name,BloodType,Amount FROM `institution` JOIN bloodbank ON institution.InstitutionID = bloodbank.InstitutionID GROUP BY institution.Name, bloodbank.BloodType having institution.Name = '".$name."'";  
							        
							        $result1 = $con->query($sql1);
							    
								  $status = "";
								  $a = 0;
								  if($a === 1)
								    {
								      $status = "disabled";
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
								        <td>".$row1['BloodType']."</td>
								        <td>".$row1['Amount']."</td>
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

				            <div class="tab-pane" id="transfusions">
							     <div class="login-form">    
							    <form action="institution.php" method="post">
							      <h4 class="modal-title">Blood Transfusions</h4>
							      <br>
							      <div class="form-group">
							            <select name="BloodType" class="form-control" style="min-height: 40px;">
							        <option value="A+">A+</option>
							        <option value="O+">O+</option>
							        <option value="B+">B+</option>
							        <option value="AB+">AB+</option>
							        <option value="A-">A-</option>
							        <option value="O-">O-</option>
							        <option value="B-">B-</option>
							        <option value="AB-">AB-</option>
							      </select>
							        </div><br><br>
							         <div class="form-group">
							            <input type="text" class="form-control" style="min-height: 40px;" name="amount" placeholder="Amount in units" required="required">
							        </div>
							        <div class="form-group">
							            <input type="text" class="form-control" style="min-height: 40px;" name="date" placeholder="2018/05/13" required="required">
							        </div>
							        <input type="submit" name="savedata" class="btn btn-primary btn-block btn-lg" value="save">              
							    </form>     
							              </div>
							               
							</div><!--/tab-pane-->
 							<div class="tab-pane" id="Events">
							               
							               <h2></h2>
							               
							               <hr>
							                  <form class="form" action="##" method="post" id="Edit">
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="first_name"><h4>Event Name</h4></label>
							                              <input type="text" class="form-control" style="min-height: 40px;" name="event_name" id="first_name"  placeholder="Event name" >
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                            <label for="last_name"><h4>Event date</h4></label>
							                              <input type="text" class="form-control" style="min-height: 40px;" name="event_date" id="Address" placeholder="Event date" >
							                          </div>
							                      </div>
							          
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="phone"><h4>Event Venue</h4></label>
							                              <input type="text" class="form-control" style="min-height: 40px;" name="event_venue" id="phone" placeholder="Event Venue" >
							                          </div>
							                      </div>
							          
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="location"><h4>Event Time</h4></label>
							                              <input type="text" class="form-control" style="min-height: 40px;" id="location" name="event_time" placeholder="event_time">
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="email"><h4>Event Description</h4></label>
							                           <textarea class="form-control" cols="10" rows="10" name="event_description" placeholder="A brief description of the event">
							                           	
							                           </textarea>
							                          </div>
							                      </div>
							                      
							                     
							                   
							                      <div class="form-group">
							                           <div class="col-xs-12">
							                                <br>
							                                <button class="btn btn-lg btn-success" name="event" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Add</button>
							                            </div>
							                      </div>
							                </form>
							               
							             </div><!--tab-pane-->
			
 										<div class="tab-pane" id="Appointments">
							               
							               <h2></h2>
							               
							               <hr>
							                  <form class="form" action="institution.php" method="post" id="Edit">
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="first_name"><h4>Patients ID</h4></label>
							                              <input type="text"  class="form-control" name="NatID" id="first_name" style="min-height: 40px;"  placeholder="Patients National ID  Number" >
							                          </div>
							                      </div>
							                      <div class="form-group">
							                          
							                          <div class="col-xs-6">
							                            <label for="last_name"><h4>Appointment date</h4></label>
							                              <!-- <input type="text" class="form-control" name="appointment_date" id="Address" placeholder="Appointment date"> -->
							                              <div id="date" class="input-append date">
														      <input type="text" name="appointment_date" style="min-height: 40px;"></input>
														      <span class="add-on">
														        <i style="height: 40px!important;" ></i>
														      </span>
														    </div>
							                          </div>
							                      </div>
							                      
   
							          				<div class="form-group">
							                          
							                          <div class="col-xs-6">
							                              <label for="location"><h4>Appointment Time</h4></label>
							                              <!-- <input type="text" class="form-control" id="location" name="appointment_time" placeholder="Appointment time"> -->
							                               <div id="time" class="input-append date">
														      <input type="text" name="appointment_time" style="min-height: 40px;"></input>
														      <span class="add-on">
														        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
														      </span>
														    </div>
							                          </div>
							                      </div>
							                     <div class="form-group">
							                           <div class="col-xs-12">
							                                <br>
							                                <button class="btn btn-lg btn-success" name="Appointments" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Add</button>
							                            </div>
							                      </div>
							                </form>
							               
							             </div><!--tab-pane-->
							             <div class="tab-pane" id="BloodChart">
							               
							               <h2></h2>

			 
										
							               <hr>
							                  <div id="chart-container">
												<canvas id="mycanvas"></canvas>
											</div>

											<!-- javascript -->
											<script type="text/javascript" src="jquery.js"></script>
											<script type="text/javascript" src="Chart.min.js"></script> 
											<script type="text/javascript" src="app.js"></script>
							               
							             </div><!--tab-pane-->
							               
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