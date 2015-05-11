<?php

require_once 'Video.class.php';

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


// Ajoute d'une vidéo à la BDD
public function add(Video $video) {
    $rq = $this->_db->prepare(
        'INSERT INTO T_VIDEO_VID (VID_TITLE, VID_YEAR, VID_SBT)
        VALUES (:title, :year, :sbt);'
      );
    $rq->bindvalue(':title', $video->title());
    $rq->bindvalue(':year', $title->year());
    $rq->bindvalue(':sbt', $title->sbt());
   
    $rq->execute();

    // Retourne vrai si il y a eu une insertion
    $count = $rq->rowCount();
    return ($count>0);
  }

  // Supprime une video de la BDD
  // public function delete($id) {
  public function delete(Video $video) {
        // $this->_db->exec(
        // 'DELETE FROM T_VIDEO_VID
        // WHERE VID_ID='.$id
        //  );
    // les requêtes préparées évitent les erreurs (ex : guillemets)
    $this->_db->prepare(
      'DELETE FROM T_VIDEO_VID
      WHERE VID_ID = :id'
    );

    $rq->execute();

    $rq->bindvalue(':id', $video->id());
    // Retourne vrai si il y a eu une suppression
    $count = $rq->rowCount();
    return ($count>0);
  }

  // Retourne une video
  public function get($id) {
    
    // $rq = $this->_db->query(
    //   'SELECT VID_ID as "id",
    //           VID_TITLE as "title",
    //           VID_YEAR as "year"
    //       FROM T_VIDEO_VID 
    //   WHERE VID_ID = '.$id
    //   );
    
    $rq = $this->_db->prepare(
      'SELECT VID_ID as "id",
              VID_TITLE as "title",
              VID_YEAR as "year",
              VID_SBT as "sbt"
          FROM T_VIDEO_VID 
      WHERE VID_ID = :id'
      );
    $rq->bindvalue(':id', $id);

    $donnees = $rq->fetch(PDO::FETCH_ASSOC);

    if ($donnees)
      return new Video($donnees);
    else
      return false;
  }

  // Retourne toutes les vidéos  
  public function getList() {
    $videos = [];

    $rq = $this->_db->query(
        'SELECT  VID_ID as "id",
                 VID_TITLE as "title", 
                 VID_YEAR as "year" 
            FROM T_VIDEO_VID 
            order by VID_TITLE'
      );
    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $videos[] = new Video($donnees);
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
    // ça ne respecte pas les pays aléatoires. (pays A, pays B, pays C) -> Pour la v2 ?
    // De plus ça devrait sélectionner 3 vidéos différentes.
    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $videos[] = new Video($donnees);
    }

    return $videos;
  }

  // Modifie une video dans la BDD
  public function update(Video $video) {
    $rq = $this->_db->prepare(
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