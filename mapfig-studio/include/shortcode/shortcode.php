<?php
	if(isset($atts)){
		$id     = $atts['mapid'];
		$height = $atts['height'];
		$width  = $atts['width'];
		
		echo '<iframe src="'.STUDIO_WEBROOT.'/include/shortcode/view.php?id='.$id.'&height='.$height.'&width='.$width.'" height="'.$height.'px" width="'.$width.'px"></iframe>';
	}
?>