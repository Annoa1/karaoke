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
					<video controls autoplay>
						<?php 
						// AJOUTER LE CHEMIN DE LA VIDEO
							//echo '<source src='video/'.$idVideo.'mp4'/>';
						?>

					</video>
				</div>
			<?php } 
				if ($afficherPoulpe) { ?>
				<div id="choice">
					<div id="chrono">--</div>
        	<div class="poulpe">
        		<!-- on renvoit à la page play.php la video -->
        		<a href="play.php?id=<?php echo $videos[0]->id() ?>"><img src="./img/octopus_cute_green.png"></a>
        		<a class="title" href="play.php?id=<?php echo $videos[0]->path() ?>">Pays A</a>
        	</div> 
        	<div class="poulpe">
        		<a href="play.php?id=<?php echo $videos[1]->id() ?>"><img src="./img/octopus_cute_pink.png"></a>
        		<a class="title" href="play.php?id=<?php echo $videos[1]->path() ?>">Pays B</a>
        	</div> 
        	<div class="poulpe">
        		<a href="play.php?id=<?php echo $videos[2]->id() ?>"><img src="./img/octopus_cute_purple.png"></a>
        		<a class="title" href="play.php?id=<?php echo $videos[2]->path() ?>">Pays C</a>
        	</div>
        	<input type="hidden" id="default_id" value="<?php echo $videos[2]->id() ?>">
				</div>
			<?php } ?>

		</div>

		<?php include 'include/footer.php'; ?>
		<script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
	</body>
</html>