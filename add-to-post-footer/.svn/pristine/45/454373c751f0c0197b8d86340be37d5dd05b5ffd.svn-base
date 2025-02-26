<?php

function atpf_textdomain() {
	load_plugin_textdomain(
		'add-to-post-footer',
		false,
		ATPF_LANGUAGES_PATH
	);
}

function atpf_options_in_menu() {
	add_posts_page(
		'Add To Post Footer',
		'Add To Post Footer',
		'manage_options',
		'atpf-options',
		'atpf_options_page'
	);
}

function atpf_options_page() {
	?>
	<div class="wrap">
		<?php
			require_once ATPF_INCLUDES_DIR.'option-page.php';
		?>
	</div>
	<?php
}

function atpf_add_link_tag_to_head() {
	wp_enqueue_style( 'atpf-style', '/'.ATPF_CSS_PATH.'style.css', array(), null, 'all' );
}

function atpf_activation() {
	atpf_create_table_in_wpdb();
	atpf_first_insert();
}

function atpf_text( $content ) {
	$text = atpf_select_text();

	return $content.$text;
}






function atpf_create_table_in_wpdb() {
	global $wpdb;

	$table_name = $wpdb->prefix.'atpf_options';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		footer varchar(250)
	) $charset_collate;";

	require_once( ABSPATH.'wp-admin/includes/upgrade.php' );
	dbDelta( $sql, true );
}

function atpf_first_insert() {
	global $wpdb;

	$table_name = $wpdb->prefix.'atpf_options';

	$sql = "INSERT INTO $table_name VALUES ( __( 'Insert here what you want to add to footer of each post', 'add-to-post-footer' ) );";

	require_once( ABSPATH.'wp-admin/includes/upgrade.php' );
	dbDelta( $sql, true );
}

function atpf_select_text() {
	global $wpdb;

	$table_name = $wpdb->prefix.'atpf_options';
	$sql = "SELECT * FROM $table_name;";

	$array = $wpdb->get_results( $sql, ARRAY_A );

	return $array[0]['footer'];
}

function atpf_update_footer_text($text) {
	global $wpdb;

	$table_name = $wpdb->prefix.'atpf_options';

	$sql = "UPDATE $table_name SET footer='$text';";

	require_once( ABSPATH.'wp-admin/includes/upgrade.php' );
	dbDelta( $sql, true );
}

?>