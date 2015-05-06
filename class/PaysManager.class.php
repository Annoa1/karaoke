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

    $rq = $this->_db->query(
      'SELECT PAY_ID as id,
      PAY_NOM as nom
      FROM TR_PAYS_PAY
      WHERE PAY_ID = '.$id
      );
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    return new Pays($donnees);
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