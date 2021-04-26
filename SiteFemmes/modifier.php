<?php 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
 
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
  
  <br><h1> Modifier mon profil </h1>
  
  <?php if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
			$tailleMax = 2097152;
			$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
			
			if($_FILES['avatar']['size'] <= $tailleMax){
				$extensionUpload = strtolower(substr(strstr($_FILES['avatar']['name'], '.'), 1));
				
				if(in_array($extensionUpload, $extensionsValides)){
					$chemin = "avatars/".$_SESSION['client']['idUtilisateur'].".".$extensionUpload."" ;
					$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin); //utilisation fonction prédéfinie afin de déplacer le fichier photo.
					if ($resultat){
						$bdd = getBD_TDP();
						$query = "UPDATE utilisateur SET avatar = :avatar WHERE idUtilisateur = :idUtilisateur";
						$data = array('avatar' => $_SESSION['client']['idUtilisateur'].".".$extensionUpload, 
									  'idUtilisateur' => $_SESSION['client']['idUtilisateur']);
						$updateAvatar = $bdd -> prepare($query);
						$exec = $updateAvatar -> execute($data);
					}
					else { echo "Votre fichier ne s'est pas importé";}
				}
				else{ echo "L'extension du fichier n'est pas valide, les extensions autorisées sont jpg, jpeg, png et gif";}
			}
			else{ echo "La photo dépasse la taille autorisée";}
}
 ?>
	<p>
	<form  method="POST" action="" autocomplete="off" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col">
				<label class="alinea"> Modifier votre avatar : </label> <br />
				<input type="file" name="avatar" class="form-control">
				</div>
			</div>
			<br />
			<label class="alinea"> Modifier votre pseudo ou adresse mail :</label>
			<div class="form-row">
				<div class="col">
				<?php echo '<input type="text" class="form-control name="pseudo" placeholder="Identifiant" value="'.$_SESSION['client']['pseudo'].'"/>'; ?>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
				<?php echo '<input type="text" class="form-control name="mail" placeholder="Adresse Mail" value="'.$_SESSION['client']['mail_utilisateur'].'"/>'; ?>
				</div>
			</div> <br/>
			<label class="alinea"> Modifier votre mot de passe : </label>
			<div class="form-row">
				<div class="col">
					<input type="password" name="mdp" class="form-control" placeholder="Mot de passe" value="">
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<input type="password" name="mdp2" class="form-control" placeholder="Confirmer mot de passe" value="">			
				</div>
			</div><br>
			<div class="form-row">
				<div class="col offset-0.1 ">
					<button type="submit" class="btn btn-outline-dark btn-floating m-1">Submit</button>
				</div>
			</div>
		</form>	
	</p>

	
  	<?php require_once "./footer.php";?>
  	<?php require_once "./scriptsjs.php";?>

  </body>
</html>