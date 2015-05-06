<?php

class Pays {

  private $_id;
  private $_nom;

  public function __construct($donnees) {
    if (isset($donnees)) {
      $this->hydrate($donnees);
    }
  }

  private function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);
          
      // Si le setter correspondant existe.
      if (method_exists($this, $method)) {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

  public function id() {
    return $this->_id;
  }

  public function nom() {
    return $this->_nom;
  }

  // Pas de setteur, car table de référence non-modifiable

}


?>