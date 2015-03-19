<?php

class User {

  private $_id;
  private $_login;
  private $_mail;
  private $_pwd;
  private $_color;

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

  public function id() {
    return $this->_id;
  }

  public function login() {
    return $this->_login;
  }

  public function mail() {
    return $this->_mail;
  }

  public function pwd() {
    return $this->_pwd;
  } 

  // Couleur pour l'effet karaoke des sous-titres
  public function color() {
    return $this->_color;
  }

  public function setId($id) {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function setLogin($login) {
    if (is_string($login)) {
      // TODO : vérifier longeur min et max
      $this->_login = $login;
    }
  }

  public function setMail($mail) {
    $regex = "#^[a-zA-Z0-9-_.+&]+@[a-zA-Z0-9-_.]+\.[a-zA-Z0-9]+$#";
    
    if (!is_string($mail)) {
      return;
    }
    if(preg_match($regex, $mail)) {
      $this->_mail = $mail;
    }
  }

  public function setPwd($pwd) {
    if (!is_string($pwd)) {
      return;
    }
    // TODO : vérifier la longueur min et max

    $this->_pwd = password_hash($pwd, PASSWORD_BCRYPT);
  }

  // Couleur hexo = string de 6 caractères
  public function setColor($color) {
    if (!is_string($color)) {
      return;
    }
    if (strlen($color) == 6) {
      $regex = "#[a-fA-F0-9]*#";
      if (preg_match($regex, $color)) {
        $this->_color = $color;
      }
    }
  }

}


?>