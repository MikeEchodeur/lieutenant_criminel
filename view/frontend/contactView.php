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


    <form id="contact-form" method="post" action="" role="form">
        <div class=" libele_double">
            <div class=" libele_double_inside">
                <label for="username">Nom<span class="red"> * </span>:</label>
                <input id="username" type="text" name="username" class="form-control" placeholder="Comme ta bande patro Bitoss">
                <p class="comments"></p>
            </div>

            <div class=" libele_double_inside">
                <label for="email">Email<span class="red"> * </span>:</label>
                <input id="email" type="text" name="email" class="form-control" placeholder="CuicuiJeSuisUnFruit@intradef.gouv.fr">
                <p class="comments"></p>
            </div>
        </div>

        <div class=" libele_double">
            <div class=" libele_double_inside">
                <label for="phone">Téléphone :</label>
                <input id="phone" type="tel" name="phone" class="form-control" placeholder="Pas celui de la Jessica du Shogun">
                <p class="comments"></p>
            </div>

            <div class=" libele_double_inside">
                <label for="website">Site Web :</label>
                <input id="website" type="url" name="website" class="form-control" placeholder="www.ISuckMyCDS.fr">
                <p class="comments"></p>
            </div>
        </div>

        <div class="libele_simple">
            <label for="sujet">Sujet<span class="red"> * </span>:</label>                 
            <select name="sujet" id="sujet">
            <option value="">Quel est le sujet de votre message ?</option>
            <option value="Remerciement">Remerciement</option>
            <option value="PUB">Placement Publicitaire</option>
            <option value="Retex">Retex</option>
            <option value="EVASAN">EVASAN</option>
            <option value="Autre question">Autre</option>
            </select>
        </div>

        <div class="libele_simple">
            <label for="message_contact">Message<span class="red"> * </span>:</label>
            <textarea id="message_contact" name="message_contact" class="form-control" placeholder="Trop marrant Mike Echo" rows="4"></textarea>
            <p class="comments"></p>
        </div>

        <div>
            <p><strong><span class="red">* </span>Ces informations sont requises.</strong></p>
        </div>

        <div class="div_send">
            <input type="submit" value="Envoyer">
        </div>    
    </form>
</section>

    <?php include("template/facebook.php"); ?>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>