<?php

/*
 * Template Name: Register Page
 * description: >-
  Page template without sidebar
 */

global $wp, $reg_page_msg;
$current_slug = add_query_arg( array(), $wp->request );
if(is_page('register') && !is_user_logged_in()){

    get_header(); ?>

    <?php get_template_part('page-parts/general-title-section'); ?>

    <?php get_template_part('page-parts/general-before-wrap'); ?>

                        <div class="row">
                            <h5 >Choose a role below to register as</h5>
                        </div>
                        <div class="card-rows">
                            <div class="card-columns col-sm-6">
                                <div class="card">
                                    <a href="#" id="architect-reg" data-toggle="modal" data-target="#registrationModal">
                                        <i class="fas fa-home"></i>
                                        <div class="role-name">
                                            <h4><b>Architect</b></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-columns col-sm-6">
                                <div class="card">
                                    <a href="#" id="journalist-reg" data-toggle="modal" data-target="#registrationModal">
                                        <i class="fas fa-newspaper"></i>
                                        <div class="role-name">
                                            <h4><b>Journalists</b></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-rows">
                            <div class="card-columns col-sm-6">
                                <div class="card">
                                    <a id="designer-reg" data-toggle="modal" data-target="#registrationModal">
                                        <i class="fas fa-newspaper"></i>
                                        <div class="role-name">
                                            <h4><b>Designer</b></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-columns col-sm-6">
                                <div class="card">
                                    <a id="brand-reg" data-toggle="modal" data-target="#registrationModal">
                                        <i class="fas fa-newspaper"></i>
                                        <div class="role-name">
                                            <h4><b>Brand</b></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal HTML -->
                        <div id="registrationModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div id="reg-modal-title" class="modal-header">
                                        <h3 class="modal-title">Join Fublis</h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <P id="reg-error-message" class="disabled"></P>
                                            <div class="form-group company">
                                                <input type="text" class="form-control" name="company" id="company" placeholder="Company/Studio/Brand" required>
                                            </div>
                                            <div class="form-group your-name">
                                                <input type="text" class="form-control" name="your-name" id="your-name" placeholder="Your Name" required>
                                            </div>
                                            <div class="form-group full-name">
                                                <input type="text" class="form-control" name="full-name" id="full-name" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group your-email">
                                                <input type="email" class="form-control" name="your-email" id="your-email" aria-describedby="emailHelp" placeholder="Your email" required>
                                            </div>
                                            <div class="form-group work-email">
                                                <input type="email" class="form-control" name="work-email" id="work-email" aria-describedby="emailHelp" placeholder="Work email" required>
                                            </div>
                                            <div class="form-group your-password">
                                                <input type="password" class="form-control" name="your-password" id="your-password" placeholder="Your Password" required>
                                            </div>
                                            <div class="form-group confirm-password">
                                                <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Retype Password" required>
                                            </div>
                                            <div class="form-group linkedin">
                                                <input type="url" class="form-control" name="linkedin" id="linkedin" placeholder="LinkedIn URL" required>
                                            </div>
                                            <div class="form-group website-url">
                                                <input type="url" class="form-control" name="website-url" id="website-url" placeholder="Website URL" required>
                                            </div>
                                            <div class="form-group about-you">
                                                <textarea class="form-control" name="about-you" id="about-you" placeholder="About You" rows="2" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="user-role" id="user-role">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Sign In</button>
                                        <button type="submit" class="btn btn-primary" id="register-btn">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--login modal-->
                        <div id="loginModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Login</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group about-you">
                                                <input class="form-control" name="user-name" id="user-name" placeholder="Username or Email" required>
                                            </div>
                                            <div class="form-group password">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" id="register-toggle" data-dismiss="modal" data-toggle="modal" data-target="#registrationModal">Sign Up</button>
                                        <button type="submit" class="btn btn-primary" id="login-btn" data-toggle="modal" data-target="#loginModal">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </div>

    <?php get_template_part('page-parts/general-after-wrap'); ?>

    <?php get_footer();
}else{
    wp_redirect(home_url($current_slug));
    $reg_page_msg = "You are already logged in";
}

