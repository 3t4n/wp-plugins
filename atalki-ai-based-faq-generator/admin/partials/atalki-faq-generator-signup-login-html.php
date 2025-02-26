<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://blackzoid.com/
 * @since      1.0.0
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!-- <div oncontextmenu='return false' class='snippet-body faq-sign-in-sign-up-page'> -->
<div class='snippet-body faq-sign-in-sign-up-page'>
    <?php 
        require_once(ATALKI_FAQ_GENERATOR_DIR_PATH . "/admin/partials/afaqg-header.php");
    ?>
    


    <div class="container ">
        
         <div class="row">
            <div class="col-md-6">
               <div class="container bz-text-container">
                  <div class="bz-text">
                     <h2 class="text-left">
                        <?php _e("Generate your own FAQs that works for you", "atalki-faq-generator"); ?>
                     </h2>
                     <ul style="padding: 0;">
                        <li><?php _e("Writing FAQs can be hard.", "atalki-faq-generator"); ?></li>
                        <li><?php _e("Don’t do it alone.", "atalki-faq-generator"); ?></li>
                        <li>
                            <?php _e("Atalki empowers you to generate FAQs based on your content, saving your time and effort.", "atalki-faq-generator"); ?>
                        </li>
                     </ul>
                  </div>
                  <img src="<?php echo ATALKI_FAQ_GENERATOR_PLUGIN_URL; ?>/admin/images/faq image.jpeg" alt="" class="w-100">
               </div>
            </div>
            <div class="col-md-6">
               <div class="frame">
                  <div class="nav">
                     <ul class="links">
                        <li class="signin-active"><a class="btn" id="btn-login">Login</a></li>
                        <li class="signup-inactive"><a class="btn" id="btn-signup">Sign Up</a></li>
                     </ul>
                  </div>
                  <div ng-app ng-init="checked = false">
                     <form class="form-signin" action="" method="post" name="form">
                        <?php wp_nonce_field( 'atalki_login_form', 'atalki_login_form_nonce_field' ); ?>
                        <!-- <label for="username">Username/Email</label> -->
                        <input class="form-styling" type="text" name="login_username" id="login_username" placeholder="Usernam/Email" /> 
                        <!-- <label for="password">Password</label> -->
                        <input class="form-styling" type="password" name="login_password" id="login_password" placeholder="Password" />
                        <input type="checkbox" id="checkbox" name="keep_me_login" value="1" /> 
                        <label for="checkbox">
                            <span class="ui"></span>
                            Keep me signed in
                        </label>
                        <div class="btn-animate"> 
                            <!-- <a class="btn-signin" class="btn-signin" id="singup_login">Login to your account</a> -->
                            <input type="submit" class="btn-signin" value="Login to your account" id="singup_login" /> 
                        </div>
                     </form>
                     <form class="form-signup" action="" method="post" name="form">
                        <?php wp_nonce_field( 'atalki_signup_form', 'atalki_signup_form_nonce_field' ); ?>
                        <!-- <label for="email">Email</label>  -->
                        <input class="form-styling" type="text" name="signup_email" id="signup_email" placeholder="Email" /> 
                        <!-- <label for="password">Password</label> -->
                        <input class="form-styling" type="password" name="signup_password" id="signup_password" placeholder="Password" />
                        <div class="agree-terms">
                           <label for="checkbox" style="text-transform: capitalize;">
                           <input type="checkbox" name="" id="">
                           I agree to Atalki's
                           <a href="#">terms & conditions</a>
                           </label>
                        </div>
                        <!-- <a ng-click="checked = !checked" class="btn-signup" style="color: white;">REGISTER</a> -->
                        <div class="btn-animate"> <!-- <a href="#" class="btn-signup">REGISTER</a>  -->
                            <input type="submit" class="btn-signup" id="signup_register" style="color: white;" value="REGISTER" />
                        </div>
                     </form>
                     <div class="success">
                     </div>
                  </div>
                  <div class="forgot"> <a href="https://www.atalki.com/forgot-password" target="_blank" class="show-signin">Forgot your password?</a>
                     <a href="#" class="show-signup">Already a member?</a>
                  </div>
                  <div>
                     <div class="cover-photo">
                        <img src="<?php echo ATALKI_FAQ_GENERATOR_PLUGIN_URL . "admin/images/animation.webp"; ?>" alt="" class="w-75">
                     </div>
                     <div class="welcome-login welcome text-center">
                        <h1 class=" ">You have been logged in Successfully!</h1>
                        <a href="<?php echo admin_url() . "admin.php?page=atalki-faq-generator"; ?>" class="text-center">Go to FAQ Generator</a>
                     </div>
                     <div class="welcome welcome-signup text-center">
                        <h1 class="">Congratulations ! Your account has been created!</h1>
                        <a href="#" class="text-center bz-text-login">Click here to Login</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </div>


</div>