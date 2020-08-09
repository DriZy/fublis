<?php

function wpb_new_menu_conditions( $conditions ) {
    $conditions[] = array(
        'name'    =>  'If it is Custom Post Type archive', // name of the condition
        'condition' =>  function($item) {          // callback - must return TRUE or FALSE
            return is_post_type_archive();
        }
    );

    return $conditions;
}

add_filter( 'if_menu_conditions', 'wpb_new_menu_conditions' );

