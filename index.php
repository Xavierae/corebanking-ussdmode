<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to Xearth Core Banking \n";
    $response .= "1. Account Detail \n";
    $response .= "2. Check Balance";
    /* $response .= "3. Register \n";
    $response .= "4. Send Money";
    $response .= "5. Check Balance \n";
    $response .= "6. Withdraw Cash "; */

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Your personal information \n";
    $response .= "1. Audited \n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "Your total balance is ".$phoneNumber;

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "XAVIERASSI001";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your account number is ".$accountNumber;

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;