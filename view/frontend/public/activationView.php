<?php $title = 'Inscription - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<div class="mainAndFb">
	<?php include("view/frontend/template/facebook.php"); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>