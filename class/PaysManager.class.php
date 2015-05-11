<?php

include 'Pays.class.php';

class PaysManager {

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

  // Retourne un pays
  public function get($id) {
    $id = (int) $id;

    $rq = $this->_db->prepare(
      'SELECT PAY_ID as id,
      PAY_NOM as nom
      FROM TR_PAYS_PAY
      WHERE PAY_ID = :id'.
      );
    $rq->bindvalue(':id', $id);
    $rq->execute();
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    if ($donnees) {
      return new Pays($donnees);
    }
    return false;
  }

  // Retourne tous les utilisateurs
  public function getList() {
    $pays = [];

    $rq = $this->_db->query(
        'SELECT PAY_ID as id,
        PAY_NOM as nom
        FROM TR_PAYS_PAY
        ORDER BY nom'
      );

    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $pays[] = new Pays($donnees);
    }

    return $pays;
  }

}


?>