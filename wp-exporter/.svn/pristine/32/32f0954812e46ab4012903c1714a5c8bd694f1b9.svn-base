<?php
/**
	Plugin Name: Custom Post Exporter
	Plugin URI: https://wordpress.org/plugins/wp-exporter/
	Description: Export specific posts, pages, comments, categories, tags, custom fields, custom posts, custom taxonomies and more to an export file.
	Author: zourbuth
	Version: 1.0.0
	Author URI: https://profiles.wordpress.org/zourbuth/
	License: GPLv2 or later
	Copyright 2016 zourbuth.com (email: zourbuth@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	@package Custom Post Exporter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Set constant
 *
 * @since 0.0.5
 */
define( 'CP_EXPORTER_VERSION', '1.0.0' );
define( 'CP_EXPORTER_PATH', plugin_dir_path( __FILE__ ) );
define( 'CP_EXPORTER_URL', plugin_dir_url( __FILE__ ) );
define( 'CP_EXPORTER_SLUG', 'cp-exporter' );
define( 'CP_EXPORTER_POST_PER_PAGE', 9999 );

/**
 * Plugins filters and actions
 */
add_action( 'plugins_loaded', 'cp_exporter_plugin_loaded' );

/**
 * Plugins loaded function
 *
 * @since 0.0.1
 */
function cp_exporter_plugin_loaded() {
	add_action( 'export_filters', 'cp_exporter_filters' );
	add_action( 'wp_ajax_cp_exporter', 'cp_exporter_form_ajax' );
	add_action( 'admin_enqueue_scripts', 'cp_exporter_scripts' );

	add_filter( 'query', 'cp_exporter_query' ); // custom filter.

	require_once CP_EXPORTER_PATH . 'class-cp-export-utility.php';
}

/**
 * Export query based on specific post IDs.
 *
 * @param array $query wpdb query arguments.
 * @since 1.0.0
 */
function cp_exporter_query( $query ) {
	// Check if only from export page.
	if ( ! defined( 'WXR_VERSION' ) ) {
		return $query;
	}

	// Validate nonce.
	if ( ! isset( $_GET['exporter-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['exporter-nonce'] ) ), CP_EXPORTER_SLUG ) ) {
		return $query;
	}

	// Check if this is a custom export.
	if ( isset( $_GET['content'] ) && 'advanced' !== sanitize_text_field( wp_unslash( $_GET['content'] ) ) ) {
		return $query;
	}

	// Check if post IDs provided.
	if ( ! isset( $_GET['post_ids'] ) ) {
		return $query;
	}

	global $wpdb;

	// Modify wp-admin/includes/export.php post IDs query.
	if ( str_contains( $query, "SELECT ID FROM {$wpdb->posts}" ) ) {
		$post_ids = array_map( 'sanitize_text_field', (array) wp_unslash( $_GET['post_ids'] ) );
		$post_ids = implode( ',', $post_ids );
		$query    = "SELECT ID FROM {$wpdb->posts} WHERE ID IN ({$post_ids})";
	}

	return $query;
}

/**
 * Export AJAX function
 *
 * @since 0.0.1
 */
function cp_exporter_form_ajax() {
	if ( ! isset( $_POST['nonce'] ) || ! isset( $_POST['query'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), CP_EXPORTER_SLUG ) ) {
		die();
	}

	$post_type_query = sanitize_text_field( wp_unslash( $_POST['query'] ) );

	$posts = get_posts(
		array(
			'posts_per_page' => CP_EXPORTER_POST_PER_PAGE,
			'post_type'      => $post_type_query,
		)
	);

	echo '<label>' . esc_attr__( 'Select one or more posts', 'custom-post-exporter' ) . '</label><br />
		  <select name="post_ids[]" size="8" multiple="multiple">';

	foreach ( $posts as $post ) {
		printf(
			'<option value="%1$s">%2$s (%1$s)</option>',
			esc_attr( $post->ID ),
			esc_attr( $post->post_title ),
		);
	}

	echo '</select>';
	wp_die();
}

/**
 * Build all exporter form components.
 *
 * @since 0.0.1
 */
function cp_exporter_filters() {
	// Default queries.
	$defaults = array(
		''           => esc_attr__( 'Select query', 'custom-post-exporter' ),
		'post'       => esc_attr__( 'Post', 'custom-post-exporter' ),
		'page'       => esc_attr__( 'Page', 'custom-post-exporter' ),
		'attachment' => esc_attr__( 'Media/attachment', 'custom-post-exporter' ),
	);

	// Registered post types.
	// @since 0.0.6.
	$post_types = array();
	$args       = array(
		'_builtin'   => false,
		'can_export' => true,
	);

	foreach ( get_post_types( $args, 'objects' ) as $post_type ) {
		$post_types[ esc_html( $post_type->name ) ] = esc_attr( $post_type->label );
	}

	$export_queries = apply_filters( 'cp_exporter_queries', array_merge( $defaults, $post_types ) );
	wp_nonce_field( CP_EXPORTER_SLUG, 'exporter-nonce', false );
	?>
	<p><label><input type="radio" name="content" value="advanced" /> <?php esc_attr_e( 'Custom Export', 'custom-post-exporter' ); ?></label></p>
	<div class="advanced-filters" id="advanced-filters" style="margin-left: 23px;">
		<p>
			<select class="smallfat" id="query" name="query">
				<?php foreach ( $export_queries as $key => $query ) { ?>
					<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $query ); ?></option>
				<?php } ?>
			</select>
			<span style="display: inline-block; vertical-align: middle;"><span class="spinner"></span></span>
		</p>
		<div><!-- custom form starts here --></div>
	</div>
	<?php
}

/**
 * Added custom scripts to export admin page
 *
 * @param array $hook_suffix current admin page hook suffix.
 * @since 1.0.0
 */
function cp_exporter_scripts( $hook_suffix ) {
	if ( 'export.php' === $hook_suffix ) {
		wp_enqueue_script( 'cp-exporter-admin', CP_EXPORTER_URL . 'js/admin.js', array( 'jquery' ), CP_EXPORTER_VERSION, false );

		wp_localize_script(
			'cp-exporter-admin',
			'cpExporter',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( CP_EXPORTER_SLUG ),
			)
		);
	}
}
