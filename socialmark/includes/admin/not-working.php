<?php
defined('ABSPATH') || exit();
?>
<section class="ac-socialmark">
    <div>
        <input id="ac-1" name="accordion-1" type="radio" checked="">
        <label for="ac-1">Did you add overlay image?</label>
        <article class="ac-small">
            <p>Please be sure you added at least one overlay image. Then on the settings page you have pressed the “save changes” button.</p>
            <?php
            if(empty($socialmark_images)){
                ?>
                <h2 style="padding-left: 20px"><span style="color:red"><?php _e('Please');?> <a href="?page=socialmark&tab=overlay-images"><?php _e('Add Overlay');?></a> <?php _e('Before You Start.');?></span></h2>
                <?php
            }else {
                ?>
                <h2 style="padding-left: 20px"><span style="color:green"><?php _e('Passed! You have already added overlay image.');?></span></h2>
                <?php
            }
            ?>
        </article>
    </div>
    <div>
        <input id="ac-2" name="accordion-1" type="radio">
        <label for="ac-2">PHP GD Library Issue</label>
        <article class="ac-medium">
            <p>This plugin uses PHP GD library for image modification. Make sure you installed PHP GD extension on your server.</p>
            <?php
            if(extension_loaded('gd')){
                ?>
                <h2 style="padding-left: 20px"><span style="color:green"><?php _e('Passed! You have already installed PHP GD extension in your server.');?></span></h2>
                <?php
            }else {
                ?>
                <h2 style="padding-left: 20px"><span style="color:red"><?php _e('Failed! Please install PHP GD extension in your server.');?></span></h2>
                <?php
            }
            ?>
        </article>
    </div>
    <div>
        <input id="ac-7" name="accordion-1" type="radio">
        <label for="ac-7">CSS/Design Broken After Installed SocialMark</label>
        <article class="ac-medium">
            <p>Please "Disable SocialMark og:url Force Replace" from the settings</p>
        </article>
    </div>
    <div>
        <input id="ac-3" name="accordion-1" type="radio">
        <label for="ac-3">"wp-content/uploads" folder Writable </label>
        <article class="ac-large">
            <p>SocialMark saves automatically generated open graph images into wp-content/uploads folder. Please make sure your “wp-content/uploads” folder is writable.</p>
            <?php
            if( is_writable(dirname(SOCIALMARK_UPLOAD))){
                ?>
                <h2 style="padding-left: 20px"><span style="color:green"><?php _e('Passed! Your “wp-content/uploads” folder is writable.');?></span></h2>
                <?php
            }else {
                ?>
                <h2 style="padding-left: 20px"><span style="color:red"><?php _e('Failed! Please make sure your “wp-content/uploads” folder is writable.');?></span></h2>
                <?php
            }
            ?>
        </article>
    </div>
    <div>
        <input id="ac-4" name="accordion-1" type="radio">
        <label for="ac-4">Contact us</label>
        <article class="ac-large">
            <p>Still NOT Working? Please email to shawonfreelance@gmail.com We will get back to you within 24 hours and debug the issue ASAP.</p>
        </article>
    </div>
    <div>
        <input id="ac-6" name="accordion-1" type="radio">
        <label for="ac-6"><a href="?billing_cycle=annual&page=socialmark-pricing"> Premium Version Features (Only $14.99/year)</a></label>
        <article class="ac-large" style="height: auto;">
            <ul style="padding-left: 20px; font-size: 14px">
                <li><strong>9 Different Position:</strong> Add overlay/watermark to your social media post preview image at 9 different positions.</li>
                <li><strong>Post-wise Settings:</strong> You can set different overlay for every post/page individually.</li>
                <li><strong>Category-wise Settings:</strong> You can set different overlay for specifice category’s posts.</li>
                <li><strong>WooCommerce:</strong> You can set overlay and different featured image for WooCommerce product for social media.</li>
                <li><strong>Different Feature Image:</strong> You can upload different feature image only for social media</li>
                <li><strong>Enable/Disable:</strong> It is posible to enable or disable SocialMark for any post or page individually as well as enable/disable all posts/pages</li>
                <li><strong>Custom Post Type Support:</strong> Enable/Disable SocialMark for custom post types such property, car, directory etc. </li>
                <li><strong>Disable for old posts:</strong> Disable SocialMark for old posts by entering a date.</li>
            </ul>
        </article>
    </div>
</section>
