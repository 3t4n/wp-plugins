<?php
/**
* 
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Car_Entity
{
	public $id;
	public $title;
	public $description;
	public $mileage;
	public $main_image;
	public $retail_price;
	public $asking_price;
	public $body_style;
	public $model_year;
	public $make;
	public $model;
	public $exterior_color;
	public $engine_type;
	public $transmission;
	public $location;
	public $permalink;

	public function getFormattedAskingPrice()
	{
		if (((int)$this->asking_price)>0){
			return get_option('currency_symbol').number_format((int)$this->asking_price, 2, get_option('decimal-separater'), get_option('thousands_separater'));
		}else{
			return false;
		}
		
	}

	public function getFormattedRetailPrice()
	{
		if (((int)$this->retail_price)>0){
			return get_option('currency_symbol').number_format((int)$this->retail_price, 2, get_option('decimal-separater'), get_option('thousands_separater'));
		}else{
			return false;
		}
	}


	public function getFormattedMileage()
	{
		if (((int)$this->mileage)>0){
			return number_format($this->mileage, 2, get_option('decimal-separater'), get_option('thousands_separater')).get_option('distance_unit');
		}else{
			return false;
		}
	}



}