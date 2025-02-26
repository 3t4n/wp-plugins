<?php

/**
 * The template for the cookie step optional
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public/templates/components
 */

$cdc_cookies        = array();
$cookie_check_all   = true;
if ( isset( $_COOKIE['cdc-cookies'] ) ) {
    $cdc_cookies    = json_decode( stripslashes( $_COOKIE['cdc-cookies'] ), true );
    $cdc_cookies 	= array_map( 'sanitize_text_field', $cdc_cookies );
}

foreach ( $cdc_cookies as $cookie_key => $cookie_value ) {
    if ( !$cookie_value ){
        $cookie_check_all = false;
    }
}
?>

<div class="cdc-cookie__popup__steps__step" id="optional-show-step-container">

    <div class="cdc-cookie__popup__steps__step__body">

        <div class="cdc-cookie__popup__steps__step__body__top">

            <?php if ( !empty($personalization_main_image) || is_admin() ): ?>
                <div class="cdc-cookie__popup__steps__step__body__image">
                    <img src="<?php echo esc_url($personalization_main_image); ?>" id="personalization-main-image-image" alt="<?php _e('Cookie modal illustration', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN); ?>">
                </div>
            <?php endif; ?>

            <div class="cdc-cookie__popup__steps__step__body__title" id="optional-title-text"><?php esc_html_e($optional_title); ?></div>
        </div>

        <div class="cdc-cookie__popup__steps__step__body__description" id="optional-description-text"><?php echo esc_textarea($optional_description); ?></div>

        <div class="cdc-cookie__popup__steps__step__body__toggles">

            <div class="cdc-cookie__popup__steps__step__body__toggles__items">

                <?php

                    $cookie_item_line   = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/cookie-step-optional-line.php' );
                    $check_svg          = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/toggle-check.svg' );
		            $times_svg          = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/times.svg' );
                
                    foreach ( $cookie_settings_main as $cookie_id => $cookie_items ) {

                        if ( $cookie_items['mandatory'] != 'yes' ) {

                            $favicon        = $cookie_items['favicon'];
                            $title          = $cookie_items['title'];
                            $descShort      = $cookie_items['descShort'];
                            $policyUrl      = $cookie_items['policyUrl'];
                            $cookieState    = isset( $cdc_cookies[$cookie_id] ) ? checked( $cdc_cookies[$cookie_id], true, false ) : checked( true, true, false );
                        
                            echo str_replace(
                                array( '{{ID}}', '{{FAVICON}}', '{{TITLE}}', '{{DESC_SHORT}}', '{{POLICY_URL}}', '{{COOKIE_STATE}}', '{{CHECK_SVG}}', '{{TIMES_SVG}}' ),
                                array( esc_attr($cookie_id), esc_url($favicon), esc_html($title), esc_html($descShort), esc_url($policyUrl), $cookieState, $check_svg, $times_svg ),
                                $cookie_item_line
                            );
                        }
                    }

                ?>

            </div>

        </div>
        
    </div>

    <div class="cdc-cookie__popup__steps__step__footer">

        <div class="cdc-cookie__popup__steps__step__footer__btns">
            
            <button class="cdc-cookie__popup__steps__step__footer__btns__btn main" id="cdc-cookie-step-optional-acceptall"><?php esc_html_e($optional_acceptall_text); ?></button>
            <button class="cdc-cookie__popup__steps__step__footer__btns__btn main" id="cdc-cookie-step-optional-refuseall"><?php esc_html_e($optional_refuseall_text); ?></button>
            <button class="cdc-cookie__popup__steps__step__footer__btns__btn main" id="cdc-cookie-step-optional-confirm"><?php esc_html_e($optional_confirm_text); ?></button>
            
        </div>

        <?php include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/step-component-powered.php'; ?>

    </div>

</div>