<?php
session_start();
include "db_conn.php";
// Include qrcode.php file.

// Create object
include('php-qrcode-master/lib/full/qrlib.php');
if (isset($_POST['code'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}


	$pass = validate($_POST['code']);

	if (empty($pass)) {
		header("Location: index.php?lost=CODE is required");
	    exit();
	}else{
		$sql = $bdd->prepare("SELECT * FROM qr_code WHERE CODE ='$pass'");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$result = $sql->rowCount();

	if($result == 1 && !empty($row)) {
						$urlqrc = $row['URL'];
						$passwds = $row['CODE'];
            if ($passwds === $pass) {
						QRcode::png($urlqrc);
						exit();
            }else{
				header("Location: index.php?lost=Incorect CODE");
		        exit();
			}
		}else{
			header("Location: index.php?lost=Incorect CODE");
	        exit();
		}
	}

}else{
	header("Location: index.php?lost=Incorect CODE");
	exit();
}
