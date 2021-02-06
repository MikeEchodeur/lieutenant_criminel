<?php $title = 'Connexion - Lieutenant Criminel'; ?>

<?php ob_start(); ?>
<div class="mainAndFb">
	<div class='connect'>
			<p>Page de connexion :</p>
			<form action ="" method="post">
			    <p class="form_contact">
			        <label for="username"> Votre pseudo :</label> <input type="text" name="username" id="username" required> <br>
			        <label for="password"> Mot de passe :</label> <input type="password" name="password" id="password" required> <br>
			        <input type="submit" value="Connexion">
			        <button class="inscription"><a href="index.php?action=inscription">Inscription</a></button>
			    </p>
			</form>
	</div>

	<?php include("view/frontend/template/facebook.php"); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>