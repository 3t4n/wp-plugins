<?php
/**
 * Template for the Expandable menu component
 *
 * @package Astrolabe
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$main_astro_menu_id    = astr_get_menu_id( 'astrolabe-hamburger-menu' );
$main_astro_menu_items = wp_get_nav_menu_items( $main_astro_menu_id );

$astro_theme_class = \ASTR\Admin\Plugin_Settings::astro_theme_class();

$main_astro_theme = 'wa-astro-theme ' . $astro_theme_class;

if ( $main_astro_menu_items ) :
	// Check if $main_astro_menu_items is array and not empty
	if ( is_array( $main_astro_menu_items ) || ! empty( $main_astro_menu_items ) ) :
		?>

<div id="wa-astro-modal-menu" style="display: none;" class="wa-astro-hamburger-modal <?php echo esc_attr( $main_astro_theme ); ?>">
		<?php
		foreach ( $main_astro_menu_items as $item ) {
			$item_title = $item->title;
			$item_url   = $item->url;
			?>
			<a href="<?php echo esc_attr( $item_url ); ?>"><?php echo esc_html( $item_title ); ?></a>
			<?php
		}
		?>
</div>
		<?php
	endif;
endif;
