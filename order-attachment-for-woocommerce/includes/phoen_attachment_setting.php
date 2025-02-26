<?php if ( ! defined( 'ABSPATH' ) ) exit;

if ( isset($_POST["phoe_attachment_action_form_nonce_field"]) && wp_verify_nonce( $_POST['phoe_attachment_action_form_nonce_field'], 'phoe_attachment_form_action' ) ) {

	if(isset($_POST['disc_submit']) && sanitize_text_field( $_POST['disc_submit'] ) == 'Save'){
		
		$enable_attach=isset($_POST['enable_attach'])? sanitize_text_field($_POST['enable_attach']):'';
						
		update_option('phoe_attach_value',$enable_attach);
		
	}
	 
}

	$gen_settings = get_option('phoe_attach_value');			
	
	$plugin_dir_url = plugin_dir_url( __FILE__ );
 ?>

	<div id="phoeniixx_phoe_Disc_wrap_profile-page" class=" phoeniixx_phoe_Disc_wrap_profile_div">
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
	
	<div class="pho-upgrade-btn">
		<a href="https://www.phoeniixx.com/product/order-attachment-for-woocommerce/" target="_blank"><img src="<?php echo $plugin_dir_url; ?>../assets/images/premium-btn.png" /></a>
		<a target="blank" href="http://orderattachment.phoeniixxdemo.com/wp-login.php?redirect_to=http%3A%2F%2Forderattachment.phoeniixxdemo.com%2Fwp-admin%2F&reauth=1"><img src="<?php echo $plugin_dir_url; ?>../assets/images/button2.png" /></a>
	</div>
	
	<div class="phoe_video_main">
		<h3><?php _e('How to set up plugin','phoen_woo_order_Attachment'); ?> </h3> 
		<iframe width="800" height="360"src="https://www.youtube.com/embed/XNu-QnoMyeY" allowfullscreen></iframe>
	</div>
	
		<form method="post" id="phoeniixx_phoe_Disc_wrap_profile_form" action="" >
		
			<?php wp_nonce_field( 'phoe_attachment_form_action', 'phoe_attachment_action_form_nonce_field' ); ?>
			
			<table class="form-table">
				
				<tbody>	
		
					<tr class="phoeniixx_phoe_Disc_wrap">
				
						<th>
						
							<label><?php _e('Enable Attachment','phoen_woo_order_Attachment'); ?> </label>
							
						</th>
						
						<td>
						
							<input type="checkbox"  name="enable_attach" id="enable_attach" value="1" <?php echo(isset($gen_settings) && $gen_settings == '1')?'checked':'';?>>
							
						</td>
						
					</tr>
							
					<tr class="phoeniixx_phoe_Disc_wrap">
					
						<td colspan="2">
						
							<input type="submit" value="Save" name="disc_submit" id="submit" class="button button-primary">
						
						</td>
						
					</tr>
		
				</tbody>
				
			</table>
			
		</form>
		
	</div>
	
	<style>
	.pho-upgrade-btn {
				margin-top: 15px;
	}
	
	a:focus {
		box-shadow: none;
	}
	
	</style>