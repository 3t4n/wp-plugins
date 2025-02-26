<?PHP


add_action( 'wp_enqueue_scripts', 'grabar_scripts' );
function grabar_scripts(){
	wp_enqueue_script( 'grabar', plugins_url('js/GrabAR.js',__FILE__) , array(), false, true );
	wp_register_style( 'grabar', plugins_url('css/GrabAR.css',__FILE__)  );
	wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:400,600,700|Work+Sans:600,500,400,300', false ); 
  wp_enqueue_style( 'grabar' );
}

/**
 * Enqueue a script in the WordPress admin for settings.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function grabar_selectively_enqueue_admin_script( $hook ) {
    if ( 'settings_page_grabar' == $hook ) {
        wp_enqueue_script( 'grabar_admin_settings_js', GRABAR_PLUGIN_URL.'include/js/settings.js', array(), false, true );
        wp_register_style( 'grabar_admin_css', plugin_dir_url( __FILE__ ) . 'css/GrabAR_settings.css', false, '1.0.0' );
        wp_enqueue_style( 'grabar_admin_css' );
    }
}
add_action( 'admin_enqueue_scripts', 'grabar_selectively_enqueue_admin_script' );


function grabar_footer_button(){
  	echo grabar_build_button();
}
function grabar_add_button_next_to_cart() {
	$my_custom_link = '';
	echo grabar_build_button(1);
}
$incBttn = get_option('grabar_inc_button');
$wooBttn = get_option('grabar_woo_btn');
if($wooBttn){
	add_action( 'woocommerce_after_add_to_cart_button', 'grabar_add_button_next_to_cart',10,0 );
}
	
elseif($incBttn)
	add_action( 'wp_footer', 'grabar_footer_button' );


/**
* Build the output button
* Save POSTed data from the Administration Panel into a WordPress option
*/
function grabar_build_button($noCss = 0) {
	$sideBtn = get_option('grabar_side_button');
	$sideBtnPos = get_option('grabar_side_button_position');
	$width = get_option('grabar_btn_width');
	$color = get_option('grabar_btn_color');
	$bg_imgs = get_option('grabar_background_img');
	$url = get_option('grabar_product_url');
	$top = get_option('grabar_top');
	$padding = get_option('grabar_padding');
	$inc_bg = get_option('grabar_inc_background');
	if(!$noCss){
		$style = get_option('grabar_custom_style');
		$fixed = get_option('grabar_fixed');
	}		
	$incBttn = get_option('grabar_inc_button');
	$customBttn = get_option('grabar_custom_btn');

	
	if($incBttn && strpos($style,"position") === false && strpos($style,"top") === false && $fixed != "bottom_right" && $fixed !== "bottom_left"){
		$style = "position:absolute;top:100px;".$style;
	}
	
	$btn = '<a href="#" data-modal="modal-GrabAR" id="GrabAR_Btn"';
	if($sideBtn){
		$btn .= ' data-use_side_button="yes"';
		$btn .= ' data-side_button_position="'.$sideBtnPos.'"';
	}
	else{
		if($width) $btn .= ' data-img_width="'.$width.'"';
		if($color != "green") $btn .= ' data-button_color="'.$color.'"';
		if($customBttn) $btn .= ' data-button_src="'.$customBttn.'"';
		if($fixed) $btn .= ' data-fixed="'.$fixed.'"';
		if($top) $btn .= ' data-top="'.$top.'"';
		if($padding) $btn .= ' data-padding="'.$padding.'"';
	}
	
	if($bg_imgs) $btn .= ' data-background_img="yes"';
	if(substr($url,0,5) == 'http') $btn .= ' data-product_url="'.$url.'"';
	if($inc_bg) $btn .= ' data-inc_background="yes"';
	
	if($incBttn && $style) $btn .= ' data-custom_style="'.$style.'"';
	$btn .= "></a>";
	return $btn;
	
}
/*add_action( 'admin_menu', 'grabar_add_settings_page' );
function grabar_add_settings_page() {
    add_options_page( 'GRAB AR settings', 'Example Plugin Menu', 'manage_options', ‘dbi-example-plugin’, 'dbi_render_plugin_settings_page' );
}*/
