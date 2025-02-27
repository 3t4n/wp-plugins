<?php

if( !function_exists( 'fast_cart_css_variables' ) ){

	add_action( 'wp_head',  'fast_cart_css_variables');

	function fast_cart_css_variables(){

		?>

		<style type="text/css">

			:root {
				--fs-mode: <?php echo ( fast_cart()->get_options()->mode === 'light' ) ? '#ffffff' : '#222222'; ?>;
			  	--fs-color: <?php echo esc_attr( fast_cart()->get_options()->color ); ?>;
			  	--fs-content-tray-width: 460px;
			  	--fs-content-tray-height: <?php echo ( fast_cart()->get_options()->position === "tray_left" || fast_cart()->get_options()->position === "tray_right" ) ? "100%" : "560px"; ?>;;
			}

		</style>

		<?php


	}

}

