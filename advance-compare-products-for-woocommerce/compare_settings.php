<?php 

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

function compare_settings(){
	
	wp_enqueue_script('wp-color-picker'); 
	
	wp_enqueue_style('wp-color-picker');		
	
	wp_enqueue_script("pcp-color_picker-js", plugin_dir_url(__FILE__)."js/pcp_color_picker.js",array('jquery'),'',true);
	
	wp_enqueue_style( 'style_custom_request', plugin_dir_url(__FILE__).'css/custom_css.css' );
	
			
	?>
	
    <div id="profile-page" class="wrap">
	<?php $tab = sanitize_text_field( $_GET['tab'] );	?>
	<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
			<a class="nav-tab <?php if($tab == 'general' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pcp-compare-manager&amp;tab=general">General</a>
			<a class="nav-tab <?php if($tab == 'cmp_tbl_set'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pcp-compare-manager&amp;tab=cmp_tbl_set">Compare Table Settings</a>
			<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pcp-compare-manager&amp;tab=premium">Premium</a>	</h2>
	<?php
    $plugin_dir_url = plugin_dir_url(__FILE__);
	if($tab == 'general' || $tab == '')
	{
		
	if ( ! empty( $_POST ) && check_admin_referer('phoen_compare_setting_my_action', 'phoen_compare_setting_my_fields') ) {
		
		if($_POST['pcp_save_all']){
			
			$is_enable= sanitize_text_field( $_POST['pcp_enable_product_page'] );
			
			$is_button= sanitize_text_field( $_POST['pcp_is_button'] );
			
			$pcpp_button_in_image_= sanitize_text_field( $_POST['pcpp_button_in_image_'] );
			
			$bt_lk_text= sanitize_text_field( $_POST['pcp_button_text'] );
			
			$bt_product_page= sanitize_text_field( $_POST['pcp_button_in_product_page'] );
			
			$bt_product_list= sanitize_text_field( $_POST['pcp_button_in_products_list'] );
			
			$auto_open= sanitize_text_field( $_POST['pcp_auto_open'] );
			
			
			$cmp_txt_clr= sanitize_text_field( $_POST['cmp_txt_color'] );
			
			$cmp_bt_clr= sanitize_text_field( $_POST['cmp_bt_color'] );
			
			$pcp_data=array('is_enable'=>$is_enable,'is_button'=>$is_button,'bt_lk_text'=>$bt_lk_text,
							
							'bt_product_page'=>$bt_product_page,'pcpp_button_in_image_'=>$pcpp_button_in_image_,
							
							'bt_product_list'=>$bt_product_list,'auto_open'=>$auto_open,
							
							'cmp_txt_clr'=>$cmp_txt_clr,'cmp_bt_clr'=>$cmp_bt_clr,
							
					);
			
				
		update_option('data_compare_product',$pcp_data);
		
		}
	}
	
		$pcp_dataa = get_option('data_compare_product');
		
		if(!empty($pcp_dataa)){
	
			extract($pcp_dataa);

		}	
		
	?>
    <div class="meta-box-sortables" id="normal-sortables">
				<div class="postbox " id="pho_wcpc_box">
					<h3><span class="upgrade-setting">Upgrade to the PREMIUM VERSION</span></h3>
					<div class="inside">
						<div class="pho_check_pin">

							<div class="column two">
								<!----<h2>Get access to Pro Features</h2>----->

								<p>Switch to the premium version </p>

								<div class="pho-upgrade-btn">
										<a target="_blank" href="http://www.phoeniixx.com/product/advance-compare-products-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
</div>
				<style>
				.form-table th {
					width: 270px;
					padding: 25px;
				}
				.form-table td {
					
					padding: 20px 10px;
				}
				.form-table {
					background-color: #fff;
				}
				

				.px-multiply{ color:#ccc; vertical-align:bottom;}

				.long{ display:inline-block; vertical-align:middle; }

				.wid{ display:inline-block; vertical-align:middle;}

				.up{ display:block;}

				.grey{ color:#b0adad;}
#pho_wcpc_box.postbox h3{ padding:0 0 0 10px;}
	</style>
	<form method="post" id="pcp_form">
      
	<?php wp_nonce_field( 'phoen_compare_setting_my_action', 'phoen_compare_setting_my_fields' ); ?>
	
	  <h3>General Settings</h3>
		<table class="form-table">
			<tbody>
				<tr valign="top" class="">
					<th class="titledesc" scope="row">Enable Plugin</th>
					<td class="forminp forminp-checkbox">
						<fieldset>
							<legend class="screen-reader-text"></legend>
							<label for="pcp_button_in_product_page">
								<input type="checkbox"  value="1" <?php echo esc_attr($is_enable==1)?'checked':'' ;?> id="pcp_enable_product_page" name="pcp_enable_product_page"> 
							</label> 
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th class="titledesc" scope="row">
						<label for="pcp_woocompare_is_button">Show Compare as a Button Or Link</label>
					</th>
					<td class="forminp forminp-select">
						<select class="" id="pcp_is_button" name="pcp_is_button">
							<option <?php echo esc_attr($is_button=='Button')? 'selected' : '' ;?> value="Button">Button</option>
							<option <?php echo esc_attr($is_button=='link')? 'selected' : '' ;?> value="link">Link</option>
					   </select> 				
					</td>
				</tr>
				<tr valign="top" class="pcpp_button_in_image_row" style="display:none;">
					<th class="titledesc" scope="row">Show Compare inside Image</th>
					<td class="forminp forminp-checkbox">
						<fieldset>
							<legend class="screen-reader-text"><span>Show Compare inside Image</span></legend>
							<label for="pcpp_button_in_image_">
								<input type="checkbox"  value="1" <?php echo esc_attr($pcpp_button_in_image_==1)?'checked':'' ;?> id="pcpp_button_in_image_" name="pcpp_button_in_image_">
							</label> 
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th class="titledesc" scope="row">
						<label for="pcp_button_text">Text for Link or Button</label>
					</th>
					<td class="forminp forminp-text">
						<input type="text" value="<?php echo esc_attr($bt_lk_text!='')?$bt_lk_text:'compare'; ?>" style="" id="pcp_button_text" name="pcp_button_text">
					</td>
				</tr>
				<tr valign="top" class="">
					<th class="titledesc" scope="row">Show compare button in products list and category pages</th>
					<td class="forminp forminp-checkbox">
						<fieldset>
							<legend class="screen-reader-text"><span>Show compare button in products list and category pages</span></legend>
							<label for="pcp_button_in_product_page">
								<input type="checkbox"  value="1" <?php echo esc_attr($bt_product_page==1)?'checked':'' ;?> id="pcp_button_in_product_page" name="pcp_button_in_product_page">
							</label> 
						</fieldset>
					</td>
				</tr>
				<tr valign="top" class="">
					<th class="titledesc" scope="row">Show Compare button on Product Page</th>
					<td class="forminp forminp-checkbox">
						<fieldset>
							<legend class="screen-reader-text"><span>Show button in single product page</span></legend>
							<label for="pcp_button_in_products_list">
								<input type="checkbox"  value="1" <?php echo esc_attr($bt_product_list==1)?'checked':'' ;?> id="pcp_button_in_products_list" name="pcp_button_in_products_list">
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top" class="">
					<th class="titledesc" scope="row">Immediately open Compare Popup</th>
					<td class="forminp forminp-checkbox">
						<fieldset>
							<legend class="screen-reader-text"><span>Open automatically popup</span></legend>
							<label for="pcp_woocompare_auto_open">
								<input type="checkbox"  value="1" <?php echo esc_attr($auto_open==1)?'checked':'' ;?> class="" id="pcp_auto_open" name="pcp_auto_open">
							</label> 
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
		
		<h3>Style Table Settings</h3>
		<table class="form-table">
			<tbody>
				<tr class="user-user-login-wrap">
					<th><label for="cmp_txt_color">Compare Text Color:</label></th>
					<td><input type="text" class="popup_bg_color" value="<?php echo esc_attr($cmp_txt_clr!='')?$cmp_txt_clr:'' ;?>" id="cmp_txt_color" name="cmp_txt_color"></td>
				</tr>
				<tr class="user-user-login-wrap">
					<th><label for="cmp_bt_color">Compare Button Color:</label></th>
					<td><input type="text" class="popup_bg_color" value="<?php echo esc_attr($cmp_bt_clr!='')?$cmp_bt_clr:''; ?>" id="cmp_bt_color" name="cmp_bt_color"></td>
				</tr>
			</tbody>
		</table>		
		<input type="submit" value="Save Changes" class="button-primary" name="pcp_save_all"  style="float: left; margin-right: 10px;">
		
    </form>
	<?php
	}
	
	else if($tab == 'cmp_tbl_set')
	{
		require_once('compare_table_setting.php');
	}
	
	else if($tab == 'premium')
	{
		require_once('compare_premium.php');
	}
	
	}
	
?>