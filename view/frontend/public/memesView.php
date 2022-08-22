<?php $title = 'Memes'; ?>

<?php ob_start(); ?>

<section class="block_memes">
	<?php
	$test = getMemes();
	$random_memes = randMemes();
	while ($data = $test->fetch())
	{ 
		$ogImage = $data['image'];?>
		<article class="memes">

			<div class="memes__nav">
				<a href="index.php?memes_id=<?= $data['id']-1?>">Précèdent</a>
				<a href="index.php?memes_id=<?= $random_memes['id']?>">Aleatoire</a>
				<a href="index.php?memes_id=<?= $data['id']+1?>">Suivant</a>
			</div>
			
			<div class="memes__indiv">
				<em class="memes__indiv__date">
					Publié le <?= $data['date_creation_fr']; ?>
				</em>

				<p class="memes__indiv__resume">
					<?=$data['contenu']?>
					<br />
				</p>
				<div class="memes__indiv__img">
					<img src="<?= $data['image'];?>"/>
				</div>
			</div>

			<div class="writeComment">
				<h2>Commentaires : </h2> 

				<?php 
				if (isset($_SESSION['username']))
				{
				?>
				<form method="post" action="index.php?memes_id=<?= $data['id']?>">
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
			$req = getMemeComments();
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

		</article>
	<?php 
	} 
	?>
	</section>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>