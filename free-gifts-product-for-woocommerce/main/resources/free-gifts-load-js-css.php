<?php 

//Add JS and CSS on Backend
add_action( 'admin_enqueue_scripts', 'FGW_load_admin_js_css');
function FGW_load_admin_js_css() {
  if ( is_admin() && isset( $_GET['page'] ) && $_GET['page'] === 'free_gift' ) {
  	global $fgw_comman;
    wp_enqueue_style( 'FGW_admin_style', FGW_PLUGIN_DIR . '/assets/css/back.css', false, '1.0.0' );
    if ( ! wp_script_is( 'select2', 'enqueued' ) ) {
      wp_register_script( 'gift-select2', FGW_PLUGIN_DIR . '/assets/select2/js/select2.js', array( 'jquery' ), '1.0', true );
      wp_enqueue_script( 'FGW_admin_script', FGW_PLUGIN_DIR . '/assets/js/back.js', array( 'gift-select2'), false, '1.0.0', true );
    }else{
      wp_enqueue_script( 'FGW_admin_script', FGW_PLUGIN_DIR . '/assets/js/back.js', array( 'jquery', 'select2'), false, '1.0.0', true );
    }
    
    
    wp_localize_script( 'ajaxloadpost', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_style( 'woocommerce_admin_styles-css', WP_PLUGIN_URL. '/woocommerce/assets/css/admin.css',false,'1.0',"all");
    wp_enqueue_style( 'wp-color-picker' );
  	wp_enqueue_script( 'wp-color-picker-alpha', FGW_PLUGIN_DIR . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
  	$FGW_array_img = FGW_PLUGIN_DIR;
    wp_localize_script( 'FGW_admin_script', 'FGW_DATA', 
      array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'FGW_array_img' => $FGW_array_img, 
        'ajaxnonce' => wp_create_nonce( 'fgw_ajax_nonce' ) 
      )
    );
  }
}

//Add JS and CSS on Frontend
add_action( 'wp_enqueue_scripts',  'FGW_load_front_js_css',900000,90000);
function FGW_load_front_js_css() {
	global $fgw_comman;
 	wp_enqueue_style( 'FGW_front_style', FGW_PLUGIN_DIR . '/assets/css/front.css', false, '1.0.0' );
  wp_enqueue_script( 'FGW_front_script', FGW_PLUGIN_DIR . '/assets/js/front.js',array("jquery"), false, '1.0.0', true );
 	 
 	wp_localize_script( 'FGW_front_script', 'FGWWdata', 
		array(
      'fgw_ajax_url'=>admin_url('admin-ajax.php'),   
    )
 	);
}
