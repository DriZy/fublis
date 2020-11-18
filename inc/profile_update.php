<?php

function drizy_update_user_profile(){
    $user_id        =  get_current_user_id();
    $first_name     = esc_attr($_POST['first_name']);
    $last_name      =  esc_attr($_POST['last_name']);
    $occupation     = esc_attr($_POST['user_occupation']);
    $location       =  esc_attr($_POST['user_location']);
    $description    =  esc_attr($_POST['description']);
    $profile_pic    =  esc_attr($_POST['profile_pic']);
    $pic_title    =  esc_attr($_POST['pic_title']);

    $user_datas = [
        'first_name'      => $first_name,
        'last_name'       => $last_name,
        'user_occupation' => $occupation,
        'user_location'   => $location,
        'description'     => $description,
        'profile_pic'     => $profile_pic,
        'pic_title'       => $pic_title
    ];
    $resp_arr = [];
    foreach ($user_datas as $key => $user_data ){
        $resp_arr[$key] = update_user_meta($user_id, $key, $user_data);
    };
    $resp_arr['redirect_to'] = home_url('/complete-profile/');
    echo json_encode($resp_arr);
    die();

}
add_action('wp_ajax_drizy_update_user_profile', 'drizy_update_user_profile');
add_action('wp_ajax_nopriv_drizy_update_user_profile', 'drizy_update_user_profile');
