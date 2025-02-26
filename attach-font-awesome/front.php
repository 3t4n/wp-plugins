<?php
/**
 * add Font-Awesome library in front
 */
function atchfa_front_css_files()
{

	global $atchfa_data;
//    get saved value of options
	$load_type=atchfa_get_load_type_option();
	$file = '';
//	set utl of library to load
	switch ($load_type) {
		case 'cdn':
//			get cdn versions
			$versions = $atchfa_data['cdn_versions'];
//			get default version
			$default_version = $atchfa_data['default_version'];
//			get url of selected version
			$selected_version = atchfa_get_cdn_version_option();
//			load selected cdn version if defined, other else load default version
			$file = $selected_version ? $selected_version : $versions[$default_version] ;
			break;
		case 'local':
		default:

		$file = plugins_url('css/font-awesome.min.css',__FILE__);
			break;
	}
	if($file)
		wp_enqueue_style( 'attach-font-awesome-library', $file, false ); // includes CSS file
}
?>