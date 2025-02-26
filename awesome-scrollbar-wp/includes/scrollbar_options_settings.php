<?php 
/*
 * Enqueue Scrollbar Options Settings
 * @author nasir2015
 */
 

/*===============================================
    Activation code of Awesome Scroll To Top
=================================================*/
function nnf_scrollbar_active(){?>
<?php global $nnf_scrollbar_default_options;$nnf_scrollbar_settings=get_option('nnf_scrollbar_default_options',$nnf_scrollbar_default_options); ?>
	<script type="text/javascript">
		// scrollbar full options
		(function($) {
			"use strict";
			jQuery(document).ready(function($){
				$("html").niceScroll({
					cursorcolor:"<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_color']); ?>",
					background:"<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_bg']); ?>",
					cursoropacitymin:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_minopactiy']); ?>,
					cursoropacitymax:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_maxopactiy']); ?>,
					cursorwidth:"<?php echo esc_attr($nnf_scrollbar_settings['scroll_bar_width']); ?>",
					cursorborderradius:"<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_border_radius']); ?>",
					zindex:"<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_zindex']); ?>",
					scrollspeed:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_speed']); ?>,
					mousescrollstep:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_mousestep_speed']); ?>,
					touchbehavior:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_touchbehavior']); ?>,
					autohidemode:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_autohide']); ?>,
					railalign:"<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_railalign']); ?>",
					hidecursordelay:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_hidecursordelay']); ?>,
					smoothscroll:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_smoothscroll']); ?>,
					enablemousewheel:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_enablemousewheel']); ?>,
					cursorfixedheight:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_cursorfixedheight']); ?>,
					cursorminheight:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_cursorminheight']); ?>,
					enablekeyboard:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_enablekeyboard']); ?>,
				});
			});
		})(jQuery);
	</script> 
	<style type="text/css">
		.nicescroll-cursors{
			border-style:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_border_style']); ?>;
			border-width:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_border']); ?>;
			border-color:<?php echo esc_attr($nnf_scrollbar_settings['scrollbar_border_color']); ?>;
		}
	</style>
<?php
}
add_action('wp_head','nnf_scrollbar_active');
add_action('admin_head','nnf_scrollbar_active');
?>