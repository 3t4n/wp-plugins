<?php

/**
 * The template for the powered component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public/templates/components
 */
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! apply_filters( 'Cookie_Dough_Consent/powered_by_webdeclic', true ) ) return;
?>

<?php if ( apply_filters( 'cdc/powered_by_visibility', true) ): ?>
    <div class="cdc-cookie__popup__steps__step__footer__powered">

        <div class="cdc-cookie__popup__steps__step__footer__powered__header">
            <?php echo wp_kses( sprintf( '<span>%s %s</span>', _e( 'powered by', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ), '<a href="https://webdeclic.com/" target="_blank" >webdeclic</a>' ), 'post' ); ?>                 
        </div>

    </div>
<?php endif; ?>