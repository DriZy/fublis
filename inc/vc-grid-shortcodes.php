<?php

add_shortcode('FUBLIS_RECENT_PROJECT_SECTION', 'drizy_recent_project_section_shortcode_handler');
function drizy_recent_project_section_shortcode_handler($atts, $content = null)
{
    global $post;

    extract(shortcode_atts(array(
        'class' => '',
        'id' => '',
    ), $atts));
    $class = isset($class) ? $class : '';
    $id = isset($id) ? $id : '';
    //recent project display
    $doc_args = array(
        'post_type' => 'projects',
        'post_status' => 'publish',
        'posts_per_page' => 4, // you may edit this number
        'orderby' => 'decs',
    );

    $archive_tribe = new WP_Query( $doc_args );
    if ( $archive_tribe->have_posts() ) :
        while ($archive_tribe->have_posts() ) : $archive_tribe->the_post();
            if(has_post_thumbnail()) {
                ob_start();
                    the_post_thumbnail('drizy-post-thumbnails');
                        $project_thumbnail= ob_get_contents();
                ob_clean();
            }else{
                $img = get_stylesheet_directory_uri(). '/images/us-placeholder-square.jpg';
                $project_thumbnail = "<img src='$img' />";
            }
            $project_permalink = get_permalink();
            $project_title = get_the_title();
            $project_desc =  wp_trim_words( get_the_content(), 35, ' ... <a href="'.$project_permalink.'"> More <i class="fa fa-chevron-right" aria-hidden="true"></i>
               </a>' );
            $project_architect =  rwmb_meta('project_architect');
//            foreach ( $project_architects as $project_architect ) {
//                $architect_name = !empty( get_user_meta($project_architect, 'first_name', true)) ? get_user_meta($project_architect, 'first_name', true) : get_user_meta($project_architect, 'nickname', true);
//            }
            $project_location =  wp_trim_words(rwmb_meta( 'project_address'), 2, ' ...');
            $project_year =  rwmb_meta( 'project_year');
            $project_categories =  rwmb_meta('project_category');
            $project_category = $project_categories->name;
            $content .= sprintf('
                <div class="col-sm-3 recent-project-grid">
                    <div class="recent-project">
                        <div class="recent-project-thumbnail">%s</div>  
                    </div>
                    <div class="recent-project-title">
                        <h2><a href="%s">%s</a></h2>  
                    </div>
                    <div class="row recent-project-author-location">
                        <div class="col-sm-6 project-author">
                            <p>Architect</p>
                            <b>%s</b>
                        </div>
                        <div class="col-sm-6 project-location">
                            <p>Location</p>
                            <b>%s</b>
                        </div>
                    </div>
                    <div class="row recent-project-year-type">
                        <div class="col-sm-6 project-year">
                            <p>Project Year</p>
                            <b>%s</b>
                        </div>
                        <div class="col-sm-6 project-category">
                            <p>Category</p>
                            <b>%s</b>
                        </div>
                    </div>
                    <div class="recent-project-desc">
                         <p>%s</p>
                    </div>
                </div>', $project_thumbnail, $project_permalink, $project_title, $project_architect, $project_location, $project_year, $project_category, $project_desc );
        endwhile;
    endif;
    $output = sprintf('%s', $content);
    return sprintf("<div id='%s' class='%s'>%s</div>", $id, $class,  do_shortcode($output));
}
