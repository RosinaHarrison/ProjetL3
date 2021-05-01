<?php
	echo'<meta charset="utf-8">';
	require_once 'call_bd.php';
	
function mail_existe($mail){
	$bdd = getBD_TDP();
	$query = 'SELECT * FROM utilisateur WHERE mail_utilisateur=?';
	$data = array($mail);
	$rep = $bdd -> prepare($query);
	$rep -> execute($data);
	$user = $rep -> fetch();
	
	if($user){
		return true;
	}
	else{
		return false;
	}
}

function pseudo_existe($pseudo){
	$bdd = getBD_TDP();
	$query = 'SELECT * FROM utilisateur WHERE pseudo=?';
	$data = array($pseudo);
	$rep = $bdd -> prepare($query);
	$rep -> execute($data);
	$user = $rep -> fetch();
	
	if($user){
		return true;
	}
	else{
		return false;
	}
}
	
function update_info_mail($mail,$idUtilisateur){
	$bdd = getBD_TDP();
	$query = 'UPDATE utilisateur SET mail_utilisateur=? WHERE idUtilisateur=?' ;
	$data = array($mail, $idUtilisateur);
	$updateUt = $bdd -> prepare($query);
	$updateUt -> execute($data);
}

function update_info_pseudo($pseudo,$idUtilisateur){
	$bdd = getBD_TDP();
	$query = 'UPDATE utilisateur SET pseudo=? WHERE idUtilisateur=?' ;
	$data = array($pseudo, $idUtilisateur);
	$updateUt = $bdd -> prepare($query);
	$updateUt -> execute($data);
}

function update_mdp($mdp,$idUtilisateur){
	$bdd = getBD_TDP();
	$query = "UPDATE utilisateur SET mdp_u=? WHERE idUtilisateur=?";
	$data = array($mdp, $idUtilisateur);
	$updateMdp = $bdd -> prepare($query);
	$updateMdp -> execute($data);
}

?>