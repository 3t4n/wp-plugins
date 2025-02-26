<?php


/**
 * AddRibbonShortcode class.
 */
class AddRibbonShortcode {

	/**
	 *
	 *  Include classes essential for the plugin
	 *
	 * @return void
	 */
	public function __construct() {
		add_shortcode( 'ribbon', array($this,'add_ribbon_func' ));
	}

	function add_ribbon_func( $atts, $content = ''){
	
		$shortcode_att = shortcode_atts( array(
			'id' => '',
			'label' => 'Label',
			'position' => 'left', /*left, right*/
			'color' => '#FFF',
			'bgcolor' => '#000',
			'width'=>'200',
			'height'=>'200',
			'padding'=>'10',
			'wider'=>false
		), $atts );
		/**Attributes**/	
		$id = $shortcode_att['id']; 
		$label = $shortcode_att['label']; 
		$position = $shortcode_att['position']; 
		$color = $shortcode_att['color']; 
		$bgcolor = $shortcode_att['bgcolor']; 
		$width = $shortcode_att['width']; 
		$height = $shortcode_att['height']; 
		$padding = $shortcode_att['padding']; 
		$wider = $shortcode_att['wider']; 
		
		if($id!=''){
			$id='id="'.$id.'" ';
		}
		
		if($wider){
			$wider='wider';
			$label=substr($label, 0, 25);
		}else{
			$wider='';
			$label=substr($label, 0, 12);
		}
		
		$style_width='width:'.$width.'px !important;';
		$style_height='height:'.$height.'px !important;';
		$style_padding='padding:'.$padding.'px !important;';
		$style_color='color:'.$color.' !important;';
		$style_bgcolor='background:'.$bgcolor.' !important';
		
		return '<div style="clear:both"></div><div '.$id.' class="sherkribbon '.$wider.'" style="'.$style_width.$style_height.$style_padding.'"><div class="ribbonlabel '.$position.'ribbon"><span  style="'.$style_color.$style_bgcolor.'">'.$label.'</span></div>'.$content.'</div><div style="clear:both"></div>';
		
	}

}



new AddRibbonShortcode();
