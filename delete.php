<?php

include 'include/db.php';
include 'include/fonctions.php';
include 'class/VideoManager.class.php';
$id=$_GET['id'];
$db = db_connexion();
$videoManager = new VideoManager($db);
$videotodelete= $videoManager->get($id);

$videos = $videoManager->delete($videotodelete);

go_home('admin-video.php');
// redirection pour retouner sur la page de gestion des videos
?>
