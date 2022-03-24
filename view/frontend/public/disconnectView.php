<?php $title = 'Déconnecion - Lieutenant Criminel'; ?>

<?php ob_start(); ?>
<div class='connect'>
	<p>Vous avez bien été déconnecté</p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>