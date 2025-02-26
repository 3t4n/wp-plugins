<?php if( !miah_organalyzer_isset() ) :
    $icon = get_option('org_image_url') ? get_option('org_image_url') : plugins_url('assets/images/icon1.png',__FILE__);
    $iconfooter = get_option('org_image_url') ? get_option('org_image_url') : plugins_url('assets/images/MRI.png',__FILE__);
    $close_button_title = get_option('org_close_button_title') ? get_option('org_close_button_title'): __("Close","wp-accessibility-helper");
    $org_clear_cookies_title = get_option('org_clear_cookies_title') ? get_option('org_clear_cookies_title') : __("Clear cookies","wp-accessibility-helper");
    $org_on_off_title = get_option('org_on_off_title') ? get_option('org_on_off_title') : __("ON/OFF","wp-accessibility-helper");
    $org_darktheme_enable = get_option('org_darktheme_enable');
    $dark_theme_class = 'light_theme';
    if($org_darktheme_enable){
        $dark_theme_class = 'dark_theme';
    }
?>
<div id="wp_access_helper_container" class="accessability_container <?php echo $dark_theme_class; ?>">
    <!-- Medrankinteractive Accessibility Helper (ORG) -->
	<!-- Official plugin -->
        <?php do_action('before_org_wrapper'); ?>
            <button type="button" class="orgout aicon_link"
                accesskey="<?php echo apply_filters( 'org_open_accesskey', 'z' ); ?>"
                aria-label="<?php _e("Accessibility Helper sidebar","wp-accessibility-helper"); ?>"
                title="<?php _e("Accessibility Helper sidebar","wp-accessibility-helper"); ?>">
                <img src="<?php echo apply_filters( 'org_icon_url', $icon ); ?>"
                    alt="<?php _e("Accessibility","wp-accessibility-helper"); ?>" class="aicon_image" />
            </button>
            <div id="access_container" aria-hidden="false">
                <button tabindex="-1" type="button" class="close_container orgout"
                    accesskey="<?php echo apply_filters( 'org_close_accesskey', 'x' ); ?>"
                    aria-label="<?php echo $close_button_title; ?>"
                    title="<?php echo $close_button_title; ?>">
                    <?php echo $close_button_title; ?>
                </button>
                <div class="access_container_inner">
                    <?php miah_render_enabled_widgets_list(); ?>
                    <?php miah_render_last_skiplink(); ?>
                      <div class="copyright">
                            <p>(C) 2019. Med Rank Interactive. All Rights Reserved.</p>
						  <a href="https://medrankinteractive.com" target="_blank"><img src="<?php echo $iconfooter?>" /></a>
                      </div>
                </div>
               
            </div>
   
            <?php
                include_once( dirname(__FILE__) . '/inc/js-vars.php' );
                include_once( dirname(__FILE__) . '/inc/custom-font.php' );
                include_once( dirname(__FILE__) . '/inc/custom-css.php' );
                include_once( dirname(__FILE__) . '/inc/custom-logo-position.php' );
                include_once( dirname(__FILE__) . '/inc/author-credits.php' );
            ?>
        <?php do_action('after_org_wrapper'); ?>
    <!-- Medrankinteractive Accessibility Helper. -->
</div>
<?php endif;