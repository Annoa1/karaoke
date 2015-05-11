<?php

class Artist {
	private $_id;
	 private $_nomArtiste;
  
}
// Récuperation des attributs
  public function id() {
    return $this->_id;
  }

  public function nom() {
    return $this->_nomArtiste;
  }

// Valorisation des attributs
 public function setNom($nomArtiste) {
    if (is_string($nomArtiste)) {
      
      $this->_nomArtiste = $nomArtiste;
    }
  }

  public function setId($idArtiste) {
    $this->_id = $idArtiste;
  }

  //Constructeur artiste
	  public function __construct($donnees) {

    if (isset($donnees)) {
      $this->hydrate($donnees);
    }

  }

  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);
          
      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

  
?>