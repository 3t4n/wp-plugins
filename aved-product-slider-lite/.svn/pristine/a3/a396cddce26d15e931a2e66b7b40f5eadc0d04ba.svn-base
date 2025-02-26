<?php 
// Class operations data base sliders
// AVS Core
?>

<?php 

class AVS_slider_db_api
{
	public static function get_list_sliders_arg()
	{
		$obj = AVS_data_op_API::get_sliders();
		if( isset($obj) )
		{
			$incr = 0;
			foreach ($obj as $params) {
				$obj[$incr]->params = AVS_base_operation::decode_array($params->params);
				$incr++;
			}
		}
		else
		{
			$obj = 'error';
		}


		return $obj;
	}

	public static function get_woocommerce_category_list()
	{
		$taxonomy     = 'product_cat';
		  $orderby      = 'name';  
		  $show_count   = 0;      // 1 for yes, 0 for no
		  $pad_counts   = 0;      // 1 for yes, 0 for no
		  $hierarchical = 1;      // 1 for yes, 0 for no  
		  $title        = '';  
		  $empty        = 0;

		  $args = array(
		         'taxonomy'     => $taxonomy,
		         'orderby'      => $orderby,
		         'show_count'   => $show_count,
		         'pad_counts'   => $pad_counts,
		         'hierarchical' => $hierarchical,
		         'title_li'     => $title,
		         'hide_empty'   => $empty
		  );
		 $all_categories = get_categories( $args );
		 return $all_categories;
	}
}

 ?>