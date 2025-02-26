<?php
class Ancfunction {

public function createTable($type = ""){
global $wpdb;
	$wpdb->query("CREATE TABLE IF NOT EXISTS `wp_anc_fields` (
 `fields_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `fields_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
 `fields_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
 `fields_key` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
 `fields_type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
 PRIMARY KEY (`fields_id`),
 UNIQUE KEY (`fields_key`)   
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci");

}
public function getdata($type = ""){

	global $wpdb;
	$query = "select * from ".$wpdb->prefix."anc_fields ";
	if($type !="") $query .=" where fields_type = '".$type."'";
	$data = $wpdb->get_results($query);
	return $data;

}
public function checkKey($key = ""){

	global $wpdb;
	$query = "select * from ".$wpdb->prefix."anc_fields where fields_key = '".$key."'";
	$data = $wpdb->get_results($query);
	if(count($data) > 0)
	 return 1;
	else
	 return 0;

}


public function insert($data = array()){

	global $wpdb;
	 $query = "insert into ".$wpdb->prefix."anc_fields set
						`fields_name` = '".$data['fields_name']."',
						`fields_value` = '".$data['fields_value']."',
						`fields_key` = '".$data['fields_key']."',
						`fields_type` = '".$data['fields_type']."'
						";
						
	$data_result = $wpdb->query($query);
	return $data_result;

}
public function deleteAll($key = ''){

	global $wpdb;
	 $query = "delete from ".$wpdb->prefix."anc_fields ";
	 if($key !="") $query.=" where fields_type = '".$key."'";
						
	$data_result = $wpdb->query($query);
	return $data_result;

}
public function escapeData($string = ""){

	global $wpdb;
	$prefix = 'anc_';
	$query_string = $prefix.$this->seoString($string);
	
	$i = 0;
	do {
	  //Check in the database here
	  $check = $this->checkKey($query_string);
	  if($check) {
		$i++;
	   $arr =  explode('_',$query_string);
	  // print_r($arr); exit;
		$last = end($arr);
		if(is_numeric($last)) {
			$inc = $last+1;
			$rev_arr = array_reverse($arr);
			$rev_arr[0] =$inc;
			//print_r($rev_arr); exit;

			$stat_arr = array_reverse($rev_arr);
			 $query_string = implode($stat_arr,'_');
		 
		} else {
			 $query_string = $query_string.'_'.$i;
		}
		
	  } else {
		     $query_string = $query_string;
	  }
	}while($check);
						
	return $query_string;

}

public function seoString($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "_", $string);
    return $string;
}

public function filter_post($str,$type = ''){
	     $str = addslashes($str);	
			if($type == "" || $type == "string") {
				if($str != "") {
				  $text =  sanitize_text_field($str);				  
					if($text == ""){					
					  $_SESSION['opendc_error_msg']['string'] = "Some of data does not uploaded successfully.Please input valid String.";
					  }
				  }
				
			} else if($type == "email") {
				if($str != "") {
				  $text =  sanitize_email($str);
					if($text == ""){					 
					  $_SESSION['opendc_error_msg']['email'] = "Some of data does not uploaded successfully.Please input valid Email Address.";
					  }
				}
			}
			return $text;

	     }

}




