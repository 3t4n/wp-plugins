<?php

if(!empty($_POST)){
	$output .= '<div class="updated below-h2" id="message">';
		$output .= '<p>' . __('Changes made successfully!', 'thmbasic_info_basic') . '</p>';
	$output .= '</div>';
	echo $output;
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$options[$key] = $value;
		}
	};
	update_option('kwm_info_basic', $options);
}
$kwm_info_options = get_option('kwm_info_basic');
include KWM_PLUGIN_DIR.'/admin/view/kwm-info-basic.php';
?>