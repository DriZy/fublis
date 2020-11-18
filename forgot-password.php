<?php
/*
 * Template Name: Forgot Password
 * description: >-
  Page template without sidebar
 */

get_header()
;/***************************************************
 * :: First section
 ***************************************************/

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
}
?>
<div class="fublis-page">
    <div class="fublis-content">
        <div class="fublis-page-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="article-content">
                            <div id="buddypress">
                                <div>
                                    <div class="text-right">
                                        Don't have an account yet? &nbsp; <a href="<?php echo get_home_url().'/register'; ?>" class="btn btn-primary text-uppercase">Sign Up</a>
                                    </div>
                                    <div class="text-center">
                                        <h2>Forgot Password</h2>
                                    </div>
                                </div>
                                <div class="row page" id="login-page">
                                    <div class="col-md-2 col-lg-3 pl-lg-3"></div>
                                    <form method="post" action="" class="standard-form col-md-8 col-lg-6 pl-lg-6" enctype="multipart/form-data" id="pwd-reset">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="drizy-login-result" align="center"></div>

                                                <input type="email" name="user_email" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" placeholder="<?php esc_html_e( 'Email Address', 'bbpress' ); ?>" size="20" maxlength="100" id="user_email" autocomplete="off"  required />

                                                <div class="col-md-8 buddypress-submit-wrapper">
                                                    <div class="submit">

                                                        <input type="submit" name="user-submit" id="user-pwd-reset"
                                                               class="button submit user-submit btn btn-primary text-uppercase"
                                                               value="<?php esc_html_e( 'Reset Password', 'bbpress' ); ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-md-2 col-lg-3 pl-lg-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
