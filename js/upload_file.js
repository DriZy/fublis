jQuery(function ($) {
    $(document).ready(function () {
        let mediaUploader;

        // upload function for media kits
        $('#media-kits-file-preview').on('click', function (e) {
            e.preventDefault();
            mediaUploader = wp.media.frames.file_frame = wp.media({
                multiple: true,
                title: 'Upload File',
                button: {
                    text: 'Choose file'
                }
            });
            mediaUploader.on('select', function () {
                let attachments = mediaUploader.state().get('selection');
                attachments.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    console.log(attachment);
                    $('#media-kits-file').after(`<a href="${attachment.url}" target="_blank"><img id='${attachment.id}' class="loaded-image" src="${attachment.url}"></a>`);
                    $('#media-kits-file-preview').hide();
                    $('.media-kits-heading').hide();
                });
            });
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
        });

        // upload function for user profile
        $('#profile-pic-update-preview').on('click', function (e) {
            e.preventDefault();
            mediaUploader = wp.media.frames.file_frame = wp.media({
                multiple: false,
                title: 'Upload File',
                button: {
                    text: 'Choose file'
                }
            });
            mediaUploader.on('select', function () {
                let attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#profile-pic-update').val(attachment.url);
                if(attachment.url !== ''){
                    $('#profile-pic-update-preview').attr('src', attachment.url).attr('data-title', attachment.title).addClass('profile-image');
                }
            });
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
        });
    });
});
