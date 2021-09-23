<?php

    require_once 'Model.php';
    require_once 'Utilisateurs.php';
    require_once 'Voiture.php';
   
class Trajet {

    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

    public function getID() {
        return $this->id;
    }

    public function getDepart() {
        return $this->depart;
    }

    public function getArrivee() {
        return $this->arrivee;
    }

    public function getDate() {
        return $this->date;
    }

    public function getNbPlaces() {
        return $this->nbplaces;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getConductLog() {
        return $this->conducteur_login;
    }

    public static function getAllTrajets() {
        $rep = Model::getPDO()->query('SELECT * FROM trajet');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'trajet');
        $tab_traj = $rep->fetchAll();
        return $tab_traj;
    }

    public function __construct($id = NULL, $dp = NULL, $a = NULL, $dt = NULL, $npb = NULL, $p = NULL, $condlog = NULL) {
        if (!is_null($id) && !is_null($dp) && !is_null($a) && !is_null($dt) && !is_null($nbp) && !is_null($p) && !is_null($condlog)) {
        // Si aucun de $m, $c et $i sont nuls,
        // c'est forcement qu'on les a fournis
        // donc on retombe sur le constructeur à 3 arguments
        $this->id = $id;
        $this->depart = $dp;
        $this->arrivee = $a;
        $this->date = $dt;
        $this->nbplaces = $nbp;
        $this->prix = $p;
        $this->conducteur_login = $condlog;
        }
    }

    public function afficher() {
      echo "ID : $this->id,\n
      Depart : $this->depart,\n
      Arrivee : $this->arrivee,\n
      Date : $this->date,\n
      Nombres de places : $this->nbplaces,\n
      Prix : $this->prix,\n
      Log Conducteur : $this->conducteur_login.";
    }

    public static function findPassager($id) {
        $sql = "SELECT * FROM passager INNER JOIN trajet ON trajet.id = passager.trajet_id WHERE trajet_id=:id";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "id" => $id,
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
        $tab_pass = $req_prep->fetchAll();

        if (empty($tab_pass)) 
            return false;
        return $tab_pass;
    }

}

?>