<?php
/*
 * Template Name: Login
 * description: >-
  Page template without sidebar
 */

get_header();
/***************************************************
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
                            <div id="buddypress-login">
                                <div>
                                    <div class="text-right">
                                        Don't have an account yet? &nbsp; <a href="<?php echo get_home_url().'/register'; ?>" class="btn btn-primary text-uppercase">Sign Up</a>
                                    </div>
                                    <div class="text-center">
                                        <h2>Log In</h2>
                                    </div>
                                </div>
                                <div class="row page" id="login-page">
                                    <div class="col-md-2 col-lg-3 pl-lg-3"></div>
                                    <form method="post" action="" class="standard-form col-md-8 col-lg-6 pl-lg-6" enctype="multipart/form-data">
                                        <div class="row">
                                            <?php do_action( 'login_form' ); ?>
                                            <div class="text-center">
                                                <h3>or use Login Details</h3>
                                            </div>
                                            <div class="col-sm-12">
                                                <div id="drizy-login-result" align="center"></div>

                                                <input type="text" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" placeholder="<?php esc_html_e( 'Username', 'bbpress' ); ?>" size="20" maxlength="100" id="user_login" autocomplete="off"  required />

                                                <input type="password" name="pwd" value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" placeholder="<?php esc_html_e( 'Password', 'bbpress' ); ?>" size="20" id="user_pass" autocomplete="off" required />

                                                <div class="bbp-remember-me">
                                                    <input type="checkbox" name="rememberme" value="forever" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme" />
                                                    <label for="rememberme"><?php esc_html_e( 'Keep me signed in', 'bbpress' ); ?></label>
                                                    <a href="<?php echo get_home_url().'/forgot-password'; ?>" class="forgot-pass right">Forgot Password</a>
                                                </div>
                                                <div class="col-md-8 buddypress-submit-wrapper">
                                                    <div class="submit">

                                                        <input type="submit" name="user-submit" id="user-login"
                                                               class="button submit user-submit btn btn-primary text-uppercase"
                                                               value="<?php esc_html_e( 'Log In', 'bbpress' ); ?>" >
                                                    </div>
                                                    <?php bbp_user_login_fields(); ?>
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
