<?php
session_start();
require_once('db.php');
  $sql = "select * from users where Username = '".$_SESSION['Username']."'";
      $result = $con->query($sql); 
    if(!($result = $con ->query($sql))){
        echo $con->error;
      }

    if($result-> num_rows > 0) {

    while ($row = $result->fetch_assoc()) 
    { 
        $natID = $row['NationalID'];
    }
    }

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kiplelisaac@gmail.com';                 // SMTP username
    $mail->Password = 'chepkurui';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true
)
);                                    // TCP port to connect to

    if (isset($_POST['patient'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $emails = $_POST['leMail'];
    $subjects =$_POST['subject'];
    $message = $_POST['message'];

    $message1 = $message . "<br>"."National ID: ". $natID . "<br>"."Please reply to this email. "."<br>" ."Thank You ". "<br>" . $email;


    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($emails);     // Add a recipient


   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjects;
    $mail->Body    = $message1;
    $mail->AltBody = $message1;

    $mail->send();
    header("location: index.php");
    echo 'Message has been sent';
    
} 
elseif (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $emails = "isaac.kiplel@strathmore.edu";
    $subjects = "Queries on the system";
    $message = $_POST['message'];
    
    $message1 = $message . "<br>" . "Please reply to this email. "."<br>" ."Thank You ". "<br>" . $email;
      //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($emails);     // Add a recipient


   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjects;
    $mail->Body    = $message1;
    $mail->AltBody = $message1;

    $mail->send();
    header("location: index.php");
    echo 'Message has been sent';
}
elseif (isset($_POST['admin'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $emails = $_POST['email2'];
    $subjects = $_POST['Subject'];;
    $message = $_POST['message'];
    
    $message1 = $message . "<br>" . "Please reply to this email. "."<br>" ."Thank You ". "<br>" . $email;
      //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($emails);     // Add a recipient


   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjects;
    $mail->Body    = $message1;
    $mail->AltBody = $message1;

    $mail->send();
    header("location: admin.php");
    echo 'Message has been sent';
}
}
catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

}

?>

