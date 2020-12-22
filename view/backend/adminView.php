<?php $title = 'Administration - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<p>Nombre d'utilisateur inscrit : <?php echo $nbrUsers; ?></p>


<?php $content = ob_get_clean(); ?>

<?php require('../../view/backend/templateAdmin.php'); ?>