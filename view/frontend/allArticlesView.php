<?php $title = 'Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>
<section class="block_news">
	<?php 
	$req = getArticles();
	while ($data = $req->fetch())
	{ ?>
			<article class="article">
				<a href="index.php?article_id=<?= $data['id']?>">
					<div>
						<img src="<?= $data['image'];?>"/>
					</div>
				
				<div class="article__texte">
					<h2 class="article__texte__title">
						<?= $data['titre']; ?>
					</h2>
				</a>
					<em class="article__texte__date">
						Publié le <?= $data['date_creation_fr']; ?>
					</em>
					
					

					<p class="article__texte__resume">
						<?= strip_tags(substr($data['contenu'], 0, 400)). '...'; ?><a href="index.php?article_id=<?= $data['id']?>" class="suite">Lire la suite</a>
						<br />
					</p>
				</div>
			</article>
		</a>
	<?php 
	} 
	?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>