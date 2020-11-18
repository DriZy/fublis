/* login modal*/
jQuery(function ($) {
    $(document).ready(function () {
        $("#user-login").on('click', function (e) {
            e.preventDefault();
            let user_name = $('input[name = "log"]').val();
            let password = $('input[name = "pwd"]').val();

            $(".error").remove();
            let error = '';
            if (user_name.length < 1) {
                error = `Username can't be empty `;
                $('#user_login').before(`<div class="error">${error}</div>`);
            }
            if (password.length < 1){
                error = `Password can't be empty`;
                $('#user_pass').before(`<div class="error">${error}</div>`);
            }
            // let redirect_to =jQuery('input[name = "redirect_to"]').val();
            if ( error == '' ) {
                $("#drizy-login-result").show().html('<span><i class="icon icon-spin5 animate-spin"></i> Sending info... Please wait.</span>');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: drizyLogin.ajaxurl,
                    data: {
                        user_name: user_name,
                        password: password,
                        action: "drizy_login_verification"
                        // 'security': $('#loginModal #fublis-security').val()
                    },
                    preloader: false,
                    success: function (data) {
                        console.log(data);
                        if (data.type === "error") {
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
            }
        });

        // email for forgot password
        $('#user-pwd-reset').on('click', function (e) {
            e.preventDefault();
            let user_login = $('input[name = "user_email"]').val();
            let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            $(".error").remove();

            let error = '';
            if (user_login.length < 1){
                error = `Email can't be empty`;
                $('#user_email').before(`<div class="error">${error}</div>`);
            }
            else if(!regex.test(user_login)){
                error = `Please fill in a valid email &nbsp; <span style="color: #0a0a0a">eg "example@fublis.com"</span>`;
                $('#user_email').before(`<div class="error">${error}</div>`);
            }
            if ( error == '' ) {
                $("#drizy-login-result").show().html('<span><i class="icon icon-spin5 animate-spin"></i> Sending Email... Please wait.</span>');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: drizyLogin.ajaxurl,
                    data: {
                        user_login: user_login,
                        action: "drizy_retrieve_password"
                    },
                    preloader: false,
                    success: function (data) {
                        console.log(data);
                        // if (data.type === "error") {
                        //     $("#drizy-login-result").addClass('error').html(data.message);
                        //
                        // } else {
                        //     $("#drizy-login-result").addClass('success').html(data.message);
                        //     // e.currentTarget.submit();
                        //     if (data.redirect_to) {
                        //         document.location.href = data.redirect_to;
                        //     } else {
                        //         // document.location.href = redirect_to;
                        //     }
                        // }
                    }
                });
            }
        });
    });
});
