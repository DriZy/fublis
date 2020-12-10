<?php

#-----------------------------------
# User registration
#---------------------------------

function drizy_user_update(){
    $user = get_current_user_id();

    $response = array();
    try{


        $occupation = isset($_POST['occupation']) ?  esc_attr($_POST['occupation']) : '';
        $location =  isset($_POST['location']) ? esc_attr($_POST['location']) : '';
        if($occupation != ''){
            update_user_meta($user, 'occupation', $occupation);
        }
        if($location != ''){
            update_user_meta($user, 'location', $occupation);
        }

    }
    catch (Exception $e) {
        $response['type'] = "error";
        $response['message'] = nl2br($e->getMessage());
    }
    echo json_encode($response);
    wp_die();
}
//add_action("init", "drizy_user_update");
//add_action("wp_ajax_drizy_user_update", "drizy_user_update");
add_action("wp_ajax_nopriv_drizy_user_update", "drizy_user_update");

// add user company name column to all users dashboard
function drizy_add_user_columns( $columns ) {
    $columns['occupation'] = __( 'Occupation', 'drizy' );
    return $columns;
}
add_filter( 'manage_users_columns', 'drizy_add_user_columns' );

//drizy_show_user_data
function drizy_show_user_data( $value, $column_name, $id ) {
    if( 'occupation' == $column_name ) {
        return get_user_meta( $id, 'occupation', true );
    }
}
add_action( 'manage_users_custom_column', 'drizy_show_user_data', 10, 3 );



