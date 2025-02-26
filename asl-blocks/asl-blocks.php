<?php
/**
 * Plugin Name:       Custom Content Blocks
 * Description:       Collection custom blocks.
 * Requires at least: 5.7
 * Requires PHP:      5.6
 * Version:           0.2.08
 * Author:            Alex Lundin
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       asl-blocks
 * Domain Path:       /lang
 *
 * @package           asl-blocks
 */

defined( 'ABSPATH' ) || exit;

global $wp_version;

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'asl_product-animate', plugins_url( 'blocks/product/assets/js/animate.js', __FILE__ ), array(), null, true );
	wp_enqueue_style( 'asl_product-animate', plugins_url( 'blocks/product/assets/css/animate.css', __FILE__ ) );
	wp_enqueue_style( 'asl_product-color', plugins_url( 'style.css', __FILE__ ) );
} );

function add_new_category( $categories, $post ): array {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'block-by-asl',
				'title' => __( 'Blocks by Alex Lundin', 'asl-blocks' ),
			),
		)
	);
}

if ( (double) $wp_version >= 5.8 ) {
	add_filter( 'block_categories_all', 'add_new_category', 10, 2 );
} else {
	add_filter( 'block_categories', 'add_new_category', 10, 2 );
}

add_filter( 'body_class', function ( $classes ) {
	$classes[] = 'asl-blocks';

	return $classes;
} );

include 'blocks/advanced-buttons/advanced-buttons.php';
include 'blocks/advanced-button/advanced-button.php';
include 'blocks/asl-advantage-table/asl-advantage-table.php';
include 'blocks/cta-1/cta-1.php';
include 'blocks/cta-2/cta-2.php';
include 'blocks/product/product.php';
include 'blocks/product-row/product-row.php';
include 'blocks/product-table/product-table.php';
include 'blocks/text-block/text-block.php';


add_action( 'init', function () {
	$my_colors = [
		[
			'name'  => 'Purple',
			'slug'  => 'purple',
			'color' => '#332e54'
		],
		[
			'name'  => 'Orange',
			'slug'  => 'orange',
			'color' => '#f7882f'
		],
		[
			'name'  => 'Black',
			'slug'  => 'black',
			'color' => '#000000'
		],
		[
			'name'  => 'Gray',
			'slug'  => 'gray',
			'color' => '#f4f4f4'
		],
		[
			'name'  => 'Red',
			'slug'  => 'red',
			'color' => '#ef3737'
		],
		[
			'name'  => 'Red Light',
			'slug'  => 'red-light',
			'color' => '#fa5d49'
		],
		[
			'name'  => 'Red Dark',
			'slug'  => 'red-dark',
			'color' => '#aa0511'
		],
	];
	add_theme_support(
		'editor-color-palette',
		$my_colors
	);
} );


function add_option_field_to_general_admin_page() {
	$option_name = 'update_sitemap';

	// регистрируем опцию
	register_setting( 'general', $option_name );

	// добавляем поле
	add_settings_field(
		'asl_update_sitemap',
		'Settings sitemap',
		'asl_update_sitemap_function',
		'general',
		'default',
		array(
			'id'          => 'asl_update_sitemap-id',
			'option_name' => 'update_sitemap'
		)
	);
}

add_action( 'admin_menu', 'add_option_field_to_general_admin_page' );

function asl_update_sitemap_function( $val ) {
	$id          = $val['id'];
	$option_name = $val['option_name'];


	echo '<input
		type="checkbox"
		name=" ' . $option_name . '"
		id="' . $id . '"
        value="1"
       ' . checked( 1, get_option( $option_name ), false ) . '
	/>
    <label for="<? echo $id ?>">Enable daily updates</label>';

}

if ( get_option( 'update_sitemap' ) ) {
	add_filter( 'wp_sitemaps_posts_entry', 'wpkama_sitemaps_posts_entry', 10, 2 );
	function wpkama_sitemaps_posts_entry( $entry, $post ) {

		$entry['lastmod']    = date( "Y-m-d" );
		$entry['priority']   = 0.8;
		$entry['changefreq'] = 'daily';

		return $entry;
	}
}


//TODO: Шорткод с выводом года или месяца
function asl_date_func_month( $atts ) {
	return date( 'F Y' );
}

function asl_date_func_year( $atts ) {
	return date( 'Y' );
}

add_shortcode( 'month', 'asl_date_func_month' );
add_shortcode( 'year', 'asl_date_func_year' );

//TODO: Удалить после запуска сервиса
add_action( 'init', function ( $query ) {
	$uri_parts = explode( '?', $_SERVER['REQUEST_URI'], 2 );
	if ( isset( $_GET['max'] ) ) {
		// header('Location: '.$_GET['max']);
		wp_redirect( $_GET['max'], 301 );
		exit();
	}
} );
