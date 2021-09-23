<?php

    require_once 'Model.php';
    require_once 'Utilisateurs.php';
    require_once 'Voiture.php';
    require_once 'Trajet.php';


    $pass = Trajet::findPassager($_GET['id']);
    foreach($pass as $values) {
        $values->afficher();
    }



?>