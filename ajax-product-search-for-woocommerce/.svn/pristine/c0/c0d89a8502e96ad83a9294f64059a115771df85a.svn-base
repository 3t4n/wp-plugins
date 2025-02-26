<?php

if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb,$table_prefix;

/* Form Post Data */

wp_enqueue_media();

$plugin_dir_url =  plugin_dir_url( __FILE__ );

if( isset($_POST['submit']) && sanitize_text_field( $_POST['submit'] ) == 'Save') {
	
	if ( ! isset( $_POST['ajax_product_search_setting_nonce'] ) || ! wp_verify_nonce( $_POST['ajax_product_search_setting_nonce'], 'ajax_product_search_setting_submit' ) ) 
	{

	   print 'Sorry, your nonce did not verify.';
	   exit;

	} 
	else {
		
		$search_inp_label_p = sanitize_text_field( $_POST['search_inp_label'] );

		$search_sub_label_p = sanitize_text_field( $_POST['search_sub_label'] );

		$min_num_of_char_p = sanitize_text_field( $_POST['min_num_of_char'] );
		
		$max_num_of_result_p = sanitize_text_field( $_POST['max_num_of_result'] );
		
		$loader_image = sanitize_text_field( $_POST['loader_image'] );
		
		$search_field_placeholder = sanitize_text_field( $_POST['search_field_placeholder'] );

		$result1 = update_option('phoe_s_search_inp_label',$search_inp_label_p,'yes');

		$result2 = update_option('phoe_s_search_sub_label',$search_sub_label_p,'yes');

		$result3 = update_option('phoe_s_min_num_of_char',$min_num_of_char_p,'yes');

		$result4 = update_option('phoe_s_max_num_of_result',$max_num_of_result_p,'yes');
		
		$result6 = update_option('phoe_s_loader_image',$loader_image,'yes');
		
		$result7 = update_option('phoe_s_search_field_placeholder',$search_field_placeholder,'yes');

		if($result1 == 1 || $result2 == 1 || $result3 == 1 || $result4 == 1  || $result6 == 1 || $result7 == 1)
		{
		?>

			<div class="updated" id="message">

				<p><strong><?php _e('Setting updated.','ph-ajax-pro-search');?></strong></p>

			</div>

		<?php
		}
		else
		{
			?>
				<div class="error below-h2" id="message"><p><?php _e('Something went wrong please try again with valid data.','ph-ajax-pro-search');?> </p></div>
			<?php
		}
		
	}

	

}


?>

<div id="profile-page" class="wrap">

<?php
	if(isset($_GET['tab'])){
			$tab = sanitize_text_field( $_GET['tab'] );
	}else{
		$tab = '';
	}
	
?>

<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
	<a class="nav-tab <?php if($tab == 'set' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=ph_ajax_pro_search_setting&amp;tab=set"><?php _e('Settings','ph-ajax-pro-search');?></a>
	<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=ph_ajax_pro_search_setting&amp;tab=premium"><?php _e('Premium Version','ph-ajax-pro-search');?></a>

</h2>
<?php
if($tab == 'set' || $tab == '')
{
	
	$search_inp_label = get_option('phoe_s_search_inp_label');
	
	$search_sub_label = get_option('phoe_s_search_sub_label');
	
	$min_num_of_char = get_option('phoe_s_min_num_of_char');
	
	$max_num_of_result = get_option('phoe_s_max_num_of_result');
	
	$loader_image = get_option( 'phoe_s_loader_image' );
	
	$search_field_placeholder = get_option( 'phoe_s_search_field_placeholder' );
	
?>
<div class="meta-box-sortables" id="normal-sortables">

	<style>
	.phoe_video_main {
		padding: 20px;
		text-align: center;
	}
	
	.phoe_video_main h3 {
		color: #02c277;
		font-size: 28px;
		font-weight: bolder;
		margin: 20px 0;
		text-transform: capitalize
		display: inline-block;
	}
	</style>
	
	<div class="postbox " id="pho_wcpc_box">
					
					<div class="inside">
						<div class="pho_check_pin">

							<div class="column two">
								<!----<h2>Get access to Pro Features</h2>----->

					<p><?php _e('Switch to the premium version Ajax Product Search for more features.','ph-ajax-pro-search');?> </p>

					<div class="pho-upgrade-btn">
										<a target="_blank" href="https://www.phoeniixx.com/product/ajax-product-search-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>assets/images/premium-btn.png" /></a>
										<a href="http://ajaxsearch.phoeniixxdemo.com/" target="_blank"><img src="<?php echo $plugin_dir_url; ?>assets/images/button2.png"></a>
									</div>
				</div>
			</div>
		</div>
	</div>
		
	<div class="phoe_video_main">
		<h3><?php _e('How to set up plugin','ph-ajax-pro-search');?></h3> 
		<iframe width="800" height="360"src="https://www.youtube.com/embed/DroDH_bv8Do" allowfullscreen></iframe>
	</div>	

<form novalidate="novalidate" method="post" action="" >
   <?php wp_nonce_field( 'ajax_product_search_setting_submit', 'ajax_product_search_setting_nonce' ); ?>
<h3><?php _e('General settings','ph-ajax-pro-search');?></h3>

<table class="form-table">

	<tbody>

		<tr class="user-user-login-wrap">

			<th><label for="search_inp_label"><?php _e('Label for search input field :','ph-ajax-pro-search');?> </label></th>
			
			<td><input type="text" class="regular-text" id="search_inp_label" value="<?php echo $search_inp_label; ?>" name="search_inp_label" /></td>

		</tr>
		
		<tr class="user-user-login-wrap">

			<th><label for="search_field_placeholder"> <?php _e('Search text field placeholder :','ph-ajax-pro-search');?></label></th>
			
			<td><input type="text"  value="<?php echo $search_field_placeholder; ?>" class="regular-text" id="search_field_placeholder" name="search_field_placeholder" /></td>

		</tr>
		
		<tr class="user-user-login-wrap">

			<th><label for="min_num_of_char"> <?php _e('User has to put minimum number of characters for search results :','ph-ajax-pro-search');?> </label></th>
			
			<td><input type="number" step="1" max="10" min="1" style="width:50px;" value="<?php echo $min_num_of_char; ?>" class="regular-text" id="min_num_of_char" name="min_num_of_char" /></td>

		</tr>
		

		<tr class="user-user-login-wrap">

			<th><label for="search_sub_label"> <?php _e('Label for search submit button :','ph-ajax-pro-search');?></label></th>
			
			<td><input type="text" class="regular-text" id="search_sub_label" value="<?php echo $search_sub_label; ?>" name="search_sub_label" /></td>

		</tr>
		
		<tr class="user-user-login-wrap">

			<th><label for="max_num_of_result"> <?php _e('Maximum number of results to display below search text field :','ph-ajax-pro-search');?></label></th>
			
			<td><input type="number" step="1" max="10" min="1" style="width:50px;" value="<?php echo $max_num_of_result; ?>" class="regular-text" id="max_num_of_result" name="max_num_of_result" /></td>

		</tr>
				
		<tr class="user-user-login-wrap">

			<th><label for="loader_image"><?php _e('Loader image :','ph-ajax-pro-search');?></label></th>
			
			<td><input type="text"  value="<?php echo $loader_image; ?>" class="regular-text" id="loader_image" name="loader_image" /><input class="button uploadimage" type="button" value="Upload" /></td>

		</tr>
		
	</tbody>

</table>	

<p class="submit"><input type="submit" value="Save" class="button button-primary" id="submit" name="submit"></p>

</form>

</div>	
<?php
}
else if($tab == 'premium')
{
	require_once(dirname(__FILE__).'/premium-setting.php');
}

?>			
</div>
<script>

jQuery(document).ready(function($)
{

	var custom_upload;

	$(document).on("click",".uploadimage",uploadimage_button);

		function uploadimage_button(){

					//textid = this.id+'1';

					var custom_upload = wp.media({

					title: 'Add Media',

					button: {

						text: 'Insert Image'

					},

					multiple: false  // Set this to true to allow multiple files to be selected

				})

				.on('select', function() {

					var attachment = custom_upload.state().get('selection').first().toJSON();

					//$('.custom_media_image').attr('src', attachment.url);

					$('#loader_image').val(attachment.url);

				})

				.open();

		}
		
});
</script>
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
h3 {
    padding: 10px;
}
.pho-upgrade-btn > a:focus {
	box-shadow: none !important;
}

</style>