<?php

function ajax_product_search_integrateWithVC() {
  
   //section title
   vc_map( array(
      "name" => __( "Ajax Product Search", "ajax_product_search" ),
      "base" => "ajaxsearch",
      "category" => __( "Ajax Product Search", "ajax_product_search"),
      // "icon" =>  plugin_dir_url( dirname( __FILE__ ) ). "assets/images/thumbnail.png",
      "params" => array(
         array(
            "type"        =>  "textfield",
            "heading"     =>  __( "Placeholder", "ajax_product_search" ),
            "param_name"  =>  "placeholder",
            "admin_label" =>  true
          ),
         array(
            "type"        =>  "textfield",
            "heading"     =>  __( "Button", "ajax_product_search" ),
            "param_name"  =>  "button",
            "admin_label" =>  true
         )
      )
   ) );

}

add_action( 'vc_before_init', 'ajax_product_search_integrateWithVC' );