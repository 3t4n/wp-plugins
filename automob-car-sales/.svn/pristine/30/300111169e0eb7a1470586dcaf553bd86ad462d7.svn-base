<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Search_Filter
{
	
	public function search_filter_options()
	{
		$carTable = new Automob_Car_Table();
		$cars = $carTable->getAll();
		$output = array('raw_cars' => $cars, 'price_range'=>$this->get_price_range($cars));
		echo json_encode($output);
		die(); //Always die ajax requests
	}

	private function get_price_range($cars)
	{
		$prices = array();
		foreach ($cars as $car) 
		{
			$prices[] = array('value' => $car->asking_price,'text'=>$car->asking_price.get_option('distance_unit'));;			
		}
		return $prices;
	}
}