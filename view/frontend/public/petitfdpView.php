<?php $title = 'Le petit FDP Illustré - Lieutenant Criminel'; 
$image = 'test;'?>

<?php ob_start(); ?>

<section class="block_memes">
		<article class="articleFdp">


			<div class="articleFdp__nav">
				<?php 
				if ($_GET['petitfdp_id'] == TRUE)
					{
						$dataNavAfter = getArticlesFdpNavAfter(); 
						while ($dataNavAfter2 = $dataNavAfter->fetch())
						{ ?>
						<a style="background-image: url('<?=$dataNavAfter2['image']?>'); background-size: 100% 100%;" href="index.php?petitfdp_id=<?= $dataNavAfter2['id']?>">
							<h2><?=$dataNavAfter2['titre']?></h2>
						</a>
					<?php }
					} ?>
				<?php $testnav = getArticlesFdpNavBefore();
				while ($dataNav = $testnav->fetch())
				{ ?>
						<a style="background-image: url('<?=$dataNav['image']?>'); background-size: 100% 100%;" href="index.php?petitfdp_id=<?= $dataNav['id']?>">
							<h2><?=$dataNav['titre']?></h2>
						</a>
				<?php } ?>
			</div>
			
			<div class="articleFdp__indiv">
				<?php $test = getArticlesFdp();
				while ($data = $test->fetch())
				{ ?>
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
				<?php } ?>
			</div>

			<div class="writeComment">
				<h2>Commentaires : </h2> 

				<?php 
				if (isset($_SESSION['username']))
				{
				?>
				<form method="post" action="index.php?petitfdp_id=<?= $data['id']?>">
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
			$req = getArticleFdpComments();
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
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>
