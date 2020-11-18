<?php


function drizy_fublis_metaboxes($meta_boxes)
{

    $prefix = 'ja_';

    //metaboxes for video custom post type
    $meta_boxes[] = [
        'id' => 'assets',
        'title' => esc_html__('Video Assets', 'drizy'),
        'post_types' => ['projects'],
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => 'true',
        'fields' => [
//            [
//                'id' => 'description',
//                'type' => 'wysiwyg',
//                'raw' => true,
//                'name' => esc_html__('Description', 'drizy'),
//                'desc' => esc_html__("Description of this video lesson.", 'drizy'),
//                'options' => [
//                    'textarea_rows' => 10,
//                ],
//            ],
//            ['type' => 'divider'],
//            [
//                'id' => 'project_title',
//                'type' => 'text',
//                'name' => esc_html__('Project Title', 'drizy'),
//                'desc' => esc_html__('The title of the project.', 'drizy'),
//            ],
//            ['type' => 'divider'],
//            [
//                'id' => 'project_architect',
//                'type' => 'user',
//                'name' => esc_html__('Architect', 'drizy'),
//                'field_type' => 'select_advanced',
//                'desc' => esc_html__('The architect for this project.', 'drizy'),
//                'placeholder' => esc_html__('Select architect', 'drizy'),
//                'clone' => true,
//                'add_button' => esc_html__('Add Architect', 'drizy'),
//            ],
            [
                'id' => 'project_architect',
                'type' => 'text',
                'name' => esc_html__('Architect', 'drizy'),
                'desc' => esc_html__('The Architect of the project.', 'drizy'),
            ],
            ['type' => 'divider'],
            [
                'id' => 'project_year',
                'type' => 'text',
                'name' => esc_html__('Year', 'drizy'),
                'desc' => esc_html__('The year of the project.', 'drizy'),
            ],
            ['type' => 'divider'],
            [
                'id'         => 'project_category',
                'type'       => 'taxonomy',
                'name'       => esc_html__( 'Category', 'drizy' ),
                'taxonomy'   => 'category',
                'field_type' => 'select_advanced',
            ],
            ['type' => 'divider'],
            [
                'id'   => 'project_address',
                'name' => 'Address',
                'type' => 'text',
            ],
            [
                'id'   => 'project_location',
                'type' => 'osm',
                'name' => esc_html__( 'Location', 'drizy' ),
                'address_field' => 'project_address',
            ],
            ['type' => 'divider'],
            [
                'id' => 'project_files',
                'type' => 'file_upload',
                'name' => esc_html__("Project Files", 'drizy'),
                'desc' => esc_html__('Upload the exercise files for this lesson.', 'drizy'),
                'force_delete' => false,
            ],
        ],
    ];
    add_filter('rwmb_media_add_string', 'prefix_change_add_string');
    function prefix_change_add_string()
    {
        return 'Add New File';
    }
    return $meta_boxes;


}

add_filter('rwmb_meta_boxes', 'drizy_fublis_metaboxes');
