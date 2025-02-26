<?php
// check user capabilities
if (!current_user_can('manage_options')) {
    return;
}
?>
<div class="wrap">
    <div class="e-addons-start-page">
        <div class="e-addons-start-page__box postbox">

            <div class="e-addons-start-page__header">
                <div class="e-addons-start-page__title">
                    <?php _e('Getting Started', 'e-addons-for-elementor'); ?>
                </div>
                <a class="e-addons-start-page__skip" href="<?php echo admin_url('admin.php?page=e_addons'); ?>">
                    <span class="dashicons dashicons-no"></span>
                    <span class="elementor-screen-only">Skip</span>
                </a>
            </div>

            <div class="e-addons-start-page__content">
                
                <div class="e-addons-logo-wrapper">
                    <img src="<?php echo E_ADDONS_URL; ?>/assets/img/e-addons-anim.svg">
                </div>

                <div class="e-addons-start-page__content_first e-addons-start-page__scheme">
                    <h2><b>e-addons</b> for Elementor</h2>
                    <p class="e-addons-evidence">
                        WELCOME to the world of e-addons for Elementor.<br>
                        A collection of features for UI-designers and developers who want to increase the already enormous potential of Elementor.
                    </p>
                </div>
                <div>
                <h3 class="e-addons-title-feature">Increase the possibilities in Elementor</h3>
                <br><br>
                <div class="e-addons-for-developers">
                    <img class="e-addons-icon" src="<?php echo E_ADDONS_URL; ?>/assets/img/for_developers.png">
                    <h5 class="e-addons-number-feature">For DEVELOPERS</h5>
                    <h3 class="e-addons-title-feature">Useful tools for developers</h3>
                    <p class="e-addons-description-feature">Add content creation tools.</p>
                    <div class="e-addons-banner"><img class="e-addons-img" src="<?php echo E_ADDONS_URL; ?>/assets/img/screen_developer.jpg"></div>
                    <!--<a href="https://e-addons.com/for-developers" target="_blank" class="button button-primary button-hero button-e-addons">Read More</a>-->
                </div>
                <br><br>
                <div class="e-addons-for-designers">
                    <img class="e-addons-icon" src="<?php echo E_ADDONS_URL; ?>/assets/img/for_designers.png">
                    <h5 class="e-addons-number-feature">For DESIGNERS</h5>
                    <h3 class="e-addons-title-feature">Styles and graphic effects for drawers</h3>
                    <p class="e-addons-description-feature">Extend the capabilities of Elementor's native widgets with new features.</p>
                    <div class="e-addons-banner"><img class="e-addons-img" src="<?php echo E_ADDONS_URL; ?>/assets/img/screen_designer.jpg"></div>
                    <!--<a href="https://e-addons.com/for-designers" target="_blank" class="button button-primary button-hero button-e-addons">Read More</a>-->     
                </div>
                <br><br><br><br>
                <div class="e-addons-utilities-for-elementor">
                    <h5 class="e-addons-number-feature">UTILITIES for Elementor</h5>
                    <h3 class="e-addons-title-feature">Remove all unneeded Elementor Widget</h3>
                    <p class="e-addons-description-feature">From the settings e-addons panel, you can control the activation of just the tools you need.</p>
                    <div class="e-addons-banner"><img class="e-addons-img" src="<?php echo E_ADDONS_URL; ?>/assets/img/enabe-disable_elementorwidgets.jpg"></div>
                    <!--<a href="https://e-addons.com/utilities-for-elementor" target="_blank" class="button button-primary button-hero button-e-addons">Read More</a>-->s
                </div>
                
                <h4 class="e-addons-many-more">Many more features will be available soon. </h4> 
  
            </div>
                <div class="e-addons-start-page__actions e-addons-start-page__content--narrow">
                    <a href="<?php echo admin_url('admin.php?page=e_addons_settings#e_addon_plugin_module_e-addons-for-elementor'); ?>" class="button button-primary button-hero">Start now</a>
                    <a href="https://e-addons.com/for-developers" target="_blank" class="button button-secondary button-hero">e-addons.com</a>
                </div>
            </div>
        </div>
        <div class="e-addons-row">
            <div class="e-addons-col e-addons-col-3 e-addons-banner"><a href="https://e-addons.com" target="_blank"><img src="<?php echo E_ADDONS_URL; ?>/assets/img/banner1.jpg"></a></div>
            <div class="e-addons-col e-addons-col-3 e-addons-banner"><a href="https://e-addons.com/?p=2950" target="_blank"><img src="<?php echo E_ADDONS_URL; ?>/assets/img/banner2.jpg"></a></div>
            <div class="e-addons-col e-addons-col-3 e-addons-banner"><a href="https://www.facebook.com/eaddons" target="_blank"><img src="<?php echo E_ADDONS_URL; ?>/assets/img/banner3.jpg"></a></div>
        </div>
    </div>
</div>