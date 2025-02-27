<?php
/**
 * Preloader Design
 *
 * @package Preloader for Website - WPOS
 * @version 1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="plwao-loader-wrap">
	<div class="plwao-loader-inr">
		<?php if( ! empty( $custom_content ) ) { ?>
			<div class="plwao-custom-cnt">
				<?php echo do_shortcode( wpautop( $custom_content ) ); ?>
			</div>
		<?php } ?>

		<?php if( empty( $preloader_type ) || $preloader_type == 'default' ) { ?>
			<img src="<?php echo PLWAO_URL; ?>assets/images/<?php echo esc_attr($plwao_spinner); ?>.gif" class="plwao-img" alt="" />
		<?php } ?>
	</div>
</div>