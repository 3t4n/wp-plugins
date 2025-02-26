<?php
/**
 * Plugin Name:       ATR Portfolio
 * Description:       Portfolio block. Showcase your projects and portfolio work.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Yehuda Tiram atarimtr.co.il
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       atr-portfolio
 *
 * @package           atr-blocks
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function atr_blocks_atr_portfolio_block_init() {
	register_block_type( __DIR__ . '/build' );
	register_block_type( plugin_dir_path( __FILE__ ) . 'blocks/portfolio-item/build' );
}
add_action( 'init', 'atr_blocks_atr_portfolio_block_init' );


add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'atr_portfolio_add_action_links');

function atr_portfolio_add_action_links($actions)
{	
	$actions[] = '<a href="http://atarimtr.co.il" target="_blank">More plugins by Yehuda Tiram</a>';
	return $actions;
}

add_action('init', 'atr_portfolio_enqueue_scripts');
function atr_portfolio_enqueue_scripts()
{
	wp_register_script('atr-portfolio-script', false);
	wp_enqueue_script('atr-portfolio-script', false);
	$translation_array = array(
		'pluginDirUrl' => plugin_dir_url(__FILE__)
	);
	wp_add_inline_script('atr-portfolio-script', 'const atr_portfolio_OBJ = ' . json_encode($translation_array), 'before');
}