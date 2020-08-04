<?php

function drizy_vc_action() {

    vc_map( array(
        "name" => __( "fublis_recent_projects", "drizy" ),
        "base" => "FUBLIS_RECENT_PROJECT_SECTION",
        "class" => "",
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __( "Class Name", "drizy" ),
                "param_name" => "class",
                "value" => '',
                "description" => __( "The class name to be used for styling.", "drizy" )
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __( "ID", "drizy" ),
                "param_name" => "id",
                "value" => '',
                "description" => __( "The ID to be used for styling.", "drizy" )
            ),
        )
    ) );
}
add_action( 'vc_before_init', 'drizy_vc_action' );

