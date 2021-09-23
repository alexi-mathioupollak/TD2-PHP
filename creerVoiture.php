	<?php 
		require_once 'Model.php';
		require_once 'Voiture.php';
		$voitSave = new Voiture($_GET['marque'], $_GET['couleur'], $_GET['immatriculation']);
		$voitSave->save();
	?>