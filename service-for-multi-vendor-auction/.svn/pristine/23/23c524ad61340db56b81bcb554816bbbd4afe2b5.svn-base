<?php 
/*Plugin Name: Service for Multi Vendor Auction  
Description: This widget shows the auction products of the Wordpress user. The visitor can navigate between products by buttons. If the visitor clicks on the picture the auction site opens in another window. The auction site (Multi Vendor Auction) stores the products of the users(vendors). The auction site let vendors sell goods or bid on other products after registration or Facebook login. Using the auction site is absolutely free.
Version: 1.0
Author: Smart Code Creator
Author URI: http://blogbook.hu/auction/
License: GPLv2
*/


class service_for_multi_vendor_auction_widget extends WP_Widget {
     
 function __construct() {
 
    parent::__construct(
         
        // base ID of the widget
        'service_for_multi_vendor_auction_widget',
         
        // name of the widget
        __('Service for Multi Vendor Auction', 'multi_vendor_auction' ),
         
        // widget options
        array (
            'description' => __( 'This widget shows the auction products of the Wordpress user. The visitor can navigate between products by buttons. If the visitor clicks on the picture the auction site opens in another window. The auction site (Multi Vendor Auction) stores the products of the users(vendors). The auction site let vendors sell goods or bid on other products after registration or Facebook login. Using the auction site is absolutely free.', 'multi_vendor_auction' )
        )
         
    );
    
    
/**
*	Use  jQuery and ui
*/

	wp_enqueue_script('jquery');
	
	wp_enqueue_script('jquery-ui');

	/**
	 JQuery theme
   */
	wp_register_style('custom_jquery-ui.css', plugins_url('/css/jquery-ui.css', __FILE__));
	 
  wp_enqueue_style( 'custom_jquery-ui.css' );   

 
  
  wp_register_style('service_for_multi_vendor_auction_css', plugins_url('/css/service_for_multi_vendor_auction.css', __FILE__));
	 
  wp_enqueue_style( 'service_for_multi_vendor_auction_css' ); 
     
}
 

    




function form( $instance ) {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array(  'title' => 'Service for Multi Vendor Auction', 'show_link' => '') );
        $service_for_multivendor_auction_title = empty( $instance['service_for_multivendor_auction_title'] ) ? 'Service for Multi Vendor Auction' : esc_attr( $instance['service_for_multivendor_auction_title'] );
        $service_for_multivendor_auction_userid = empty( $instance['service_for_multivendor_auction_userid'] ) ? '5' : esc_attr( $instance['service_for_multivendor_auction_userid'] );
        $service_for_multivendor_auction_main_url = empty( $instance['service_for_multivendor_auction_main_url'] ) ? 'http://auctionandwebshop.blogbook.hu' : esc_attr( $instance['service_for_multivendor_auction_main_url'] );
        $show_link = empty( $instance['show_link'] ) ? '0' : $instance['show_link'];
        ?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
    <input type="text" value="<?php echo $service_for_multivendor_auction_title; ?>" name="<?php echo $this->get_field_name('service_for_multivendor_auction_title'); ?>" id="<?php echo $this->get_field_id('service_for_multivendor_auction_title'); ?>" class="widefat" />
    <label for="<?php echo $this->get_field_id('service_for_multivendor_auction_userid'); ?>"><b>Set your Multi Vendor Auction user ID:</b></label>
    <br>You will your user ID if you login  Multi Vendor Auction (<a href='http://auctionandwebshop.blogbook.hu' target="_blank">http://auctionandwebshop.blogbook.hu</a>) site and click on the 'Action Update, Delete' menu field.

    <input type="text" value="<?php echo $service_for_multivendor_auction_userid; ?>" name="<?php echo $this->get_field_name('service_for_multivendor_auction_userid'); ?>" id="<?php echo $this->get_field_id('service_for_multivendor_auction_userid'); ?>" class="widefat" />
    <label for="<?php echo $this->get_field_id('service_for_multivendor_auction_main_url'); ?>">The main url of the  Multi Vendor Auction:</label>
    <input type="text" value="<?php echo $service_for_multivendor_auction_main_url; ?>" name="<?php echo $this->get_field_name('service_for_multivendor_auction_main_url'); ?>" id="<?php echo $this->get_field_id('service_for_multivendor_auction_main_url'); ?>" class="widefat" />
Change this link if you bought the program from <a href="http://www.binpress.com/app/php-laravel-multivendor-auction/2822" target="_blank">Binpress.com</a> and deploy your server.
</p>


        <?php
    }
   




    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['service_for_multivendor_auction_title'] = strip_tags( $new_instance['service_for_multivendor_auction_title'] );
        $instance['service_for_multivendor_auction_userid'] = strip_tags( $new_instance['service_for_multivendor_auction_userid'] );
        $instance['service_for_multivendor_auction_main_url'] = strip_tags( $new_instance['service_for_multivendor_auction_main_url'] );
        $instance['show_link'] = strip_tags( $new_instance['show_link'] );
        return $instance;
    }
    
    

    
    function widget( $args, $instance ) {
    



        extract( $args );

        $service_for_multivendor_auction_title = empty( $instance['service_for_multivendor_auction_title'] ) ? 'Service for Multi Vendor Auction' : $instance['service_for_multivendor_auction_title'];
        
        $service_for_multivendor_auction_userid = empty( $instance['service_for_multivendor_auction_userid'] ) ? '5' : $instance['service_for_multivendor_auction_userid'];
        
        $service_for_multivendor_auction_main_url = empty( $instance['service_for_multivendor_auction_main_url'] ) ? 'http://auctionandwebshop.blogbook.hu' : $instance['service_for_multivendor_auction_main_url'];
         
         
         
        $show_link = empty( $instance['show_link'] ) ? '0' : $instance['show_link'];

        echo $before_widget;
        if ( $service_for_multivendor_auction_title ){
        echo $before_title . $service_for_multivendor_auction_title . $after_title;
        }
            

     
        wp_register_script('service_for_multi_vendor_auction_js', plugins_url('/js/service_for_multi_vendor_auction.js', __FILE__), false, '');
	      wp_enqueue_script('service_for_multi_vendor_auction_js');    
	      
     
         $params = array(
          'userid' => $service_for_multivendor_auction_userid,
          'main_url' => $service_for_multivendor_auction_main_url,
        );
            
         wp_localize_script( 'service_for_multi_vendor_auction_js', 'php_data', $params );
            
            
       
            

        ?>
        


<div id="service_for_multivendor_auction_wrapper">
<!--
<b>Service for Multi Vendor Auction</b>
<br>
-->
<div class="ui-state-default ui-corner-all la_btn" style="float:left;" id="service_for_multivendor_auction_btn_left">
<span class="ui-icon ui-icon-triangle-1-w" style="margin-top:65px;" ></span>
</div>
<a id='service_for_multivendor_auction_image_link' href='' target='_blank'><img id="service_for_multivendor_auction_image" style="float:left;" ></a>
<div class="ui-state-default ui-corner-all la_btn" style="float:left;" id="service_for_multivendor_auction_btn_right">
<span class="ui-icon ui-icon-triangle-1-e" style="margin-top:65px;"></span>
</div>
<br style="clear:left;">
<a id='service_for_multivendor_auction_info' href='' target='_blank'><div id="service_for_multivendor_auction_info"></div></a>
<div id="service_for_multivendor_auction_name"></div>
</div>






        <?php

        echo $after_widget;
    }    
    
    

     
}


function service_for_multi_vendor_auction_widget() {
 
    register_widget( 'service_for_multi_vendor_auction_widget' );
 
}
add_action( 'widgets_init', 'service_for_multi_vendor_auction_widget' );

?>
