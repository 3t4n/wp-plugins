<?php
require_once (dirname ( __FILE__ ) . '/config.php');
function appten_imagerotator_plugin_shortcode($atts) {
	
	global $wpdb;
	if (! $atts ['id'])
		$atts ['id'] = 1;
	
	$config = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "appten_imagerotator WHERE id=%d",$atts ['id']));
	
		
	$siteurl = get_option ( 'siteurl' ); $plug = plugins_url();	
	$width   = ($config->width == '')  ? 680 : $config->width;
	$height  = ($config->height == '') ? 340 : $config->height;
	$src = $plug. "/". basename ( dirname ( __FILE__ ) ) . '/banner.swf';
	
	$flashvars .= '&amp;id='.$config->id;
	$flashvars .= ($config->music == '')           ? '' : '&amp;music='.$config->music;
	$flashvars .= ($config->volumeLevel == '')     ? '' : '&amp;volumeLevel='.$config->volumeLevel;
	$flashvars .= ($config->transition == '')      ? '' : '&amp;transition='.$config->transition;
	$flashvars .= ($config->autoRotate == '')      ? '' : '&amp;autoRotate='.$config->autoRotate;
	$flashvars .= ($config->interval == '')        ? '' : '&amp;interval='.$config->interval;
	$flashvars .= ($config->cornerRad == '')       ? '' : '&amp;cornerRad='.$config->cornerRad;
	$flashvars .= ($config->navMode == '')         ? '' : '&amp;navMode='.$config->navMode;
	$flashvars .= ($config->navType == '')         ? '' : '&amp;navType='.$config->navType;
	$flashvars .= ($config->navBgColor == '')      ? '' : '&amp;navBgColor='.$config->navBgColor;
	$flashvars .= ($config->navIcnColor == '')     ? '' : '&amp;navIcnColor='.$config->navIcnColor;
	$flashvars .= ($config->navCornerRad == '')    ? '' : '&amp;navCornerRad='.$config->navCornerRad;
	$flashvars .= ($config->navMarginRight == '')  ? '' : '&amp;navMarginRight='.$config->navMarginRight;
	$flashvars .= ($config->navMarginBottom == '') ? '' : '&amp;navMarginBottom='.$config->navMarginBottom;
	$flashvars .= ($config->nbrButtons == 1)       ? '' : '&amp;nbrButtons=false';
	$flashvars .= ($config->backButton == 1)       ? '' : '&amp;backButton=false';
	$flashvars .= ($config->volume == 1)           ? '' : '&amp;volume=false';
	$flashvars .= ($config->playPause == 1)        ? '' : '&amp;playPause=false';
	$flashvars .= ($config->fullScreen == 1)       ? '' : '&amp;fullScreen=false';
	$flashvars .= ($config->timerClock == 1)       ? '' : '&amp;timerClock=false';
	$flashvars .= '&amp;xml='.$siteurl.'?rid='.$atts ['id'];
		
		
	$embed = '<object id="banner" name="banner" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'. $width .'" height="'. $height .'">
	  <param name="movie" value="'.$src.'" />
	  <param name="wmode" value="transparent" />
	  <param name="allowfullscreen" value="true" />
	  <param name="allowscriptaccess" value="always" />
	  <param name="flashvars" value="'.$flashvars.'" />
	  <object type="application/x-shockwave-flash" data="'.$src.'" width="'. $width .'" height="'. $height .'">
	    <param name="movie" value="'.$src.'" />
	    <param name="wmode" value="transparent" />
	    <param name="allowfullscreen" value="true" />
	    <param name="allowscriptaccess" value="always" />
	    <param name="flashvars" value="'.$flashvars.'" />
	  </object>
	</object>';
	
	 return $embed;
}
add_shortcode ( 'appten_imagerotator', 'appten_imagerotator_plugin_shortcode' );?>