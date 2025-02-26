<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://shopitpress.com/
 * @since      1.0.0
 *
 * @package    Sip_Custom_Order_Satus_For_Woocommerce
 * @subpackage Sip_Custom_Order_Satus_For_Woocommerce/admin/partials
 */

function sip_coswc_add_meta_box( ) {

	add_meta_box( 'sip-coswc-fields-general', __( 'General', 'sip-custom-order-satus-for-woocommerce' ), 'sip_coswc_callback_meta_box', 'sip_custom_statuses', 'normal', 'high', array('type' => 'general') );
	add_meta_box( 'sip-coswc-fields-style', __( 'Style', 'sip-custom-order-satus-for-woocommerce' ), 'sip_coswc_callback_meta_box', 'sip_custom_statuses', 'normal', 'high', array('type' => 'style') );
	add_meta_box( 'sip-coswc-fields-action', __( 'Action', 'sip-custom-order-satus-for-woocommerce' ), 'sip_coswc_callback_meta_box', 'sip_custom_statuses', 'normal', 'high', array('type' => 'action') );
}
add_action( 'add_meta_boxes', 'sip_coswc_add_meta_box' );

/**
 * callback meta box
 *
 * @since      1.0.0
 */
function sip_coswc_callback_meta_box( $post, $type ) {
	$type = $type["args"]["type"];
	$statuses = get_post_meta( $post->ID, 'sip_custom_statuses', true );
	switch($type) {

		case "general": ?>
 
		<div class="sip-coswc-fields">
				<div class="field">
					<p>
						<span class="description"><?php _e( 'The following options affect how statuses are displayed on the front and back end.', 'sip-custom-order-satus-for-woocommerce' ); ?></span>
					</p>

					<p class="form-field">
						<label for="status_label"><?php _e( 'Label', 'sip-custom-order-satus-for-woocommerce' ); ?><span class="required">*</span></label>
						<input type="text" required="required" name="sip_custom_statuses[status_name]" id="status_label" value="<?php echo ( (isset( $statuses['status_name'])) ? $statuses['status_name'] : "" ); ?>" maxlength="15">
						<span class="woocommerce-help-tip" data-tip="<?php _e( 'Enter the label of the status which you would like to add. This should be lower case as will be displayed on the status label.', 'sip-custom-order-satus-for-woocommerce' ); ?>"></span>
					</p>
					<p class="form-field">
						<label for="status_reports"><?php _e( 'Reports', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
						<input type="checkbox" name="sip_custom_statuses[status_display_reports]" id="status_reports" <?php $status_display_reports = ( (isset($statuses['status_display_reports'] )) ? $statuses['status_display_reports'] : "" ); checked('yes', $status_display_reports, true); ?> value="yes">
						<span class="description"><?php _e( 'Check this box allow this status to be considered as a placed order in the reports.', 'sip-custom-order-satus-for-woocommerce' ); ?></span>
					</p>
					<p class="form-field">
						<label for="status_dashboard_widget"><?php _e( 'Dashboard Widget', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
						<input type="checkbox" name="sip_custom_statuses[status_dashboard_widget]" id="status_dashboard_widget" <?php $status_dashboard_widget = ( (isset($statuses['status_dashboard_widget'] )) ? $statuses['status_dashboard_widget'] : "" ); checked('yes', $status_dashboard_widget, true); ?> value="yes">
						<span class="description"><?php _e( 'Enable to display an order count with this status in the Dashboard widget.', 'sip-custom-order-satus-for-woocommerce' ); ?></span>
					</p>
					
				</div>
			</div>
		<?php break; ?>

		<?php case "style": ?>

			<div class="sip-coswc-fields">
				<div class="field">
					<div class="options_group">
						<p>
						<span class="description"><?php _e( 'The following options affect how statuses will look from style to colour.', 'sip-custom-order-satus-for-woocommerce' ); ?></span>
						</p>
						<p class="form-field">
							<label for="sip-icon-select-status"><?php _e( 'Icon', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
							<input type="text" name="sip_custom_statuses[status_icon]" id="sip-icon-select-status" class="sip-icon-select-status" value="<?php echo ( (isset( $statuses['status_icon'])) ? $statuses['status_icon'] : '57345' ); ?>" />

						</p>
						<p class="form-field">
							<label for="status_colour"><?php _e( 'Colour', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
							<input type="text" name="sip_custom_statuses[status_colour]" id="status_colour" value="<?php echo ( (isset( $statuses['status_colour'])) ? $statuses['status_colour'] : "#aa2727"); ?>" class="color-picker-field">
							<div id="status-colour-colorpicker"></div>
						</p>
						<fieldset class="form-field _icon_style_field ">
							<legend><?php _e( 'Style', 'sip-custom-order-satus-for-woocommerce' ); ?></legend>
							<?php
							$icod   = ( (isset( $statuses['status_icon'])) ? $statuses['status_icon'] : '57345' );
							$icolor = ( (isset( $statuses['status_colour'])) ? $statuses['status_colour'] : '#aa2727' );
							$istyles = array(
								'background-color:'.$icolor.'; border-color:'.$icolor.'; color: #fff',
								'color:'.$icolor.'; border-color:'.$icolor.';',
								);
							?>
							<ul class="wc-radios">
								<li>
									<label>
										<input type="radio" style="" <?php echo ( (isset($statuses['status_icon_style'])) ? '' : 'checked="checked"' ); ?> class="select short input-wc-sa-icon" value="icon-color" name="sip_custom_statuses[status_icon_style]" <?php ( (isset($statuses['status_icon_style'])) ? checked('icon-color', $statuses['status_icon_style'], true) : "" ); ?> >
										<span class="sip-icon-circle sip-icon-icomoon sip-icon-color-style-0" style="<?php echo $istyles[0]; ?>">
											<i class="icomoon-<?php echo sip_icon_lists ( $icod ); ?>" data-icomoon="<?php echo $icod; ?>"></i>
										</span>
									</label>
								</li>
								<li>
									<label> 
										<input type="radio" style="" class="select short input-wc-sa-icon" value="icon-outline" name="sip_custom_statuses[status_icon_style]" <?php ( (isset($statuses['status_icon_style'])) ? checked('icon-outline', $statuses['status_icon_style'], true) : "" ); ?>>
										<span class="sip-icon-outline sip-icon-icomoon sip-icon-color-style-1" style="<?php echo $istyles[1]; ?>">
											<i class="icomoon-<?php echo sip_icon_lists ( $icod ); ?>" data-icomoon="<?php echo $icod; ?>"></i>
										</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" style="" class="select short" value="text-color" name="sip_custom_statuses[status_icon_style]" <?php ( (isset($statuses['status_icon_style'])) ? checked('text-color', $statuses['status_icon_style'], true) : "" ); ?>>
										<span class="sip-status-label-display sip-icon-icomoon-text-color sip-icon-color-style-0" style="<?php echo $istyles[0]; ?>">
										<?php echo ( (isset( $statuses['status_name'])) ? $statuses['status_name'] : __('Status', 'sip-custom-order-satus-for-woocommerce') ); ?>
										</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" style="" class="select short" value="text-outline" name="sip_custom_statuses[status_icon_style]" <?php ( (isset($statuses['status_icon_style'])) ? checked('text-outline', $statuses['status_icon_style'], true) : "" ); ?>>
										<span class="sip-status-label-display sip-icon-icomoon-text-outline sip-icon-color-style-1" style="<?php echo $istyles[1]; ?>">
											<?php echo ( (isset( $statuses['status_name'])) ? $statuses['status_name'] : __('Status', 'sip-custom-order-satus-for-woocommerce') ); ?>
										</span>
									</label>
								</li>
							</ul>
						</fieldset>
					</div>
				</div>
			</div>
		<?php break; ?>

		<?php case "action": ?>
			<div class="sip-coswc-fields">
				<div class="field">

					<div class="options_group">
						<p>
							<span class="description">
								<?php _e('The following fields affects how and when actions for this status are displayed on the main orders screen.', 'sip-custom-order-satus-for-woocommerce'); ?>
							</span>
						</p>
						<p class="form-field">
							<label for="status_action_icon"><?php _e( 'Action Icon', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
							<input type="text" name="sip_custom_statuses[status_action_icon]" id="status_action_icon" class="status_action_icon" value="<?php echo ( (isset( $statuses['status_action_icon'])) ? $statuses['status_action_icon'] : '57345' ); ?>" />
							<span class="woocommerce-help-tip" data-tip="<?php _e( 'Select the icon you would like to display as the Action button.', 'sip-custom-order-satus-for-woocommerce' ); ?>"</span>
						</p>
						<p class="form-field">
							<label for="status_show_action_buttons"><?php _e( 'Default Actions', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
							<select multiple="multiple"  name="sip_custom_statuses[status_show_action_buttons][]" id="status_show_action_buttons"  class="wc-enhanced-select" data-placeholder="<?php esc_attr_e( 'Select Status', 'sip-custom-order-satus-for-woocommerce' ); ?>" style="min-width: 200px; width: 50%;">
								<?php
								$order_statuses = wc_get_order_statuses();
								$status_show_action_buttons = ( (isset( $statuses['status_show_action_buttons'])) ? $statuses['status_show_action_buttons'] : array() );
								foreach ($order_statuses as $status_key => $status_name) {
									if( !in_array($status_key, array('wc-completed', 'wc-processing') ) ){ continue; }
									?>
									<option value="<?php echo $status_key; ?>" <?php selected(in_array($status_key, $status_show_action_buttons), true, true); ?>><?php echo $status_name; ?></option>
									<?php	
								}
								?>
							</select>
							<span class="woocommerce-help-tip" data-tip="<?php _e( 'Select which actions buttons should appear when this status is set.', 'sip-custom-order-satus-for-woocommerce' ); ?>"></span>
						</p>
						<p class="form-field">
							<label for="status_action_visibility"><?php _e( 'Action Visibility', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
							<select multiple="multiple"  name="sip_custom_statuses[action_visibility][]" id="status_action_visibility"  class="wc-enhanced-select" data-placeholder="<?php esc_attr_e( 'Select Status', 'sip-custom-order-satus-for-woocommerce' ); ?>" style="min-width: 200px; width: 50%;">
								<?php

								$post_slug = $post->post_name;
								$action_visibility = ( (isset( $statuses['action_visibility'])) ? $statuses['action_visibility'] : array() );

								foreach ($order_statuses as $status_key => $status_name) {
									if( $status_key == $post_slug){ continue; }
									?>
									<option value="<?php echo $status_key ; ?>" <?php selected(in_array($status_key, $action_visibility), true, true); ?>><?php echo $status_name; ?></option>
									<?php	
								}
								
								?>
							</select>
							<span class="woocommerce-help-tip" data-tip="<?php _e( 'Select which statuses need to be applied to the order before the action button is shown. Leave blank to not display the action button.', 'sip-custom-order-satus-for-woocommerce' ); ?>"</span>
						</p>
						<p class="form-field">
							<label for="status_hide_bulk_actions"><?php _e( 'Hide Bulk Actions', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
							<input type="checkbox" name="sip_custom_statuses[status_hide_bulk_actions]" id="status_hide_bulk_actions" <?php $status_hide_bulk_actions = ( (isset($statuses['status_hide_bulk_actions'] )) ? $statuses['status_hide_bulk_actions'] : "" ); checked('yes', $status_hide_bulk_actions, true); ?> value="yes">
							<span class="description"><?php _e( 'Check this box to hide the action for this status from the Bulk Actions menu.', 'sip-custom-order-satus-for-woocommerce' ); ?></span>
						</p>
						<p class="form-field">
							<label for="status_order_note_prompt"><?php _e( 'Order Note Prompt', 'sip-custom-order-satus-for-woocommerce' ); ?></label>
							<input type="checkbox" name="sip_custom_statuses[status_order_note_prompt]" id="status_order_note_prompt" <?php $status_order_note_prompt = ( (isset($statuses['status_order_note_prompt'] )) ? $statuses['status_order_note_prompt'] : "" ); checked('yes', $status_order_note_prompt, true); ?> value="yes">
							<span class="description"><?php _e( 'Check this box to display a modal window to enter a custom note when clicking on the action button.', 'sip-custom-order-satus-for-woocommerce' ); ?></span>
						</p>
						
					</div>

				</div>
			</div>
		<?php break; ?>

		<?php
	}
}


/**
 * save the meta box data
 *
 * @since      1.0.0
 */
function sip_cos_save_meta_box( $postid ) {

	global $wpdb; 

	if( isset($_POST['sip_custom_statuses']) ) {

		$sip_custom_statuses = get_post_meta( $postid, 'sip_custom_statuses', true );

		$data = $_POST['sip_custom_statuses'];
		$data['status_name'] = str_replace(" ", "-", $data['status_name']);

		$needle   = "wc-";

		if( strpos( $data['status_name'], $needle ) === false) {
			$data['status_name'] = strtolower( "wc-".$data['status_name']);
		} else {
			$data['status_name'] = strtolower( $data['status_name'] );
		}

		update_post_meta( $postid, 'sip_custom_statuses', $data );
		$wpdb->query($wpdb->prepare( "UPDATE {$wpdb->posts} SET post_name = %s WHERE ID = %d", $data['status_name'], $postid ));

		if (!empty($sip_custom_statuses)) {

			if ( isset( $sip_custom_statuses['status_name']) && isset($data['status_name']) && $sip_custom_statuses['status_name'] != "" && $data['status_name'] != "" ) {
				$new_status_name = $data['status_name'];
				$old_status_name = $sip_custom_statuses['status_name'];
				$query = "UPDATE {$wpdb->posts} SET post_status = '{$new_status_name}' WHERE post_status = '{$old_status_name}'";
				$wpdb->query($query);
			}
		}
	} // isset($_POST['sip_custom_statuses'])
}
add_action( 'save_post', 'sip_cos_save_meta_box' );