<?php

session_start(); // A laisser en premiere ligne

include 'include/db.php';
include 'class/VideoManager.class.php';
// $id=$_GET['id'];
$titre=$_POST['titre'];
$year=$_POST['annee'];

$db = db_connexion();
$newvideo = new VideoManager($db);

$videotoadd= new Video($db);
var_dump($videotoadd);
$video=$newvideo->setTitle($titre);
$newvideo->setYear($year);
var_dump($newvideo);

$new = $newvideo->add($newvideo);
var_dump($new);


?>

<html>
<head>
	<title></title>
</head>
<body>

<p> Video mis à jour avec succés 

	<a href="admin-video.php">Retourner à l'administration des vidéos</a>
</p>

</body>
</html>