<?php

$bdd = new PDO('mysql:host=localhost;dbname=gastronomie_maxime_peizhen;charset=utf8', 'root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
if (!$bdd) {
	echo "Connection failed!";
}
