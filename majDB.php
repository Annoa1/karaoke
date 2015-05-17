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
$videoManager = new VideoManager($db);
$paysManager = new PaysManager($db);
$artistManager = new ArtistManager($db);

// Initialisation de la vidéo
$video = new Video();

$video->setTitle($_POST['titre']);
$video->setYear($_POST['annee']);

$Video = $videoManager->update($video);
// // Pays
// $tab = explode('-', $_POST['pays'], 2);
// if (sizeof($tab) != 2) {
// 	$_SESSION['msg'] = "Code Erreur = 3 merci de respecter l'ecrire du code pays . ex: I-T, F-R";
// 	go_home('admin-video.php');
// }
// $idPays = $tab[0];
// $pays = $paysManager->get($idPays);
// if (!$pays) {
// 	$_SESSION['msg'] = "Code Erreur = 4";
// 	go_home('admin-video.php');
// }
// $video->setPays($pays);

// // Pour chaque artistes
// foreach ($_POST['artist'] as $artString) {

// 	// Si la chaîne n'est pas vide
// 	if ($artString != "") {
// 		$tab = explode('-', $artString, 2);

// 		// Si l'artiste existe déjà
// 		if ((sizeof($tab) == 2) && (preg_match('/^[0-9]*$/', $tab[0]))) {
// 			$idArtist = $tab[0];
// 			$nomArtist = $tab[1];
// 			if ($artist = $artistManager->get($idArtist))  {
// 				$video->addArtist($artist);
// 			}
// 		}

// 		// C'est un nouvel artist
// 		else {
// 			$artist = new Artist();
// 			$artist->setNom($artString);

// 			if ($idArtist = $artistManager->add($artist)) {
// 				$artist = $artistManager->get($idArtist);
// 				$video->addArtist($artist);
// 			}
// 		}
// 	}
// }




?>
