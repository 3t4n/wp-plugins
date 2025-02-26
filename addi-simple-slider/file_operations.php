<?php 
function return_real_file(){
   $file = stripslashes('addi-simple-slider/css/themes.css');
	
	$plugin_files = get_plugin_files($file);
	$file = validate_file_to_edit($file, $plugin_files);
	$real_file = WP_PLUGIN_DIR . '/' . $file;
	
	return $real_file;
}

function save_slider_style(){
	
	$rf = return_real_file();
	if( isset($_POST['newcontent']) ) {
		$newcontent = stripslashes($_POST['newcontent']);
		if ( is_writeable($rf) ) {
				$f = fopen($rf, 'w+');
				fwrite($f, $newcontent);
				fclose($f);
		}
	}
	
}

?>