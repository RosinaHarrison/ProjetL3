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

  	function commentaire($com,$ref,$pseudo,$date,$avatar,$type){
        $bdd = getBD_TDP();
        $query = "INSERT INTO commentaire (commentaire_texte,ref,pseudo,dateCom,avatarCom,typePage) VALUES(?,?,?,?,?,?)";
        $data = array($com,$ref,$pseudo,$date,$avatar,$type);
        $statement = $bdd->prepare($query); 
        $exec = $statement->execute($data);
    }

    commentaire($_POST['com'],$_POST['ref'],$_SESSION['client']['pseudo'],date('Y-m-d H:i:s'), $_SESSION['client']['avatar'],$_POST['typePage']);
    $ref=$_POST['ref'];
    
    echo '<meta http-equiv="Refresh" content="0; URL=tvPage.php?rnomMed='.urlencode($ref).'"/>';
			
            
        ?>
	</head>
	
	<body>
		
		
	</body>
	
	
	
</html>