<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Les Femmes à la TV et à la Radio</title>
  <?php require_once "./appelstyles.php";?>

</head>

<body>
	<?php require_once "./header.php";?>


	<div class="container addtopmargin addbottommargin">
		<form>
			<div class="form-row">
				<div class="col">
					<input type="text" class="form-control" placeholder="Identifiant">
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<input type="text" class="form-control" placeholder="Mot de passe">
				</div>
			</div>	
			<div class="form-row">
				<div class="col">
					<input type="text" class="form-control" placeholder="Confirmez mot de passe">
				</div>
			</div>
			<div class="form-row">
				<div class="col offset-0.1 ">
					<button type="submit" class="btn btn-outline-dark btn-floating m-1">Submit</button>
				</div>
			</div>
		</form>
		<a class="btn btn-outline-dark btn-floating m-1" href="login.php" role="button"><i class="fa fa-sign-in"></i>   Se connecter</a>
	
	
	
	</div>
	
	
	
	
	<?php require_once "./footer.php";?>
	<?php require_once "./scriptsjs.php";?>
</body>
</html>