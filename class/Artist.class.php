<?php

class Artist {
	private $_id;
	private $_nomArtiste;
  private $_nbVideos;

// Récuperation des attributs
  public function id() {
    return $this->_id;
  }

  public function nom() {
    return $this->_nomArtiste;
  }

  public function nbVideos() {
    return $this->_nbVideo;
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

  public function setNbVideos($nb) {
    $this->_nbVideo = $nb;
  }

  //Constructeur artiste
	public function __construct($donnees = []) {
    $this->hydrate($donnees);
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

}
  
?>