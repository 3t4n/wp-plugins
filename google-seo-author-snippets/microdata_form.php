<?php
/* Function for plugin configuration */
function gsas_microdata_configuration_page() {
	global $wpdb;
	$status['allowed']['debug_mode'] = 0;
		if(isset($_POST['save_seo_settings']) && sanitize_text_field($_POST['save_seo_settings']) == 'Save Settings') {
		$snip = $auto = $snippet_type = array();
		if(isset($_POST['snippets']) && !empty($_POST['snippets'])) {
			$snip = array_map( 'sanitize_text_field', wp_unslash( $_POST['snippets'] ) );
		}
		if(isset($_POST['auto']) && !empty($_POST['auto'])) {
			$auto = array_map( 'sanitize_text_field', wp_unslash( $_POST['auto'] ) );
		}
		if(isset($_POST['snippets_type']) && !empty($_POST['snippets_type'])) {
			$snippet_type = array_map( 'sanitize_text_field', wp_unslash( $_POST['snippets_type'] ) );
		}
		if(isset($_POST['debug_mode']) && !empty($_POST['debug_mode']) && $_POST['debug_mode'] == 'on') {
			$status['allowed']['debug_mode'] = 1;
		}
		update_option('smack_microdata_settings',$status);
		update_option('smack_gsas_post_check',$snip);
		update_option('smack_gsas_auto',$auto);
		update_option('smack_snippet_settings',$snippet_type);
	}
	$check1 = get_option('gsas_checked1');
	$check2 = get_option('gsas_checked2');
	$check3 = get_option('gsas_checked3');
	$check4 = get_option('gsas_checked4');
	$checkenab = get_option('gsas_checkenab');
	$html = '';
	$debug_mode = '';
	$html .= '<div class="wrap" >
		<div id="snippetsettings">
		<label><h3 style="margin-left:25px;font-style:italic;font-size: 1.6em;">Google SEO Pressor Rich Snippets</h3></label>
		<div id = "showdanger"></div>';
	$html .= '<form id="smack_microdata_form" name="smack_microdata_form" action="' . esc_url($_SERVER['REQUEST_URI']) .'" method="post">
		<div class="smack_schema_options">';
	$status = get_option('smack_microdata_settings');
	$imgpath = plugin_dir_url( __FILE__ );
	$html .= ' <div class="smack_schema_form_options">
		<table style="margin-left: 11%;"><tbody>
		<tr><td>
		<label id="textalign">Enable google SEO pressor rich snippets:</label>
		</td>';
	$html .='<td><div class="socialaccess" style="margin-right: 542px;">
		<input type="checkbox" id="enable" name="option" value="enable" onclick="enable_imageset();" checked="checked" style="display:none">
		<label id="sociallabel" for="enable"></label>
		</div>
		</td></tr>';
		$html .= '<tr><td>
		<label id="textalign">Debug Mode</label>
		</td><td>
		<div class="socialaccess" style="margin-right: 542px;">';
	if($status['allowed']['debug_mode']==1){  $debug_mode = 'checked'; }
		$html .= '<input type="checkbox" name="debug_mode" '.esc_attr($debug_mode).'  id="debug_mode"  style="display:none" ><label id="sociallabel" for="debug_mode"> </label>
		</div>
		</td></tr>
		</tbody></table><br>
		<table><h3>Cofigurations:</h3>
		<tr><td><div style="margin-left:11%;"><input type="checkbox" id="author" onclick="author_snippets()" '.esc_attr($check1).' /><label id="textalign"> Author</label>  <div class="tooltip"><img src = "'.esc_url($imgpath."/images/helpicon.jpg").'" width = 18px height = 18px/><span class="tooltiptext">If it is enabled, it will shows the Author for every snippets </span></div></div><br>
		<div style="margin-left:11%;"><input type="checkbox" id="date" onclick="date_snippets()" '.esc_attr($check2).' /><label id="textalign"> Date</label>&nbsp;<div class="tooltip"><img src = "'.esc_url($imgpath."/images/helpicon.jpg").'" width = 18px height = 18px/><span class="tooltiptext">if it is enabled, it will shows the Date for every snippets </span></div></div><br>
		<div style="margin-left:11%;"><input type="checkbox" id="display" onclick="display_snippets()" '.esc_attr($check4).' /><label id="textalign"> Show Snippets</label>&nbsp;<div class="tooltip"><img src = "'.esc_url($imgpath."/images/helpicon.jpg").'" width = 18px height = 18px/><span class="tooltiptext">if it is enabled, it will Display snippets on every post </span></div></div><br>
		<div style="margin-left:11%;"><input type="checkbox" id="format" onclick="format_snippets()"'.esc_attr($check3).' /><label id="textalign"> Based on Format</label>  <div class="tooltip"><img src = "'.esc_url($imgpath."/images/helpicon.jpg").'" width = 18px height = 18px/><span class="tooltiptext">If is enabled , it will shows the "Snippets" based on Post Format </span></div></div><br></td></tr></table>
		</div>
		</div>  <br/>';

	$html .=	'<div id="smack-container">';
	$html .= '<div id = "disp_posttype" style = "display:block;min-height:275px;">
		<h3>Snippets:</h3>
		<table style="margin-left: 10%;">  
		<tr style="height:45px"> 
		<th><h3 style="margin-left: -58%;"> Post types</h3></th>
		<th><h3 style="margin-left: -58%;"> Rich snippets</h3></th>
		</tr>';

	$get_type = get_post_types();
	if(isset($get_type)) {
		foreach($get_type as $post_types => $value1 ){
			if (($value1 != 'customize_changeset') && ($value1 != 'shop_webhook') && ($value1 != 'shop_order_refund') && ($value1 != 'featured_image') && ($value1 != 'attachment') && ($value1 != 'wpsc-product') && ($value1 != 'wpsc-product-file') && ($value1 != 'revision') && ($value1 != 'nav_menu_item')&& ($value1 != 'wp-types-group') && ($value1 != 'wp-types-user-group') &&  ($value1 != 'product_variation') && ($value1 != 'shop_order') && ($value1 != 'shop_coupon') && ($value1 != 'acf') && ($value1 != 'createdByCCTM') && ($value1 != 'createdByTypes') && ($value1 != 'scheduled-action')) {
				$html .= ' <tr style="height:45px">
					<td> ';
				$get_option = get_option('smack_gsas_post_check');
				$post_type_selected = '';
				if(!empty($get_option)) {
					foreach($get_option as $post_types => $val) {
						if( (isset($post_types) && ($post_types == $value1 ) && ( $val == 'on'))) {
							$post_type_selected = 'checked';
						}
					}
				}
				$html .= '<label id="textalign"> <input type = "checkbox" name = "'.esc_attr("snippets[".$value1."]").'" id = "'.esc_attr($value1).'" '.esc_attr($post_type_selected).' />'. esc_html($value1).'</label> </td>';
				$html .= '                <td style="padding-left:26px">';
				$snippets = get_option('smack_gsas_snippets_types');
				$html .= '<select name = "'.esc_attr("snippets_type[".$value1."]").'" id = "'.esc_attr($value1).'" >';
				$html .= '		<option value = "--select--"> --select--</option>';

				$snippet_settings = get_option('smack_snippet_settings');
				foreach($snippets as $key ) {
					if( trim($key) == trim($snippet_settings[$value1]) ) {
						$html .= '<option value = "'.esc_attr($key).'" selected="selected"> '.esc_html($key).' </option>';
					} else {
						$html .= '<option value = "'.esc_attr($key).'" >'.esc_html($key).' </option>';
					}
				}
				$html .= '</select>
					</td>
					<td>';
				$get_auto = get_option('smack_gsas_auto');
				
				$auto_checked = '';
				if(!empty($get_auto)){
					foreach($get_auto as $sauto => $autoval) {
						if(($sauto == $value1 ) && ($autoval == 'on'))  {
							$auto_checked = 'checked';
						}
					}
				}
				if($value1 != 'product'){
					$hidden = 'hidden';
				}
				else
					$hidden = '';
					
					$html .= ' <label style = "padding-left:40%;" hidden ><input type ="checkbox" name = "'.esc_attr("auto[".$value1."]").'" id = "'.esc_attr($value1).'" onclick = "'.esc_js("auto(this.id)").';" '.esc_attr($auto_checked).' /></label>
		     </td>

					</td>
					</tr> ';
			} } }
				$html .= '</table>
				</div>';
				// To hide
				$html .= '<input type="hidden" name="posted" value="posted">
					</div>';
				$html .= '	<p class="submit">
					<input type="submit" name="save_seo_settings" value="Save Settings" class="button-primary"/>
					</p>
					</form>
					</div>
					</div> ';
				echo $html;

}
?>
