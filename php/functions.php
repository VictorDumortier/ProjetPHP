<?php
    //Ici: Fonctions pour valider les champs
	function nettoyer_donnees($donnees){
		$donnees = trim($donnees);
		$donnees = stripslashes($donnees);
		$donnees = htmlspecialchars($donnees);
		return $donnees;
	}
	
	function valider_nom($Nom){
		if (preg_match("/^[A-Za-z0-9-'_ ]{1,40}$/", $Nom)) {
			return true;
		}
		return false;
	}
	
	function valider_email($email){
		if (preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$/", $email)) {
			return true;
		}
		return false;
	}

    function valider_mdp($mdp) {
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $mdp)) {
			return true;
		}
		return false;
    }

    function valider_Photo($photo){
		if ($photo['size'] <= 3000000 && in_array(pathinfo($photo['name'], PATHINFO_EXTENSION), ["jpg", "jpeg", "png"])) {
			return true;
		}
		return false;
	}
?>