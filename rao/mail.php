<?php

## CONFIG ##

# LIST EMAIL ADDRESS
$recipient = "Philipp_Diekhoner@manulife.com";

# SUBJECT (Subscribe/Remove)
$subject = "Subscribe person";

# RESULT PAGE
$location = "index.php";

# EMAIL

$email = $_REQUEST['email'];

## FORM VALUES ##

# SENDER - WE ALSO USE THE RECIPIENT AS SENDER IN THIS SAMPLE
# DON'T INCLUDE UNFILTERED USER INPUT IN THE MAIL HEADER!
$sender = $recipient;

# MAIL BODY
$body .= "Email: ".$email." \n";
# add more fields here if required

## SEND MESSGAE ##


if (!empty($email)) {
    mail( $recipient, $subject, $body, "From: $sender" ) or die ("Mail could not be sent.");
}
    
## SHOW RESULT PAGE ##

header( "Location: $location" );
?>