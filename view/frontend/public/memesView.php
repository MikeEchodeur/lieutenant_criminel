<?php $title = 'Memes - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<section class="block_news">
	<?php 
	$req = getMemes();
	while ($data = $req->fetch())
	{ ?>
		<a href="index.php?memes_id=<?= $data['id']?>">
			<article class="memes">
				
					<div class="memes__img">
							<img src="<?= $data['image'];?>"/>
					</div>
					
					<div class="memes__texte">
						<!--<a href="index.php?article_id=<?= $data['id']?>">-->
							<h2 class="memes__texte__title">
								<?= $data['titre']; ?>
							</h2>
						<!--</a>-->
					
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