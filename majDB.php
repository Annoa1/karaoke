<?php
require 'class/user.class.php';
session_start(); // A laisser en premiere ligne

require 'include/db.php';
require 'class/VideoManager.class.php';
require_once 'class/PaysManager.class.php';
require_once 'class/ArtistManager.class.php';
require 'include/fonctions.php';

// verification de l'admin
check_admin();



// connexion BDD
$db = db_connexion();

// Les managers
$video = new Video();
$videoManager = new VideoManager($db);
$paysManager = new PaysManager($db);
$artistManager = new ArtistManager($db);

// Initialisation de la vidéo

$video=$videoManager->get($_POST['id']);

$video->setTitle($_POST['titre']);
$video->setYear($_POST['annee']);

$Video = $videoManager->update($video);
go_home('admin-video.php');
?>
