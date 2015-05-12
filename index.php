<?php

require_once 'class/User.class.php';
session_start();

include 'include/db.php';
include 'class/VideoManager.class.php';
$db = db_connexion();
$videoManager = new VideoManager($db);
$videos = $videoManager->getRand();

?>

<!DOCTYPE html>

<html>
<head>
	<title>Oktosing</title>
	<meta charset="UTF-8">
	<link rel="icon" type="./img/png" href="./img/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
	<body>

		<?php include 'include/header.php'; ?>

		<div class="mainContainer">

			<div id="play">
				<p><img class="start" src="./img/kogmaw.png"></p>
				<div id="choice">
					<!-- 
						<a href=modif.php?id='.$video->id().'>Modifier</a></button></td>
						adresse : modif.php
						?		: il y a des parametre a la suite
						id 		: le nom de notre parametre
						$video->id : la valeur de notre parametre (ici on )
					 -->

		        	<div>
		        		<a class="title" href="play.php?id=<?php echo $videos[0]->id() ?>">Pays A</a>
		        		<a href="play.php?id=<?php echo $videos[0]->id() ?>"><img src="./img/octopus_cute_green.png"></a>
		        	</div>    		      

		        	<div>
		        		<a class="title" href="play.php?id=<?php echo $videos[1]->id() ?>">Pays B</a>
		        		<a href="play.php?id=<?php echo $videos[1]->id() ?>"><img src="./img/octopus_cute_pink.png"></a>
		        	</div>   		
		           
		        	<div>
		        		<a class="title" href="play.php?id=<?php echo $videos[2]->id() ?>">Pays C</a>
		        		<a href="play.php?id=<?php echo $videos[2]->id() ?>"><img src="./img/octopus_cute_purple.png"></a>
		        	</div> 
		        				        
				</div>								
			</div>

		</div>

		<?php include 'include/footer.php'; ?>

	</body>
</html>
