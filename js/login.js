/* login modal*/

jQuery("#wpcf7-f8686-o1 form").on('submit',function(e){
    e.preventDefault();
    // loader();
    // Show the overlay
    $.LoadingOverlay("show", {
        fontawesomeColor: "#FAA505",
        progressColor: "#FAA505",
        imageColor: "#FAA505",
        //background  : "rgba(0, 0, 0, 0.5)"
    });

    let user_name = jQuery('input[name = "user-name"]').val();
    let password = jQuery('input[name = "password"]').val();
    // let redirect_to =jQuery('input[name = "redirect_to"]').val();
    jQuery.ajax({
        type: "POST",
        dataType: "json",
        url: drizyLogin.ajaxurl,
        data: {
            log:user_name,
            pwd:password,
            action:"user_login_verification",
            'security': $('#loginform #security').val()
        },
        success: function (data) {
            console.log(data)  ;
            $.LoadingOverlay('hide');


            if(data.type == "error") {
                jQuery("#login-error").addClass('error').html(data.message);

            }
            else{
                jQuery("#login-error").addClass('success').html(data.message);
                // e.currentTarget.submit();
                if(data.redirect_to){
                    document.location.href = data.redirect_to;
                }else{
                    document.location.href = redirect_to;
                }

            }

        }

    });

});
