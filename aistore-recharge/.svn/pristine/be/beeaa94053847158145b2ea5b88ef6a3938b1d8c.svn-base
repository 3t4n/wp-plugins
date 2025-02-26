<?php
/**
 * Plugin Name: AIStore Recharge
 * Plugin URI:  http://www.aistore2030.com
 * Description: AIStore Recharge Plugins using this you can provide rechagre services from your website and you can make profit from this.
 * Version:     1.3.1
 * Author:      susheelhbti
 * Author URI:  http://www.aistore2030.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

 
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
} else {
	add_action( 'admin_notices', 'aistore_recharge_notice' );
}

/**
 * 
 * @todo Notice admin to activate WooCommerce Plugin
 */
function aistore_recharge_notice() {
	echo '<div class="error"><p><strong> <i> Aistore Recharge </i> </strong> Requires  <a href="'.admin_url( 'plugin-install.php?tab=plugin-information&plugin=woocommerce').'"> <strong> <u>Woocommerce</u></strong>  </a>  To Be Installed And Activated </p></div>';
}



register_activation_hook( __FILE__, array( 'Aistore_Install', 'install' ) );
 

add_action('admin_menu', 'aistore2030_register_my_custom_menu_page');

function aistore2030_register_my_custom_menu_page()
{
    
	
    add_menu_page('Recharge', 'Recharge ', 'read', 'aistore2030_recharge', 'aistore2030_complete_recharge_report_admin', '', 51);
    

	 add_submenu_page('aistore2030_recharge', 'Aistore Recharge', 'Settings', 'administrator', 'aistore_recharge_settings_page', 'aistore_recharge_settings_page');
    
    

	 add_submenu_page('aistore2030_recharge', 'Aistore Recharge', 'How to setup', 'administrator', 'aistore_recharge_howtosetup_page', 'aistore_recharge_howtosetup_page');
	 
	 
    add_action('admin_init', 'aistore_recharge_settings_group');
    
    
}


function aistore2030_complete_recharge_report_admin()
{
    
ob_start(); 
include "template/report.php";
echo  ob_get_clean();
    
    
}

function aistore2030_complete_recharge_report()
{
 
 
  //processRechargeStep3($_REQUEST['i']);
	  
	  
ob_start();
include "template/report.php";
return ob_get_clean();
    
    
}


function processRechargeStep2()
{ 
    
    if (!isset($_POST['process_recharge']) || !wp_verify_nonce($_POST['process_recharge'], 'process_recharge')) {
        
        return "Some Technical Error";
        
    }
	   $recharge_number = sanitize_text_field($_REQUEST['recharge_number']);
    
    
    $recharge_operator = sanitize_text_field($_REQUEST['recharge_operator']);
	   
    $recharge_amount   = sanitize_text_field($_REQUEST['recharge_amount']);
	
		 $product = aistore_get_wallet_rechargeable_product();
	  
	  WC()->cart->empty_cart();
	  
	  $cart_item_data = array('price' => $recharge_amount,'recharge_number' => $recharge_number,'recharge_operator' => $recharge_operator);
	 
	  
	  
	WC()->cart->add_to_cart( $product->get_id() , 1, '', array(), $cart_item_data);
	 
	  
  
	
ob_start(); 
include  "template/step2.php";
return ob_get_clean();
 
 
    
}




function aistore2030_manage_forms_step($type )
{  $step = "one";
    
    
    if (isset($_REQUEST['step'])) {
        $step = $_REQUEST['step'];
    }
    
    $step = sanitize_text_field($step);
    
    
    if ($step == "one") {
        
           
	global $wp;
 $current_url = home_url( add_query_arg( array(), $wp->request )	 );

 $url2 =	  esc_url( add_query_arg( 'step', 'two', $current_url ) ); 
	

        
        
		if ($type == "prepaid") {
		    
		$file="template/prepaid.php";
      
    } else if ($type == "dth") {
      $file="template/dth.php";
        
          
         
    } else if ($type == "postpaid") {
      $file= "template/postpaid.php";
           
    }
	else if ($type == "electricity") {
         $file= "template/electricity.php";
        
    }else if ($type == "gas") {
          $file= "template/gas.php";
          
    }
	 
	else if ($type == "water") {
	    $file= "template/water.php";
             
    }
	
ob_start();
include	$file;
return ob_get_clean();

    } else if ($step == "two") {
        
        
    return    processRechargeStep2();
		 
    }  
    
    
}

 // type prepaid , postpaid , dth 
function aistore2030_recharge_form($atts)
{
	 
	
	 return aistore2030_manage_forms_step($atts['type'] );
 
}
 
 
add_shortcode( 'AISTORERECHARGEFORM', 'aistore2030_recharge_form' );

add_shortcode( 'AistoreRechargeReport', 'aistore2030_complete_recharge_report' );









function iconic_display_engraving_text_cart( $item_data, $cart_item ) {
	if ( empty( $cart_item['recharge_operator'] ) ) {
	return $item_data;
	}


	if ( empty( $cart_item['recharge_number'] ) ) {
	return $item_data;
	}
	
	$item_data[] = array(
		'key'     => __( 'Number', 'aistore' ),
		'value'   => wc_clean( $cart_item['recharge_number'] ),
		'display' => '',
	);

	
		$item_data[] = array(
		'key'     => __( 'Operator', 'aistore' ),
		'value'   => wc_clean( $cart_item['recharge_operator'] ),
		'display' => '',
	);
	
	return $item_data;
}

 add_filter( 'woocommerce_get_item_data', 'iconic_display_engraving_text_cart', 10, 2 );



function aistore2030_add_text_to_order_items( $item, $cart_item_key, $values, $order ) {
	if ( empty( $values['recharge_number'] ) ) {
		return;
	}
	
	if ( empty( $values['recharge_operator'] ) ) {
		return;
	}
	
	
$item->add_meta_data( __( 'recharge_number', 'aistore' ), $values['recharge_number'] );
	$item->add_meta_data( __( 'recharge_operator', 'aistore' ), $values['recharge_operator'] );
}

add_action( 'woocommerce_checkout_create_order_line_item', 'aistore2030_add_text_to_order_items', 10, 4 );



add_action( 'woocommerce_before_calculate_totals', 'aistore2030_add_custom_price' );
function aistore2030_add_custom_price( $cart ) {
    foreach ( $cart->cart_contents as $key => $value ) {
      if( isset( $value["price"] ) ) {
		      $value['data']->set_price($value['price']);
	  } 
    }
}











 add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
 
 
 
function woo_change_order_received_text( $str, $order ) {
	
	
	
	
 foreach ( $order->get_items() as $key => $item ) {
	 
	 $product_id = $item->get_product_id();
	 $product = aistore_get_wallet_rechargeable_product();
	 if ($product->get_id() <> $product_id)    return "";
             
			 
				
				
    $recharge_operator = wc_get_order_item_meta( $key, 'recharge_operator' );
   $recharge_number = wc_get_order_item_meta( $key, 'recharge_number' );
   $recharge_amount = $item->get_total();
}  


    $new_str = 'Recharge for the number '.$recharge_number. ' and operator '.$recharge_operator .' was forwarded to server. Please visit recharge report page to see live status.' ;
    return $new_str;
}





 function processRechargeStep3($order_id){


 
	 $product = aistore_get_wallet_rechargeable_product();
 
    $order = wc_get_order( $order_id );


	 
	
 foreach ( $order->get_items() as $key => $item ) {
    
$product_id = $item->get_product_id();
	 $product = aistore_get_wallet_rechargeable_product();
	 
 

	 if ($product->get_id() <> $product_id)    return "";
        
        
        


				
   $recharge_number = wc_get_order_item_meta( $key, 'recharge_number' );
   $recharge_amount = $item->get_total();
    $recharge_operator = wc_get_order_item_meta( $key, 'recharge_operator' );
	 
    $user = wp_get_current_user();
    
    $id = $user->ID;
    

$url = "http://api.sakshamapp.com/MobileRech?username=" . esc_attr(get_option('aistore_username')) . "&password=" . esc_attr(get_option('aistore_password')) . "&recharge_circle=0&recharge_operator=$recharge_operator&recharge_number=$recharge_number&amount=$recharge_amount&format=json&requestID=";
        
    global   $wpdb;
    
    $table_name = $wpdb->prefix . 'recharge';
     
    $details= "$product_id---$productIDN -- Recharge request for the $recharge_operator  recharge_number=$recharge_number  amount $recharge_amount and order id $order_id ";
/*

$my_post = array(
  'post_title'    => wp_strip_all_tags( $order_id). $details.$url.aistore_recharge_getRealIpAddr() ,
  'post_content'  => print_r($_REQUEST,true),
  'post_status'   => 'publish',
  'post_author'   => 1 
);
 
// Insert the post into the database
wp_insert_post( $my_post );
*/

 
	//aistore2030_checkTable();
    
    
    
        $wpdb->query($wpdb->prepare("INSERT INTO $table_name (user_id,recharge_number,
recharge_amount,recharge_operator, description,url_hit,ip_address ) VALUES (%d, %s,%s,%s,%s, %s  ,%s )", array(
            $id,
            $recharge_number,
            $recharge_amount,
            $recharge_operator,
           
            $details,
            $url,
            aistore_recharge_getRealIpAddr()
        )));
        
        
        
        
        
        $insert_id = $wpdb->insert_id;
        
        $url = $url . $insert_id;
        
        
         
        
        $response =  wp_remote_get($url);
        
        $wpdb->query($wpdb->prepare("update $table_name 
 set 
  url_response  = %s
 where
  id  = %d   
  ", array(
            print_r($response['body'], true),
            $insert_id
        )));
        
        
        
        
        $ar = json_decode($response['body']); 
        
        if ($ar->error) {
        
    $wallet = new Woo_Wallet_Wallet();
 

 $wallet->credit(1, $recharge_amount, $details = 'Recharge refund ' .$recharge_number);
              
      
        

		
            $wpdb->query($wpdb->prepare("update $table_name 
 set 
  status  = 'Failure',
    message  = %s,
	Error  = %s 
 where
  id  = %d   
  ", array(
                "Recharge is failure",
                $ar->error ,
                $insert_id
            )));
            
          
            
        }
        
        else {
             
            
            
            $wpdb->query($wpdb->prepare("update $table_name 
 set 
  status  =%s,
    message  = %s,
	Error  = %s 
 where
  id  = %d   
  ", array(
                $ar->Status,
                "Recharge is success",
                $ar->error,
                
                $insert_id
            )));
            
            
        }
		
 	}
	
 
}  


	 
	 
 	
//add_action( 'woocommerce_order_status_pending', 'processRechargeStep3', 10, 1);
//add_action( 'woocommerce_order_status_failed', 'processRechargeStep3', 10, 1);
//add_action( 'woocommerce_order_status_on-hold', 'processRechargeStep3', 10, 1);
// Note that it's woocommerce_order_status_on-hold, and NOT on_hold.
//add_action( 'woocommerce_order_status_processing', 'processRechargeStep3', 10, 1);
//add_action( 'woocommerce_order_status_completed', 'processRechargeStep3', 10, 1);
//add_action( 'woocommerce_order_status_refunded', 'processRechargeStep3', 10, 1);
//add_action( 'woocommerce_order_status_cancelled', 'processRechargeStep3', 10, 1);	
 
add_action( 'woocommerce_order_status_completed', 'processRechargeStep3', 10, 1);
 

 /* 
 add_action( 'woocommerce_init', 'aistore2030_force_non_logged_user_wc_session' );
function aistore2030_force_non_logged_user_wc_session(){ 
    if( is_user_logged_in() || is_admin() )
       return;

 //   if ( ! WC()->session->has_session() ) 
 //      WC()->session->set_customer_session_cookie( true ); 
}

*/

 
add_action('rest_api_init', function () {
    register_rest_route('aistoreRecharge/v1', '/AcceptCallback', array(
        'methods' => 'GET',
        'callback' => 'aistoreRecharge_secure_callback_accept_func',
    ));
});

function aistoreRecharge_secure_callback_accept_func(WP_REST_Request $data) {

    $txid = $data['txid'];
     $insert_id = $data['requestID'];

    $url = "http://api.sakshamapp.com/Status?username=" . esc_attr(get_option('aistore_username')) . "&password=" . esc_attr(get_option('aistore_password')) . "&txid=" . $txid . "&format=json";


    $response = wp_remote_get($url);

//var_dump($response);

    $ar = json_decode($response['body']);
//var_dump($ar);
//echo $ar->Status;

    global $wpdb;
    $table_name = $wpdb->prefix . 'recharge';

    $wpdb->query($wpdb->prepare("update $table_name 
 set  status  = %s,
 status_url  = %s,
 status_response  = %s,
 operator_transaction_id= %s
 where  id  = %d   
  ", array(
                $ar->Status,
                $url,
                $response['body'],
                $ar->op_txid,
                $insert_id
    )));

//echo $wpdb->last_query;


    return $data['txid'];
}


 
 include "util.php";
 
 include "activate.php";
 
  include "settings.php";
  
  
  
 
  include "howto.php";
  