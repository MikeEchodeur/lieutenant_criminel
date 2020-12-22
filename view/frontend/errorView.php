<?php $title = 'Article - Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>

<p>
	Erreur sur la recherche du site.
</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
