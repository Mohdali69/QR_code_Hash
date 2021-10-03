<?php

include "db_conn.php";

if (isset($_POST['urlqr']) && isset($_POST['YEmail'])) {

	if (isset($_POST['Email']) || isset($_POST['phone']) ) {


	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$Email = validate($_POST['Email']);
	$url = validate($_POST['urlqr']);
  $ymail = validate($_POST['YEmail']);
	$phonenum = validate($_POST['phone']);

	if (empty($Email) && empty($phonenum)) {
		header("Location: index.php?error=Receiver is required");
	    exit();
	}else if(empty($url)){
        header("Location: index.php?error=URL or text is required");
	    exit();
	}else if(empty($ymail)){
        header("Location: index.php?error=Your Email is required");
	    exit();
	}else{
    $code = generateRandomString();
		$code = password_hash($code, PASSWORD_BCRYPT);
		$sql = $bdd->prepare("INSERT INTO `qr_code`(`URL`, `CODE`) VALUES ('".$url."','".$code."')");
		$sql->execute();


		if (!empty($Email)) {

    $subject = 'QR code Hash';
    $message = 'Bonjour, Vous venez de recevoir un QR code securisé de la part de : '.$ymail."\n".'Votre code de securité afin de recuperer votre QR code est :'.$code."\n".'Veuillez contacter la personne qui vous la envoyée avant de valider le code.';
    $headers = array(
        'From' => 'noriplayepsi@gmail.com',
        'Reply-To' => $Email,
        'X-Mailer' => 'PHP/' . phpversion()
);

		mail($Email, $subject, $message, $headers);
		header("Location: index.php?success=E-mail send");
	}
	if (!empty($phonenum)) {

	// Authorisation details.
	$username = "mohmohdu69@gmail.com";
	$hash = "99fdf12ee852cd579d78865dc0fcb6c83d2b64d7c3d6c3421a4d4c6df7811885";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "QR Code Hash"; // This is who the message appears to be from.
	$numbers = $phonenum; // A single number or a comma-seperated list of numbers
	$message = "Bonjour, vous venez de reçecevoir votre code pour récupérer votre QR code : ".$code;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	header("Location: index.php?success= SMS send");
	}
}

}else {
	header("Location: index.php?error= No receiver Added");
}
}else{
	header("Location: index.php");
	exit();
}

function generateRandomString() {
    $length = 3;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
