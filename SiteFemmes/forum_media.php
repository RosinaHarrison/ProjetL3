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
				echo'<td>'.$ligne['commentaire_texte'].'</td></tr>';
			}
			?>
		</tbody>


	</table>
</div>

