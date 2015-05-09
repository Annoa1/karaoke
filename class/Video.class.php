<?php

// Declaration des attributs
class Video {
  private $_id;
  private $_title;
  private $_year;

  
  
}


// Récuperation des attributs
  public function getId()//id() 
  {
    return $this->_id;
  }

  public function getTitle() 
  {
    return $this->_title;
  }

  public function getYear() {
    return $this->_year;
  }

  // Valorisation des attributs
 public function setTitle($title) {
    if (is_string($title)) {
      
      $this->_title = $title;
    }
  }

   public function setYear($year) {
    if (is_string($year)) {
      
      $this->_year = $year;
    
 	 }
	}
	//Constructeur video -- voir avec ELyse
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