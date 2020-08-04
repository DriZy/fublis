<?php

#-----------------------------------
# User registration
#---------------------------------

//function drizy_user_registration(){
//
//    echo json_encode(array("message"=> "papy"));
//    die();
//    $response = array();
//    try{
//
////        include_once 'inc/_google_recaptcha.inc';
//
//        $company_name = esc_attr(isset($_POST['company_name'])) ?: '';
//        $your_name = esc_attr(isset($_POST['your_name'])) ?: '';
//        $full_name = esc_attr(isset($_POST['full_name'])) ?: '';
//        $your_email = trim(esc_attr(isset($_POST['your_email']))) ?: '';
//        $work_email = trim(esc_attr(isset($_POST['work_email']))) ?: '';
//        $linkedin_url = trim(esc_attr(isset($_POST['linkedin_url']))) ?: '';
//        $website_url = trim(esc_attr(isset($_POST['website_url']))) ?: '';
//        $about_you = trim(esc_attr(isset($_POST['about_you']))) ?: '';
//        $user_role = trim(esc_attr(isset($_POST['user_role']))) ?: '';
//
//        $name = $your_name ?: $full_name;
//        $email = $your_email ?: $work_email;
////        $password = esc_attr($_POST['password']);
////        $legal = esc_attr($_POST['legal']);
////        $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
//
//        // Verify recaptcha token
//        // _verify_captcha($captcha);
//
////        if (!is_email($email)){
////            throw new Exception(__('Sorry the email address is invalid.', 'ibid'));
////        }elseif (empty($name)){
////            throw new Exception(__('Please fill in a name'));
////        }
////        else if (strlen($password) < 8){
////            throw new Exception(__('The password length must be 8 characters and above.', 'ibid'));
////        }
////        else if (empty($legal)){
////            throw new Exception(__('You must agree to the terms of use and privacy policy.', 'ibid'));
////        }
//
//        $args = array (
//            'user_login'    =>  $name,
//            'user_email'    =>  $email,
//            'description'   =>  $about_you,
//            'role'          =>  $user_role,
////            'first_name'    =>  $user_first_name,
////            'last_name'     =>  $user_last_name,
//            'display_name' => $name
//        ) ;
//
//        $id = wp_insert_user( $args ) ;
//        if(is_wp_error( $id )){
//            if ($id->get_error_code() == 'existing_user_login'){
//                throw new Exception(__("This email address already registered. You may want to login instead.", 'ibid'));
//            } else {
//                $response['message'] = $id->get_error_message();
//            }
//        }
//        else
//        {
//            $site_name = get_bloginfo('name');
//            $response['type'] = "success";
//            $response['message'] = __("Thank you for registering on $site_name. Please verify your email account by clicking on the the link that has been sent to your email.This might take 2-3 minutes to get to your account. If you do not find the email in your inbox after this time, please check your spam folder.", 'ibid');
//        }
//    }
//    catch (Exception $e) {
//        $response['type'] = "error";
//        $response['message'] = nl2br($e->getMessage());
//    }
//
//    echo json_encode($response);
//    wp_die();
//}
//add_action("wp_ajax_drizy_user_registration", "drizy_user_registration");
//add_action("wp_ajax_nopriv_drizy_user_registration", "drizy_user_registration");
