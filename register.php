<?php

/*
 * Template Name: Register Page
 * description: >-
  Page template without sidebar
 */

get_header(); ?>

<?php
// create full width template.
kleo_switch_layout( 'no' );
add_filter( 'kleo_main_template_classes', function ( $cols ) {
	$cols .= ' text-center';

	return $cols;
} );
?>

<?php get_template_part( 'page-parts/general-title-section' ); ?>

<?php get_template_part( 'page-parts/general-before-wrap' ); ?>

                <div class="register-page-cards">
                    <div class="card-rows">
                        <div class="card-columns col-sm-6">
                            <a href="#" class="card" data-toggle="modal" data-target="#myModal">
                                <i class="fas fa-home"></i>
                                <div class="role-name">
                                    <h4><b>Architect</b></h4>
                                </div>
                            </a>
                        </div>
                        <div class="card-columns col-sm-6">
                            <a href="#" class="card" data-toggle="modal" data-target="#myModal">
                                <i class="fas fa-newspaper"></i>
                                <div class="role-name">
                                    <h4><b>Journalists</b></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-rows">
                        <div class="card-columns col-sm-6">
                            <a class="card">
                                <i class="fas fa-newspaper"></i>
                                <div class="role-name">
                                    <h4><b>Designer</b></h4>
                                </div>
                            </a>
                        </div>
                        <div class="card-columns col-sm-6">
                            <a class="card">
                                <i class="fas fa-newspaper"></i>
                                <div class="role-name">
                                    <h4><b>Brand</b></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal HTML -->
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="company">Company/Studio/Brand</label>
                                        <input type="text" class="form-control" id="company" placeholder="Company/Studio/Brand">
                                    </div>
                                    <div class="form-group">
                                        <label for="your-name">Your Name</label>
                                        <input type="text" class="form-control" id="your-name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Your email">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin URL</label>
                                        <input type="url" class="form-control" id="linkedin" placeholder="LinkedIn URL">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website" placeholder="Website">
                                    </div>
                                    <div class="form-group">
                                        <label for="about-you">About You</label>
                                        <textarea class="form-control" id="about-you" placeholder="About You" rows="5"></textarea>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>




<?php get_template_part( 'page-parts/general-after-wrap' ); ?>

<?php get_footer(); ?>

