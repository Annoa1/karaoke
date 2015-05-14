<?php

// Zone administration
// Administration User
require_once 'class/User.class.php';
session_start();

// zone BDD
include 'include/db.php';
include 'class/VideoManager.class.php';
require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'videos';

if (!isset($_GET['id'])) {
  $_SESSION['msg'] = "La vidéo demandée n'existe pas.";
  go_home("admin-video.php");
}

// Administration Vidéo
$db = db_connexion();
$videoManager = new VideoManager($db);
$video = $videoManager->get($_GET['id']);

if (!$video) {
  $_SESSION['msg'] = "La vidéo demandée n'existe pas.";
  go_home("admin-video.php");
}

// Sous-titres
if (isset($_POST['sbt'])) {
  switch ($_POST['sbt']) {
    case 'srt':       $sbt='srt';       break;
    case 'srt_prog':  $sbt='srt_prog';  break;
    default:          $sbt='vtt';       break;
  }
}
else {
  $sbt = "vtt";
}

$titre = $video->title();
$chanteur = ($video->artist())? " - ".$video->artistToString(", ") : "";
$annee = ($video->year())? " (".$video->year().") " : "";
$pays = ($video->pays())? " [".$video->pays()->nom()."] " : "";

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titre ?></title>
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="icon" type="./img/png" href="./img/favicon.png"/>

    </head>

    <body>
    
    <?php include('include/admin-header.php') ?>
          
    <div id="content">

    <div align="center">

      <video controls="controls" autoplay>
        <source src="<?php echo $video->path(); ?>" type="video/mp4" />
        <track src="<?php echo $video->sbtPath($sbt); ?>" kind="subtitles" srclang="en" label="English" default/>
      </video>
      <p>
        <?php echo $titre.$chanteur.$annee.$pays ?>
      </p>
      <form id="form_sbt" method="post" action="admin-play.php?id=<?php echo $_GET['id']; ?>">
        <input type="radio" name="sbt" value="vtt" <?php if ($sbt=="vtt") echo 'checked="checked"'; ?>> .vtt
        <input type="radio" name="sbt" value="srt" <?php if ($sbt=="srt") echo 'checked="checked"'; ?>> .srt
        <input type="radio" name="sbt" value="srt_prog" <?php if ($sbt=="srt_prog") echo 'checked="checked"'; ?>> .srt (progressif)
      </form>
    
      </div>
      
    </div>
    <?php include('include/admin-footer.php') ?>

    <script src="js/captionator-min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/admin.js"></script>
    <script type="text/javascript">
        window.addEventListener("load",function(eventData) {
            captionator.captionify();
        });
    </script>
    </body>
     
</html>     
