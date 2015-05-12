<?php
require_once 'class/User.class.php';
session_start();
include 'include/fonctions.php';
$id=$_GET['id'];
include 'include/db.php';
include 'class/VideoManager.class.php';
$db = db_connexion();
$myvideo = new VideoManager($db);
$myvideo= $myvideo->get($id);

$chemin=$myvideo->path();

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
					<?php 
					echo '<source src='.$chemin.' />';
					?>
			

				</video>
		
			</div>
		</div>

		<?php include 'include/footer.php'; ?>

	</body>
</html>