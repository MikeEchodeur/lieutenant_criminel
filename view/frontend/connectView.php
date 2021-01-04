<?php $title = 'Connexion - Lieutenant Criminel'; ?>

<?php ob_start(); ?>
<div class='connect'>
	<p>Page de connexion :</p>
	<form action ="" method="post">
	    <p>
	        <label for="username"> Votre pseudo</label> : <input type="text" name="username" id="username" required/> </br>
	        <label for="password"> Mot de passe</label> : <input type="password" name="password" id="password" required/> </br>
	        <input type="submit" value="Connexion"/>
	    </p>
	</form>

	<a href="index.php?action=inscription">Inscription</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>