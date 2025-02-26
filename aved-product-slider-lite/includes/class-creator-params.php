<?php
// Creator params for slider
// AVS core.
?>

<?php
class AVS_creator_params
{
	public static function creator_by_product_id($options,$params)
	{
		if(!isset($options) || !isset($params)){return false;}
		$params['name'] = $options['name'];
		$params['type'] = $options['slider_type'];
		if(isset($options['slides']))
		{
			$params['count_slides'] =  count($options['slides']);
			foreach ($options['slides'] as $slide => $slide_id) {
				$params['params']['slides'][$slide] = $slide_id;
			}
		}
		else
		{
			$params['count_slides'] = 0;
		}
		$params['params']['visible'] = $options['count_visible'];
		// Main config
		$params['params']['slidesToScroll'] = $options['slidesToScroll'];
		$params['params']['autoplaySpeed'] 	= $options['autoplaySpeed'];
		$params['params']['pauseOnScrool'] 	= $options['pauseOnScrool'];
		$params['params']['arrowVisible'] 	= $options['arrowVisible'];
		$params['params']['autoplay'] 		= $options['autoplay'];
		$params['params']['druggable']		= $options['druggable'];
		// End main config
		return $params;
	}
	public static function creator_by_product_viewed($options,$params)
	{
		if(!isset($options) || !isset($params)){return false;}
		$params['name'] = $options['name'];
		$params['type'] = $options['slider_type'];
		$params['count_slides'] = $options['count_slides'];
		$params['params']['visible'] = $options['count_visible'];
				// Main config
		$params['params']['slidesToScroll'] = $options['slidesToScroll'];
		$params['params']['autoplaySpeed'] 	= $options['autoplaySpeed'];
		$params['params']['pauseOnScrool'] 	= $options['pauseOnScrool'];
		$params['params']['arrowVisible'] 	= $options['arrowVisible'];
		$params['params']['autoplay'] 		= $options['autoplay'];
		$params['params']['druggable']		= $options['druggable'];
		// End main config
		return $params;
	}
	public static function creator_by_product_category($options,$params)
	{
		if(!isset($options) || !isset($params)){return false;}
		$params['name'] = $options['name'];
		$params['type'] = $options['slider_type'];
		$params['count_slides'] = $options['count_slides'];
		$params['params']['visible'] = $options['count_visible'];
		$params['params']['category'] = $options['category_product'];
				// Main config
		$params['params']['slidesToScroll'] = $options['slidesToScroll'];
		$params['params']['autoplaySpeed'] 	= $options['autoplaySpeed'];
		$params['params']['pauseOnScrool'] 	= $options['pauseOnScrool'];
		$params['params']['arrowVisible'] 	= $options['arrowVisible'];
		$params['params']['autoplay'] 		= $options['autoplay'];
		$params['params']['druggable']		= $options['druggable'];
		// End main config
		return $params;
	}
	public static function creator_by_product_page_category($options,$params)
	{
		if(!isset($options) || !isset($params)){return false;}
		$params['name'] = $options['name'];
		$params['type'] = $options['slider_type'];
		$params['count_slides'] = $options['count_slides'];
		$params['params']['visible'] = $options['count_visible'];
				// Main config
		$params['params']['slidesToScroll'] = $options['slidesToScroll'];
		$params['params']['autoplaySpeed'] 	= $options['autoplaySpeed'];
		$params['params']['pauseOnScrool'] 	= $options['pauseOnScrool'];
		$params['params']['arrowVisible'] 	= $options['arrowVisible'];
		$params['params']['autoplay'] 		= $options['autoplay'];
		$params['params']['druggable']		= $options['druggable'];
		// End main config
		return $params;
	}
}
?>