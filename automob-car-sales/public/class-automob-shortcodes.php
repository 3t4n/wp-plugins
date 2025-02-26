<?php
/**
* 
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Shortcode
{
	public function car_search_func( $atts ) 
	{		 
		 ob_start(); 
		 	$pageID = get_option('search_results_page');
			$page = get_post($pageID);
			$permalink = get_permalink($page->ID);

			$vehicle =  new Automob_Car_Table();
			// $max_min_price = $vehicle->getMinMaxValues('_am_asking_price');
			// $max_min_mileage = $vehicle->getMinMaxValues('_am_mileage');

			$make  = isset($_GET['make']) ? $_GET['make'] : 'Any';
			$model  = isset($_GET['model']) ? $_GET['model'] : 'Any';
			$model_year  = isset($_GET['model_year']) ? $_GET['model_year'] : 1900;
			$condition  = isset($_GET['condition']) ? $_GET['condition'] : 'Any';
			$asking_price = isset($_GET['asking_price']) ? $_GET['asking_price'] : $vehicle->getMinMaxValues('_am_asking_price')['max'];
			$mileage = isset($_GET['mileage']) ? $_GET['mileage'] : $vehicle->getMinMaxValues('_am_mileage')['max'];
			
			// $condition = 
			$args =	array( 'vehicle' => $vehicle,
					   'permalink' => $permalink, 
					   'defaults' => array('make' => $make,'model_year' => $model_year,'condition' => $condition,'model' => $model,'asking_price' => $asking_price,'mileage'=> $mileage )
					   );
			$template_loader  = new AutomobTemplateManager(); 
			$template_loader->get_template_part( 'shortcode','search-form',array( 'args' => $args ));
			$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}

	public function car_inventory_func( $atts ) 
	{

 		$car_posts = new Automob_Car_Table();
		$cars =  $car_posts->getPaginatedPosts(); 
	
		ob_start(); 
			$template_loader  = new AutomobTemplateManager(); 
			$template_loader->get_template_part( 'shortcode','inventory',array('cars' => $cars,'car_posts'=>$car_posts));
			$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}

	// public function car_single_func( $atts ) 
	// {
	// 	ob_start(); 
	// 		$template_loader  = new AutomobTemplateManager(); 
	// 		$template_loader->get_template_part( 'content','single-vehicle');
	// 		$contents = ob_get_contents();
	// 	ob_end_clean();
	// 	return $contents;
	// }



}



// add_shortcode( 'car-form-preview','car_search_func' );
