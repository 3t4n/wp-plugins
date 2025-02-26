<?php
  $org_hidden = isset($_POST['org_hidden']) ? sanitize_text_field($_POST['org_hidden']) : '';

  if( $org_hidden == 'Y' && !empty($org_hidden) ) {
    //Upload icon
    $image_url = isset($_POST['org_image_url']) ? sanitize_url($_POST['org_image_url']) : '';
    update_option('org_image_url', $image_url);
    //Hide on mobile
    $org_hide_on_mobile = isset($_POST['org_hide_on_mobile']) ? 1 : 0;
    update_option('org_hide_on_mobile', $org_hide_on_mobile);
    //Show on left side
    $org_left_side = isset($_POST['org_left_side']) ? 1 : 0;
    update_option('org_left_side', $org_left_side);
    //Font resize mode
    $font_setup_type = isset($_POST['org_font_setup_type']) ? sanitize_text_field($_POST['org_font_setup_type']) : "script";
    update_option('org_font_setup_type', $font_setup_type);
    $font_setup_title = sanitize_text_field($_POST['org_font_setup_title']);
    update_option('org_font_setup_title', $font_setup_title);
    $reset_font_size_title = sanitize_text_field($_POST['org_reset_font_size']);
    update_option('org_reset_font_size', $reset_font_size_title);
    //Remove styles mode
    $remove_styles_setup = isset($_POST['org_remove_styles_setup']) ? 1 : 0;
    update_option('org_remove_styles_setup', $remove_styles_setup);
    $remove_styles_setup_title = isset($_POST['org_remove_styles_setup_title']) ? sanitize_text_field($_POST['org_remove_styles_setup_title']) : '';
    update_option('org_remove_styles_setup_title', $remove_styles_setup_title);
    //Contrast mode
    $contrast_setup = isset($_POST['org_contrast_setup']) ? 1 : 0;
    update_option('org_contrast_setup', $contrast_setup);
    $contrast_setup_title = isset($_POST['org_contrast_setup_title']) ? sanitize_text_field($_POST['org_contrast_setup_title']) : '';
    update_option('org_contrast_setup_title', $contrast_setup_title);
    //Contrast custom colors
    $contrast_custom = isset($_POST['org_enable_custom_contrast']) ? 1 : 0;
    update_option('org_enable_custom_contrast', $contrast_custom);

    $choose_color_title = isset($_POST['org_choose_color_title']) ? sanitize_text_field($_POST['org_choose_color_title']) : '';
    update_option('org_choose_color_title', $choose_color_title);
    //Underline links mode
    $underline_links_setup = isset($_POST['org_underline_links_setup']) ? 1 : 0;
    update_option('org_underline_links_setup', $underline_links_setup);
    $underline_links_setup_title = isset($_POST['org_underline_links_setup_title']) ? sanitize_text_field($_POST['org_underline_links_setup_title']) : '';
    update_option('org_underline_links_setup_title', $underline_links_setup_title);
    //Role="link" mode
    $role_links_setup = isset($_POST['org_role_links_setup']) ? 1 : 0;
    update_option('org_role_links_setup', $role_links_setup);
    //Remove link title attribute
    $remove_link_titles = isset($_POST['org_remove_link_titles']) ? 1 : 0;
    update_option('org_remove_link_titles', $remove_link_titles);
    $org_clear_cookies_title = isset($_POST['org_clear_cookies_title']) ? sanitize_text_field($_POST['org_clear_cookies_title']) : '';
    update_option('org_clear_cookies_title', $org_clear_cookies_title);
    //Close button - title
    $close_button_title = isset($_POST['org_close_button_title']) ? sanitize_text_field($_POST['org_close_button_title']) : '';
    update_option('org_close_button_title', $close_button_title);
    // Greyscale Images button title
    $org_greyscale_title = isset($_POST['org_greyscale_title']) ? sanitize_text_field($_POST['org_greyscale_title']) : '';
    update_option('org_greyscale_title', $org_greyscale_title);
    //Enable Greyscale Images
    $org_greyscale_enable = isset($_POST['org_greyscale_enable']) ? 1 : 0;
    update_option('org_greyscale_enable', $org_greyscale_enable);
    //Enable Dark Theme
    $org_darktheme_enable = isset($_POST['org_darktheme_enable']) ? 1 : 0;
    update_option('org_darktheme_enable', $org_darktheme_enable);
    //highlight links
    $org_highlight_links_enable = isset($_POST['org_highlight_links_enable']) ? 1 : 0;
    update_option('org_highlight_links_enable', $org_highlight_links_enable);
    $org_highlight_links_title = isset($_POST['org_highlight_links_title']) ? sanitize_text_field($_POST['org_highlight_links_title']) : '';
    update_option('org_highlight_links_title', $org_highlight_links_title);
    //invert mode
    $org_invert_enable = isset($_POST['org_invert_enable']) ? 1 : 0;
    update_option('org_invert_enable', $org_invert_enable);
    $org_invert_title = isset($_POST['org_invert_title']) ? sanitize_text_field($_POST['org_invert_title']) : '';
    update_option('org_invert_title', $org_invert_title);
    //remove animations
    $org_remove_animations_setup = isset($_POST['org_remove_animations_setup']) ? 1 : 0;
    update_option('org_remove_animations_setup', $org_remove_animations_setup);
    $org_remove_animations_title = isset($_POST['org_remove_animations_title']) ? sanitize_text_field($_POST['org_remove_animations_title']) : '';
    update_option('org_remove_animations_title', $org_remove_animations_title);
    //Readable font
    $org_readable_fonts_setup = isset($_POST['org_readable_fonts_setup']) ? 1 : 0;
    update_option('org_readable_fonts_setup', $org_readable_fonts_setup);
    $org_readable_fonts_title = isset($_POST['org_readable_fonts_title']) ? sanitize_text_field($_POST['org_readable_fonts_title']) : '';
    update_option('org_readable_fonts_title', $org_readable_fonts_title);
    //Custom font
    $org_custom_font = isset($_POST['org_custom_font']) ? sanitize_text_field($_POST['org_custom_font']) : '';
    update_option('org_custom_font', $org_custom_font);
    // Skiplinks
    $org_skiplinks_setup = isset($_POST['org_skiplinks_setup']) ? 1 : 0;
    update_option('org_skiplinks_setup', $org_skiplinks_setup);
    //Keyboard Navigation
    $org_keyboard_navigation_setup = isset($_POST['org_keyboard_navigation_setup']) ? 1 : 0;
    update_option('org_keyboard_navigation_setup', $org_keyboard_navigation_setup);
    $org_keyboard_navigation_title = isset($_POST['org_keyboard_navigation_title']) ? sanitize_text_field($_POST['org_keyboard_navigation_title']) : '';
    update_option('org_keyboard_navigation_title', $org_keyboard_navigation_title);
    //Light OFF
    $org_lights_off_setup = isset($_POST['org_lights_off_setup']) ? 1 : 0;
    update_option('org_lights_off_setup', $org_lights_off_setup);
    $org_lights_off_title = isset($_POST['org_lights_off_title']) ? sanitize_text_field($_POST['org_lights_off_title']) : '';
    update_option('org_lights_off_title', $org_lights_off_title);
    $org_lights_selector = isset($_POST['org_lights_selector']) ? sanitize_text_field($_POST['org_lights_selector']) : '';
    update_option('org_lights_selector', $org_lights_selector);
    //Custom logo position
    $org_custom_logo_position = isset($_POST['org_custom_logo_position']) ? 1 : 0;
    update_option('org_custom_logo_position', $org_custom_logo_position);
    $org_logo_top = isset($_POST['org_logo_top']) ? sanitize_text_field($_POST['org_logo_top']) : '';
    update_option('org_logo_top', $org_logo_top);
    $org_logo_right = isset($_POST['org_logo_right']) ? sanitize_text_field($_POST['org_logo_right']) : '';
    update_option('org_logo_right', $org_logo_right);
    $org_logo_bottom = isset($_POST['org_logo_bottom']) ? sanitize_text_field($_POST['org_logo_bottom']) : '';
    update_option('org_logo_bottom', $org_logo_bottom);
    $org_logo_left = isset($_POST['org_logo_left']) ? sanitize_text_field($_POST['org_logo_left']) : '';
    update_option('org_logo_left', $org_logo_left);

    //Update serialized array
    miah_update_serialize_order_array();

?>
    <div class="updated">
        <p><strong><?php _e('Options saved.','wp-accessibility-helper'); ?></strong></p>
    </div>
<?php

}   else {

    $image_url                     = get_option('org_image_url');
    $font_setup_type               = get_option('org_font_setup_type');
    $font_setup_title              = get_option('org_font_setup_title');
    $reset_font_size_title         = get_option('org_reset_font_size');
    $contrast_setup                = get_option('org_contrast_setup');
    $contrast_setup_title          = get_option('org_contrast_setup_title');
    $contrast_custom               = get_option('org_enable_custom_contrast');
    $remove_styles_setup           = get_option('org_remove_styles_setup');
    $remove_styles_setup_title     = get_option('org_remove_styles_setup_title');
    $choose_color_title            = get_option('org_choose_color_title');
    $underline_links_setup         = get_option('org_underline_links_setup');
    $underline_links_setup_title   = get_option('org_underline_links_setup_title');
    $role_links_setup              = get_option('org_role_links_setup');
    $remove_link_titles            = get_option('org_remove_link_titles');
    $org_clear_cookies_title       = get_option('org_clear_cookies_title');
    $close_button_title            = get_option('org_close_button_title');
    $org_hide_on_mobile            = get_option('org_hide_on_mobile');
    $org_left_side                 = get_option('org_left_side');
    $org_greyscale_title           = get_option('org_greyscale_title');
    $org_greyscale_enable          = get_option('org_greyscale_enable');
    $org_darktheme_enable          = get_option('org_darktheme_enable');
    $org_highlight_links_enable    = get_option('org_highlight_links_enable');
    $org_highlight_links_title     = get_option('org_highlight_links_title');
    $org_invert_enable             = get_option('org_invert_enable');
    $org_invert_title              = get_option('org_invert_title');
    $org_remove_animations_setup   = get_option('org_remove_animations_setup');
    $org_remove_animations_title   = get_option('org_remove_animations_title');
    $org_readable_fonts_setup      = get_option('org_readable_fonts_setup');
    $org_readable_fonts_title      = get_option('org_readable_fonts_title');
    $org_custom_font               = get_option('org_custom_font');
    $org_skiplinks_setup           = get_option('org_skiplinks_setup');
    $org_keyboard_navigation_setup = get_option('org_keyboard_navigation_setup');
    $org_keyboard_navigation_title = get_option('org_keyboard_navigation_title');

    $org_lights_off_setup = get_option('org_lights_off_setup');
    $org_lights_off_title = get_option('org_lights_off_title');
    $org_lights_selector  = get_option('org_lights_selector');

    $org_custom_logo_position = get_option('org_custom_logo_position');
    $org_logo_top    = get_option('org_logo_top');
    $org_logo_right  = get_option('org_logo_right');
    $org_logo_left   = get_option('org_logo_left');
    $org_logo_bottom = get_option('org_logo_bottom');
  }
    $org_custom_fonts_list = array(
        'Times New Roman, Times, serif',
        'Arial, Helvetica, sans-serif',
        'Comic Sans MS, cursive, sans-serif',
        'Tahoma, Geneva, sans-serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif',
        'Courier New, Courier, monospace',
        'Lucida Console, Monaco, monospace',
        'Georgia, serif'
    );
?>

<div class="wrap">

    <?php echo "<h1>" . __( 'Medrankinteractive Accessibility Helper. <span class="org_slogan">"Medrankinteractive Accessibility made easy!"</span>', 'wp-accessibility-helper' ) . "</h1>"; ?>

   

    <div class="org-main-admin-row">
      
        <form name="oscimp_form" class="org-main-admin-form clearfix" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <input type="hidden" name="org_hidden" value="Y">

            <?php /* Global Settings */ ?>
            <?php miah_render_form_section_title(__( 'Global Settings', 'wp-accessibility-helper' )); ?>
            <div class="org_form_elements_wrapper">
                <div class="form_element_content">

                    <?php miah_render_switch_element(
                    __("Enable skip links menu?","wp-accessibility-helper"),
                    $org_skiplinks_setup, "org_skiplinks_setup");
                    ?>
                  
                    <hr />

                    <?php miah_render_switch_element(
                    __("Enable keyboard navigation","wp-accessibility-helper"),
                    $org_keyboard_navigation_setup, "org_keyboard_navigation_setup");
                    ?>

                    <?php miah_render_title_element(
                        __("Keyboard navigation - title","wp-accessibility-helper"),
                        $org_keyboard_navigation_title, "org_keyboard_navigation_title", "", "org_keyboard_navigation_setup"
                    ); ?>
                    <hr />

                    <?php miah_render_switch_element(__("Enable Dark Theme?","wp-accessibility-helper"),$org_darktheme_enable,"org_darktheme_enable"); ?>
                    <hr />
                    <?php miah_render_title_element(__("Close button - title","wp-accessibility-helper"),$close_button_title,"org_close_button_title"); ?>
                    <?php miah_render_title_element(__("Clear cookies - title","wp-accessibility-helper"),$org_clear_cookies_title,"org_clear_cookies_title"); ?>
                </div>

                <hr />
                <div class="form_row">
                    <div class="form30">
                          <?php if( get_option('org_image_url') ) : ?>
                            <img src="<?php echo get_option('org_image_url'); ?>" width="48" height="48" />
                          <?php endif; ?>
                          <label for="upload_icon" class="text_label"><?php _e("Upload icon","wp-accessibility-helper"); ?></label>
                    </div>
                    <div class="form70">
                        <input type="text" name='org_image_url' id="image_url"
                            class="regular-text" value='<?php echo get_option('org_image_url') ? get_option('org_image_url') : ''; ?>'>
                        <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="<?php _e("Upload Logo","wp-accessibility-helper"); ?>">
                        <input type="button" name="clear-btn" id="clear-btn" class="button-secondary" value="<?php _e("Delete Logo","wp-accessibility-helper"); ?>">
                    </div>
                </div>

                <?php /***** Custom logo position ********/ ?>
                <?php miah_render_switch_element(__("Custom logo position?","wp-accessibility-helper"), $org_custom_logo_position, "org_custom_logo_position"); ?>
                <?php miah_render_logo_position(__("Logo position (px)","wp-accessibility-helper"), $org_logo_top, $org_logo_right, $org_logo_bottom, $org_logo_left); ?>
                <hr />

                <?php miah_render_switch_element(__("Hide for mobile?","wp-accessibility-helper"), $org_hide_on_mobile, "org_hide_on_mobile"); ?>
                <?php miah_render_switch_element(__("Show Sidebar on left side?","wp-accessibility-helper"), $org_left_side, "org_left_side"); ?>

                <hr />
                <?php /***** Greyscale Images ********/ ?>
                <?php miah_render_switch_element(__("Enable Greyscale Images?","wp-accessibility-helper"), $org_greyscale_enable, "org_greyscale_enable"); ?>
                <?php miah_render_title_element(__("Greyscale Images button - title","wp-accessibility-helper"),$org_greyscale_title,"org_greyscale_title","","org_greyscale_enable"); ?>

                <hr />
                <?php /***** Invert Colors & Images ********/ ?>
                <?php miah_render_switch_element(__("Enable Invert Colors & Images?","wp-accessibility-helper"), $org_invert_enable, "org_invert_enable"); ?>
                <?php miah_render_title_element(__("Invert button - title","wp-accessibility-helper"),$org_invert_title,"org_invert_title","","org_invert_enable"); ?>
            </div>
            <hr />

            <?php /* Fonts Settings */ ?>
            <?php miah_render_form_section_title(__( 'Font Settings', 'wp-accessibility-helper' )); ?>
            <div class="org_form_elements_wrapper">
                <div class="form_element_content">

            <?php /** Readable Font **/ ?>
            <?php miah_render_switch_element(__("Enable Readable Font?","wp-accessibility-helper"), $org_readable_fonts_setup, "org_readable_fonts_setup"); ?>
            <?php miah_render_title_element(__("Enable Readable Font - title","wp-accessibility-helper"),$org_readable_fonts_title,"org_readable_fonts_title","","org_readable_fonts_setup"); ?>
            <hr />
            <div class="form_row">
                <div class="form30">
                    <label for="org_custom_font" class="text_label">
                        <?php _e("Choose custom font","wp-accessibility-helper"); ?>
                    </label>
                </div>
                <div class="form70">
                    <select name="org_custom_font" id="org_custom_font">
                        <option value="">
                            <?php _e("Please, choose font","wp-accessibility-helper"); ?>
                        </option>
                        <?php foreach( $org_custom_fonts_list as $font ): ?>
                            <option value="<?php echo $font; ?>" <?php if( $org_custom_font == $font ) : ?>selected="selected"<?php endif; ?>>
                                <?php echo $font; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <hr />

            <?php miah_render_select_element(__("Choose font resize option","wp-accessibility-helper"), $font_setup_type, "org_font_setup_type"); ?>
            <?php miah_render_title_element(__("Font resize - title","wp-accessibility-helper"),$font_setup_title,"org_font_setup_title"); ?>
            <?php miah_render_title_element(__("Reset font size - title","wp-accessibility-helper"),$reset_font_size_title,"org_reset_font_size"); ?>
            <h5>** <?php _e('This field work only when script base resize option chosen in "<em>Choose font resize option</em>"','wp-accessibility-helper'); ?></h5>
            </div>
            </div>
            <hr />

            <?php /* Contrast Settings */ ?>
            <?php miah_render_form_section_title(__( 'Contrast Settings', 'wp-accessibility-helper' )); ?>
            <div class="org_form_elements_wrapper">
                <div class="form_element_content">

                    <?php miah_render_switch_element(__("Enable contrast mode?","wp-accessibility-helper"), $contrast_setup, "org_contrast_setup"); ?>
                    <?php miah_render_title_element(__("Contrast - title","wp-accessibility-helper"), $contrast_setup_title, "org_contrast_setup_title"); ?>
                    <?php miah_render_title_element(__("Choose color button - title","wp-accessibility-helper"), $choose_color_title, "org_choose_color_title"); ?>

                    <?php miah_render_switch_element(__("Contrast variations?","wp-accessibility-helper"), $contrast_custom, "org_enable_custom_contrast","Custom","Default"); ?>

                    <div class="form_row" id="contrast_custom_dep" <?php if(!$contrast_custom): ?>style="display:none;"<?php endif; ?>>
                        <div class="form100">
                            <h4 class="org-sub-title"><?php _e("Please add custom contrast mode variation:","wp-accessibility-helper"); ?></h4>
                            <ul class="contrast-params-list">
                                <?php
                                $contrast_variations = miah_get_contrast_variations();
                                if($contrast_variations):
                                    foreach($contrast_variations as $variation) : ?>
                                    <li>
                                        <div class="contrast-mode-item bg-color">
                                            <label><?php _e('Background color','wp-accessibility-helper'); ?></label>
                                            <input type="text" value="<?php echo $variation['bgcolor']; ?>" placeholder="<?php _e("Background color","wp-accessibility-helper"); ?>" class="jscolor">
                                        </div>
                                        <div class="contrast-mode-item text-color">
                                            <label><?php _e('Text color','wp-accessibility-helper'); ?></label>
                                            <input type="text" value="<?php echo $variation['textcolor']; ?>" placeholder="<?php _e("Text color","wp-accessibility-helper"); ?>" class="jscolor">
                                        </div>
                                        <div class="contrast-mode-item action">
                                            <button class="org-button delete-contrast-params">
                                                <?php _e("Delete","wp-accessibility-helper"); ?>
                                            </button>
                                            <span class="action-loader"></span>
                                        </div>
                                    </li>
                                    <?php endforeach;
                                endif; ?>
                            </ul>
                            <div class="org-action-buttons">
                                <button class="org-button org-add-item">
                                    <?php _e("Add new color","wp-accessibility-helper"); ?>
                                </button>
                                <button class="org-button save-contrast-params">
                                    <?php _e("Save colors","wp-accessibility-helper"); ?>
                                </button>
                                <div class="org-contrast-loader"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />

            <?php /* Styles Settings */ ?>
            <?php miah_render_form_section_title(__( 'Styles Settings', 'wp-accessibility-helper' )); ?>
            <div class="org_form_elements_wrapper">
                <div class="form_element_content">
                    <?php miah_render_switch_element(__("Remove animations mode?","wp-accessibility-helper"), $org_remove_animations_setup, "org_remove_animations_setup"); ?>
                    <?php miah_render_title_element(__("Remove animations - title","wp-accessibility-helper"),$org_remove_animations_title,"org_remove_animations_title","","org_remove_animations_setup"); ?>
                    <hr />
                    <?php miah_render_switch_element(__("Remove styles mode?","wp-accessibility-helper"), $remove_styles_setup, "org_remove_styles_setup"); ?>
                    <?php miah_render_title_element(__("Remove styles - title","wp-accessibility-helper"),$remove_styles_setup_title,"org_remove_styles_setup_title","","org_remove_styles_setup"); ?>
                    <h5>** <?php _e("This feature doesn't works if you have 'Async JS and CSS' plugin installed.","wp-accessibility-helper"); ?></h5>
                </div>
            </div>
            <hr />

            <?php /* Links Settings */ ?>
            <?php miah_render_form_section_title(__( 'Links Settings', 'wp-accessibility-helper' )); ?>
            <div class="org_form_elements_wrapper">
                <div class="form_element_content">
                  <?php miah_render_switch_element(__("Underline links mode?","wp-accessibility-helper"), $underline_links_setup, "org_underline_links_setup"); ?>
                  <?php miah_render_title_element(__("Underline links title","wp-accessibility-helper"), $underline_links_setup_title, "org_underline_links_setup_title","","org_underline_links_setup"); ?>
                  <hr />
                  <?php miah_render_switch_element(__("Highlight links mode?","wp-accessibility-helper"), $org_highlight_links_enable, "org_highlight_links_enable"); ?>
                  <?php miah_render_title_element(__("Highlight links - title","wp-accessibility-helper"),$org_highlight_links_title, "org_highlight_links_title","","org_highlight_links_enable"); ?>
                  <hr />
                  <?php miah_render_switch_element(__('Add role="link" to a tags?',"wp-accessibility-helper"), $role_links_setup, "org_role_links_setup"); ?>
                  <?php miah_render_switch_element(__("Remove all links titles?","wp-accessibility-helper"),$remove_link_titles, "org_remove_link_titles"); ?>
                </div>
            </div>
            <hr />

          

            <p class="submit">
                <input type="submit" name="Submit" class="button button-primary button-large" value="<?php _e('Update Options', 'wp-accessibility-helper' ) ?>" />
            </p>
        </form>
    </div>

    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('#upload-btn').click(function(e) {
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Logo',
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                var image_url = uploaded_image.toJSON().url;
                $('#image_url').val(image_url);
            });
        });
      $("#clear-btn").click(function(e){
        e.preventDefault();
        $('#image_url').val('');
      })
    });
    </script>

</div>
