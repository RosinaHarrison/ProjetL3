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

      function enregistrer($pseudo,$mdp,$mail,$avatar){
        $bdd = getBD_TDP();
        $query = "INSERT INTO UTILISATEUR (pseudo, mdp_u, mail_utilisateur, avatar) VALUES (?,?,?,?)";
        $data = array($pseudo,$mdp,$mail,$avatar);

        //envoi et execution de la requete à la base
        $statement = $bdd->prepare($query); //preparation
        $exec = $statement->execute($data); //execution
      }

	  // première condition if vérifie si l'utilisateur est déja inscrit lors d'une nouvelle inscription
	  // cela n'a pas aboutit mais je laisse le code ici :
	  
		/*$bdd = getBD_TDP();
		$query = 'SELECT EXISTS(SELECT * FROM table WHERE pseudo=? OR mail_utilisateur=?)';
		$data = array($_POST['pseudo'],$_POST['mail']);
		$res = $bdd-> prepare($query);
		$res -> execute($data);
		$resultat = $res -> fetch();
		if($resultat == true){
			$_SESSION['inscr_existe']= 'oui';		
			echo'<meta http-equiv="refresh" content="0;URL=register.php">';
		}
		else{*/
		
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
					$avatar = "default_avatar.jpg";
					enregistrer($_POST['pseudo'],$_POST['mdp1'],$_POST['mail'],$avatar); //enregistrement sur la bd
					$_SESSION['inscription']='oui';
					echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
				}
			}
    ?>
    <title>Registration</title>
  </head>

  <body>

  </body>
</html>
