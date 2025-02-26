<?php
/*
   ** Added metabox in custom post type
   ** @since  1.1.1.1
   ** Post type: awesome_checkout
   */
add_action( 'add_meta_boxes','wacout_add_admin_meta_box');
function wacout_add_admin_meta_box(){
	//remove_meta_box( 'submitdiv', 'awesome_checkout', 'side' );
	add_meta_box(
		'wacout_metabox',
		__( 'Template Settings', 'wacout' ),
		'wacout_metabox_display_html',
		'awesome_checkout',
		'normal',
		'low'
	);
}



/*
   ** Added metabox Html
   ** @since  1.1.1.1
   ** Post type: awesome_checkout
   */
function wacout_metabox_display_html($meta_id){

	 $template_settings = get_post_meta( $meta_id->ID,'_wacout_template_layout_settings',true );

	if(isset($template_settings) && !empty($template_settings)){
		/*Template al setting*/
		$template_all_settings = $template_settings['template_layout_all_settings'];

		/*Template Section setting*/
		$temp_layout_selection = $template_all_settings['layout_select'];

		/*Template positions*/
		$temp_layout_position = $template_all_settings['layout_pos'];

		/*Template sorting*/
		$temp_layout_sorting = $template_all_settings['layout_sorting'];

		/*Template custom section*/
		$temp_layout_custom_sec = $template_all_settings['layout_custom_sections'];

		/*Template sections label*/
		$temp_layout_section_label = $template_all_settings['layout_sec_lbl'];

		/*Template form fields label*/
		$temp_layout_field_lbl = $template_all_settings['layout_fields_lbl'];

		/*Template form button text*/
		$temp_layout_button_text = $template_all_settings['layout_Button_text'];

		/*Template layout styling option*/
		$temp_layout_styling_option = $template_all_settings['layout_style_option'];

		/*Template layout products*/
		$temp_layout_more_product = $template_all_settings['layout_more_prd'];

	}

	/*meta box tab*/
	$type = get_post_type();
	$post_id = get_the_ID();
	if(isset($_GET['action']) && $_GET['action'] == 'edit'){$action = $_GET['action'];}else{$action = "edit";}


	if (isset($_GET['tab']) && !empty($_GET['tab'])) {
		$tab = $_GET['tab'];
	} else {
		$tab = 'wacout_layout';
	}

	$menus = array();
	$menus['wacout_layout'] = __('Layout' , 'wacout');
	$menus['wacout_cms_sec'] = __('Custom Sections' , 'wacout');
	$menus['wacout_fld_clr'] = __( 'Form Fields' , 'wacout' );
	$menus['wacout_product'] = __( 'Products' , 'wacout' );
	$menus['wacout_temp_style'] = __( 'Layout Styling' , 'wacout' );

	$menus = apply_filters('wacout_extand_layout_setting_menus', $menus);


?>
<div id="wacout_metabox_content">
	<div class="wacout_metabox_tabs_sidebar">
		<ul class="nav wacout_metabox_tabs_ul">
			<?php

				$i = 0;
				foreach ($menus as $key => $menu) {
					$i++;
					if(isset($_GET['action']) && $_GET['action'] == 'edit'){
						$tab_url = add_query_arg(array(
						'post' =>	absint($post_id),
						'action' => esc_html($action),
						'tab' => esc_html($key),
						), admin_url('post.php'));
						$create_post = "";
					}else{
						$tab_url = "#wacout_metabox_side_tab".$i;
						$create_post = "tab";
					}
				?>
				<li>
					<a class="wacout_side_tab <?php if (esc_html($tab) == esc_html($key)) echo 'active'; ?>" href="<?php echo esc_url($tab_url); ?>" data-toggle="<?php echo esc_attr($create_post);?>"><?php echo esc_html($menu); ?></a>
				</li>
				<?php
				}
				?>
		</ul>
		<?php
		$tab_url_new = add_query_arg(array(
					'post' =>	absint($post_id),
					'action' => esc_html($action),
					'tab' => esc_html($tab),
				), admin_url('post.php'));
		?>
			<input type="hidden" name="wacout_tab_url" id="wacout_tab_url" value="<?php echo esc_url($tab_url_new); ?>">
	</div>
	<div class="wacout_metabox_tabs_content">
		<div class="tab-content">
			<?php 
				/*layout html*/
				include(WACOUT_INC.'admin_temp_setting/wacout_layout_html.php');
	
				/*layout custom section html*/
				include(WACOUT_INC.'admin_temp_setting/wacout_cstm_sec_html.php');
	
				/*layout form field html*/
				include(WACOUT_INC.'admin_temp_setting/wacout_layout_form_fld.php');
	
				/*layout related and default product html*/
				include(WACOUT_INC.'admin_temp_setting/wacout_layout_product.php');

				/*layout related and default product html*/
				include(WACOUT_INC.'admin_temp_setting/wacout_layout_styling.php');
			?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
}


/**
* Insert values in postmeta table.
*/
add_action('save_post', 'wacout_save_postdata',10,2);
if ( ! function_exists( 'wacout_save_postdata' ) ){
	function wacout_save_postdata($post_id,$post)
	{
		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator', 'author');
		if(isset($_POST['save-post-nonce-field']) && check_admin_referer( 'post_save_wpnonce','save-post-nonce-field' ) && array_intersect($allowed_roles, $user->roles ) && wp_verify_nonce($_POST['save-post-nonce-field'],'post_save_wpnonce')){

		require_once(ABSPATH . 'wp-includes/pluggable.php');

		if( isset($_POST) && !empty($_POST['action']) && $_POST['action'] == 'editpost' || !empty($_POST['wacout_template_layout']) || !empty($_POST['wacout_sec_lbl']) || !empty($_POST['wacout_flds_lbls']) || !empty($_POST['wacout_btn_txt']) || !empty($_POST['wacout_layout_styling']) || !empty($_POST['wacout_custom_sections']) || !empty($_POST['wacout_csec_wp_editor1']) || !empty($_POST['wacout_csec_wp_editor2']) || !empty($_POST['wacout_csec_wp_editor3']) || !empty($_POST['wacout_more_prd']) || !empty($_POST['layout_pos']) || !empty($_POST['fields_required']) ){

			//for template selection
			$layout_settings['layout_select'] = absint($_POST['wacout_select_layout']);

			//for two column layout
			foreach($_POST['layout_pos'] as $temp_select_positions_key => $temp_select_positions_val){

				$temp_two_column[sanitize_key($temp_select_positions_key)] = sanitize_text_field($temp_select_positions_val);
			}
			$layout_settings['layout_pos'] = $temp_two_column;

			//for one column layout
			$layout_settings['layout_sorting'] = sanitize_text_field($_POST['wacout_template_layout']);

			// for custom section label

			foreach($_POST['wacout_custom_sections'] as $temp_custom_section_lbl_key => $temp_custom_section_lbl_key_val){

				$temp_custom_sec_lbl[sanitize_key($temp_custom_section_lbl_key)] = sanitize_text_field($temp_custom_section_lbl_key_val);

			}

			$layout_settings['layout_custom_sections'] = $temp_custom_sec_lbl;

			// for custom section editor1
			$layout_settings['layout_custom_sections']['wacout_csec_wp_editor1'] = wp_kses_post($_POST['wacout_csec_wp_editor1']);
			//Custom Sections editor2
			$layout_settings['layout_custom_sections']['wacout_csec_wp_editor2'] = wp_kses_post($_POST['wacout_csec_wp_editor2']);
			//Custom Sections editor3
			$layout_settings['layout_custom_sections']['wacout_csec_wp_editor3'] = wp_kses_post($_POST['wacout_csec_wp_editor3']);


			// for form sections
			foreach($_POST['wacout_sec_lbl'] as $temp_form_section_key => $temp_form_section_val){

				$temp_form_sec[sanitize_key($temp_form_section_key)] = sanitize_text_field($temp_form_section_val);

			}
			$layout_settings['layout_sec_lbl'] = $temp_form_sec;// section heading

			// for form fields
			foreach($_POST['wacout_flds_lbls'] as $temp_form_field_key => $temp_form_field_val){

				if($temp_form_field_key == 'fields_class'){
					foreach($temp_form_field_val as $temp_form_field_class_key => $temp_form_field_class_val){
						$form_fields['fields_class'][sanitize_key($temp_form_field_class_key)] = sanitize_html_class($temp_form_field_class_val);
					}
				}else{
					$form_fields[sanitize_key($temp_form_field_key)] = sanitize_text_field($temp_form_field_val);
				}
			}
			$layout_settings['layout_fields_lbl'] = $form_fields;


			// for button text and styling
			foreach($_POST['wacout_btn_txt'] as $temp_form_btn_txt_key => $temp_form_btn_txt_val){

				if( is_array($temp_form_btn_txt_val)){

					$colorArray = array('button_background', 'button_bg_hvr', 'button_font_color', 'button_border_color');


					foreach($temp_form_btn_txt_val as $temp_form_btn_style_key => $temp_form_btn_style_val){

						$temp	=	'';

						if(in_array($temp_form_btn_style_key, $colorArray, true)){

								$temp = sanitize_hex_color($temp_form_btn_style_val);
						} else {
								$temp = absint($temp_form_btn_style_val);
						}

						$button_fields[sanitize_key($temp_form_btn_txt_key)][sanitize_key($temp_form_btn_style_key)] = $temp;

					}

				}else{

					$button_fields[sanitize_key($temp_form_btn_txt_key)] = sanitize_text_field($temp_form_btn_txt_val);
				}
			}

			$layout_settings['layout_Button_text'] = $button_fields;// Button Text


			// for layout styling
			foreach($_POST['wacout_layout_styling'] as $temp_form_layout_styling_key => $temp_form_layout_styling_val){

				if(is_array($temp_form_layout_styling_val)){
					$layout_colorArray = array('hd_background','hd_font_color','lbl_font_color','fld_bdr_color');
					foreach($temp_form_layout_styling_val as $temp_form_layout_one_clmn_key => $temp_form_layout_one_clmn_val){
						$template = "";
						if(in_array($temp_form_layout_one_clmn_key, $layout_colorArray, true)){

								$template = sanitize_hex_color($temp_form_layout_one_clmn_val);
						} else {
								$template = absint($temp_form_layout_one_clmn_val);
						}

					$layout_one_column[sanitize_key($temp_form_layout_styling_key)][sanitize_key($temp_form_layout_one_clmn_key)] = $template;

					}
				}
			}
			$layout_settings['layout_style_option'] = $layout_one_column;

			// multiple related product
			for($i=0;$i<count($_POST['wacout_more_prd']['wacout_more_prd_des']);$i++){
				$more_prd['wacout_more_prd_des'][] = wp_kses_post($_POST['wacout_more_prd']['wacout_more_prd_des'][$i]);
				$layout_settings['layout_more_prd'] = array_replace($_POST['wacout_more_prd'],$more_prd);
			}
			$template_layout['template_layout_all_settings'] = $layout_settings;


			// required setting save in wp_options table
			$fields_req = $_POST['fields_required'];
			update_post_meta($post_id,'_wacout_fields_req',$fields_req);
			update_post_meta($post_id,'_wacout_template_layout_settings',$template_layout);

			remove_filter( current_filter(), __FUNCTION__ );

			if ( 'trash' !== $post->post_status ) //adjust the condition
			{
				$post->post_status = 'publish'; // use any post status
				wp_update_post( $post );
			}

		}
		// print_r($_POST['wacout_tab_url']);
		// die;
		if(isset($_POST['wacout_tab_url']) && !empty($_POST['wacout_tab_url'])){
			header("Location:".esc_url_raw($_POST['wacout_tab_url']));
			exit();
		}
	}
}
}

?>
