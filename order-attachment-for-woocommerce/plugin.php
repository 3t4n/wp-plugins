<?php
/**
* Plugin Name: Order Attachment for Woocommerce

* Plugin URI: https://www.phoeniixx.com/product/order-attachment-for-woocommerce/

* Description: This is a simple plugin which helps you to attached the pdf file on your customer orders.

* Version: 3.0

* Text Domain: phoen_woo_order_Attachment

* Author: Phoeniixx

* Author URI: http://www.phoeniixx.com/

* License: GPL2

* WC requires at least: 2.6.0

* WC tested up to: 3.9.0
*/ 
if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	include(dirname(__FILE__).'/libs/execute-libs.php');
	
	define('PHOEN_DPADPLUGDIRPATH',plugin_dir_path(  __FILE__));
	
	add_action('admin_menu', 'phoen_order_main_menu');
	
		function phoen_order_main_menu(){

			add_menu_page('Order Attachment','Attachment','manage_options','phoen_Attachment','',plugin_dir_url(__FILE__).'assets/images/logo.png',23);
		
			add_submenu_page( 'phoen_Attachment','Attachment','attachment','manage_options','phoen_Attachment','phoen_Attachment_function');
		
		}
	
	function phoen_Attachment_function(){
		
		$gen_settings = get_option('phoe_disc_value');
			 
			$enable_disc=isset($gen_settings['enable_disc'])?$gen_settings['enable_disc']:'';

				?>
			
			<div id="profile-page" class="wrap">
		
				<?php
					
				if(isset($_GET['tab']))
						
				{
					$tab = sanitize_text_field( $_GET['tab'] );
					
				}
				
				else
					
				{
					
					$tab="";
					
				}
				
				?>
				<h2> <?php _e('Settings','phoen_woo_order_Attachment'); ?></h2>
				
				<?php $tab = (isset($_GET['tab']))?$_GET['tab']:'';?>
				
				<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
				
				<a class="nav-tab <?php if($tab == 'phoen_attachment_setting' ){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=phoen_Attachment&amp;tab=phoen_attachment_setting"><?php _e('Setting','phoen_woo_order_Attachment'); ?></a>	
					
				<a class="nav-tab <?php if($tab == 'phoen_attachment_premium' ){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=phoen_Attachment&amp;tab=phoen_attachment_premium"><?php _e('Premium','phoen_woo_order_Attachment'); ?></a>					

					
				</h2>
				
			</div>
			
			<?php
			
			if($tab=='phoen_attachment_premium'){
				
				 include_once(plugin_dir_path(  __FILE__).'includes/attachment_premium.php'); 
				 
			}elseif($tab=='phoen_attachment_setting' || $tab == ''){
				
				 include_once(plugin_dir_path(  __FILE__).'includes/phoen_attachment_setting.php'); 
				 
			} 
		
	}
	
	register_activation_hook( __FILE__, 'phoe_dpad_attachment_fn');

		function phoe_dpad_attachment_fn()
		{
			
			$phoe_disc_value = 1;
				
			update_option('phoe_attach_value',$phoe_disc_value);	
							
		}
	
	add_action('admin_head','phoen_Attachment_plugin_header_scripts');
	
	function phoen_Attachment_plugin_header_scripts(){
		
		wp_enqueue_script('jquery-ui-datepicker');
		
		wp_enqueue_script('jquery-ui-accordion');
		
		wp_enqueue_media();
		
		wp_enqueue_style('phoen-Attachment-ui-css',plugin_dir_url(__FILE__).'assets/css/admin_jquery_css_backend.css'); 		
		
	}
	
	$gen_settings = get_option('phoe_attach_value');
	
	if($gen_settings ==1 ){
		
		add_action('add_meta_boxes',function(){
			add_meta_box('custom_order_option', 'Attachment Box', 'phoen_Attachment_fn','shop_order');
		});
	
	}
	
	
	function phoen_Attachment_fn($post){
		$order_id=$post->ID;
		$data =get_post_meta( $order_id, 'my_custom_val', true );
		
		if(!empty($data)){
			?>
			<div class="accordion">
				<h3><?php echo $data['attachment_name'] ? $data['attachment_name'] :'Attachment';?><input type="button" id="remove_data" value="X" /></h3>
				<div id="phoen_Attachment" class="phoen_new_Attachment"></br>
					<label><?php _e('Attachment Name','phoen_woo_order_Attachment'); ?></label>		
					<input type="text" value="<?php echo $data['attachment_name'];?>" name="attachment_name" /></br>
					<div class="phoe-file-data-box"></br></br>
						<div class="upload_file">
							<label><?php _e('Upload a file (Only .pdf allowed)','phoen_woo_order_Attachment'); ?></label>																
							<input type="file" accept="application/pdf" name="file_upload" class="file_input"  /> </br></br>
							<span><?php echo $data['name'];?></span>
						</div>						
					</div>
				</div>
			</div>
			 
			<?php
			
		}else{
		?>
			<div class="accordion">
				<h3><?php _e('Attachment','phoen_woo_order_Attachment'); ?><input type="button" id="remove_data" value="X" /></h3>
				<div class="phoen_new_Attachment">
					</br>
					<label><?php _e('Attachment Name','phoen_woo_order_Attachment'); ?></label>		
					<input type="text" name="attachment_name" /></br>
					<div class="phoe-file-data-box"></br></br>
						<div class="upload_file">
							<label><?php _e('Upload a file (Only .pdf allowed)','phoen_woo_order_Attachment'); ?></label>	
							<input type="file" accept="application/pdf" name="file_upload" class="file_input"  /> </br></br>
						</div>						
					</div>
				</div>
			</div>
		
		<?php
		}	
		?>
				
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery( function(){
					jQuery('div.accordion').accordion({
						collapsible: true,
					});
				});

				jQuery(document).on('click',  '#remove_data', function(e){	
					e.preventDefault();
					// jQuery(this).remove();
					jQuery(this).parent().parent('div.accordion').remove();
					jQuery(".accordion").accordion("refresh");
					
			})
				
			})
			
			
			
		</script>
		<?php
	}
add_action('post_edit_form_tag',"phoen_easy_business_directory_form");
	function phoen_easy_business_directory_form(){
		echo 'enctype="multipart/form-data"';
	}
 	add_action('save_post_shop_order','phoen_new_function',10,2);
	function phoen_new_function($ID,$post){
		$order_id=$post->ID;
		$attachment_name=sanitize_text_field($_POST['attachment_name']);
		$file_list=$_FILES['file_upload'];
	
	/* 	print_r($file_list);
		die(); */
		if(!empty($file_list) && !empty($attachment_name)){
			
			$type=$file_list['type'];
			$name=$file_list['name'];
		
			$_FILES = array('Attachment_upload_image'=>$file_list);
			$attachment_id= media_handle_upload('Attachment_upload_image',$order_id);
			$upload_url=wp_get_attachment_url($attachment_id);	
		
			if($type=="application/pdf"){
				$phoen_finel_array=array(
					'attachment_name'=>$attachment_name,
					'order_id'=>$order_id,
					'name'=>$name,
					'gallery_upload_url'=>$upload_url,
				); 
				update_post_meta( $order_id, 'my_custom_val', $phoen_finel_array);	
			}else{
				$phoen_finel_array=array(); 
				update_post_meta( $order_id, 'my_custom_val', $phoen_finel_array);					
			}
	
		}
		
			
			
		 	
	}

	function phoen_view_order_content($order_id) {
		
		$data =get_post_meta( $order_id, 'my_custom_val', true );
		
		$order = wc_get_order( $order_id );
		
		$order_user_id = $order->get_user_id();
		
		$user_id=get_current_user_id();
		
		if(!empty($data) && $order_user_id==$user_id){
			echo '<div>';
			echo '<h2>Attachment</h2>';
			echo '<h5>'.$data['attachment_name'].'</h5>';
			echo '<span>'.$data['name'].'</span>';
			echo '<a class="button" href="'. $data['gallery_upload_url'] .'" download>Download</a>';	
			echo '</div>';
		}
		
	}

	$gen_settings = get_option('phoe_attach_value');
	
	if($gen_settings ==1 ){
		
		add_action( 'woocommerce_account_view-order_endpoint', 'phoen_view_order_content', 50);

	}
		
}else
{	 
	?>
		<div class="error notice is-dismissible " id="message"><p><?php _e( 'Please', 'phoen_woo_order_Attachment' ); ?><strong><?php _e( 'Activate', 'phoen_woo_order_Attachment' ); ?></strong><?php _e( ' WooCommerce Plugin First, to use it.', 'phoen_woo_order_Attachment' ); ?></p>
			<button class="notice-dismiss" type="button"><span class="screen-reader-text"><?php _e( 'Dismiss this notice.', 'phoen_woo_order_Attachment' ); ?></span></button>
		</div>
	<?php 
}  
?>
