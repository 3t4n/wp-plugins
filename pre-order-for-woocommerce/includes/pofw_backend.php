<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('POFW_admin_menu')) {

    class POFW_admin_menu {

        protected static $POFW_instance;

        function POFW_submenu_page() {
            add_menu_page(__( 'woocommerce Pre Order', 'Pre Order' ),'Pre Order Settings','manage_options','pre-order-settings',array($this, 'POFW_callback'));
        }

        function POFW_callback(){
        	global $pofw_comman;
        	?>
        	<div class="pofw-container">
	            <form method="post" enctype="multipart/form-data">
	            	<div class="wrap">
	                	<h2><?php echo __("PreOrder Settings","pre-order-for-wooCommerce");?></h2>	            		
	            	</div>
	                <div class="pofw_form_table_main">
	                	<h2 class="header_for_section"><?php echo __("General Settings","pofw");?></h2> 
	                    <table class="data_table">
	                        <tbody>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('Change button title for preorder products','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                    <input type="checkbox" name="pofw_comman[pofw_change_button_title_preorder]" value="yes"<?php if($pofw_comman['pofw_change_button_title_preorder'] == 'yes'){echo "checked";}?>>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('Add Button Title','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                    <input type="text" class="regular-text" name="pofw_comman[pofw_add_button_title]" value="<?php echo $pofw_comman['pofw_add_button_title'];?>">
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('Available date Text','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                    <input type="text" class="regular-text" name="pofw_comman[pofw_available_date_text]" value="<?php echo $pofw_comman['pofw_available_date_text'];?>">
	                                    <p class="description">Choose how the available date should be displayed.<br>
	                                    <code>{date_format}</code> = Default site date format (Ex: January 15, 2020 )</p>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('Available date Text background color','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                	<input type="text" class="color-picker" data-alpha="true" data-default-color="" name="pofw_comman[pofw_available_date_text_bg_color]" value="<?php echo $pofw_comman['pofw_available_date_text_bg_color'];?>"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('Available date Text color','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                	<input type="text" class="color-picker" data-alpha="true" data-default-color="" name="pofw_comman[pofw_available_date_text_color]" value="<?php echo $pofw_comman['pofw_available_date_text_color'];?>"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('Available cart note text','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                    <input type="text" class="regular-text" name="pofw_comman[pofw_available_cart_note_text]" value="<?php echo $pofw_comman['pofw_available_cart_note_text'];?>">
	                                    <p class="description">Choose how the available days should be displayed.<br>
	                                    <code>%s</code> = show days available (Ex: 10 )</p>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('Available cart note text color','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                	<input type="text" class="color-picker" data-alpha="true" data-default-color="" name="pofw_comman[pofw_available_cart_note_text_color]" value="<?php echo $pofw_comman['pofw_available_cart_note_text_color'];?>"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('PreOrder product in cart then any product add to cart after return this message from single product page','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                    <input type="text" class="regular-text" name="pofw_comman[pofw_in_cart_after_text]" value="<?php echo $pofw_comman['pofw_in_cart_after_text'];?>">
	                                </td>
	                            </tr>
	                            <tr>
	                                <th>
	                                    <label><?php echo __('PreOrder product in cart then second preorder product add to cart after return this message from single product page','pre-order-for-wooCommerce');?></label>
	                                </th>
	                                <td>
	                                    <input type="text" class="regular-text" name="pofw_comman[pofw_in_cart_preorder_after_text]" value="<?php echo $pofw_comman['pofw_in_cart_preorder_after_text'];?>">
	                                </td>
	                            </tr>
	                        </tbody>                         
	                    </table>
	                </div>               
	                <div class="submit_button">
	                    <input type="hidden" name="pofw_form_submit" value="pofw_save_option">
	                    <input type="submit" value="<?php echo __('Save changes','pre-order-for-wooCommerce');?>" name="submit" class="button-primary" id="pofw-btn-space">
	                </div>              
	            </form>  
	        </div>
	        <?php
        }

		function pofw_register_my_new_order_statuses() {
		    register_post_status( 'wc-pre-ordered', array(
		        'label'                     => _x( 'Pre Ordered', 'Order status', 'woocommerce' ),
		        'public'                    => true,
		        'exclude_from_search'       => false,
		        'show_in_admin_all_list'    => true,
		        'show_in_admin_status_list' => true,
		        'label_count'               => _n_noop( 'Pre Ordered <span class="count">(%s)</span>', 'Pre Ordered<span class="count">(%s)</span>', 'woocommerce' )
		    ));
		}


		// Register in wc_order_statuses.
		function pofw_my_new_wc_order_statuses( $order_statuses ) {
		    $order_statuses['wc-pre-ordered'] = _x( 'Pre Ordered', 'Order status', 'woocommerce' );

		    return $order_statuses;
		}

        function pofw_preorder_custom_column($columns){
	        $newColumns = [];
	        foreach ($columns as $columnName => $columnInfo) {
	            $newColumns[$columnName] = $columnInfo;
	            if ('order_total' === $columnName) {
	                $newColumns['order_preorder_date'] = __('Preorder Date', 'preorders');
	            }
	        }

	        return $newColumns;
	    }

	    function pofw_preorder_custom_column_content($column){
	        if ('order_preorder_date' === $column) {
	            global $post;
	            echo $this->pofw_get_preorder_date($post);
	        }
	    }

	    function pofw_get_preorder_date($order){
	    	$order = new WC_Order( $order->ID );
		    $items = $order->get_items();
		    foreach ( $items as $item ) {
		        $item_id = $item['order_item_id']; 
		        $product_name = $item['name'];
		        $product_id = $item['product_id'];

		        $product = wc_get_product($product_id);
				$variations = $product->get_children();
			    $order_variation_id = $item->get_variation_id();

				$order_data = $order->get_data();
				$status = $order_data['status'];

		       	if ($status == 'pre-ordered') {
		       		if (!empty($variations)) {

						foreach ($variations as $key => $variation_id) {
							
							if ($variation_id == $order_variation_id) {
								$shippingDate = strtotime(get_post_meta($variation_id, 'pofw_pre_order_date', true));
					        	$now = strtotime(date("Y-m-d"));
						        $diff = round(($shippingDate - $now) / (60 * 60 * 24));
						        if ($diff > 0) {
						            return sprintf(
						                /* translators: number of days. */
						                __('Available in %s days', 'preorders'), $diff
						            );
						        } elseif ($diff == 0) {
						            return __('Available today', 'preorders');
						        } else {
						        	$order->update_status( 'completed' );
						            return __('Already shipped', 'preorders');
						        }
							}	
						}
		       		}else{
						$shippingDate = strtotime(get_post_meta($product_id, 'pofw_pre_order_date', true));
			        	$now = strtotime(date("Y-m-d"));
				        $diff = round(($shippingDate - $now) / (60 * 60 * 24));
				        if ($diff > 0) {
				            return sprintf(
				                /* translators: number of days. */
				                __('Available in %s days', 'preorders'), $diff
				            );
				        } elseif ($diff == 0) {
				            return __('Available today', 'preorders');
				        } else {
				        	$order->update_status( 'completed' );
				            return __('Already shipped', 'preorders');
				        }
		       		}
			   	}
		    }	

	    }

	    

	    function pofw_custom_variations_fields($loop, $variation_data, $variation){
	        echo '<div class="options_group form-row form-row-full">';
	        woocommerce_wp_checkbox(
	            [
	                'id' => 'pofw_is_pre_order_' . $variation->ID,
	                'label' => __('Pre Order Product', 'preorders'),
	                'description' => __(' Check this if you want to offer this product as pre-order', 'preorders'),
	                'value' => get_post_meta($variation->ID, 'pofw_is_pre_order', true)
	            ]
	        );

	        woocommerce_wp_text_input(
	            [
	                'id' => 'pofw_pre_order_date_' . $variation->ID,
	                'label' => __('Pre Order Date', 'preorders'),
	                'placeholder' => date('Y-m-d'),
	                'class' => 'datepickers',
	                'desc_tip' => true,
	                'description' => __('Choose when the product will be available.', 'preorders'),
	                'value' => get_post_meta($variation->ID, 'pofw_pre_order_date', true)
	            ]
	        );

	        echo '</div>';
	    }

	    function pofw_custom_variations_fields_save($post_id){
	        $product = wc_get_product($post_id);

	        $is_pre_order_variation = isset($_POST['pofw_is_pre_order_' . $post_id]) ? 'yes' : 'no';
	        $product->update_meta_data('pofw_is_pre_order', $is_pre_order_variation);

	        if ($is_pre_order_variation == 'yes') {
	            $pre_order_date_value = sanitize_text_field($_POST['pofw_pre_order_date_' . $post_id]);
	            $product->update_meta_data('pofw_pre_order_date', esc_attr($pre_order_date_value));
	        }

	        $product->save();
	    }

		function pofw_custom_woocommerce_auto_complete_order( $order_id ) { 
		    if ( ! $order_id ) {
		        return;
		    }

		    $order = wc_get_order( $order_id );
		    $items = $order->get_items();
		    foreach ( $items as $item ) {
		        $item_id = $item['order_item_id']; 
		        $product_name = $item['name'];
		        $product_id = $item['product_id'];
		        $product = wc_get_product($product_id);
		        if ($product->is_type('variable')) {
					$variations = $product->get_available_variations();
					foreach ($variations as $key => $value) {
						$variations_id = $value['variation_id'];
						$pre_order_variaction = get_post_meta($variations_id, 'pofw_is_pre_order', true);
				        $pre_order_date_variation = get_post_meta($variations_id, 'pofw_pre_order_date', true);
				        if ($pre_order_variaction == 'yes' && !empty($pre_order_date_variation)) {
				    		$order->update_status( 'pre-ordered' );
				        }
					}				
		        }

		        $pre_order = get_post_meta($product_id, 'pofw_is_pre_order', true);
		        $pre_order_date = get_post_meta($product_id, 'pofw_pre_order_date', true);
		        if ($pre_order == 'yes' && !empty($pre_order_date)) {
		    		$order->update_status( 'pre-ordered' );
		        }
		    }	

		}


        function POFW_save_option(){
        	if( current_user_can('administrator') ) { 
	            if(isset($_REQUEST['pofw_form_submit']) && $_REQUEST['pofw_form_submit'] == 'pofw_save_option'){

	                //if(!empty($_REQUEST['pofw_comman'])){
	                    $isecheckbox = array(
	                    	'pofw_change_button_title_preorder',

	                    );

	                    foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {
	                        if(!isset($_REQUEST['pofw_comman'][$value_isecheckbox])){
	                            $_REQUEST['pofw_comman'][$value_isecheckbox] ='no';
	                        }
	                    }	
	                   	                    
	                    //print_r($_REQUEST);
	                    foreach ($_REQUEST['pofw_comman'] as $key_pofw_comman => $value_pofw_comman) {
	                       // echo $key_pofw_comman;
	                        update_option($key_pofw_comman, sanitize_text_field($value_pofw_comman), 'yes');
	                    }
	                    //exit;
	                //}                      
	                wp_redirect( admin_url( '/admin.php?page=pre-order-settings' ) );
	                exit;     
	            }
	        }
        }	


		function POFW_support_and_rating_notice() {
            $screen = get_current_screen();
            // print_r($screen );
            if( 'pre-order-settings' == $screen->parent_base) {
                ?>
                <div class="pofw_ratess_open">
                    <div class="pofw_rateus_notice">
                        <div class="pofw_rtusnoti_left">
                            <h3>Rate Us</h3>
                            <label>If you like our plugin, </label>
                            <a target="_blank" href="https://wordpress.org/support/plugin/pre-order-for-woocommerce/reviews/?filter=5">
                                <label>Please vote us</label>
                            </a>
                            
                            <label>,so we can contribute more features for you.</label>
                        </div>
                        <div class="pofw_rtusnoti_right">
                            <img src="<?php echo POFW_PLUGIN_DIR;?>/images/review.png" class="pofw_review_icon">
                        </div>
                    </div>
                    <div class="pofw_support_notice">
                        <div class="pofw_rtusnoti_left">
                            <h3>Having Issues?</h3>
                            <label>You can contact us at</label>
                            <a target="_blank" href="https://xthemeshop.com/contact/">
                                <label>Our Support Forum</label>
                            </a>
                        </div>
                        <div class="pofw_rtusnoti_right">
                            <img src="<?php echo POFW_PLUGIN_DIR;?>/images/support.png" class="pofw_review_icon">
                        </div>
                       
                    </div>
                </div>
                <div class="pofw_donate_main">
                   <img src="<?php echo POFW_PLUGIN_DIR;?>/images/coffee.svg">
                   <h3>Buy me a Coffee !</h3>
                   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                   <div class="pofw_donate_form">
                        <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                   </div>
                </div>
                <?php
            }
        }
		

		function pofw_product_data_tabs( $tabs ) {
            $tabs['pre_order'] = array(
                'label'  => esc_html__( 'Pre Order', 'woo-product-variation' ),
                'target' => 'pre_order_options',
                'class'  => array( 'show_if_pre_order' ),
            );
            return $tabs;
        }

        function pofw_product_data_panels() {
	    	echo '<div id="pre_order_options" class="panel woocommerce_options_panel">';
			   	echo '<div class="options_group form-row form-row-full hide_if_variable">';
			       	woocommerce_wp_checkbox(
			            [
			                'id' => 'pofw_is_pre_order',
			                'label' => __('Pre Order Product', 'preorders'),
			                'description' => __(' Check this if you want to offer this product as pre-order', 'preorders'),
			                'value' => get_post_meta(get_the_ID(), 'pofw_is_pre_order', true),
			            ]
			        );

			        woocommerce_wp_text_input(
			            array(
			            'id'          => 'pofw_pre_order_date',
			            'label'       => __('Pre Order Date', 'preorders'),
			            'placeholder' => date('Y-m-d'),
			            'class'       => 'datepicker',
			            'desc_tip'    => true,
			            'description' => __("Choose when the product will be available.", "preorders"),
			            'value' => get_post_meta(get_the_ID(), 'pofw_pre_order_date', true)
			            )
			        );

        		echo '</div>';
		    echo '</div>';
        }

        function pofw_woocommerce_vt_process_product_meta_fields_save( $post_id ){
			$product = wc_get_product($post_id);
	        $is_pre_order = isset($_POST['pofw_is_pre_order']) ? 'yes' : 'no';
	        $product->update_meta_data('pofw_is_pre_order', $is_pre_order);

	        if ($is_pre_order == 'yes') {
	            $pre_order_date_value = sanitize_text_field($_POST['pofw_pre_order_date']);
	            $product->update_meta_data('pofw_pre_order_date', esc_attr($pre_order_date_value));
	        } else {
	            $product->update_meta_data('pofw_pre_order_date', '');
	        }

	        $product->save();
		}
				
        function init() {
        	add_action( 'admin_menu',  array($this, 'POFW_submenu_page'));
        	add_action( 'init',  array($this, 'POFW_save_option'));
        	add_filter('manage_edit-shop_order_columns', array($this, 'pofw_preorder_custom_column'), 20);
        	add_action('manage_shop_order_posts_custom_column', array($this, 'pofw_preorder_custom_column_content'));
        	add_action('woocommerce_product_after_variable_attributes', [$this, 'pofw_custom_variations_fields'], 10, 3);
        	add_action('woocommerce_save_product_variation', [$this, 'pofw_custom_variations_fields_save'], 10, 2);
        	add_action( 'init', array($this,'pofw_register_my_new_order_statuses') );
        	add_filter( 'wc_order_statuses', array($this,'pofw_my_new_wc_order_statuses') );
			add_action( 'woocommerce_thankyou', array($this,'pofw_custom_woocommerce_auto_complete_order') );
			add_action( 'admin_notices', array($this, 'POFW_support_and_rating_notice' ));		
			add_filter( 'woocommerce_product_data_tabs', array( $this, 'pofw_product_data_tabs' ), 10, 1 );
            add_action( 'woocommerce_product_data_panels',array( $this, 'pofw_product_data_panels' ));
			add_action( 'woocommerce_process_product_meta',array( $this, 'pofw_woocommerce_vt_process_product_meta_fields_save' ));		
        }		

        public static function POFW_instance() {
            if (!isset(self::$POFW_instance)) {
                self::$POFW_instance = new self();
                self::$POFW_instance->init();
            }
            return self::$POFW_instance;
        }
    }
    POFW_admin_menu::POFW_instance();
}

?>