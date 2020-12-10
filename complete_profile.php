<?php
/**
 * The template for user to complete their profile pages
 *
 * @package WordPress
 * @subpackage Kleo
 * @since Kleo 1.0
 */

get_header(); 
/***************************************************
 * :: First section
 ***************************************************/
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
                    <div class="image-upload-one">
                        <div class="center">
                            <div class="form-input">
                                <label for="file-ip-1">
                                    <img id="file-ip-1-preview" src="<?php echo get_stylesheet_directory_uri(); ?>/img/profile/camera.png">
                                </label>
                                <input type="file"  name="img_one" id="file-ip-1" accept="image/*" onchange="showPreviewOne(event);">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <section class="user-info">
            <div class="user-edit-btn container-fluid">
                <a class="btn btn-default edit-user-profile"><i class="fa fa-pencil"></i> edit </a>
            </div>
            <div class="container">
                <div class="user-personal-info">
                    <h3 class="user-name"><?php echo get_user_meta($user, 'first_name', true); ?> <?php echo get_user_meta($user, 'last_name', true); ?></h3>
                </div>
                <div class="user-occupation-location">
                    <p class="user-occupation"><?php echo get_user_meta($user, 'user_occupation', true); ?> <?php echo get_user_meta($user, 'user_location', true); ?></p>
                </div>
                <div class="user-description-btn">
                    <a class="btn btn-default"><i class="fa fa-plus"></i> Description </a>

                </div>
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
                                <a class="btn btn-default btn-small accept">YES, PLEASE </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="media-kits" role="tabpanel" aria-labelledby="media-kits-tab">
                        <div class="media-kits-upload col-lg-5 col-md-4">
                            <div class="center">
                                <form class="form-input align-items-center" align="center">
                                    <label for="media-kits-file" align="center">
                                        <img id="media-kits-file-preview" src="<?php echo get_stylesheet_directory_uri(); ?>/img/profile/plus.png">
                                    </label>
                                    <input type="file"  name="media_file" id="media-kits-file" accept="image/*" >
                                    <input type="submit" name="mediafile" value="Upload File">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">Second...</div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
//
//    if(isset($_FILES['media_file']['name'])){
//        print ($_FILES);
//        die();
//    }


//    $filename = $_FILES['files']['name'];
//    $location = "upload/".$filename;
//    $uploadOk = 1;
//    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
//    $valid_extensions = array('jpg', 'jpeg', 'png');
//
//    if(!in_array(strtolower($imageFileType), $valid_extensions)){
//        $uploadOk = 0;
//    }
//    if ($uploadOk == 0){
//        echo 0;
//    }else{
//        if (move_uploaded_file($_FILES['files']['tmp_name'], $location)){
//            echo $location;
//        }else{
//            echo 0;
//        }
//    }
?>


<?php get_footer(); ?>
