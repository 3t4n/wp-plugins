<?php
 

function click_n_chat_update_lead_list_export_action_handler() {  
	global $wpdb;
	
	if ( ! function_exists( 'wp_filesystem' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    global $wp_filesystem;
    if ( ! WP_Filesystem() ) {
        return;
    }

    $upload_dir = wp_upload_dir();
    $file_path = $upload_dir['path'] . '/exported_lead_data.csv';
	
	$where = "WHERE 1=1";
    if (!empty($_GET['name'])) {
        $where .= $wpdb->prepare(" AND name LIKE %s", '%' . $wpdb->esc_like($_GET['name']) . '%');
    }
    if (!empty($_GET['email'])) {
        $where .= $wpdb->prepare(" AND email LIKE %s", '%' . $wpdb->esc_like($_GET['email']) . '%');
    }
    if (!empty($_GET['phone'])) {
        $where .= $wpdb->prepare(" AND phone LIKE %s", '%' . $wpdb->esc_like($_GET['phone']) . '%');
    }
	if (!empty($_GET['date'])) {
        $where .= $wpdb->prepare(" AND date(created_at) = %s", esc_attr($_GET['date']));
    }


	$results = $wpdb->get_results("SELECT name, email, phone, created_at FROM {$wpdb->prefix}cnc_leads $where", ARRAY_A);
	
    $csv_output = '';
    foreach ( $results as $row ) {
        $csv_output .= implode(',', $row) . "\n";
    }

    $wp_filesystem->put_contents($file_path, $csv_output, FS_CHMOD_FILE);

    if (file_exists($file_path)) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="exported_data.csv"');
        header('Content-Length: ' . filesize($file_path));

        echo esc_html($wp_filesystem->get_contents($file_path));

        $wp_filesystem->delete($file_path);
        
        exit;
    } else {
        echo 'File not found!';
    }
 
}  
add_action('wp_ajax_click_n_chat_update_lead_list_export_action', 'click_n_chat_update_lead_list_export_action_handler');  
add_action('wp_ajax_nopriv_click_n_chat_update_lead_list_export_action', 'click_n_chat_update_lead_list_export_action_handler'); // For non-logged in users  
