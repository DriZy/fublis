<?php

#------------------------------------
# User login
#------------------------------------

function drizy_redirect(){
    global $pagenow;
    if( 'wp-login.php' == $pagenow ) {
        if  ( isset( $_POST['wp-submit'] ) ||   // in case of LOGIN
            ( isset($_GET['action']) && $_GET['action']=='logout') ||   // in case of LOGOUT
            ( isset($_GET['checkemail']) && $_GET['checkemail']=='confirm') ||   // in case of LOST PASSWORD
            ( isset($_GET['checkemail']) && $_GET['checkemail']=='registered') ) return;    // in case of REGISTER
        else wp_redirect( home_url('/login') ); // or wp_redirect(home_url('/login'));
        exit();
    }
}
add_action('init','drizy_redirect');

function drizy_login_verification(){

    // echo "hi it's working";
    $response = array();

    $creds = array();
    $creds['user_login'] = esc_attr($_POST['user_name']);
    $creds['user_password'] = esc_attr($_POST['password']);
    $creds['remember'] = true;
    // echo $creds['user_password'];
    $user_signon = wp_signon( $creds, false );
    if(is_wp_error( $user_signon )){
        $response['type'] = "error";
        $response['message'] = __('Wrong username or password.', 'drizy');
    }else{
        $user =  get_user_by('id', $user_signon->ID);
        $response['type'] = "success";
        $response['message'] = __('Successful, redirecting...', 'drizy');

        wp_set_current_user($user_signon->ID);
        wp_set_auth_cookie($user_signon->ID);
//        if(in_array( 'journalist', (array) $user->roles ) ){
//            $response['redirect_to'] = home_url('/members');
//        }
//        if(in_array( 'agents', (array) $user->roles ) ){
//            $response['redirect_to'] = home_url('/my-account/agent-orders');
//        }
        if(in_array( 'administrator', (array) $user->roles ) ){
            $response['redirect_to'] = home_url('/wp-admin');
        }
        $response['redirect_to'] = home_url('/complete-profile/');
    }
    echo json_encode($response);
    die();
}

add_action("wp_ajax_drizy_login_verification", "drizy_login_verification");
add_action("wp_ajax_nopriv_drizy_login_verification", "drizy_login_verification");
