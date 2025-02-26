<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

class EchoSign {

	/**
	 * eor hr forms section
	 * show list view
	 */
	public static function eor_hr_forms_section() {

		if(sanitize_title($_REQUEST['page']) == 'wp-echosign-templates' && isset($_REQUEST['action']) && (sanitize_title($_REQUEST['action']) == 'add' || sanitize_title($_REQUEST['action']) == 'edit')) {
			require_once(WP_ECHOSIGN_DIR . 'templates/add_templates.php');
		}
		else if(sanitize_title($_REQUEST['page']) == 'wp-echosign-templates' && isset($_REQUEST['action']) && (sanitize_title($_REQUEST['action']) == 'sequence' || sanitize_title($_REQUEST['action']) == 'save_sequence')) {
			if(sanitize_title($_REQUEST['action']) == 'save_sequence') {
				$data = $_REQUEST;
				$forms = array();
				foreach($data as $key => $document_name)        {
					$unwan = $group_id = $form_id = null;
					list($unwan, $group_id, $form_id) = explode('_', $key);
					if(!empty($group_id) && !empty($form_id) && $unwan == 'id')
						$forms[$group_id][] = $form_id;
				}

				if(!empty($forms))      {
					$hr_forms = get_option('_eor_echosign_template_info');
					$hr_forms_updated = $hr_forms;
					foreach($forms as $group_id => $group_forms)    {
						foreach($group_forms as $sequence_key => $single_group_form_id) {
							$hr_forms_updated[$single_group_form_id]['sequence'] = $sequence_key + 1;;
						}
					}
					update_option('_eor_echosign_template_info', $hr_forms_updated);
				}
			}
			require_once(WP_ECHOSIGN_DIR . 'templates/form_sequence.php');
		}
		else if(sanitize_title($_REQUEST['page']) == 'wp-echosign-templates' && isset($_REQUEST['action']) && sanitize_title($_REQUEST['action']) == 'list_groups') {
			require_once(WP_ECHOSIGN_DIR . 'templates/list_groups.php');
		}
		else    {
			$error = $notification_msg = null;
			if(sanitize_title($_REQUEST['page']) == 'wp-echosign-templates' && isset($_REQUEST['action']) && sanitize_title($_REQUEST['action']) == 'delete')    {
				$hr_forms = get_option('_eor_echosign_template_info');
				unset($hr_forms[sanitize_text_field($_REQUEST['id'])]);
				update_option('_eor_echosign_template_info', $hr_forms);
				$notification_msg = 'Form removed successfully';
			}


			if(sanitize_title($_REQUEST['page']) == 'wp-echosign-templates' && isset($_REQUEST['action']) && sanitize_title($_REQUEST['action']) == 'save')        {
				$hr_forms = get_option('_eor_echosign_template_info');
				$upload_dir = wp_upload_dir();
				$template_dir = $upload_dir ['basedir'] . '/echosign-templates';
				if (!is_dir($template_dir)) {
					wp_mkdir_p($template_dir);
				}
				if(!empty($_REQUEST['id']) && sanitize_text_field($_REQUEST['id']) != 0)     {
					$hr_last_id = $_REQUEST['id'];
					$hr_forms[$hr_last_id]['document_name'] = sanitize_text_field($_REQUEST['document_name']);
					$tmp_location = sanitize_file_name($_FILES['document']['tmp_name']);
					$new_location = $template_dir.'/' . sanitize_file_name($_FILES['document']['name']);
					if(!empty($tmp_location))       {
						if(copy($tmp_location, $new_location) && !empty($tmp_location)) {
							$hr_forms[$hr_last_id] = array(
									'document_name'  => sanitize_text_field($_REQUEST['document_name']),
									'document_info'  => array('name' => sanitize_file_name($_FILES['document']['name']), 'location' => $new_location),
									'merge_fields'   => array_map("strip_tags", $_POST['merge_fields']),
									'merge_values'     => array_map("strip_tags", $_POST['merge_values']),
									'shortcode'        => '[echosign_template id = "'.$hr_last_id.'"]'
									);
						}
						else    {
							$error = 'Error occured while copying file to new location. Make Sure your Uploads directory has writable permission';
						}
					}
					else  {
						$hr_forms[$hr_last_id] = array(
								'document_name'  => sanitize_text_field($_REQUEST['document_name']),
								'document_info'  => array('name' => sanitize_file_name($_FILES['document']['name']), 'location' => $new_location),
								'merge_fields'   => array_map("strip_tags", $_POST['merge_fields']),
								'merge_values'     => array_map("strip_tags", $_POST['merge_values']),
								'cf_merge_values' => array_map("strip_tags", $_POST['cf_merge_values']),
								'shortcode'        => '[echosign_template id = "'.$hr_last_id.'"]'
								);

					}

					if(empty($error))       {
						$notification_msg = 'Template updated successfully';
					}
				}
				else    {
					$hr_last_id = get_option('_eor_hr_form_last_id');
					if(empty($hr_last_id))
						$hr_last_id = 0;
					update_option('_eor_hr_form_last_id', $hr_last_id + 1);
					$tmp_location = $_FILES['document']['tmp_name'];
					$new_location = $template_dir.'/' . sanitize_file_name($_FILES['document']['name']);
					if(copy($tmp_location, $new_location) && !empty($tmp_location)) {
						$hr_forms[$hr_last_id] = array(
								'document_name'  => sanitize_text_field($_REQUEST['document_name']),
								'document_info'  => array('name' => sanitize_file_name($_FILES['document']['name']), 'location' => $new_location),
								'merge_fields'       => array_map("strip_tags", $_POST['merge_fields']),
								'merge_values'     => array_map("strip_tags", $_POST['merge_values']),
								'cf_merge_values' => array_map("strip_tags", $_POST['cf_merge_values']),
								'shortcode'        => '[echosign_template id = "'.$hr_last_id.'"]' 
								);
						$notification_msg = 'Template added successfully';
					}
					else    {
							$error = 'Error occured while copying file to new location. Make Sure your Uploads directory has writable permission';
					}
				}
				update_option('_eor_echosign_template_info', $hr_forms);
			}

			// Update
			if(sanitize_title($_REQUEST['page']) == 'wp-echosign-templates' && isset($_REQUEST['action']) && sanitize_title($_REQUEST['action']) == 'update') {
				$hr_forms = get_option('_eor_echosign_template_info');
				$upload_dir = wp_upload_dir();
				$template_dir = $upload_dir ['basedir'] . '/echosign-templates';
				if (!is_dir($template_dir)) {
					wp_mkdir_p($template_dir);
				}
				if(!empty($_REQUEST['id']) && sanitize_text_field($_REQUEST['id']) != 0)     {
					$hr_last_id = sanitize_text_field($_REQUEST['id']);
					$hr_forms[$hr_last_id]['document_name'] = sanitize_text_field($_REQUEST['document_name']);
					$tmp_location = sanitize_file_name($_FILES['document']['tmp_name']);
					if(!empty($tmp_location))       {
						$new_location = $template_dir.'/'.sanitize_file_name($_FILES['document']['name']);
						if(copy($tmp_location, $new_location) && !empty($tmp_location)) {
							$hr_forms[$hr_last_id] = array(
									'document_name'  => sanitize_text_field($_REQUEST['document_name']),
									'document_info'  => array('name' => sanitize_file_name($_FILES['document']['name']), 'location' => $new_location),
									'merge_fields'   => array_map("strip_tags", $_POST['merge_fields']),
									'merge_values'   => array_map("strip_tags", $_POST['merge_values']),
									'cf_merge_values' => array_map("strip_tags", $_POST['cf_merge_values']),
									'shortcode'      => '[echosign_template id = "'.$hr_last_id.'"]'
									);
						}
						else    {
							$error = 'Error occured while copying file to new location. Make Sure your Uploads directory has writable permission';
						}
					}
					else  {
						$hr_forms[$hr_last_id] = array(
								'document_name'  => sanitize_text_field($_REQUEST['document_name']),
								'document_info'  => array('name' => $hr_forms[$hr_last_id]['document_info']['name'],'location' => $hr_forms[$hr_last_id]['document_info']['location']),
								'merge_fields'   => array_map("strip_tags", $_POST['merge_fields']),
								'merge_values'   => array_map("strip_tags", $_POST['merge_values']),
								'cf_merge_values'=> array_map("strip_tags", $_POST['cf_merge_values']),
								'shortcode'      => '[echosign_template id = "'.$hr_last_id.'"]'
								);
					}
				}
				$notification_msg = 'Template Updated successfully';
				update_option('_eor_echosign_template_info', $hr_forms);
			}

			require_once(WP_ECHOSIGN_DIR . 'templates/list_templates.php');
			$listTable = new EOR_HR_Forms_List_Table();
			?>
				<div class="wrap">
				<?php if(!empty($error))        { ?>
					<div class = 'alert alert-error'> <?php echo $error; ?> </div>
						<?php } ?>

						<?php if(!empty($notification_msg))     { ?>
							<div class = 'alert alert-success'> <?php echo $notification_msg; ?> </div>
								<?php } ?>

								<div id="icon-users" class="icon32"></div>
								<h2> Echo Sign Templates <a href = <?php echo esc_url('?page=wp-echosign-templates&action=add'); ?> class = 'add-new-h2'> Add New Template </a>  </h2>
								<form method="post">
								<input type="hidden" name="page" value="<?php echo sanitize_title($_REQUEST['page']); ?>" />
								<?php $listTable->search_box('search', 'email'); ?>
								</form>
								<?php
								$listTable->prepare_items();
			$listTable->display(); ?>
				</div>
				<?php
		}
	}


	public function echosign_templates() {
		$get_api_key = get_option('echosign_apikey');
		// API Settings
		$settings = "<div style='magin-top:20px;margin-bottom:30px;'>
			<h3>EcoSign Settings</h3>
			<form name='echosign_settings' method='post' action='#'>
			<label>API Key</label>
			<input type='text' name='api_key' id='api_key' required placeholder='Enter your API key' value='" . sanitize_key($get_api_key) . "' />
			<input type='submit' name='save_echosign_settings' id='save_echosign_settings' class='button button-primary' value='Save Settings' />
			</form>
			</div>";
		if(isset($_POST['api_key']) && sanitize_key($_POST['api_key']) != '') {
			update_option('echosign_apikey', sanitize_key($_POST['api_key']));
		}
		echo $settings;

		// Add new template
		$upload_dir = wp_upload_dir();
		echo "<input type='button' name='show_upload_template' id='show_upload_template' value='Add New Template' class='button button-primary' onclick='show_upload_template();' />";
		if (!is_dir($upload_dir ['basedir'])) {
			$uploadtemplate = "<div style='font-size:16px;margin-left:20px;margin-top:25px;color:red;'>" . __("Uploads Directory Not Found!") . "</div><br/>";
		} else {
			$uploadtemplate = "<div id='upload_echosign_template' style='magin-top:20px; width:98%; display:none;'>";
			$uploadtemplate .= "<h3>Upload your custom templates:</h3>";
			$uploadtemplate .= "<form name='echosign_uploadtemplate' method='post' action='' enctype='multipart/form-data'>";
			$uploadtemplate .= "<table class='table'>";
			$uploadtemplate .= "<tr><td>Upload Template</td><td><input type='file' name='attachment' id='attachment' required style='width: 100%;'/></td></tr>";
			$uploadtemplate .= "<tr><td>Template Name</td><td><input type='text' name='templatename' id='templatename' pattern='[a-zA-Z]+' required style='width: 100%;'/></td></tr>";
			$uploadtemplate .= "<tr><td>Document Name</td><td><input type='text' name='documentname' id='documentname' required style='width: 100%;'/></td></tr>";
			$uploadtemplate .= "<tr><td colspan='2'><input type='button' name='hide_upload_template' id='hide_upload_template' value='Cancel' class='button button-warning' style='float:right; margin:5px;' onclick='hide_new_template();' /> <input type='submit' name='uploadnewtemplate' id='uploadnewtemplate' value='Upload' style='float:right; margin:5px;' class='button button-primary'/></td></tr>";
			$uploadtemplate .= "</table>";
			$uploadtemplate .= "</form>";
			$uploadtemplate .= "</div>";
		}
		if(isset($_POST['uploadnewtemplate']) && isset($_FILES) && !empty($_FILES)) {
			$tmp_name = sanitize_file_name($_FILES["attachment"]["tmp_name"]);
			$uploaded_extention = sanitize_text_field($_FILES["attachment"]["type"]);
			$templatename = preg_replace('/\s/', '_', sanitize_text_field($_POST['templatename']));
			$new_template_name = $templatename . '.pdf';
			$documentname = sanitize_text_field($_POST['documentname']);
			$upload_dir = wp_upload_dir();
			$template_dir = $upload_dir ['basedir'] . '/echosign-templates';
			if (!is_dir($template_dir)) {
				wp_mkdir_p($template_dir);
			}
		}
		echo $uploadtemplate;
		// Do actions based on the requests ( Trash, Restore, Delete )
		if(isset($_REQUEST['templateid']) && isset($_REQUEST['doaction'])) {
			$assign_url = admin_url() . 'admin.php?page=wp-echosign-templates';
			wp_safe_redirect( $assign_url );
		}
		require_once(WP_ECHOSIGN_DIR . 'templates/template_list.php');
	}

	public function echosign_settings() {
		$get_api_key = get_option('echosign_apikey');
		$settings = "<div style='margin-top:20px;'>
			<h3>EcoSign Settings</h3>
			<form name='echosign_settings' method='post' action='#'>
			<label>API Key</label>
			<input type='text' name='api_key' id='api_key' required placeholder='Enter your API key' value='" . sanitize_key($get_api_key) . "' />
			<input type='submit' name='save_echosign_settings' id='save_echosign_settings' class='button button-primary' value='Save Settings' />
			</form>
			</div>";
		if(isset($_POST['api_key']) && sanitize_key($_POST['api_key']) != '') {
			update_option('echosign_apikey', sanitize_key($_POST['api_key']));
		}
		echo $settings;
		$uploadtemplate = "<div style='magin-top:20px;'>";
		$uploadtemplate .= "<h3>Upload your custom templates:</h3>";
		$uploadtemplate .= "<form name='echosign_uploadtemplate method='post' action='#'>";
		$uploadtemplate .= "<table class='table'>";
		$uploadtemplate .= "<tr><td>Upload Template</td><td><input type='file' name='attachment' id='attachment' required style='width: 100%;'/></td></tr>";
		$uploadtemplate .= "<tr><td>Custom Template Name</td><td><input type='text' name='templatename' id='templatename' required style='width: 100%;'/></td></tr>";
		$uploadtemplate .= "<tr><td>Custom Document Name</td><td><input type='text' name='documentname' id='documentname' required style='width: 100%;'/></td></tr>";
		$uploadtemplate .= "<tr><td colspan='2'><input type='submit' name='upload' id='upload' value='Upload' style='float:right;' class='button button-primary'/></td></tr>";
		$uploadtemplate .= "</table>";
		$uploadtemplate .= "</form>";
		$uploadtemplate .= "</div>";
		echo $uploadtemplate;
	}
}
