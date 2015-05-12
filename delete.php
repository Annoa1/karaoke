<?php

include 'include/db.php';
include 'class/VideoManager.class.php';
$id=$_GET['id'];
$db = db_connexion();
$videoManager = new VideoManager($db);
$videotodelete= $videoManager->get($id);

$videos = $videoManager->delete($videotodelete);


// redirection pour retouner sur la page de gestion des videos
?>
