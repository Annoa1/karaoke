<?php
	require_once 'class/User.class.php';
	session_start();
	include 'include/fonctions.php';
	// $id=$_GET['id'];
	include 'include/db.php';
	include 'class/VideoManager.class.php';
	$db = db_connexion();
	$videoManager = new VideoManager($db);
	//$chemin=$myvideo->path();
	$afficherPoulpe=true;
	if(isset($_GET["id"]))
	{
		$afficherPoulpe=false;
		// On vérifie l'existance de la video
		$idVideo = $_GET["id"];
		$video=$videoManager->get($idVideo);

		if(!$video)
		{
			// Si elle n'existe pas on retourne a l'index
			go_home();
		}

		$titre = $video->title();
		$chanteur = ($video->artist())? " - ".$video->artistToString(", ") : "";
		$annee = ($video->year())? " (".$video->year().") " : "";
		$pays = ($video->pays())? " [".$video->pays()->nom()."] " : "";
	}
	else
	{
		$videos=$videoManager->getRand();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Oktosing</title>
	<meta charset="UTF-8">
	<link rel="icon" type="./img/png" href="./img/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
	<body>

		<?php include 'include/header.php'; ?>

		<div class="mainContainer">

			<?php 
				if(!$afficherPoulpe){ ?>
				<div id="videoContainer">
					<p>
						<?php echo $titre.$chanteur.$annee.$pays ?>
					</p>
					<video controls autoplay>
						<?php 
							/**/
							echo '<source src="'.$video->path().'"/>';
						?>

					<track src="<?php echo $video->sbtPath("vtt"); ?>" kind="subtitles" srclang="en" label="English" default/>

					</video>
					<div id="relancerPoulpes">
						
						<a href="play.php"><button>Relancer les poulpes</button></a>
						
					</div>				
				</div>
			<?php } 
				if ($afficherPoulpe) { ?>
				<div id="choice">
					<div id="chrono">--</div>

					<div id="poulpeContainer">
			        	<div class="poulpe">
			        		<!-- on renvoit à la page play.php la video -->
			        		<a href="play.php?id=<?php echo $videos[0]->id() ?>"><img src="./img/octopus_cute_green.png"></a><br>
			        		<a class="title" href="play.php?id=<?php echo $videos[0]->path() ?>">
				        		<?php echo $videos[0]->pays()->nom() ?><br>
				        		<?php echo $videos[0]->title() ?>
			        		</a>
			        	</div> 
			        	<div class="poulpe">
			        		<a href="play.php?id=<?php echo $videos[1]->id() ?>"><img src="./img/octopus_cute_pink.png"></a><br>
			        		<a class="title" href="play.php?id=<?php echo $videos[1]->path() ?>">
			        			<!-- Affichage du pays de la chanson et du titre de la chanson -->
			        			<?php echo $videos[1]->pays()->nom() ?><br>
			        			<?php echo $videos[1]->title() ?>
			        		</a>
			        	</div> 
			        	<div class="poulpe">
			        		<a href="play.php?id=<?php echo $videos[2]->id() ?>"><img src="./img/octopus_cute_purple.png"></a><br>
			        		<a class="title" href="play.php?id=<?php echo $videos[2]->path() ?>">
			        			<?php echo $videos[2]->pays()->nom() ?><br>
			        			Vidéo Mystère
			        		</a>
			        	</div>
			        </div>

			        <input type="hidden" id="default_id" value="<?php echo $videos[2]->id() ?>">
				</div>
			<?php } ?>

		</div>

		<?php include 'include/footer.php'; ?>
		<script src="js/jquery.js"></script>
    <script src="js/chrono.js"></script>
	</body>
</html>