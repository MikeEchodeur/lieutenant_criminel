<?php $title = 'Lieutenant Criminel'; ?>

<?php ob_start(); ?>
<div class="mainAndFb">
	<div class='connect'>
			<p style="text-decoration: underline">modifiez votre mot de passe :</p>
			<form action ="index.php?action=changepassword&cle=<?= $_GET['cle'] ?>" method="post" id="form_connect">
				<?php if ($request == 'done')
				{ ?>
					<p>Votre mot de passe a été changé avec succès, vous pouvez dès à présent vous connecter</P>
				<?php } 
				else { ?>
			    <p class="form_contact">
			        <label for="password"> Nouveau mot de passe :</label> <input type="password" name="password" id="password" required> <br>
			        <label for="confirmPassword"> confirmez votre mot de passe :</label> <input type="password" name="confirmPassword" id="confirmPassword" required> 
			        <input type="submit" class="inscription" value="Valider">
			    </p> <?php } ?>
			</form>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>