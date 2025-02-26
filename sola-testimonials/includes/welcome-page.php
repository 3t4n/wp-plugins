<center>
    <h1 style="font-weight: 300; font-size: 50px; line-height: 50px;">
        <?php _e("Welcome to ", 'sola-testimonials'); ?> 
        <strong style='color: #ec6851;'>Super Testimonials</strong> 
    </h1>
    <div class="about-text" style="margin: 0;"><?php _e("A super easy to use and comprehensive Testimonial plugin.", "sola-testimonials"); ?></div>

    <img src="<?php echo SOLA_T_PLUGIN_DIR; ?>/images/welcome-image.png" width="20%" style="width: 400px; border: 1px solid #e5e5e5; -moz-box-shadow: 0 0 5px rgba(0,0,0,.1); -webkit-box-shadow: 0 0 5px rgba(0,0,0,.1); box-shadow: 0 0 5px rgba(0,0,0,.1); -moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;"/>

    <h2 style="font-size: 25px;"><?php _e("How did you find us?", "sola-testimonials"); ?></h2>
    <form method="post" name="sola_find_us_form" action="edit.php?post_type=testimonials&page=sola_t_settings&override=1" style="font-size: 16px;">
        <?php 
            wp_nonce_field( 'sola_welcome_page_nonce', 'sola_welcome_page_nonce' );
        ?>
        <div  style="text-align: left; width:275px;">
            <input type="radio" name="sola_find_us" id="wordpress" value='repository'>
            <label for="wordpress">
                <?php _e('WordPress.org plugin repository ', 'sola-testimonials'); ?>
            </label>
            <br/>
            <input type='text' placeholder="<?php _e('Search Term', 'sola-testimonials'); ?>" name='sola_t_search_term' style='margin-top:5px; margin-left: 23px; width: 100%  '>
            <br/>
            <input type="radio" name="sola_find_us" id="search_engine" value='search_engine'>
            <label for="search_engine">
                <?php _e('Google or other search Engine', 'sola-testimonials'); ?>
            </label>
            <br/>
            <input type="radio" name="sola_find_us" id="friend" value='friend'>

            <label for='friend'>
                <?php _e('Friend recommendation', 'sola-testimonials'); ?>
            </label>
            <br/>   
            <input type="radio" name="sola_find_us" id='other' value='other'>

            <label for='other'>
                <?php _e('Other', 'sola-testimonials'); ?>
            </label>
            <br/>

            <textarea placeholder="<?php _e('Please Explain', 'sola-testimonials'); ?>" style='margin-top:5px; margin-left: 23px; width: 100%' name='sola_t_findus_other_url'></textarea>
        </div>
        <div>

        </div>
        <div>

        </div>
        <div style='margin-top: 20px;'>
            <button name='action' value='super_t_submit_find_us' class="button-primary" style="font-size: 30px; line-height: 60px; height: 60px; margin-bottom: 10px;"><?php _e('Submit', 'sola-testimonials'); ?></button>
            <br/>
            <button name='action' value="super_t_skip_find_us" class="button"><?php _e('Skip', 'sola-testimonials'); ?></button>
        </div>
    </form> 
</center>

