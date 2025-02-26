<?php

defined( 'ABSPATH' ) || exit;

/**
 * Help Panel Template
 */

// get images
$close_icon = AIDM_IMG_URL.'close-icon.webp';
$settings_menu = AIDM_IMG_URL.'settings-menu.webp';
$pillar = AIDM_IMG_URL.'pillar.gif';

?> 

<div class="aidm-help-modal">
    <div class="aidm-help-container">
        <div class="aidm-help-header">
            <h2><?php esc_html_e( 'Admin IDE Dark Mode', aidm_get_text_domain() ) ?></h2>
            <div>
                <img alt="" id="aidm-close-help" src="<?php echo esc_url( $close_icon ) ?>" class="aidm-help-img" />
            </div>
        </div>
        <div class="aidm-help-content">
            <p>
                <?php esc_html_e( 'Thank you for using the Admin IDE Dark Mode.', aidm_get_text_domain() ) ?>
            </p>
            <div class="aidm-help-content-section">
                <p>
                    <?php esc_html_e( 'In the Settings panel, you can select a theme for your IDE using the \'IDE Theme\' tab.', aidm_get_text_domain() ) ?>
                </p>
                
                <div class="aidm-help-img-container">
                    <img alt="" src="<?php echo esc_url( $settings_menu ) ?>" class="aidm-help-img" />
                </div>
            </div>
            
            <div class="aidm-help-content-section">
                <p>
                    <?php esc_html_e( 'Choose your theme and then, every IDE in the admin section will adopt the newly selected theme. Quite simple, isn\'t it ?', aidm_get_text_domain() ) ?>
                </p>
            </div>

            <div class="aidm-help-gif-container">
                <img src="<?php echo esc_url( $pillar ) ?>" class="aidm-help-img" />
            </div>
        </div>
    </div>
</div>
