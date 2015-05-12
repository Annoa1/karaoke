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
$titre = $_POST['titre'];
$year = $_POST['annee'];

// connexion BDD
$db = db_connexion();

$newvideo = new VideoManager($db);

$videotoadd= new Video();

$videotoadd->setTitle($titre);
$videotoadd->setYear($year);

if ($newvideo->add($videotoadd)) {
	go_home('admin-video.php');
} else {
	go_home('admin-video.php');
}

?>