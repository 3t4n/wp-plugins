<?php

/**
 * The template for the cookie step mandatory
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public/templates/components
 */
?>

<div class="cdc-cookie__popup__steps__step" id="mandatory-show-step-container">

    <div class="cdc-cookie__popup__steps__step__body">

        <div class="cdc-cookie__popup__steps__step__body__top">

            <?php if ( !empty($personalization_main_image) || is_admin() ): ?>
                <div class="cdc-cookie__popup__steps__step__body__image">
                    <img src="<?php echo esc_url($personalization_main_image); ?>" id="personalization-main-image-image" alt="<?php _e('Cookie modal illustration', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN); ?>">
                </div>
            <?php endif; ?>

            <div class="cdc-cookie__popup__steps__step__body__title" id="mandatory-title-text"><?php esc_html_e($mandatory_title); ?></div>
        </div>

        <div class="cdc-cookie__popup__steps__step__body__description" id="mandatory-description-text"><?php echo esc_textarea($mandatory_description); ?></div>

        <div class="cdc-cookie__popup__steps__step__body__cookies">

            <?php
            
                $cookie_item_line   = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/cookie-step-mandatory-line.php' );

                foreach ( $cookie_settings_main as $cookie_id => $cookie_items ) {

                    if ( $cookie_items['mandatory'] == 'yes' ) {

                        $favicon    = $cookie_items['favicon'];
                        $title      = $cookie_items['title'];
                        $descShort  = $cookie_items['descShort'];
                        $policyUrl  = $cookie_items['policyUrl'];
                    
                        echo str_replace(
                            array( '{{ID}}', '{{FAVICON}}', '{{TITLE}}', '{{DESC_SHORT}}', '{{POLICY_URL}}' ),
                            array( esc_attr($cookie_id) , esc_url($favicon), esc_html($title), esc_html($descShort), esc_url($policyUrl) ),
                            $cookie_item_line
                        );
                    }
                }

            ?>

        </div>
        
    </div>

    <div class="cdc-cookie__popup__steps__step__footer">

        
        <div class="cdc-cookie__popup__steps__step__footer__btns">
            
            <button class="cdc-cookie__popup__steps__step__footer__btns__btn main" id="cdc-cookie-step-mandatory-acceptall"><?php esc_html_e($mandatory_acceptall_text); ?></button>
            <button class="cdc-cookie__popup__steps__step__footer__btns__btn main" id="cdc-cookie-step-mandatory-refuseall"><?php esc_html_e($mandatory_refuseall_text); ?></button>
            
            <?php if ( $optional_show_step == 'yes' || is_admin() ): ?>
                <button class="cdc-cookie__popup__steps__step__footer__btns__btn main <?php echo esc_attr( $optional_show_step == 'yes' ? 'show' : '' ); ?>" id="cdc-cookie-step-mandatory-next"><?php esc_html_e($mandatory_nextbtn_text); ?></button>
            <?php endif; ?>
            
        </div>

        <?php include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/step-component-powered.php'; ?>

    </div>

</div>