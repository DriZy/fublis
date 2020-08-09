  // registration modal
jQuery(function ($) {
    $(document).ready(function () {
        $("#architect-reg").on('click', function (e) {
            e.preventDefault();
            console.log("I got here");
            $('#registrationModal form').trigger("reset");
            $("#registrationModal").show();

            // console.log('I got here');
            // fields to hide from registration form for architects
            $('#registrationModal form .your-name').hide();
            $('#your-name').hide().find('input, input').removeAttr('required').prop('disabled', true);
            $('#registrationModal form .your-email').hide();
            $('#your-email').hide().find('input, input').removeAttr('required').prop('disabled', true);
            $('#registrationModal form .linkedin').hide();
            $('#linkedin').hide().find('input, input').removeAttr('required').prop('disabled', true);

            //fields to show on registration form for architects
            $('#registrationModal form .full-name').show();
            $('#full-name').show().find('input, input').attr('required', true).prop('disabled', false);
            $('#registrationModal form .work-email').show();
            $('#work-email').show().find('input, input').attr('required', true).prop('disabled', false);
            $("#user-role").val("architect");

            // $('#reg-modal-title').append('<h4 class="modal-title">Register as Architect</h4>');

        });

        $("#journalist-reg").on('click', function (e) {
            e.preventDefault();
            console.log("I got here");
            $('#registrationModal form').trigger("reset");
            $("#registrationModal").show();

            // console.log('I got here');
            // fields to hide from registration form for journalists
            $('#registrationModal form .full-name').hide();
            $('#full-name').hide().find('input, input').removeAttr('required').prop('disabled', true);
            $('#registrationModal form .work-email').hide();
            $('#work-email').hide().find('input, input').removeAttr('required').prop('disabled', true);

            //fields to show on registration form for journalists
            $('#registrationModal form .your-name').show();
            $('#your-name').show().find('input, input').attr('required', true).prop('disabled', false);
            $('#registrationModal form .your-email').show();
            $('#your-email').show().find('input, input').attr('required', true).prop('disabled', false);
            $('#registrationModal form .linkedin').show();
            $('#linkedin').show().find('input, input').attr('required', true).prop('disabled', false);
            $("#user-role").val("journalist");
        });

        $("#designer-reg").on('click', function (e) {
            e.preventDefault();
            console.log("I got here");
            $('#registrationModal form').trigger("reset");
            $("#registrationModal").show();

            // fields to hide from registration form for journalists
            $('#registrationModal form .full-name').hide();
            $('#full-name').hide().find('input, input').removeAttr('required').prop('disabled', true);
            $('#registrationModal form .work-email').hide();
            $('#work-email').hide().find('input, input').removeAttr('required').prop('disabled', true);

            //fields to show on registration form for journalists
            $('#registrationModal form .your-name').show();
            $('#your-name').show().find('input, input').attr('required', true).prop('disabled', false);
            $('#registrationModal form .your-email').show();
            $('#your-email').show().find('input, input').attr('required', true).prop('disabled', false);
            $('#registrationModal form .linkedin').show();
            $('#linkedin').show().find('input, input').attr('required', true).prop('disabled', false);
            $("#user-role").val("designer");
        });


        $("#brand-reg").on('click', function (e) {
            e.preventDefault();
            console.log("I got here");
            $('#registrationModal form').trigger("reset");
            $("#registrationModal").show();

            // fields to hide from registration form for architects
            $('#registrationModal form .your-name').hide();
            $('#your-name').hide().find('input, input').removeAttr('required').prop('disabled', true);
            $('#registrationModal form .your-email').hide();
            $('#your-email').hide().find('input, input').removeAttr('required').prop('disabled', true);
            $('#registrationModal form .linkedin').hide();
            $('#linkedin').hide().find('input, input').removeAttr('required').prop('disabled', true);

            //fields to show on registration form for architects
            $('#registrationModal form .full-name').show();
            $('#full-name').show().find('input, input').attr('required', true).prop('disabled', false);
            $('#registrationModal form .work-email').show();
            $('#work-email').show().find('input, input').attr('required', true).prop('disabled', false);
            $("#user-role").val("brand");
        });

        $("#registrationModal #register-btn").on('click', function (e) {
            console.log("btn was clicked");
            e.preventDefault();

            let company_name = $('input[name = "company"]').val() ? $('input[name = "company"]').val() : "";
            let your_name = $('input[name = "your-name"]').val() ? $('input[name = "your-name"]').val() : "";
            let your_email = $('input[name = "your-email"]').val() ? $('input[name = "your-email"]').val() : "";
            let full_name = $('input[name = "full-name"]').val() ? $('input[name = "full-name"]').val() : "";
            let your_pass = $('input[name = "your-password"]').val() ? $('input[name = "your-password"]').val() : "";
            let confirm_pass = $('input[name = "confirm-password"]').val() ? $('input[name = "confirm-password"]').val() : "";
            let work_email = $('input[name = "work-email"]').val() ? $('input[name = "work-email"]').val() : "";
            let linkedin_url = $('input[name = "linkedin"]').val() ? $('input[name = "linkedin"]').val() : "";
            let website_url = $('input[name = "website-url"]').val() ? $('input[name = "website-url"]').val() : "";
            let about_you = $('textarea[name = "about-you"]').val() ? $('textarea[name = "about-you"]').val() : "";
            let user_role = $('input[name = "user-role"]').val();

            console.log(company_name +" "+your_name+" "+your_email+" "+full_name+"  "+your_pass+"  "+confirm_pass+" "+work_email+" "+linkedin_url+" "+website_url+" "+about_you+" "+user_role);

            $(".error").remove();
            if (company_name.length < 1) {
                console.log(company_name.length);
                $('#company').before('<span class="error">Company/Studio/Brand  name is required to register</span>');
            }
            if ((your_name.length < 1) && ( user_role === 'journalist' || user_role === 'designer')) {
                $('#your-name').before('<span class="error">Please fill in a name to register</span>');
            }
            if ((your_email.length < 1) && ( user_role === 'journalist' || user_role === 'designer')) {
                $('#your-email').before('<span class="error">Please fill in an email to register</span>');
            }
            if ((full_name.length < 1) && ( user_role === 'architect' || user_role === 'brand')) {
                $('#full-name').before('<span class="error">Please fill in the full names to register</span>');
            }
            if (your_pass.length < 1) {
                $('#your-password').before('<span class="error">Please fill in a password to register</span>');
            }
            if (confirm_pass.length < 1) {
                $('#confirm-password').before('<span class="error">Please retype password to confirm</span>');
            }
            if (confirm_pass !== your_pass) {
                $('#confirm-password').before('<span class="error">Password does not match</span>');
            }
            if ((work_email.length < 1) && ( user_role === 'architect' || user_role === 'brand')) {
                $('#work-email').before('<span class="error">Please work email required to register</span>');
            }
            if ((linkedin_url.length < 1  ) && ( user_role === 'journalist' || user_role === 'designer')) {
                $('#linkedin').before('<span class="error">Please fill in your linkedIn url to register</span>');
            }
            if (website_url.length < 1) {
                $('#website-url').before('<span class="error">Please fill in your website url to register</span>');
            }
            if (about_you.length < 1) {
                $('#about-you').before('<span class="error">Please fill a short description about yourself</span>');
            }
            $("#drizy-reg-result").show().html('<span><i class="icon icon-spin5 animate-spin"></i> Sending info... Please wait.</span>'),
                $.ajax({
                type: "POST",
                dataType: "json",
                url: drizyReg.ajaxurl,
                data: {
                    company_name: company_name,
                    your_name: your_name,
                    your_email: your_email,
                    full_name: full_name,
                    your_pass: your_pass,
                    work_email: work_email,
                    linkedin_url: linkedin_url,
                    website_url: website_url,
                    about_you: about_you,
                    user_role: user_role,
                    action: 'drizy_user_registration'
                },
                success: function (data) {
                    console.log(data);
                    if(data.type === "error") {
                        $("#drizy-reg-result").addClass('error').html(data.message);
                        // $('.modal-backdrop').hide();
                        // $("#registrationModal").hide();
                    }
                    else {
                        // Reset the form
                        $("#drizy-reg-result").addClass('success').html(data.message);
                        $("#registrationModal form ").trigger("reset");
                        setTimeout(function() {$('#registrationModal').modal('hide');}, 4000);
                    }
                }
            });
        });
        $('.close').on('click', function (e) {
            e.preventDefault();
            $('#registrationModal form').trigger("reset");
            $('.modal-backdrop').hide();
        });
    });
});


