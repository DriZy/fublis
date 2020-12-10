<?php

/**
 * Handles sending password retrieval email to user.
 *
 * @uses $wpdb WordPress Database object
 * @param string $user_login User Login or Email
 * @return bool true on success false on error
 */

function drizy_retrieve_password() {
    global $wpdb, $current_site;

    $user_email = trim(esc_attr($_POST['user_login']));
    $user_data  = get_user_by('email', $user_email);
    do_action('lostpassword_post');
    $resp = [];
    if (!$user_data){
        $resp['email-exist'] = 'false';
    }else{
        $user_login = $user_data->user_login;
        $user_email = $user_data->user_email;
        do_action('retrieve_password', $user_login);
        $allow = apply_filters('allow_password_reset', true, $user_data->ID);
        if ( !$allow ){
            return false;
        }else if ( is_wp_error($allow) ){
            return false;
        }else {
            $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
            if (empty($key)) {
                // Generate something random for a key...
                $key = wp_generate_password(20, false);
                do_action('retrieve_password_key', $user_login, $key);
                // Now insert the new md5 key into the db
                $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
            }
            $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
            $message .= network_home_url('/') . "\r\n\r\n";
            $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
            $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
            $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
            $message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";
            if (is_multisite()) {
                $blogname = $GLOBALS['current_site']->site_name;
            }else {
                // The blogname option is escaped with esc_html on the way into the database in sanitize_option
                // we want to reverse this for the plain text arena of emails.
                $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
            }
            $title = sprintf(__('[%s] Password Reset'), $blogname);
            $title = apply_filters('retrieve_password_title', $title);
            $message = apply_filters('retrieve_password_message', $message, $key, $user_login, $user_data);
            if ($message && !wp_mail($user_email, $title, $message)) {
                $resp['error-message'] = 'The e-mail could not be sent.';
                $resp['error-message-reason'] = 'Possible reason: your host may have disabled the mail() function...';
            };

            $resp['email-exist'] = true;
            $resp['email'] = $message;
            $resp['key'] = $key;
            $resp['allowed'] = $allow;
            $resp['email-sent'] = 'Please check your email for confirmation';
        };
    };
    echo json_encode($resp);
    die();
}
add_action("wp_ajax_drizy_retrieve_password", "drizy_retrieve_password");
add_action("wp_ajax_nopriv_drizy_retrieve_password", "drizy_retrieve_password");

