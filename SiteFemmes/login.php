<?php
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Les Femmes à la TV et à la Radio</title>
  <?php require_once "./appelstyles.php";?>
<script> 
function connex_alert(){
	alert("Le pseudo ou le mot de passe est incorrect");}
function connex_vide(){
	alert("Veuillez remplir les deux champs");}
	
</script>

</head>
<?php
	if(!(empty($_SESSION['connex_vide']))){
		unset($_SESSION['connex_vide']);
		echo '<body onload="connex_vide()">';		
	}
	else if (!(empty($_SESSION['connex']))){
		unset($_SESSION['connex']);
		echo '<body onload="connex_alert()">';
	}
	else{
		echo'<body>';
	}
	?>
	
<?php require_once "./header.php";?>

	<div class="container addtopmargin addbottommargin">
		<form action="login2.php" method="post" autocomplete="off">
			<div class="form-row">
				<div class="col">
					 <?php if (isset($_POST["pseudo"])){
                  echo '<input type="text" class="form-control name="pseudo" placeholder="Identifiant" value="'.$_POST['pseudo'].'"/>';
                }
                  else{
                  echo '<input type="text" class="form-control" name="pseudo" placeholder="Identifiant" value="">';
                }
                ?>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<input type="password" name="mdp" class="form-control" placeholder="Mot de passe" value="">
				</div>
			</div><br>
			<div class="form-row">
				<div class="col offset-0.1 ">
					<button type="submit" class="btn btn-outline-dark btn-floating m-1">Submit</button>
				</div>
			</div>
		</form>
		<a class="btn btn-outline-dark btn-floating m-1" href="register.php" role="button"><i class="fa fa-sign-in"></i>   S'inscrire</a>



	</div><br><br><br><br><br>


	<?php require_once "./footer.php";?>
	<?php require_once "./scriptsjs.php";?>
</body>
</html>
