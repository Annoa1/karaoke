<?php

include 'Artist.class.php';

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

}

// Supprime un artiste dans la BDD
  public function delete(Artist $artist) {
    $this->_db->exec(
        'DELETE FROM T_ARTIST_ART
        WHERE ='.$artist->nom()
         );
  }

  // Retourne un artist
  public function get($artist) {
    
    $rq = $this->_db->query(
      'SELECT ART_NOM as nom,
      
          FROM T_ARTIST_ART 
      WHERE ART_NOM = '.$artist
      );
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    return new Video($donnees);
  }


  // Modifie un artiste dans la BDD
  public function update(Artist $artist) {
    $rq = $this->_db->prepare(
        'UPDATE T_ARTIST_ART
        SET 
        ART_NOM = :nom,
        WHERE ART_NOM = :nom'
      );

    $rq->bindvalue(':nom', $video->nom());
 

    $rq->execute();
  }

}



?>