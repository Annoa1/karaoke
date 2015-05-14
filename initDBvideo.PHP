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

// vérification des initialisations des variables $_POST
if(!isset($_POST['titre']) || !isset($_POST['annee'])) {
	$_SESSION['msg'] = "Code Erreur = 1";
	go_home('admin-video.php');
}
if(!isset($_POST['pays']) || !isset($_POST['artist'])) {
	$_SESSION['msg'] = "Code Erreur = 2";
	go_home('admin-video.php');
}

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

// Pays
$tab = explode('-', $_POST['pays'], 2);
if (sizeof($tab) != 2) {
	$_SESSION['msg'] = "Code Erreur = 3";
	go_home('admin-video.php');
}
$idPays = $tab[0];
$pays = $paysManager->get($idPays);
if (!$pays) {
	$_SESSION['msg'] = "Code Erreur = 4";
	go_home('admin-video.php');
}
$video->setPays($pays);

// Pour chaque artistes
foreach ($_POST['artist'] as $artString) {

	// Si la chaîne n'est pas vide
	if ($artString != "") {
		$tab = explode('-', $artString, 2);

		// Si l'artiste existe déjà
		if ((sizeof($tab) == 2) && (preg_match('/^[0-9]*$/', $tab[0]))) {
			$idArtist = $tab[0];
			$nomArtist = $tab[1];
			if ($artist = $artistManager->get($idArtist))  {
				$video->addArtist($artist);
			}
		}

		// C'est un nouvel artist
		else {
			$artist = new Artist();
			$artist->setNom($artString);

			if ($idArtist = $artistManager->add($artist)) {
				$artist = $artistManager->get($idArtist);
				$video->addArtist($artist);
			}
		}
	}
}

// Chargement de la vidéo
// S'il n'existe pas, erreur
if (!isset($_FILES['video'])) {
	$_SESSION['msg'] = "Code Erreur = 9";
	go_home('admin-video.php');
}
// Si sa taille est nulle ou si ce n'est pas un mp4 erreur
if (!$_FILES['video']['size'] || !($_FILES['video']['size']!='video/mp4')) {
	$_SESSION['msg'] = "Code Erreur = 10";
	go_home('admin-video.php');
}

$sbt = false;
// Si fichiers sous-titres
if (isset($_FILES['vtt']) && isset($_FILES['srt']) && isset($_FILES['srt_prog'])) {
	// Il faut que les trois fichiers soient donnés
	if ($_FILES['vtt']['size'] && $_FILES['srt']['size'] && $_FILES['srt_prog']['size']) {
		$video->setSbt(true);
		// Vérification des extensions 
		if (substr($_FILES['vtt']['name'], -3) != 'vtt') {
			$_SESSION['msg'] = "Code Erreur = 6";
			go_home('admin-video.php');
		}
		if (substr($_FILES['srt']['name'], -3) != 'srt') {
			$_SESSION['msg'] = "Code Erreur = 7";
			go_home('admin-video.php');
		}
		if (substr($_FILES['srt_prog']['name'], -3) != 'srt') {
			$_SESSION['msg'] = "Code Erreur = 8";
			go_home('admin-video.php');
		}
		// On peut charger les sous-titres dans la BDD
		$sbt = true;
	}
	else {
		$_SESSION['msg'] = "Code Erreur = 5";
		go_home('admin-video.php');
	}
}

$video->setSbt($sbt);

// On enregistre la vidéo dans la BDD
$idVideo = $videoManager->add($video);
if (!$idVideo) {
	$_SESSION['msg'] = "Code Erreur = 9";
	go_home('admin-video.php');
}


// On peut charger les sous-titres et les vidéos
move_uploaded_file($_FILES['video']['tmp_name'], 'video/'.$idVideo.'.mp4');
if ($sbt) {
	move_uploaded_file($_FILES['vtt']['tmp_name'], 'sbt/vtt/'.$idVideo.'.vtt');
	move_uploaded_file($_FILES['srt']['tmp_name'], 'sbt/srt/'.$idVideo.'.srt');
	move_uploaded_file($_FILES['srt_prog']['tmp_name'], 'sbt/srt_prog/'.$idVideo.'.srt');
}


$_SESSION['msg'] = "La vidéo ".$video->title()." a bien été ajoutée.";
go_home('admin-video.php');


?>
