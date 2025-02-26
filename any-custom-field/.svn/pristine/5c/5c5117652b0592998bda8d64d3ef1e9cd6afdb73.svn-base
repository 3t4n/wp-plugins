<?php
global $wpdb;
require_once('functions.php');
class AncfunctionDemoData extends Ancfunction {

public function checkdata($type = ""){

	global $wpdb;
	$query = "select count(*) as tot from ".$wpdb->prefix."anc_fields ";
	$data = $wpdb->get_results($query);
	return $data[0]->tot;

}
public function insertDemo($data = array()){

	global $wpdb;
	$prefix = 'anc_';
	$demodata_fb = array('fields_name' => 'Facebook url','fields_value' => 'htpp://facebook.com','fields_key' => $prefix.'fb_url','fields_type' => 'social');
	$demodata_tw = array('fields_name' => 'Twitter url','fields_value' => 'htpp://twitter.com','fields_key' => $prefix.'tw_url','fields_type' => 'social');
	$demodata_gp = array('fields_name' => 'Goolgle plus url','fields_value' => 'htpp://google.com','fields_key' => $prefix.'gp_url','fields_type' => 'social');
	$demodata_pnt = array('fields_name' => 'Pinterest url','fields_value' => 'htpp://pinterest.com','fields_key' => $prefix.'pnt_url','fields_type' => 'social');
	$demodata_insta = array('fields_name' => 'Instagram url','fields_value' => 'htpp://intagram.com','fields_key' => $prefix.'insta_url','fields_type' => 'social');
	$demodata_email = array('fields_name' => 'Email','fields_value' => 'test@examle.com','fields_key' => $prefix.'email_url','fields_type' => 'social');
	parent::insert($demodata_fb);
	parent::insert($demodata_tw);
	parent::insert($demodata_gp);
	parent::insert($demodata_pnt);
	parent::insert($demodata_insta);

}
}
