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
					<p>
						<img src="<?= $data['image'];?>" width="340" height="340"/>
					</p>
				
				<div class="article_ecrit">
					<h2>
						<?= $data['titre']; ?><br />
				</a>
						<em>Publié le <?= $data['date_creation_fr']; ?></em>
					</h2>
					

					<p>
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

