<?php
if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly
}
class Booknow_Custom_Role {
   function __construct(){
      add_action( 'admin_init', array($this,"add_caps"));
      add_action( 'init', array($this,"add_role") );
   }
   function add_caps() {
      $role = get_role( 'administrator' );
      $role->add_cap('booknow');
      $role->add_cap('booknow_staffs'); 
      $role1 = get_role( 'editor' );
      $role1->add_cap('booknow');
      $role1->add_cap('booknow_staffs');
   }
   function add_role(){
      if ( get_option( 'booknow_staffs_role' ) < 1 ) {
         $datas = get_role( 'subscriber' )->capabilities;
         $datas["booknow_staffs"] = true;
         $datas["booknow"] = true;
           add_role( 'booknow_staffs', esc_html__( "BookNow Staffs", "booknow"),$datas );
           update_option( 'booknow_staffs_role', 1 );
       }
   }
}
new Booknow_Custom_Role;