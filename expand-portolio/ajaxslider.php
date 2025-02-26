<?php
require_once('../../../wp-load.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$spid = $_REQUEST["spid"]; global $exp;
	$args = array('post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $spid);
	$attachments = get_posts($args);
	if (has_post_thumbnail($spid)) {$stid = get_post_thumbnail_id($spid);} else {$stid = 0;}
	$data = get_post_meta($spid, 'exp_metadata', true);
	$html = '';
	if ($attachments) {
		$hasslide = false;
		foreach ($attachments as $attachment) {
			if (wp_attachment_is_image($attachment->ID) && $attachment->ID != $data['media']['picid'] && $attachment->ID != $stid) {
				$image = wp_get_attachment_image_src($attachment->ID,'ep-slide');
				$html .= '<img src="'.$image[0].'" width="'.$exp['slide']['width'].'" height="'.$exp['slide']['height'].'"
				 title="'.$attachment->post_content.'">'."\n";
				$hasslide = true;
			}
		}
		if ($hasslide) {
		echo '<div id="slideClose" class="'.$spid.'"></div>'."\n";
		echo $html;
		echo "<script>
		jQuery(function(){jQuery(function(){jQuery('#slider').powerSlide({width: ".$exp['slide']['width'].", height: ".$exp['slide']['height']."});});});</script>";
		if ($data['media']['mp3']) {getSound($data);}
		}
	}
}

?>