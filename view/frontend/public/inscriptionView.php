<?php $title = 'Inscription - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<div class="mainAndFb">
	<div class="registration">
		<p style="text-decoration: underline">Inscrivez-vous :</p>
		<form id="form_registration" action="index.php?action=inscription" method="post">
		    <p>
			    <label for="username"> Pseudo :</label> <input type="text" name="username" id="username" required>
			    <label for="password"> Mot de passe :</label> <input type="password" name="password" id="password" required>
			    <label for="confirmPassword"> Confirmez le mot de passe :</label> <input type="password" name="confirmPassword" id="confirmPassword" required>
			    <label for="email"> Adresse Email :</label> <input type="email" name="email" id="email" required/>
			    <div class="div_send">
			    	<input type="submit" value="Inscription">
				</div>
		    </p>
		</form>

<!-- TEST JAVASCRIPT ____________________________ -->
		
		<script src="public/js/ScriptConnect.js">
		</script>
		<p id="test">My Content</p>
<!-- ______________________________________________ -->
		
	</div>
	<?php include("view/frontend/template/facebook.php"); ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>