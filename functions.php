<?php
/**
 * @package WordPress
 * @subpackage Kleo
 * @author SeventhQueen <themesupport@seventhqueen.com>
 * @since Kleo 1.0
 */

/**
 * Kleo Child Theme Functions
 * Add custom code below
 */

Function drizy_enqueue_scripts()
{
    wp_register_style('childstyle', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style('childstyle');
    wp_register_style('bootstrap-select-styles', get_stylesheet_directory_uri() . '/css/bootstrap-select.min.css');
    wp_enqueue_style('bootstrap-select-styles');

    wp_register_script('fublis_custom_js', get_stylesheet_directory_uri() . '/js/fublis.js', array('jquery'), '1.0', true);
    wp_localize_script('fublis_custom_js', 'fublisJs', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script('fublis_custom_js');

    wp_register_script('drizy-login-js', get_stylesheet_directory_uri() . '/js/login.js', array('jquery'), '1.0', true);
    wp_localize_script('drizy-login-js', 'drizyLogin', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script('drizy-login-js');

    wp_register_script('drizy-file-upload-js', get_stylesheet_directory_uri() . '/js/upload_file.js', array('jquery'), '1.0', true);
    wp_localize_script('drizy-file-upload-js', 'drizyFileUpload', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script('drizy-file-upload-js');


    wp_register_script('bootstrap-select-js', get_stylesheet_directory_uri() . '/js/bootstrap-select.min.js', array('jquery'), '1.0', true);
    //    wp_localize_script('select2-js', 'drizyLogin', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script('bootstrap-select-js');

    //this function enqueues all scripts required for media uploader to work
    wp_enqueue_media();

//    wp_enqueue_script('tabs_js', get_stylesheet_directory_uri() . '/js/tabs.js', array('jquery'), null, true);

}

add_action('wp_enqueue_scripts', 'drizy_enqueue_scripts', 11);


require get_stylesheet_directory() . '/inc/project_cpt.php';
require get_stylesheet_directory() . '/inc/meta_boxes.php';
require get_stylesheet_directory() . '/inc/vc-custom-actions.php';
require get_stylesheet_directory() . '/inc/vc-grid-shortcodes.php';
require get_stylesheet_directory() . '/inc/activate_user.php';
require get_stylesheet_directory() . '/inc/login.php';
require get_stylesheet_directory() . '/inc/pwd_reset.php';
require get_stylesheet_directory() . '/inc/profile_update.php';

//drizy custom image sizes
function drizy_custom_image_sizes()
{
    add_image_size('drizy-post-thumbnails', 350, 200, false);
    add_image_size('drizy-page-banner', 1500, 350, true);
}

add_action('after_setup_theme', 'drizy_custom_image_sizes');

// Set BP to use wp_mail
add_filter( 'bp_email_use_wp_mail', '__return_true' );
 
// Set messages to HTML
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
function set_html_content_type() {
    return 'text/html';
}
 
// Use HTML template
add_filter( 'bp_email_get_content_plaintext', 'get_bp_email_content_plaintext', 10, 4 );
function get_bp_email_content_plaintext( $content = '', $property = 'content_plaintext', $transform = 'replace-tokens', $bp_email ) {
    if ( ! did_action( 'bp_send_email' ) ) {
        return $content;
    }
    return $bp_email->get_template( 'add-content' );
}
 
// Optionally change your email address and from name.
add_filter('wp_mail_from','noreply_from');
function noreply_from($from) {
  return 'noreply@fublis.com'; //Replace 'YOUR_DOMAIN.org' with email address
}
 
add_filter('wp_mail_from_name','noreply_from_name');
function noreply_from_name($name) {
    return 'FUblis'; //Replace 'YOUR_DOMAIN No-Reply' with the from name
}

/*
 * Buddypress register
 */
/*function dm_bp_signup_firstname_errors() {

    global $bp;

    if (!(isset($bp->signup->errors['signup_firstname']) && !empty($bp->signup->errors['signup_firstname'])) &&
        (isset($bp->signup->errors['signup_lastname']) && !empty($bp->signup->errors['signup_lastname']))) {
        echo '<div class="error" style="visibility: hidden">' . $bp->signup->errors['signup_lastname'] . '</div>';
    }
}

add_action('bp_signup_firstname_errors', 'dm_bp_signup_firstname_errors');

function dm_bp_signup_lastname_errors() {
    global $bp;

    if (!(isset($bp->signup->errors['signup_lastname']) && !empty($bp->signup->errors['signup_lastname'])) &&
        (isset($bp->signup->errors['signup_firstname']) && !empty($bp->signup->errors['signup_firstname']))) {
        echo '<div class="error" style="visibility: hidden">' . $bp->signup->errors['signup_firstname'] . '</div>';
    }
}

add_action('bp_signup_lastname_errors', 'dm_bp_signup_lastname_errors');

function dm_bp_signup_is_tou_accepted_errors() {
    global $bp;

    if (isset($bp->signup->errors['signup_is_tou_accepted_errors']) && !empty($bp->signup->errors['signup_is_tou_accepted_errors'])) {
        echo '<div style="height: 15px"></div>';
        echo '<div class="error">' . $bp->signup->errors['signup_is_tou_accepted_errors'] . '</div>';
    }
}

add_action('bp_signup_is_tou_accepted_errors', 'dm_bp_signup_is_tou_accepted_errors');

function dm_bp_signup_recaptcha_errors() {
    global $bp;

    if (isset($bp->signup->errors['signup_recaptcha']) && !empty($bp->signup->errors['signup_recaptcha'])) {
        echo '<div class="error">' . $bp->signup->errors['signup_recaptcha'] . '</div>';
    }
}

add_action('bp_signup_recaptcha_errors', 'dm_bp_signup_recaptcha_errors');*/


function dm_registration_errors()
{

    global $bp;

    unset($bp->signup->errors['signup_username']);

    // remove_all_actions('bp_signup_username_errors');


    if (empty($_POST['signup_firstname']) || !empty($_POST['signup_firstname']) && trim($_POST['signup_firstname']) == '') {
        $bp->signup->errors['signup_firstname'] = __('Please enter a first name', 'buddypress');
    }

    if (empty($_POST['signup_lastname']) || !empty($_POST['signup_lastname']) && trim($_POST['signup_lastname']) == '') {
        $bp->signup->errors['signup_lastname'] = __('Please enter a last name', 'buddypress');
    }

    if ($_POST['register_options']['is_tou_accepted'] != 1) {
        $bp->signup->errors['signup_is_tou_accepted'] = __('Please review and accept the terms of use before hitting "SIGN UP"', 'buddypress');
    }

    // Recaptcha

    $g_recaptcha_response = $_POST['g-recaptcha-response'];

    if (empty($_POST['g-recaptcha-response']) || !empty($_POST['g-recaptcha-response']) && trim($_POST['g-recaptcha-response']) == '') {
        $bp->signup->errors['signup_recaptcha'] = __('Please check the recaptcha box', 'buddypress');
    } else {
        $response = wp_remote_post("https://www.google.com/recaptcha/api/siteverify?" .
            "secret=" . get_option('gglcptch_options')['private_key'] .
            "&response=" . $g_recaptcha_response);

        // $body = wp_remote_retrieve_body($response);

        $status_code = wp_remote_retrieve_response_code($response);

        if ($status_code != 200) {
            $bp->signup->errors['signup_recaptcha'] = __('Invalid recaptcha', 'buddypress');
        }
    }

    // Create username
    if (count($bp->signup->errors) === 0) {
        $parts = explode("@", $_POST['signup_email']);
        $username = $parts[0];

        $_POST['signup_username'] = generate_unique_username($username);
    }


    /*unset($errors['errors']->errors['user_name']);

    return $errors;*/
}

// add_action( 'bp_signup_pre_validate', 'dm_registration_errors', 10, 3 );
add_action('bp_signup_validate', 'dm_registration_errors', 10, 3);

function generate_unique_username( $username ) {

    if ( ! username_exists( $username ) ) {
        return $username;
    }

    $new_username = generateRandomString( $username );

    if ( ! username_exists( $new_username ) ) {
        return $new_username;
    } else {
        return call_user_func( __FUNCTION__, $username );
    }
}


function generateRandomString($username)
{

    //specify characters to be used in generating random string, do not specify any characters that wordpress does not allow in teh creation of usernames.

    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ-_";

    //get the total length of specified characters to be used in generating random string

    $charactersLength = strlen($characters);

    //declare a string that we will use to create the random string

    $randomString = '';


    //set random string length to 11 characters, can change if you don't like the number 11

    for ($i = 0; $i < 11; $i++) {

        //generate random characters

        $randomCharacter = $characters[rand(0, $charactersLength - 1)];

        //add the random characters to the random string

        $randomString .= $randomCharacter;
    };


    //wordpress username max 60 characters in length, so take first 60 character of final username string,
    //assuming some douche has a really long username.... Can change to a lower number if you don't like the number 60

    $randomUsername = substr($username . "_" . $randomString, 0, 60);


    //sanitize_user, just in case

    $sanRandomUsername = sanitize_user($randomUsername);


    //check if randomUsername already exsists....you never know..and also check that randomUsername contains Uppercase/Lowercase/Intergers

    if ((!username_exists($sanRandomUsername)) && (preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $sanRandomUsername) == 1)) {

        //return the unique username if it does not exist

        return $sanRandomUsername;

    } else {
        // if the username already exists or username does not contain Uppercase/Lowercase/Intergers ,call generateRandomString function again

        return call_user_func("generateRandomString", $username);

    }

}//end of generateRandomString function

/*function dm_add_username_to_activation_email($msg, $u_id, $activation_url) {
    $username = $_POST['signup_username'];
    $msg .= sprintf( __("After successful activation, you can log in using your username (%1\$s) along with password you choose during registration process.", 'textdomain'), $username);
    return $msg;
}

add_filter('bp_core_signup_send_validation_email_message', 'dm_add_username_to_activation_email',10,3);*/





function saveNewParseUser($newUserId) {

    $_POST['buddypress_id'] = $newUserId;

    /*if ( ! empty( $_POST['signup_firstname'] ) ) {
        $args['first_name'] = trim( $_POST['signup_firstname'] );
    }

    if ( ! empty( $_POST['signup_lastname'] ) ) {
        $args['last_name'] = trim( $_POST['signup_lastname'] );
    }


    update_user_meta( $newUserId, 'first_name', $args['first_name'] );
    update_user_meta( $newUserId, 'last_name', $args['last_name'] );*/



   /* $args = [
        'ID' => $newUserId, // this is the ID of the user you want to update.
    ];

    if ( ! empty( $_POST['signup_firstname'] ) ) {
        $args['first_name'] = trim( $_POST['signup_firstname'] );
    }

    if ( ! empty( $_POST['signup_lastname'] ) ) {
        $args['last_name'] = trim( $_POST['signup_lastname'] );
    }

    wp_update_user($args);

    exit;*/
}
add_action('user_register', 'saveNewParseUser');

//function redirect_login_page(){
//
//    // Store for checking if this page equals wp-login.php
//    $page_viewed = basename( $_SERVER['REQUEST_URI'] );
//
//    // permalink to the custom login page
//    $login_page  = home_url( '/login' );
//
//    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
//        wp_redirect( $login_page );
//        exit();
//   }
////elseif ($page_viewed == "wp-login.php?redirect_to=http%3A%2F%2Flocalhost%3A8485%2Fwp-admin%2F%3Floggedout%3Dtrue&reauth=1"){
////        wp_redirect( $login_page );
////        exit();
////    }
//    elseif (!is_user_logged_in() && $page_viewed == "wp-admin"){
//        wp_redirect( $login_page );
//        exit();
//    }
//}
//
//add_action( 'init','redirect_login_page' );


// function prefix_login_redirect( $redirect_to, $request, $user ) {
//     //If we are viewing the account page, redirect to it after logging in
//     if( strpos( $redirect_to, 'complete-profile' ) !== false ) {
//         //If user is an administrator, redirect to WordPress dashboard
//         if( isset( $user->roles ) && is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) {
//             return '/wp-admin/';
//         }
//         return esc_url( home_url( '/complete-profile/' ) );//Otherwise, redirect to account page
//     }
//     return $redirect_to;//Redirect to current page after logging in
// }
// add_filter( 'login_redirect', 'prefix_login_redirect', 10, 3 );



