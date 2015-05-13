<?php

require_once 'Video.class.php';
require_once 'PaysManager.class.php';

class VideoManager {

  // Instance de PDO
  private $_db;
  private $_paysManager;

  // Constructeur
  public function __construct($db) {
    $this->setDb($db);
  }

  // Setteur de _db
  public function setDb (PDO $db) {
    $this->_db = $db;
    $this->_paysManager = new PaysManager($db);
  }


// Ajoute d'une vidéo à la BDD
public function add(Video $video) {

    $rq = $this->_db->prepare(
        'INSERT INTO T_VIDEO_VID (VID_TITLE, VID_YEAR, VID_SBT)
        VALUES (:title, :year, :sbt, :);'
      );
    $rq->bindvalue(':title', $video->title());
    $rq->bindvalue(':year', $video->year());
    $rq->bindvalue(':sbt', $video->sbt());

    $rq->execute();

    $id = $_db->lastInsertId();
    $count = $rq->rowCount();

    // Si le pays est précisé
    if ($video->pays()) {
      $rq = $this->_db->prepare(
        'UPDATE T_VIDEO_VID 
        SET PAY_ID = :idPays
        WHERE VID_ID = :idVideo'
      );
      $rq->bindvalue(':idVideo', $video->id());
      $rq->bindvalue(':idPays', $video->pays()->id());
      $rq->execute();
    }

    // Si l'artiste est précisé
    if ($video->artist()) {
      $rq = $this->_db->prepare(
        'INSERT INTO TJ_REALISE_REA (VID ID, ART_ID)
        VALUES (:idVideo, :idArtist)'
      );
      $rq->bindvalue(':idVideo', $video->id());
      $rq->bindvalue(':idArtist', $video->artist()->id());
      $rq->execute();
    }

    // Retourne vrai si il y a eu une insertion
    
    return ($count>0);
  }

  // Supprime une video de la BDD
  public function delete(Video $video) {
    $rq=$this->_db->prepare(
      'DELETE FROM T_VIDEO_VID
      WHERE VID_ID = :id'
    );
   
    $rq->bindvalue(':id', $video->id());
        $rq->execute();
    // Retourne vrai si il y a eu une suppression
    $count = $rq->rowCount();
    return ($count>0);
  }

  // Retourne une video
  public function get($id) {
    $rq = $this->_db->query(
      'SELECT VID_ID as "id",
              VID_TITLE as "title",
              VID_YEAR as "year",
              VID_SBT as "sbt",
              PAY_ID as "idPays",
              ID_ART as "idArt",
              COUNT(ID_ART) as "nbArtists"
        FROM T_VIDEO_VID
          NATURAL LEFT JOIN TJ_REALISE_REA
        WHERE VID_ID = :id
        GROUP BY VID_ID'
      );
    $rq->bindvalue(':id', $id);

    $donnees = $rq->fetch(PDO::FETCH_ASSOC);

    if ($donnees) {
      $video = new Video($donnees);
      if ($donnees['idPays']) {
        $video->setPays($this->_paysManager->get($donnees['idPays']));
        return $video;
      }
    }
    else
      return false;
  }

  // Retourne toutes les vidéos  
  public function getList() {
    $videos = [];

    $rq = $this->_db->query(
        'SELECT  VID_ID as "id",
              VID_TITLE as "title",
              VID_YEAR as "year",
              VID_SBT as "sbt",
              PAY_ID as "idPays"
            FROM T_VIDEO_VID 
            order by VID_TITLE'
      );
    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $video = new Video($donnees);
      $videos[] = $video;
    }

    return $videos;
  }
// Retourne les vidéos de maniére aléatoire
  public function getRand(){ 
    $videos = [];

    $rq = $this->_db->query(
        'SELECT  VID_ID as "id",
        VID_TITLE as "title", 
        VID_YEAR as "year",
        VID_SBT as "sbt"
        FROM T_VIDEO_VID 
        order by rand() LIMIT 0,3 '
      );
    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $videos[] = new Video($donnees);
    }

    return $videos;
  }

  // Modifie une video dans la BDD
  public function update(VideoManager $video) {

    if ($video)
      $videotoadd=new Video($video);
    else
      return false;

    $rq = $this->_db->query(
        'UPDATE T_VIDEO_VID
        SET VID_TITLE = :title,
        VID_YEAR = :year,
        WHERE VID_ID = :id'
      );

   
    $rq->bindvalue(':title', $video->title());
    $rq->bindvalue(':year', $video->year());
   

    $rq->execute();
  }

}




?>