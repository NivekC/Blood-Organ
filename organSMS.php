<?php


        require_once('db.php');
           $result1 = ""; 

          $OrganType = $con->real_escape_string($_REQUEST['Organ']);
          $Query = $con->real_escape_string($_REQUEST['message']);

          // Be sure to include the file you've just downloaded
          require_once('AfricasTalkingGateway.php');
          // Specify your authentication credentials
          $username   = "bloodorgan";
          $apikey     = "8a62463cde8793afb7b02a417334a81962e17ccd3c81a7254db1b656f6681835";
          // Specify the numbers that you want to send to in a comma-separated list
          // Please ensure you include the country code (+254 for Kenya in this case)
            $sql = "SELECT PhoneNo FROM `donor` ";
            
            if(!($result1 = $con ->query($sql))){
                echo $con->error;
              }
             
            if($result1-> num_rows > 0) {

            
            while ($row1 = $result1->fetch_assoc()) {
            
            $string = $row1['PhoneNo'];
                 
            $recipients = $string;

            // /var_dump($recipients);
          // And of course we want our recipients to know what we really do
          $message    = $Query;
          // Create a new instance of our awesome gateway class
          $gateway    = new AfricasTalkingGateway($username, $apikey);
          /*************************************************************************************
            NOTE: If connecting to the sandbox:
            1. Use "sandbox" as the username
            2. Use the apiKey generated from your sandbox application
               https://account.africastalking.com/apps/sandbox/settings/key
            3. Add the "sandbox" flag to the constructor
            $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
          **************************************************************************************/
          // Any gateway error will be captured by our custom Exception class below, 
          // so wrap the call in a try-catch block
          try 
          { 
            // Thats it, hit send and we'll take care of the rest. 
            $results = $gateway->sendMessage($recipients, $message);
                      
            foreach($results as $result2) {
              // status is either "Success" or "error message"
              echo " Number: " .$result2->number;
              echo " Status: " .$result2->status;
              echo " StatusCode: " .$result2->statusCode;
              echo " MessageId: " .$result2->messageId;
              echo " Cost: "   .$result2->cost."\n";
              header("location: institution.php");
            }
          }
          catch ( AfricasTalkingGatewayException $e )
          {
             echo "Encountered an error while sending: ".$e->getMessage();
          }

              }
            }
            
