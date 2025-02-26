<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_update_lead_list_action_handler() {  
    
	if (!isset($_POST['security']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['security'])), 'ajax-call-nounce')) {
        wp_send_json_error('invalid nonce');
        wp_die();
    }
	
	global $wpdb;
    
    $page = intval($_POST['page']);
    $sort_by = sanitize_text_field($_POST['sort_by']);
    $sort_order = sanitize_text_field($_POST['sort_order']);
    $search = $_POST['search'];

    $per_page = 5;
    $offset = ($page - 1) * $per_page;

    $where = "WHERE 1=1";
    if (!empty($search['name'])) {
        $where .= $wpdb->prepare(" AND name LIKE %s", '%' . $wpdb->esc_like($search['name']) . '%');
    }
    if (!empty($search['email'])) {
        $where .= $wpdb->prepare(" AND email LIKE %s", '%' . $wpdb->esc_like($search['email']) . '%');
    }
    if (!empty($search['phone'])) {
        $where .= $wpdb->prepare(" AND phone LIKE %s", '%' . $wpdb->esc_like($search['phone']) . '%');
    }
	if (!empty($search['date'])) {
        $where .= $wpdb->prepare(" AND date(created_at) = %s", $search['date']);
    }

    $total_leads = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}cnc_leads $where");

    $results = $wpdb->get_results($wpdb->prepare(
        "SELECT name, email, phone, created_at FROM {$wpdb->prefix}cnc_leads $where ORDER BY $sort_by $sort_order LIMIT %d OFFSET %d",
        $per_page, $offset
    ));

    $table = '';
    foreach ($results as $row) {
        $table .= "<tr>
                        <td data-colname='Name'>{$row->name}</td>
                        <td data-colname='Email'>{$row->email}</td>
                        <td data-colname='Phone'>{$row->phone}</td>
						<td data-colname='Date'>{$row->created_at}</td>
                    </tr>";
    }

    $total_pages = ceil($total_leads / $per_page);
    $pagination = '';
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagination .= "<a href='#' class='page-link' data-page='$i'>$i</a> ";
    }

    wp_send_json(array(
        'table' => $table,
        'pagination' => $pagination
    ));
}  
add_action('wp_ajax_click_n_chat_update_lead_list_action', 'click_n_chat_update_lead_list_action_handler');  
add_action('wp_ajax_nopriv_click_n_chat_update_lead_list_action', 'click_n_chat_update_lead_list_action_handler'); // For non-logged in users  
