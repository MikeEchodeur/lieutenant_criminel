<?php $title = 'Partenaires - Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>

<div class="mainAndFb">
	<article class="partenaire">
		<div class="partenaire__img">
			<a href="https://www.fitness-world-nutrition.com/">
			<img src="public/image/Partenaires/FitnessWN.jpeg" alt="Logo Fitness World Nutrition">
		</div>
		<div class="partenaire__texte">
			<h2 class="partenaire__texte__title">FITNESS WORLD NUTRITION</h2></a>
			<p>
				<span>Fitness World Nutrition</span> est un site de vente de complément alimentaire en ligne monté par un ancien chasseur alpin <br>
				<br>
				Qui ne propose que des produits haut de gamme (possédant les meilleurs labels ou bien les formes les plus
				assimilables pour l'organisme) associé à un service de livraison express (toute commande passée
				avant 15H00 est livrée le lendemain matin en France métropolitaine) et un SAV ultra réactif.<br>
				 les expéditions sur les
				bases militaires pour tous les militaires en mission (OPEX / MCD) Et en vous faisant  bénéficier automatiquement
				de 10% de réduction.
			</p>
		</div>
	</article>
	<article class="partenaire">
		<div class="partenaire__img">
			<a href=" https://defensezone.podia.com/defense-zone-premium/1pd1b">
			<img src="public/image/Partenaires/logoDZ.jpeg" alt="Logo Défense zone">
		</div>
		<div class="partenaire__texte">
			<h2 class="partenaire__texte__title">DEFENSE ZONE</h2></a>
			<p>
				<span>Défense zone magazine</span> est un journal d’info géopolitique et militaire confondé par un ancien mili
			</p>
		</div>
	</article>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>
