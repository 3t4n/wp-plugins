<?php

/**
 * Plugin Name: Accordion
 * Description: Display customizable accordion in beautiful way.
 * Version: 1.0.8
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: b-accordion
 */

// ABS PATH
if (!defined('ABSPATH')) {
	exit;
}

// Constant
define('BAB_PLUGIN_VERSION', isset($_SERVER['HTTP_HOST']) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.0.8');
define('BAB_ASSETS_DIR', plugin_dir_url(__FILE__) . 'assets/');

// B Accordion
class BABAccordion
{
	function __construct()
	{
		add_action('enqueue_block_assets', [$this, 'enqueueBlockAssets']);
		add_action('init', [$this, 'onInit']);

		// Post Type function hooks 
		add_action('init', array($this, 'bab_accordion_block_post_type'));

		// shortcode type function hooks 
		add_shortcode('accordion', [$this, 'bab_shortcode_handler']);

		//manage column 
		add_filter('manage_accordion_block_posts_columns', [$this, 'accordionManageColumns'], 10);

		// Custom manage column 
		add_action('manage_accordion_block_posts_custom_column', [$this, 'accordionManageCustomColumns'], 10, 2);

		// admin function hooks 
		add_action('admin_enqueue_scripts', [$this, 'bab_admin_enqueue_script']);
	}

	//manage column
	function accordionManageColumns($defaults)
	{
		unset($defaults['date']);
		$defaults['shortcode'] = 'ShortCode';
		$defaults['date'] = 'Date';
		return $defaults;
	}


	// custom manage column
	function accordionManageCustomColumns($column_name, $post_ID)
	{
		if ($column_name == 'shortcode') {
			echo '<div class="bPlAdminShortcode" id="bPlAdminShortcode-' . esc_attr($post_ID) . '">
					<input value="[accordion id=' . esc_attr($post_ID) . ']" onclick="copyBPlAdminShortcode(\'' . esc_attr($post_ID) . '\')" readonly>
					<span class="tooltip">Copy To Clipboard</span>
				</div>';
		}
	}


	// shortcode function calls 
	function bab_shortcode_handler($attributes)
	{
		$postID = $attributes['id'];
		$post = get_post($postID);
		$blocks = parse_blocks($post->post_content);
		ob_start();
		echo render_block($blocks[0]);
		return ob_get_clean();
	}

	// Custom Post Type function calls
	function bab_accordion_block_post_type()
	{
		register_post_type(
			'accordion_block',
			array(
				'label' => 'Accordion',
				'labels' => [
					'add_new' => 'Add New', // Global page
					'add_new_item' => 'Add New Accordion', // When click on new post
					'edit_item' => 'Edit Accordion',
					'not_found' => 'There is no accordion please add one',
					'item_published' => 'Accordion Published',
					'item_updated' => 'Accordion Updated'
				],
				'public' => false,
				'show_ui' => true,
				'show_in_rest' => true,
				'menu_icon' =>  'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600" width="24" height="24" aria-hidden="true" focusable="false"><g transform="translate(0.000000,600.000000) scale(0.100000,-0.100000)" fill="#4527a4"><path d="M2830 5994 c-368 -31 -646 -93 -934 -206 -759 -299 -1385 -925 -1684 -1684 -89 -227 -155 -484 -188 -741 -23 -175 -23 -551 0 -726 83 -635 347 -1208 765 -1660 494 -535 1120 -858 1848 -953 175 -23 551 -23 726 0 728 95 1354 418 1848 953 418 452 682 1025 765 1660 23 175 23 551 0 726 -71 543 -261 1013 -583 1440 -488 650 -1216 1071 -2024 1172 -121 15 -450 27 -539 19z m2005 -1221 c48 -26 116 -94 141 -143 18 -34 19 -95 19 -1630 0 -1535 -1 -1596 -19 -1630 -25 -49 -93 -117 -141 -143 l-40 -22 -1695 0 c-1633 0 -1696 1 -1730 19 -49 25 -117 93 -143 141 l-22 40 0 1595 c0 1535 1 1596 19 1630 37 71 117 140 186 161 14 4 781 7 1705 6 l1680 -2 40 -22z"></path><path d="M1462 4585 c-58 -25 -62 -48 -62 -385 l0 -300 1700 0 1700 0 0 300 c0 340 -3 360 -64 385 -52 22 -3224 22 -3274 0z m300 -202 l88 -88 90 90 90 90 72 -73 73 -72 -163 -162 -162 -163 -162 162 -163 163 70 70 c38 38 72 70 75 70 2 0 44 -39 92 -87z"></path><path d="M1400 3000 l0 -700 1700 0 1700 0 0 700 0 700 -1700 0 -1700 0 0 -700z m615 380 l160 -160 -73 -72 -72 -73 -90 90 -90 90 -90 -90 -90 -90 -72 73 -73 72 160 160 c88 88 162 160 165 160 3 0 77 -72 165 -160z"></path><path d="M1400 1800 c0 -340 3 -360 64 -385 53 -22 3219 -22 3272 0 61 25 64 45 64 385 l0 300 -1700 0 -1700 0 0 -300z m362 83 l88 -88 90 90 90 90 72 -73 73 -72 -163 -162 -162 -163 -162 162 -163 163 70 70 c38 38 72 70 75 70 2 0 44 -39 92 -87z"></path></g></svg>'),
				'template' => [['bab/accordion']],
				'template_lock' => 'all',
			)
		);
	}


	// JS and CSS admin function calls
	function bab_admin_enqueue_script()
	{
		wp_register_style('admin-style', plugins_url('admin/css/admin.css', __FILE__), array(), 'all');
		wp_enqueue_style('admin-style');

		wp_register_script('admin-script', plugins_url('admin/js/admin.js', __FILE__), '', '', true);
		wp_enqueue_script('admin-script');
	}

	function enqueueBlockAssets()
	{
		wp_register_script('zebra_accordion', BAB_ASSETS_DIR . 'js/zebra_accordion.min.js', ['jquery'], BAB_PLUGIN_VERSION, true);
	}

	function onInit()
	{
		register_block_type(__DIR__ . '/build');
	}

	function render($attributes)
	{
		extract($attributes);

		wp_set_script_translations('bab-accordion-script', 'accordion', plugin_dir_path(__FILE__) . 'languages');

		$className = $className ?? '';
		$blockClassName = "wp-block-bab-accordion $className align$align";

		ob_start(); ?>
		<div class='<?php echo esc_attr($blockClassName); ?>' id='babAccordion-<?php echo esc_attr($cId) ?>'
			data-attributes='<?php echo esc_attr(wp_json_encode($attributes)); ?>'></div>

<?php return ob_get_clean();
	} // Render
}
new BABAccordion;
