<?php
/*
 * Template Name: User Profile
 * description: >-
  Page template without sidebar
 */


get_header(); 
/***************************************************
 * :: First section
 ***************************************************/
if(!is_user_logged_in()){
    wp_redirect(home_url('/login'));
}
$user = get_current_user_id();
?>
<div id="buddypress">
    <div class="page" id="complete-profile-page">
        <section class="complete-page-header">
            <div class="container">
                <section class="row user-welcome-text">
                    <div class="complete-profile-welcome">
                        <h3><?php _e('We highly recommend you complete your profile and add your studio/brand, <br>that will help you get your stories published faster.'); ?></h3>
                    </div>
                    <div class="image-upload-one" align="center">
                        <div class="center">
                            <div class="form-input">
                                <label for="file-ip-1">
                                    <?php
                                    $profile_pic =  get_user_meta($user, 'profile_pic', true);
                                    $prev_pic_url =  get_stylesheet_directory_uri().'/img/profile/camera.png';
                                    $pic_title = get_user_meta($user, 'pic_title', true);
                                    if(empty($profile_pic)){
                                        echo '<img id="profile-pic-update-preview" src="'.$prev_pic_url.'">' ;
                                    }else{
                                        echo '<img id="profile-pic-update-preview" src="'.$profile_pic.'" title="'.$pic_title.'" class="profile-image">';
                                    }
                                    ?>
                                </label>
                                <input type="hidden"  name="img_one" id="profile-pic-update" />
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <section class="user-info">
            <div class="user-edit-btn container-fluid">
                <a id="edit-user-edit" class="btn btn-default edit-user-profile"><i class="fa fa-pencil"></i> edit </a>
                <a id="edit-user-save" class="btn btn-default edit-user-save"><i class="fa fa-cloud"></i> save </a>
                <a id="edit-user-cancel" class="btn btn-default edit-user-cancel"><i class="fa fa-ban"></i> cancel </a>
            </div>
            <div class="container" align="center">
                <div class="user-personal-info">
                    <h3 class="user-name"><?php echo get_user_meta($user, 'first_name', true); ?> <?php echo get_user_meta($user, 'last_name', true); ?></h3>
                </div>
                <div class="user-occupation-location">
                    <p class="user-occupation"><?php echo get_user_meta($user, 'user_occupation', true); ?> from <?php echo get_user_meta($user, 'user_location', true); ?></p>
                </div>
                <div class="user-description-btn" align="center">
                    <a id="user-description-btn" class="btn btn-default"><i class="fa fa-plus"></i> Description </a>
                </div>
                <form id="edit-user-data" data-align="center">
                    <div class="row user-names-edit">
                        <div class="col-md-6">
                            <input type="text" class="form-control first-name-edit" id="first-name-edit" name="first-name-edit" value="<?php echo get_user_meta($user, 'first_name', true); ?>" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control last-name-edit" id="last-name-edit" name="last-name-edit" value="<?php echo get_user_meta($user, 'last_name', true); ?>" />
                        </div>
                    </div>
                    <div class="row user-address-edit">
                        <div class="col-md-4">
                            <select class="form-control selectpicker" id="occupation-edit" data-show-subtext="true" data-live-search="true" name="occupation-edit" required>
                                <?php $occupation_edit = get_user_meta($user, 'user_occupation', true); ?>
                                <option value="<?php echo $occupation_edit ?>"><?php
                                    if(empty($occupation_edit)){
                                        echo 'Select Occupation';
                                    }else{
                                        echo strtoupper($occupation_edit);
                                    }
                                     ?></option>
                                <option value="architect">Architect</option>
                                <option value="designer">Designer</option>
                                <option value="Journalist">Journalist</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <p>from</p>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control location-edit" id="autocomplete" onFocus="initAutoComplete()" name="location-edit" value="<?php echo get_user_meta($user, 'user_location', true); ?>" required/>
                        </div>
                    </div>
                    <div class="user-description">
                        <input class="form-control description-edit" name="description-edit" placeholder="Description (optional)" value="<?php echo get_user_meta($user, 'description', true); ?>" />
                    </div>
                </form>
            </div>
        </section>
        <section>
           <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active text-primary" id="media-kits-tab" data-toggle="tab" href="#media-kits" role="tab" aria-controls="home" aria-selected="true">MEDIA KITS</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="following-tab" data-toggle="tab" href="#following" role="tab" aria-controls="profile" aria-selected="false">FOLLOWING</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="container">
                    <div class="tabs-content-intro">
                        <div class="intro-icon">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        </div>
                        <div class="intro-content">
                            <p><b>Would like to publish Media Kits for your projects?</b> And add your Studio/Brand and connect to an existing Studio/Brand on Fublis</p>
                            <div class="intro-btns">
                                <a class="btn btn-default btn-small declind">MAYBE LATER </a>
                                <a class="btn btn-default btn-small accept" id="complete-profile-accept">YES, PLEASE </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="media-kits" role="tabpanel" aria-labelledby="media-kits-tab">
                        <div class="media-kits-upload col-lg-5 col-md-4">
                            <div class="center">
                                <div class="form-input align-items-center" align="center">
                                    <label for="media-kits-file" align="center" id="media-kits-file">
                                        <img id="media-kits-file-preview" src="<?php echo get_stylesheet_directory_uri(); ?>/img/profile/plus.png">
                                    </label>
                                    <input type="hidden"  name="media_file" id="media-kits-file" accept="image/*" >
                                    <h3 class="media-kits-heading">NEW MEDIA KITS</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">Second...</div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
