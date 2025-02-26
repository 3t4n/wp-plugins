<?php
function om_stripe_register_scripts() {
  wp_enqueue_script( 'om_stripe', 'https://js.stripe.com/v2/', array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'om_stripe_scripts', plugins_url('js/script.js', __FILE__), array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'om_stripe_stripe', plugins_url('js/stripe.js', __FILE__), array('jquery'), '1.0.0', true );
  wp_localize_script('om_stripe_scripts', 'om_stripe_url', array( 'image_url' =>plugins_url('images/ajax-loader.gif',__FILE__),"ajaxurl" => admin_url( "admin-ajax.php" )));
  
    //Calling database of wordpress
	global $wpdb;
	$table_name = $wpdb->prefix . "om_stripe";
	$om_stripe_key= $wpdb->get_row("SELECT * FROM `$table_name` WHERE  id=1");
	$publishable_key=$om_stripe_key->publishable_key;
  wp_localize_script('om_stripe_stripe', 'publishable_key', array( 'key' =>$publishable_key));
    
}add_action('wp_enqueue_scripts', "om_stripe_register_scripts"); 
function om_stripe_register_style() {
 wp_enqueue_style( 'om_stripe_style', plugins_url('css/style.css', __FILE__), array(), '1.0.0', 'all' );
}add_action('wp_enqueue_scripts', "om_stripe_register_style"); ?>