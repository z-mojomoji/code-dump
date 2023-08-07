<?php

$message='Hi,';
$message.='<br/>';
$message.='<br/>';
$message.='<b>Contact Details are as following:</b>';
$message.='<br/>';
$message.='<br/>';
$message.='<b>Name: </b>'.$_POST['name'];
$message.='<br/>';
$message.='<b>Email: </b>'.$_POST['email'];
$message.='<br/>';
$message.='<b>Telephone No.: </b>'.$_POST['tel'];
$message.='<br/>';
$message.='<b>Message: </b>'.$_POST['message'];
$to = 'info@webmaster.com';

$subject = 'Palaces Jewellery Contact Form';

$headers = "From: Palaces Jewellery<".$_POST['email'].">\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to, $subject, $message, $headers);

 header("Location: contact-us.html");

?>