<?php

require_once 'Artist.class.php';

class ArtistManager {

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

  // Supprime un artiste dans la BDD
  public function delete(Artist $artist) {
    $rq = $this->_db->prepare(
        'DELETE FROM T_ARTIST_ART
        WHERE ART_ID = :id'
         );

    $rq->bindvalue(':id', $artist->id());
    $rq->execute();

    $count = $rq->rowCount();

    return ($count>0);
  }

  // Retourne un artist
  public function get($id) {
    
    $rq = $this->_db->prepare(
      'SELECT ART_ID as "id", 
              ART_NOM as "nom", 
              COUNT(VID_ID) as "nbVideos"
        FROM T_ARTIST_ART
          NATURAL LEFT JOIN TJ_REALISE_REA
          NATURAL LEFT JOIN T_VIDEO_VID
        WHERE ART_ID = :id
        GROUP BY ART_ID'
      );
    $rq->bindvalue(':id', $id);
    $rq->execute();
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    if ($donnees) {
      return new Artist($donnees);
    }
    return false;
  }

  public function getList() {
    $artists = [];

    $rq = $this->_db->query(
        'SELECT ART_ID as "id", 
              ART_NOM as "nom", 
              COUNT(VID_ID) as "nbVideos"
        FROM T_ARTIST_ART
          NATURAL LEFT JOIN TJ_REALISE_REA
          NATURAL LEFT JOIN T_VIDEO_VID
        GROUP BY ART_ID
        ORDER BY ART_NOM'
      );
    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $artists[] = new Artist($donnees);
    }

    return $artists;
  }


  // Modifie un artiste dans la BDD
  public function update(Artist $artist) {
    $rq = $this->_db->prepare(
        'UPDATE T_ARTIST_ART
        SET ART_NOM = :nom
        WHERE ART_ID = :id'
      );

    $rq->bindvalue(':id', $artist->id());
    $rq->bindvalue(':nom', $artist->nom());

    $rq->execute();

    $count = $rq->rowCount();

    return ($count>0);
  }

  // Ajoute un artiste à la BDD
  public function add(Artist $artist) {
    $rq = $this->_db->prepare(
        'INSERT INTO T_ARTIST_ART (ART_NOM)
        VALUE (:nom)'
      );

    $rq->bindvalue(':nom', $artist->nom());

    $rq->execute();

    if (!$rq->rowCount()) {
      return false;
    }

    return ($this->_db->lastInsertId());
  }

}



?>