<?php

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

global $atalki_plugin;
$is_expired = $atalki_plugin->get_admin()->afg_verify_token();
$atalki_keep_me_login = get_option("atalki_keep_me_login");

if(empty($atalki_keep_me_login) && $is_expired){
    printf(
        esc_html__( '%1$s Your login session is expired. Please %3$slogin%4$s again!%2$s', 'atalki-faq-generator' ),
        '<h2>',
        '</h2>',
        '<a href="'.admin_url().'admin.php?page=afg-login-signup" id="trigger_login">',
        '</a>',
    );
}else{
    if($is_expired){
        $atalki_plugin->get_admin()->afg_refresh_token();
    }
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class='snippet-body faq-sign-in-sign-up-page'>
    <?php 
        require_once(ATALKI_FAQ_GENERATOR_DIR_PATH . "/admin/partials/afaqg-header.php");
    ?>
    

    <div class="container bz-text-container">
    <?php 
            if(isset($_SESSION["link_submit_message"])){
        ?>
                <div class='notice notice-success' style="margin-bottom: 20px;">
                    <p><?php echo esc_html($_SESSION["link_submit_message"]); ?></p>
                </div>
        <?php
            unset($_SESSION["link_submit_message"]);    
            }
        ?>
        <?php 
            if(isset($_SESSION["recreate_message"])){
        ?>
                <div class='notice notice-success' style="margin-bottom: 20px;">
                    <p><?php echo esc_html($_SESSION["recreate_message"]); ?></p>
                </div>
        <?php
            unset($_SESSION["recreate_message"]);    
            }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="container">
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
                <div class="container text-center">
                    <div class="pb-2 bz-shadow">
                        <div class="form-group">
                            <label for="file1" class="m-auto">            <img src="<?php echo ATALKI_FAQ_GENERATOR_PLUGIN_URL; ?>/admin/images/briefing.png" alt="" class="w-25 p-2" ></label>
                            <input type="file" class="form-control-file" id="file1" name="atalki_link_image" accept="image/png, image/gif, image/jpeg" style="visibility: hidden;">
                        </div>
                        <form class="p-3" enctype="multipart/form-data" method="post">
                        <?php wp_nonce_field("atalki_link_page_form", "atalki_link_page_form_nonce_field"); ?>
                            <input class="form-styling" type="text" id="atalki_link_title" name="atalki_link_title" placeholder="Enter 1 Line about your business (50 char)" /> 
                            <textarea class="form-styling" type="text" id="atalki_link_desc" name="atalki_link_desc" placeholder="Enter some more description about your business (max 500 char)"></textarea>
                            <input type="text" class="form-styling" id="atalki_link_url" name="atalki_link_url" placeholder="e.g. https://www.example.com/contact-us/">
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-signin text-white p-2 w-50 mt-2" id="atalki_link_page_submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
}

