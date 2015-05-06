<?php

include 'Video.class.php';

class VideoManager {

  // Instance de PDO
  private $_db;

  // Constructeur
  public function __construct($db) {
    $this->setDb($db);
  }

  // Setteur de _db
  public function setDb (PDO $db) {
    $this->_db = $db;
  }

}

// Ajoute d'une vidéo à la BDD
  public function add(Video $video) {
    $rq = $this->_db->prepare(
        'INSERT INTO T_VIDEO_VID (VID_TITLE, VID_YEAR)
        VALUES (: title, :year);'
      );
    $rq->bindvalue(':title', $video->title());
    $rq->bindvalue(':year', $title->year());
   

    $rq->execute();
  }

  // Supprime une video de la BDD
  public function delete(Video $video) {
    $this->_db->exec(
        'DELETE FROM T_VIDEO_VID
        WHERE VID_TITLE='.$video->title()
         );
  }

  // Retourne une video
  public function get($title) {
    
    $rq = $this->_db->query(
      'SELECT VID_TITLE as title,
              VID_YEAR as year,
          FROM T_VIDEO_VID 
      WHERE VID_TITLE = '.$title
      );
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    return new Video($donnees);
  }

  // Retourne toutes les vidéos
  public function getList() {
    $users = [];

    $rq = $this->_db->query(
        'SELECT VID_TITLE as title,
                VID_YEAR as year,
          FROM T_VIDEO_VID 
        ORDER BY VID_TITLE'
      );

    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $videos[] = new Video($donnees);
    }

    return $videos;
  }

  // Modifie une video dans la BDD
  public function update(Video $video) {
    $rq = $this->_db->prepare(
        'UPDATE T_VIDEO_VID
        SET 
        VID_TITLE = :title,
        VID_YEAR = :year,
        WHERE VID_TITLE = :title'
      );

   
    $rq->bindvalue(':title', $video->title());
    $rq->bindvalue(':year', $video->year());
   

    $rq->execute();
  }

}




?>