<div class="container">
	<table class ="table table-striped">
		<thead>	
			<tr>
				<td> Pseudo </td>
				<td> Date </td>
				<td> Message </td>
			</tr>
		</thead>
		<tbody>
			<?php
			$bdd = getBD_TDP();
			$media=$_GET['rnomMed'];
					$sql="SELECT * FROM commentaire WHERE ref ='".$media."'";
			$rep = $bdd->query($sql);
			while ($ligne = $rep ->fetch()) {
				echo '<tr> <td> <img class="img-comm" src="avatars/'.$ligne['avatarCom'].'"> '.$ligne['pseudo'].'</td>'; //ajout avatar dans commentaire
				echo '<td> '.$ligne['dateCom'].'</td>';
				echo'<td>'.$ligne['commentaire_texte'].'</td>';
				echo '<td> <form method="POST" action="supp_com.php" autocomplete="off">
					<div class="col offset-0.1 ">
						<input type="hidden" class="form-control" name="typePage" value='.$ligne['typePage'].'>
						<input type="hidden" class="form-control" name="ref" value='.$ligne['ref'].'>
						<input type="hidden" class="form-control" name="idCom" value="'.$ligne['idCom'].'">
						<input type="submit" class="btn btn-outline-dark btn-floating m-1" value="supprimer">
					</div>
					</form>';
				echo '</td></tr>';
			}
			?>
		</tbody>


	</table>
</div>

