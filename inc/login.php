<?php

#------------------------------------
# User login
#------------------------------------

function user_login_verification(){

    // echo "hi it's working";
    $response = array();

    $creds = array();
    $creds['user_login'] = esc_attr($_POST['log']);
    $creds['user_password'] = esc_attr($_POST['pwd']);
    $creds['remember'] = true;
    // echo $creds['user_password'];
    $user_signon = wp_signon( $info, false );
    if(is_wp_error( $user_signon )){
        $response['type'] = "error";
        $response['message'] = __('Wrong username or password.', 'ibid');
    }else{
        $user =  get_user_by('id', $user_signon->ID);
        $response['type'] = "success";
        $response['message'] = __('Successful, redirecting...', 'ibid');

        wp_set_current_user($user_signon->ID);
        wp_set_auth_cookie($user_signon->ID);
        if(in_array( 'wcfm_vendor', (array) $user->roles ) ){
            $response['redirect_to'] = home_url('/store-manager');
        }
        if(in_array( 'agents', (array) $user->roles ) ){
            $response['redirect_to'] = home_url('/my-account/agent-orders');
        }
        if(in_array( 'administrator', (array) $user->roles ) ){
            $response['redirect_to'] = home_url('/wp-admin');
        }
    }


    echo json_encode($response);
    die();

}

add_action("wp_ajax_user_login_verification", "user_login_verification");
add_action("wp_ajax_nopriv_user_login_verification", "user_login_verification");
