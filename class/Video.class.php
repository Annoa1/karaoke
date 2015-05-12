<?php

// Declaration des attributs
class Video {
  private $_id;
  private $_title;
  private $_year;
  private $_sbt = false; 

// Récuperation des attributs
  public function id() {
    return $this->_id;
  }

  public function title() {
    return $this->_title;
  }

  public function year() {
    return $this->_year;
  }

  public function sbt() {
    return $this->_sbt;
  }

  // Retourne le chemin de la vidéo
  public function path() {
    return "video/".$this->id().".mp4";
  }

  // Retourne le chemin du sous-titre vtt
  public function vttPath() {
    return "sbt/vtt/".$this->id().".vtt";
  }

  // Retourne le chemin du sous-titre vtt
  public function srtPath($prog = false) {
    if ($prog)
      return "sbt/srt_prog/".$this->getId().".srt";
    return "sbt/srt/".$this->getId().".srt";
  }

  // Valorisation des attributs
  public function setId($id) {
    $this->_id = (int)$id;
  }

 // public function settitle($title) {  
 public function setTitle($title) {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }

   // public function setyear($year) {
   public function setYear($year) {
      $year= (int) $year;
      if ($year>1000 && $year<3000) {
         $this->_year =$year;
      }
 	 	}

  public function setSbt($sbt) {
    if (is_bool($sbt)) {
      $this->_sbt = $sbt;
    }
  }
  
	//Constructeur video
	  public function __construct($donnees = []) {

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
}
  
?>