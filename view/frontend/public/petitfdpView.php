<?php $title = 'Le petit FDP Illustré - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<section class="block_memes">
	<?php
	$test = getArticlesFdp();
	while ($data = $test->fetch())
	{ ?>
		<article class="articleFdp">


			<div class="articleFdp__nav">
				<?php $testnav = getArticlesFdpNav();
				while ($dataNav = $testnav->fetch())
				{ ?>
					<section style="background-image: url('<?=$dataNav['image']?>'); background-size: 100% 100%;">
						<h2><?=$dataNav['titre']?></h2>
					</section>
				<?php } ?>
			</div>
			
			<div class="articleFdp__indiv">
				<h1 class="articleFdp__indiv__titre"> <?=$data['titre']?> 
				</h1>
				<div class="articleFdp__indiv__img">
					<img src="<?= $data['image'];?>"/>
				</div>
				<p class="articleFdp__indiv__resume">
					<?=$data['contenu']?>
					<br />
				</p>
				<em class="articleFdp__indiv__date">
					Publié le <?= $data['date_creation_fr']; ?>
				</em>
			</div>

			<div class="writeComment">
				<h2>Commentaires : </h2> 

				<?php 
				if (isset($_SESSION['username']))
				{
				?>
				<form method="post" action="index.php?ArticlesFdp_id=<?= $data['id']?>">
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
