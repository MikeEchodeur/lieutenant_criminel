$(function () {
    
    $('#contact-form').submit(function(e) {
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();
        
        $.ajax({
            type: 'POST',
            url: '/model/backend/contact.php',
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