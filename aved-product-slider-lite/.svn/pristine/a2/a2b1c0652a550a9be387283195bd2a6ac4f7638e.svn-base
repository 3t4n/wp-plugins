<?php
/*
*
* 	Class Base Operations
*	Core Aved Soft
*
*
*/
?>
<?php 
global $jal_db_version;
$jal_db_version = "1.0";
class AVS_base_operation
{
	public static function type_decode($type){
		if(!isset($type)){return false;}
		switch ($type){
			case '1':	return 'By Product ID';					break;
			
			case '2': 	return 'By Product Category';			break;
			
			case '3':	return 'By Product Page Category';      break;

			case '4':	return 'By Viewed Product'	;			break;

			default: return 'Not Found type in base' ;break;
		}
	}
	public static function encode_array($arg)
	{
		if(!isset($arg)){return false;}
		return json_encode($arg);
	}
	public static function decode_array($arg)
	{
		if(!isset($arg)){return false;}
		return json_decode($arg,true);
	}

	//** Is options in data base  **//
	public static function is_init()
	{
		$options = get_option('AVS_SLIDER_OP');
		if( isset($options) )
		{
			if(!isset($options['increment']))
			{
				$options['increment'] = 1;
			}
			if(!isset($options['init']))
			{
				$options['init'] = true;
			}
			if(!isset($options['count_slides']))
			{
				$options['count_slides'] = 0;
			}
			if(!isset($options['options_AVS']))
			{
				$options['options_AVS'] = 'default';
			}
			update_option('AVS_SLIDER_OP',$options);
		}
		else
		{
			$options = array( 
				'increment' => 1,
				'init' => true,
				'count_slides' => 0,
				'options_AVS' => 'default'
				);
			update_option('AVS_SLIDER_OP',$options);
		}
	}
	public static function get_increment(){
		$incr = get_option('AVS_SLIDER_OP');
		if(!isset($incr)){return false;}
		$in = $incr['increment'];
		$incr['increment'] = $incr['increment']+1;
		update_option('AVS_SLIDER_OP',$incr);
		return $in;
	}
	public static function get_options()
	{
		$options = get_option('AVS_SLIDER_OP');
		if(!isset($options))
		{
			$this::is_init();
			$options = get_option('AVS_SLIDER_OP');
		}
		return $options;
	}
}

class AVS_base_install
{
	public static function create_table($baseName)
	{

		global $wpdb;
		$baseName = $wpdb->prefix.$baseName;
		if($wpdb->get_var("SHOW TABLES LIKE '".$baseName."'") != $baseName) {
			$sql = "CREATE TABLE ".$baseName." (ID int (10) AUTO_INCREMENT,params longtext,count_slides int,type longtext, name longtext ,PRIMARY KEY (ID))";
		$wpdb->get_results($sql);
		}
	
	}
}


?>