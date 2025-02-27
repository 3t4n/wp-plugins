<?php 
/*display date single product page*/
function esdppfw_display_product_page(){
	global $product;
	
	// $ena_est_date_all_pro = get_option('est_date_ena_all_pro','');
	$all_product_est_date = get_option('est_delvry_date_all_pro','2');
	$est_date_delvry = get_post_meta($product->get_id(),'est_date_delivry_time',true);
	$delvry_text_pro_page = get_option('delvry_text_pro_page','this item will be delivery on');
	$delivry_datetext = get_post_meta($product->get_id(),'delivry_datetext',true);
	$delvry_text_outstock = get_post_meta($product->get_id(),'delvry_text_outstock',true);
	
	$all_product_dispatch_days = get_option('est_dispatch_date_all_pro', '1');
	$order_icon = get_option('single_pro_order_icon', 'shopping-cart');
	$order_text = get_option('single_pro_order_text', 'Ordered');
	$shipping_icon = get_option('single_pro_shipping_icon', 'shipping-fast');
	$shipping_text = get_option('single_pro_shipping_text', 'Shipping');
	$delivery_icon = get_option('single_pro_delivery_icon', 'truck-loading');
	$delivery_text = get_option('single_pro_delivery_text', 'Delivered');
	$single_pro_display_opt = get_option('single_pro_display_opt', 'both');

	$delvry_date_format = 'd,F Y';

	if(metadata_exists('post', $product->get_id(), 'single_pro_est_delvry_date')){
		$single_pro_est_delvry_date = get_post_meta($product->get_id(), 'single_pro_est_delvry_date', true);
	}else{
		$single_pro_est_delvry_date = 'yes';
	}

	if($est_date_delvry){
		$cha_est_date = $est_date_delvry;
		if ( ! $product->is_in_stock()) {
			$delvry_text_setting = $delvry_text_outstock;
		}else{
			$delvry_text_setting = $delivry_datetext;
		}
	}else{
		$cha_est_date = $all_product_est_date;
		if ( ! $product->is_in_stock() && $delvry_text_outstock) {
			$delvry_text_setting = $delvry_text_outstock;
		}else{
			$delvry_text_setting = $delvry_text_pro_page;
		}
	}

	if (!empty($cha_est_date) && $single_pro_est_delvry_date == 'yes') {
		$date = strtotime(+$cha_est_date. "day");
		$mdate = gmdate($delvry_date_format, $date);

		$shipday = strtotime(+$all_product_dispatch_days."day");
		$shipdate = gmdate($delvry_date_format, $shipday);

		$orddate = gmdate($delvry_date_format);
		?>
		<div class="deli_main_div">
			<?php if ($single_pro_display_opt !== 'delivery_widget') { ?>
				<p class="deli_description"><?php echo esc_attr($delvry_text_setting).' '. esc_attr($mdate); ?></p>
			<?php } ?>
			<?php if ($single_pro_display_opt !== 'delivery_text') { ?>
				<table class="deli-widget-preview">
		        	<tbody>
		        		<tr>
		        			<td class="deli-box-div">
					            <div class="deli_widget_content">
				              		<span><?php echo esdppfw_get_svg_image($order_icon); ?></span>
					              	<span style="display: block; font-weight: bold;"><?php echo esc_attr($order_text); ?></span>
					              	<span><?php echo esc_attr($orddate); ?></span>
				              	</div>
				            </td>
				            <td class="deli-box-div">
					            <div class="deli_widget_content">
					              	<span><?php echo esdppfw_get_svg_image($shipping_icon); ?></span>
					              	<span style="display: block; font-weight: bold;"><?php echo esc_attr($shipping_text); ?></span>
					              	<span><?php echo esc_attr($shipdate); ?></span>
					            </div>
				            </td>
				            <td class="deli-box-div">
					            <div class="deli_widget_content">
					              	<span><?php echo esdppfw_get_svg_image($delivery_icon); ?></span>
					              	<span style="display: block; font-weight: bold;"><?php echo esc_attr($delivery_text); ?></span>
					              	<span><?php echo esc_attr($mdate); ?></span>
					            </div>
				            </td>
		        		</tr>
		        	</tbody>
		        </table>
		    <?php } ?>
	    </div>
		<?php
	}
	?>
	<style>
		.deli_main_div {
			margin-top: 18px;
		}
		.deli_description {
		 	background-color: <?php echo esc_attr(get_option('single_pro_delivry_text_bg','#f5f5f5')); ?>!important;
		    color: <?php echo esc_attr(get_option('single_pro_delivry_text_color','#ff0000')); ?>!important;
		    padding: 10px 15px;
		}
		.deli-widget-preview{
		    width: 100%; 
		    border: 1px solid <?php echo esc_attr(get_option('single_pro_delivry_widget_border_color', '#cdcdcd')); ?>;
		    margin: 8px 0; 
		    background-color: <?php echo esc_attr(get_option('single_pro_delivry_widget_bg', '#ffffff')); ?>;
		    color: <?php echo esc_attr(get_option('single_pro_delivry_widget_color', '#000000')); ?>;
		    border-collapse: collapse;
		}
		.deli-box-div{
		    width: 33.33%; 
		    min-height: 85px;
		    padding: 15px; 
		    border: 1px solid <?php echo esc_attr(get_option('single_pro_delivry_widget_border_color', '#cdcdcd')); ?>;
		    font-size: 14px;
		}
		.deli_widget_content{
		    display: flex;
		    flex-direction: column;
		    justify-content: center;
		    align-items: center;
		    width: 100%; 
		    gap: 6px;
		}
	</style>
	<?php
}

/*Get svg icon*/
function esdppfw_get_svg_image($img_class){
	$svg_html = '';
	if ($img_class == 'shopping-cart') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill-rule="evenodd" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                    </svg>';
	}elseif ($img_class == 'shopping-bag') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
		                <path fill-rule="evenodd" d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
		            </svg>';
	}elseif ($img_class == 'shopping-basket') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill-rule="evenodd" d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192H32c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512H430c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32H458.4L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192H171.7L253.3 35.1zM192 304v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16zm128 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                    </svg>';
	}elseif ($img_class == 'shipping-fast') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
	                    <path fill-rule="evenodd" d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"/>
	                </svg>';
	}elseif ($img_class == 'truck') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill-rule="evenodd" d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                    </svg>';
	}elseif ($img_class == 'dolly-flatbed') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill-rule="evenodd" d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64H48c8.8 0 16 7.2 16 16V368c0 44.2 35.8 80 80 80h18.7c-1.8 5-2.7 10.4-2.7 16c0 26.5 21.5 48 48 48s48-21.5 48-48c0-5.6-1-11-2.7-16H450.7c-1.8 5-2.7 10.4-2.7 16c0 26.5 21.5 48 48 48s48-21.5 48-48c0-5.6-1-11-2.7-16H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H144c-8.8 0-16-7.2-16-16V80C128 35.8 92.2 0 48 0H32zM192 80V272c0 26.5 21.5 48 48 48H560c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H464V176c0 5.9-3.2 11.3-8.5 14.1s-11.5 2.5-16.4-.8L400 163.2l-39.1 26.1c-4.9 3.3-11.2 3.6-16.4 .8s-8.5-8.2-8.5-14.1V32H240c-26.5 0-48 21.5-48 48z"/>
                    </svg>';
	}elseif ($img_class == 'truck-loading') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill-rule="evenodd" d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z"/>
                    </svg>';
	}elseif ($img_class == 'map-marker-alt') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill-rule="evenodd" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>';
	}elseif ($img_class == 'map-marked-alt') {
		$svg_html = '<svg aria-hidden="true" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill-rule="evenodd" d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                    </svg>';
	}else{
		$svg_html;
	}

	return $svg_html;
}

/*Display Est date on cart and checkout page (specific products)*/
function esdppfw_display_estdate_cartpage($item_data, $cart_item){
	$est_date_delvry = get_post_meta($cart_item['product_id'],'est_date_delivry_time',true);
	$delvry_text_cart_checkout = get_option('delvry_text_cart_checkout','your order will be delivery on');
	$hide_product_backorder = get_option('hide_product_backorder','');
	$delivry_datetext = get_post_meta($cart_item['product_id'],'delivry_datetext',true);
	
	$delvry_date_format = 'd,F Y';
	$all_product_est_date = get_option('est_delvry_date_all_pro','2');
	// $ena_est_date_all_pro = get_option('est_date_ena_all_pro','');

	if(metadata_exists('post', $cart_item['product_id'], 'single_pro_est_delvry_date')){
		$single_pro_est_delvry_date = get_post_meta($cart_item['product_id'], 'single_pro_est_delvry_date', true);
	}else{
		$single_pro_est_delvry_date = 'yes';
	}

	if ($est_date_delvry) {
		$cha_est_date = $est_date_delvry;
		$delvry_text_setting = $delivry_datetext;
	}else{
		$cha_est_date = $all_product_est_date;
		$delvry_text_setting = $delvry_text_cart_checkout;
	}

	if (!empty($cha_est_date) && $single_pro_est_delvry_date == 'yes') {
		$date = strtotime(+$cha_est_date. "day");
		$mdate = gmdate($delvry_date_format, $date);
	}

	if ( empty( $mdate ) ) {
		return $item_data;
	}

	$item_data[] = array(
		'key'     => __( 'Est Date' ),
		'value'   => wc_clean($delvry_text_setting.' '.$mdate ),
		'display' => '',
	);

	return $item_data;

}

/*Display Est date on order page - meta (specific products)*/
function esdppfw_add_values_to_order_item_meta($item_id, $values)
{
  	global $woocommerce,$wpdb;
	// $ena_est_date_all_pro = get_option('est_date_ena_all_pro','');
  	$all_product_est_date = get_option('est_delvry_date_all_pro','2');
	$delvry_text_order_page = get_option('delvry_text_order_page','your order will be delivery on');
	
  	$est_date_delvry = get_post_meta($values['product_id'],'est_date_delivry_time',true);
  	$delvry_text_orderpage = get_post_meta($values['product_id'],'delvry_text_orderpage',true);
  	$delvry_date_format = 'd,F Y';
  	$hide_product_backorder = get_option('hide_product_backorder','');

  	if(metadata_exists('post', $values['product_id'], 'single_pro_est_delvry_date')){
  		$single_pro_est_delvry_date = get_post_meta($values['product_id'], 'single_pro_est_delvry_date', true);
  	}else{
  		$single_pro_est_delvry_date = 'yes';
  	}

	if ($est_date_delvry) {
		$cha_est_date = $est_date_delvry;
		$delvry_text_setting = $delvry_text_orderpage;
	}else{
		$cha_est_date = $all_product_est_date;
		$delvry_text_setting = $delvry_text_order_page;
	}

	if (!empty($cha_est_date) && $single_pro_est_delvry_date == 'yes') {  
        $date = strtotime(+$cha_est_date. "day");
		$mdate = $delvry_text_setting.' '.gmdate($delvry_date_format, $date);
        
        if(!empty($mdate))
        {
            wc_add_order_item_meta($item_id,'order_est_date',$mdate);  
        }
        //exit();
        if(array_key_exists('order_est_date', $values))
	    {
	        $item->add_meta_data('order_est_date',$values['order_est_date']);
	        //$item->update_meta_data( 'Custom label', $values['order_est_date'] );
	    }
	}

}

add_action('init','esdppfw_all_action_setting');
function esdppfw_all_action_setting(){
	$display_est_date_enab_disab = get_option('est_delvry_date','yes');
	if ($display_est_date_enab_disab == 'yes') {
		/* Position For Single Product */
		$est_text_position = get_option('delvry_text_position_sinpro', 'single_pro_sum');
		$est_date_display_single_pro = get_option('est_date_display_single_pro','yes');
		if ($est_date_display_single_pro == 'yes') {
			if ($est_text_position == 'single_pro_sum') {
				add_action('woocommerce_single_product_summary','esdppfw_display_product_page');
			}else if ($est_text_position == 'before_atc_btn') {
				add_action('woocommerce_before_add_to_cart_button','esdppfw_display_product_page');
			}else if ($est_text_position == 'after_atc_quantity') {
				add_action('woocommerce_after_add_to_cart_quantity','esdppfw_display_product_page');
			}else if ($est_text_position == 'after_atc_btn') {
				add_action('woocommerce_after_add_to_cart_button','esdppfw_display_product_page');
			}else if ($est_text_position == 'pro_meta_start') {
				add_action('woocommerce_product_meta_start','esdppfw_display_product_page');
			}else if ($est_text_position == 'pro_meta_end') {
				add_action('woocommerce_product_meta_end','esdppfw_display_product_page');
			}
		}

		$est_display_on_cartpage = get_option('est_display_on_cartpage','yes');
		if ($est_display_on_cartpage == 'yes') {
			add_action('woocommerce_get_item_data','esdppfw_display_estdate_cartpage', 10, 2);
		}

		$display_order_page = get_option('est_display_on_orderpage','yes');
		if ($display_order_page == 'yes') {
			add_action('woocommerce_add_order_item_meta','esdppfw_add_values_to_order_item_meta',1,2);
		}
	}

}
