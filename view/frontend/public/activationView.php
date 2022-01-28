<?php $title = 'Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>
<div class="mainAndFb">

	<?php include("view/frontend/template/facebook.php"); ?>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>