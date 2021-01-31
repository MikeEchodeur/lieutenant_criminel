<?php $title = 'Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>
<p>
	<h1>Contact</h1>
</p>
<div class="contact_head">
	<p>
	<img src="public/image/contact.jpg"/><br>
		Mes respects la famille, si vous voulez nous contacter, nous envoyer une photo de vos seins ou une photo sympa faites le par la page facebook. Pour tout article ou vidéo passez par le mail
	</p>
</div>
<script type="text/javascript">
	$(function () {
    
    $('#contact-form').submit(function(e) {
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'contact.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                    $('#contact-form').append("<p class='thank-you'>La réponse arrivera en même temps que ton colis au SMCAT</p>");
                    $('#contact-form')[0].reset();
                }
                else
                {
                    $('#username + .comments').html(json.usernameError);
                    $('#email + .comments').html(json.emailError);
                    $('#website + .comments').html(json.websiteError);
                    $('#phone + .comments').html(json.phoneError);
                    $('#message_contact + .comments').html(json.message_contactError);
                    $('#sujet + .comments').html(json.sujetError);
                }                
            }
        });
    });

})
</script>
<form method="post" action="">
	<p class="form_contact">

		<label for="username" required><b>Nom ou surnom</b> (obligatoire)</label>
		<input type="text" name="username" id="username" placeholder="Sgt Touneuf" required>
		<p class="comments"></p>

		<label for="email" required><b>E-mail</b> (obligatoire)</label>
		<input type="email" name="email" id="email" placeholder="CuicuiJeSuisUnFruit@intradef.gouv.fr" required>
		<p class="comments"></p>

		<label for="website"><b>Site Web</b></label>
		<input type="url" name="website" id="website" placeholder="www.ISuckMyCDS.fr">
		<p class="comments"></p>

		<label for="sujet">Sujet (obligatoire)</label>                 
        <select name="sujet" id="sujet">
        <option value="">Quel est le sujet de votre message ?</option>
        <option value="Remerciement">Remerciement</option>
        <option value="Retex">Retex</option>
        <option value="Autre question">Autre</option>
        </select>
        <p class="comments"></p>

		<label for="contact_comment" required><b>Commentaire</b> (obligatoire)</label>
		<textarea name="contact_comment" id="contact_comment" placeholder="Mes respects Mike,
		Trop mdr ce que tu fais. Je suis ton plus grand fan. Ahouuu la colo" required></textarea>
		<p class="comments"></p>
		
		<input type="submit" value="Envoyer">
	</p>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>