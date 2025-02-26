<?php
global $title;

$output .= '<h1>' . $title . '</h1>';

if(!empty($_POST)){
	$output .= '<div class="updated below-h2" id="message">';
		$output .= '<p>' . __('Changes made successfully!', 'kwm_force_download') . '</p>';
	$output .= '</div>';
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$options[$key] = $value;
		}
	};
	update_option('kwm_force_download', $options);
}
$options = get_option('kwm_force_download');

$output .= '<form action="' . $_SERVER['REQUEST_URI'] . '" method="post" enctype="multipart/form-data">';

	$output .= '<div class="form-container">';	
		$output .= '<label for="urlDownload" style="margin-right:10px;">' . __('Choose the url download:', 'kwm_force_download') . '</label>';	
		$output .= '<input type="text" name="urlDownload" id="urlDownload" class="regular-text" maxlength="16" value="' . $options['urlDownload'] . '" />';
	$output .= '</div>';

	$output .= get_submit_button();

$output .= '</form>';
echo $output;

?>