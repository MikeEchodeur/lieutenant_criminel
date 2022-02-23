<?php $title = 'Administration - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<p>Nombre d'utilisateur inscrit : <?php echo $nbrUsers; ?></p>

<p>Vous avez <a href="admin.php?gestion_comments"><?php echo $nbrComments; ?> nouveaux commentaires</a></p>


<?php $content = ob_get_clean(); ?>

<?php require('../../view/backend/templateAdmin.php'); ?>