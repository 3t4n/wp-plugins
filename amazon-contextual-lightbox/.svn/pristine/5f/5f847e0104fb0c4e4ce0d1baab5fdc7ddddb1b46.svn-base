<?php
/*
   Plugin Name: Amazon Contextual Widget Lightbox 
   Plugin URI: http://arevico.com/kb-amazon-contextual-lightbox/
   Description:  Amazon Contextual Widget Lightbox 
   Version: 1.1
   Author: Arevico
   Author URI: http://arevico.com/kb-amazon-contextual-lightbox/
   Copyright: 2011, Arevico
*/
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR . 'options.php');
$arv_amz_lb_mp=new arv_amz_lb_mp();

class arv_amz_lb_mp{
	private $arv_amz_lb_options;
	private $testendured=false;
	function arv_amz_lb_mp()
	{
		$this->__construct();
	}
	/** Constructor, add all hooks and stuff here!*/
	function __construct()
	{
	$this->arv_amz_lb_options=new arv_amazon_lb_options();
		add_filter('the_content', array(&$this,'launch_script'));
		add_action('wp_enqueue_scripts', array(&$this,'append_scripts'));
	}

	function launch_script($content){
		$lr = "<!-- An Arevico Plugin -->";
		$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
		$options=$this->arv_amz_lb_options->pl_get_options();
		
		if(	$this->testendured && (!stristr($content,$options['exc']))){
			$lr .= $this->js_localize('amz_lb_ret',$options);
			/*================================================*/
			$lr.='<a id="inline" href="#data" style="display: none;">Show</a>';
			$lr.='<div style="display:none"><div id="data" style="">';
	
	$lr.="<div style='min-width:" . $options['width'] ."px;';><script type='text/javascript'>
var amzn_wdgt={widget:'Search'};
amzn_wdgt.tag='" . $options['amazontag'] . "';
amzn_wdgt.columns='" . $options['colums'] . "';
amzn_wdgt.rows='" . $options['rows'] . "';
amzn_wdgt.defaultSearchTerm='" . htmlentities($options['standardsearch']) . "';
amzn_wdgt.searchIndex='All';
amzn_wdgt.width='" . $options['width'] . "';	
amzn_wdgt.showImage='True';
amzn_wdgt.showPrice='True';
amzn_wdgt.showRating='True';
amzn_wdgt.design='". $options['deswidget'] ."';
amzn_wdgt.colorTheme='Default';
amzn_wdgt.headerTextColor='#FFFFFF';
amzn_wdgt.outerBackgroundColor='#000000';
amzn_wdgt.marketPlace='US';
</script>
<script src='http://wms.assoc-amazon.com/20070822/US/js/AmazonWidgets.js'></script>
</div>";
			
			$lr .= '</div></div>';
			$lr .= $this->genScript(array('scs/launch.js'));
		}

		/* Remove shorttags*/
		$content = str_ireplace($option['exc'],"",$content);
		return $content .$lr;
		}


	function append_scripts() {
		$options=$this->arv_amz_lb_options->pl_get_options();

		if (($options['display_on_page']==1 && is_page()) || ($options['display_on_post']==1 && is_single() ) || ($options['display_on_home']==1 && is_home() ) ){
			$this->testendured=true;
			$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
			wp_enqueue_script( 'jquery' );

			if ($options['fancybox']<=0){
				wp_register_style( 'scs_style', $x . "scs/scs.css");
				wp_enqueue_style('scs_style');
				wp_register_script( 'scs', $x . "scs/scs.js");
				wp_enqueue_script('scs');
			}

		}
	}

	/**
*	Generate Script code ()
* 	@param $arr_rel_src array, with relative script source to the plugin directory, no leading slash
* */
	function genScript($arr_rel_src){
	$lret="";
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

	foreach ($arr_rel_src as $src){
		if (substr($src,0,2)=="//") {
		$lret .= '<script src="'. $src .'" type="text/javascript"></script>';
		} else {
		$lret .= '<script src="'.$x . $src .'" type="text/javascript"></script>';
		}
	}
	return $lret;
}
/**
 *	Generate style code ()
 * 	@param $arr_rel_src array, with relative script source to the plugin directory, no leading slash
 * */

function genStyle($arr_rel_src){
	$lret="";
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

	foreach ($arr_rel_src as $src){
		$lret .= '<link rel="stylesheet" type="text/css" href="'. $x . $src .'"></link>';
	}
	return $lret;
}

/**
 *Custom function to  js inline
 */

function js_localize($name, $vars) {
$lret="";
$data = "var $name = {";
$arr = array();
foreach ($vars as $key => $value) {
	$arr[count($arr)] = $key . " : '" . esc_js($value) . "'";
}
$data .= implode(",",$arr);
$data .= "};";
$lret .= "<script type='text/javascript'>\n";
//	$lret .= "/* <![CDATA[ */\n";
$lret .= $data;
//	$lret .= "\n/* ]]> */\n";
$lret .= "</script>\n";
return 	print_r($lret,true);
}}
?>