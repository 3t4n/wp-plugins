<?php
add_action( 'wp_ajax_tspt_delete', 'tspt_delete_callback' );
add_action( 'wp_ajax_tspt_clone', 'tspt_clone_callback' );
add_action( 'wp_ajax_tspt_edit', 'tspt_edit_callback' );
add_action( 'wp_ajax_tspt_edit_theme', 'tspt_edit_theme_callback' );
function tspt_delete_callback() {
	if (!isset($_POST['tspt_id']) || !isset($_POST['tspt_nonce']) || sanitize_text_field(wp_unslash($_POST['tspt_nonce'])) === '' || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tspt_nonce'])), 'tspt_nonce_field')) {
		wp_send_json_error();
	}
	global $wpdb;
	$tspt_manager_table = esc_sql($wpdb->prefix . "totalsoft_ptable_manager");
	$tspt_cols_table = esc_sql($wpdb->prefix . "totalsoft_ptable_cols");
	$tspt_id = sanitize_text_field(wp_unslash($_POST['tspt_id']));
	$wpdb->query($wpdb->prepare("DELETE FROM $tspt_manager_table WHERE id = %d", $tspt_id));
	$wpdb->query($wpdb->prepare("DELETE FROM $tspt_cols_table WHERE PTable_ID = %s", $tspt_id));
	wp_send_json_success();
}
function tspt_clone_callback() {
	if (!isset($_POST['tspt_id']) || !isset($_POST['tspt_nonce']) || sanitize_text_field(wp_unslash($_POST['tspt_nonce'])) === '' || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tspt_nonce'])), 'tspt_nonce_field')) {
		wp_send_json_error();
	}
	global $wpdb;
	$tspt_id = sanitize_text_field(wp_unslash($_POST['tspt_id']));
	$tspt_ids_table = esc_sql($wpdb->prefix . "totalsoft_ptable_id");
	$tspt_manager_table = esc_sql($wpdb->prefix . "totalsoft_ptable_manager");
	$tspt_cols_table = esc_sql($wpdb->prefix . "totalsoft_ptable_cols");
	$tspt_get_manager = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tspt_manager_table WHERE id = %d  ORDER BY id", $tspt_id), ARRAY_A);
	if (is_array($tspt_get_manager)) {
		$wpdb->query($wpdb->prepare("INSERT INTO $tspt_manager_table (id, Total_Soft_PTable_Title, Total_Soft_PTable_Them, Total_Soft_PTable_Cols_Count, Total_Soft_PTable_M_01, Total_Soft_PTable_M_02) VALUES (%d, %s, %s, %s, %s, %s)", '', $tspt_get_manager['Total_Soft_PTable_Title'], $tspt_get_manager['Total_Soft_PTable_Them'], $tspt_get_manager['Total_Soft_PTable_Cols_Count'], $tspt_get_manager['Total_Soft_PTable_M_01'], $tspt_get_manager['Total_Soft_PTable_M_02']));
		$tspt_insert_id = $wpdb->insert_id;
		$wpdb->query($wpdb->prepare("INSERT INTO $tspt_ids_table (id, PTable_ID) VALUES (%d, %s)", '', $tspt_insert_id));
		$tspt_get_cols = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_cols_table WHERE PTable_ID = %s ORDER BY id", $tspt_id),ARRAY_A);
		if (is_array($tspt_get_cols) && count($tspt_get_cols) > 0) {
			foreach ($tspt_get_cols as $tspt_get_col) {
				$wpdb->query($wpdb->prepare("INSERT INTO $tspt_cols_table (id, PTable_ID, TS_PTable_TSetting, TS_PTable_TText, TS_PTable_TIcon, TS_PTable_PCur, TS_PTable_PVal, TS_PTable_PPlan, TS_PTable_FCount, TS_PTable_BText, TS_PTable_BIcon, TS_PTable_BLink, TS_PTable_FIcon, TS_PTable_FText, TS_PTable_C_01) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $tspt_insert_id, $tspt_get_col['TS_PTable_TSetting'], $tspt_get_col['TS_PTable_TText'], $tspt_get_col['TS_PTable_TIcon'], $tspt_get_col['TS_PTable_PCur'], $tspt_get_col['TS_PTable_PVal'], $tspt_get_col['TS_PTable_PPlan'], $tspt_get_col['TS_PTable_FCount'], $tspt_get_col['TS_PTable_BText'], $tspt_get_col['TS_PTable_BIcon'], $tspt_get_col['TS_PTable_BLink'], $tspt_get_col['TS_PTable_FIcon'], $tspt_get_col['TS_PTable_FText'], $tspt_get_col['TS_PTable_C_01']));
			}
		}
		wp_send_json_success();
	}
	wp_send_json_error();
}
function tspt_edit_callback() {
	if (!isset($_POST['tspt_id']) || !isset($_POST['tspt_nonce']) || sanitize_text_field(wp_unslash($_POST['tspt_nonce'])) === '' || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tspt_nonce'])), 'tspt_nonce_field')) {
		wp_send_json_error();
	}
	global $wpdb;
	$tspt_manager_table = esc_sql($wpdb->prefix . "totalsoft_ptable_manager");
	$tspt_cols_table = esc_sql($wpdb->prefix . "totalsoft_ptable_cols");
	$tspt_id = sanitize_text_field(wp_unslash($_POST['tspt_id']));
	$tspt_get_manager = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tspt_manager_table WHERE id = %d  ORDER BY id", $tspt_id), ARRAY_A);
	if (is_array($tspt_get_manager)) {
		$tspt_get_cols = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_cols_table WHERE PTable_ID = %s ORDER BY id", $tspt_id),ARRAY_A);
		if (is_array($tspt_get_cols) && count($tspt_get_cols) > 0) {
			foreach ($tspt_get_cols as $key => $value) {
				$tspt_get_cols[$key]['TS_PTable_TText'] = html_entity_decode(esc_js($value['TS_PTable_TText']));
				$tspt_get_cols[$key]['TS_PTable_BText'] = html_entity_decode(esc_js($value['TS_PTable_BText']));
				$tspt_get_cols[$key]['TS_PTable_FText'] = html_entity_decode(esc_js($value['TS_PTable_FText']));
			}
		}
		wp_send_json_success(
			array(
				'manager' => $tspt_get_manager,
				'cols' => $tspt_get_cols
			)
		);
	}
	wp_send_json_error();
}
function tspt_edit_theme_callback() {
	if (!isset($_POST['tspt_type']) || !isset($_POST['tspt_nonce']) || sanitize_text_field(wp_unslash($_POST['tspt_nonce'])) === '' || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tspt_nonce'])), 'tspt_nonce_field')) {
		wp_send_json_error();
	}
	global $wpdb;
	$tspt_type = sanitize_text_field(wp_unslash($_POST['tspt_type']));
	$tspt_settings_table = esc_sql($wpdb->prefix . "totalsoft_ptable_sets");
	$tspt_get_settings = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_settings_table WHERE TS_PTable_TType = %s ORDER BY id", $tspt_type),ARRAY_A);
	if (is_array($tspt_get_settings) && count($tspt_get_settings) > 0) {
		wp_send_json_success($tspt_get_settings);
	}
	wp_send_json_error();
}
?>