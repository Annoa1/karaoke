<?php

require_once 'Video.class.php';
require_once 'Pays.class.php';

class VideoManager {

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


// Ajoute d'une vidéo à la BDD
public function add(Video $video) {

    $rq = $this->_db->prepare(
        'INSERT INTO T_VIDEO_VID (VID_TITLE, VID_YEAR, VID_SBT, PAY_ID)
        VALUES (:title, :year, :sbt, :idPays);'
      );
    $rq->bindvalue(':title', $video->title());
    $rq->bindvalue(':year', $video->year());
    $rq->bindvalue(':sbt', $video->sbt());

    // Si le pays est précisé
    if ($video->pays()) {
      $rq->bindvalue(':idPays', $video->pays()->id());
    }
    else {
      $rq->bindvalue(':idPays', null);
    }

    $rq->execute();

    $id = $this->_db->lastInsertId();
    $count = $rq->rowCount();

    // Si l'artiste est précisé
    foreach ($video->artist() as $art) {
      $rq = $this->_db->prepare(
        'INSERT INTO TJ_REALISE_REA (VID_ID, ART_ID)
        VALUES (:idVideo, :idArtist)'
      );
      $rq->bindvalue(':idVideo', $id);
      $rq->bindvalue(':idArtist', $art->id());
      $rq->execute();
      var_dump($rq);
    }

    // Retourne l'id si il y a eu une insertion
    if ($count == 0) {
      return false;
    }

    return ($id);
  }

  // Supprime une video de la BDD
  public function delete(Video $video) {
    $rq = $this->_db->prepare(
      'DELETE FROM T_VIDEO_VID
      WHERE VID_ID = :id'
    );
   
    $rq->bindvalue(':id', $video->id());
    $rq->execute();

    // Retourne vrai si il y a eu une suppression
    $count = $rq->rowCount();
    return ($count>0);
  }

  // Retourne une video
  // TODO : ajouter les artists
  public function get($id) {
    
    $rq = $this->_db->prepare(
      'SELECT VID_ID as "id",
              VID_TITLE as "title",
              VID_YEAR as "year",
              VID_SBT as "sbt",
              PAY_ID as "idPays",
              PAY_NOM as "nomPays",
              ART_ID as "idArt",
              COUNT(ART_ID) as "nbArtists",
              ART_ID as "idArt",
              ART_NOM as "nomArt"
        FROM T_VIDEO_VID
          NATURAL LEFT JOIN TJ_REALISE_REA
          NATURAL LEFT JOIN T_ARTIST_ART
          NATURAL LEFT JOIN TR_PAYS_PAY
        WHERE VID_ID = :id
        GROUP BY VID_ID'
      );

    $rq->bindvalue(':id', $id);
    $rq->execute();

    $donnees = $rq->fetch(PDO::FETCH_ASSOC);

    if ($donnees) {
      $video = new Video($donnees);
      // Si pays
      if ($donnees['idPays']) {
        $pays = new Pays();
        $pays->setId($donnees['idPays']);
        $pays->setNom($donnees['nomPays']);
        $video->setPays($pays);
      }
      // Si artiste
      $nbArtists = (int) $donnees['nbArtists'];
      if ($nbArtists == 1) {
        $art = new Artist();
        $art->setId($donnees['idArt']);
        $art->setNom($donnees['nomArt']);
        $video->addArtist($art);
      }
      else if ($nbArtists > 1) {
        $sql = $this->_db->prepare(
          'SELECT ART_ID as "id",
                  ART_NOM as "nom"
            FROM TJ_REALISE_REA
              NATURAL JOIN T_ARTIST_ART
            WHERE VID_ID = :id '
          );
        $sql->bindvalue(':id', $id);
        $sql->execute();

        while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
          $art = new Artist($data);
          $video->addArtist($art);
        }
      }
      return $video;
    }
    else
      return false;
  }

  // Retourne toutes les vidéos  
  public function getList() {
    $videos = [];

    $rq = $this->_db->query(
        'SELECT VID_ID as "id",
              VID_TITLE as "title",
              VID_YEAR as "year",
              VID_SBT as "sbt",
              PAY_ID as "idPays",
              PAY_NOM as "nomPays",
              ART_ID as "idArt",
              COUNT(ART_ID) as "nbArtists",
              ART_ID as "idArt",
              ART_NOM as "nomArt"
        FROM T_VIDEO_VID
          NATURAL LEFT JOIN TJ_REALISE_REA
          NATURAL LEFT JOIN T_ARTIST_ART
          NATURAL JOIN TR_PAYS_PAY
        GROUP BY VID_ID'
      );
    
    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $video = new Video($donnees);

      // Si pays
      if ($donnees['idPays']) {
        $pays = new Pays();
        $pays->setId($donnees['idPays']);
        $pays->setNom($donnees['nomPays']);
        $video->setPays($pays);
      }
      // Si artiste
      $nbArtists = (int) $donnees['nbArtists'];
      if ($nbArtists == 1) {
        $art = new Artist();
        $art->setId($donnees['idArt']);
        $art->setNom($donnees['nomArt']);
        $video->addArtist($art);
      }
      else if ($nbArtists > 1) {
        $sql = $this->_db->prepare(
          'SELECT ART_ID as "id",
                  ART_NOM as "nom"
            FROM TJ_REALISE_REA
              NATURAL JOIN T_ARTIST_ART
            WHERE VID_ID = :id '
          );
        $sql->bindvalue(':id', $video->id());
        $sql->execute();

        while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
          $art = new Artist($data);
          $video->addArtist($art);
        }
      }
      $videos[] = $video;
    }

    return $videos;
  }
// Retourne les vidéos de maniére aléatoire 
  //
  public function getRand()
  { 
    $videos = [];

    $rq = $this->_db->query(
        'SELECT VID_ID as "id",
              VID_TITLE as "title",
              VID_YEAR as "year",
              VID_SBT as "sbt",
              PAY_ID as "idPays",
              PAY_NOM as "nomPays",
              ART_ID as "idArt",
              COUNT(ART_ID) as "nbArtists",
              ART_ID as "idArt",
              ART_NOM as "nomArt"
        FROM T_VIDEO_VID
          NATURAL LEFT JOIN TJ_REALISE_REA
          NATURAL LEFT JOIN T_ARTIST_ART
          NATURAL JOIN TR_PAYS_PAY
        GROUP BY VID_ID
        order by rand() LIMIT 0,3 '
      );
    
    while ($donnees = $rq->fetch(PDO::FETCH_ASSOC)) {
      $video = new Video($donnees);

      // Si pays
      if ($donnees['idPays']) {
        $pays = new Pays();
        $pays->setId($donnees['idPays']);
        $pays->setNom($donnees['nomPays']);
        $video->setPays($pays);
      }
      // Si artiste
      $nbArtists = (int) $donnees['nbArtists'];
      if ($nbArtists == 1) {
        $art = new Artist();
        $art->setId($donnees['idArt']);
        $art->setNom($donnees['nomArt']);
        $video->addArtist($art);
      }
      else if ($nbArtists > 1) {
        $sql = $this->_db->prepare(
          'SELECT ART_ID as "id",
                  ART_NOM as "nom"
            FROM TJ_REALISE_REA
              NATURAL JOIN T_ARTIST_ART
            WHERE VID_ID = :id '
          );
        $sql->bindvalue(':id', $video->id());
        $sql->execute();

        while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
          $art = new Artist($data);
          $video->addArtist($art);
        }
      }
      $videos[] = $video;
    }

    return $videos;
  }

  // Modifie une video dans la BDD
  public function update(Video $video) {

// maj table video
    
     $rqvideo = $this->_db->prepare(
        'UPDATE `t_video_vid` 
          SET `VID_TITLE`=:title,
              `VID_YEAR`=:year
          WHERE `VID_ID`=:id'
      );


    $rqvideo->bindvalue(':title', $video->title());
    $rqvideo->bindvalue(':year', $video->year());
    $rqvideo->bindvalue(':id', $video->id());
    $rqvideo->execute();
}
   

}






?>