<?php

class Lobia
{

// address file haye plugin   
public function masir ($filename){

  $masir =  plugin_dir_url( __FILE__ ) . $filename;
  return $masir;

}



public function nasb($plugin_name){

  $install_link = '<a href="' . esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $plugin_name . '&TB_iframe=true&width=600&height=550' ) ) . '" class="thickbox" title="اطلاعات بیشتر درباره  ' . $plugin_name . '">نصب افزونه  ' . $plugin_name . '</a>';
  
  return $install_link;

}




}




