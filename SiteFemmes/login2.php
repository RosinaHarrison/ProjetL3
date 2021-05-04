<?php
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Les Femmes à la TV et à la Radio</title>
  <?php require_once "./appelstyles.php";



  
      require 'call_bd.php';
      function connecter($pseudo,$mdp){
        $bdd = getBD_TDP();
        $mail = htmlspecialchars ($pseudo);
        $mdp = htmlspecialchars ($mdp);
        $query = "SELECT * FROM utilisateur WHERE pseudo = ? AND mdp_u = ?";
        $data = array($pseudo, $mdp);
        $statement = $bdd->prepare($query);
        $exec = $statement->execute($data);
        $resultat = $statement->fetch();
        if( $resultat ) {
          return $resultat;
        } 
        else {
          return -1;
        }
      }

	if(!(empty($_POST['pseudo'])) AND !(empty($_POST['pseudo']))){	//on vérifie si champ remplis
		  $connect = connecter($_POST['pseudo'],$_POST['mdp']);
		  
		  if ($connect == -1){ //on vérifie si l'utilisateur existe
			$_SESSION['connex']='non';
			echo '<META http-EQUIV="Refresh" CONTENT="0; url=login.php"/>';
		  }
		  else{
			$_SESSION['client']= $connect;
			echo '<META http-EQUIV="Refresh" CONTENT="0; url=index.php"/>';
		  }
	}
	else{
		$_SESSION['connex_vide']='non';
		echo '<META http-EQUIV="Refresh" CONTENT="0; url=login.php"/>';
	}
?>

	




</head>

<body>
  
	

</body>
</html>