<?php
session_start();
?>

<?php require 'call_bd.php' ;?>
  <meta charset="utf-8">
  
<?php

//requete qui supprime un commentaire posté
	$bdd = getBD_TDP();
	$query = "DELETE FROM commentaire WHERE idCom= ?" ;
	$data= array($_POST['idCom']);
	$updateFav = $bdd -> prepare($query);
	$execSupp = $updateFav -> execute($data);
	
	if ($_POST['typePage']=="year"){
		echo '<meta http-equiv="refresh" content="0;URL=year.php?annee='.$_POST['ref'].'">';
	}
	if($_POST['typePage']=="tv"){
		echo '<meta http-equiv="refresh" content="0;URL=tvPage.php?rnomMed='.$_POST['ref'].'">';
	}
	if($_POST['typePage']=="radio"){
		echo '<meta http-equiv="refresh" content="0;URL=radioPage.php?rnomMed='.$_POST['ref'].'">';
	}
?>