<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_woocommerce() {
	global $wpdb;
	$nonce = 'setting-user';
	 
    if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		} 
		$click_n_chat_setting_woocommerce = new click_n_chat_setting_woocommerce();
		$click_n_chat_setting_woocommerce->woocommerce = sanitize_text_field($_POST['woocommerce']);
		$click_n_chat_setting_woocommerce->woo_widget_style = sanitize_text_field($_POST['woo_widget_style']);
		$click_n_chat_setting_woocommerce->woo_widget_icon_size = sanitize_text_field($_POST['woo_widget_icon_size']);
		
		update_option('click_n_chat_setting_woocommerce', $click_n_chat_setting_woocommerce);
			
	}
	
	$click_n_chat_setting_woocommerce = get_option('click_n_chat_setting_woocommerce');
	 
?>
	<div class="my-3">   
        <h1 class="wp-heading-inline">WooCommerce Setting</h1>
    </div>
    <form id="userForm" method="post" enctype="multipart/form-data">
    	<?php wp_nonce_field($nonce, '_wpnonce'); ?>
        <input type="hidden" name="action" value="setting">
        <div class="cnc-custom-gap-row">
            <div class="form-wrap cnc-custom-col-gap-6">
                <div class="cnc-container cnc-bg-white cnc-shadow">
                	<div class="form-field">
                        <label for="woocommerce">WooCommerce Position:</label>
                        <select name="woocommerce" class="form-select cnc-select">
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "none" ? 'selected' : '');  ?> value="none">None</option>
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_before_main_content" ? 'selected' : '');  ?> 
                            value="woocommerce_before_main_content">Before Main Content</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_before_single_product" ? 'selected' : '');  ?> 
                            value="woocommerce_before_single_product">Before Product</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_after_single_product" ? 'selected' : '');  ?> 
                            value="woocommerce_after_single_product">After Product</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_product_summary" ? 'selected' : '');  ?> 
                            value="woocommerce_product_summary">Product Summary</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_after_single_product_summary" ? 'selected' : '');  ?> 
                            value="woocommerce_after_single_product_summary">After Product Summary</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_before_single_product_summary" ? 'selected' : '');  ?> 
                            value="woocommerce_before_single_product_summary">Before Product Summary</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_after_add_to_cart_button" ? 'selected' : '');  ?> 
                            value="woocommerce_after_add_to_cart_button">After Cart Button</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_before_add_to_cart_button" ? 'selected' : '');  ?> 
                            value="woocommerce_before_add_to_cart_button">Before Cart Button</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_before_add_to_cart_form" ? 'selected' : '');  ?> 
                            value="woocommerce_before_add_to_cart_form">Before Add to Cart Form</option>
                            <option <?php echo esc_html($click_n_chat_setting_woocommerce->woocommerce == "woocommerce_after_add_to_cart_form" ? 'selected' : '');  ?> 
                            value="woocommerce_after_add_to_cart_form">After Add to Cart Form</option>
                        </select>
                        <p id="name-description">
                            * Position <b>none</b> will deactivate the WooCommerce Widget
                        </p>
                    </div>
                    <div class="form-field">
                    	<label for="woo_widget_style">Widgets:</label>
                        <select id="woo_widget_style" name="woo_widget_style" class="form-select cnc-select">
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == "wgs1" ? 'selected' : '');  ?> value="wgs1">Widget 1</option>
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == "wgs2" ? 'selected' : '');  ?> value="wgs2">Widget 2</option>
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == "wgs3" ? 'selected' : '');  ?> value="wgs3">Widget 3</option>
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == "wgs4" ? 'selected' : '');  ?> value="wgs4">Widget 4</option>
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == "wgs5" ? 'selected' : '');  ?> value="wgs5">Widget 5</option>
                           <option <?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == "wgs6" ? 'selected' : '');  ?> value="wgs6">Widget 6</option>
                        </select>
                        
                        <p class="help">
                            <b>Social Icons:</b> Resizable social icons available in in <a style="text-decoration:none" href="https://clicknchat.flag92.com/">PRO</a>
                        </p>
                    </div>
                    <div class="form-field" id="woojustIconsSize" style="display:<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == 'justicons' ? 'block' : 'none');  ?>">
                        <label for="welcome_message">Icons Size:</label>
                        <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_icon_size);  ?>" min="20" max="80" step="1" name="woo_widget_icon_size" id="woo_widget_icon_size" data-span="widgetIconSizeRangeValue">
						<b><span id="widgetIconSizeRangeValue"><?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_icon_size);  ?></span>px</b>
                    </div>
                </div>
            </div>
            <div class="form-wrap cnc-custom-col-gap-4">
                <div class="cnc-containers">	
                	 <div id="woojustIconsView" style="display:<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == 'justicons' ? 'block' : 'none');  ?>" style="text-align:center">
                         <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/whatsapp.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_icon_size);  ?>" />
                         <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/telegram.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_icon_size);  ?>" />
                         <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/youtube.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_icon_size);  ?>" />
                         <img class="cnc-wooicons" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/instagram.svg'); ?>" width="<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_icon_size);  ?>" />
                     </div>
                     
                     <?php
						$items = ['1', '2', '3', '4', '5', '6'];
						$rows = 2;
						$columns = ceil(count($items) / $rows);
						
						$table = array_fill(0, $rows, array());
						
						for ($i = 0; $i < count($items); $i++) {
							$rowIndex = $i % $rows;
							$table[$rowIndex][] = $items[$i];
						}
                                 
						foreach ($table as $row) {
						?><?php
						foreach ($row as $item) {
							$pop_up_style = "wgs".$item;
						?>
						<div id="woo-widget-<?php echo esc_html($pop_up_style);  ?>" style="display:<?php echo esc_html($click_n_chat_setting_woocommerce->woo_widget_style == $pop_up_style ? 'block' : 'none');  ?>">
							<div id="cnc-chatbot-popup" style="box-shadow:none; border-radius:0px;height: 100px; width:310px">
                                <div id="<?php echo esc_html($pop_up_style);  ?>-cnc-widget" style="height: auto; overflow-y: auto; margin:0px">
                                    
                                    <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-container">
                                        <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-item">
                                            
                                            <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon-div">
                                                <img src="<?php echo esc_html((CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon11.png'));  ?>" class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon">
                                            </div>
                                            <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-details">
                                                <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-designation">Support</span>
                                                <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-name">John Doe</span>
                                                <span class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-description">Need Help? Just Click</span>
                                            </div>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
						</div>
						<?php
						}
						?>
						
						<?php
					} 
					?>
               	</div>
            </div>
        </div>
        <p class="zsubmit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Update">
        </p>
   	</form>
<?php
}