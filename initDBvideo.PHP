<?php
require 'class/user.class.php';
session_start(); // A laisser en premiere ligne

include 'include/db.php';
include 'class/VideoManager.class.php';
include 'include/fonctions.php';

// verification de l'admin
check_admin();

// vérification valorisation$_POST
if(!isset($_POST['titre']) || !isset($_POST['annee'])) {
	go_home('addVideo.php');
}

// recuperation du titre et de l'année
<<<<<<< HEAD

$titre=$_POST['titre'];
$year=$_POST['annee'];
// $sbt=$_Files['video'];
=======
$titre = $_POST['titre'];
$year = $_POST['annee'];
>>>>>>> eb6a1798bbdf5f5d2682d4a6a189c6b907a0920d

// connexion BDD
$db = db_connexion();

$newvideo = new VideoManager($db);

$videotoadd= new Video();

$videotoadd->setTitle($titre);
$videotoadd->setYear($year);
<<<<<<< HEAD
// $videotoadd->setSbt($sbt);
var_dump($videotoadd);

$new = $newvideo->add($videotoadd);


?>

<html>
<head>
	<title></title>
</head>
<body>

<p> 
	<?php 
		if ($new) {
			echo "Video mis à jour avec succés ";
		}
	?>

	<a href="admin-video.php">Retourner gestion video</a>
</p>
=======

if ($newvideo->add($videotoadd)) {
	go_home('admin-video.php');
} else {
	go_home('admin-video.php');
}
>>>>>>> eb6a1798bbdf5f5d2682d4a6a189c6b907a0920d

?>
