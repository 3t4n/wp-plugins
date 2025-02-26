<?php
	
	/*		
		
		Plugin Name: CBFunnelPro
		Plugin URI: https://cbfunnelpro.com/introduction-to-cbfunnelpro/
		Description: CBFunnelPro is the go-to WordPress plugin for boosting ClickBank sales. It automates campaigns, tracks conversions, inserts banners and text links with your affiliate ID, and follows up with subscribers until they purchase — while you focus on publishing relevant content for your audience.
		Version: 1.0.2
		Author: Crispin Thomas
		Author URI: https://cbfunnelpro.com/
		License: GPLv2 or later
		License URI: https://www.gnu.org/licenses/gpl-2.0.html
		Text Domain: cbfunnelpro
		
	*/
	
	if (!defined('ABSPATH')){ exit;}
	
	
	// Add filter to process shortcodes in widgets.
	add_filter('widget_text', 'do_shortcode');
	
	// Define constants using safe methods for directory paths.
	define('cbfnl_DIR', plugin_dir_path(__FILE__));
	define('cbfnl_URL', plugin_dir_url(__FILE__));
	define('cbfnl_JS_URL', cbfnl_URL . 'scripts');
	define('cbfnl_CSS_URL', cbfnl_URL . 'styles');
	define('cbfnl_IMG_URL', cbfnl_URL . 'images');
	define('cbfnl_API_URL', 'https://cbfunnelpro.com/resources');
	
	// Include necessary WordPress functions.
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	// Activation hook to create database table and flush rewrite rules.
	register_activation_hook(__FILE__, 'cbfnl_activate');
	function cbfnl_activate() {
		cbfnl_create_table();
		flush_rewrite_rules();
	}
	
	// Function to create database table.
	function cbfnl_create_table() {
		global $wpdb;
		$table_name = $wpdb->prefix . "cbfunnelpro_banner";
		$charset_collate = $wpdb->get_charset_collate();
		
		$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		title varchar(55) DEFAULT '' NOT NULL,
		type varchar(55) DEFAULT '' NOT NULL,
		cbid varchar(55) DEFAULT '' NOT NULL,
		password varchar(55) DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
		) $charset_collate;";
		
		dbDelta($sql);
		
		// Add plugin options with defaults.
		add_option('cbfunnelpro_name', '');
		add_option('cbfunnelpro_email', '');
		add_option('cbfunnelpro_clickbankid', '');
		add_option('cbfunnelpro_password', '');
	}
	
	// Deactivation hook to clean up.
	register_deactivation_hook(__FILE__, 'cbfnl_deactivate');
	function cbfnl_deactivate() {
		flush_rewrite_rules();
		delete_option('cbfunnelpro_name');
		delete_option('cbfunnelpro_email');
		delete_option('cbfunnelpro_clickbankid');
	}
	
	// Enqueue admin CSS and scripts.
	add_action('admin_enqueue_scripts', 'cbfnl_admin_assets');
	function cbfnl_admin_assets($hook) {
		if (strpos($hook, 'cbfunnelpro_setting') !== false) {
			wp_enqueue_style('cbfunnelpro_admin_css', cbfnl_CSS_URL . '/cbfnl_style.css', array(), '1.0');
			wp_enqueue_style('cbfunnelpro_banner_css',cbfnl_CSS_URL.'/bannerstyle.css','','1');	
			wp_enqueue_script('jquery');
		}
	}
	
	function cbfnl_banner_css(){  		
		
		wp_enqueue_style('cbfunnelpro_banner_css',cbfnl_CSS_URL.'/bannerstyle.css','','1');		
	}	
	add_action( 'admin_head', 'cbfnl_banner_css' );	
	
	// Add admin menu and submenus.
	add_action('admin_menu', 'cbfnl_build_menu');
	function cbfnl_build_menu() {
		add_menu_page(
		__('CBFunnelPro', 'cbfunnelpro'), 
		__('CBFunnelPro', 'cbfunnelpro'), 
		'manage_options', 
		'cbfunnelpro_setting', 
		'cbfnl_setting_page', 
		'dashicons-admin-generic', 
		25
		);
		add_submenu_page(
		'cbfunnelpro_setting', 
		__('Product Selection', 'cbfunnelpro'), 
		__('Product Selection', 'cbfunnelpro'), 
		'manage_options', 
		'cbfnl_product_selection', 
		'cbfnl_product_selection'
		);
		add_submenu_page(
		'cbfunnelpro_setting', 
		__('Display Settings', 'cbfunnelpro'), 
		__('Display Settings', 'cbfunnelpro'), 
		'manage_options', 
		'cbfnl_display_settings', 
		'cbfnl_display_settings'
		);
		add_submenu_page(
		'cbfunnelpro_setting', 
		__('Analytics', 'cbfunnelpro'), 
		__('Analytics', 'cbfunnelpro'), 
		'manage_options', 
		'cbfnl_show_reports', 
		'cbfnl_show_reports'
		);
		add_submenu_page(
		'cbfunnelpro_setting', 
		__('Feedback', 'cbfunnelpro'), 
		__('Feedback', 'cbfunnelpro'), 
		'manage_options', 
		'cbfnl_feedback', 
		'cbfnl_feedback'
		);
	}
	
	
	function cbfnl_include_styles(){
		
		wp_enqueue_style('cbfunnelpro_banner_css',cbfnl_CSS_URL.'/bannerstyle.css','','1');
		wp_enqueue_style('cbfunnelpro_admin_css', cbfnl_CSS_URL . '/cbfnl_style.css', array(), '1.0');
		
	}
	
	
	function cbfnl_feedback() {
		
		cbfnl_include_styles();
		
		$displayresult = '';
		
		if (isset($_POST['cbfnl_msg_submit']) && check_admin_referer('cbfnl_msg_submit', 'cbfnl_msg_nonce')) {
			// Sanitize and validate user inputs
			$msgcat = sanitize_text_field(wp_unslash($_POST['cbfnl_msg_category']  ?? ''));
			$msgsubj = sanitize_text_field(wp_unslash($_POST['cbfnl_msg_subject'] ?? ''));
			$msgcomment = sanitize_textarea_field(wp_unslash($_POST['cbfnl_msg_comment'] ?? ''));
			
			// Retrieve plugin settings or user information
			$username = get_option('cbfunnelpro_name');
			$user_email = get_option('cbfunnelpro_email');
			$clickbank_id = get_option('cbfunnelpro_clickbankid');
			$domain = esc_url(site_url());
			
			
			// Set the API URL for feedback submission
			$url = esc_url(cbfnl_API_URL . '/sendmsg.php');
			
			// Send POST request using wp_remote_post
			$response = wp_remote_post($url, [
			'method' => 'POST',
			'body' => [
			'username' => $username,
			'useremail' => $user_email,
			'cbid' => $clickbank_id,
			'category' => $msgcat,
			'subj' => $msgsubj,
			'comment' => $msgcomment,
			'domain' => $domain,
            ],
			]);
			
			// Check response for errors
			if (is_wp_error($response)) {
				$displayresult = __('Error: Unable to send message. Please try again later.', 'cbfunnelpro');
				} else {
				$displayresult = wp_strip_all_tags(wp_remote_retrieve_body($response));
			}
		}
	?>
    <div>
        <h2 style="text-align: center;"><?php esc_attr_e('Your Feedback', 'cbfunnelpro'); ?></h2>
        <?php if (!empty($displayresult)) : ?>
		<h3 style="color: #f00; text-align: center;"><?php echo esc_html($displayresult); ?></h3>
        <?php endif; ?>
		
        <form action="" method="post" id="cbfnl_msg_form">
            <div class="banner">
                <div class="banner_left">
                    <label for="cbfnl_msg_category"><strong><?php esc_attr_e('Category', 'cbfunnelpro'); ?></strong></label>
				</div>
                <div class="banner_right">
                    <select name="cbfnl_msg_category" id="cbfnl_msg_category" required>
                        <option value=""><?php esc_attr_e('- Select One Option from this List -', 'cbfunnelpro'); ?></option>
                        <option value="General Review Comment or question"><?php esc_attr_e('General Review Comment or question', 'cbfunnelpro'); ?></option>
                        <option value="Report a Bug or Problem"><?php esc_attr_e('Report a Bug or Problem', 'cbfunnelpro'); ?></option>
                        <option value="Request additional Feature"><?php esc_attr_e('Request additional Feature', 'cbfunnelpro'); ?></option>
					</select>
				</div>
				
                <div class="banner_left">
                    <label for="cbfnl_msg_subject"><strong><?php esc_attr_e('Subject', 'cbfunnelpro'); ?></strong></label>
				</div>
                <div class="banner_right">
                    <input type="text" name="cbfnl_msg_subject" id="cbfnl_msg_subject" required />
				</div>
				
                <div class="banner_left">
                    <label for="cbfnl_msg_comment"><strong><?php esc_attr_e('Message Body', 'cbfunnelpro'); ?></strong></label>
				</div>
                <div class="banner_right">
                    <textarea name="cbfnl_msg_comment" id="cbfnl_msg_comment" style="width: 448px; height: 200px;" placeholder="<?php esc_attr_e('Please Enter Your Message Here', 'cbfunnelpro'); ?>"></textarea>
				</div>
				
                <?php wp_nonce_field('cbfnl_msg_submit', 'cbfnl_msg_nonce'); ?>
				
				<div class="banner_left"></div>
				
                <div class="banner_right">
                    <input class="button button-primary button-large" type="submit" name="cbfnl_msg_submit" value="<?php esc_attr_e('Send Message', 'cbfunnelpro'); ?>" />
				</div>
			</div>
			
            <div class="banner_right" style="margin:auto">
                <p><center><strong>Note:</strong> We usually respond to all messages that require feedback within 1 business day.</center></p>
			</div>
		</form>
	</div>
    <?php
	}
	
	add_filter( 'the_content', 'cbfnl_add_after_content', 1);	
	
	function cbfnl_add_after_content(){			
		
		if (is_single()){			
			$after_content=cbfnl_content_banner();			
			}else{			
			$after_content="";			
		}
		
		return get_the_content().$after_content;		
		
		
	}	
	
	
	
	
	function cbfnl_show_reports(){		
		
		$args=array('in_footer'  => true);
		
		wp_enqueue_style('cbfunnelpro_report_css',cbfnl_CSS_URL.'/bannerstyle.css?d='.gmdate("l jS \of F Y h:i:s A"),'','1');
		wp_enqueue_script('cbfunnelpro_report_js',cbfnl_API_URL.'/reportscripts.js?s'.gmdate('l jS \of F Y h:i:s A'),'','1', $args);
		
		
		$cbid=get_option("cbfunnelpro_clickbankid");
	?>	
	
	<html>		
		
		<h2 id="reportHeading">Performance Report for <?php  echo esc_html(strtoupper($cbid)); ?></h2>		
		
		<div id="cbfnl_select_report">			
			<select name="cbfnl_select_date_range" id="cbfnl_select_date_range"  onchange="getreportdata('<?php  echo esc_html($cbid); ?>')" required > 				
				
				<option value=1 default>Today</option>				
				<option value=2>Yesterday</option>					
				<option value=3>This Month</option>					
				<option value=4>Last Month</option>					
				<option value=5>This Year</option>				
				
				
			</select>			
		</div>		
		
		<img id="cbfnl_loading" width="100" height="100" src="<?php echo esc_html(cbfnl_IMG_URL);?>/loading.gif" >		
		
		<div id="reportContainer">						
			<div id="cbfnl_report_grid" class="cbfnl_report_grid"></div>			
			
			<br>			
			
			<div id="reportButtons">				
				<input type="button" class="button button-primary button-large" value="Reload Report Data" onclick="getreportdata('<?php  echo esc_html($cbid); ?>')">				
				
				<input type="hidden" value=<?php  echo esc_html($cbid); ?> id="clickbank_id" >				
			</div>			
		</div>
		
	</html>	
	<?php	
	}	
	
	
	function cbfnl_product_selection(){	
		
		
		wp_enqueue_style('cbfunnelpro_report_css',cbfnl_CSS_URL.'/bannerstyle.css?d='.gmdate("l jS \of F Y h:i:s A"),'','1');
		wp_enqueue_script('cbfunnelpro_functions',cbfnl_JS_URL.'/cbfnl_functions.js','','1', true);
		cbfnl_include_styles();		
		
		$cbfnl_category=get_option('cbfnl_category');		
		$cbfnl_sub_category=get_option('cbfnl_sub_category');
		$cbfnl_affid=get_option('cbfunnelpro_clickbankid');
		
		$url=cbfnl_API_URL."/getimages.php?cat=".$cbfnl_category."&subcat=".$cbfnl_sub_category."&affid=".$cbfnl_affid;
		
		$prod_message="";
		
		$allselections="'";		
		
		if (
		isset($_POST['cbfunnelpro_products_save']) &&
		isset($_POST['cbfunnelpro_products_save_nonce']) &&
		wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['cbfunnelpro_products_save_nonce'])), 'cbfunnelpro_products_save')
		){			
			
			if(count($_POST)==1){				
				$prod_message='<p style="font-size:16px;color:red; text-align:center">Settings Not Saved. You need to select at least one product</p>';							
				
				}else{								
				foreach ($_POST as $key => $value) {					
					$allselections.= htmlspecialchars($key)."' , '";	
					$allselections.= sanitize_text_field(wp_unslash(htmlspecialchars($key))."' , '");
				}
								
				update_option('cbfnl_prod_chkbox_status', $allselections);				
				$prod_message= "Settings Saved Successfully";							
				
			}			
			
			
		}		
		
		$cbfnl_prod_chkbox_status=get_option('cbfnl_prod_chkbox_status');		
		
		
	?> 	
	
	
	
	<h2><center>Product Selection</center></h2> 	
	
	
	<p style="font-size:16px; color:red; text-align:center"><?php echo esc_textarea($prod_message); ?></p>	
	
	<p id="prod_selection_heading" style="font-size:18px;color:black; text-align:center">Select Products from the List Below to be Promoted	</p>	
	
	
	
	<form method="POST" id="cbfunnelpro_product_form" onload="getProductsContent(<?php echo esc_url($url); ?>)" action="<?php the_permalink(); ?>">		
		
		<div id="cbfnl_prod_images"></div>		
		
		
		<br>		
		
		<div class="banner_right" style="text-align:center">			
			
			<input type="submit" class="button-grey" type="submit" name="cbfunnelpro_products_save" id="cbfunnelpro_products_save"  value="Save Product Selections" title="Save Product Selections" />	
			
			<?php wp_nonce_field('cbfunnelpro_products_save', 'cbfunnelpro_products_save_nonce'); ?> 
			
			
		</div>		
		
	</form>	
	
	
	<div class="banner_right" style="text-align:center">		
		
		<input style="margin:auto; text-align:center; margin-right:10px; display:none" class="button button-primary button-large"  name="cbfunnelpro_products_selall" value="Select All" title="Select All" onclick="cbfnl_products_selall()"/>		
		
		
		<input style="margin:auto; text-align:center; display:none" class="button button-primary button-large"  name="cbfunnelpro_products_deselall" value="Deselect All" title="Deselect All" onclick="cbfnl_products_deselall()"/>		
		
		
	</div>
	
	
	<?php
		
		// Define the PHP variables you want to pass to functions
		$image_data = array(
        'cbfnl_category' => $cbfnl_category,
		'cbfnl_subcat'=> $cbfnl_sub_category,
		'resourcePath'=> cbfnl_API_URL,
		'affid'=> $cbfnl_affid,
		'cbfnl_prod_chkbox_status'=>$cbfnl_prod_chkbox_status
		);
		
		// Pass data to your script
		wp_localize_script('cbfunnelpro_functions', 'cbfnlData', $image_data);	
		
	}  	
	
	
	function cbfnl_display_settings(){
		
		wp_enqueue_script('cbfunnelpro_functions',cbfnl_JS_URL.'/cbfnl_functions.js','','1', true);
		wp_enqueue_style('cbfunnelpro_style',cbfnl_CSS_URL.'/cbfnl_style.css','','1');
		
		$cbfunnelpro_advance_saved_setting="";
		
		if (isset($_POST['cbfunnelpro_advance_setting_save']) &&
		isset($_POST['cbfunnelpro_advance_setting_save_nonce']) &&
		wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['cbfunnelpro_advance_setting_save_nonce'])), 'cbfunnelpro_advance_setting_save')	){	
			
			// Sanitize color inputs
			$cbfnl_line_color = isset($_POST['cbfnl_line_color']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_line_color'])) : '';
			$cbfnl_text_color = isset($_POST['cbfnl_text_color']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_text_color'])) : '';
			$cbfnl_bkg_color = isset($_POST['cbfnl_bkg_color']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_bkg_color'])) : '';
			$cbfnl_bkg_hover_color = isset($_POST['cbfnl_bkg_hover_color']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_bkg_hover_color'])) : '';
			
			// Sanitize checkboxes (ensure they are boolean values)
			$cbfnl_show_home = isset($_POST['cbfnl_show_home']) ? intval(wp_unslash($_POST['cbfnl_show_home'])) : 0;
			$cbfnl_show_search = isset($_POST['cbfnl_show_search']) ? intval(wp_unslash($_POST['cbfnl_show_search'])) : 0;
			$cbfnl_show_pages = isset($_POST['cbfnl_show_pages']) ? intval(wp_unslash($_POST['cbfnl_show_pages'])) : 0;
			
			// Sanitize other inputs
			$cbfnl_font_size = isset($_POST['cbfnl_font_size']) ? intval(wp_unslash($_POST['cbfnl_font_size'])) : '';
			$cbfnl_font_family = isset($_POST['cbfnl_font_family']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_font_family'])) : '';
			$cbfnl_number_of_results = isset($_POST['cbfnl_number_of_results']) ? intval(wp_unslash($_POST['cbfnl_number_of_results'])) : '';
			
			
			// Sanitize other checkboxes
			$cbfnl_show_header_text = isset($_POST['cbfnl_show_header_text']) ? intval($_POST['cbfnl_show_header_text']) : 0;
			$cbfnl_show_header_image = isset($_POST['cbfnl_show_header_image']) ? intval($_POST['cbfnl_show_header_image']) : 0;
			$cbfnl_show_header_mobile = isset($_POST['cbfnl_show_header_mobile']) ? intval($_POST['cbfnl_show_header_mobile']) : 0;
			
			$cbfnl_show_widget_text = isset($_POST['cbfnl_show_widget_text']) ? intval($_POST['cbfnl_show_widget_text']) : 0;
			$cbfnl_show_widget_image = isset($_POST['cbfnl_show_widget_image']) ? intval($_POST['cbfnl_show_widget_image']) : 0;
			$cbfnl_show_widget_mobile = isset($_POST['cbfnl_show_widget_mobile']) ? intval($_POST['cbfnl_show_widget_mobile']) : 0;
			
			$cbfnl_show_content_text = isset($_POST['cbfnl_show_content_text']) ? intval($_POST['cbfnl_show_content_text']) : 0;
			$cbfnl_show_content_image = isset($_POST['cbfnl_show_content_image']) ? intval($_POST['cbfnl_show_content_image']) : 0;
			$cbfnl_show_content_mobile = isset($_POST['cbfnl_show_content_mobile']) ? intval($_POST['cbfnl_show_content_mobile']) : 0;
			
			$cbfnl_show_footer_text = isset($_POST['cbfnl_show_footer_text']) ? intval($_POST['cbfnl_show_footer_text']) : 0;
			$cbfnl_show_footer_image = isset($_POST['cbfnl_show_footer_image']) ? intval($_POST['cbfnl_show_footer_image']) : 0;
			$cbfnl_show_footer_mobile = isset($_POST['cbfnl_show_footer_mobile']) ? intval($_POST['cbfnl_show_footer_mobile']) : 0;
			
			
			if (is_null($cbfnl_show_header_text)){$cbfnl_show_header_text=0;}			
			if (is_null($cbfnl_show_header_image)){$cbfnl_show_header_image=0;}			
			if (is_null($cbfnl_show_header_mobile)){$cbfnl_show_header_mobile=0;}
			if (is_null($cbfnl_show_widget_text)){$cbfnl_show_widget_text=0;}			
			if (is_null($cbfnl_show_widget_image)){$cbfnl_show_widget_image=0;}			
			if (is_null($cbfnl_show_widget_mobile)){$cbfnl_show_widget_mobile=0;}			
			if (is_null($cbfnl_show_content_text)){$cbfnl_show_content_text=0;}			
			if (is_null($cbfnl_show_content_image)){$cbfnl_show_content_image=0;}			
			if (is_null($cbfnl_show_content_mobile)){$cbfnl_show_content_mobile=0;}			
			if (is_null($cbfnl_show_footer_text)){$cbfnl_show_footer_text=0;}			
			if (is_null($cbfnl_show_footer_image)){$cbfnl_show_footer_image=0;}			
			if (is_null($cbfnl_show_footer_mobile)){$cbfnl_show_footer_mobile=0;}			
			
			
			
			update_option("cbfnl_line_color",$cbfnl_line_color);			
			update_option("cbfnl_text_color",$cbfnl_text_color);			
			update_option("cbfnl_bkg_color",$cbfnl_bkg_color);			
			update_option("cbfnl_bkg_hover_color",$cbfnl_bkg_hover_color);			
			
			update_option("cbfnl_show_home", $cbfnl_show_home);
			update_option("cbfnl_show_search", $cbfnl_show_search);
			update_option("cbfnl_show_pages", $cbfnl_show_pages);
			
			update_option("cbfnl_font_size", $cbfnl_font_size);			
			update_option("cbfnl_font_family", $cbfnl_font_family);			
			update_option("cbfnl_number_of_results", $cbfnl_number_of_results);
			
			update_option("cbfnl_show_header_text", $cbfnl_show_header_text);			
			update_option("cbfnl_show_header_image", $cbfnl_show_header_image);			
			update_option("cbfnl_show_header_mobile", $cbfnl_show_header_mobile);
			
			update_option("cbfnl_show_widget_text", $cbfnl_show_widget_text);			
			update_option("cbfnl_show_widget_image", $cbfnl_show_widget_image);			
			update_option("cbfnl_show_widget_mobile", $cbfnl_show_widget_mobile);			
			
			update_option("cbfnl_show_content_text", $cbfnl_show_content_text);			
			update_option("cbfnl_show_content_image", $cbfnl_show_content_image);			
			update_option("cbfnl_show_content_mobile", $cbfnl_show_content_mobile);			
			
			update_option("cbfnl_show_footer_text", $cbfnl_show_footer_text);			
			update_option("cbfnl_show_footer_image", $cbfnl_show_footer_image);			
			update_option("cbfnl_show_footer_mobile", $cbfnl_show_footer_mobile);			
			
			$cbfunnelpro_advance_saved_setting= "Display Settings Saved";			
			
		}		
		
		
		$cbfnl_line_color=get_option('cbfnl_line_color', '#ff0000');		
		$cbfnl_text_color=get_option('cbfnl_text_color','#000000');		
		$cbfnl_bkg_color=get_option('cbfnl_bkg_color','#FFFFFF');		
		$cbfnl_bkg_hover_color=get_option('cbfnl_bkg_hover_color', '#FFFF00');		
		
		$cbfnl_show_home=get_option("cbfnl_show_home", true);
		$cbfnl_show_search=get_option("cbfnl_show_search", true);
		$cbfnl_show_pages=get_option("cbfnl_show_pages", true);
		
		$cbfnl_font_size=get_option("cbfnl_font_size", 16);		
		$cbfnl_font_family=get_option("cbfnl_font_family");		
		$cbfnl_number_of_results=get_option("cbfnl_number_of_results", 1);
		
		$cbfnl_show_header_text=get_option('cbfnl_show_header_text', true);		
		$cbfnl_show_header_image=get_option('cbfnl_show_header_image',1);		
		$cbfnl_show_header_mobile=get_option('cbfnl_show_header_mobile',1);
		
		$cbfnl_show_widget_text=get_option('cbfnl_show_widget_text', true);		
		$cbfnl_show_widget_image=get_option('cbfnl_show_widget_image',1);		
		$cbfnl_show_widget_mobile=get_option('cbfnl_show_widget_mobile',1);		
		
		$cbfnl_show_content_text=get_option('cbfnl_show_content_text',1);		
		$cbfnl_show_content_image=get_option('cbfnl_show_content_image',1);		
		$cbfnl_show_content_mobile=get_option('cbfnl_show_content_mobile',1);		
		
		$cbfnl_show_footer_text=get_option('cbfnl_show_footer_text',1);		
		$cbfnl_show_footer_image=get_option('cbfnl_show_footer_image',1);		
		$cbfnl_show_footer_mobile=get_option('cbfnl_show_footer_mobile',1);		
		
		
	?>		
	
	
	
	<h2><center>Display Setting</center></h2>		
	
	<form action="" method="post" name="cbfunnelpro_advance_setting_form" id="cbfunnelpro_advance_setting_form" >				
		
		
		<div class="banner">			
			
			<div id="cbfunnelpro_advanced_saved_status"><h3 id="savedStatus" ><?php  echo esc_textarea($cbfunnelpro_advance_saved_setting) ?></h3></div>			
			
			<div class="banner_right">				
				<p class="section_heading">Choose General Ad Placements</p>				
			</div>	
			
			
			<div class="banner_right">				
				<input class="section_heading" type="checkbox" name="cbfnl_show_home"  value="1"  id="cbfnl_show_home" />Show On Home Page				
			</div>	
			
			<div class="banner_right">				
				<input class="section_heading" type="checkbox" name="cbfnl_show_search"  value="1"  id="cbfnl_show_search" />Show On Search Results
			</div>	
			
			<div class="banner_right">				
				<input class="section_heading" type="checkbox" name="cbfnl_show_pages"  value="1"  id="cbfnl_show_pages" />Show On Pages
			</div>	
			
			
			<p class="section_heading" >Select Where and How Ads Can be Shown</p>			
			
			<div id="cbfnl_image_options">				
				
				<div><b>Location</b></div><div><b>Show Text</b></div><div><b>Show Image</b></div><div><b>Show Text/Image on Mobile</b></div>
				
				<div>Header</div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_header_text"  value="1"  id="cbfnl_show_header_text" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_header_image"  value="1"  id="cbfnl_show_header_image" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_header_mobile"  value="1"  id="cbfnl_show_header_mobile" /></div>
				
				
				<div>Widget</div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_widget_text"  value="1"  id="cbfnl_show_widget_text" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_widget_image"  value="1"  id="cbfnl_show_widget_image" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_widget_mobile"  value="1"  id="cbfnl_show_widget_mobile" /></div>				
				
				<div>Content</div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_content_text"  value="1"  id="cbfnl_show_content_text" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_content_image"  value="1"  id="cbfnl_show_content_image" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_content_mobile"  value="1"  id="cbfnl_show_content_mobile" /></div>				
				
				<div>Footer</div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_footer_text"  value="1"  id="cbfnl_show_footer_text" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_footer_image"  value="1"  id="cbfnl_show_footer_image" /></div>				
				<div><input class="cbfnl_option_chk_box" type="checkbox" name="cbfnl_show_footer_mobile"  value="1"  id="cbfnl_show_footer_mobile" /></div>				
				
				
			</div>					
			
			
			
			<p class="section_heading">Rotate the Top Results</p>			
			
			<div class="banner_left">				
				<label><strong>Number of Results</strong></label>				
			</div>			
			<div class="banner_right_font">				
				<select name="cbfnl_number_of_results" id="cbfnl_number_of_results"  required > 					
					
					<option value=1>1</option>					
					<option value=2>2</option>					
					<option value=3>3</option>					
					
					
				</select>				
			</div>
			
			<?php	
				
				// Define the PHP variables you want to pass to functions
				$display_data = array(
				'cbfnl_show_header_text' => $cbfnl_show_header_text,
				'cbfnl_show_header_image' => $cbfnl_show_header_image,
				'cbfnl_show_header_mobile' => $cbfnl_show_header_mobile,
				
				'cbfnl_show_widget_text' => $cbfnl_show_widget_text,
				'cbfnl_show_widget_image' => $cbfnl_show_widget_image,
				'cbfnl_show_widget_mobile' => $cbfnl_show_widget_mobile,
				
				'cbfnl_show_content_text' => $cbfnl_show_content_text,
				'cbfnl_show_content_image' => $cbfnl_show_content_image,
				'cbfnl_show_content_mobile' => $cbfnl_show_content_mobile,
				
				'cbfnl_show_footer_text' => $cbfnl_show_footer_text,
				'cbfnl_show_footer_image' => $cbfnl_show_footer_image,
				'cbfnl_show_footer_mobile' => $cbfnl_show_footer_mobile,
				
				'cbfnl_number_of_results' => $cbfnl_number_of_results,
				'cbfnl_show_home' => $cbfnl_show_home,
				'cbfnl_show_search' => $cbfnl_show_search,
				'cbfnl_show_pages' => $cbfnl_show_pages,
				
				'cbfnl_font_size' => $cbfnl_font_size,
				'cbfnl_font_family' => $cbfnl_font_family,
				
				'resourcePath'=> cbfnl_API_URL
				
				);
				
				// Pass data to your script
				wp_localize_script('cbfunnelpro_functions', 'cbfnlData', $display_data);
				
				
				$cbfnl_custom_css="	
				
				#bannerpvw{	
				
				background-color:{$cbfnl_bkg_color};		
				border-bottom: 2px solid {$cbfnl_line_color};		
				border-top: 2px solid {$cbfnl_line_color};		
				color:{$cbfnl_text_color};		
				
				}		
				
				#bannerpvw:hover{	
				
				background-color:{$cbfnl_bkg_hover_color};
				}		
				
				#bannerpvw p{
				
				font-size:{$cbfnl_font_size}px;		
				font-family:{$cbfnl_font_family};	
				
				}				
				
				";
				
				// Add inline styles to the registered stylesheet
				wp_add_inline_style( 'cbfunnelpro_style', $cbfnl_custom_css);
				
			?>
			
			
			
			<br>			
			
			<p class="section_heading">Select the Text Ad Properties to Match Your Website Design</p>			
			
			<div class="banner_left">				
				<label><strong>Font Size</strong></label>				
			</div>			
			<div class="banner_right_font">				
				<select name="cbfnl_font_size" id="cbfnl_font_size"  required > 					
					
					<option value=10>10</option>					
					<option value=12>12</option>					
					<option value=14>14</option>					
					<option value=16>16</option>					
					<option value=18>18</option>					
					<option value=20>20</option>					
					
				</select>				
			</div>			
			
			<div class="banner_left">				
				<label><strong>Font Family</strong></label>				
			</div>			
			<div class="banner_right_font">				
				<select name="cbfnl_font_family" id="cbfnl_font_family"  required > 					
					
					<option value="Arial">Arial</option>					
					<option value="Courier">Courier</option>					
					<option value="Calibri">Calibri</option>					
					<option value="Times New Roman">Times New Roman</option>					
					<option value="Tahoma">Tahoma</option>					
					<option value="Verdana">Verdana</option>					
					<option value="Helvetica">Helvetica</option>					
					
					
				</select>				
			</div><br>			
			
			<div>				
				<input type="color" id="cbfnl_line_color" name="cbfnl_line_color"				
				value="<?php  echo esc_textarea($cbfnl_line_color); ?>">				
				<label for="cbfnl_line_color">Line Color</label>				
			</div>			
			
			<div>				
				<input type="color" id="cbfnl_text_color" name="cbfnl_text_color"				
				value="<?php  echo esc_textarea($cbfnl_text_color); ?>">				
				<label for="cbfnl_text_color">Text Color</label>				
			</div>			
			
			<div>				
				<input type="color" id="cbfnl_bkg_color" name="cbfnl_bkg_color"				
				value="<?php  echo esc_textarea($cbfnl_bkg_color); ?>">				
				<label for="cbfnl_bkg_color">Background Color</label>				
			</div>			
			
			<div>				
				<input type="color" id="cbfnl_bkg_hover_color" name="cbfnl_bkg_hover_color"				
				value="<?php  echo esc_textarea($cbfnl_bkg_hover_color); ?>">				
				<label for="cbfnl_bkg_hover_color">Background Hover Color</label>				
			</div>			
			
			<br>
			
			<?php wp_nonce_field('cbfunnelpro_advance_setting_save', 'cbfunnelpro_advance_setting_save_nonce'); ?> 
			
			
			<div class="banner_right">				
				<input class="button-grey"  type="submit" id="cbfunnelpro_advance_setting_save" name="cbfunnelpro_advance_setting_save" value="Save Display Settings Changes" title="Save Display Settings Changes" />				
			</div>			
			
			
		</div>		
	</form>	<br>	
	
	
	
	<div>			
		
		<p><h3 style="margin:auto; text-align:center;">Text Ad Preview</h3></p>		
		<div id="bannerpvw"><p>Sample Text</p></div>			
		
	</div>	
	
	<?php 	
	}	
	
	
	function cbfnl_setting_page(){
		
		global $wpdb;
		
		$args=array('in_footer'  => true);
		
		wp_enqueue_style('cbfunnelpro_report_css',cbfnl_CSS_URL.'/bannerstyle.css?d='.gmdate("l jS \of F Y h:i:s A"),'','1');		
		wp_enqueue_script('cbfunnelpro_functions',cbfnl_JS_URL.'/cbfnl_functions.js','','1', true);		
		
		$site_url=site_url();
		
		if (
		isset($_POST['cbfunnelpro_setting_save']) &&
		isset($_POST['cbfunnelpro_setting_save_nonce']) &&
		wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['cbfunnelpro_setting_save_nonce'])), 'cbfunnelpro_setting_save')
		) {
			$username = isset($_POST['username']) ? sanitize_text_field(wp_unslash($_POST['username'])) : '';
			$user_email = isset($_POST['user_email']) ? sanitize_email(wp_unslash($_POST['user_email'])) : '';
			$clickbank_id = isset($_POST['clickbank_id']) ? sanitize_user(wp_unslash($_POST['clickbank_id'])) : '';
			$cbfnl_category = isset($_POST['cbfnl_category']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_category'])) : '';
			$cbfnl_sub_category = isset($_POST['cbfnl_sub_category']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_sub_category'])) : '';
			$cbfnl_tracking_id = isset($_POST['cbfnl_tracking_id']) ? sanitize_text_field(wp_unslash($_POST['cbfnl_tracking_id'])) : '';
			
			
			if(empty($username) || empty($user_email) || empty($clickbank_id) ){				
				$errormsg="Please fill (*) data";				
				$_SESSION["error"]=$errormsg;				
				}else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){				
				$errormsg="Please enter valid Email Address";				
				$_SESSION["error"]=$errormsg;				
				
			}			
			
			else{				
				update_option("cbfunnelpro_name",$username);				
				update_option("cbfunnelpro_email",$user_email);				
				update_option("cbfunnelpro_clickbankid",$clickbank_id);				
				update_option("cbfnl_category",$cbfnl_category);				
				update_option("cbfnl_sub_category",$cbfnl_sub_category);				
				update_option("cbfnl_tracking_id", $cbfnl_tracking_id);				
				
				
				$_SESSION["success"]="Your setting saved successfully.<br> Go to the Product Selection to choose the products you want to promote";				
			}			
			
			$url = cbfnl_API_URL."/updateuser.php";			
			
			$postDataArray = array(				
			'username'=> $username,			
			'user_email'=> $user_email,			
			'clickbank_id'=> $clickbank_id,			
			'cbfnl_category'=> $cbfnl_category,			
			'cbfnl_sub_category'=>$cbfnl_sub_category,			
			'cbfnl_tracking_id'=>$cbfnl_tracking_id,
			'site_url'=> $site_url
			
			);	
			
			
			
			$resp=wp_remote_post($url, array(
			'method' => 'POST',
			'body'=> array(
			'username'=> $username,			
			'user_email'=> $user_email,			
			'clickbank_id'=> $clickbank_id,			
			'cbfnl_category'=> $cbfnl_category,			
			'cbfnl_sub_category'=>$cbfnl_sub_category,			
			'cbfnl_tracking_id'=>$cbfnl_tracking_id,
			'site_url'=> $site_url 
			)
			
			));
			
			//print_r($resp);
			
			$cbfunnelpro_general_saved_setting="Settings Have Been Saved";	
			
			}else{
			
			$cbfunnelpro_general_saved_setting="";
			
		}		
		
		
		$username=get_option("cbfunnelpro_name");		
		$user_email=get_option("cbfunnelpro_email");		
		$clickbank_id=get_option("cbfunnelpro_clickbankid");		
		$cbfnl_category=get_option("cbfnl_category");		
		$cbfnl_sub_category=get_option("cbfnl_sub_category");		
		$cbfnl_tracking_id=get_option("cbfnl_tracking_id");	
		
		// Define the PHP variables you want to pass to functions
		$settings_data = array(
        'cbfnl_category' => $cbfnl_category,
		'cbfnl_subcat'=> $cbfnl_sub_category,
		'resourcePath'=> cbfnl_API_URL
		);
		
		// Pass data to your script
		wp_localize_script('cbfunnelpro_functions', 'cbfnlData', $settings_data);
		
	?>	
	
	<h2><center>General Settings</center></h2>	
	
	<div id="cbfunnelpro_general_saved_status" style="color:red; text-align:center;"><h3 id="generalSavedStatus" style="color:red; text-align:center;"><?php  echo esc_textarea($cbfunnelpro_general_saved_setting) ?></h3></div>
	
	
	
	<form action="" method="post" name="cbfunnelpro_setting_form" id="cbfunnelpro_setting_form" >
		
		
		
		<div class="banner">			
			<div class="banner_left">				
				<label><strong>Your Name </strong></label>				
			</div>			
			<div class="banner_right">				
				<input type="text" name="username" value="<?php echo esc_textarea($username);?>" required  />				
			</div>			
			
			<div class="banner_left">				
				<label><strong>Email Address</strong></label>				
			</div>			
			<div class="banner_right">				
				<input type="text" name="user_email" value="<?php echo esc_textarea($user_email);?>" required />				
			</div>			
			
			<div class="banner_left">				
				<label><strong>Clickbank ID</strong></label>				
			</div>			
			<div class="banner_right">				
				<input type="text" name="clickbank_id" value="<?php echo esc_textarea($clickbank_id);?>" required  />				
			</div>			
			
			<div class="banner_left">				
				<label><strong>Tracking ID</strong></label>				
			</div>			
			<div class="banner_right">				
				<input type="text" name="cbfnl_tracking_id" value="<?php echo esc_textarea($cbfnl_tracking_id);?>"  />				
			</div>			
			
			<div class="banner_left">				
				<label><strong>Category</strong></label>				
			</div>			
			<div class="banner_right" >				
				<select  name="cbfnl_category"  id="cbfnl_category" required onchange="cbfnl_clear_sub_cat()" ></select>				
				
			</div>			
			
			<div class="banner_left">				
				<label><strong>Sub Category</strong></label>				
			</div>			
			<div class="banner_right">				
				<select name="cbfnl_sub_category" id="cbfnl_sub_category" value="<?php echo esc_textarea($cbfnl_sub_category);?>"  > 					
					
				</select>				
			</div>			
			
			<div class="banner_left">				
				&nbsp;				
			</div>	
			
			<?php wp_nonce_field('cbfunnelpro_setting_save', 'cbfunnelpro_setting_save_nonce'); ?> 
			
			<div class="banner_right">				
				<input class="button-grey"  type="submit" name="cbfunnelpro_setting_save" id="cbfunnelpro_setting_save" value="Save Settings" title="Save Changes to Your Settings" />&nbsp;&nbsp;
				<a class="button button-primary button-large" href="https://cbfunnelpro.com/tutorials/" target="_blank">Tutorials</a> &nbsp;&nbsp;	
				<a class="button button-primary button-large" href="<?php echo admin_url('admin.php?page=cbfnl_show_reports'); ?>" >Analytics</a>
				<p>					
					
					<b>Notes:</b>&nbsp; Your <b>Name and Email </b>are 					
					required to give you access to reports on the performance of your website 					
				ads, and to customize your messages to clients. </p>				
				
				<p>Your <b>Clickbank ID (Nickname)</b> ensures that commissions are credited 					
				to your account</p>				
				
				<p><b>Category and Sub-Category</b> ensure that Ads Shown are relevant to your website content. The more specific your selection, the more relevant will the products shown be to your audience.</p>				
				
				<br>				
				
				<p class="section_heading">Select Short-Code</p>				
				
				<div id="cbfnl_copy_shortcode">					
					<select name="cbfnl_select_shortcode" id="cbfnl_select_shortcode"  onchange="changeshortcode()" required > 						
						<option value="header">Header</option>	
						<option value="widget" default>Widget</option>
						<option value="footer">Footer</option>																
						
					</select>					
					
					<input class="button button-primary button-large" type="button" value="Copy" onclick="copyToClipboard()">					
					
					<br>					
					<div id="display_shortcode">[cbfunnelpro location="header"]</div>					
				</div>				<br>								
				<p>Note: A shortcode is not required for "After Content" Ad Placement. Simply enable or disable Content in the Display Settings.</p>
			</div>			
		</form>	
		
		<?php
		}		
		
		
		add_shortcode("cbfunnelpro","cbfnl_cbfunnelpro_banner");		
		
		function cbfnl_cbfunnelpro_banner($attr=""){
			
			$args=array('in_footer'  => true);
			
			wp_enqueue_style('cbfunnelpro_banner_css',cbfnl_CSS_URL.'/bannerstyle.css?d='.gmdate("l jS \of F Y h:i:s A"),'','1');
			
			
			$session=get_option("cbfunnelpro_session", true);
			$cbfnl_show_home=get_option("cbfnl_show_home", true);
			$cbfnl_show_search=get_option("cbfnl_show_search", true);
			$cbfnl_show_pages=get_option("cbfnl_show_pages", true);
			
			
			if (is_home() and $cbfnl_show_home==false){
				return;
			}
			
			if (is_search() and $cbfnl_show_search==false){
				return;
			}
			
			if (is_page() and $cbfnl_show_pages==false){
				return;
			}
			
			$res=array();
			
			$cbfnl_show_header_text=get_option('cbfnl_show_header_text', 1);			
			$res[]=array('location'=> 'header', 'type'=>'text','ismobile'=> 0,'checked'=>$cbfnl_show_header_text);			
			
			$cbfnl_show_header_image=get_option('cbfnl_show_header_image',1);			
			$res[]=array('location'=> 'header', 'type'=>'image','ismobile'=> 0,'checked'=>$cbfnl_show_header_image);			
			
			$cbfnl_show_header_mobile=get_option('cbfnl_show_header_mobile',1);			
			$res[]=array('location'=> 'header', 'type'=>'text','ismobile'=> 1,'checked'=>$cbfnl_show_header_mobile);
			
			
			$cbfnl_show_widget_text=get_option('cbfnl_show_widget_text', 1);			
			$res[]=array('location'=> 'widget', 'type'=>'text','ismobile'=> 0,'checked'=>$cbfnl_show_widget_text);			
			
			$cbfnl_show_widget_image=get_option('cbfnl_show_widget_image',1);			
			$res[]=array('location'=> 'widget', 'type'=>'image','ismobile'=> 0,'checked'=>$cbfnl_show_widget_image);			
			
			$cbfnl_show_widget_mobile=get_option('cbfnl_show_widget_mobile',1);			
			$res[]=array('location'=> 'widget', 'type'=>'text','ismobile'=> 1,'checked'=>$cbfnl_show_widget_mobile);			
			
			$cbfnl_show_content_text=get_option('cbfnl_show_content_text',1);			
			$res[]=array('location'=> 'content', 'type'=>'text','ismobile'=> 0,'checked'=>$cbfnl_show_content_text);			
			
			$cbfnl_show_content_image=get_option('cbfnl_show_content_image',1);			
			$res[]=array('location'=> 'content', 'type'=>'image','ismobile'=> 0,'checked'=>$cbfnl_show_content_image);			
			
			$cbfnl_show_content_mobile=get_option('cbfnl_show_content_mobile',1);			
			$res[]=array('location'=> 'content', 'type'=>'text','ismobile'=> 1,'checked'=>$cbfnl_show_content_mobile);			
			
			$cbfnl_show_footer_text=get_option('cbfnl_show_footer_text',1);			
			$res[]=array('location'=> 'footer', 'type'=>'text','ismobile'=> 0,'checked'=>$cbfnl_show_footer_text);			
			
			$cbfnl_show_footer_image=get_option('cbfnl_show_footer_image',1);			
			$res[]=array('location'=> 'footer', 'type'=>'image','ismobile'=> 0,'checked'=>$cbfnl_show_footer_image);			
			
			$cbfnl_show_footer_mobile=get_option('cbfnl_show_footer_mobile',1);			
			$res[]=array('location'=> 'footer', 'type'=>'text','ismobile'=> 1,'checked'=>$cbfnl_show_footer_mobile);	
			
			
			$args = shortcode_atts( array(			
			
			'location' => 'widget'							
			
			), $attr );			
			
			$cbfnl_location=$args['location'];			
			
			
			$title = get_the_title();			
			$tags=get_the_tags();			
			$tags_list="";			
			
			$posttags = get_the_tags();			
			if ($posttags) {				
				foreach($posttags as $tag) {					
					$tags_list.=$tag->name . ' '; 					
				}				
			}			
			
			$tags_list=urlencode($tags_list);			
			
			
			$cbid = get_option("cbfunnelpro_clickbankid");			
			$category= (get_option("cbfnl_category"));			
			$subcat=(get_option("cbfnl_sub_category"));			
			$cbfnl_tracking_id=(get_option("cbfnl_tracking_id"));			
			
			$cbfnl_line_color=get_option('cbfnl_line_color', '#ff0000');			
			$cbfnl_text_color=get_option('cbfnl_text_color', '#000000');			
			$cbfnl_bkg_color=get_option('cbfnl_bkg_color','#FFFFFF');			
			$cbfnl_bkg_hover_color=get_option('cbfnl_bkg_hover_color', 'FFFF00');			
			
			$cbfnl_font_size=get_option("cbfnl_font_size", 16);			
			$cbfnl_font_family=get_option("cbfnl_font_family");			
			$cbfnl_prod_chkbox_status=get_option("cbfnl_prod_chkbox_status", "all");
			
			
			$cbfnl_prod_chkbox_status=rtrim($cbfnl_prod_chkbox_status,",-").'-';			
			
			$cbfnl_prod_chkbox_status_encoded=($cbfnl_prod_chkbox_status);			
			
			$cbfnl_number_of_results=get_option("cbfnl_number_of_results");			
			
			$ismobile=(wp_is_mobile()==true)? 1:0 ;			
			
			$displaytextinfo=cbfnl_display_value($res, $cbfnl_location, 'text', $ismobile );			
			$displayimageinfo=cbfnl_display_value($res, $cbfnl_location, 'image', $ismobile );
			
			if ($displaytextinfo=="none" and $displayimageinfo=="none"){
				
				return;
			}
			
			$siteurl=get_site_url();
			
			$url = cbfnl_API_URL.'/getmybanner2.php';	
			
			$resp=wp_remote_post($url, array(
			'method' => 'POST',
			'body'=> array(
			'title'=> $title,			
			'cat'=> $category,			
			'tid'=> $cbfnl_tracking_id,			
			'prodlist'=> $cbfnl_prod_chkbox_status_encoded,			
			'nads'=>$cbfnl_number_of_results,			
			'cbid'=>$cbid,			
			'subcat'=>$subcat,
			'country'=>'',
			'siteurl'=>$siteurl
			)
			
			));
			
			$bannerinfo=$resp['body'];			
			
			$bannerdata=json_decode($bannerinfo);			
			
			if ($bannerdata==-1){
				return;
			}
			
			$bannertext=$bannerdata[1];						
			$bannerimage=$bannerdata[0];			
			$href=$bannerdata[2];			
			$displaytext=$bannerdata[3];			
			$vendor=$bannerdata[4];			
			$hasemail=$bannerdata[6];			
			
			$displaytext=str_replace("'", " ", $displaytext);			
			
			$showpopup="showpopup('".$displaytext."','".$vendor."','".$cbfnl_tracking_id."' ,'".$cbid."' )";		
			
			$username1=get_option("cbfunnelpro_name");			
			
			$username=urlencode($username1);
			
			$session=cbfnl_randString();
			
			cbfnl_setparameters($session, $cbid, $vendor, $cbfnl_tracking_id, $username1);	
			
			$custom_banner_css="
			.bannerdisplay{
			
			background-color:{$cbfnl_bkg_color};			
			border-bottom: 2px solid {$cbfnl_line_color};			
			border-top: 2px solid {$cbfnl_line_color};			
			color:{$cbfnl_text_color};			
			font-size:{$cbfnl_font_size}px;			
			font-family:{$cbfnl_font_family};			
			text-align:center;			
			padding:10px;	
			text-decoration: none;
			
			}			
			
			.bannerdisplay:hover{
			
			background-color:{$cbfnl_bkg_hover_color};			
			cursor:pointer;			
			font-weight:bold;			
			color:{$cbfnl_text_color};			
			
			}			
			
			.bannerdisplay a{
			
			color:{$cbfnl_text_color};			
			text-decoration:none;			
			text-align:center;
			
			}			
			
			.bannerdisplay p{
			
			font-family: {$cbfnl_font_family};
			font-size: {$cbfnl_font_size}px;
			color: {$cbfnl_text_color};
			text-decoration: none;
			
			}
			
			";
			
			// Add inline styles to the registered stylesheet
			wp_add_inline_style( 'cbfunnelpro_banner_css', $custom_banner_css);
			
			
			$bannerurl= 'https://smartezsolutionz.com/learnmore/?s='.$session;
			
			$textdisplay='<a href='.$bannerurl.' target="_blank" ><div class="bannerdisplay"><p >'.$bannertext.'</p></div></a>';
			
			
			$displaytext=str_replace("'", " ", $displaytext);			
			
			
			if ($bannertext==-1){				
				return "";				
			}			
			
			
			$html='	
			
			<a href='.$bannerurl.' target="_blank" ><div style="display:'.$displayimageinfo.'" class="cbfnl_image_wrapper"  ><img class="banner-image" style="width:100%" src="'.$bannerimage.'"></div></a>			
			
			<br>			
			
			<a href="'.$bannerurl.'" target="_blank" text-decoration="none"><div style="text-decoration:none; display:'.$displaytextinfo.'"  id="bannertext_widget" >'.$textdisplay.'</div></a>								
			
			';	
			
			return $html;	
			
		}		
		
		
		
		function cbfnl_content_banner(){
			
			wp_enqueue_style('cbfunnelpro_banner_css',cbfnl_CSS_URL.'/bannerstyle.css?d='.gmdate("l jS \of F Y h:i:s A"),'','1');
			
			
			$res=array();			
			
			$cbfnl_show_content_text=get_option('cbfnl_show_content_text',1);			
			$res[]=array('location'=> 'content', 'type'=>'text','ismobile'=> 0,'checked'=>$cbfnl_show_content_text);			
			
			$cbfnl_show_content_image=get_option('cbfnl_show_content_image',1);			
			$res[]=array('location'=> 'content', 'type'=>'image','ismobile'=> 0,'checked'=>$cbfnl_show_content_image);			
			
			$cbfnl_show_content_mobile=get_option('cbfnl_show_content_mobile',1);			
			$res[]=array('location'=> 'content', 'type'=>'text','ismobile'=> 1,'checked'=>$cbfnl_show_content_mobile);	
			
			
			$cbfnl_location="content";	
			
			$session=get_option("cbfunnelpro_session", true);
			
			$cbid = get_option("cbfunnelpro_clickbankid");			
			$category= (get_option("cbfnl_category"));			
			$subcat=(get_option("cbfnl_sub_category"));			
			$cbfnl_tracking_id=(get_option("cbfnl_tracking_id"));			
			
			$cbfnl_line_color=get_option('cbfnl_line_color', '#ff0000');			
			$cbfnl_text_color=get_option('cbfnl_text_color', '#000000');			
			$cbfnl_bkg_color=get_option('cbfnl_bkg_color','#FFFFFF');			
			$cbfnl_bkg_hover_color=get_option('cbfnl_bkg_hover_color', 'FFFF00');			
			
			$cbfnl_font_size=get_option("cbfnl_font_size", 16);			
			$cbfnl_font_family=get_option("cbfnl_font_family");			
			$cbfnl_prod_chkbox_status=get_option("cbfnl_prod_chkbox_status", "all");			
			
			$cbfnl_prod_chkbox_status=rtrim($cbfnl_prod_chkbox_status,",-").'-';			
			
			$cbfnl_prod_chkbox_status_encoded=($cbfnl_prod_chkbox_status);			
			
			$cbfnl_number_of_results=get_option("cbfnl_number_of_results");			
			
			$ismobile=(wp_is_mobile()==true)? 1:0 ;			
			
			$displaytextinfo=cbfnl_display_value($res, $cbfnl_location, 'text', $ismobile );			
			$displayimageinfo=cbfnl_display_value($res, $cbfnl_location, 'image', $ismobile );
			
			
			if ($displaytextinfo=="none" and $displayimageinfo=="none"){
				
				return;
			}
			
			
			$tags_list=sanitize_text_field(wp_unslash(cbfnl_headings_from_post()));
			$siteurl=get_site_url();
			$title=sanitize_text_field(wp_unslash(get_the_title()));
			
			$url = cbfnl_API_URL."/getmybanner2.php";	
			
			
			$resp=wp_remote_post($url, array(
			'method' => 'POST',
			'body'=> array(
			'title'=> $title,
			'tags'=> $tags_list,
			'cat'=> $category,			
			'tid'=> $cbfnl_tracking_id,			
			'prodlist'=> $cbfnl_prod_chkbox_status_encoded,			
			'nads'=>$cbfnl_number_of_results,			
			'cbid'=>$cbid,			
			'subcat'=>$subcat,
			'country'=>'',
			'siteurl'=>$siteurl
			)
			
			));
			
			$bannerinfo=$resp['body'];		
			
			
			$bannerdata=json_decode($bannerinfo);
			
			if ($bannerdata==-1){
				return;
			}
			
			$bannertext=$bannerdata[1];						
			$bannerimage=$bannerdata[0];			
			$href=$bannerdata[2];			
			$displaytext=$bannerdata[3];			
			$vendor=$bannerdata[4];			
			
			$displaytext=str_replace("'", " ", $displaytext);			
			
			$showpopup="showpopup('".$displaytext."','".$vendor."','".$cbfnl_tracking_id."' ,'".$cbid."' )";	
			
			
			$username1=get_option("cbfunnelpro_name");			
			
			$username=urlencode($username1);
			
			$session=cbfnl_randString();
			
			cbfnl_setparameters($session, $cbid, $vendor, $cbfnl_tracking_id, $username1);				
			
			$bannerurl= 'https://smartezsolutionz.com/learnmore/?s='.$session;
			
			$textdisplay='<a href='.$bannerurl.' target="_blank" ><p style="text-decoration:none;"><div class="bannerdisplay" ><p>'.$bannertext.'</p></div></p></a>';			
			
			if ($bannertext==-1){				
				return "";				
			}			
			
			$html='							
			
			<a href='.$bannerurl.' target="_blank" ><div style="display:'.$displayimageinfo.'" class="cbfnl_image_wrapper" ><img class="banner-image"  src="'.$bannerimage.'"></div></a>			
			
			<br>			
			
			<a href='.$bannerurl.' target="_blank" ><div style="display:'.$displaytextinfo.'"  id="bannertext_widget" >'.$textdisplay.'</div></a>								
			
			';			
			
			return $html;			
			
		}		
		
		
		
		function cbfnl_display_value($arr, $locn, $type, $mobile){			
			
			$len=count($arr);			
			
			for ($i=0; $i<$len; $i++){				
				
				$loc=strtolower(trim($arr[$i]['location']));				
				$ty=strtolower(trim($arr[$i]['type']));				
				$mob=strtolower(trim($arr[$i]['ismobile']));				
				
				if ($mobile==1){					
					$ty='text';					
					$type='text';					
				}				
				
				
				if ($loc==$locn  and $ty==$type and $mob==$mobile){					
					
					$chked=$arr[$i]['checked'];					
					
					if ($chked==1){						
						return "block";						
						}else{						
						return "none";						
					}					
					
				}				
				
			}			
			
			return "none";			
			
		}
		
		
		function cbfnl_setparameters($session, $cbid, $vendor, $tid, $username){
			
			$url = cbfnl_API_URL."/setparameters.php";					
			
			$resp=wp_remote_post($url, array(
			'method' => 'POST',
			'body'=> array(
			'session'=> $session,
			'cbid'=> $cbid,
			'vendor'=> $vendor,
			'tid'=> $tid,
			'username'=> $username
			)
			
			));
			
		}
		
		
		function cbfnl_randString() {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			
			for ($i = 0; $i < 20; $i++) {
				$index = wp_rand(0, strlen($characters) - 1);
				$randomString .= $characters[$index];
			}
			
			return $randomString;
		}
		
		
		
		function cbfnl_headings_from_post() {
			
			$post_id=get_the_ID();
			
			// Get the post content
			$post = get_post($post_id); 
			if (!$post) {
				return []; // Return an empty array if the post doesn't exist
			}
			
			$content = $post->post_content; 
			
			// Load the content into DOMDocument
			$dom = new DOMDocument();
			libxml_use_internal_errors(true); // Suppress parsing errors for invalid HTML
			$dom->loadHTML('<?xml encoding="UTF-8">' . $content);
			libxml_clear_errors();
			
			// Initialize arrays for h1 and h2 headings
			$headings = [
			'h1' => [],
			'h2' => [],
			'str'=> []
			];
			
			// Get all h1 elements
			foreach ($dom->getElementsByTagName('h1') as $h1) {
				$headings['h1'][] = $h1->textContent;
			}
			
			// Get all h2 elements
			foreach ($dom->getElementsByTagName('h2') as $h2) {
				$headings['h2'][] = $h2->textContent;
			}
			
			// Get all strong elements
			foreach ($dom->getElementsByTagName('strong') as $str) {
				$headings['str'][] = $str->textContent;
			}
			
			$allstrong= implode(', ',$headings['str']);
			$allh2= implode(', ',$headings['h2']);
			
			return $allstrong.", ".$allh2;
			
		}
		
		
		