<?php
	$html = "";
	$html .= "<div data-url='".get_permalink()."' data-title='".get_the_title()."' class='linksalpha_container linksalpha_app_4'>";
	foreach ($current_opt_array['networks'] as $index => $network) {
	    $html .= "<a href='//www.linksalpha.com/share?network='".$network."' class='linksalpha_icon_".$network."'></a>";
	}
	$html .= "</div>";
	return $html;
?>