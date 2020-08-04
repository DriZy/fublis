/  registration modal /
jQuery(function ($) {
    $(document).ready(function () {
    //     $(".journalist-signin ").on('click', function (e) {
    //         e.preventDefault();
    //         $('#wpcf7-f8685-o1 form').trigger("reset");
    //
    //         // console.log('I got here');
    //         // fields to hide from registration form for journalists
    //         $('.wpcf7-form-control-wrap.full-name').hide();
    //         $('#full-name').hide().find('input, input').prop('disabled', true);
    //         $('.wpcf7-form-control-wrap.WorkEmail').hide();
    //         $('#work-email').hide().find('input, input').prop('disabled', true);
    //
    //         // fields to show on registration form for journalists
    //         $('.wpcf7-form-control-wrap.your-name').show();
    //         $('#your-name').show().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.your-email').show();
    //         $('#your-email').show().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.linkedin-url').show();
    //         $('#linkedin-url').show().find('input, input').prop('disabled', false);
    //         $("#user-role").val("admin");
    //
    //     });
    //
    //     $(".designer-signin").on('click', function (e) {
    //         e.preventDefault();
    //         $('#wpcf7-f8685-o1 form').trigger("reset");
    //
    //         // console.log('I got here');
    //         // fields to hide from registration form for journalists
    //         $('.wpcf7-form-control-wrap.full-name').hide();
    //         $('#full-name').hide().find('input, input').prop('disabled', true);
    //         $('.wpcf7-form-control-wrap.WorkEmail').hide();
    //         $('#work-email').hide().find('input, input').prop('disabled', true);
    //
    //         // fields to show on registration form for journalists
    //         $('.wpcf7-form-control-wrap.your-name').show();
    //         $('#your-name').show().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.your-email').show();
    //         $('#your-email').show().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.linkedin-url').show();
    //         $('#linkedin-url').show().find('input, input').prop('disabled', false);
    //         $("#user-role").val("designer");
    //
    //     });
    //
    //     $(".architect-signin").on('click', function (e) {
    //         e.preventDefault();
    //         console.log('I got here');
    //         $('#wpcf7-f8685-o1 form').trigger("reset");
    //
    //
    //         // fields to hide from registration form for architects
    //         $('.wpcf7-form-control-wrap.your-name').hide();
    //         $('#your-name').hide().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.your-email').hide();
    //         $('#your-email').hide().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.linkedin-url').hide();
    //         $('#linkedin-url').hide().find('input, input').prop('disabled', false);
    //
    //         // fields to show on registration form for architects
    //         $('.wpcf7-form-control-wrap.full-name').show();
    //         $('#full-name').show().find('input, input').prop('disabled', true);
    //         $('.wpcf7-form-control-wrap.WorkEmail').show();
    //         $('#work-email').show().find('input, input').prop('disabled', true);
    //         $("#user-role").val("architect");
    //     });
    //
    //     $(".abrand-signin").on('click', function (e) {
    //         e.preventDefault();
    //         console.log('I got here');
    //         $('#wpcf7-f8685-o1 form').trigger("reset");
    //
    //
    //         // fields to hide from registration form for architects
    //         $('.wpcf7-form-control-wrap.your-name').hide();
    //         $('#your-name').hide().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.your-email').hide();
    //         $('#your-email').hide().find('input, input').prop('disabled', false);
    //         $('.wpcf7-form-control-wrap.linkedin-url').hide();
    //         $('#linkedin-url').hide().find('input, input').prop('disabled', false);
    //
    //         // fields to show on registration form for architects
    //         $('.wpcf7-form-control-wrap.full-name').show();
    //         $('#full-name').show().find('input, input').prop('disabled', true);
    //         $('.wpcf7-form-control-wrap.WorkEmail').show();
    //         $('#work-email').show().find('input, input').prop('disabled', true);
    //         $("#user-role").val("brand");
    //     });


        $("#wpcf7-f8685-o1 form").on('submit', function (e) {
            e.preventDefault();
            let company_name = $('input[name = "company-name"]').val() ? $('input[name = "company-name"]').val() : "";
            let your_name = $('input[name = "your-name"]').val() ? $('input[name = "your-name"]').val() : "";
            let your_email = $('input[name = "your-email"]').val() ? $('input[name = "your-email"]').val() : "";
            let full_name = $('input[name = "full-name"]').val() ? $('input[name = "full-name"]').val() : "";
            let work_email = $('input[name = "WorkEmail"]').val() ? $('input[name = "WorkEmail"]').val() : "";
            let linkedin_url = $('input[name = "linkedin-url"]').val() ? $('input[name = "linkedin-url"]').val() : "";
            let website_url = $('input[name = "webiste-url"]').val() ? $('input[name = "webiste-url"]').val() : "";
            let about_you = $('textarea[name = "about-you"]').val() ? $('textarea[name = "about-you"]').val() : "";
            let user_role = $('input[name = "user-role"]').val();

            console.log(company_name+" "+your_name+" "+your_email+" "+full_name+" "+work_email+" "+linkedin_url+" "+website_url+" "+about_you+" "+user_role);

            $.ajax({
                type: "POST",
                dataType: "json",
                url: drizyReg.ajaxurl,
                data: {
                    company_name: company_name,
                    your_name: your_name,
                    your_email: your_email,
                    full_name: full_name,
                    work_email: work_email,
                    linkedin_url: linkedin_url,
                    website_url: website_url,
                    about_you: about_you,
                    user_role: user_role,
                    action: 'drizy_user_registration'
                },
                success: function (data) {
                    console.log(data);
                }

            });
        });
    });
});
