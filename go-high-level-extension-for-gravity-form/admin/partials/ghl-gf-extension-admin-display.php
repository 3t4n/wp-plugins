<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      5.0.7
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/admin/partials
 */
global $wpdb;
$table_name_form=$wpdb->prefix . "ghlexform_mapping";
// Get the form ID from the URL parameter
$form_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
// Use the form ID to retrieve the API key from the options table
$api_key = '';
$tag = "";
$loc_key='';
$tags='';
if ($form_id > 0) {
  $loc_id='gf_ghl_locid_' . $form_id;
  $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", $loc_id));
  if($existing_row_loc){
    $loc_key=$existing_row_loc->form_option_value;
  }
  
  //get option for tags
  $existing_row_main_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'gf_ghl_tags_' . $form_id));

  if($tags){
    $tags  = $existing_row_main_tag->form_option_value;
  }

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $api_key_msg  = $form_tag_msg = $del_msg = false;;
  if (isset($_POST['submit-btn'])) {
    // Get the API key from the form input
    $new_loc_key = sanitize_text_field($_POST['selected_location_id']);
    $new_tag = sanitize_text_field($_POST['tags']);


    $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'gf_ghl_locid_' . $form_id));

    $existing_row_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'gf_ghl_tags_' . $form_id));

    //save the location id form wise
    save_data($existing_row_loc,'gf_ghl_locid_' . $form_id,$new_loc_key);
    //save the tag form wise
    save_data($existing_row_tag,'gf_ghl_tags_' . $form_id,$new_tag);

    $form_tag_msg = true;
    $api_key_msg = true;

    
    // wp_redirect(admin_url('admin.php?page=gf_edit_forms&view=settings&id=' . $form_id));
    // exit();
  }
  if (isset($_POST['submit-disconnect'])) {

    $delLocid = ("gf_ghl_locid_" . $form_id);
    $delLoctag = ("gf_ghl_tags_" . $form_id);

    del_data($delLocid);
    // del_data($delLoctag);

    $del_msg=true;
    // wp_redirect(admin_url('admin.php?page=gf_edit_forms&view=settings&id=' . $form_id));
    // exit();
  }
  //message
  $final_msg = ($api_key_msg && $form_tag_msg) ? "Location and form tags updated successfully." : "Form Disconnected Sucessfully.";
  echo '<div class="notification--wrapper hide" id="openToast">
	<div class="notification--reminder ptb--20 text-center col-12">
		<h3>' . $final_msg . '<a class="exit--toast" href="javascript:void(0);">Got it.</a></h3>
	</div>    
</div>';
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
    $table_name_form=$wpdb->prefix . "ghlexform_mapping";
    if ($existing_row) {
        // Update the existing record
        $result = $wpdb->update(
          $table_name_form,
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
          $table_name_form,
            array(
                'form_option_name' => $option_name,
                'form_option_value' => $option_value
            ),
            array('%s', '%s')
        );
    }
}

?>

<div class="container">
  <h3>Go High Level</h3>
  <form method="post" id="ghl-ext-form" class="ghl_carls_frm">
    <label for="selected-location-id">Choose GHL Location</label>
    <select name="selected_location_id" id="selected-location-id">
      <option value="">Select GHL Subaccount</option>
      <?php
      $form_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
      // Fetch all stored location IDs
      global $wpdb;
      $selected_location_id='';
      $table_name = $wpdb->base_prefix . "ghlex_subaccount";
      $location_ids = $wpdb->get_results("SELECT Location_id, Location_name FROM $table_name");
      //fetch data from form mapping table
      $table_name_form=$wpdb->prefix . "ghlexform_mapping";
      $loc_id='gf_ghl_locid_' . $form_id;
      $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", $loc_id));
      $selected_location_id = $existing_row_loc->form_option_value;
      // Display the fetched location IDs in the dropdown
      foreach ($location_ids as $option_name) {
        $selected = ($selected_location_id == $option_name->Location_id) ? 'selected="selected"' : '';
        echo '<option value="' . esc_attr($option_name->Location_id) . '" ' . $selected . '>' . esc_html($option_name->Location_name) . '</option>';
      }
      ?>
    </select>


    <label for="tags">Setup Form Specific Tags:</label>
    <?php
      $main_tags='';
      $existing_row_main_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'gf_ghl_tags_' . $form_id));
      if($existing_row_main_tag){
        $main_tags=$existing_row_main_tag->form_option_value;
      }
      
    ?>
    <input type="varchar" id="tags" name="tags" class="ghl_frm_inp" placeholder="tagA, tagB" value="<?php echo esc_attr($main_tags); ?>">
    <button type="submit" name="submit-btn" value="submit">Save Settings</button>
    <br>
    <?php
    $form_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $checktag='';
    $checkLoc='';
    $checkSubacct='';
    $table_name_form=$wpdb->prefix . "ghlexform_mapping";
    $table_name = $wpdb->base_prefix . "ghlex_subaccount";
    $loc_id='gf_ghl_locid_' . $form_id;
    $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", $loc_id));
    if($existing_row_loc){
     $checkLoc=$existing_row_loc->form_option_value;
    }
    $existingSubacct=$wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name  WHERE Location_id = %s", $checkLoc));
    if($existingSubacct){
      $checkSubacct=$existingSubacct->Location_id;
    }
    //get option for tags
    $existing_row_main_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'gf_ghl_tags_' . $form_id));
    if($existing_row_main_tag){
      $checktag  = $existing_row_main_tag->form_option_value;
    }
    if (($checkLoc!='') && ($checkSubacct!='')) {
    ?>
      <div class="connectedghl-message">
            <div class="cnt-img">
                <img src="<?php echo plugin_dir_url(__DIR__).'/uploads/yes.png' ?>" width="50px">
            </div>
            <div class="cnt-text">
                <p>You Are Now Connected</p>
            </div>
            
        </div>
      <button type="submit" name="submit-disconnect" value="submit">Disconnect</button>
      
    <?php
    }
    ?>
  </form>

</div>