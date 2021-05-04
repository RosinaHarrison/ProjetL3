<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
       session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php
      require 'call_bd.php';
	  require 'modif_profil.php';

      function enregistrer($pseudo,$mdp,$mail,$avatar){
        $bdd = getBD_TDP();
        $query = "INSERT INTO UTILISATEUR (pseudo, mdp_u, mail_utilisateur, avatar) VALUES (?,?,?,?)";
        $data = array($pseudo,$mdp,$mail,$avatar);

        //envoi et execution de la requete à la base
        $statement = $bdd->prepare($query); //preparation
        $exec = $statement->execute($data); //execution
      }

	//conditions lors de l'inscription
		if ($_POST['pseudo']=="" or $_POST['mail']=="" or $_POST['mdp1']=="" or $_POST['mdp2']=="") {
			$_SESSION['inscr_vide']='oui'; // vérification de champs vides -> correspond à une alerte dans register.php
			echo '<meta http-equiv="refresh" content="0;URL=register.php?pseudo='.$_POST['pseudo'].'&mail='.$_POST['mail'].'"/>';
		}
		else{
			if($_POST['mdp1'] != $_POST['mdp2']){
				$_SESSION['inscr_mdp']='oui'; // vérification mêmes mdp -> correspond à une autre alerte dans register.php après redirection
				echo '<meta http-equiv="refresh" content="0;URL=register.php?pseudo='.$_POST['pseudo'].'&mail='.$_POST['mail'].'"/>';
			}
			else{
				$mail = mail_existe($_POST['mail']); //on teste si le mail est déjà utilisé
				$pseudo = pseudo_existe($_POST['pseudo']);
				//si le mail est présent dans la bd
				if ($mail == true OR $pseudo = true){
					$_SESSION['inscr_existe']='oui';
					echo '<meta http-equiv="refresh" content="0;URL=register.php">';
			}
				else{
					$avatar = "default_avatar.jpg";
					enregistrer($_POST['pseudo'],$_POST['mdp1'],$_POST['mail'],$avatar); //enregistrement sur la bd
					$_SESSION['inscription']='oui';
					echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
				}
			}
		}
    ?>
    <title>Registration</title>
  </head>

  <body>

  </body>
</html>
