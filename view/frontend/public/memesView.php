<?php $title = 'Memes - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<section class="block_news">
	<?php
	$test = getMemes();
	while ($data = $test->fetch())
	{ ?>
		<a href="index.php?memes_id=<?= $data['id']?>">
			<article class="memes">

				<div>
					<a href="index.php?memes_id=<?= $data['id']-1?>">Précèdent</a>
					<a href="index.php?memes_id=<?= $data['id']?>">Aleatoire</a>
					<a href="index.php?memes_id=<?= $data['id']+1?>">Suivant</a>
				</div>
				
				<div class="memes__img">
						<img src="<?= $data['image'];?>"/>
				</div>
				
				<div class="memes__texte">
				
					<em class="memes__texte__date">
						Publié le <?= $data['date_creation_fr']; ?>
					</em>

					<p class="memes__texte__resume">
						<?= strip_tags(substr($data['contenu'], 0, 400)). '...'; ?><a href="index.php?article_id=<?= $data['id']?>" class="suite">Lire la suite</a>
						<br />
					</p>
					
					<a class="memes__texte__nbrComment" href="index.php?memes_id=<?= $data['id']?>#comments"><i><?= $data['comment']; ?> Commentaires</i></a>
				</div>
			</article>
		</a>
	<?php 
	} 
	?>
	</section>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>