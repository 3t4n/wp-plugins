<?php 
if ( !defined('ABSPATH') ) exit; // direct access disabled

/**
 * 
 * Admin side analytics
 */

function fnc__analytics_enqueue_scripts($hook) {
    
    // Load scripts only on our custom analytics page
    if ($hook !== 'cpt_events_page_wp_event_booking_analytics') {
        return;
    }
    
    wp_enqueue_style('wpeb-analytics-css', WPEB_URL . 'src/css/analytics.css', array(), WPEB_VERSION, 'all');
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('dataTables-css', WPEB_URL . 'src/css/datatables.min.css');
    wp_enqueue_script('dataTables-js', WPEB_URL . 'src/js/datatables.min.js', array('jquery'), null, true);

    wp_enqueue_script('chart-js', WPEB_URL . 'src/js/chart.min.js', array('jquery'), null, true);

    // Enqueue jQuery UI for date pickers
    
    wp_enqueue_style('jquery-ui-css', WPEB_URL . 'src/css/jquery-ui.css', array(), WPEB_VERSION, 'all');

}
add_action('admin_enqueue_scripts', 'fnc__analytics_enqueue_scripts');


/* Create new menu item to settings page */
add_action('admin_menu', 'fnc_event_booking_analytics_page');
function fnc_event_booking_analytics_page() {

	$current_user = wp_get_current_user();
    // Check if the current user has the 'supplier' role
    if (!in_array('supplier', $current_user->roles)) {
		add_submenu_page('edit.php?post_type=cpt_events', esc_html__('Analytics', 'wp_event_booking'), esc_html__('Analytics', 'wp_event_booking'), 'edit_posts', 'wp_event_booking_analytics', 'fnc_wp_event_booking_analytics', 8);
	}
}

function fnc_wp_event_booking_analytics() {
	// compact('competition');
	$active_tab = '';
	if (isset($_GET['tab'])) {
		$active_tab = sanitize_text_field(wp_unslash($_GET['tab']));
	}
	?>
	<div class="wrap">
		<?php 
		do_action('wpeb_analytics_menu', $active_tab);
		do_action('wpeb_analytics_content', $active_tab);
		?>
	</div>
<?php
}

add_action('wpeb_analytics_menu', 'fnc_wpeb_analytics_menu');

function fnc_wpeb_analytics_menu($active_tab) {
	?>
<h2 class="nav-tab-wrapper">
	<?php do_action('wpeb_analytics_menu_item', $active_tab);?>
</h2>
<?php
}

add_action('wpeb_analytics_menu_item', 'fnc_wpeb_analytics_overview_menu_item');
function fnc_wpeb_analytics_overview_menu_item($active_tab) {?>
<a href="?post_type=cpt_events&page=wp_event_booking_analytics" class="nav-tab <?php echo esc_html($active_tab) == '' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Overview', 'wp_event_booking');?></a>
<?php }

add_action('wpeb_analytics_menu_item', 'fnc_wpeb_analytics_event_menu_item');
function fnc_wpeb_analytics_event_menu_item($active_tab) {?>
<a href="?post_type=cpt_events&page=wp_event_booking_analytics&tab=monthly" class="nav-tab <?php echo esc_html($active_tab) == 'monthly' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Monthly', 'wp_event_booking');?></a>
<?php }


/**
 * Initial queries
 */
function fnc_wpeb_analytics_intial_query($start_date, $end_date){
	global $wpdb;

	// all time total ckicks signup + more detail
	$total_clicks = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('sign_up','more_detail') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time sign up clicks
	$total_signup_clicks = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('sign_up') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time more detail clicks
	$total_more_detail_clicks = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('more_detail') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time event created by public form
	$total_public_events = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('public_form') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time event created by public form
	$total_published_events = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('event_publish') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	return [
		'total_clicks'             => $total_clicks,
		'total_signup_clicks'      => $total_signup_clicks,
		'total_more_detail_clicks' => $total_more_detail_clicks,
		'total_public_events'      => $total_public_events,
		'total_published_events'   => $total_published_events,
	];

}

/**
 * Overview tab
 */
add_action('wpeb_analytics_content', 'fnc_wpeb_analytics_overview_content');
function fnc_wpeb_analytics_overview_content($active_tab) {
	global $wpdb;
	if (empty($active_tab)) {

		$start_date = (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
		$end_date = (new DateTime('today'))->format('Y-m-d');
		if(isset($_GET['start-date']) && isset($_GET['end-date'])){
			$start_date = sanitize_text_field(wp_unslash($_GET['start-date']));
			$end_date = sanitize_text_field(wp_unslash($_GET['end-date']));
		}

		$initial_data = fnc_wpeb_analytics_intial_query($start_date, $end_date);
		extract($initial_data);

		$general_template = WPEB_DIR . 'admin/templates/analytics-overview.php';
		require_once $general_template;
	}
}

/**
 * Monthly tab
 */
add_action('wpeb_analytics_content', 'fnc_wpeb_analytics_events_content');
function fnc_wpeb_analytics_events_content($active_tab) {
	if ($active_tab == 'monthly') {

		$start_date = (new DateTime('first day of -6 months'))->format('Y-m-d');
		$end_date = (new DateTime('today'))->format('Y-m-d');
		if(isset($_GET['start-date']) && isset($_GET['end-date'])){
			$start_date = sanitize_text_field(wp_unslash($_GET['start-date']));
			$end_date = sanitize_text_field(wp_unslash($_GET['end-date']));
		}

		$initial_data = fnc_wpeb_analytics_intial_query($start_date, $end_date);
		extract($initial_data);

		$general_template = WPEB_DIR . 'admin/templates/analytics-monthly.php';
		require_once $general_template;
	}
}


/**
 * 
 * Analytics functions
 */
add_action('wp_ajax_record_analytics_click', 'fnc_record_analytics_click_callback');
add_action('wp_ajax_nopriv_record_analytics_click', 'fnc_record_analytics_click_callback');
function fnc_record_analytics_click_callback() {

    $user_id = null;
    $current_user = wp_get_current_user();
    if($current_user)
    $user_id = $current_user->ID;

    fnc_save_analytics_data(sanitize_text_field(wp_unslash($_GET['event_id'])), $user_id, sanitize_text_field(wp_unslash($_GET['type'])));
}


/**
 * save analytics
 */
function fnc_save_analytics_data($event_id, $user_id, $type) {

    global $wpdb;

    // Define table name
    $table_name = $wpdb->prefix . 'wpeb_analytics';

    // Data to insert
    $data = array(
        'event_id'    => $event_id,
        'user_id'     => $user_id,
        'click_type'  => $type,
    );

    // Data format (optional, improves security)
    $format = array('%d', '%d', '%s');

    // Insert data into the table
    $wpdb->insert($table_name, $data, $format);
}


/**
 * Sign up data ajax request
 */
add_action('wp_ajax_fetch_analytics_dashboard_data', 'fnc_fetch_analytics_dashboard_data');
add_action('wp_ajax_nopriv_fetch_analytics_dashboard_data', 'fnc_fetch_analytics_dashboard_data');
function fnc_fetch_analytics_dashboard_data() {
    global $wpdb;

	// Dates
	$start_date = isset($_POST['start_date']) ? sanitize_text_field(wp_unslash($_POST['start_date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
    $end_date = isset($_POST['end_date']) ? sanitize_text_field(wp_unslash($_POST['end_date'])) : (new DateTime('today'))->format('Y-m-d');
	
	// all time total ckicks signup + more detail
	$total_clicks = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('sign_up','more_detail') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time sign up clicks
	$signup_clicks = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('sign_up') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time more detail clicks
	$more_detail_clicks = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('more_detail') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time event created by public form
	$public_events = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('public_form') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

	// all time event created by public form
	$published_events = $wpdb->get_row($wpdb->prepare(
		"SELECT count(*) as count FROM {$wpdb->prefix}wpeb_analytics WHERE click_type IN ('event_publish') AND DATE(created_at) BETWEEN %s AND %s",
		$start_date, $end_date
	), ARRAY_A);

    // Prepare the data in the format DataTables expects
    $response = [
        "total_clicks" => $total_clicks['count'],
        "signup_clicks" => $signup_clicks['count'],
        "more_detail_clicks" => $more_detail_clicks['count'],
        "public_events" => $public_events['count'],
        "published_events" => $published_events['count'],
    ];

    // Send the JSON response
    wp_send_json($response);
}

/**
 * Sign up data ajax request
 */
add_action('wp_ajax_fetch_analytics_data_by_date', 'fnc_fetch_analytics_data_by_date');
add_action('wp_ajax_nopriv_fetch_analytics_data_by_date', 'fnc_fetch_analytics_data_by_date');
function fnc_fetch_analytics_data_by_date() {
    global $wpdb;

    // DataTables server-side pagination parameters
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $offset = isset($_POST['start']) ? intval($_POST['start']) : 0;

    // Sorting
    // $order_column_index = $_POST['order'][0]['column'];
    // $order_column = $_POST['columns'][$order_column_index]['data'];
    // $order_dir = $_POST['order'][0]['dir'];

	// Dates
	$start_date = isset($_POST['start_date']) ? sanitize_text_field(wp_unslash($_POST['start_date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
    $end_date = isset($_POST['end_date']) ? sanitize_text_field(wp_unslash($_POST['end_date'])) : (new DateTime('today'))->format('Y-m-d');

    $click_type = isset($_POST['click_type']) ? sanitize_text_field(wp_unslash($_POST['click_type'])) : '';
	

	// Total number of records 
	$total_records = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(DISTINCT DATE(created_at)) FROM {$wpdb->prefix}wpeb_analytics WHERE click_type = %s AND DATE(created_at) BETWEEN %s AND %s",
        $click_type, $start_date, $end_date
    ));

    // Fetch the data with pagination
    $data = $wpdb->get_results($wpdb->prepare(
        "SELECT DATE_FORMAT(created_at, '%%b %%d, %%Y') as dated, COUNT(*) as count
        FROM {$wpdb->prefix}wpeb_analytics 
        WHERE click_type = %s AND DATE(created_at) BETWEEN %s AND %s 
        GROUP BY dated 
        ORDER BY created_at DESC 
        LIMIT %d OFFSET %d",
        $click_type, $start_date, $end_date, $limit, $offset
    ), ARRAY_A);

    // Prepare the data in the format DataTables expects
    $response = [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
        "recordsTotal" => $total_records,
        "recordsFiltered" => $total_records,  // You can adjust this if filtering is implemented
        "data" => $data,
    ];

    // Send the JSON response
    wp_send_json($response);
}

/**
 * More details data ajax request
 */
add_action('wp_ajax_fetch_analytics_data_by_event', 'fnc_fetch_analytics_data_by_event');
add_action('wp_ajax_nopriv_fetch_analytics_data_by_event', 'fnc_fetch_analytics_data_by_event');
function fnc_fetch_analytics_data_by_event() {
    global $wpdb;

    // DataTables server-side pagination parameters
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $offset = isset($_POST['start']) ? intval($_POST['start']) : 0;

	// Dates
	$start_date = isset($_POST['start_date']) ? sanitize_text_field(wp_unslash($_POST['start_date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
    $end_date = isset($_POST['end_date']) ? sanitize_text_field(wp_unslash($_POST['end_date'])) : (new DateTime('today'))->format('Y-m-d');
	
	$click_type = isset($_POST['click_type']) ? sanitize_text_field(wp_unslash($_POST['click_type'])) : '';

	// Total number of records 
	$total_records = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(DISTINCT event_id) FROM {$wpdb->prefix}wpeb_analytics WHERE click_type = %s AND DATE(created_at) BETWEEN %s AND %s",
        $click_type, $start_date, $end_date
    ));

    // Fetch the data with pagination
    $data = $wpdb->get_results($wpdb->prepare(
        "SELECT DATE_FORMAT(t.created_at, '%%b %%d, %%Y') as dated, COUNT(*) as count, p.post_title
        FROM {$wpdb->prefix}wpeb_analytics t
		JOIN {$wpdb->prefix}posts p ON t.event_id = p.ID
        WHERE t.click_type = %s AND DATE(t.created_at) BETWEEN %s AND %s 
        GROUP BY t.event_id 
        ORDER BY created_at DESC 
        LIMIT %d OFFSET %d",
        $click_type, $start_date, $end_date, $limit, $offset
    ), ARRAY_A);

    // Prepare the data in the format DataTables expects
    $response = [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
        "recordsTotal" => $total_records,
        "recordsFiltered" => $total_records,  // You can adjust this if filtering is implemented
        "data" => $data,
    ];

    // Send the JSON response
    wp_send_json($response);
}

/**
 * Sign up data ajax request
 */
add_action('wp_ajax_fetch_analytics_data_monthly', 'fnc_fetch_analytics_data_monthly');
add_action('wp_ajax_nopriv_fetch_analytics_data_monthly', 'fnc_fetch_analytics_data_monthly');
function fnc_fetch_analytics_data_monthly() {
    global $wpdb;

    // DataTables server-side pagination parameters
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $offset = isset($_POST['start']) ? intval($_POST['start']) : 0;

	// Dates
	$start_date = isset($_POST['start_date']) ? sanitize_text_field(wp_unslash($_POST['start_date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
    $end_date = isset($_POST['end_date']) ? sanitize_text_field(wp_unslash($_POST['end_date'])) : (new DateTime('today'))->format('Y-m-d');

    $click_type = isset($_POST['click_type']) ? sanitize_text_field(wp_unslash($_POST['click_type'])) : '';
	

	// Total number of records 
	$total_records = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(DISTINCT DATE_FORMAT(created_at, '%%M %%Y')) FROM {$wpdb->prefix}wpeb_analytics WHERE click_type = %s AND DATE(created_at) BETWEEN %s AND %s",
        $click_type, $start_date, $end_date
    ));

	$data = $wpdb->get_results($wpdb->prepare(
		"SELECT DATE_FORMAT(created_at, '%%M %%Y') as month, COUNT(id) as count 
		FROM {$wpdb->prefix}wpeb_analytics 
		WHERE click_type = %s 
		AND DATE(created_at) BETWEEN %s AND %s 
		GROUP BY YEAR(created_at), MONTH(created_at)
		ORDER BY YEAR(created_at) DESC, MONTH(created_at) DESC
        LIMIT %d OFFSET %d",
		$click_type, $start_date, $end_date, $limit, $offset
	), ARRAY_A);

    // Prepare the data in the format DataTables expects
    $response = [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
        "recordsTotal" => $total_records,
        "recordsFiltered" => $total_records,  // You can adjust this if filtering is implemented
        "data" => $data,
    ];

    // Send the JSON response
    wp_send_json($response);
}

/**
 * More details data ajax request
 */
add_action('wp_ajax_fetch_analytics_data_by_event_monthly', 'fnc_fetch_analytics_data_by_event_monthly');
add_action('wp_ajax_nopriv_fetch_analytics_data_by_event_monthly', 'fnc_fetch_analytics_data_by_event_monthly');
function fnc_fetch_analytics_data_by_event_monthly() {
    global $wpdb;

    // DataTables server-side pagination parameters
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $offset = isset($_POST['start']) ? intval($_POST['start']) : 0;

	// Dates
	$start_date = isset($_POST['start_date']) ? sanitize_text_field(wp_unslash($_POST['start_date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
    $end_date = isset($_POST['end_date']) ? sanitize_text_field(wp_unslash($_POST['end_date'])) : (new DateTime('today'))->format('Y-m-d');
	
	$click_type = isset($_POST['click_type']) ? sanitize_text_field(wp_unslash($_POST['click_type'])) : '';

	// Total number of records 
	$total_records = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(DISTINCT DATE_FORMAT(created_at, '%%M %%Y'), event_id) FROM {$wpdb->prefix}wpeb_analytics WHERE click_type = %s AND DATE(created_at) BETWEEN %s AND %s",
        $click_type, $start_date, $end_date
    ));

    // Fetch the data with pagination
	$data = $wpdb->get_results($wpdb->prepare(
		"SELECT DATE_FORMAT(t.created_at, '%%M %%Y') as month, COUNT(*) as count, p.post_title
		FROM {$wpdb->prefix}wpeb_analytics t
		JOIN {$wpdb->prefix}posts p ON t.event_id = p.ID
        WHERE t.click_type = %s AND DATE(t.created_at) BETWEEN %s AND %s 
		GROUP BY month, t.event_id
		ORDER BY YEAR(created_at) DESC, MONTH(created_at) DESC
        LIMIT %d OFFSET %d",
		$click_type, $start_date, $end_date, $limit, $offset
	), ARRAY_A);

    // Prepare the data in the format DataTables expects
    $response = [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
        "recordsTotal" => $total_records,
        "recordsFiltered" => $total_records,  // You can adjust this if filtering is implemented
        "data" => $data,
    ];

    // Send the JSON response
    wp_send_json($response);
}

/**
 * More details data ajax request
 */
add_action('wp_ajax_fetch_analytics_data_in_dated_chart', 'fnc_fetch_analytics_data_in_dated_chart');
add_action('wp_ajax_nopriv_fetch_analytics_data_in_dated_chart', 'fnc_fetch_analytics_data_in_dated_chart');
function fnc_fetch_analytics_data_in_dated_chart() {
    global $wpdb;

    // DataTables server-side pagination parameters
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 100;
    $offset = isset($_POST['start']) ? intval($_POST['start']) : 0;

	// Dates
	$start_date = isset($_POST['start_date']) ? sanitize_text_field(wp_unslash($_POST['start_date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
    $end_date = isset($_POST['end_date']) ? sanitize_text_field(wp_unslash($_POST['end_date'])) : (new DateTime('today'))->format('Y-m-d');
	
	$click_type = isset($_POST['click_type']) ? sanitize_text_field(wp_unslash($_POST['click_type'])) : '';

    
    // Total number of records 
	$total_records = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(DISTINCT event_id) FROM {$wpdb->prefix}wpeb_analytics WHERE click_type = %s AND DATE(created_at) BETWEEN %s AND %s",
        $click_type, $start_date, $end_date
    ));

    // Fetch the data with pagination
    $data = $wpdb->get_results($wpdb->prepare(
        "SELECT DATE_FORMAT(t.created_at, '%%b %%d, %%Y') as dated, COUNT(*) as count, p.post_title
        FROM {$wpdb->prefix}wpeb_analytics t
		JOIN {$wpdb->prefix}posts p ON t.event_id = p.ID
        WHERE t.click_type = %s AND DATE(t.created_at) BETWEEN %s AND %s 
        GROUP BY t.event_id 
        ORDER BY t.created_at ASC 
        LIMIT %d OFFSET %d",
        $click_type, $start_date, $end_date, $limit, $offset
    ), ARRAY_A);

    // Prepare the data in the format DataTables expects
    $response = [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
        "recordsTotal" => $total_records,
        "recordsFiltered" => $total_records,  // You can adjust this if filtering is implemented
        "data" => $data,
    ];

    // Send the JSON response
    wp_send_json($response);
}

/**
 * More details data ajax request
 */
add_action('wp_ajax_fetch_analytics_data_in_monthly_chart', 'fnc_fetch_analytics_data_in_monthly_chart');
add_action('wp_ajax_nopriv_fetch_analytics_data_in_monthly_chart', 'fnc_fetch_analytics_data_in_monthly_chart');
function fnc_fetch_analytics_data_in_monthly_chart() {
    global $wpdb;

    // DataTables server-side pagination parameters
    $limit = isset($_POST['length']) ? intval($_POST['length']) : 100;
    $offset = isset($_POST['start']) ? intval($_POST['start']) : 0;

	// Dates
	$start_date = isset($_POST['start_date']) ? sanitize_text_field(wp_unslash($_POST['start_date'])) : (new DateTime('today'))->modify('-30 days')->format('Y-m-d');
    $end_date = isset($_POST['end_date']) ? sanitize_text_field(wp_unslash($_POST['end_date'])) : (new DateTime('today'))->format('Y-m-d');
	
	$click_type = isset($_POST['click_type']) ? sanitize_text_field(wp_unslash($_POST['click_type'])) : '';

	// Total number of records
	$total_records = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(DISTINCT DATE_FORMAT(created_at, '%%M %%Y')) FROM {$wpdb->prefix}wpeb_analytics WHERE click_type = %s AND DATE(created_at) BETWEEN %s AND %s",
        $click_type, $start_date, $end_date
    ));

	$data = $wpdb->get_results($wpdb->prepare(
		"SELECT DATE_FORMAT(created_at, '%%M %%Y') as month, COUNT(id) as count 
		FROM {$wpdb->prefix}wpeb_analytics 
		WHERE click_type = %s 
		AND DATE(created_at) BETWEEN %s AND %s 
		GROUP BY YEAR(created_at), MONTH(created_at)
		ORDER BY YEAR(created_at) ASC, MONTH(created_at) ASC
        LIMIT %d OFFSET %d",
		$click_type, $start_date, $end_date, $limit, $offset
	), ARRAY_A);

    // Prepare the data in the format DataTables expects
    $response = [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
        "recordsTotal" => $total_records,
        "recordsFiltered" => $total_records,  // You can adjust this if filtering is implemented
        "data" => $data,
    ];

    // Send the JSON response
    wp_send_json($response);
}
