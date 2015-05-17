<?php

require_once 'class/User.class.php';

class UserManager {

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

  // Ajoute un utilisateur à la BDD
  public function add(User $user) {

    $rq = $this->_db->prepare(
        'INSERT INTO T_USER_USR (USR_LOG, USR_MAIL, USR_PWD)
        VALUES (:login, :mail, :pwd);'
      );
    $rq->bindvalue(':login', $user->login());
    $rq->bindvalue(':mail', $user->mail());
    $rq->bindvalue(':pwd', $user->pwd());

    $rq->execute();

    $count = $rq->rowCount();

    return ($count>0);
  }

  // Supprime un utilisateur à la BDD
  public function delete(User $user) {
    $rq = $this->_db->prepare(
        'DELETE FROM T_USER_USR
        WHERE USR_ID = :id'
      );
    $rq->bindvalue(':id', $user->id());
    $rq->execute();

    $count = $rq->rowCount();

    return ($count>0);
  }

  // Retourne un utilisateur
  public function get($id) {
    $id = (int) $id;

    $rq = $this->_db->prepare(
      'SELECT USR_ID as id,
      USR_LOG as login,
      USR_MAIL as mail,
      USR_PWD as pwd,
      USR_COLOR as color
      FROM T_USER_USR
      WHERE USR_ID = :id'
      );
    $rq->bindvalue(':id', $id);
    $rq->execute();
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    if ($donnees) {
      return new User($donnees);
    }
    return false;
  }

  // Retourne tous les utilisateurs
  // TODO : enlever l'admin
  public function getList() {
    $users = [];

    $rq = $this->_db->query(
        'SELECT USR_ID as id,
        USR_LOG as login,
        USR_MAIL as mail,
        USR_PWD as pwd,
        USR_COLOR as color
        FROM T_USER_USR
        WHERE USR_LOG != "admin"
        ORDER BY login'
      );

    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $users[] = new User($donnees);
    }

    return $users;
  }

  public function getAdmin() {

    $rq = $this->_db->query(
      'SELECT USR_ID as id,
      USR_LOG as login,
      USR_MAIL as mail,
      USR_PWD as pwd,
      USR_COLOR as color
      FROM T_USER_USR
      WHERE USR_LOG = "admin" '
      );
    $donnees = $rq->fetch(PDO::FETCH_ASSOC);
    return new User($donnees);
  }

  // Modifie un user dans la BDD
  public function update(User $user) {
    $rq = $this->_db->prepare(
        'UPDATE T_USER_USR
        SET USR_LOG = :login,
        USR_MAIL = :mail,
        USR_PWD = :pwd,
        USR_COLOR = :color
        WHERE USR_ID = :id'
      );

    $rq->bindvalue(':id', $user->id());
    $rq->bindvalue(':login', $user->login());
    $rq->bindvalue(':mail', $user->mail());
    $rq->bindvalue(':pwd', $user->pwd());
    $rq->bindvalue(':color', $user->color());

    $rq->execute();

    $count = $rq->rowCount();

    if ($count>0 && $user->isConnected()) {
      $_SESSION['user'] = $user;
    }

    return ($count>0);
  }

  // Connexion
  public function login($login, $mdp) {

    $rq = $this->_db->prepare(
        'SELECT USR_ID as id,
        USR_LOG as login,
        USR_MAIL as mail,
        USR_PWD as pwd,
        USR_COLOR as color
        FROM T_USER_USR
        WHERE USR_LOG = :login
        AND USR_PWD = :mdp'
      );

    $rq->bindvalue(':login', $login, PDO::PARAM_STR);
    $rq->bindvalue(':mdp', $mdp, PDO::PARAM_STR);

    $rq->execute();

    $donnees = $rq->fetch(PDO::FETCH_ASSOC);

    if ($donnees) {
      return new User($donnees);
    }
    return false;
  }

  public function setNote(User $user, Video $video, $val) {
    $rq = $this->_db->prepare(
        'INSERT INTO TJ_NOTE_NOT (USR_ID, VID_ID, NOT_VAL)
        VALUES (:idUser, :idVideo, :val)'
      );
  }

}


?>