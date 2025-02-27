<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;


if( !class_exists( 'vxg_install_dynamics' ) ):

class vxg_install_dynamics extends vxg_dynamics{
      public static $sending_req=false;
public function get_roles(){
      $roles=array(
      vxg_dynamics::$id."_read_feeds",
      vxg_dynamics::$id."_edit_feeds",
      vxg_dynamics::$id."_read_logs" , 
      vxg_dynamics::$id."_export_logs" , 
      vxg_dynamics::$id."_read_settings" , 
      vxg_dynamics::$id."_edit_settings" , 
      vxg_dynamics::$id."_send_to_crm" , 
      vxg_dynamics::$id."_read_license" , 
      vxg_dynamics::$id."_uninstall"
      );
      return $roles;

}
public function create_roles(){
      global $wp_roles;
      if ( ! class_exists( 'WP_Roles' ) ) {
            return;
        }
$roles=$this->get_roles();
foreach($roles as $role){
  $wp_roles->add_cap( 'administrator', $role );
}
$wp_roles->add_cap( 'administrator', 'vx_crmperks_view_addons' );
$wp_roles->add_cap( 'administrator', 'vx_crmperks_edit_addons' );
}

public function remove_roles(){
      global $wp_roles;
      if ( ! class_exists( 'WP_Roles' ) ) {
            return;
        }
$roles=$this->get_roles();
foreach($roles as $role){
  $wp_roles->remove_cap( 'administrator', $role );
}
}
public function remove_data(){
    global $wpdb;

  //delete options
  delete_option($this->type."_version"); 
  delete_option($this->type."_updates");
  delete_option($this->type."_settings");
     $other_version=$this->other_plugin_version(); 
    if(empty($other_version)){ //if other version not found
  delete_option(vxg_dynamics::$id."_crm");
  delete_option(vxg_dynamics::$id."_meta");
  $this->deactivate('uninstall'); 
    $data=vxg_dynamics::get_data_object();
  $data->drop_tables();
  $this->remove_roles();
  }

  $this->deactivate_plugin();
}
public function deactivate_plugin(){
        $slug=$this->get_slug();
          //deactivate 
  deactivate_plugins($slug); 
    update_option('recently_activated', array($slug => time()) + (array)get_option('recently_activated'));
}

}

endif;
