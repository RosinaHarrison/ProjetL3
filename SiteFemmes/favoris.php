<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Les Femmes à la TV et à la Radio</title>
  <?php require_once "./appelstyles.php";
	
	require 'call_bd.php';
	
	if ($_POST['type'] == "year"){
	$nom=$_POST['annee'];
	$lien_fav = 'year.php?annee='.$_POST['annee'].''; 
	}
	elseif ($_POST['type'] == "radio"){
		$nom=$_POST['radio'];
		$lien_fav = 'radioPage.php?rnomMed='.$_POST['radio'].'';
	}
	elseif ($_POST['type'] == "tv"){
		$nom=$_POST['tv'];
		$lien_fav = 'tvPage.php?rnomMed='.$_POST['tv'].'';
	}
	
	$bdd = getBD_TDP();
	$query = "INSERT INTO favoris (idUt, lien, nomPage) VALUES (?,?,?)";
	$data = array($_SESSION['client']['idUtilisateur'], $lien_fav, $nom);
	$ajoutFav = $bdd -> prepare($query);
	$exec = $ajoutFav -> execute($data);

   ?>
   
   <meta http-equiv="refresh" content="0;URL=profil.php">

	




</head>

<body>
</body>
</html>