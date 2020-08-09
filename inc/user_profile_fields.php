<?php

function drizy_user_profile_fields( $user ) {
    global $current_user;

    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);

//    if( $user_role == 'architect'){ ?>
<!---->
<!--        <h3>--><?php //_e("Architect Information", "blank"); ?><!--</h3>-->
<!---->
<!--        <table class="form-table">-->
<!--            <tr>-->
<!--                <th><label for="company">--><?php //_e("Company/Studio/Brand"); ?><!--</label></th>-->
<!--                <td>-->
<!--                    <input type="text" name="company" id="company" value="--><?php //echo esc_attr( get_the_author_meta( 'company_name', $user->ID ) ); ?><!--" class="regular-text" placeholder="--><?php // get_user_meta( $user->ID, 'company_name', true ); ?><!--" /><br />-->
<!--                    <span class="description">--><?php //_e("Please enter your Company/Studio/Brand name."); ?><!--</span>-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <th><label for="website-url">--><?php //_e("Website Url"); ?><!--</label></th>-->
<!--                <td>-->
<!--                    <input type="text" name="website-url" id="website-url" value="--><?php //echo esc_attr( get_the_author_meta( 'website_url', $user->ID ) ); ?><!--" class="regular-text" placeholder="--><?php // get_user_meta( $user->ID, 'website_url', true ); ?><!--" /><br />-->
<!--                    <span class="description">--><?php //_e("Please enter your postal code."); ?><!--</span>-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->

<!--   --><?php //}elseif ($user_role == 'Journalist') { ?>

        <h3><?php _e("Fublis User Information", "blank"); ?></h3>

        <table class="form-table">
            <tr>
                <th><label for="company"><?php _e("Company/Studio/Brand"); ?></label></th>
                <td>
                    <input type="text" name="company" id="company" value="<?php echo esc_attr( get_the_author_meta( 'company_name', $user->ID ) ); ?>" class="regular-text" placeholder="<?php echo get_user_meta( $user->ID, 'company_name', true ); ?>" /><br />
                    <span class="description"><?php _e("Please enter your Company/Studio/Brand name."); ?></span>
                </td>
            </tr>
            <tr>
                <th><label for="linkedin"><?php _e("LinkedIn Url"); ?></label></th>
                <td>
                    <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin_url', $user->ID ) ); ?>" class="regular-text" placeholder="<?php echo get_user_meta( $user->ID, 'linkedin_url', true ); ?>" /><br />
                    <span class="description"><?php _e("Please enter your LinkedIn Url."); ?></span>
                </td>
            </tr>
            <tr>
                <th><label for="website-url"><?php _e("Website Url"); ?></label></th>
                <td>
                    <input type="text" name="website-url" id="website-url" value="<?php echo esc_attr( get_the_author_meta( 'website_url', $user->ID ) ); ?>" class="regular-text" placeholder="<?php echo get_user_meta( $user->ID, 'website_url', true ); ?>" /><br />
                    <span class="description"><?php _e("Please enter your postal code."); ?></span>
                </td>
            </tr>
        </table>

<!--        --><?php
//    }

 }

add_action( 'show_user_profile', 'drizy_user_profile_fields' );
add_action( 'edit_user_profile', 'drizy_user_profile_fields' );
