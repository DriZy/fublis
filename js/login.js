/* login modal*/
jQuery(function ($) {
    $(document).ready(function () {
        $("#login-btn").on('click', function (e) {
            e.preventDefault();
            let user_name = $('input[name = "user-name"]').val();
            let password = $('input[name = "password"]').val();

            $(".error").remove();
            if (user_name.length < 1) {
                console.log(user_name.length);
                $('#user-name').after('<span class="error">Please fill a username or email to login</span>');
            }
            if (password.length < 1){
                $('#password').after('<span class="error">Please fill ain a password to login</span>');
            }
            // let redirect_to =jQuery('input[name = "redirect_to"]').val();
            $("#drizy-login-result").show().html('<span><i class="icon icon-spin5 animate-spin"></i> Sending info... Please wait.</span>'),
            $.ajax({
                type: "POST",
                dataType: "json",
                url: drizyLogin.ajaxurl,
                data: {
                    user_name: user_name,
                    password: password,
                    action: "drizy_login_verification",
                    'security': $('#loginModal #fublis-security').val()
                },
                preloader: false,
                success: function (data) {
                    console.log(data);
                    if(data.type === "error") {
                        $("#drizy-login-result").addClass('error').html(data.message);

                    } else {
                        $("#drizy-login-result").addClass('success').html(data.message);
                        // e.currentTarget.submit();
                        if (data.redirect_to) {
                            document.location.href = data.redirect_to;
                        } else {
                            // document.location.href = redirect_to;
                        }

                    }

                }

            });
        });
    });
});
