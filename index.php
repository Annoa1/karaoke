<?php
<<<<<<< HEAD

include 'include/db.php';
include 'class/VideoManager.class.php';
$db = db_connexion();
$videoManager = new VideoManager($db);
$video = $videoManager->getList();

?><!DOCTYPE html>
=======
require_once 'class/User.class.php';
session_start();

?>

<!DOCTYPE html>
>>>>>>> origin/master
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
				<img class="start" src="./img/kogmaw.png">
				<div id="choice">
					<!-- 
						<a href=modif.php?id='.$video->id().'>Modifier</a></button></td>
						adresse : modif.php
						?		: il y a des parametre a la suite
						id 		: le nom de notre parametre
						$video->id : la valeur de notre parametre (ici on )
					 -->

					<?php 
                    	echo '<a href="play.php?id='.$video->_id.'"><p>Pays A</p><img src="./img/octopus_cute_green.png"></a>';
                        echo '<a href="play.php?id='.$video->_id.'"><p>Pays B</p><img src="./img/octopus_cute_pink.png"></a>';
                        echo '<a href="play.php?id='.$video->_id.'"><p>Pays C</p><img src="./img/octopus_cute_purple.png"></a>';
                    ?>

				</div>								
			</div>

		</div>

		<?php include 'include/footer.php'; ?>

	</body>
</html>
