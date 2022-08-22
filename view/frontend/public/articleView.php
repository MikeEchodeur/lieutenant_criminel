<!-- Partie body du site -->

<?php ob_start(); ?>

<?php 
	$req = getArticle();
	while ($data = $req->fetch())
	{
$ogImage = $data['image']; 
$title = $data['titre'];
$ogContent = $data['contenu']; ?>
<div class="mainAndFb">

		<div class="focus_article">
			<h2>
				<?= $data['titre']; ?><br />
				<em>le <?= $data['date_creation_fr']; ?></em>
			</h2>

			<p>
				<?= $data['contenu']; ?>
				<br />
			</p>

			<div class="writeComment">
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
			</div>
			<br />

			<?php
			$req = getComments();
			while ($data_comment = $req->fetch())
			{ ?>
				<div id="comments" class="articleComment">
						<div class="articleComment__entête">
							<?php
							echo htmlspecialchars($data_comment['auteur']); ?>
							<br />
							<em><?php echo 'Posté le ' . $data_comment['date_comments_fr']; ?></em>
						</div>

						<div class="articleComment__texte">
							<?php echo htmlspecialchars($data_comment['comment']); ?>
						</div>
				</div>
			<?php
			}?>
		</div>
	<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>
