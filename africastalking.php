<?php
// Be sure to include the file you've just downloaded
function sendSMSAT($message , $recipients)
{
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
$username    = "gfour";
// $apiKey      = "4ca14a0586917b7fc6db30a24efc51fead372327c3fc9a88bb71e59805ebc6cf"; 

$apiKey = "8dc49fd0e9582119455fc2cc8859c7235a77e555b7117466c4243045feac70cf";

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
// $recipients = "+254725834359";
// And of course we want our recipients to know what we really do
// $message = "Test Message";

// Create a new instance of our awesome gateway class
$gateway  = new AfricaStalkingGateway($username, $apiKey);

// Thats it, hit send and we'll take care of the rest
$results  = $gateway->sendMessage($recipients, $message);
if ( count($results) ) {
  // These are the results if the request is well formed
  foreach($results as $result) {
//	echo " Number: " .$result->number;
	//echo " Status: " .$result->status;
	// echo " Cost: "   .$result->cost."\n";
  }
} else {
	// We only get here if we cannot process your request at all
	// (usually due to wrong username/apikey combinations)
  	echo "Oops, No messages were sent. ErrorMessage: ".$gateway->getErrorMessage();
}
// DONE!!!
}
?>