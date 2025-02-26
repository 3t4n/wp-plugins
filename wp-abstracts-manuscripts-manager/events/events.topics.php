<?php
defined('ABSPATH') or die("ERROR: You do not have permission to access this page");
if (!class_exists('WPAbstracts_Event_Topics')) {
	require_once(apply_filters('wpabstracts_page_include', WPABSTRACTS_PLUGIN_DIR . 'events/events.classes.php'));
}
if (!class_exists('WPAbstracts_Emailer')) {
	require_once(apply_filters('wpabstracts_page_include', WPABSTRACTS_PLUGIN_DIR . 'inc/wpabstracts_emailer.php'));
}
if ($_GET["subtab"] == "topics") {
	if (isset($_GET["task"])) {
		$task = $_GET["task"];
		switch ($task) {
			case 'new':
				wpabstracts_add_topic();
				break;
			case 'edit':
				wpabstracts_edit_topic(intval($_GET["id"]));
				break;
			case 'delete':
				wpabstracts_delete_topic(intval($_GET["id"]), true);
				break;
			case 'bulk_delete':
				wpabstracts_delete_topics();
			default:
				wpabstracts_show_topics();
				break;
		}
	} else {
		wpabstracts_show_topics();
	}
} else {
	echo "You do not have permission to view this page";
}

function wpabstracts_add_topic()
{
	global $wpdb;
	$tab = "?page=wpabstracts&tab=events&subtab=topics";
	if ($_POST) {
		$data = array(
			'name' => isset($_POST["name"]) ? sanitize_text_field($_POST["name"]) : '',
			'event_id' => isset($_POST["event_id"]) ? intval($_POST["event_id"]) : null,
		);
		$wpdb->show_errors();
		$wpdb->insert($wpdb->prefix . 'wpabstracts_topics', $data);
		wpabstracts_redirect($tab);
	} else {
		wpabstracts_get_add_view('topics', null);
	}
}

function wpabstracts_edit_topic($id)
{
	global $wpdb;
	$tab = "?page=wpabstracts&tab=events&subtab=topics";
	if ($_POST) {
		$data = array(
			'name' => isset($_POST["name"]) ? sanitize_text_field($_POST["name"]) : '',
			'event_id' => isset($_POST["event_id"]) ? intval($_POST["event_id"]) : null,
		);
		$where = array('topic_id' => $id);
		$wpdb->show_errors();
		$wpdb->update($wpdb->prefix . 'wpabstracts_topics', $data, $where);
		wpabstracts_redirect($tab);
	} else {
		echo wpabstracts_get_edit_view('topics', $id);
	}
}

function wpabstracts_delete_topic($id, $message)
{
	if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], WPABSTRACTS_SECRET_KEY)) {
		wpabstracts_show_message(__('Unable to process your request. Please reload the page and try again.', 'wpabstracts'), 'alert-danger');
		return;
	}
	global $wpdb;
	$wpdb->show_errors();
	$wpdb->query("DELETE from {$wpdb->prefix}wpabstracts_topics WHERE topic_id = " . intval($id));
	if ($message) {
		wpabstracts_show_message("Topic ID " . intval($id) . " was successfully deleted", 'alert-success');
	}
}

function wpabstracts_delete_topics()
{
	if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], WPABSTRACTS_SECRET_KEY)) {
		wpabstracts_show_message(__('Unable to process your request. Please reload the page and try again.', 'wpabstracts'), 'alert-danger');
		return;
	}
	global $wpdb;
	$wpdb->show_errors();
	$topic_ids = isset($_POST['topic_id']) && is_array($_POST['topic_id'])
		? array_map('intval', $_POST['topic_id'])
		: [];
	foreach ($topic_ids as $id) {
		$wpdb->delete("{$wpdb->prefix}wpabstracts_topics", ['topic_id' => $id], ['%d']);
	}
	wpabstracts_show_message("The selected topics were successfully deleted", 'alert-success');
}

function wpabstracts_show_topics()
{ ?>
	<div class="wpabstracts container-fluid wpabstracts-admin-container">
		<h3><?php echo apply_filters('wpabstracts_title_filter', __('Topics', 'wpabstracts'), 'topics'); ?> <a href="?page=wpabstracts&tab=events&subtab=topics&task=new" class="wpabstracts btn btn-primary" /><?php _e('Add New', 'wpabstracts'); ?></a></h3>
	</div>
	<form id="showsEvents" method="get">
		<input type="hidden" name="page" value="wpabstracts" />
		<input type="hidden" name="tab" value="events" />
		<input type="hidden" name="subtab" value="topics" />
		<?php
		$showEvents = new WPAbstracts_Event_Topics();
		$showEvents->prepare_items();
		$showEvents->display();
		wp_nonce_field('wpabstracts_delete_topics', '_wpnonce_bulk_delete_topics');
		?>
	</form>
	<script>
		jQuery(document).ready(function() {
			var table = jQuery('.wp-list-table').DataTable({
				"columnDefs": [{
					"targets": 0, // This refers to the first column (index starts at 0)
					"orderable": false // Disable sorting for this column
				}],
				"order": [] // Disable initial sorting by any column
			});
			const tableBody = document.querySelector('.wp-list-table tbody');

			if (tableBody) {
				new Sortable(tableBody, {
					animation: 150,
					handle: '.drag-handle', // Restrict dragging to the drag handle
					onEnd: function() {
						const rows = Array.from(tableBody.querySelectorAll('tr'));
						const order = rows.map(row => row.dataset.id);
						// Send updated order to the server
						jQuery.post(wpabstracts.ajaxurl, {
							action: 'reorder_topics',
							order: order,
							nonce: wpabstracts.nonce,
						}).done(function(response) {
							if (response.success) {
								alertify.customSuccess(wpabstracts.sort_success);
							} else {
								alertify.customError(wpabstracts.sort_error);
							}
						});
					},
				});
			}

			table.column('.column-event').every(function() {
				var column = this;
				var select = jQuery('<select />').appendTo(jQuery('.dt-buttons')).on('change', function() {
					jQuery('#wpa_topics').val('');
					column.search(jQuery(this).val()).draw();
				}).append(jQuery('<option value="">Filter by Event</option>')).attr('id', 'wpa_events').attr('name', 'wpa_events');
				column.data('search').sort().unique().each(function(val) {
					select.append(jQuery('<option value="' + val + '">' + val + '</option>'));
				});
			});


			jQuery('#doaction, #doaction2').on('click', function(event) {
				event.preventDefault();
				var topicIds = jQuery('input[name="topic\\[\\]"]:checked').map(function() {
					return jQuery(this).val();
				}).toArray();
				var action = -1;
				if (event.target.id == 'doaction') {
					action = jQuery('#bulk-action-selector-top').val();
				} else {
					action = jQuery('#bulk-action-selector-bottom').val();
				}
				switch (action) {
					case 'delete':
						wpabstracts_delete_topics(topicIds);
						break;
					default:
						jQuery("#showsEvents").submit();

				}
			});
		});
	</script>
<?php
}
