<?php
	require 'class/User.class.php';
	session_start();
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
				<div class="kogmawContainer"><a href="play.php"><img class="start" src="./img/kogmaw.png"></a></div>							
			</div>

		</div>

		<?php include 'include/footer.php'; ?>

	</body>
</html>
