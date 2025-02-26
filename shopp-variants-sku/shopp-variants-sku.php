<?php
/*
Plugin name: Shopp Variation SKU
Plugin URI: http://www.crazyxhtml.com
Description: This Shopp extension show correct sku for selected variant
Version: 1.0.4
Author: CrazyXhtml
Author URI: http://www.crazyxhtml.com
*/

class am_Shopp_variants_sku {    
    function __construct() {
        add_action('init', array(&$this, 'init_js'));		
    }

    function init_js() {
        if (!is_admin()) {            
            wp_register_script( 'am_shopp_variants_sku',
                plugins_url('/shopp_ext.js', __FILE__),
                array('jquery'),
                1.0,
                true);
            wp_enqueue_script('am_shopp_variants_sku');
        }
    }

    static function make_option_key($key) {
    	$key_new = $key;
    	$key_ar = explode(',',$key);
    	if(is_array($key_ar) && count($key_ar>0)){
    		sort($key_ar);
    		$key_new = implode(',', $key_ar);
    	}
    	
    	return $key_new;
    }
	
	static function show_variants_sku($productId=null){
		$html = '';
		if(function_exists('shopp') && function_exists('shopp_product_variants')){
			if ( shopp('product','has-variations') ) {						
				if(!$productId)
					$productId = shopp('product', get.id);
					
				if(!$productId)
					return false;
					
				$variants = shopp_product_variants($productId);
				$varArray = array();
				foreach($variants as $variant){						
					$varArray[self::make_option_key($variant->options)] = array('sku'=>$variant->sku);
				}
	$html .= '<script type="text/javascript">';
	$html .= 'var var_data = '.json_encode($varArray).';';		
	$html .= '</script>';
				while ( shopp('product','variations') ) {
	$html .= '<script type="text/javascript">';
	$html .= 'var def_sku = \''.shopp('product','variation','sku=on&echo=0').'\';';
	$html .= '</script>';
				$html .= '<span id="am-sku">'.shopp('product','variation','sku=on&echo=0').'</span>'; break;
				}
			}
		}
		return $html;
	}
}

$am_Shopp_variants_sku = new am_Shopp_variants_sku();

function am_shopp_variants_sku($echo = true){
	$html = '';
	if ( shopp('product','has-variations') ) {
		if(class_exists('am_Shopp_variants_sku'))
			$html = '<div class="sku">'.am_Shopp_variants_sku::show_variants_sku(shopp('product', get.id)).'</div>';
	} else {
	    $sku = shopp('product', 'sku','echo=false');
	    if(!empty($sku)) 
	    	$html = '<div class="sku"><span>'.$sku.'</span></div>';
	}
	if($echo)
		echo $html;
	else
		return $html;
}
?>