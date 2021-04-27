<?php 
session_start();
 ?>
 
 <?php require 'call_bd.php' ;?>
  <meta charset="utf-8">
  
<?php

//requete qui supprime la page choisie des favoris
	$bdd = getBD_TDP();
	$query = "DELETE FROM favoris WHERE id_fav= ?" ;
	$data= array($_POST['idFav']);
	$updateFav = $bdd -> prepare($query);
	$execSupp = $updateFav -> execute($data);
	
	echo '<meta http-equiv="refresh" content="0;URL=modifier.php">';
?>