<?php 
	function script_KWM_force_download(){
		$options = get_option('kwm_force_download');
		
		$kwmurlDownload = 'downloads';
		if($options['urlDownload'] != ''){
			$kwmurlDownload = $options['urlDownload'];
		}

		echo '<script type="text/javascript">
				jQuery(document).ready(function($){
					$kwmForceDownload = $("body a.kwm-force-donwload");
					$kwmForceDownload.each(function(index){
						var oldHref = $(this).data("forcedownload");
						$(this).prop("href", "'.home_url().'/'.$kwmurlDownload.'/" + oldHref);
					});
				});
			  </script>';
	}
	add_action('wp_footer', 'script_KWM_force_download');
?>