<?php $title = 'Article - Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>

<?php 

$req = getArticle();
while ($data = $req->fetch())
{ ?>
	<div class="focus_article">
		<h2>
			<?= $data['titre']; ?><br />
			<em>le <?= $data['date_creation_fr']; ?></em>
		</h2>

		<p>
			<?= $data['contenu']; ?>
			<br />
		</p>
	</div>

<?php 
	?>
	<h2>Commentaires : </h2> 

	<?php 
	if (isset($_SESSION['username']))
	{
	?>
	<form method="post" action="index.php?article_id=<?= $data['id']?>">
		<p>
			<label for="add_comment">Ajoutez votre commentaire :</label><br />
			<textarea name="add_comment" id="add_comment"></textarea>
		</p>
		<input type="submit" name="new_comment" value="Envoyer"/>
	</form>
	<?php
	}
	?>
	<br />

	<?php
	$req = getComments();
	while ($data_comment = $req->fetch())
	{ ?>
		<p>
			<?php
			echo htmlspecialchars($data_comment['auteur']) . ' le ' . $data_comment['date_comments_fr'] . '</br>' . htmlspecialchars($data_comment['comment']); ?>
		</p>
	<?php
	}
}
?>

<?php include("template/facebook.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>
