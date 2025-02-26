<?php
//SIDEBAR SECTION
function four_level_slider_admin_menu_option() {
    add_menu_page('4 Level Slider', '4 Level Slider', 'manage_options', 'fls-admin-menu', 'four_level_slider_fields', 'dashicons-media-code', 200);
}
add_action('admin_menu', 'four_level_slider_admin_menu_option');



//ADMIN SECTION
function four_level_slider_fields() {
    ?>
    <div class="fls_slide_wrap">
        <h1 class="fls_title">4 Level Slider</h1>
        <p>This is very simple slider plugin with 4 images. Add Title, Link and Image then hit save changes. Finally copy this shortcode <b>[four_level_slider]</b> and paste it where you want to show this slider.</p>
        <p>If you erase value from any field, it will show you a default value. (Slider1, #, link)</p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick" />
        <input type="hidden" name="hosted_button_id" value="KD7694QELBQ8L" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_BA/i/scr/pixel.gif" width="1" height="1" />
        </form>
        <p class="fls_descritpion">For best experience upload images in size 1920px x 1282px</p>
    <?php

    if(isset($_REQUEST['_wpnonce'])) {

        if (wp_verify_nonce($_REQUEST['_wpnonce'], 'submit_scripts_update' ) ) {
            update_option('fls_background_color', sanitize_text_field($_POST['fls_backg_color']));
            update_option('fls_text_color', sanitize_text_field($_POST['fls_txt_color']));
            update_option('fls_circle_color', sanitize_text_field($_POST['fls_circ_color']));
            update_option('fls_circle_active_color', sanitize_text_field($_POST['fls_a_circ_color']));

            update_option('fls_slide_1_title', sanitize_text_field($_POST['flsslider_one_title']));
            update_option('flsslider_one_1_link', sanitize_text_field($_POST['flsslider_one_link']));
            update_option('flsslider_one_1_img', sanitize_text_field($_POST['flsslider_one_img']));

            update_option('fls_slide_2_title', sanitize_text_field($_POST['flsslider_two_title']));
            update_option('flsslider_one_2_link', sanitize_text_field($_POST['flsslider_two_link']));
            update_option('flsslider_one_2_img', sanitize_text_field($_POST['flsslider_two_img']));

            update_option('fls_slide_3_title', sanitize_text_field($_POST['flsslider_three_title']));
            update_option('flsslider_one_3_link', sanitize_text_field($_POST['flsslider_three_link']));
            update_option('flsslider_one_3_img', sanitize_text_field($_POST['flsslider_three_img']));

            update_option('fls_slide_4_title', sanitize_text_field($_POST['flsslider_four_title']));
            update_option('flsslider_one_4_link', sanitize_text_field($_POST['flsslider_four_link']));
            update_option('flsslider_one_4_img', sanitize_text_field($_POST['flsslider_four_img']));

            ?>
                <div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"><p><strong>Settings have been saved.</strong></p></div>
            <?php
        }
    }

    $background_color = get_option('fls_background_color');
    if(!$background_color) $background_color = "rgba(11, 145, 147,0.8)";
    $text_color = get_option('fls_text_color');
    if(!$text_color) $text_color = "#FFFFFF";
    $circle_color = get_option('fls_circle_color');
    if(!$circle_color) $circle_color = "#FFFFFF";
    $circle_active_color = get_option('fls_circle_active_color');
    if(!$circle_active_color) $circle_active_color = "#f8931f";

    $flsslider_one_title = get_option('fls_slide_1_title', 'Slide 1');
    if(!$flsslider_one_title) $flsslider_one_title = "Slider 1";
    $flsslider_one_link = get_option('flsslider_one_1_link', '#');
    if(!$flsslider_one_link) $flsslider_one_link = "#";
    $flsslider_one_img = get_option('flsslider_one_1_img');
    if(!$flsslider_one_img) $flsslider_one_img = "http://lab.ascdev.org/example.jpg";

    $flsslider_two_title = get_option('fls_slide_2_title', 'Slide 2');
    if(!$flsslider_two_title) $flsslider_two_title = "Slider 2";
    $flsslider_two_link = get_option('flsslider_one_2_link');
    if(!$flsslider_two_link) $flsslider_two_link = "#";
    $flsslider_two_img = get_option('flsslider_one_2_img', 'http://lab.ascdev.org/example.jpg');
    if(!$flsslider_two_img) $flsslider_two_img = "http://lab.ascdev.org/example.jpg";

    $flsslider_three_title = get_option('fls_slide_3_title', 'Slide 3');
    if(!$flsslider_three_title) $flsslider_three_title = "Slider 3";
    $flsslider_three_link = get_option('flsslider_one_3_link');
    if(!$flsslider_three_link) $flsslider_three_link = "#";
    $flsslider_three_img = get_option('flsslider_one_3_img');
    if(!$flsslider_three_img) $flsslider_three_img = "http://lab.ascdev.org/example.jpg";

    $flsslider_four_title = get_option('fls_slide_4_title');
    if(!$flsslider_four_title) $flsslider_four_title = "Slider 4";
    $flsslider_four_link = get_option('flsslider_one_4_link');
    if(!$flsslider_four_link) $flsslider_four_link = "#";
    $flsslider_four_img = get_option('flsslider_one_4_img');
    if(!$flsslider_four_img) $flsslider_four_img = "http://lab.ascdev.org/example.jpg";
?>
    
        <form method="post" action="" id="fls-form">
            <?php wp_nonce_field( 'submit_scripts_update' ); ?>
            <div class="fls_slide_section_colors">
                <label class="fls_label">Background Color</label>
                <input type="text" name="fls_backg_color" value="<?php echo esc_html($background_color); ?>" class="my-color-field" data-default-color="rgba(11, 145, 147,0.8)">
                <label class="fls_label second-row">Text Color</label>
                <input type="text" name="fls_txt_color" value="<?php echo esc_html($text_color); ?>" class="my-color-field" data-default-color="#FFFFFF">
                <br><br>
                <label class="fls_label">Circle Color</label>
                <input type="text" name="fls_circ_color" value="<?php echo esc_html($circle_color); ?>" class="my-color-field" data-default-color="#FFFFFF">
                <label class="fls_label second-row">Active Circle Color</label>
                <input type="text" name="fls_a_circ_color" value="<?php echo esc_html($circle_active_color); ?>" class="my-color-field" data-default-color="#f8931f">
            </div>
            <div class="fls_slide_section fls-first-child">
                <div class="slideimg_wrapper"
                    <?php if (isset($flsslider_one_img) && $flsslider_one_img != "" ) : ?>
                        style="background-image: url(<?php echo esc_url( $flsslider_one_img ); ?>);"
                    <?php endif; ?>
                ></div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Title of Slider 1</label>
                    <input class="fls_input" name="flsslider_one_title" id="flsslider_one_title" value="<?php echo esc_html($flsslider_one_title); ?>">
                </div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Link of Slider 1</label>
                    <input class="fls_input" name="flsslider_one_link" id="flsslider_one_link" value="<?php echo esc_url($flsslider_one_link); ?>">
                </div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Image 1</label>
                    <div class="upload_fls_wrapp">
                        <input class="slideImg fls_input" name="flsslider_one_img" id="flsslider_one_img" value="<?php echo esc_url($flsslider_one_img); ?>" />
                        <input class="slideImgBtn" type="button" value="Add" />
                    </div>
                </div>
            </div>
            <div class="fls_slide_section">
            <div class="slideimg_wrapper"
                    <?php if (isset($flsslider_two_img) && $flsslider_two_img != "" ) : ?>
                        style="background-image: url(<?php echo esc_url( $flsslider_two_img ); ?>);"
                    <?php endif; ?>
                ></div>
                <label class="fls_label">Title of Slider 2</label>
                <input class="fls_input" name="flsslider_two_title" id="flsslider_two_title" value="<?php echo esc_html($flsslider_two_title); ?>">
                <div class="fls_input_wrapp">
                    <label class="fls_label">Link of Slider 2</label>
                    <input class="fls_input" name="flsslider_two_link" value="<?php echo esc_url($flsslider_two_link); ?>">
                </div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Image 2</label>
                    <div class="upload_fls_wrapp">
                        <input class="slideImg fls_input" name="flsslider_two_img" value="<?php echo esc_url($flsslider_two_img); ?>" />
                        <input class="slideImgBtn" type="button" value="Add" />
                    </div>
                </div>
            </div>
            <div class="fls_slide_section">
                <div class="slideimg_wrapper"
                    <?php if (isset($flsslider_three_img) && $flsslider_three_img != "" ) : ?>
                        style="background-image: url(<?php echo esc_url( $flsslider_three_img ); ?>);"
                    <?php endif; ?>
                ></div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Title of Slider 3</label>
                    <input class="fls_input" name="flsslider_three_title" value="<?php echo esc_html($flsslider_three_title); ?>">
                </div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Link of Slider 3</label>
                    <input class="fls_input" name="flsslider_three_link" value="<?php echo esc_url($flsslider_three_link); ?>">
                </div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Image 3</label>
                    <div class="upload_fls_wrapp">
                        <input class="slideImg fls_input" name="flsslider_three_img" value="<?php echo esc_url($flsslider_three_img); ?>" />
                        <input class="slideImgBtn" type="button" value="Add" />
                    </div>
                </div>
            </div>
            <div class="fls_slide_section fls-last-child">
                <div class="slideimg_wrapper"
                    <?php if (isset($flsslider_four_img) && $flsslider_four_img != "" ) : ?>
                        style="background-image: url(<?php echo esc_url( $flsslider_four_img ); ?>);"
                    <?php endif; ?>
                ></div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Title of Slider 4</label>
                    <input class="fls_input" name="flsslider_four_title" value="<?php echo esc_html($flsslider_four_title); ?>">
                </div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Link of Slider 4</label>
                    <input class="fls_input" name="flsslider_four_link" value="<?php echo esc_url($flsslider_four_link); ?>">
                </div>
                <div class="fls_input_wrapp">
                    <label class="fls_label">Image 4</label>
                    <div class="upload_fls_wrapp">
                        <input class="slideImg fls_input" name="flsslider_four_img" value="<?php echo esc_url($flsslider_four_img); ?>" />
                        <input class="slideImgBtn" type="button" value="Add" />
                    </div>
                </div>
            </div>
            <input type="submit" name="submit_scripts_update" class="fls_btn_save" value="SAVE CHANGES">
        </form>
    </div>
<?php
}