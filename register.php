<?php

/*
 * Template Name: Register Page
 * description: >-
  Page template without sidebar
 */

global $wp, $reg_page_msg;
$reg_url = home_url('/register');
$current_slug = add_query_arg(array(), $wp->request);
if (is_page('register') && !is_user_logged_in()) {

    get_header(); ?>

    <?php get_template_part('page-parts/general-title-section'); ?>

    <?php get_template_part('page-parts/general-before-wrap'); ?>


    <div class="registration-options">
        <div class="registration-options__heading">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Choose a role below to register as</h5>
                </div>
            </div>
        </div>
        <div class="registration-options__body">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card registration-option-card">
                        <a href="#" id="architect-reg" class="registration-option-link"
                           data-toggle="modal" data-target="#registrationModal">
                            <i class="fas fa-home"></i>
                            <div class="role-name">
                                <h4><b>Architect</b></h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card registration-option-card">
                        <a href="#" id="journalist-reg" class="registration-option-link"
                           data-toggle="modal" data-target="#registrationModal">
                            <i class="fas fa-newspaper"></i>
                            <div class="role-name">
                                <h4><b>Journalists</b></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card registration-option-card">
                        <a id="designer-reg" data-toggle="modal" class="registration-option-link"
                           data-target="#registrationModal">
                            <i class="fab fa-sketch"></i>
                            <div class="role-name">
                                <h4><b>Designer</b></h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card registration-option-card">
                        <a id="brand-reg" data-toggle="modal" class="registration-option-link"
                           data-target="#registrationModal">
                            <i class="fab fa-bandcamp"></i>
                            <div class="role-name">
                                <h4><b>Brand</b></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <?php get_template_part('page-parts/general-after-wrap'); ?>

    <?php get_footer();
} else {
    wp_redirect(home_url($current_slug));
    $reg_page_msg = "You are already logged in";
}


?>
    <!--Registration Modal HTML -->
    <div id="registrationModal" class="modal fade">
        <div class="kleo-form-modal">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="button" title="Close (Esc)" class="mfp-close" data-dismiss="modal">&times;</button>
                    <div class="kleo-pop-title-wrap main-color">
                        <h3 class="kleo-pop-title">Create an account</h3>
                        <p>
                            <em>or</em>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal"
                               class="new-account"> Login instead</a>
                        </p>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group company">
                                <input type="text" class="form-control sq-username" name="company" id="company"
                                       placeholder="Company/Studio/Brand" required>
                            </div>
                            <div class="form-group your-name">
                                <input type="text" class="form-control sq-username" name="your-name" id="your-name"
                                       placeholder="Your Name" required>
                            </div>
                            <div class="form-group full-name">
                                <input type="text" class="form-control sq-username sq-username" name="full-name"
                                       id="full-name" placeholder="Full Name" required>
                            </div>
                            <div class="form-group your-email">
                                <input type="email" class="form-control sq-username" name="your-email" id="your-email"
                                       aria-describedby="emailHelp" placeholder="Your email" required>
                            </div>
                            <div class="form-group work-email">
                                <input type="email" class="form-control sq-username" name="work-email" id="work-email"
                                       aria-describedby="emailHelp" placeholder="Work email" required>
                            </div>
                            <div class="form-group your-password">
                                <input type="password" class="sq-password form-control" name="your-password"
                                       id="your-password" placeholder="Your Password" required>
                            </div>
                            <div class="form-group confirm-password">
                                <input type="password" class="sq-password form-control" name="confirm-password"
                                       id="confirm-password" placeholder="Retype Password" required>
                            </div>
                            <div class="form-group linkedin">
                                <input type="url" class="form-control sq-username" name="linkedin" id="linkedin"
                                       placeholder="LinkedIn URL" required>
                            </div>
                            <div class="form-group website-url">
                                <input type="url" class="form-control sq-username" name="website-url" id="website-url"
                                       placeholder="Website URL" required>
                            </div>
                            <div class="form-group about-you">
                                <textarea class="form-control" name="about-you" id="about-you" placeholder="About You"
                                          rows="2" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="user-role" id="user-role">
                            </div>
                            <div id="drizy-reg-result"></div>
                            <button type="submit" class="btn btn-lg btn-default btn-block" id="register-btn">Sign Up
                            </button>
                        </form>
                    </div>
                    <div class="kleo-fb-wrapper text-center">Social Signup</div>
                </div>
            </div>
        </div>
    </div>


    <!--login modal-->
    <div id="loginModal" class="modal fade">
        <div class="kleo-form-modal">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="button" title="Close (Esc)" class="mfp-close" data-dismiss="modal">&times;</button>
                    <div class="kleo-pop-title-wrap main-color">
                        <h3 class="kleo-pop-title">Log in with your credentials</h3>
                        <p>
                            <em>or</em>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="<?php $reg_url ?>" class="new-account"> Create an account </a>
                        </p>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group security">
                                <input type="hidden" name="fublis-security" id="fublis-security">
                            </div>
                            <div class="form-group about-you">
                                <input class="form-control sq-username" name="user-name" id="user-name"
                                       placeholder="Username or Email" required>
                            </div>
                            <div class="form-group password">
                                <input type="password" class="sq-password form-control" name="password" id="password"
                                       placeholder="Password" required>
                            </div>
                            <div id="drizy-login-result"></div>
                            <button type="submit" class="btn btn-lg btn-default btn-block" id="login-btn">Sign In
                            </button>
                            <label class="checkbox pull-left">
                                <input type="checkbox" class="sq-sq-rememberme" name="rememberme" value="forever">
                                Remember me
                            </label>
                            <a href="#" class="kleo-show-lostpass kleo-other-action pull-right" data-dismiss="modal"
                               data-toggle="modal" data-target="#passResetModal">Lost your password ?</a>
                            <span class="clearfix"></span>
                        </form>
                    </div>
                    <div class="kleo-fb-wrapper text-center">Social Signup</div>
                </div>
            </div>
        </div>
    </div>
<?php
