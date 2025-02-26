<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wms_settings { function __construct() {		

echo 
'<div class="atec-page">';
	atec_header(__DIR__,'wms','web-map-service');	

	echo 
	'<div class="atec-main">';
		atec_progress();
		
		$url			= atec_get_url();		
		$nonce 	= wp_create_nonce(atec_nonce());
		$nav			= atec_clean_request('nav');
		if ($nav==='') $nav='Dashboard';

		atec_nav_tab_dashboard($url, $nonce, $nav, __DIR__);
		echo
		'<div class="atec-g atec-border">';
			atec_flush();
		
			if ($nav=='Info') { @require('atec-info.php'); new ATEC_info(__DIR__,$url,$nonce); }
			else
			{
				atec_little_block(__('Configure your map','atec-web-map-service'));
				atec_reg_inline_style('', '.form-table th, .form-table td { padding: 5px; } #gallery IMG { max-height:90px; margin:10px; }');		
				echo ' 				
					<div id="gallery" class="atec-border-white atec-center">
      					<h4>', esc_attr__('To include the configured map on a page, please use this shortcode','atec-web-map-service'), ': <input style="color: #2271b1; border:none; background: transparent;" value="[atec_wms_shortcode]" title="3x click to select-all"></h4>
      					<hr>
						<p>', esc_attr__('To set locations you can either get an','atec-web-map-service'), ' <a href="https://atecmap.com/docs_en.php" target="_blank">', esc_attr__('API-Key','atec-web-map-service'), '</a> ', esc_attr__('or select a location in the map','atec-web-map-service'), '.<br>', esc_attr__('With an API-key you can define multiple colored markers and even draw a marker polygon; plus you can use our marker editor','atec-web-map-service'), '.
						</p>';
						// @codingStandardsIgnoreStart
						// Image is not an attachement
						echo '
      					<img alt="atecmap_marker" src="',esc_url( plugins_url( '/assets/img/atecmap_marker.webp', __DIR__ ) ) ,'">
      					<img alt="atecmap_polygon" src="',esc_url( plugins_url( '/assets/img/atecmap_polygon.webp', __DIR__ ) ) ,'">
      					<img alt="atecmap_editor" src="',esc_url( plugins_url( '/assets/img/atecmap_editor.webp', __DIR__ ) ) ,'">';
						// @codingStandardsIgnoreEnd
					echo '
  					</div>
				
  					<div class="atec-g atec-g-50">
    					<div class="atec-border-white">
        					<form class="atec-form" method="post" action="options.php">';
        					$atec_WMS='atec_WMS'; 
        					settings_fields($atec_WMS); 
        					do_settings_sections($atec_WMS); 
        					submit_button(__('Save','atec-web-map-service'));
        					$options=get_option('atec_WMS_settings',[]);
							$lang=explode('_',get_locale())[0];
							if (!in_array($lang,['de','en'])) $lang='en';
						echo '
        					</form>
    					</div>
						<div class="atec-border-white">
							<div>
								<iframe class="atec-db" style="margin-top: 0.5em; width: 100%; height: 480px;" id="iframe" allow="geolocation" ',
								'src="https://atecmap.com/?awms=true&lat=', esc_attr($options['lat']??''),
								'&lon=', esc_attr($options['lng']??''), filter_var($options['mono']??0,258)?'&mono=true':'', '&lang=', esc_attr($lang), ($options['key']??''?'&apikey='.esc_attr($options['key']??''):''), '">',
								'</iframe>
							</div>
							', esc_attr__('Click on the map and select your location','atec-web-map-service'), '.
    					</div>
    				<div>
					
				</div>';
				
				atec_reg_inline_script('wms', '
			  	window.addEventListener("message", receiveMessage, false);
			  	function receiveMessage(event) { jQuery("#ai_lat").val(event.data.lat); jQuery("#ai_lng").val(event.data.lng); }', true);  
			}
		
	echo '
		</div>
	</div>
</div>'; 

@require('atec-footer.php');

}}

new ATEC_wms_settings();
?>