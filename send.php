<?php

include "db_conn.php";

if (isset($_POST['Email']) && isset($_POST['urlqr']) && isset($_POST['YEmail'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$Email = validate($_POST['Email']);
	$url = validate($_POST['urlqr']);
  $ymail = validate($_POST['YEmail']);

	if (empty($Email)) {
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
		$sql = $bdd->prepare("INSERT INTO `qr_code`(`URL`, `CODE`) VALUES ('".$url."','".$code."')");
		$sql->execute();
    header("Location: index.php?success=E-mail send");


    $subject = 'QR code Hash';
    $message = 'Bonjour, Vous venez de recevoir un QR code securisé de la part de : '.$ymail.' Votre code de securité afin de recuperer votre QR code est :'.$code.' Veuillez contacter la personne qui vous la envoyer avant de valider le code.';
    $headers = array(
        'From' => 'noriplayepsi@gmail.com',
        'Reply-To' => $Email,
        'X-Mailer' => 'PHP/' . phpversion()
);

mail($Email, $subject, $message, $headers);
	}

}else{
	header("Location: index.php");
	exit();
}

function generateRandomString() {
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
