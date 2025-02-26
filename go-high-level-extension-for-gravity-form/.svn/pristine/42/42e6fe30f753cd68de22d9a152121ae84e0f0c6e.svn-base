<?php
global $wpdb;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $global_tag_msg = $global_loc_msg=false;
    $table_name = $wpdb->prefix . "ghlexform_mapping";
    if (isset($_POST['global_selected_location_id'])) {
       
        $global_selected_location_id  = sanitize_text_field($_POST['global_selected_location_id']);

        $existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE form_option_name = %s", 'ghl_global_locid'));

	if ($existing_row) {
		// Update the existing record
		$result = $wpdb->update(
			$table_name,
			array(
				'form_option_name' => 'ghl_global_locid',
				'form_option_value' => $global_selected_location_id
			),
			array('id' => $existing_row->id), 
			array('%s', '%s'),
			array('%d') 
		);
	}
    else{
        //update it ghlexform_mapping table.
        $result_new = $wpdb->insert(
			$table_name,
			array(
				'form_option_name' => 'ghl_global_locid',
				'form_option_value' => $global_selected_location_id
			),
			array('%s', '%s')
		);
    }
        
        $global_loc_msg=true;
    }
    if (isset($_POST['global_tags'])) {
       
        $new_global_tag = sanitize_text_field($_POST['global_tags']);

        //update it ghlexform_mapping table.
        $existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE form_option_name = %s", 'ghl_global_tag'));

        if ($existing_row) {
            // Update the existing record
            $result = $wpdb->update(
                $table_name,
                array(
                    'form_option_name' => 'ghl_global_tag',
                    'form_option_value' => $new_global_tag
                ),
                array('id' => $existing_row->id),
                array('%s', '%s'),
                array('%d') 
            );
        }
        else{
            //update it ghlexform_mapping table.
            $result_new = $wpdb->insert(
                $table_name,
                array(
                    'form_option_name' => 'ghl_global_tag',
                    'form_option_value' => $new_global_tag
                ),
                array('%s', '%s')
            );
        }
    
        
        $global_tag_msg = true;
    }

        // Check if global location message is true
    if ($global_loc_msg) {
        $final_msg = " Global Location updated successfully.";   
    }
    else{
    $final_msg = "Global Tags updated successfully.";
    }
    echo '<div class="notification--wrapper hide" id="openToast">
	<div class="notification--reminder ptb--20 text-center col-12">
		<h3>' . $final_msg . '<a class="exit--toast" href="javascript:void(0);">Got it.</a></h3>
	</div>    
</div>';
   
}
?>
<div class="gf-glob-set">
    <form method="POST" id="ghl-global-loc" class="ghl-form">

        <label for="global-selected-location-id">Choose Global GHL Location</label>
        <select name="global_selected_location_id" id="global-selected-location-id">
            <option value="">Select GHL Subaccount</option>';
            <?php

                // Fetch all stored location IDs
                global $wpdb;
                $selected_location_id='';
                $table_name = $wpdb->base_prefix . "ghlex_subaccount";
                $location_ids=	$wpdb->get_results("SELECT Location_id, Location_name FROM $table_name");
                $table_name_form=$wpdb->prefix . "ghlexform_mapping";
                $loc_id='ghl_global_locid';
                $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", $loc_id));
                 if($existing_row_loc ){
                   $selected_location_id = $existing_row_loc->form_option_value;
                 }
                // Display the fetched location IDs in the dropdown
                 foreach ($location_ids as $option_name) {
                    $selected = ($selected_location_id == $option_name->Location_id) ? 'selected="selected"' : '';
                    echo '<option value="' . esc_attr($option_name->Location_id) . '" ' . $selected . '>' . esc_html($option_name->Location_name) . '</option>';
                }
                ?>
        </select>
        <button type="submit" name="submit-btn" value="submit">Save Settings</button>
    </form>
    <form method="POST" id="ghl-global-tag" class="ghl_plugin_frm">
        <div class="tooltip">
            <label for="tags">Global Tag Settings:</label>
            <span class="tooltiptext">Note: Global tags will get fired when no form specific tags is used.</span>
            <?php
        $global_tags='';
        $existing_row_global_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'ghl_global_tag'));
        if($existing_row_global_tag){
            $global_tags=$existing_row_global_tag->form_option_value;
        }
        ?>
        </div>
        <br>
        <input type="varchar" id="global-tags" name="global_tags" placeholder="tagA, tagB"
            value="<?php echo esc_attr($global_tags); ?>">
        <button type="submit" name="submit-btn" value="submit">Save Settings</button>
    </form>

</div>