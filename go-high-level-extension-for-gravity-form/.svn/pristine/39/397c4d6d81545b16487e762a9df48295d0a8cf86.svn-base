<?php
global $wpdb;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $api_key_msg = $form_tag_msg =  $del_msg= false;
    if (isset($_POST['submit-btn'])) {
        $selected_location_id = sanitize_text_field($_POST['selected_location_id']);
        $table_name = $wpdb->prefix . "ghlexform_mapping";
        
        $new_tag = sanitize_text_field($_POST['tags']);

        $ghl_form_id = $_POST['ghl_form_id'];
        if (!empty($ghl_form_id)) {
           
            $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE form_option_name = %s", 'gf_ghl_locid_' . $ghl_form_id));

            $existing_row_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE form_option_name = %s", 'gf_ghl_tags_' . $ghl_form_id));

            //save the location id form wise
            save_data($existing_row_loc,'gf_ghl_locid_' . $ghl_form_id,$selected_location_id);
            //save the tag form wise
            save_data($existing_row_tag,'gf_ghl_tags_' . $ghl_form_id,$new_tag);

            
            $form_tag_msg = true;
            $api_key_msg = true;
        }
    }

    if (isset($_POST['submit-disconnect'])) {
        if (!empty($_POST['ghl_form_id'])) {
            $form_id=$_POST['ghl_form_id'];
            $delLocid = ("gf_ghl_locid_" . $form_id);
            $delLoctag = ("gf_ghl_tags_" . $form_id);
            del_data($delLocid);
            // del_data($delLoctag);

            $del_msg=true;
        }
    }

    $final_msg = ($api_key_msg && $form_tag_msg) ? "Location and form tags updated successfully." : "Form Disconnected Sucessfully.";
    echo '<div class="notification--wrapper hide" id="openToast">
	<div class="notification--reminder ptb--20 text-center col-12">
		<h3>' . $final_msg . '<a class="exit--toast" href="javascript:void(0);">Got it.</a></h3>
	</div>    
</div>';
    // echo $final_msg;
}
//delete data
function del_data($option_name_del){

    global $wpdb;
    $table_name_form=$wpdb->prefix . "ghlexform_mapping";
  
      // Fetch the ID corresponding to the provided Location_id
      $id_to_delete = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name_form WHERE form_option_name = %s", $option_name_del));
  
      if ($id_to_delete) {
          // Delete the row with the fetched ID
          $result = $wpdb->delete(
              $table_name_form,
              array('id' => $id_to_delete),
              array('%d')
          );
      }
  
  }





//save data
function save_data($existing_row,$option_name,$option_value){
    global $wpdb;
    $table_name = $wpdb->prefix . "ghlexform_mapping";
    if ($existing_row) {
        // Update the existing record
        $result = $wpdb->update(
            $table_name,
            array(
                'form_option_name' => $option_name,
                'form_option_value' => $option_value
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
                'form_option_name' => $option_name,
                'form_option_value' => $option_value
            ),
            array('%s', '%s')
        );
    }
}


if (class_exists('GFAPI')) {
    $forms = GFAPI::get_forms();

    // if (!empty($forms)) {
        echo '<form action="" class="ghl-form" method="POST">
            <label for="apikey">GHL - Gravity Form Connection Setup</label>
            <select name="ghl_form_id" id="ghl_form_id">
                <option value="">Select Form</option>';
        foreach ($forms as $form) {
            echo '<option value="' . $form['id'] . '">' . $form['title'] . '</option>';
        }
        echo '</select>
            <div class="ghl-form-data">
       
            <label for="selected-location-id">Choose GHL Location</label>
            <select name="selected_location_id" id="selected-location-id">
                <option value="">Select GHL Subaccount</option>';

        // Fetch all stored location IDs
        global $wpdb;
        $table_name = $wpdb->base_prefix . "ghlex_subaccount";
		$location_ids=	$wpdb->get_results("SELECT Location_id, Location_name FROM $table_name");
        // Display the fetched location IDs in the dropdown
        foreach ($location_ids as $option_name) {
            echo '<option  value="' . esc_attr($option_name->Location_id) . '">' . esc_html($option_name->Location_name) . '</option>';
        }

        echo '  </select>
        

                <label for="tags">Setup Form Specific Tags:</label>
                <input type="varchar" id="tags" name="tags" class="ghl_frm_inp" placeholder="tagA, tagB" value="">
                 <br>
                 <br>
                <button type="submit" name="submit-btn" value="submit">Save Settings</button>
                <div class="tooltippro">
                    <span class="tooltipprotext">Note: Add Tags separated by commas. It will override the Global tags if any.</span>
                </div>
                <br>
                <br>
                <div class="dis-test">
                <div class="cnt-img">'
                ?>
<img src="<?php echo plugin_dir_url(__DIR__).'/uploads/yes.png' ?>" width="50px">
<p class="cnttext">You Are Now Connected</p>
<?php
               echo ' 
                </div>
                 <br>
                <button type="submit" name="submit-disconnect" value="submit" >Disconnect</button>
                </div>
            </div>
        </form>';
    }
// }
?>



<div>
    <p class="utp-desc1"><strong>Note: </strong>Kindly utilize <b>Advance Fields</b> for name, email, and phone when
        transmitting data to GHL.
</div>