<?php 
  session_start();
 ?>
 
<!doctype html>
<html lang="fr">

  <head>
    <?php require 'call_bd.php' ;?>
    <meta charset="utf-8">
    <script type="text/javascript" src="popup.js"> </script>
    <title>Les Femmes à la TV et à la Radio</title>
    <?php require_once "./appelstyles.php";?>
  </head>

  <body>
  
  <?php require_once "./header.php";?>
  
  <br><h1> Mon profil </h1>
	<?php 
	echo'<div class = "img-centre">';
	
	echo '<img class="avatar-circle" src="avatars/'.$_SESSION['client']['avatar'].'"><br/>'; //recup de la photo de profil
	
	echo 'Votre nom d\'utilisateur : '.$_SESSION['client']['pseudo'].'<br />';
	echo 'Votre adresse mail : '.$_SESSION['client']['mail_utilisateur'].'';
	
	?>
	
	<div><a href="modifier.php"> Modifier mon profil </a></div>
</div>
<br/>

<div id="global">
<div id="gauche">
	<?php
	//tableau qui affiche les commentaires publiés de l'utilisateur
	echo '<table class="table">';
	echo '<thead class="thead bg-success">'; 
	echo '<tr class="tab_comm"><th scope="col"> Page </th><th scope="col"> Commentaires </th> <th scope="col"> Date </th></tr>';
	echo '</thead>';
	$bdd = getBD_TDP(); //connexion bd
	$recupComm = $bdd -> query ('SELECT * FROM commentaire WHERE pseudo = "'.$_SESSION['client']['pseudo'].'"'); //requete pour récupérer les commentaires de l'utilisateur 
	while ($ligne = $recupComm -> fetch()){
		echo '<tr class="tab_comm"><td>'.$ligne['ref'].'</td><td>'.$ligne['commentaire_texte'].'</td><td>'.$ligne['dateCom'].'</td></tr>';		
	}
	$recupComm -> closeCursor();
	echo'</table>';
	?>
	</div>
	
	<div id="droite">
	<?php
	//tableau qui affiche les favoris de l'utilisateur
	echo '<table class="table">';
	echo '<thead class="thead bg-danger">'; 
	echo '<tr class="tab_comm"><th scope="col"> Mes Pages Favorites </th></tr>';
	echo '</thead>';
	$bdd = getBD_TDP();
	$fav = $bdd -> query ('SELECT * FROM favoris WHERE idUt = "'.$_SESSION['client']['idUtilisateur'].'"'); //requete qui récupère les favoris de l'utilisateur connecté
	while ($ligne = $fav -> fetch()){
		echo '<tr class="tab_comm"><td><a href="'.$ligne['lien'].'">'.$ligne['nomPage'].'</a> </td></tr>';		
	}
	$fav -> closeCursor();
	echo'</table>';
	?>
	</div>

</div>

	
<div>
  	<?php require_once "./footer.php";?>
  	<?php require_once "./scriptsjs.php";?>
</div>

  </body>
</html>