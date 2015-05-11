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
    // $this->_db->exec(
    //     'DELETE FROM T_ARTIST_ART
    //     WHERE ='.$artist->nom()
    //      );
    $this->_db->prepare(
        'DELETE FROM T_ARTIST_ART
        WHERE ART_ID = :id'
         );
    $rq->bindvalue(':id', $user->id());
    $rq->execute();

    $count = $rq->rowCount();

    return ($count>0);
  }

  // Retourne un artist
  public function get($id) {
    
    $rq = $this->_db->prepare(
      'SELECT ART_NOM as nom,
      FROM T_ARTIST_ART 
      WHERE ART_ID = :id'
      );
    $rq->bindvalue(':id', $id);
    $rq->execute();
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    if ($donnees) {
      return new Artist($donnees);
    }
    return false;
  }


  // Modifie un artiste dans la BDD
  public function update(Artist $artist) {
    $rq = $this->_db->prepare(
        'UPDATE T_ARTIST_ART
        SET ART_NOM = :nom,
        WHERE ART_ID = :id'
      );

    $rq->bindvalue(':id', $artist->id());
    $rq->bindvalue(':nom', $artist->nom());

    $rq->execute();

    $count = $rq->rowCount();

    return ($count>0);
  }

}



?>