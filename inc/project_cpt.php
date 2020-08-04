<?php
// Our custom post type function
function drizy_fublis_project_posttype() {

    register_post_type( 'projects',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Projects' ),
                'singular_name' => __( 'Projects' )
            ),
            'supports' => array('title', 'editor','excerpt', 'thumbnail', 'revisions'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'projects'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-portfolio',
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'drizy_fublis_project_posttype' );
