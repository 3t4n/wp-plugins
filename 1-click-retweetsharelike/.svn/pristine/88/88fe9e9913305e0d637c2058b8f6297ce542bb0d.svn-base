<?php
	$version = ($current_opt_array['show_count'] == 'true') ? 2 : 1;
	$html = "";
	$html .= "<div data-direction='".$current_opt_array['position']."' data-url='".get_permalink()."' data-title='".get_the_title()."' class='linksalpha_container linksalpha_app_".$version."'>";
	foreach ($current_opt_array['networks'] as $index => $network) {
	    $html .= "<a href='//www.linksalpha.com/share?network='".$network."' class='linksalpha_icon_".$network."'></a>";
	}
	$html .= "</div>";
	return $html;
?>