<?php


function as_woo_owl_validate_options(){
	global $as_woo_owl_error;
	$as_woo_owl_error = new WP_Error();
	if (isset($_POST['as_woo_owl_submit']) && !empty($_POST['as_woo_owl_submit'])) {
		$carousel_name = trim($_POST['carousel_name']);
		$carousel_name = preg_replace('/\s+/', '', $carousel_name);
		$carousel_name = sanitize_text_field( $carousel_name );
		if (!empty($carousel_name)) {
			$as_woo_data['carousel_name'] = $carousel_name;


			if (!empty($_POST['as_woo_owl_product_type'])) {
				$as_woo_pro_type = sanitize_text_field($_POST['as_woo_owl_product_type']);
				if ($as_woo_pro_type !== 'category') {
					$as_woo_data['as_woo_owl_product_category'] = 0;
				}
				$as_woo_data['as_woo_owl_product_type'] = $as_woo_pro_type;
			}else{
				$as_woo_data['as_woo_owl_product_type'] = 0;
			}


			if (!empty($_POST['as_woo_owl_product_category'])) {
				$as_woo_pro_type_cat = sanitize_text_field($_POST['as_woo_owl_product_category']);
				$as_woo_data['as_woo_owl_product_category'] = $as_woo_pro_type_cat;
			}else{
				$as_woo_data['as_woo_owl_product_category'] = 0;
			}



			if (!empty($_POST['items'])) {
				$int_items = intval($_POST['items']);
				if (!$int_items) {
					$as_woo_data['items'] = 0;
				}else{
					$as_woo_data['items'] = $int_items;
				}
			}else{
				$as_woo_data['items'] = 0;
			}


			if (!empty($_POST['itemsDesktop'])) {
				$itemsDesktop = intval($_POST['itemsDesktop']);
				if (!$itemsDesktop) {
					$as_woo_data['itemsDesktop'] = 0;
				}else{
					$as_woo_data['itemsDesktop'] = $itemsDesktop;
				}
			}else{
				$as_woo_data['itemsDesktop'] = 0;
			}


			if (!empty($_POST['itemsDesktop_two'])) {
				$itemsDesktop_two = intval($_POST['itemsDesktop_two']);
				if (!$itemsDesktop_two) {
					$as_woo_data['itemsDesktop_two'] = 0;
				}else{
					$as_woo_data['itemsDesktop_two'] = $itemsDesktop_two;
				}
			}else{
				$as_woo_data['itemsDesktop_two'] = 0;
			}


			if (!empty($_POST['itemsDesktopSmall_one'])) {
				$itemsDesktopSmall_one = intval($_POST['itemsDesktopSmall_one']);
				if (!$itemsDesktopSmall_one) {
					$as_woo_data['itemsDesktopSmall_one'] = 0;
				}else{
					$as_woo_data['itemsDesktopSmall_one'] = $itemsDesktopSmall_one;
				}
			}else{
				$as_woo_data['itemsDesktopSmall_one'] = 0;
			}


			if (!empty($_POST['itemsDesktopSmall_two'])) {
				$itemsDesktopSmall_two = intval($_POST['itemsDesktopSmall_two']);
				if (!$itemsDesktopSmall_two) {
					$as_woo_data['itemsDesktopSmall_two'] = 0;
				}else{
					$as_woo_data['itemsDesktopSmall_two'] = $itemsDesktopSmall_two;
				}
			}else{
				$as_woo_data['itemsDesktopSmall_two'] = 0;
			}


			if (!empty($_POST['itemsTablet_one'])) {
				$itemsTablet_one = intval($_POST['itemsTablet_one']);
				if (!$itemsTablet_one) {
					$as_woo_data['itemsTablet_one'] = 0;
				}else{
					$as_woo_data['itemsTablet_one'] = $itemsTablet_one;
				}
			}else{
				$as_woo_data['itemsTablet_one'] = 0;
			}


			if (!empty($_POST['itemsTablet_two'])) {
				$itemsTablet_two = intval($_POST['itemsTablet_two']);
				if (!$itemsTablet_two) {
					$as_woo_data['itemsTablet_two'] = 0;
				}else{
					$as_woo_data['itemsTablet_two'] = $itemsTablet_two;
				}
			}else{
				$as_woo_data['itemsTablet_two'] = 0;
			}


			if ($_POST['itemsTabletSmall'] == 'true') {
				$as_woo_data['itemsTabletSmall'] = 'true';				
			}else if ($_POST['itemsTabletSmall'] == 'false') {
				$as_woo_data['itemsTabletSmall'] = 'false';				
			}
			else{
				$as_woo_data['itemsTabletSmall'] = 1;
			}


			if (!empty($_POST['itemsMobile_one'])) {
				$itemsMobile_one = intval($_POST['itemsMobile_one']);
				if (!$itemsMobile_one) {
					$as_woo_data['itemsMobile_one'] = 0;
				}else{
					$as_woo_data['itemsMobile_one'] = $itemsMobile_one;
				}
			}else{
				$as_woo_data['itemsMobile_one'] = 0;
			}



			if (!empty($_POST['itemsMobile_two'])) {
				$itemsMobile_two = intval($_POST['itemsMobile_two']);
				if (!$itemsMobile_two) {
					$as_woo_data['itemsMobile_two'] = 0;
				}else{
					$as_woo_data['itemsMobile_two'] = $itemsMobile_two;
				}
			}else{
				$as_woo_data['itemsMobile_two'] = 0;
			}

			if ($_POST['singleItem'] == 'true') {
				$as_woo_data['singleItem'] = 'true';				
			}else if ($_POST['singleItem'] == 'false'){
				$as_woo_data['singleItem'] = 'false';
			}else{
				$as_woo_data['singleItem'] = 1;
			}

			if ($_POST['itemsScaleUp'] == 'true') {				
				$as_woo_data['itemsScaleUp'] = 'true';	

			}else if ($_POST['itemsScaleUp'] == 'false'){
				$as_woo_data['itemsScaleUp'] = 'false';

			}else{
				$as_woo_data['itemsScaleUp'] = 1;
			}



			if (!empty($_POST['slideSpeed'])) {
				$slideSpeed = intval($_POST['slideSpeed']);
				if (!$slideSpeed) {
					$as_woo_data['slideSpeed'] = 0;
				}else{
					$as_woo_data['slideSpeed'] = $slideSpeed;
				}
			}else{
				$as_woo_data['slideSpeed'] = 0;
			}

			if ($_POST['pagination'] == 'true') {
				$as_woo_data['pagination'] = 'true';				
			}else if ($_POST['pagination'] == 'false'){
				$as_woo_data['pagination'] = 'false';
			}else{
				$as_woo_data['pagination'] = 1;
			}




			if (!empty($_POST['paginationSpeed'])) {
				$paginationSpeed = intval($_POST['paginationSpeed']);
				if (!$paginationSpeed) {
					$as_woo_data['paginationSpeed'] = 0;
				}else{
					$as_woo_data['paginationSpeed'] = $paginationSpeed;
				}
			}else{
				$as_woo_data['paginationSpeed'] = 0;
			}


			if (!empty($_POST['rewindSpeed'])) {
				$rewindSpeed = intval($_POST['rewindSpeed']);
				if (!$rewindSpeed) {
					$as_woo_data['rewindSpeed'] = 0;
				}else{
					$as_woo_data['rewindSpeed'] = $rewindSpeed;
				}
			}else{
				$as_woo_data['rewindSpeed'] = 0;
			}

			if ($_POST['autoPlay'] == 'true') {
				$as_woo_data['autoPlay'] = 'true';				
			}elseif ($_POST['autoPlay'] == 'false') {
				$as_woo_data['autoPlay'] = 'false';
			}else{
				$as_woo_data['autoPlay'] = 1;
			}

			if ($_POST['stopOnHover'] == 'true') {
				$as_woo_data['stopOnHover'] = 'true';				
			}elseif ($_POST['stopOnHover'] == 'false') {
				$as_woo_data['stopOnHover'] = 'false';
			}else{
				$as_woo_data['stopOnHover'] = 1;
			}
			
			if ($_POST['navigation'] == 'true') {
				$as_woo_data['navigation'] = 'true';				
			}else if ($_POST['navigation'] == 'false') {
				$as_woo_data['navigation'] = 'false';				
			}else{
				$as_woo_data['navigation'] = 1;
			}
			
			if ($_POST['navigation'] == 'true') {
				$as_woo_data['navigation'] = 'true';				
			}elseif ($_POST['navigation'] == 'false') {
				$as_woo_data['navigation'] = 'false';				
			}else{
				$as_woo_data['navigation'] = 1;
			}

			if (!empty($_POST['navigationText_one'])) {
				$text_one = sanitize_text_field( $_POST['navigationText_one'] );
				$as_woo_data['navigationText_one'] = $text_one;
			}else{
				$as_woo_data['navigationText_one'] = 0;
			}

			if (!empty($_POST['navigationText_two'])) {
				$text_two = sanitize_text_field( $_POST['navigationText_two'] );
				$as_woo_data['navigationText_two'] = $text_two;
			}else{
				$as_woo_data['navigationText_two'] = 0;
			}

			if ($_POST['rewindNav'] == 'true') {
				$as_woo_data['rewindNav'] = 'true';				
			}elseif ($_POST['rewindNav'] == 'false') {
				$as_woo_data['rewindNav'] = 'false';				
			}else{
				$as_woo_data['rewindNav'] = 1;
			}	

			if ($_POST['scrollPerPage'] == 'true') {
				$as_woo_data['scrollPerPage'] = 'true';				
			}elseif ($_POST['scrollPerPage'] == 'false') {
				$as_woo_data['scrollPerPage'] = 'false';				
			}else{
				$as_woo_data['scrollPerPage'] = 1;
			}		

			if ($_POST['paginationNumbers'] == 'true') {
				$as_woo_data['paginationNumbers'] = 'true';				
			}else if ($_POST['paginationNumbers'] == 'false') {
				$as_woo_data['paginationNumbers'] = 'false';				
			}else{
				$as_woo_data['paginationNumbers'] = 1;
			}	

			if ($_POST['responsive'] == 'true') {
				$as_woo_data['responsive'] = 'true';				
			}elseif ($_POST['responsive'] == 'false') {
				$as_woo_data['responsive'] = 'false';				
			}else{
				$as_woo_data['responsive'] = 1;
			}	

			if ($_POST['lazyLoad'] == 'true') {
				$as_woo_data['lazyLoad'] = 'true';				
			}elseif ($_POST['lazyLoad'] == 'false') {
				$as_woo_data['lazyLoad'] = 'false';				
			}else{
				$as_woo_data['lazyLoad'] = 1;
			}	

			if ($_POST['lazyFollow'] == 'true') {
				$as_woo_data['lazyFollow'] = 'true';				
			}elseif ($_POST['lazyFollow'] == 'false') {
				$as_woo_data['lazyFollow'] = 'false';				
			}else{
				$as_woo_data['lazyFollow'] = 1;
			}

			if ($_POST['lazyEffect'] == 'false') {
				$as_woo_data['lazyEffect'] = 'false';				
			}elseif ($_POST['lazyEffect'] == 'fade') {
				$as_woo_data['lazyEffect'] = 'fade';				
			}else{
				$as_woo_data['lazyEffect'] = 1;
			}

			if ($_POST['mouseDrag'] == 'true') {
				$as_woo_data['mouseDrag'] = 'true';				
			}elseif ($_POST['mouseDrag'] == 'false') {
				$as_woo_data['mouseDrag'] = 'false';				
			}else{
				$as_woo_data['mouseDrag'] = 1;
			}	

			if ($_POST['touchDrag'] == 'true') {
				$as_woo_data['touchDrag'] = 'true';				
			}else if ($_POST['touchDrag'] == 'false') {
				$as_woo_data['touchDrag'] = 'false';				
			}else{
				$as_woo_data['touchDrag'] = 1;
			}	

			if ($_POST['afterLazyLoad'] == 'true') {
				$as_woo_data['afterLazyLoad'] = 'true';				
			}elseif ($_POST['afterLazyLoad'] == 'false') {
				$as_woo_data['afterLazyLoad'] = 'false';				
			}else{
				$as_woo_data['afterLazyLoad'] = 1;
			}	

			if ($_POST['as_woo_owl_add_to_cart'] == 'true') {
				$as_woo_data['as_woo_owl_add_to_cart'] = 'true';				
			}elseif ($_POST['as_woo_owl_add_to_cart'] == 'false') {
				$as_woo_data['as_woo_owl_add_to_cart'] = 'false';				
			}else{
				$as_woo_data['as_woo_owl_add_to_cart'] = 1;
			}				


			if (!empty($_POST['as_button'])) {
				$as_btn = sanitize_text_field( $_POST['as_button'] );
				$as_woo_data['as_button'] = $as_btn;
			}else{
				$as_woo_data['as_button'] = 'themeforest';
			}

			if (!empty($_POST['as_select_icon'])) {
				$as_icon = sanitize_text_field( $_POST['as_select_icon'] );
				$as_woo_data['as_select_icon'] = $as_icon;
			}else{
				$as_woo_data['as_select_icon'] = 'left1.right1';
			}

			update_option( 'as_woo_owl_all_opt_save', $as_woo_data );
			$as_woo_owl_error->add('success', 'Settings seved');
			
			
		}else{
			$as_woo_owl_error->add('carousel_name_field', 'Please enter Carousel Name');
		}
	}
}
add_action('admin_init', 'as_woo_owl_validate_options');



function as_woo_owl_get_option($opt, $dafval = null){
	$opt = (int)$opt;
	if ($opt == 0) {
		return $dafval;
	}else{
		return $opt;
	}

}

function as_woo_owl_get_text_val($opt, $dafval = null){
	if (!empty($opt)) {
		return $opt;
	}else{
		return $dafval;
	}

}

function as_woo_owl_bull_val($opt = null, $dafval = null){
	if ($opt == $dafval) {
		return 'selected';
	}else{
		return null;
	}
}


function as_woo_owl_add_atc_btn(){
	$as_atc_btn = array(
			array(
					'btn_id' => 'as_woo_owl_simple_id',
					'btn_class' => 'button_one',					
					'btn_name' => 'Sample'				
				),
			array(
					'btn_id' => 'as_woo_owl_red_id',
					'btn_class' => 'button_two',					
					'btn_name' => 'Red'					
				),
			array(
					'btn_id' => 'as_woo_owl_pink_id',
					'btn_class' => 'button_three',					
					'btn_name' => 'Pink'					
				),
			array(
					'btn_id' => 'as_woo_owl_button_four_id',
					'btn_class' => 'button_four',					
					'btn_name' => 'Black'					
				),
			array(
					'btn_id' => 'as_woo_owl_twitter_id',
					'btn_class' => 'twitter',					
					'btn_name' => 'Twitter'					
				),
			array(
					'btn_id' => 'as_woo_owl_graphicriver_id',
					'btn_class' => 'graphicriver',					
					'btn_name' => 'Graphicriver'					
				),
			array(
					'btn_id' => 'as_woo_owl_blue_id',
					'btn_class' => 'blue',					
					'btn_name' => 'Blue'					
				),
			array(
					'btn_id' => 'as_woo_owl_themeforest_id',
					'btn_class' => 'themeforest',					
					'btn_name' => 'Themeforest'					
				),
			array(
					'btn_id' => 'as_woo_owl_yellow',
					'btn_class' => 'yellow',					
					'btn_name' => 'Yellow'					
				)
		);

	return $as_atc_btn;
}
add_filter('as_woo_owl_atc_btn_filter', 'as_woo_owl_add_atc_btn');


function as_woo_owl_lr_icon_add(){

	$as_lr_icon = array(
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_one',
					'as_lr_val'		=> 'left1.right1',
					'as_lr_licon'	=> 'left1.png',
					'as_lr_ricon'	=> 'right1.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_two',
					'as_lr_val'		=> 'left3.right3',
					'as_lr_licon'	=> 'left3.png',
					'as_lr_ricon'	=> 'right3.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_three',
					'as_lr_val'		=> 'left5.right5',
					'as_lr_licon'	=> 'left5.png',
					'as_lr_ricon'	=> 'right5.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_four',
					'as_lr_val'		=> 'left7.right7',
					'as_lr_licon'	=> 'left7.png',
					'as_lr_ricon'	=> 'right7.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_five',
					'as_lr_val'		=> 'left9.right9',
					'as_lr_licon'	=> 'left9.png',
					'as_lr_ricon'	=> 'right9.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_six',
					'as_lr_val'		=> 'left11.right11',
					'as_lr_licon'	=> 'left11.png',
					'as_lr_ricon'	=> 'right11.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_seven',
					'as_lr_val'		=> 'left12.right12',
					'as_lr_licon'	=> 'left12.png',
					'as_lr_ricon'	=> 'right12.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_eight',
					'as_lr_val'		=> 'left13.right13',
					'as_lr_licon'	=> 'left13.png',
					'as_lr_ricon'	=> 'right13.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_nine',
					'as_lr_val'		=> 'left14.right14',
					'as_lr_licon'	=> 'left14.png',
					'as_lr_ricon'	=> 'right14.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_ten',
					'as_lr_val'		=> 'left15.right15',
					'as_lr_licon'	=> 'left15.png',
					'as_lr_ricon'	=> 'right15.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_eleven',
					'as_lr_val'		=> 'left16.right16',
					'as_lr_licon'	=> 'left16.png',
					'as_lr_ricon'	=> 'right16.png'
				),
			array(
					'as_lr_id' 		=> 'as_woo_select_icon_twelfth',
					'as_lr_val'		=> 'left17.right17',
					'as_lr_licon'	=> 'left17.png',
					'as_lr_ricon'	=> 'right17.png'
				)
		);

	return $as_lr_icon;
}	
add_filter('as_woo_lr_icon_filter', 'as_woo_owl_lr_icon_add');


function as_woo_owl_ajax_reset(){
	if (isset($_POST['action'])) {
update_option( 'as_woo_owl_all_opt_save', array(
			    'carousel_name' => '',
			    'as_woo_owl_product_type' => '_featured',
			    'as_woo_owl_product_category' => 0,
			    'items' => 0,
			    'itemsDesktop' => 0,
			    'itemsDesktop_two' => 0,
			    'itemsDesktopSmall_one' => 0,
			    'itemsDesktopSmall_two' => 0,
			    'itemsTablet_one' => 0,
			    'itemsTablet_two' => 0,
			    'itemsTabletSmall' => 1,
			    'itemsMobile_one' => 0,
			    'itemsMobile_two' => 0,
			    'singleItem' => 1,
			    'itemsScaleUp' => 1,
			    'slideSpeed' => 0,
			    'paginationSpeed' => 0,
			    'rewindSpeed' => 0,
			    'autoPlay' => 1,
			    'stopOnHover' => 1,
			    'navigation' => 1,
			    'navigationText_one' => 0,
			    'navigationText_two' => 0,
			    'rewindNav' => 1,
			    'scrollPerPage' => 1,
			    'paginationNumbers' => 1,
			    'responsive' => 1,
			    'lazyLoad' => 1,
			    'lazyFollow' => 1,
			    'lazyEffect' => 1,
			    'mouseDrag' => 1,
			    'touchDrag' => 1,
			    'afterLazyLoad' => 1,
			    'as_woo_owl_add_to_cart' => 1,
			    'as_button' => 'themeforest',
			    'as_select_icon' => 'left1.right1'
				)
			);
		echo 'ok';
	}
	die();
}
add_action('wp_ajax_as_woo_owl_reset', 'as_woo_owl_ajax_reset');


function as_woo_owl_chack_option($as_de = 1){
	$as_woo_value = get_option('as_woo_owl_all_opt_save');

	$as_woo_owl_terms = get_terms( array(
	    'taxonomy' => 'product_cat',
	    'hide_empty' => false,
	) );


?>

<select class="as_select" name="as_woo_owl_product_category" id="as_woo_owl_product_category" >

<?php
	if (!empty($as_woo_owl_terms)) {
		if (is_array($as_woo_owl_terms)) {
			foreach ($as_woo_owl_terms as $as_woo_terms) {
				?><option <?php

if ($as_woo_value['as_woo_owl_product_category'] == $as_woo_terms->slug) {
	if ($as_woo_value['as_woo_owl_product_category'] !== 0) {
		echo 'selected';
	}
	
}
				?> value="<?php echo $as_woo_terms->slug; ?>"  ><?php echo $as_woo_terms->name; ?></option><?php
			}
		}
	}


?>
</select>

<?php
if ($as_de !== 1) {
	die();
}
	
}
add_action('wp_ajax_as_woo_owl_get_tarm', 'as_woo_owl_chack_option');


function as_woo_owl_add_to_cart(){
	global $woocommerce;
	$as_woo_product_id 	= (int)$_POST['as_woo_id'];
	$as_woo_cart_url 	= esc_url($_POST['as_woo_url']);
	$as_woo_found		= false;

	//check if product already in cart
	if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
		foreach ( $woocommerce->cart->get_cart() as $as_woo_owl_cart_key => $values ) {
			$_product = $values['data'];
			if ( $_product->id == $as_woo_product_id )
				$as_woo_found = true;
		}
		// if product not found, add it

		if (! $as_woo_found) {
			$woocommerce->cart->add_to_cart( $as_woo_product_id );
			echo 'success';
		}else{
			echo 'already';
		}

	} else {
		// if no products in cart, add it
		$woocommerce->cart->add_to_cart( $as_woo_product_id );
		echo 'success';
	}

	die();
}
add_action('wp_ajax_as_woo_owl_add_to_cart', 'as_woo_owl_add_to_cart');
add_action('wp_ajax_nopriv_as_woo_owl_add_to_cart', 'as_woo_owl_add_to_cart');


function as_woo_owl_settings(){
	global $as_woo_owl_setting_error;
	$as_woo_owl_setting_error = new WP_Error();
	if (!empty($_POST['as_woo_owl_setting_submit'])) {
		$loader_gif 					= esc_url($_POST['loader_gif']);
		$as_atc_loader_gif 				= esc_url($_POST['as_atc_loader_gif']);
		$as_woo_loader_bg_color 		= sanitize_text_field($_POST['as_woo_loader_bg_color']);
		$as_woo_add_to_cart_bg_color 	= sanitize_text_field($_POST['as_woo_add_to_cart_bg_color']);
		$as_woo_loader_bg_opacity 		= sanitize_text_field($_POST['as_woo_loader_bg_opacity']);
		$as_woo_add_to_cart_bg_opacity 	= sanitize_text_field($_POST['as_woo_add_to_cart_bg_opacity']);
		$as_woo_width 	= sanitize_text_field($_POST['as_woo_width']);
		$as_woo_height 	= sanitize_text_field($_POST['as_woo_height']);
		$as_woo_d_limit 	= sanitize_text_field($_POST['as_woo_d_limit']);
		$as_woo_checkbox 	= (isset($_POST['as_woo_checkbox'])) ? 'yes' : 'no' ;

		$as_woo_owl_setting_save = array(
				'loader_gif' 					=> $loader_gif,
				'as_atc_loader_gif' 			=> $as_atc_loader_gif,
				'as_woo_loader_bg_color' 		=> $as_woo_loader_bg_color,
				'as_woo_add_to_cart_bg_color' 	=> $as_woo_add_to_cart_bg_color,
				'as_woo_loader_bg_opacity' 		=> $as_woo_loader_bg_opacity,
				'as_woo_add_to_cart_bg_opacity' => $as_woo_add_to_cart_bg_opacity,
				'as_woo_width' => $as_woo_width,
				'as_woo_height' => $as_woo_height,
				'as_woo_d_limit' => $as_woo_d_limit,
				'as_woo_checkbox' => $as_woo_checkbox,
			);

		
		update_option( 'as_woo_owl_all_settings_save', $as_woo_owl_setting_save );
		$as_woo_owl_setting_error->add('setting_success', 'Settings seved');
		
	}



}
add_action('admin_init', 'as_woo_owl_settings');


function as_woo_owl_hex2rgb($hex) {
	if (empty($hex) === true) {
		$rgb = '0,0,0';
	}else{
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = $r.', '.$g.', '. $b;
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   // returns an array with the rgb values
	}
	 return $rgb;
}

function as_woo_owl_setting_reset(){
	delete_option('as_woo_owl_all_settings_save');
	echo 'ok';
die();
}
add_action('wp_ajax_as_woo_owl_setting_reset', 'as_woo_owl_setting_reset');

function as_woo_owl_chack_table(){
	global $wpdb;
	$as_woo_owl_tbl_name = $wpdb->prefix.'as_woo_owl_opt_tbl';
	if($wpdb->get_var("SHOW TABLES LIKE '$as_woo_owl_tbl_name'") != $as_woo_owl_tbl_name) {
		return true;
	}else{
		return false;
	}
}


function as_woo_owl_chack_tbl_data(){
	global $wpdb;
	if (as_woo_owl_chack_table() === false) {
		$as_woo_owl_tbl_data = $wpdb->prefix.'as_woo_owl_opt_tbl';
		$as_woo_owl_result = $wpdb->get_results ("SELECT as_woo_owl_opt_id FROM $as_woo_owl_tbl_data");

		if (count ($as_woo_owl_result) > 0) {
			return true;
		} else {
			return false;
		}
	}

}

function as_woo_owl_all_options_show(){
	global $wpdb;
	$as_woo_name = $wpdb->prefix.'as_woo_owl_opt_tbl';
	$as_woo_owl_sql = "SELECT * FROM `$as_woo_name` WHERE `as_woo_owl_opt_id` = '1' ";
	$as_woo_owl_results = $wpdb->get_results($as_woo_owl_sql) or die(mysql_error());
	return $as_woo_owl_results;
}


function as_woo_owl_replace_option() {


if (as_woo_owl_chack_tbl_data() === true) {
$as_data = as_woo_owl_all_options_show();
$woo = $as_data[0];
update_option( 'as_woo_owl_all_opt_save', array(
			    'carousel_name' => (!empty($woo->carousel_name)) ? $woo->carousel_name : null,
			    'as_woo_owl_product_type' => '_featured',
			    'as_woo_owl_product_category' => 0,
			    'items' => (!empty($woo->items)) ? $woo->items : 0,
			    'itemsDesktop' => (!empty($woo->itemsDesktopwidth)) ? $woo->itemsDesktopwidth : 0,
			    'itemsDesktop_two' => (!empty($woo->itemsDesktopitem)) ? $woo->itemsDesktopitem : 0,
			    'itemsDesktopSmall_one' => (!empty($woo->itemsDesktopSmallwidth)) ? $woo->itemsDesktopSmallwidth : 0,
			    'itemsDesktopSmall_two' => (!empty($woo->itemsDesktopSmallitem)) ? $woo->itemsDesktopSmallitem : 0,
			    'itemsTablet_one' => (!empty($woo->itemsTabletwidth)) ? $woo->itemsTabletwidth : 0,
			    'itemsTablet_two' => (!empty($woo->itemsTabletitem)) ? $woo->itemsTabletitem : 0,
			    'itemsTabletSmall' => (!empty($woo->itemsTabletSmall)) ? $woo->itemsTabletSmall : 1,
			    'itemsMobile_one' => (!empty($woo->itemsMobilewidth)) ? $woo->itemsMobilewidth : 0,
			    'itemsMobile_two' => (!empty($woo->itemsMobileitem)) ? $woo->itemsMobileitem : 0,
			    'singleItem' => (!empty($woo->singleItem)) ? $woo->singleItem : 1,
			    'itemsScaleUp' => (!empty($woo->itemsScaleUp)) ? $woo->itemsScaleUp : 1,
			    'slideSpeed' => (!empty($woo->slideSpeed)) ? $woo->slideSpeed : 0,
			    'paginationSpeed' => (!empty($woo->paginationSpeed)) ? $woo->paginationSpeed : 0,
			    'rewindSpeed' => (!empty($woo->rewindSpeed)) ? $woo->rewindSpeed : 0,
			    'autoPlay' => (!empty($woo->autoPlay)) ? $woo->autoPlay : 1,
			    'stopOnHover' => (!empty($woo->stopOnHover)) ? $woo->stopOnHover : 1,
			    'navigation' => (!empty($woo->navigation)) ? $woo->navigation : 1,
			    'navigationText_one' => (!empty($woo->navigationprev)) ? $woo->navigationprev : 0,
			    'navigationText_two' => (!empty($woo->navigationnext)) ? $woo->navigationnext : 0,
			    'rewindNav' => (!empty($woo->rewindNav)) ? $woo->rewindNav : 1,
			    'scrollPerPage' => (!empty($woo->scrollPerPage)) ? $woo->scrollPerPage : 1,
			    'pagination'	=> (!empty($woo->pagination)) ? $woo->pagination : 1,
			    'paginationNumbers' => (!empty($woo->paginationNumbers)) ? $woo->paginationNumbers : 1,
			    'responsive' => (!empty($woo->responsive)) ? $woo->responsive : 1,
			    'lazyLoad' => (!empty($woo->lazyLoad)) ? $woo->lazyLoad : 1,
			    'lazyFollow' => (!empty($woo->lazyFollow)) ? $woo->lazyFollow : 1,
			    'lazyEffect' => (!empty($woo->lazyEffect)) ? $woo->lazyEffect : 1,
			    'mouseDrag' => (!empty($woo->mouseDrag)) ? $woo->mouseDrag : 1,
			    'touchDrag' => (!empty($woo->touchDrag)) ? $woo->touchDrag : 1,
			    'afterLazyLoad' => (!empty($woo->afterLazyLoad)) ? $woo->afterLazyLoad : 1,
			    'as_woo_owl_add_to_cart' => (!empty($woo->as_woo_owl_add_to_cart)) ? $woo->as_woo_owl_add_to_cart : 1,
			    'as_button' => (!empty($woo->as_button)) ? $woo->as_button : 'themeforest',
			    'as_select_icon' => (!empty($woo->as_icon)) ? $woo->as_icon : 'left1.right1'
				)
			);

global $wpdb;
$as_woo_tbl_name = $wpdb->prefix.'as_woo_owl_opt_tbl';
$wpdb->query("DROP TABLE IF EXISTS $as_woo_tbl_name");
wp_redirect('admin.php?page=as_options');
exit();
}


}
add_action( 'plugins_loaded', 'as_woo_owl_replace_option' );

function as_woo_owl_image_option(){

$as_woo_set_value = get_option('as_woo_owl_all_settings_save');
$as_woo_width   = (empty($as_woo_set_value['as_woo_width'])) ? 300 : $as_woo_set_value['as_woo_width'];
$as_woo_height   = (empty($as_woo_set_value['as_woo_height'])) ? 200 : $as_woo_set_value['as_woo_height'];

if (@$as_woo_set_value['as_woo_checkbox'] == 'yes') {
       add_image_size( 'as_woo_owl_image', $as_woo_width, $as_woo_height, true );
}else{
    add_image_size( 'as_woo_owl_image', 300, 200, true );
}



}
add_action('admin_init', 'as_woo_owl_image_option');