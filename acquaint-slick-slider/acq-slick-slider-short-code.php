<?php


class Acq_Slick_Slider_Shortcode_class {

	public function __construct() {
		add_shortcode( 'AQSS', array( $this,'Acq_slick_slider_shortcode' ));
	}
	function Acq_slick_slider_shortcode( $Id ) {

	    ob_start();

		/**
	     * Load Saved Responsive Image Slider Settings
	     */
	    if(!isset($Id['id'])) {
	        $Id['id'] = "";	
	    } else {
			$AQSS_Id = $Id['id'];		
			$AQSS_Gallery_Settings_Key = "AQSS_Gallery_Settings_".$AQSS_Id;
			$AQSS_Gallery_Settings = unserialize(get_post_meta( $AQSS_Id, $AQSS_Gallery_Settings_Key, true));

			if(isset($AQSS_Gallery_Settings['AQSS_L3_Slider_Type']))
				$AQSS_L3_Slider_Type   	= $AQSS_Gallery_Settings['AQSS_L3_Slider_Type'];
			else
				$AQSS_L3_Slider_Type   	= 1;

			if(isset($AQSS_Gallery_Settings['AQSS_L3_Slide_Title'])) 
				$AQSS_L3_Slide_Title   		    = $AQSS_Gallery_Settings['AQSS_L3_Slide_Title'];
			else
				$AQSS_L3_Slide_Title			= 1;

			if(isset($AQSS_Gallery_Settings['AQSS_L3_Auto_Slideshow'])) 
				$AQSS_L3_Auto_Slideshow			= $AQSS_Gallery_Settings['AQSS_L3_Auto_Slideshow'];
			else
				$AQSS_L3_Auto_Slideshow			= 1;
			
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Infinite_Scroll'])) 
				$AQSS_L3_Infinite_Scroll			= $AQSS_Gallery_Settings['AQSS_L3_Infinite_Scroll'];
			else
				$AQSS_L3_Infinite_Scroll			= 0;

			
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Transition_Speed']))
				$AQSS_L3_Transition_Speed   	= $AQSS_Gallery_Settings['AQSS_L3_Transition_Speed'];
			else
				$AQSS_L3_Transition_Speed   	= 5000;
			
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Slide_To_Show']))
				$AQSS_L3_Slide_To_Show   	= $AQSS_Gallery_Settings['AQSS_L3_Slide_To_Show'];
			else
				$AQSS_L3_Slide_To_Show   	= 1;

			if(isset($AQSS_Gallery_Settings['AQSS_L3_Slide_To_Scroll']))
				$AQSS_L3_Slide_To_Scroll   	= $AQSS_Gallery_Settings['AQSS_L3_Slide_To_Scroll'];
			else
				$AQSS_L3_Slide_To_Scroll   	= 1;	
				
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Navigation_Button']))
				$AQSS_L3_Navigation_Button   	= $AQSS_Gallery_Settings['AQSS_L3_Navigation_Button'];
			else
				$AQSS_L3_Navigation_Button   	= 1;
				
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Font_Style']))
				$AQSS_L3_Font_Style          	= $AQSS_Gallery_Settings['AQSS_L3_Font_Style'];
			else
				$AQSS_L3_Font_Style          	= "Arial";
			
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Title_Color']))
				$AQSS_L3_Title_Color   			= $AQSS_Gallery_Settings['AQSS_L3_Title_Color'];
			else
				$AQSS_L3_Title_Color   			= "#00000";
			
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Title_BgColor']))
				$AQSS_L3_Title_BgColor   		= $AQSS_Gallery_Settings['AQSS_L3_Title_BgColor'];
			else
				$AQSS_L3_Title_BgColor   		= "#FFFFFF";
			
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Desc_Color']))
				$AQSS_L3_Desc_Color   			= $AQSS_Gallery_Settings['AQSS_L3_Desc_Color'];
			else
				$AQSS_L3_Desc_Color   			= "#FFFFFF";
			
			if(isset($AQSS_Gallery_Settings['AQSS_L3_Desc_BgColor']))
				$AQSS_L3_Desc_BgColor  			= $AQSS_Gallery_Settings['AQSS_L3_Desc_BgColor'];
			else
				$AQSS_L3_Desc_BgColor  			= "#00000";		
		} // end of if 

		/**
		 * Load Slider Layout Output
		 */
		require("aqss-layout.php");
		wp_reset_query();
	    return ob_get_clean();
	}
}

global $acq_slick_slider_obj;
$acq_slick_slider_obj = new Acq_Slick_Slider_Shortcode_class();
?>