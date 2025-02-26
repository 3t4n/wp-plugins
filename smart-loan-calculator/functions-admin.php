<?php

function SLC_home(){include 'Pages/activation.php';}
function SLC_support() {include 'Pages/support.php';}
function SLC_ManageSheets() {include 'Pages/settings.php';}
function SLC_upgrade() {include 'Pages/pro.php';}


function SLC_CSSJS() {

$pgs = ["MAINMENUSLC","SLC_ManageSheets","SLC_upgrade","SupportSLC"];

if(isset($_GET['page']) &&  in_array($_GET['page'], $pgs) ){
    wp_enqueue_style( 'style1', plugins_url('CSS/style.css?v=2.1', __FILE__) );
    wp_enqueue_script( 'jquery-ui-tooltip' );
  }

    wp_enqueue_script('script4',plugins_url('slc.js?v=1.5', __FILE__)  );  // 0: footer
    wp_enqueue_script('slc_script_3',plugins_url('feedback.js?v=1.1', __FILE__),1 ,2,1 );


}


function SLC_menu() {
  

  add_menu_page ( 'Menu', 'Smart Loan Calculator LITE', 'manage_options', 'MAINMENUSLC', 'SLC_home', 'dashicons-money-alt' );
  add_submenu_page ( 'MAINMENUSLC', 'SLC_ManageSheets', 'Settings', 'manage_options','SLC_ManageSheets' ,'SLC_ManageSheets', '');

    add_submenu_page ( 'MAINMENUSLC', 'SLC_upgrade', 'Get Pro', 'manage_options','SLC_upgrade' ,'SLC_upgrade', '');

  add_submenu_page ( 'MAINMENUSLC', 'SupportSLC', 'Support', 'manage_options','SupportSLC' ,'SLC_support', '');
  

}?>