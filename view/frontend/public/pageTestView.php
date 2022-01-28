<?php $title = 'Article - Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>

<p>
	On est sur la page test.
</p>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>
