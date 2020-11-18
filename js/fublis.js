jQuery(function ($) {
    $(document).ready(function () {

        // resend account activation email
        $('#activation_email_resend').on('click', function(e){
            e.preventDefault();
            console.log('Im here');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: fublisJs.ajaxurl,
                data: {
                    user_id:  $(this).data('id'),
                    user_email: $(this).data('email'),
                    action: "drizy_resend_validation_email"
                },
                success: function (data) {
                    console.log(data);
                    if (data.type === "error") {
                        setTimeout(function(){
                            $("#resend_activation_email_message").addClass('error').html(data.message);
                        }, 2000);


                    } else {
                        setTimeout(function(){
                            $("#resend_activation_email_message").addClass('success').html(data.message);
                        }, 2000);
                    }

                }

            });
        });

        // get user occupation and location on account activation
        $('#activate-btn').on('click', function(e){
            e.preventDefault();
            let key = $('input[name = "key"]').val();
            let occupation = $('select[name = "occupation"]').val();
            let location = $('input[name = "location"]').val();

            console.log(occupation + "  "+ location);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: fublisJs.ajaxurl,
                data: {
                    key: key,
                    user_occupation: occupation,
                    user_location: location,
                    action: "drizy_bp_core_activated_user"
                },
                success: function (data) {
                    console.log(data);
                    window.location = '/complete-profile';
                }
            });
        });

        // toggling elements on the edit profile user data section
        $('#user-description-btn, #edit-user-edit, #edit-user-cancel').on('click', function (e) {
            e.preventDefault();
            $('#user-description-btn').toggle();
            $('.user-personal-info h3').toggle();
            $('.user-occupation-location p').toggle();
            $('#edit-user-edit').toggle();
            $('#edit-user-save').toggle();
            $('#edit-user-cancel').toggle();
            $('form#edit-user-data').toggle();
            $('#profile-pic-update-preview').addClass('edit-image');
        });

            // saving edited data from profile update
        $('#edit-user-save').on('click', function (e) {
            e.preventDefault();
            let first_name = $('input[name = "first-name-edit"]').val();
            let last_name = $('input[name = "last-name-edit"]').val();
            let occupation = $('select[name = "occupation-edit"]').val();
            let location = $('input[name = "location-edit"]').val();
            let profile_pic = $('#profile-pic-update').val();
            let pic_title = $('#profile-pic-update').data('title');
            // let media_pic = $('#media-kits-file').val();
            let description = $('input[name = "description-edit"]').val();
            console.log(description + '  '+ profile_pic);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: fublisJs.ajaxurl,
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    user_occupation: occupation,
                    user_location: location,
                    profile_pic: profile_pic,
                    pic_title: pic_title,
                    description: description,
                    action: "drizy_update_user_profile"
                },
                success: function (data) {
                    console.log(data);
                    document.location.href = data.redirect_to;
                }
            });
        });

        // toggling elements on the edit profile user mediakits section
        $('#complete-profile-accept').on('click', function (e) {
            e.preventDefault();
            $('#media-kits-file-preview').addClass('edit-image');
            $('.tabs-content-intro').fadeIn().hide();
        });
    });
});
