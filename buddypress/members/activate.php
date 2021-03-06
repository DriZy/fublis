<?php
/**
 * BuddyPress - Members Activate
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

?>

<div id="buddypress">

	<?php

	/**
	 * Fires before the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_activation_page' ); ?>

	<div class="page" id="activate-page">

		<div id="template-notices" role="alert" aria-atomic="true">
			<?php

			/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
			do_action( 'template_notices' ); ?>

		</div>

		<?php

		/**
		 * Fires before the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_before_activate_content' ); ?>

		<?php if ( bp_account_was_activated() ) : ?>

			<?php if ( isset( $_GET['e'] ) ) : ?>
				<p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress' ); ?></p>
			<?php else : ?>
				<p>
					<?php
					$activation_text = __( 'Your account was activated successfully! You can now <a href="%s">log in</a> with the username and password you provided when you signed up.', 'buddypress' );
					$activation_text = str_replace( 'a href="%s"', 'a class="kleo-show-login" href="%s"', $activation_text );

					printf( $activation_text , wp_login_url( bp_get_root_domain() ) );
					?>
				</p>
			<?php endif; ?>

		<?php else : ?>

            <style>
                #header {
                    display: none;
                }
            </style>

            <div class="text-center">

                <div>
                    <img id="logo_img" title="Fublis" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Fublis-Logo-1.png" alt="Fublis" style="max-height: 36px;">
                </div>

                <h2 class="registration-confirm__heading">Information</h2>

                <p class="text-light-grey">Choose your occupation and location</p>

                <form action="" method="post" class="standard-form activate-form" id="activation-form">

<!--                    <label for="key">--><?php //_e( 'Activation Key:', 'buddypress' ); ?><!--</label>-->
                    <input type="hidden" name="key" id="key" value="<?php echo esc_attr( bp_get_current_activation_key() ); ?>" />
                    <div class="form-group user-data">
                        <select class="form-control selectpicker" id="occupation" data-show-subtext="true" data-live-search="true" name="occupation" required>
                            <option value="">Select Occupation</option>
                            <option value="architect">Architect</option>
                            <option value="designer">Designer</option>
                            <option value="Journalist">Journalist</option>
                        </select>
                    </div>
                    <div class="form-group has-search ui-widget">
<!--                        <span class="fa fa-search form-control-feedback"></span>-->
                        <input type="text" class="form-control location" id="autocomplete" onFocus="initAutoComplete()" name="location" placeholder="Search Location" required/>
                    </div>

                    <p class="submit">
                        <input type="submit" id="activate-btn" name="submit" data-id="" value="<?php esc_attr_e( 'Activate', 'buddypress' ); ?>" />
                    </p>

                </form>
            </div>

		<?php endif; ?>

		<?php

		/**
		 * Fires after the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_after_activate_content' ); ?>

	</div><!-- .page -->

	<?php

	/**
	 * Fires after the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_activation_page' ); ?>

</div><!-- #buddypress -->

