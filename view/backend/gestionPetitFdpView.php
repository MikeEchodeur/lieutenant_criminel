<?php $title = 'Administration - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<a class="newArticle" href="admin.php?action=addArticleFdp">+++ Céer un nouvel article +++</a>
<div class="ensembleArticles">
	<?php

	$req = getArticlesFdp();
	while ($data = $req->fetch())
	{ 
		?>
		<div class="news">
			<a href="admin.php?edit_articleFdp_id=<?= $data['id'];?>">
				<img src="../../<?= $data['image'];?>" height="150" width="150">
				<h3>
					<?= $data['titre']; ?>
				</h3>
				<p>le <?= $data['date_creation_fr']; ?></p>
			</a>
		</div>
	<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../../view/backend/templateAdmin.php'); ?>