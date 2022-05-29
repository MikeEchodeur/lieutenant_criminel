<?php $title = 'Add Memes - Lieutenant Criminel'; ?>

<?php ob_start(); ?>

<p>Gestion des memes :</p>

	<?php

	// ########### EDITION D'UN MEME ET TITRE DEJA ENREGISTRE ##########
	if (isset($_GET['edit_meme_id']))
	{ 
		$req = getMeme();
		while ($data = $req->fetch())
		{
			?>
			<form method="post" enctype="multipart/form-data">
				<label for="fileselect">Changer l'image liée au meme : </label>
				<input type="file" name="fileselect" id="fileselect" value="C:/MAMP/htdocs/lieutenant_criminel/public/image/memes/DarKvador.jpg" accept="image/*"/><br />
				<img src="../../<?= $data['image'];?>" width="150" height="150"><br />
				<input type="submit" name="updateImg" value="Enregistrer nouvelle image"/>
			</form><br />

			<form method="post">
				<script src="../../view/ckeditor/ckeditor.js"></script>
				<textarea name="editContenu" id="editor1" rows="10" cols="80">
				    <?= $data['contenu']; ?>
				</textarea>
				<script>
				    // Replace the <textarea id="editor1"> with a CKEditor 4
				    // instance, using default configuration.
				    CKEDITOR.replace( 'editContenu' );
			    </script>
			    <input type="submit" name="update" value="Enregistrer modification"/>
				<input type="button" value="Aperçu"/>
			</form>
			<?php
		}
	} 

	// ############ PUBLICATION D'UN NOUVEAU MEME ##############
	else
	{ ?>
		<form method="post" enctype="multipart/form-data">
			<label for="fileselect">Image liée au meme : </label>
			<input type="file" name="fileselect" id="fileselect" accept="image/*"/><br />
			<br />
			<script src="../../view/ckeditor/ckeditor.js"></script>
			<textarea name="contenu" id="editor1" rows="10" cols="80">
			</textarea>
			<script>
			    // Replace the <textarea id="editor1"> with a CKEditor 4
			    // instance, using default configuration.
			    CKEDITOR.replace( 'contenu' );
		    </script>
		    <input type="submit" name="submit" value="Enregistrer"/>
			<input type="button" value="Aperçu"/>
		</form>
			<?php 
	} ?>


<?php $content = ob_get_clean(); ?>

<?php require('../../view/backend/templateAdmin.php'); ?>