<?php

defined('ABSPATH') or die("You can't access this file directly.");

/*TinyMCE Shortcode Generator Button - 25-01-2017*/

function qcpnd_tinymce_shortcode_button_function() {
	add_filter ("mce_external_plugins", "qcpnd_shortcode_generator_btn_js");
	add_filter ("mce_buttons", "qcpnd_shortcode_generator_btn");
}

function qcpnd_shortcode_generator_btn_js($plugin_array) {
	$plugin_array['qcpnd_shortcode_btn'] = plugins_url('assets/js/qcpnd-tinymce-button.js', __FILE__);
	return $plugin_array;
}

function qcpnd_shortcode_generator_btn($buttons) {
	array_push ($buttons, 'qcpnd_shortcode_btn');
	return $buttons;
}

add_action ('init', 'qcpnd_tinymce_shortcode_button_function');

function qcpnd_load_custom_wp_admin_style_free($hook) {
	if( 'post.php' == $hook || 'post-new.php' == $hook ){
        wp_register_style( 'pnd_shortcode_gerator_css', qcpnd_ASSETS_URL . '/css/shortcode-modal.css', false, '1.0.0' );
        wp_enqueue_style( 'pnd_shortcode_gerator_css' );
    }
}
add_action( 'admin_enqueue_scripts', 'qcpnd_load_custom_wp_admin_style_free' );

function qcpnd_render_shortcode_modal_free() {

	?>

	<div id="sm-modal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
		
			<span class="close">
				<span class="dashicons dashicons-no"></span>
			</span>
			<h3> 
				<?php esc_html_e( 'SBD - Shortcode Generator' , 'qc-opd' ); ?></h3>
			<hr/>
			
			<div class="sm_shortcode_list">

				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Mode' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pnd_mode">
						<option value="all"><?php esc_html_e( 'All List' , 'qc-opd' ); ?></option>
						<option value="one"><?php esc_html_e( 'One List' , 'qc-opd' ); ?></option>
						<option value="category"><?php esc_html_e( 'List Category' , 'qc-opd' ); ?></option>
						<option value="maponly"><?php esc_html_e( 'Map Only' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div id="pnd_list_div" class="qcpnd_single_field_shortcode hidden-div">
					<label style="width: 200px;display: inline-block;">
						 <?php esc_html_e( 'Select List' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pnd_list_id">
					
						<option value=""><?php esc_html_e( 'Please Select List' , 'qc-opd' ); ?></option>
						
						<?php
						
							$ilist = new WP_Query( array( 'post_type' => 'pnd', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC') );
							if( $ilist->have_posts()){
								while( $ilist->have_posts() ){
									$ilist->the_post();
						?>
						
						<option value="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html(get_the_title()); ?></option>
						
						<?php } } ?>
						
					</select>
				</div>
				
				<div id="pnd_list_cat" class="qcpnd_single_field_shortcode hidden-div">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'List Category' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pnd_list_cat_id">
					
						<option value=""><?php esc_html_e( 'Please Select Category' , 'qc-opd' ); ?></option>
						
						<?php
						
							$terms = get_terms( 'pnd_cat', array(
								'hide_empty' => true,
							) );
							if( $terms ){
								foreach( $terms as $term ){
						?>
						
						<option value="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></option>
						
						<?php } } ?>
						
					</select>
				</div>
				
				<div id="pd_show_map" class="qcpd_single_field_shortcode" >
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Show Map' , 'qc-opd' ); ?>
					</label>
					<input id="pdmap" name="pdmap" value="show" type="checkbox">
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Template Style' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pnd_style">
						<option value="simple"><?php esc_html_e( 'Default Style' , 'qc-opd' ); ?></option>
						<option value="style-1"><?php esc_html_e( 'Style 01' , 'qc-opd' ); ?></option>
						<option value="style-2"><?php esc_html_e( 'Style 02' , 'qc-opd' ); ?></option>
						<option value="style-3"><?php esc_html_e( 'Style 03' , 'qc-opd' ); ?></option>
					</select>
					
					
					
				</div>
				
				<div id="pnd_column_div" class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Column' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pnd_column">
						<option value="1"><?php esc_html_e( 'Column 1' , 'qc-opd' ); ?></option>
						<option value="2"><?php esc_html_e( 'Column 2' , 'qc-opd' ); ?></option>
						<option value="3"><?php esc_html_e( 'Column 3' , 'qc-opd' ); ?></option>
						<option value="4"><?php esc_html_e( 'Column 4' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div id="pnd_width_div" class="qcpnd_single_field_shortcode hidden-div">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Min Width' , 'qc-opd' ); ?>
					</label>
					<input type="text" name="pnd_width" id="pnd_width" value="620" style="width: 200px;"> <?php esc_html_e( 'px' , 'qc-opd' ); ?>
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'List Order By' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pnd_orderby">
						<option value="date"><?php esc_html_e( 'Date' , 'qc-opd' ); ?></option>
						<option value="ID"><?php esc_html_e( 'ID' , 'qc-opd' ); ?></option>
						<option value="title"><?php esc_html_e( 'Title' , 'qc-opd' ); ?></option>
						<option value="modified"><?php esc_html_e( 'Date Modified' , 'qc-opd' ); ?></option>
						<option value="rand"><?php esc_html_e( 'Random' , 'qc-opd' ); ?></option>
						<option value="menu_order"><?php esc_html_e( 'Menu Order' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'List Order' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pnd_order">
						<option value="ASC"><?php esc_html_e( 'Ascending' , 'qc-opd' ); ?></option>
						<option value="DESC"><?php esc_html_e( 'Descending' , 'qc-opd' ); ?></option>
					</select>
				</div>
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Phone Icon' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="show_phone_icon">
						<option value="1"><?php esc_html_e( 'Show' , 'qc-opd' ); ?></option>
						<option value="0"><?php esc_html_e( 'Hide' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Link Icon' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="show_link_icon">
						<option value="1"><?php esc_html_e( 'Show' , 'qc-opd' ); ?></option>
						<option value="0"><?php esc_html_e( 'Hide' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Main Click Action' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="main_click_action">
						<option value="1"><?php esc_html_e( 'Go to Website' , 'qc-opd' ); ?></option>
						<option value="0"><?php esc_html_e( 'Call' , 'qc-opd' ); ?></option>
						<option value="3"><?php esc_html_e( 'Do Nothing' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Phone Number' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="phone_number">
						<option value="1"><?php esc_html_e( 'Show' , 'qc-opd' ); ?></option>
						<option value="0"><?php esc_html_e( 'Hide' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Embed Option' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="embed_option">
						<option value="true"><?php esc_html_e( 'Show' , 'qc-opd' ); ?></option>
						<option value="false"><?php esc_html_e( 'Hide' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
						<?php esc_html_e( 'Item Orderby' , 'qc-opd' ); ?>
					</label>
					<select style="width: 225px;" id="pd_itemorderby">
						<option value=""><?php esc_html_e( 'None' , 'qc-opd' ); ?></option>
						<option value="title"><?php esc_html_e( 'Title' , 'qc-opd' ); ?></option>
					</select>
				</div>
				
				<div class="qcpnd_single_field_shortcode">
					<label style="width: 200px;display: inline-block;">
					</label>
					<input class="pnd-sc-btn" type="button" id="qcpnd_add_shortcode" value="<?php esc_html_e( 'Generate Shortcode', 'qc-opd' ); ?>" />
				</div>
				
			</div>
			<div class="sbd_shortcode_container" style="display:none;">
				<div class="qcpnd_single_field_shortcode">
					<textarea style="width:100%;height:200px" id="sbd_shortcode_container"></textarea>
					<p><b><?php esc_html_e( 'Copy' , 'qc-opd' ); ?></b> <?php esc_html_e( 'the shortcode & use it any text block.', 'qc-opd' ); ?> <button class="sbd_copy_close button button-primary button-small" style="float:right"><?php esc_html_e( 'Copy & Close' , 'qc-opd' ); ?></button></p>
				</div>
			</div>
		</div>

	</div>
	<?php
	exit;
}

add_action( 'wp_ajax_show_qcpnd_shortcodes', 'qcpnd_render_shortcode_modal_free');



if ( ! function_exists( 'qcpnd_render_message_alert_modal_free' ) ) {
	function qcpnd_render_message_alert_modal_free() {

		$screen = get_current_screen();
      	if( isset( $screen->post_type ) && ( $screen->post_type == 'pnd' ) ){

		?>
		<div class="modal qcld_sbd_alert_msg_modal" style="display: none">
			<!-- Modal content -->
			<div class="modal-content">
				<span class="sbd_alert_msg_close">
					<span class="dashicons dashicons-no"></span>
				</span>
				<h3><?php esc_html_e( 'SBD - Alert' , 'qc-opd' ); ?></h3>
				<hr/>
				<div class="qcld_alert_wrap">
					<div class="qcld_alert_msg">
						<p><?php esc_html_e( 'A list should have more than just 1 item.' , 'qc-opd' ); ?></p>
						<p> <?php esc_html_e( 'We recommend' , 'qc-opd' ); ?> <b><?php esc_html_e( '10-30' , 'qc-opd' ); ?></b> <?php esc_html_e( 'links/businesses for each List.' , 'qc-opd' ); ?> </p> 
						<p><?php esc_html_e( 'Create multiple Lists and show them all on a page using the' , 'qc-opd' ); ?> <a href="<?php echo esc_url( admin_url('edit.php?post_type=pnd&page=sbd_settings#help') ); ?>" target="_blank"><?php esc_html_e( 'Shortcode Generator.' , 'qc-opd' ); ?></a></p>
					</div>
				</div>
				<div class="qcld_alert_msg_footer">
					<button class="sbd_alert_msg_close button button-primary button-small" ><?php echo esc_html('No'); ?></button> 
					<button class="sbd_add_more_item button button-primary button-small" ><?php echo esc_html('Add more item'); ?></button>
					
				</div>
			</div>

		</div>
		<?php
	
		}
	}
}

add_action( 'admin_footer', 'qcpnd_render_message_alert_modal_free');