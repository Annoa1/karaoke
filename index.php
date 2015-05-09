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

		<?php include 'header.php'; ?>

		<div class="mainContainer">

			<div id="play">
				<a href=""><img src="./img/kogmaw.png"></a>
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

		<?php include 'footer.php'; ?>

	</body>
</html>
