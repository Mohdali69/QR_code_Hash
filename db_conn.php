<?php

$bdd = new PDO('mysql:host=localhost;dbname=qr_code_hash;charset=utf8', 'root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
if (!$bdd) {
	echo "Connection failed!";
}
