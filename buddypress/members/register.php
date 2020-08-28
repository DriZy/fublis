<?php
/**
 * BuddyPress - Members Register
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$first_name = (!empty($_POST['signup_firstname'])) ? trim($_POST['signup_firstname']) : '';
$last_name = (!empty($_POST['signup_lastname'])) ? trim($_POST['signup_lastname']) : '';
$is_tou_accepted = false;

?>

<div id="buddypress">

    <?php if ('request-details' == bp_get_current_signup_step()) : ?>

        <div>
            <div class="text-right">
                Already have an account? &nbsp; <a class="btn btn-primary text-uppercase">Sign In</a>
            </div>

            <div class="text-center">
                <h2>Join the community</h2>
            </div>
        </div>

    <?php endif; ?>


    <?php // echo do_shortcode('[TheChamp-Login]'); ?>

    <?php

    /**
     * Fires at the top of the BuddyPress member registration page template.
     *
     * @since 1.1.0
     */
    do_action('bp_before_register_page'); ?>

    <div class="page" id="register-page">

        <form action="" name="signup_form" id="signup_form" class="standard-form col-md-8 col-lg-6 pl-lg-6"
              method="post"
              enctype="multipart/form-data">

            <?php if ('registration-disabled' == bp_get_current_signup_step()) : ?>

                <div id="template-notices" role="alert" aria-atomic="true">
                    <?php

                    /** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
                    do_action('template_notices'); ?>

                </div>

                <?php

                /**
                 * Fires before the display of the registration disabled message.
                 *
                 * @since 1.5.0
                 */
                do_action('bp_before_registration_disabled'); ?>

                <p><?php _e('User registration is currently not allowed.', 'buddypress'); ?></p>

                <?php

                /**
                 * Fires after the display of the registration disabled message.
                 *
                 * @since 1.5.0
                 */
                do_action('bp_after_registration_disabled'); ?>
            <?php endif; // registration-disabled signup step ?>

            <?php if ('request-details' == bp_get_current_signup_step()) : ?>

                <div id="template-notices" role="alert" aria-atomic="true">
                    <?php

                    /** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
                    do_action('template_notices'); ?>

                </div>

                <div class="row">

                    <div class="col-sm-12">

                        <?php

                        /**
                         * Fires before the display of member registration account details fields.
                         *
                         * @since 1.1.0
                         */
                        do_action('bp_before_account_details_fields'); ?>

                        <div class="text-center">
                            <h3>or use Email</h3>
                        </div>

                        <div class="register-section" id="basic-details-section">

                            <?php /***** Basic Account Details ******/ ?>

                            <!--<h4><?php /*_e('Account Details', 'buddypress'); */ ?></h4>-->


                            <?php
                            global $bp;

                            /* echo '<pre>';
                             var_dump($bp->signup->errors);
                             echo '</pre>';*/

                            //  echo '<pre>';
                            //  var_dump($_POST);
                            //  echo '</pre>';
                            ?>


                            <?php

                            if (isset($_POST['register_options']) && is_array($_POST['register_options'])) {
                                $is_tou_accepted = (!empty($_POST['register_options']['is_tou_accepted'])) && trim($_POST['register_options']['is_tou_accepted']) == '1';
                            }

                            ?>

                            <?php

                            /**
                             * Fires and displays any member registration username errors.
                             *
                             * @since 1.1.0
                             */
                            /*do_action('bp_signup_username_errors'); */ ?><!--
                            <input type="text" name="signup_username" id="signup_username" placeholder="<?php /*_e('Username', 'buddypress'); */ ?>"
                                   value="<?php /*bp_signup_username_value(); */ ?>" <?php /*bp_form_field_attributes('username'); */ ?>/>-->


                            <div class="row">

                                <div class="col-sm-6">

                                    <?php

                                    /**
                                     * Fires and displays any member registration firstname errors.
                                     *
                                     * @since 1.1.0
                                     */
                                    ?>
                                    <input type="text" name="signup_firstname" id="signup_firstname"
                                           placeholder="<?php _e('First Name', 'buddypress'); ?>" required
                                           value="<?= $first_name; ?>" <?php bp_form_field_attributes('firstname'); ?>/>

                                    <?php if (isset($bp->signup->errors['signup_firstname']) && !empty($bp->signup->errors['signup_firstname'])) : ?>
                                        <div class="error"><?= $bp->signup->errors['signup_firstname'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">

                                    <?php

                                    /**
                                     * Fires and displays any member registration lastname errors.
                                     *
                                     * @since 1.1.0
                                     */
                                    ?>
                                    <input type="text" name="signup_lastname" id="signup_lastname"
                                           placeholder="<?php _e('Last Name', 'buddypress'); ?>" required
                                           value="<?= $last_name; ?>" <?php bp_form_field_attributes('lastname'); ?>/>
                                    <?php if (isset($bp->signup->errors['signup_lastname']) && !empty($bp->signup->errors['signup_lastname'])) : ?>
                                        <div class="error"><?= $bp->signup->errors['signup_lastname'] ?></div>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <?php

                            /**
                             * Fires and displays any member registration email errors.
                             *
                             * @since 1.1.0
                             */
                            ?>
                            <input type="email" name="signup_email" id="signup_email"
                                   placeholder="<?php _e('Email Address', 'buddypress'); ?>"
                                   value="<?php bp_signup_email_value(); ?>" <?php bp_form_field_attributes('email'); ?>/>
                            <?php if (isset($bp->signup->errors['signup_email']) && !empty($bp->signup->errors['signup_email'])) : ?>
                                <div class="error"><?= $bp->signup->errors['signup_email'] ?></div>
                            <?php endif; ?>

                            <?php

                            /**
                             * Fires and displays any member registration password errors.
                             *
                             * @since 1.1.0
                             */
                            ?>
                            <input type="password" name="signup_password" id="signup_password" value=""
                                   placeholder="<?php _e('Choose a Password', 'buddypress'); ?>"
                                   class="password-entry" <?php bp_form_field_attributes('password'); ?>/>
                            <div id="pass-strength-result"></div>
                            <?php if (isset($bp->signup->errors['signup_password']) && !empty($bp->signup->errors['signup_password'])) : ?>
                                <div class="error"><?= $bp->signup->errors['signup_password'] ?></div>
                            <?php endif; ?>

                            <?php

                            /**
                             * Fires and displays any member registration password confirmation errors.
                             *
                             * @since 1.1.0
                             */
                            ?>
                            <input type="password" name="signup_password_confirm" id="signup_password_confirm" value=""
                                   placeholder="<?php _e('Confirm Password', 'buddypress'); ?>"
                                   class="password-entry-confirm" <?php bp_form_field_attributes('password'); ?>/>
                            <?php if (isset($bp->signup->errors['signup_password_confirm']) && !empty($bp->signup->errors['signup_password_confirm'])) : ?>
                                <div class="error"><?= $bp->signup->errors['signup_password_confirm'] ?></div>
                            <?php endif; ?>

                            <?php

                            /**
                             * Fires and displays any extra member registration details fields.
                             *
                             * @since 1.9.0
                             */
                            do_action('bp_account_details_fields'); ?>

                        </div><!-- #basic-details-section -->

                        <?php

                        /**
                         * Fires after the display of member registration account details fields.
                         *
                         * @since 1.1.0
                         */
                        do_action('bp_after_account_details_fields'); ?>
                    </div>
                    <div class="col-sm-12">

                        <?php /***** Extra Profile Details ******/ ?>

                        <?php if (bp_is_active('xprofile')) : ?>

                            <?php

                            /**
                             * Fires before the display of member registration xprofile fields.
                             *
                             * @since 1.2.4
                             */
                            do_action('bp_before_signup_profile_fields'); ?>

                            <div class="register-section" id="profile-details-section">

                                <h4><?php _e('Profile Details', 'buddypress'); ?></h4>

                                <?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
                                <?php if (bp_is_active('xprofile')) :
                                    if (bp_has_profile(array('profile_group_id' => 1, 'fetch_field_data' => false))) :
                                        while (bp_profile_groups()) : bp_the_profile_group(); ?>

                                            <?php while (bp_profile_fields()) : bp_the_profile_field(); ?>

                                                <div<?php bp_field_css_class('editfield'); ?>>
                                                    <fieldset>

                                                        <?php
                                                        $field_type = bp_xprofile_create_field_type(bp_get_the_profile_field_type());
                                                        $field_type->edit_field_html();

                                                        /**
                                                         * Fires before the display of the visibility options for xprofile fields.
                                                         *
                                                         * @since 1.7.0
                                                         */
                                                        do_action('bp_custom_profile_edit_fields_pre_visibility');

                                                        if (bp_current_user_can('bp_xprofile_change_field_visibility')) : ?>
                                                            <p class="field-visibility-settings-toggle"
                                                               id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>"><span
                                                                        id="<?php bp_the_profile_field_input_name(); ?>-2">
											<?php
                                            printf(
                                                __('This field can be seen by: %s', 'buddypress'),
                                                '<span class="current-visibility-level">' . bp_get_the_profile_field_visibility_level_label() . '</span>'
                                            );
                                            ?>
											</span>
                                                                <a href="#" class="visibility-toggle-link"
                                                                   aria-describedby="<?php bp_the_profile_field_input_name(); ?>-2"
                                                                   aria-expanded="false"><?php _ex('Change', 'Change profile field visibility level', 'buddypress'); ?></a>
                                                            </p>

                                                            <div class="field-visibility-settings"
                                                                 id="field-visibility-settings-<?php bp_the_profile_field_id() ?>">
                                                                <fieldset>
                                                                    <legend><?php _e('Who can see this field?', 'buddypress') ?></legend>

                                                                    <?php bp_profile_visibility_radio_buttons() ?>

                                                                </fieldset>
                                                                <a class="field-visibility-settings-close"
                                                                   href="#"><?php _e('Close', 'buddypress') ?></a>

                                                            </div>
                                                        <?php else : ?>
                                                            <p class="field-visibility-settings-notoggle"
                                                               id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
                                                                <?php
                                                                printf(
                                                                    __('This field can be seen by: %s', 'buddypress'),
                                                                    '<span class="current-visibility-level">' . bp_get_the_profile_field_visibility_level_label() . '</span>'
                                                                );
                                                                ?>
                                                            </p>
                                                        <?php endif ?>

                                                        <?php

                                                        /**
                                                         * Fires after the display of the visibility options for xprofile fields.
                                                         *
                                                         * @since 1.1.0
                                                         */
                                                        do_action('bp_custom_profile_edit_fields'); ?>

                                                    </fieldset>
                                                </div>

                                            <?php endwhile; ?>

                                            <input type="hidden" name="signup_profile_field_ids"
                                                   id="signup_profile_field_ids"
                                                   value="<?php bp_the_profile_field_ids(); ?>"/>

                                        <?php endwhile; endif; endif; ?>

                                <?php

                                /**
                                 * Fires and displays any extra member registration xprofile fields.
                                 *
                                 * @since 1.9.0
                                 */
                                do_action('bp_signup_profile_fields'); ?>

                            </div><!-- #profile-details-section -->

                            <?php

                            /**
                             * Fires after the display of member registration xprofile fields.
                             *
                             * @since 1.1.0
                             */
                            do_action('bp_after_signup_profile_fields'); ?>

                        <?php endif; ?>

                    </div>
                </div>

                <?php if (bp_get_blog_signup_allowed()) : ?>

                    <?php

                    /**
                     * Fires before the display of member registration blog details fields.
                     *
                     * @since 1.1.0
                     */
                    do_action('bp_before_blog_details_fields'); ?>

                    <?php /***** Blog Creation Details ******/ ?>

                    <div class="register-section" id="blog-details-section">

                        <h4><?php _e('Blog Details', 'buddypress'); ?></h4>

                        <p><input type="checkbox" name="signup_with_blog" id="signup_with_blog"
                                  value="1"<?php if ((int)bp_get_signup_with_blog_value()) : ?> checked="checked"<?php endif; ?> /> <?php _e('Yes, I\'d like to create a new site', 'buddypress'); ?>
                        </p>

                        <div id="blog-details"
                             <?php if ((int)bp_get_signup_with_blog_value()) : ?>class="show"<?php endif; ?>>

                            <label for="signup_blog_url"><?php _e('Blog URL', 'buddypress'); ?><?php _e('(required)', 'buddypress'); ?></label>
                            <?php

                            /**
                             * Fires and displays any member registration blog URL errors.
                             *
                             * @since 1.1.0
                             */
                            do_action('bp_signup_blog_url_errors'); ?>

                            <?php if (is_subdomain_install()) : ?>
                                http:// <input type="text" name="signup_blog_url" id="signup_blog_url"
                                               value="<?php bp_signup_blog_url_value(); ?>"/> .<?php bp_signup_subdomain_base(); ?>
                            <?php else : ?>
                                <?php echo home_url('/'); ?> <input type="text" name="signup_blog_url"
                                                                    id="signup_blog_url"
                                                                    value="<?php bp_signup_blog_url_value(); ?>"/>
                            <?php endif; ?>

                            <label for="signup_blog_title"><?php _e('Site Title', 'buddypress'); ?><?php _e('(required)', 'buddypress'); ?></label>
                            <?php

                            /**
                             * Fires and displays any member registration blog title errors.
                             *
                             * @since 1.1.0
                             */
                            do_action('bp_signup_blog_title_errors'); ?>
                            <input type="text" name="signup_blog_title" id="signup_blog_title"
                                   value="<?php bp_signup_blog_title_value(); ?>"/>

                            <fieldset class="register-site">
                                <span class="label"><?php _e('Privacy: I would like my site to appear in search engines, and in public listings around this network.', 'buddypress'); ?>
                                    :</span>
                                <?php

                                /**
                                 * Fires and displays any member registration blog privacy errors.
                                 *
                                 * @since 1.1.0
                                 */
                                do_action('bp_signup_blog_privacy_errors'); ?>

                                <label for="signup_blog_privacy_public"><input type="radio" name="signup_blog_privacy"
                                                                               id="signup_blog_privacy_public"
                                                                               value="public"<?php if ('public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value()) : ?> checked="checked"<?php endif; ?> /> <?php _e('Yes', 'buddypress'); ?>
                                </label>
                                <label for="signup_blog_privacy_private"><input type="radio" name="signup_blog_privacy"
                                                                                id="signup_blog_privacy_private"
                                                                                value="private"<?php if ('private' == bp_get_signup_blog_privacy_value()) : ?> checked="checked"<?php endif; ?> /> <?php _e('No', 'buddypress'); ?>
                                </label>
                            </fieldset>

                            <?php

                            /**
                             * Fires and displays any extra member registration blog details fields.
                             *
                             * @since 1.9.0
                             */
                            do_action('bp_blog_details_fields'); ?>

                        </div>

                    </div><!-- #blog-details-section -->

                    <?php

                    /**
                     * Fires after the display of member registration blog details fields.
                     *
                     * @since 1.1.0
                     */
                    do_action('bp_after_blog_details_fields'); ?>

                <?php endif; ?>

                <div>
                    <div class="">

                        <div class="form-group field-signupform-is_tou_accepted required">
                            <div>
                                <label class="checkbox" for="signupform-is_tou_accepted">
                                    <input type="hidden" name="register_options[is_tou_accepted]" value="0"><input
                                            type="checkbox" id="signupform-is_tou_accepted"
                                            name="register_options[is_tou_accepted]" value="1"
                                        <?php if ($is_tou_accepted) {
                                            echo 'checked';
                                        } ?>>
                                    <span class="checkbox-square checkbox-square-quadrate checkbox-square-gray"><i
                                                class="icon icon-check-large"></i></span>
                                    <div class="small mt-0 ml-3 text-dark">By signing up I agree to Fublis' <a
                                                class="text-underline text-dark" href="/page/terms-conditions"
                                                target="_blank">Terms of Use</a>, <a class="text-underline text-dark"
                                                                                     href="/page/privacy-statement"
                                                                                     target="_blank">Privacy Policy</a>
                                        and <a class="text-underline text-dark" href="/page/cookies" target="_blank">Cookie
                                            Policy</a></div>
                                </label>
                            </div>
                            <p class="help-block"></p>
                        </div>
                        <?php if (isset($bp->signup->errors['signup_is_tou_accepted']) && !empty($bp->signup->errors['signup_is_tou_accepted'])) : ?>
                            <div class="error"><?= $bp->signup->errors['signup_is_tou_accepted'] ?></div>
                        <?php endif; ?>


                        <div class="form-group field-signupform-is_newsletters_enabled">
                            <div>
                                <label class="checkbox" for="signupform-is_newsletters_enabled">
                                    <input type="hidden" name="register_options[is_newsletters_enabled]"
                                           value="0"><input type="checkbox" id="signupform-is_newsletters_enabled"
                                                            name="register_options[is_newsletters_enabled]" value="1">
                                    <span class="checkbox-square checkbox-square-quadrate checkbox-square-gray"><i
                                                class="icon icon-check-large"></i></span>
                                    <div class="small mt-0 ml-3 text-dark">I would like to receive the Fublis
                                        newsletter
                                    </div>
                                </label>
                            </div>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group field-signupform-is_notifications_enabled">
                            <div>
                                <label class="checkbox align-items-start" for="signupform-is_notifications_enabled">
                                    <input type="hidden" name="register_options[is_notifications_enabled]"
                                           value="0"><input type="checkbox" id="signupform-is_notifications_enabled"
                                                            name="register_options[is_notifications_enabled]" value="1">
                                    <span class="checkbox-square checkbox-square-quadrate checkbox-square-gray"><i
                                                class="icon icon-check-large"></i></span>
                                    <div class="small mt-0 ml-3 text-dark">
                                        <div class="mb-3">I would like to receive email notifications</div>
                                        <div class="text-muted">On Fublis you can follow brands. I would like to receive
                                            notifications from Fublis when brands I follow publish new content (such as
                                            products, projects and news on Fublis).
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <p class="help-block"></p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <?php echo do_shortcode('[bws_google_captcha]') ?>
                    <div>
                        <?php if (isset($bp->signup->errors['signup_recaptcha']) && !empty($bp->signup->errors['signup_recaptcha'])) : ?>
                            <div class="error"><?= $bp->signup->errors['signup_recaptcha'] ?></div>
                        <?php endif; ?>
                    </div>

                    <?php

                    /**
                     * Fires before the display of the registration submit buttons.
                     *
                     * @since 1.1.0
                     */
                    do_action('bp_before_registration_submit_buttons'); ?>

                    <div class="col-md-8 buddypress-submit-wrapper">
                        <div class="submit">
                            <input type="submit" name="signup_submit" id="signup_submit"
                                   class="btn btn-primary text-uppercase"
                                   value="<?php esc_attr_e('Sign Up', 'buddypress'); ?>"/>
                        </div>
                    </div>

                    <?php

                    /**
                     * Fires after the display of the registration submit buttons.
                     *
                     * @since 1.1.0
                     */
                    do_action('bp_after_registration_submit_buttons'); ?>

                    <?php wp_nonce_field('bp_new_signup'); ?>
                </div>

            <?php endif; // request-details signup step ?>

            <?php if ('completed-confirmation' == bp_get_current_signup_step()) : ?>

                <div id="template-notices" role="alert" aria-atomic="true">
                    <?php

                    /** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
                    do_action('template_notices'); ?>

                </div>

                <?php

                /**
                 * Fires before the display of the registration confirmed messages.
                 *
                 * @since 1.5.0
                 */
                do_action('bp_before_registration_confirmed'); ?>

                <div id="template-notices" role="alert" aria-atomic="true">
                    <?php if (bp_registration_needs_activation()) : ?>

                        <?php

                        $user_id = (!empty($_POST['buddypress_id'])) ? (int) trim($_POST['buddypress_id']) : 0;

                        if ($user_id != false) {
                            $args = [
                                'ID' => $id, // this is the ID of the user you want to update.
                                'first_name' => $first_name,
                                'last_name' => $last_name
                            ];

                            var_dump($user_id);

                            echo '<br><br>';

                            var_dump($first_name);

                            echo '<br><br>';

                            var_dump($last_name);

                            wp_update_user($args);

                            exit;
                        }
                        ?>

                        <style>
                            .fublis-page {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }
                        </style>

                        <div class="text-center registration-confirm">
                            <div class="registration-confirm__icon-wrapper">
                                <i class="icon-mail registration-confirm__icon"></i>
                                <span class="registration-confirm__number">1</span>
                            </div>

                            <h2 class="registration-confirm__heading">Confirm your account</h2>

                            <p class="text-light-grey registration-confirm__text">
                                <?php _e('Before proceeding, we need to confirm your account. Check your email and click the verification link to continue.', 'buddypress'); ?>
                                <?php _e('<a>Did not receive it? Resent email</>', 'buddypress'); ?>

                            </p>

                        </div>

                    <?php else : ?>
                        <p><?php _e('You have successfully created your account! Please log in using the username and password you have just created.', 'buddypress'); ?></p>
                    <?php endif; ?>
                </div>

                <?php

                /**
                 * Fires after the display of the registration confirmed messages.
                 *
                 * @since 1.5.0
                 */
                do_action('bp_after_registration_confirmed'); ?>

            <?php endif; // completed-confirmation signup step ?>

            <?php

            /**
             * Fires and displays any custom signup steps.
             *
             * @since 1.1.0
             */
            do_action('bp_custom_signup_steps'); ?>

        </form>

    </div>

    <?php

    /**
     * Fires at the bottom of the BuddyPress member registration page template.
     *
     * @since 1.1.0
     */
    do_action('bp_after_register_page'); ?>

</div><!-- #buddypress -->
