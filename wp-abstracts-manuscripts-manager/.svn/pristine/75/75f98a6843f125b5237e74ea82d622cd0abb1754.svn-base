<?php
defined('ABSPATH') or die("ERROR: You do not have permission to access this page");

if (!class_exists('WPAbstract_Abstracts_Table')) {
	require_once(apply_filters('wpabstracts_page_include', WPABSTRACTS_PLUGIN_DIR . 'inc/wpabstracts_classes.php'));
}

if (is_admin() && isset($_GET['tab']) && $_GET["tab"] == "abstracts" && isset($_GET['subtab']) && $_GET["subtab"] == "attachments") {
	if (isset($_GET["task"]) && $_GET["task"]) {

		$task = sanitize_text_field($_GET["task"]);

		switch ($task) {
			case 'delete':
				wpabstracts_delete_attachment(intval($_GET['id']), true);
				wpabstracts_show_attachments();
				break;
			case 'bulk_delete':
				wpabstracts_delete_attachments();
			default:
				if (has_action('wpabstracts_page_render')) {
					do_action('wpabstracts_page_render');
				} else {
					wpabstracts_show_attachments();
				}
		}
	} else {
		wpabstracts_show_attachments();
	}
}

function wpabstracts_delete_attachments()
{
	if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], WPABSTRACTS_SECRET_KEY)) {
		wpabstracts_show_message(__('Unable to process your request. Please reload the page and try again.', 'wpabstracts'), 'alert-danger');
		return;
	}
	global $wpdb;
	$wpdb->show_errors();
	$atts_ids = isset($_POST['atts_id']) && is_array($_POST['atts_id'])
		? array_map('intval', $_POST['atts_id'])
		: [];
	foreach ($atts_ids as $id) {
		$wpdb->delete("{$wpdb->prefix}wpabstracts_attachments", ['attachment_id' => $id], ['%d']);
	}
	wpabstracts_show_message("The selected attachments were successfully deleted", 'alert-success');
}

function wpabstracts_show_attachments()
{ ?>
	<div class="wpabstracts container-fluid wpabstracts-admin-container">
		<h3><?php echo apply_filters('wpabstracts_title_filter', __('Attachments', 'wpabstracts'), 'abstracts'); ?></h3>
	</div>
	<form id="showAttachments" method="get">
		<input type="hidden" name="page" value="wpabstracts" />
		<input type="hidden" name="tab" value="abstracts" />
		<input type="hidden" name="subtab" value="attachments" />
		<?php
		$attachments = new WPAbstract_Attachments_Table();
		$attachments->prepare_items();
		$attachments->display();
		?>
	</form>
	<script>
		jQuery(document).ready(function() {

			var atts_count = '<?php echo count($attachments->items); ?>';

			if (atts_count > 0) {

				var table = jQuery('.wp-list-table').DataTable({
					responsive: false,
					dom: 'Bfrltip',
					buttons: [],
					colReorder: false
				});

				// event filter
				table.column('.column-event').every(function() {
					var column = this;
					var select = jQuery('<select />').appendTo(jQuery('.dt-buttons')).on('change', function() {
						jQuery('#wpa_topics').val('');
						column.search(jQuery(this).val()).draw();
					}).append(jQuery('<option value="">Filter by Event</option>')).attr('id', 'wpa_events');
					column.data('search').sort().unique().each(function(val) {
						select.append(jQuery('<option value="' + val + '">' + val + '</option>'));
					});
				});

				// topic filter
				table.column('.column-topic').every(function() {
					var column = this;
					var select = jQuery('<select />').appendTo(jQuery('.dt-buttons')).on('change', function() {
						column.search(jQuery(this).val()).draw();
					}).append(jQuery('<option value="">Filter by Topic</option>')).attr('id', 'wpa_topics');
					column.data('search').sort().unique().each(function(val) {
						select.append(jQuery('<option value="' + val + '">' + val + '</option>'));
					});
				});

				// Filter by File Type
				table.column('.column-filetype').every(function() {
					var column = this;
					var select = jQuery('<select />').appendTo(jQuery('.dt-buttons')).on('change', function() {
						column.search(jQuery(this).val()).draw();
					}).append(jQuery('<option value="">Filter by File Type</option>')).attr('id', 'wpa_filetype');
					column.data('search').sort().unique().each(function(val) {
						select.append(jQuery('<option value="' + val + '">' + val + '</option>'));
					});
				});
			}

			jQuery('#doaction, #doaction2').on('click', function(event) {
				event.preventDefault();
				var atts_ids = jQuery('input[name="attachment\\[\\]"]:checked').map(function() {
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
						wpabstracts_delete_attachments(atts_ids);
						break;
					default:
						jQuery("#showAttachments").submit();

				}
			});

		});
	</script>
<?php
}
