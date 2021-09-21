<?php
require_once "Model.php";

$rep = Model::getPDO()->query("SELECT * FROM voiture");
$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);
foreach($tab_obj as $key => $values) {
    echo "Marque : $values->marque";
    echo "Immat : $values->immatriculation";
    echo "Couleur : $values->couleur";
}

?>