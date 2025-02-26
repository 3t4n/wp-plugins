<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('POFW_frontend_menu')) {

    class POFW_frontend_menu {

        protected static $POFW_front_instance;

          function pofw_change_add_to_cart_button($text){
	        global $post, $product,$pofw_comman;
	       
	        if ($product !== null) {
	            if ('yes' == get_post_meta($post->ID, 'pofw_is_pre_order', true) && strtotime(get_post_meta($post->ID, 'pofw_pre_order_date', true)) >= strtotime(date("Y-m-d"))) {
	                return $pofw_comman['pofw_add_button_title'];
	            }

	            if ($product->is_type('variable')) {
		            $variations = $product->get_available_variations();
					foreach ($variations as $key => $value) {
						$variations_id = $value['variation_id'];
						$pre_order_variaction = get_post_meta($variations_id, 'pofw_is_pre_order', true);
				        $pre_order_date_variation = get_post_meta($variations_id, 'pofw_pre_order_date', true);
					        ?>
					        <script type="text/javascript">
						  	jQuery(document).ready(function() {
						  		var button = jQuery( '.single_add_to_cart_button');
							    var add_to_cart_text = button.html();
							    jQuery('form.variations_form').on('show_variation',function(event,variation,purchasable){
							    	if (variation.variation_id == '<?php echo $variations_id;?>') {
							            if ( 'yes' == '<?php echo $pre_order_variaction;?>' && '<?php echo strtotime($pre_order_date_variation);?>' >= '<?php echo strtotime(date("Y-m-d"));?>' ) {
							                button.html( '<?php echo $pofw_comman['pofw_add_button_title'];?>' );
							            } else {
							                button.html( add_to_cart_text );
							            }
						            }
						        }).on( 'hide_variation', function( event ) {
						            event.preventDefault();
						            button.html( add_to_cart_text );
						        });
						  	});
							</script>
							<?php
					}
	            }
	        }        

	        return $text;
	    }

	    function pofw_before_add_to_cart_button(){
	        global $post,$product,$pofw_comman;
	        $product_available = "{date_format}";
	        if ($product->get_type() == 'variable') {
		        $variations = $product->get_available_variations();
				$variations_id = wp_list_pluck( $variations, 'variation_id' );
	            echo "<div class='pre_order_available_variation'>";
	            echo "<p class='pre_order_available_message' style='background-color:".$pofw_comman['pofw_available_date_text_bg_color'].";color:".$pofw_comman['pofw_available_date_text_color'].";'>";
	            echo "</p>";
	            echo "</div>";
		        foreach ($variations_id as $key => $value) {
	                $timeFormat = date_i18n(get_option( 'date_format' ),strtotime(get_post_meta($value, 'pofw_pre_order_date', true))) ;
	                $text =  str_replace($product_available,$timeFormat, $pofw_comman['pofw_available_date_text']) ;
		         	?>
					<script type="text/javascript">
					jQuery(document).ready(function() {
				  		var button = jQuery( '.single_add_to_cart_button');
					    var add_to_cart_text = button.html();
					    jQuery('form.variations_form').on('show_variation',function(event,variation,purchasable){
					    	if (variation.variation_id == '<?php echo $value;?>') {
					            if ( 'yes' == '<?php echo get_post_meta($value, 'pofw_is_pre_order', true); ?>' && '<?php echo strtotime(get_post_meta($value, 'pofw_pre_order_date', true));?>' >= '<?php echo strtotime(date("Y-m-d"));?>' ) {
					                jQuery('.pre_order_available_variation').css('display','block');
					        		jQuery('.pre_order_available_message').html("<?php echo apply_filters('preorder_avaiable_date_text', $text);?>");
					            } else {
					                jQuery('.pre_order_available_variation').css('display','none');
					            }
				            }
				        }).on( 'hide_variation', function( event ) {
				            event.preventDefault();
				            jQuery('.pre_order_available_variation').css('display','none');
				        });
				  	});
					</script>
			     	<?php
		        }
	        }
	        if ($product !== null ) {
	            if ('yes' == get_post_meta($post->ID, 'pofw_is_pre_order', true) && strtotime(get_post_meta($post->ID, 'pofw_pre_order_date', true)) >= strtotime(date("Y-m-d"))) {
	                $timeFormat = date_i18n(get_option( 'date_format' ),strtotime(get_post_meta($post->ID, 'pofw_pre_order_date', true))) ;

	                $text =  str_replace($product_available,$timeFormat, $pofw_comman['pofw_available_date_text']) ;
	                echo "<div class='pre_order_available'>";
	                echo "<p style='background-color:".$pofw_comman['pofw_available_date_text_bg_color'].";color:".$pofw_comman['pofw_available_date_text_color'].";'>";
	                echo apply_filters('preorder_avaiable_date_text', $text);
	                echo "</p>";
	                echo "</div>";
	            }
	        }
	    }

	    function pofw_cart_item_new_message($cartItem, $cartItemKey){
	    	global $pofw_comman;
	        $product = $cartItem['data'];
	        if (get_post_meta($product->get_id(), 'pofw_pre_order_date', true) !== null) {
	            
				$availableFrom = strtotime(get_post_meta($product->get_id(), 'pofw_pre_order_date', true));
	        	$now = strtotime(date("Y-m-d"));
		        $diff = round(($availableFrom - $now) / (60 * 60 * 24));

	            if ($availableFrom > $now && $diff > 0) {
	                $notice = '<br/><small style="color:'.$pofw_comman['pofw_available_cart_note_text_color'].'"> '
	                .sprintf(__("Note: ".$pofw_comman['pofw_available_cart_note_text'], 'preorders'),$diff).'</small>';

	                echo apply_filters('preorder_avaiable_date_text_cart', $notice, $diff);
	            }
	        }
	    }

		function pofw_wc_limit_one_per_order( $passed_validation, $product_id ) {
			global $woocommerce,$pofw_comman;

			$actualCart = $woocommerce->cart->get_cart();
			$pre_order = get_post_meta($product_id, 'pofw_is_pre_order', true);
			if(!empty($pre_order )){
				foreach ($actualCart as $key => $value) {
					$cart_product_id = $value['product_id'];

					if ($product_id == $cart_product_id) {
						
					}elseif ( WC()->cart->get_cart_contents_count() >= 1 && $pre_order == 'yes') {
						wc_add_notice( __( $pofw_comman['pofw_in_cart_preorder_after_text'] , 'preorders'), 'error' );
						return false;
					}elseif($pre_order != 'yes'){
						wc_add_notice( __( $pofw_comman['pofw_in_cart_after_text'] , 'preorders'), 'error');
						return false;
					}
				}
			}
			return $passed_validation;
		}

		function pofw_checkout_cart_item_name( $item_qty, $cart_item, $cart_item_key ) {
			global $pofw_comman;
			$product = $cart_item['data'];
		    if (get_post_meta($product->get_id(), 'pofw_pre_order_date', true) !== null) {
		        
				$availableFrom = strtotime(get_post_meta($product->get_id(), 'pofw_pre_order_date', true));
		    	$now = strtotime(date("Y-m-d"));
		        $diff = round(($availableFrom - $now) / (60 * 60 * 24));

		        if ($availableFrom > $now && $diff > 0) {
		            $item_qty .= '<br/><small style="color:'.$pofw_comman['pofw_available_cart_note_text_color'].'"> '
		            .sprintf(__("Note: ".$pofw_comman['pofw_available_cart_note_text'], 'preorders'),$diff).'</small>';
		        }
		    	return $item_qty;
		    }
		}


		function pofw_order_item_name( $item_name, $item ) {
			global $pofw_comman;
			$product = $item->get_product();
		    if (get_post_meta($product->get_id(), 'pofw_pre_order_date', true) !== null) {
		        
				$availableFrom = strtotime(get_post_meta($product->get_id(), 'pofw_pre_order_date', true));
		    	$now = strtotime(date("Y-m-d"));
		        $diff = round(($availableFrom - $now) / (60 * 60 * 24));

		        if ($availableFrom > $now && $diff > 0) {
		            $item_name .= '<br/><small style="color:'.$pofw_comman['pofw_available_cart_note_text_color'].'"> '
		            .sprintf(__("Note: ".$pofw_comman['pofw_available_cart_note_text'], 'preorders'),$diff).'</small>';
		        }
		    	return $item_name;
		    }
		}


        function init() {
        	global $pofw_comman;

        	if ($pofw_comman['pofw_change_button_title_preorder'] == 'yes') {

	            add_filter('woocommerce_product_add_to_cart_text', array($this,'pofw_change_add_to_cart_button'), 10, 1);
	        	add_filter('woocommerce_product_single_add_to_cart_text', array($this,'pofw_change_add_to_cart_button'), 10, 1);
        	}
        	add_action(	'woocommerce_before_add_to_cart_form', array($this,'pofw_before_add_to_cart_button'), 10);
        	add_action(	'woocommerce_after_cart_item_name', array($this,'pofw_cart_item_new_message'), 10, 2);
        	add_filter( 'woocommerce_add_to_cart_validation', array($this,'pofw_wc_limit_one_per_order'), 10, 2 );
        	add_filter( 'woocommerce_checkout_cart_item_quantity', array($this,'pofw_checkout_cart_item_name'), 10, 3 );
        	add_filter( 'woocommerce_order_item_name', array($this,'pofw_order_item_name'), 10, 2 );
        }       

        public static function POFW_front_instance() {
            if (!isset(self::$POFW_front_instance)) {
                self::$POFW_front_instance = new self();
                self::$POFW_front_instance->init();
            }
            return self::$POFW_front_instance;
        }
    }
    POFW_frontend_menu::POFW_front_instance();
}
