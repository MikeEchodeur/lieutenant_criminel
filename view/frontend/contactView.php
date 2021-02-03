<?php $title = 'Lieutenant Criminel'; ?>


<!-- Partie body du site -->

<?php ob_start(); ?>
<div class="mainAndFb">
    <section class="contact">
        <p>
            <h1>Contact</h1>
        </p>
        <div class="contact_head">
            <p>
            <img src="public/image/contact.jpg"/><br>
                Mes respects la famille, si vous voulez nous contacter, nous envoyer une photo de vos seins ou une photo sympa faites le par la page facebook. Pour tout article ou vidéo passez par le mail
            </p>
        </div>

<<<<<<< HEAD
        <form class="contact-form" method="post" action="" role="form">
                <div class=" libele_double">
                    <div class=" libele_double_inside">
                        <label for="username">Nom (obligatoire) :</label>
                        <input id="username" type="text" name="username" class="form-control" placeholder="Comme ta bande patro Bitoss">
                        <p class="comments"></p>
                    </div>
                    <div class=" libele_double_inside">
                        <label for="email">Email (obligatoire) :</label>
                        <input id="email" type="text" name="email" class="form-control" placeholder="CuicuiJeSuisUnFruit@intradef.gouv.fr">
                        <p class="comments"></p>
                    </div>
                </div>
                <div class=" libele_double">
                    <div class=" libele_double_inside">
                        <label for="phone">Téléphone</label>
                        <input id="phone" type="tel" name="phone" class="form-control" placeholder="Pas celui de la Jessica du Shogun">
                        <p class="comments"></p>
                    </div>
                    <div class=" libele_double_inside">
                        <label for="website">Site Web</label>
                        <input id="website" type="url" name="website" class="form-control" placeholder="www.ISuckMyCDS.fr">
                        <p class="comments"></p>
                    </div>
                </div>
                <div class="libele_simple">
                    <label for="sujet">Sujet (obligatoire) :</label>                 
=======
        <?php ?>

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
>>>>>>> parent of 887d667... Mise en forme
                    <select name="sujet" id="sujet">
                    <option value="">Quel est le sujet de votre message ?</option>
                    <option value="Remerciement">Remerciement</option>
                    <option value="PUB">placement publicitaire</option>
                    <option value="Retex">Retex</option>
                    <option value="EVASAN">EVASAN</option>
                    <option value="Autre question">Autre</option>
                    </select>
                </div>
<<<<<<< HEAD
                <div class="libele_simple">
                    <label for="message_contact">Message (obligatoire) :</label>
                    <textarea id="message_contact" name="message_contact" class="form-control" placeholder="Trop marrant Mike Echo" rows="4"></textarea>
=======
                <div class="col-md-12">
                    <label for="message_contact">Message <span class="blue">*</span></label>
                    <textarea id="message_contact" name="message_contact" class="form-control" placeholder="Votre Message" rows="4"></textarea>
>>>>>>> parent of 887d667... Mise en forme
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
    </section>

    <?php include("template/facebook.php"); ?>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>