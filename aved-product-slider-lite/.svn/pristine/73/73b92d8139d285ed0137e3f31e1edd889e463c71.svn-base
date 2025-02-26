<?php
/*
*
* 	Class Base Operation Functions API
*	Core Aved Soft
*
*
*/
?>
<?php 

class AVS_data_op_API
{
	public static function set_new_slider($name,$count_slides, $params,$type)
	{
		global $wpdb;
		if(!isset($name)){return false;}
		if(!isset($params)){return false;}
		if(!isset($type)){return false;}
		$params = AVS_base_operation::encode_array($params);
		$wpdb->insert($wpdb->prefix.'avs_sliders_data_S',array( "params" => $params, "count_slides" => $count_slides, "type" => $type, "name" => $name ));
	}
	public static function delete_slider_by_id($id)
	{
		if(!isset($id)){return false;}
		global $wpdb;
		$wpdb->delete($wpdb->prefix.'avs_sliders_data_S', array("ID" => $id) );
	}

	public static function get_slider_by_id($id)
	{
		if(!isset($id)){return false;}
		global $wpdb;
		$slider = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix.'avs_sliders_data_S'." WHERE ID = ".$id);
		$slider->params = AVS_base_operation::decode_array($slider->params);
		return $slider;
	}
	public static function get_count_sliders()
	{
		global $wpdb;
		$count = $wpdb->query('SELECT * FROM  '.$wpdb->prefix.'avs_sliders_data_S'.'');
		return $count;
	}
	public static function get_sliders(){
		global $wpdb;
		$sliders = $wpdb->get_results('SELECT * FROM  '.$wpdb->prefix.'avs_sliders_data_S'.'');
		return $sliders;
	}

	public static function update_slider_by_id($id,$name,$count_slides,$params,$type)
	{
		if(!isset($id) || !isset($name) || !isset($count_slides) || !isset($params) || !isset($type) ){return false;}
		global $wpdb;
		$params = AVS_base_operation::encode_array($params);
		$wpdb->update($wpdb->prefix.'avs_sliders_data_S',
			array( "params" => $params, "count_slides" => $count_slides, "type" => $type, "name" => $name ),
			array( 'ID' => $id )
		);
	}

	public static function create_slider_params($options)
	{
		require_once(AVS_SLIDER_DIR.'includes/class-creator-params.php');
		$params = array();
		// Set Type slider
		switch ($options['slider_type']) {
			case '1':	$params['type'] = 'product_id';				$params = AVS_creator_params::creator_by_product_id($options,$params);				break;
			
			case '2': 	$params['type'] = 'product_category'; 		$params = AVS_creator_params::creator_by_product_category($options,$params);		break;
			
			case '3':	$params['type'] = 'prodyct_page_category';	$params = AVS_creator_params::creator_by_product_page_category($options,$params);	break;

			case '4':	$params['type'] = 'prodyct_views';			$params = AVS_creator_params::creator_by_product_viewed($options,$params);			break;
			
			default:	return false;								break;
		}
		// End setting type slider



		return $params;
	}
}

?>