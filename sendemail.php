<?php

$EmailTo="cotizaciones@insivp.com";
//$Subject="Email from the Contact Form";
$Name=Trim(stripslashes($_POST['name']));
$Email=Trim(stripslashes($_POST['email']));
$Subject=Trim(stripslashes($_POST['subject']));
$Message=Trim(stripslashes($_POST['message']));

// simple way to validate the form
$ValidationOk=true;
if ($Name == "") $ValidationOk=false;
	if (!$ValidationOk) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
		exit;
	}
		
	// preparing the body of the email 
	$Body="";
	$Body.="Nombre: ";
	$Body.=$Name;
	$Body.="\n";

	$Body.="Message: ";
	$Body.=wordwrap($Message, 70, "\r\n");
	$Body.="\n";

	//sending the email now
	$success=mail($EmailTo, $Subject, $Body,"From: <$Email>");

	//redirect after mail send 
	if ($success) {
 
       print "<meta http-equiv=\"refresh\" content=\"0;URL=send.html\">";

	}
	else {

		print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";

	}
?>