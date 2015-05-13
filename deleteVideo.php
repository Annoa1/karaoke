<?php

require_once 'class/User.class.php';
session_start();

include 'include/db.php';
include 'include/fonctions.php';
include 'class/VideoManager.class.php';

check_admin();

if (!isset($_GET['id'])) {
  go_home('admin-video.php');
}

$id = $_GET['id'];

$db = db_connexion();
$videoManager = new VideoManager($db);
$videotodelete = $videoManager->get($id);


if ($videotodelete) {
  $videos = $videoManager->delete($videotodelete);
}
else {
  go_home('admin-video.php');
}

// redirection pour retouner sur la page de gestion des videos
go_home('admin-video.php');
 
?>
