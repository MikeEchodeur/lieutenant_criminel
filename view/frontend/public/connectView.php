<?php $title = 'Connexion - Lieutenant Criminel'; ?>

<?php ob_start(); ?>
<div class="mainAndFb">
	<div class='connect'>
			<p style="text-decoration: underline">Page de connexion :</p>
			<form action ="" method="post" id="form_connect">
			    <p class="form_contact">
			    	<?php 
			    	if ($login == "erreur")
			        { ?>
			        	<p>Mot de passe ou pseudo incorrect<p>
			        <?php } ?>
			        <label for="username"> Votre pseudo :</label> <input type="text" name="username" id="username" required> <br>
			        <label for="password"> Mot de passe :</label> <input type="password" name="password" id="password" required> 
			        <a href="index.php?action=reinitmdp">Mot de passe oublié</a>
			        <div class="libele_double">
			        <input type="submit" class="inscription" value="Connexion">
			        <button class="inscription"><a href="index.php?action=inscription">Inscription</a></button>
			    	</div>
			    </p>
			</form>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>