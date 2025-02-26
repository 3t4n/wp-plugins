<?php
/*
Plugin Name: Advanced Before After Slider
Plugin URI: https://plugins.blacktheme.net/advanced-before-after/
Description: Add before / after image slider to your website.
Version: 1.0.0
Author: Uday Moradiya
Author URI: https://www.brainyinfotech.com/
License: GPLv2
Text Domain: abas-before-after
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit();

function abas_before_after_scripts( ) {
	wp_enqueue_script( 'abas-before-after-event-move-js', plugins_url( '', __FILE__ ) . '/js/jquery.event.move.js', array('jquery'), '2.0.0', true );
	wp_enqueue_script( 'abas-before-after-twentytwenty-js', plugins_url( '', __FILE__ ) . '/js/jquery.twentytwenty.js', array('jquery'), '1.0.0', true );

	wp_enqueue_style( 'abas-before-after-twentytwenty-css', plugins_url( '', __FILE__ ) . '/css/twentytwenty.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'abas_before_after_scripts' );

function abas_before_after_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'orientation' => 'horizontal',
		'before_src' => '',
		'before_label' =>  __('Before', 'abas'),
		'after_src' => '',
		'after_label' => __('After', 'abas'),
		'no_overlay' => '',
		'move_slider_on_hover' => '',
		'click_to_move' => ''
	), $atts ) );
	$random_class = current_time('timestamp') . rand();
	ob_start();
	?>
	<script>
		jQuery(function(){
			jQuery(".twentytwenty-container-<?php echo esc_html($random_class); ?>").twentytwenty({
		    orientation: '<?php echo esc_html($orientation); ?>',
		    before_label: '<?php echo esc_html($before_label); ?>',
		    after_label: '<?php echo esc_html($after_label); ?>',
		    no_overlay: '<?php echo esc_html($no_overlay); ?>',
		    move_slider_on_hover: '<?php echo  esc_html($move_slider_on_hover); ?>',
		    click_to_move:'<?php echo esc_html($click_to_move); ?>'
			});
		});
	</script>
	<div class="twentytwenty-container-<?php echo esc_html($random_class); ?>">
		<?php if($before_src != ''){ ?>
			<img src="<?php echo esc_url($before_src); ?>" alt="<?php echo esc_attr($before_label); ?>" />
		<?php } ?>
		<?php if($after_src != ''){ ?>
			<img src="<?php echo esc_url($after_src); ?>" alt="<?php echo esc_attr($after_label); ?>"/>
		<?php } ?>
	</div>
	<?php return ob_get_clean();
}
add_shortcode( 'abas-slider', 'abas_before_after_shortcode' );
