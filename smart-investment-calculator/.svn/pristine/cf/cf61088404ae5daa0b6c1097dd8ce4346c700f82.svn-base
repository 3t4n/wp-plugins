<?php

function WPBOX_home(){include 'Pages/activation.php';}
function WPBOX_support() {include 'Pages/support.php';}
function WPBOX_settings() {include 'Pages/settings.php';}
function WPBOX_pro() {include 'Pages/pro.php';}


function WPBOX_CSSJS() {
    wp_enqueue_style( 'sic-style1', plugins_url('CSS/style.css?v=2.1', __FILE__) );
    wp_enqueue_style( 'sic-style2', plugins_url('JS/tipx/jqu.css', __FILE__) );
    wp_enqueue_style( 'sic-style3', plugins_url('JS/tipx/style.css', __FILE__) );
    wp_enqueue_script( 'jquery-ui-tooltip' );

     wp_enqueue_script('sic-script4',plugins_url('JS/a81368914c.js', __FILE__)  );
     wp_enqueue_script('sic-script5',plugins_url('wpbox-admin.js', __FILE__),1 ,1,1 );
     
     wp_enqueue_script('sic-script7',plugins_url('JS/feedback.js', __FILE__),1 ,2,1 );
     wp_enqueue_script('sic-script8',plugins_url('JS/pages.js', __FILE__),1 ,2,1 );
     wp_enqueue_script('sic-script9',plugins_url('JS/ifresiz.js', __FILE__),1 ,2,1 );

}





function WPBOX_menu() {
  

  add_menu_page ( 'Menu', 'Investment Calculator', 'manage_options', 'MAINMENUWPBOX', 'WPBOX_home', 'dashicons-money-alt' );
  add_submenu_page ( 'MAINMENUWPBOX', 'WPBOX_settings', 'Settings', 'manage_options','WPBOX_settings' ,'WPBOX_settings', '');


  add_submenu_page ( 'MAINMENUWPBOX', 'ProWPBOX', 'Pro', 'manage_options','ProWPBOX' ,'WPBOX_Pro', '');
  add_submenu_page ( 'MAINMENUWPBOX', 'SupportWPBOX', 'Support', 'manage_options','SupportWPBOX' ,'WPBOX_support', '');
  

}?>