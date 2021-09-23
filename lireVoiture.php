<?php

require_once 'Model.php';
require_once 'Voiture.php';
require_once 'Trajet.php';
require_once 'Utilisateurs.php';

// $immat = Voiture::getVoitureByImmat("KF212BS");

// $tab_voit = Voiture::getAllVoitures();
// $tab_user = Utilisateurs::getAllUtilisateurs();
// $tab_traj = Trajet::getAllTrajets();


// / foreach($tab_voit as $value) {
   // $value->afficher();
// }
/*
foreach($tab_traj as $value) {
    $value->afficher();
}
foreach($tab_user as $value) {
    $value->afficher();
}*/

/* $voiture = new Voiture('Mercedes', 'Verte', 'ZF523VS');
print_r("Insertion en cours...");
$voiture->save();
print_r("Insertion effectuée.");

foreach($tab_voit as $value) {
    $value->afficher();
}
*/

$passager = Trajet::findPassager(2);

foreach($passager as $values) {
    $values->afficher();
}


?>