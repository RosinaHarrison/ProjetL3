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
        if( empty($resultat) ) {
          return -1;
        } 
        else {
          return $resultat;
        }
      }

      $connect = connecter($_POST['pseudo'],$_POST['mdp']);
      if ($connect == -1){
        echo "Veuillez remplir les champs de connexions";
        echo '<META http-EQUIV="Refresh" CONTENT="0; url=login.php"/>';
      }
      else{
        $_SESSION['client']= $connect;
        echo '<META http-EQUIV="Refresh" CONTENT="0; url=index.php"/>';
      }
	  
	  
	  
	$username = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	
	$bdd = getBD_TDP();
	$verif = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo='.$username.'');
	$verif->execute(array($username)); 
	$user = $verif->fetch();
	
	$verif_mdp = $bdd-> prepare('SELECT * FROM utilisateur WHERE pseudo='.$username.' AND mdp_u='.$mdp.'');
	$verif_mdp -> execute(array($username,$mdp));
	$user_mdp = $verif_mdp -> fetch();
	if ($user) {
    // le pseudo existe dans la bd
		if(
	} 	
	else {
    // le pseudo et le mot de passe ne correspondent pas 
	} 
   ?>

	




</head>

<body>
  
	

</body>
</html>