<?php $title = 'Administration - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<div class="newComments">
	<?php
	
	while ($dataComment = $data->fetch())
	{ 
		?>
		<div class="news">
			<form method="post" action="admin.php?gestion_comments=<?= $dataComment['id']?>">
				<fieldset>
					<input type="hidden" name="id_comment" value="<?= $dataComment['id']?>"/>
					<input type="submit" name="publier" value="Publier">
					<input type="submit" name="retirer" value="Retirer">
					<input type="submit" onclick="return confirm('êtes vous sûr de vouloir supprimer définitivement le commentaire ?');" name="supprimer" value="Supprimer"/>
				</fieldset>
			</form>
			<a href="">
				<h3>Commentaire de <?= $dataComment['auteur'] ?> le <?= $dataComment['date_comments_fr'] ?></h3>
				<p><?= $dataComment['comment']; ?></p>
			</a>
		</div>
	<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../../view/backend/templateAdmin.php'); ?>