<?php
global $wpdb;

if (isset($_GET['get_auth']) && $_GET['get_auth'] == 'success') {
	$ghl_access_token 	= sanitize_text_field($_GET['atn']);
	$ghl_refresh_token 	= sanitize_text_field($_GET['rtn']);
	$ghl_locationId 	= sanitize_text_field($_GET['lid']);
	$ghl_clnt_id 		= sanitize_text_field($_GET['cid']);
	$ghl_clnt_scrt 	= sanitize_text_field($_GET['cst']);
	$hours = 20 * 60 * 60;
	// Save data
	update_option('ghl_clnt_id', $ghl_clnt_id);
	update_option('ghl_clnt_scrt', $ghl_clnt_scrt);
	
	$table_name = $wpdb->base_prefix . "ghlex_subaccount";
	$existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE Location_id = %s", $ghl_locationId));

	if ($existing_row) {
		
		$result = $wpdb->update(
			$table_name,
			array(
				'Location_id' => $ghl_locationId,
				'Location_name' => ghl_location_name($ghl_locationId, $ghl_access_token)->name,
				'Location_acc_tok' => $ghl_access_token,
				'Location_ref_tok' => $ghl_refresh_token,
				'Location_tok_expire' => time() + $hours

			),
			array('id' => $existing_row->id), // Update based on the existing row's id
			array('%s', '%s', '%s', '%s', '%s'),
			array('%d') // Where clause data format
		);
	} else {
		
		$result_new = $wpdb->insert(
			$table_name,
			array(
				'Location_id' => $ghl_locationId,
				'Location_name' => ghl_location_name($ghl_locationId, $ghl_access_token)->name,
				'Location_acc_tok' => $ghl_access_token,
				'Location_ref_tok' => $ghl_refresh_token,
				'Location_tok_expire' => time() + $hours
			),
			array('%s', '%s', '%s', '%s', '%s')
		);
	}

	wp_redirect('admin.php?page=ghl_for_gf&tab=cwghl');
}

$ghl_location_connected	= get_option('ghl_location_connected', GHL_LOCATION_CONNECTED);
$ghl_clnt_id 			= get_option('ghl_clnt_id');
$ghl_clnt_scrt 		    = get_option('ghl_clnt_scrt');
// $ghl_locationId 		= get_option( 'ghl_locationId' );
$redirect_page 			= urlencode(admin_url('admin.php?page=ghl_for_gf&tab=cwghl'));
$redirect_uri 		    = get_site_url();
$client_id_and_secret   = '';

$auth_end_point = AUTH_END_POINT_FOR_GHL;
$scopes = "workflows.readonly calendars.readonly calendars.write calendars/events.readonly calendars/events.write contacts.readonly contacts.write campaigns.readonly conversations/message.readonly conversations/message.write forms.readonly locations.readonly locations/customValues.readonly locations/customValues.write locations/customFields.readonly locations/customFields.write opportunities.readonly opportunities.write users.readonly links.readonly links.write surveys.readonly users.write locations/tasks.readonly locations/tasks.write locations/tags.readonly locations/tags.write locations/templates.readonly calendars.write calendars/groups.readonly calendars/groups.write forms.write medias.readonly medias.write";

$connect_url = AUTH_URL_FOR_GHL . "?get_code=1&redirect_page={$redirect_page}";

// if (!empty($ghl_clnt_id) && !str_contains($ghl_clnt_id, 'lscrr1cr')) {

// 	$connect_url = $auth_end_point . "?response_type=code&redirect_uri={$redirect_uri}&client_id={$ghl_clnt_id}&scope={$scopes}";
// }

?>

<div id="ib-ghlfree">
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row">
                    <label> <?php esc_html_e('Connect GHL Subaccount', 'ghl-gf-extension'); ?> </label>
                </th>
                <td>
                    <div class="not-connected-location">
                        <a class="button button-connect connect-btn" href="<?php echo esc_url($connect_url); ?>">Connect
                            Your Location</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr />
    <div class="action-box">
        <?php
    // Fetch all stored location IDs
    global $wpdb;
	$table_name = $wpdb->base_prefix . "ghlex_subaccount";
    $location_ids = $wpdb->get_results("SELECT Location_id, Location_name FROM $table_name");

    // Display the section with fetched location IDs in a table
    if ($location_ids) {
    ?>
        <table id="location-table" class="wp-list-table widefat fixed striped ">
            <thead>
                <tr>
                    <th scope="col" class="manage-column"><?php esc_html_e('Location Name', 'ghl'); ?></th>
                    <th scope="col" class="manage-column"><?php esc_html_e('Location ID', 'ghl'); ?></th>
                    <th scope="col" class="manage-column"><?php esc_html_e('Action', 'ghl'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($location_ids as $option_name) { ?>
                <tr>
                    <td><?php echo esc_html($option_name->Location_name); ?></td>
                    <td><?php echo esc_html($option_name->Location_id); ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="deleteLocationId"
                                value="<?php echo esc_attr($option_name->Location_id); ?>">
                            <button type="submit"
                                class="button button-primary del"><?php esc_html_e('Delete', 'ghl'); ?></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>



</div>


<?php
global $wpdb;


// Handle the delete action
if (isset($_POST['deleteLocationId'])) {
	$location_id_to_delete = sanitize_text_field($_POST['deleteLocationId']);
	
	$table_name = $wpdb->base_prefix . "ghlex_subaccount";
	$table_name_map = $wpdb->prefix . "ghlexform_mapping";

	// Fetch the ID corresponding to the provided Location_id
	$id_to_delete = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Location_id = %s", $location_id_to_delete));
	

    //delete from the location map table.
	$loc_map = "SELECT * FROM $table_name_map";
	$results = $wpdb->get_results($loc_map);
	foreach($results as $result){
		if($result->form_option_value == $location_id_to_delete){
			$wpdb->delete(
				$table_name_map,
				array('id' => $result->id),
				array('%d')
			);
			
		}
	}


   //delete from ghlexsubaccount.
	if ($id_to_delete) {
		// Delete the row with the fetched ID
		$result = $wpdb->delete(
			$table_name,
			array('id' => $id_to_delete),
			array('%d')
		);
	}

	//redirect tho the main setting page.
	wp_redirect('admin.php?page=ghl_for_gf&tab=cwghl');
}



?>