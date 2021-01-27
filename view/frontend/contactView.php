<?php $title = 'Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>
<p>
	<h1>Contact</h1>
</p>
<div class="contact_head">
	<p>
	<img src="public/image/contact.jpg"/><br />
		Mes respects la famille, si vous voulez nous contacter, nous envoyer une photo de vos seins ou une photo sympa faites le par la page facebook. Pour tout article ou vidéo passez par le mail
	</p>
</div>
<form method="post" action="">
		<p class="form_contact">

			<label for="username" required><b>Nom ou surnom</b> (obligatoire)</label>
			<input type="text" name="username" id="username" placeholder="Sgt Touneuf" required>

			<label for="email" required><b>E-mail</b> (obligatoire)</label>
			<input type="email" name="email" id="email" placeholder="CuicuiJeSuisUnFruit@intradef.gouv.fr" required>

			<label for="website"><b>Site Web</b></label>
			<input type="url" name="website" id="website" placeholder="www.ISuckMyCDS.fr">

			<label for="sujet">Sujet (obligatoire)</label>                 
	            <select name="sujet" id="sujet">
	            <option value="">Quel est le sujet de votre message ?</option>
	            <option value="Remerciement">Remerciement</option>
	            <option value="Retex">Retex</option>
	            <option value="Autre question">Autre</option>
	            </select>

			<label for="contact_comment" required><b>Commentaire</b> (obligatoire)</label>
			<textarea name="contact_comment" id="contact_comment" placeholder="Mes respects Mike,
			Trop mdr ce que tu fais. Je suis ton plus grand fan. Ahouuu la colo" required></textarea>
			
			<input type="submit" value="Envoyer">
		</p>
		</form>


<div class="row">
   <div class="col-lg-10 col-lg-offset-1">
        <form id="contact-form" method="post" action="" role="form">
            <div class="row">
                <div class="col-md-6">
                    <label for="username">Nom <span class="blue">*</span></label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Votre Nom">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="email">Email <span class="blue">*</span></label>
                    <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="phone">Téléphone</label>
                    <input id="phone" type="tel" name="phone" class="form-control" placeholder="Votre Téléphone">
                    <p class="comments"></p>
                </div>
                <div class="col-md-6">
                    <label for="website">Site Web</label>
                    <input id="website" type="url" name="website" class="form-control" placeholder="www.ISuckMyCDS.fr">
                    <p class="comments"></p>
                </div>
                <div class="col-md-12">
                    <label for="sujet">Sujet <span class="blue">*</span></label>                 
    	            <select name="sujet" id="sujet">
    	            <option value="">Quel est le sujet de votre message ?</option>
    	            <option value="Remerciement">Remerciement</option>
    	            <option value="Retex">Retex</option>
    	            <option value="Autre question">Autre</option>
    	            </select>
                </div>
                <div class="col-md-12">
                    <label for="message_contact">Message <span class="blue">*</span></label>
                    <textarea id="message_contact" name="message_contact" class="form-control" placeholder="Votre Message" rows="4"></textarea>
                    <p class="comments"></p>
                </div>
                <div class="col-md-12">
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="button1" value="Envoyer">
                </div>    
            </div>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>