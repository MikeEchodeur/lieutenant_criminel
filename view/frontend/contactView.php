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
                                <option value="EVASAN">EVASAN</option>
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


<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>