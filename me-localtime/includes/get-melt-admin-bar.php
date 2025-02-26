<?php


class MELT_DisplayTimeAdminBar {


  function __construct(){
    add_action('wp_before_admin_bar_render', array( $this, 'melt_local_time_display_admin_bar' ) );
  }


  function melt_local_time_display_admin_bar(){

    global $wp_admin_bar;

    $args = array(
      'id' => 'melt_local_time_admin_bar',
      'title' => '<p class="melt_localtimedisplay"></p>',
      'parent' => 'top-secondary'
    );


    $wp_admin_bar->add_menu($args);

  }

}


$displayTimeAdminBar = new MELT_DisplayTimeAdminBar();
