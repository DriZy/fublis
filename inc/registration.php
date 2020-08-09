<?php

#-----------------------------------
# User registration
#---------------------------------

function drizy_user_registration(){

    $response = array();
    try{

//        include_once 'inc/_google_recaptcha.inc';

        $company_name = isset($_POST['company_name']) ?  esc_attr($_POST['company_name']) : '';
        $your_name =  isset($_POST['your_name']) ? esc_attr($_POST['your_name']) : '';
        $full_name = isset($_POST['full_name']) ? esc_attr($_POST['full_name']) : '';
        $your_pass = isset($_POST['your_pass']) ? esc_attr($_POST['your_pass']) : '';
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

            if (empty($email)){
                throw new Exception(__('Please fill an email address. Email is required!', 'drizy'));
            }elseif (!is_email($email)){
                throw new Exception(_('Sorry the email address is invalid.', 'drizy'));
            }
            elseif (empty($name)){
                throw new Exception(__('Please fill in a name'));
            }
//        else if (strlen($password) < 8){
//            throw new Exception(__('The password length must be 8 characters and above.', 'ibid'));
//        }
//        else if (empty($legal)){
//            throw new Exception(__('You must agree to the terms of use and privacy policy.', 'ibid'));
//        }

        $args = array (
            'user_login'    =>  $name,
            'user_email'    =>  $email,
            'user_pass'     => $your_pass,
            'display_name'  =>  $name,
            'description'   =>  $about_you,
            'role'          =>  $user_role,
        ) ;

        $id = wp_insert_user( $args ) ;
        if(is_wp_error( $id )){
            if ($id->get_error_code() == 'existing_user_login'){
                throw new Exception(__("This email address is already registered. You may want to login instead.", 'drizy'));
            } else {
                $response['message'] = $id->get_error_message();
            }
        }
        else
        {
            $site_name = get_bloginfo('name');
            $response['type'] = "success";
            $response['message'] = __("Your account on $site_name was successfully created. Please verify your email to confirm your account", 'drizy');
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

// add user company name column to all users dashboard
function drizy_add_user_columns( $columns ) {
    $columns['company_name'] = __( 'Company Name', 'drizy' );
    return $columns;
}
add_filter( 'manage_users_columns', 'drizy_add_user_columns' );

//drizy_show_user_data
function drizy_show_user_data( $value, $column_name, $id ) {
    if( 'company_name' == $column_name ) {
        return get_user_meta( $id, 'company_name', true );
    }
}
add_action( 'manage_users_custom_column', 'drizy_show_user_data', 10, 3 );
;


