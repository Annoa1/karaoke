<?php
session_start(); // A laisser en premiere ligne
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
			<div id="videoContainer">
				
				<video controls >
					<source src="./video/CanabasseNaGnouDem.mp4" type="video/mp4"/>
					<track kind="subtitles" src="./video/CanabasseNaGnouDem.vtt" srclang="en" default></track>
					<source src="./video/ponponpon.mp4" type="video/mp4"/>

				</video>
		
			</div>
		</div>

		<?php include 'include/footer.php'; ?>

	</body>
</html>