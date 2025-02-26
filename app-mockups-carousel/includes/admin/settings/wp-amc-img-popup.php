<?php
/**
 * Image Data Popup
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="wp-amc-img-data-wrp wp-amc-hide">
	<div class="wp-amc-img-data-cnt">

		<div class="wp-amc-img-cnt-block">
			<div class="wp-amc-popup-close wp-amc-popup-close-wrp"><img src="<?php echo WP_AMC_URL; ?>assets/images/close.png" alt="<?php _e('Close (Esc)', 'app-mockups-carousel'); ?>" title="<?php _e('Close (Esc)', 'app-mockups-carousel'); ?>" /></div>

			<div class="wp-amc-popup-body-wrp">
			</div><!-- end .wp-amc-popup-body-wrp -->
			
			<div class="wp-amc-img-loader"><?php _e('Please Wait', 'app-mockups-carousel'); ?> <span class="spinner"></span></div>

		</div><!-- end .wp-amc-img-cnt-block -->

	</div><!-- end .wp-amc-img-data-cnt -->
</div><!-- end .wp-amc-img-data-wrp -->
<div class="wp-amc-popup-overlay"></div>