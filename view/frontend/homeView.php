<?php $title = 'Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>

<section class="homeArticle">
test
</section>

<section class="homeMemes">

</section>



<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>