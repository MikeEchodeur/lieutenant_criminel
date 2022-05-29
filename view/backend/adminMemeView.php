<?php $title = 'Administration - Meme - Lieutenant Criminel'; ?>

<?php ob_start(); ?>
	
 <?php 

$req = getMeme();
while ($data = $req->fetch())
{ ?>
	<div class="new">
		<div class="article">

			<form method="post" action="admin.php?edit_meme_id=<?= $data['id']?>">
				<fieldset>
					<?php 
					if ($data['statut'] == 'save')
					{
						echo '<input type="submit" name="publier" value="Publier">';
					}
					else 
					{
						echo '<input type="submit" name="retirer" value="Retirer">';
					}
					?> 
					<input type="submit" name="editer" value="Editer"/>
					<input type="submit" onclick="return confirm('êtes vous sûr de vouloir supprimer définitivement le meme ?');" name="supprimer" value="Supprimer"/>
				</fieldset>
			</form>

		 	<h2>
				<em>le <?= $data['date_creation_fr']; ?></em>
			</h2>

			<!-- BOUTON A INCLURE PEUT-ETRE ? -->

			<p>
				<?= ($data['contenu']); ?>
				<br />
			</p>
		</div>

		<h2>Commentaires :</h2>
	



 <?php

$req = getComments();
while ($data_comment = $req->fetch())
{ ?>
	<form method="post" action="admin.php?edit_meme_id=<?= $data['id']?>">
		<fieldset>
			<input type="hidden" name="id_comment" value="<?= $data_comment['id']?>"/>
			<?php 
			if ($data_comment['statut'] != 'posted')
			{ ?>
				<input type="submit" name="publier_comment" value="Publier"/>
			<?php	
			}
			else
			{ ?>
				<input type="submit" name="retirer_comment" value="Retirer"/>
			<?php
			}
			echo $data_comment['id'];
			?>
			
			<input type="submit" onclick="return confirm('êtes vous sûr de vouloir supprimer définitivement le commentaire ?');" name="supprimer_comment" value="Supprimer"/>
		</fieldset>
	</form>
	<?php
	echo htmlspecialchars($data_comment['auteur']) . ' le ' . $data_comment['date_comments_fr'] . '</br>' . htmlspecialchars($data_comment['comment']);
}
}
?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('../../view/backend/templateAdmin.php'); ?>