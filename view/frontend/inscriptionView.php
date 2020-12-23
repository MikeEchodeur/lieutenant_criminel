<?php $title = 'Inscription - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<p>Inscrivez-vous :</p>
	<form action="index.php?action=inscription" method="post">
    <p>
	    <label for="username"> Pseudo</label> : <input type="text" name="username" id="username" required/> </br>
	    <label for="password"> Mot de passe</label> : <input type="password" name="password" id="password" required/> </br>
	    <label for="confirmPassword"> Confirmez le mot de passe</label> : <input type="password" name="confirmPassword" id="confirmPassword" required/> </br>
	    <label for="email"> Adresse Email</label> : <input type="email" name="email" id="email" required/> </br>
	    <input type="submit" value="Inscription"/>
		</br>
    </p>
	</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>