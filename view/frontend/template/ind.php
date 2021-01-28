<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-Moi !</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/style.css">
        <!-- <script src="../../js/script.js"></script> -->
    </head>
    
    
    <body>
        
       <div class="container">
            <div class="divider"></div>
                            
           <div class="row">
               <div class="col-lg-10 col-lg-offset-1">
                <script type="text/javascript">$(function () {
    
    $('#contact-form').submit(function(e) {
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'php/contact.php',
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

})</script>
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
        </div>
        
    </body>

</html>