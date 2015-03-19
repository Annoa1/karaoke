<?php

function db_connexion() {
	$name = "oktosing";
	$host = "127.0.0.1";
	$user = "root";
	$password = "";

	try {
		$db = new PDO("mysql:host=$host;dbname=$name;charset=utf8",$user, $password);
		return $db;

	} catch (PDOException $ex) {
		echo "Problème connexion MySQL !".$ex->getMessage();
	}
}


?>