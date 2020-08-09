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
global $reg_page_msg;

Function drizy_enqueue_scripts() {
    wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
    wp_enqueue_style( 'childstyle' );

    wp_register_script('register-js', get_stylesheet_directory_uri() . '/js/register.js', array('jquery'), '1.0',true);
    wp_localize_script('register-js','drizyReg', array('ajaxurl' => admin_url('admin-ajax.php')) );
    wp_enqueue_script('register-js');

    wp_register_script('login-js', get_stylesheet_directory_uri() . '/js/login.js', array('jquery'), '1.0',true);
    wp_localize_script('login-js','drizyLogin', array('ajaxurl' => admin_url('admin-ajax.php')) );
    wp_enqueue_script('login-js');

    wp_register_script('fublis-js', get_stylesheet_directory_uri() . '/js/fublis.js', array('jquery'), '1.0',true);
    wp_enqueue_script('fublis-js');

}
add_action( 'wp_enqueue_scripts', 'drizy_enqueue_scripts', 11);


require get_stylesheet_directory().'/inc/project_cpt.php';
require get_stylesheet_directory().'/inc/meta_boxes.php';
require get_stylesheet_directory().'/inc/vc-custom-actions.php';
require get_stylesheet_directory().'/inc/vc-grid-shortcodes.php';
require get_stylesheet_directory().'/inc/registration.php';
require get_stylesheet_directory().'/inc/user_profile_fields.php';
require get_stylesheet_directory().'/inc/login.php';
//require get_stylesheet_directory().'/inc/helpers.php';


//drizy custom image sizes
function drizy_custom_image_sizes(){
    add_image_size('drizy-post-thumbnails', 350, 200, false );
    add_image_size('drizy-page-banner', 1500, 350, true);
}
add_action('after_setup_theme', 'drizy_custom_image_sizes');




