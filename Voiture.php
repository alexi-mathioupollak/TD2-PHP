<?php
   
class Voiture {
   
    private $marque;
    private $couleur;
    private $immatriculation;
   
    // un getter      
    public function getMarque() {
        return $this->marque;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }
   
    // un setter 
    public function setMarque($m) {
        $this->marque = $m;
    }

    public function setCouleur($c) {
        $this->couleur = $c;
    }

    public function setImmatriculation($i){
        if (strlen($i) <= 8) {
            $this->immatriculation = $i;
        }
        
    }
   
    // un constructeur
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
        // Si aucun de $m, $c et $i sont nuls,
        // c'est forcement qu'on les a fournis
        // donc on retombe sur le constructeur à 3 arguments
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
        }
    }
                 
    // une methode d'affichage.
    public function afficher() {
      echo "Marque : $this->marque,
      Couleur : $this->couleur,
      Immatriculation : $this->immatriculation.";
    }

    public static function getAllVoitures() {
        $rep = Model::getPDO()->query('SELECT * FROM voiture');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'voiture');
        $tab_voit = $rep->fetchAll();
        return $tab_voit;
    }
    // fonction non sécurisée
    /*public static function getVoitureByImmat($immat) {
        $sql = "SELECT * FROM voiture WHERE immatriculation='$immat'";
        $rep = Model::getPDO()->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
        return $rep->fetch();
    }*/

    // fonction sécurisée
    public static function getVoitureByImmat($immat) {
        $sql = "SELECT * FROM voiture WHERE immatriculation=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $immat,
            //nomdutag => valeur, ...
        );        
        
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit)) 
            return false;
        return $tab_voit[0];
    }

    function save() {
        $sql = "INSERT INTO voiture (marque, couleur, immatriculation) VALUES (:marque, :couleur, :immatriculation)";
        $req_prep = Model::GetPDO()->prepare($sql);

        $values = array(
            "marque" => $this->marque,
            "couleur" => $this->couleur,
            "immatriculation" => $this->immatriculation,
        );        

        $req_prep->execute($values);

    }
}

?>

