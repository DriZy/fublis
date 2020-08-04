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

Function drizy_enqueue_scripts() {
    wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
    wp_enqueue_style( 'childstyle' );

    wp_register_script('register-js', get_stylesheet_directory_uri() . '/js/register.js', array('jquery'), '1.0',true);
    wp_localize_script('register-js','drizyReg', array('ajaxurl' => admin_url('admin-ajax.php')) );
    wp_enqueue_script('register-js');

    wp_register_script('login-js', get_stylesheet_directory_uri() . '/js/login.js', array('jquery'), '1.0',true);
    wp_localize_script('login-js','drizyLogin', array('ajaxurl' => admin_url('admin-ajax.php')) );
    wp_enqueue_script('login-js');

}
add_action( 'wp_enqueue_scripts', 'drizy_enqueue_scripts', 11);


include_once "inc/project_cpt.php";
include_once "inc/meta_boxes.php";
include_once "inc/vc-custom-actions.php";
include_once "inc/vc-grid-shortcodes.php";
//include_once "inc/registration.php";


//drizy custom image sizes
function drizy_custom_image_sizes(){
    add_image_size('drizy-post-thumbnails', 350, 200, false );
    add_image_size('drizy-page-banner', 1500, 350, true);
}
add_action('after_setup_theme', 'drizy_custom_image_sizes');

//if(is_page('register') && !is_user_logged_in()){

//}else{
//    wp_redirect(home_url());
//}


function drizy_user_registration(){

    $response = array();
    try{

//        include_once 'inc/_google_recaptcha.inc';

        $company_name = isset($_POST['company_name']) ?  esc_attr($_POST['company_name']) : '';
        $your_name =  isset($_POST['your_name']) ? esc_attr($_POST['your_name']) : '';
        $full_name = isset($_POST['full_name']) ? esc_attr($_POST['full_name']) : '';
        $your_email = isset($_POST['your_email']) ? trim(esc_attr($_POST['your_email'])) : '';
        $work_email = isset($_POST['work_email']) ? trim(esc_attr($_POST['work_email'])) : '';
        $linkedin_url = isset($_POST['linkedin_url']) ? trim(esc_attr($_POST['linkedin_url'])): '';
        $website_url = isset($_POST['website_url']) ? trim(esc_attr($_POST['website_url'])) : '';
        $about_you = isset($_POST['about_you']) ? trim(esc_attr($_POST['about_you'])) : '';
        $user_role = isset($_POST['user_role']) ? trim(esc_attr($_POST['user_role'])) : '';

        $name = $your_name ?: $full_name;
        $email = $your_email ?: $work_email;
//        $password = esc_attr($_POST['password']);
//        $legal = esc_attr($_POST['legal']);
//        $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

        // Verify recaptcha token
        // _verify_captcha($captcha);

//        if (!is_email($email)){
//            throw new Exception(__('Sorry the email address is invalid.', 'ibid'));
//        }elseif (empty($name)){
//            throw new Exception(__('Please fill in a name'));
//        }
//        else if (strlen($password) < 8){
//            throw new Exception(__('The password length must be 8 characters and above.', 'ibid'));
//        }
//        else if (empty($legal)){
//            throw new Exception(__('You must agree to the terms of use and privacy policy.', 'ibid'));
//        }

        $args = array (
            'user_login'    =>  $name,
            'user_email'    =>  $email,
            'display_name'  =>  $name,
            'description'   =>  $about_you,
            'role'          =>  $user_role,
//            'first_name'    =>  $user_first_name,
//            'last_name'     =>  $user_last_name,
        ) ;

        $id = wp_insert_user( $args ) ;
        if(is_wp_error( $id )){
            if ($id->get_error_code() == 'existing_user_login'){
                throw new Exception(__("This email address already registered. You may want to login instead.", 'drizy'));
            } else {
                $response['message'] = $id->get_error_message();
            }
        }
        else
        {
            $site_name = get_bloginfo('name');
            $response['type'] = "success";
            $response['message'] = __("Thank you for registering on $site_name. Please verify your email account by clicking on the the link that has been sent to your email.This might take 2-3 minutes to get to your account. If you do not find the email in your inbox after this time, please check your spam folder.", 'drizy');
            if($company_name != ''){
                update_user_meta($id, 'company_name', $company_name);
            }
            if ($linkedin_url != ''){
                update_user_meta($id, 'linkedin_url', $linkedin_url);
            }
            if ($website_url){
                update_user_meta($id, 'website_url', $website_url);
            }
        }
    }
    catch (Exception $e) {
        $response['type'] = "error";
        $response['message'] = nl2br($e->getMessage());
    }

    echo json_encode($response);
    wp_die();
}
add_action("wp_ajax_drizy_user_registration", "drizy_user_registration");
add_action("wp_ajax_nopriv_drizy_user_registration", "drizy_user_registration");


function drizy_add_user_columns( $columns ) {
    $columns['company_name'] = __( 'Company Name', 'drizy' );
    return $columns;
} // end theme_add_user_zip_code_column
add_filter( 'manage_users_columns', 'drizy_add_user_columns' );

function drizy_show_user_data( $value, $column_name, $id ) {
  if( 'company_name' == $column_name ) {
    return get_user_meta( $id, 'company_name', true );
  } // end if
} // end drizy_show_user_data
add_action( 'manage_users_custom_column', 'drizy_show_user_data', 10, 3 );

