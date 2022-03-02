<?php $title = 'Connexion - Lieutenant Criminel'; ?>

<?php ob_start(); ?>
<div class="mainAndFb">
	<div class='connect'>
			<p style="text-decoration: underline">Reinitialiser votre mot de passe :</p>
			
				<?php if ($confirmEmail == "correct")
				{ ?>
					<form>
						<p>Un mail vous a été envoyé pour déterminer votre nouveau mot de passe.</p>
					</form>

				<?php } 
				else 
				{ ?>
					<form action ="index.php?action=reinitmdp" method="post" id="form_connect">
				   		<p class="form_contact">
				    		<label for="email">Entrez l'adresse mail du compte concerné :</label>
					    	<input type="email" name="email" id="email" required/>
				        	<input type="submit" value="Reinitialiser" />
				   		</p>
			    	</form>
				<?php } ?>
			
	</div>



	<?php include("view/frontend/template/facebook.php"); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template/template.php'); ?>