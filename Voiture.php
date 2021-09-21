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
}

?>

