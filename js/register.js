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

            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var urlReg = /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
            $(".error").remove();
            let error = '';
            if (company_name.length < 1) {
                console.log(company_name.length);
                error = 'Company/Studio/Brand  name is required to register';
                    $('#company').before(`<span class="error">${error}</span>`);
            }
            if ((your_name.length < 1) && ( user_role === 'journalist' || user_role === 'designer')) {
                error = 'Please fill in a name to register';
                    $('#your-name').before(`<span class="error">${error}</span>`);
            }
            if ((your_email.length < 1) && ( user_role === 'journalist' || user_role === 'designer')) {
                error = 'Please fill in an email to register';
                $('#your-email').before(`<span class="error">${error}</span>`);
            }
            else if(!emailReg.test(your_email)){
                error = 'Please enter a valid email address (eg: example@fublis.com)';
                $('#your-email').before(`<span class="error">${error}</span>`);
            }else {
                error = '';
            }
            if ((full_name.length < 1) && ( user_role === 'architect' || user_role === 'brand')) {
                error = 'Please fill in the full names to register';
                $('#full-name').before(`<span class="error">${error}</span>`);
            }
            if (your_pass.length < 1) {
                error = 'Please fill in a password to register';
                $('#your-password').before(`<span class="error">${error}</span>`);
            }
            if (confirm_pass.length < 1) {
                error = 'Please retype password to confirm';
                $('#confirm-password').before(`<span class="error">${error}</span>`);
            }
            if (confirm_pass !== your_pass) {
                error = 'Password does not match';
                $('#confirm-password').before(`<span class="error">${error}</span>`);
            }
            if ((work_email.length < 1) && ( user_role === 'architect' || user_role === 'brand')) {
                error = 'Please work email required to register';
                $('#work-email').before(`<span class="error">${error}</span>`);
            }
            else if(!emailReg.test(work_email)){
                error = 'Please enter a valid email address (eg: example@fublis.com)';
                $('#work-email').before(`<span class="error">${error}</span>`);
            }else {
                error = '';
            }
            if ((linkedin_url.length < 1  ) && ( user_role === 'journalist' || user_role === 'designer')) {
                error = 'Please fill in your linkedIn url to register';
                $('#linkedin').before(`<span class="error">${error}</span>`);
            }
            else if (!urlReg.test(linkedin_url)){
                error = 'Please enter a valid url (eg: http://example.com)';
                $('#linkedin').before(`<span class="error">${error}</span>`);
            }else {
                error = '';
            }
            if (website_url.length < 1) {
                error = 'Please fill in your website url to register';
                $('#website-url').before(`<span class="error">${error}</span>`);
            }
            else if (!urlReg.test(website_url)){
                error = 'Please enter a valid url (eg: http://example.com)';
                $('#website-url').before(`<span class="error">${error}</span>`);
            }else {
                error = '';
            }
            if (about_you.length < 1){
                error = 'Please fill a short description about yourself';
                $('#about-you').before(`<span class="error">${error}</span>`);
            }
            if( error !== '' ) {

                console.log(error);
                return;
            }
            $("#drizy-reg-result").show().html('<span><i class="icon icon-spin5 animate-spin"></i> Sending info... Please wait.</span>');
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
                            if (data.type === "error") {
                                $("#drizy-reg-result").addClass('error').html(data.message);
                                // $('.modal-backdrop').hide();
                                // $("#registrationModal").hide();
                            } else {
                                // Reset the form
                                $("#drizy-reg-result").addClass('success').html(data.message);
                                $("#registrationModal form ").trigger("reset");
                                setTimeout(function () {
                                    $('#registrationModal').modal('hide');
                                }, 4000);
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


