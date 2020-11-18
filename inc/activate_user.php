<?php


//resend user activation email
function drizy_resend_validation_email(){
    $user_id = esc_attr($_POST['user_id']);
    $user_email = esc_attr($_POST['user_email']);

    $email_sent = bp_core_signup_send_validation_email( $user_id, $user_email, bp_get_current_activation_key());
    if (!$email_sent){
        echo  json_encode(['message'=>'Account activation email was successfully sent', 'type' =>'success']);
        exit;
    }else{
        echo  json_encode(['message'=>'Activation email was not sent. Check your connection and try again',  'type' =>'error']);
        exit;
    }

}
add_action('wp_ajax_drizy_resend_validation_email', 'drizy_resend_validation_email');
add_action('wp_ajax_nopriv_drizy_resend_validation_email', 'drizy_resend_validation_email');



//update user info with occupation and location
function drizy_bp_core_activated_user(  ) {
    // do something with $user_id
    // there is no return for add_action, only add_filter
    $key = esc_attr($_POST['key']);
    $occupation = esc_attr($_POST['user_occupation']);
    $location =  esc_attr($_POST['user_location']);
    $user_id = bp_core_activate_signup($key);
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    update_user_meta($user_id, 'user_occupation', $occupation);
    update_user_meta($user_id, 'user_location', $location);
    echo json_encode(['redirect'=> home_url()]);
    die();

};
add_action('wp_ajax_drizy_bp_core_activated_user', 'drizy_bp_core_activated_user');
add_action('wp_ajax_nopriv_drizy_bp_core_activated_user', 'drizy_bp_core_activated_user');


function drizy_show_extra_profile_fields ( $user ){ ?>
<h3>Custom profile information</h3>
<table class="form-table">
    <tr>
        <th><label for="user_gender"><?php _e('Occupation');?></label></th>
        <td><input type="text" name="user_occupation" id="user_occupation" value="<?php echo esc_attr( get_the_author_meta( 'user_occupation', $user->ID ) ); ?>" /><br /></td>
    </tr>
    <tr>
        <th><label for="user_city"><?php _e('Location');?></label></th>
        <td><input type="text" name="user_occupation" id="user_location" value="<?php echo esc_attr( get_the_author_meta( 'user_location', $user->ID ) ); ?>" /><br /></td>
    </tr>
</table>
<?php
}
add_filter( 'show_user_profile', 'drizy_show_extra_profile_fields' );
add_action ( 'edit_user_profile', 'drizy_show_extra_profile_fields' );







