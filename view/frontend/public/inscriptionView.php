<?php $title = 'Inscription - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<div class="mainAndFb">
	<div class="registration">
		<p style="text-decoration: underline">Inscrivez-vous :</p>
		<form id="form_registration" action="index.php?action=inscription" method="post">
		    <p>
		    	<?php  
			    if ($validInscription == "correct") { ?> 
			    	<p>Félicitation bande de gueux vous vous êtes inscrits<p> <?php }
			    else { 
			    	if($inscription == "erreur4") { ?>
			    	<p>Pseudo ou adresse Email déjà enregistré<p>
			    	<?php } ?>
				    <label for="username"> Pseudo :</label>
				    <?php if($inscription == "erreur1")  { ?>
				    	<p>Veuillez renseigner un pseudo de 25 caractères maximum et sans caractère spéciaux<p>
				    <?php } ?> 
				    <input type="text" name="username" id="username" required>
				    <label for="password"> Mot de passe :</label> <input type="password" name="password" id="password" required>
				    <label for="confirmPassword"> Confirmez le mot de passe :</label> 
					<?php if($inscription == "erreur2")  { ?>
				    	<p>Erreur lors de la confirmation du mot de passe<p>
				    <?php } ?> 
				    <input type="password" name="confirmPassword" id="confirmPassword" required>
				    <label for="email"> Adresse Email :</label> 
				    <?php if($inscription == "erreur3")  { ?>
				    	<p>Adresse mail non conforme<p>
				    <?php } ?> 
				    <input type="email" name="email" id="email" required/>
				    <div class="div_send">
				    	<input type="submit" value="Inscription">
					</div>
				<?php } ?>
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