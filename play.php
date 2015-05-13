<?php
	require_once 'class/User.class.php';
	session_start();
	include 'include/fonctions.php';
	// $id=$_GET['id'];
	include 'include/db.php';
	include 'class/VideoManager.class.php';
	$db = db_connexion();
	$videoManager = new VideoManager($db);
	// $chemin=$myvideo->path();
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
					<video controls >
						<?php 
							echo '<source src='.$chemin.' />';
						?>

					</video>
				</div>
			<?php } 
				if ($afficherPoulpe) { ?>
				<div id="choice">
		        	<div>
		        		<!-- on renvoit à la page play.php la video -->
		        		<a class="title" href="play.php?id=<?php echo $videos[0]->path() ?>">Pays A</a>
		        		<a href="play.php?id=<?php echo $videos[0]->id() ?>"><img src="./img/octopus_cute_green.png"></a>
		        	</div> 
		        	<div>
		        		<a class="title" href="play.php?id=<?php echo $videos[1]->path() ?>">Pays B</a>
		        		<a href="play.php?id=<?php echo $videos[1]->id() ?>"><img src="./img/octopus_cute_pink.png"></a>
		        	</div> 
		        	<div>
		        		<a class="title" href="play.php?id=<?php echo $videos[2]->path() ?>">Pays C</a>
		        		<a href="play.php?id=<?php echo $videos[2]->id() ?>"><img src="./img/octopus_cute_purple.png"></a>
		        	</div>

				</div>
			<?php } ?>

		</div>

		<?php include 'include/footer.php'; ?>

	</body>
</html>