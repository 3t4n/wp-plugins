<?PHP

// returns list of required plugins
// thanks to Jonathan Leighton for an idea! see http://jonathanleighton.com/blog/wordpress-plugin-dependencies/
function afc_google_map_reqs() {
	$required_plugins = array();
	$required_plugins[] = array(
		'name'=>'AFC Plug System ver 2.2.7 +', 'uri'=>'http://www.afcomponents.com/ext/wp/afc-plug-system/', 'func'=>'afc_plug_system', 'ver'=>'2.2.7'
	);

	
	$missing_plugins = array();
	foreach ($required_plugins as $plugin){
		if (!function_exists($plugin['func']) && !class_exists($plugin['func'])){
			$missing_plugins[] = $plugin;
		}elseif( $plugin['func']() < $plugin['ver'] ) { // check version
			$missing_plugins[] = $plugin; // plugin exists but version is missing
		}
		
	}
	
	return $missing_plugins;	
}

function afc_google_map_reqs_failed() {
	$missing_plugins = afc_google_map_reqs();
	if(!empty($missing_plugins) && count($missing_plugins)) {
		$this_plug_dir = '/afc-google-map/';
		add_menu_page('AFC Google Map', 'AFC Google Map', 9, $this_plug_dir.'menu_pages/requirements.php');		
	}
}


/*
* Returns stored data associated with afc flv-player plugin
*/
function afc_gmap_get_options( $reset = 0) {
	//values used by default
	$def_opts = array(
		'component_uri'			=> get_bloginfo('url').'/wp-content/plugins/afc-google-map/component.swf',
		'base_uri'					=> get_bloginfo('url').'/wp-content/uploads/',
		'comp_tag'					=> 'gmap',
		'width'							=> 450,
		'height'						=> 320,
		'quicktag'					=> 1,
		'centerCross'				=> 0,
		'centerCrossColor'	=> '0x000000',
		'animatePan'				=> 0,
		'animateZoom'				=> 0,
		'controlByKeyboard'	=> 0,
		'controlByMouse'		=> 1,
		'controlByMouseWheel'=> 0,
		'doubleClickMode'		=> 'none', // other options availble "pan", "zoom"
		'panSpeed'					=> 3,	//range 2..9
		'zoomAtPointer'			=> 0,
		'latitude'					=> 0,
		'longitude'					=> 0,
		'mapType'						=> 'map', // other options: "satellite", "hybrid"
		'zoom'							=> 0,
		'zoomControl'				=> 1,
		'positionControl'		=> 1,
		'typeControl'				=> 1,
		'navigatorControl'	=> 1,
		'kmlPath'		=> '',
		'quicktag_pars' => array('kmlPath', 'width', 'height','latitude','longitude','zoom'),
	);
	

	$options = $reset ? 0 : get_option('afc_gmap_options');

	if (!is_array($options)){
		$options = $def_opts;
		update_option('afc_gmap_options', $options);
	}else {
		// make sure that if option is not present it's filled with default value
		foreach($def_opts as $key=>$val) {
			if(!isset($options[$key])) {
				$options[$key] = $val;
			}
		}

		//manually update quicktag
		$options['quicktag_pars'] = $def_opts['quicktag_pars'];
	}
	
	return $options;
}

/*
* Transform <gmap> meta-tag into actual HTML tags
*/
function afc_gmap_the_content($content) {
	$o = afc_gmap_get_options();
	
	$req_opts = array('height','width', 'centerCrossColor', 'doubleClickMode', 'panSpeed',  'latitude', 'longitude', 'mapType', 'zoom', 'centerCross', 'animatePan', 'animateZoom', 'controlByKeyboard', 'controlByMouse', 'controlByMouseWheel', 'zoomAtPointer', 'zoomControl', 'positionControl', 'typeControl', 'navigatorControl');
	// items below should be considered as booleans and translated as 1->"true" 0->"false" before passed to template
	$req_opts_bools = array('centerCross', 'animatePan', 'animateZoom', 'controlByKeyboard', 'controlByMouse', 'controlByMouseWheel', 'zoomAtPointer', 'zoomControl', 'positionControl', 'typeControl', 'navigatorControl');

	//open template
	$map_orig_code = file_get_contents(dirname(__FILE__).'/menu_pages/map_html.tpl');
		
	$map_orig_code = str_replace('{COMPONENT_URI}',$o['component_uri'],$map_orig_code);
	$map_orig_code = str_replace('{COMPONENT_URI_WO_EXT}',substr($o['component_uri'],0,-4),$map_orig_code);
	
	$quicktag_tag = isset($o['comp_tag']) ? strtolower($o['comp_tag']) : 'gmap';
	preg_match_all ('!<'.$quicktag_tag.'([^>]*)[ ]*>([^/<>]*)</'.$quicktag_tag.'>!i', $content, $_matches); //locate <gmap> tag

	if(isset($_matches[1])) {
		foreach($_matches[1] as $k1=>$flv_tag) {
			preg_match_all('!('.implode('|',$o['quicktag_pars']).')="([^"]*)"!i',$flv_tag,$attribs);	

			// this ID could be used in js (for id) to locate current element
			$item_id = md5 (uniqid (rand()));
			$map_code = str_replace('{ITEM_ID}', $item_id, $map_orig_code);

			//now create an array containing all transmitted via tag vars
			$page_vars = array();
			foreach($attribs[1] as $k2=>$att_name) {
				$page_vars[$att_name] = $attribs[2][$k2];
			}
			
			//now make sure that parameters not present are obtained from defaults
			foreach($req_opts as $opt_name) {
				if(!isset($page_vars[$opt_name])) {
					if(in_array($opt_name, $req_opts_bools)) {
						$page_vars[$opt_name] = $o[$opt_name]? 'true' : 'false';	
					}else {
						$page_vars[$opt_name] = $o[$opt_name];
					}
				}
			}
			
			//do replace
			foreach($page_vars as $att_name=>$att_value) {
				$map_code = str_replace('{'.strtoupper($att_name).'}', $att_value.'', $map_code);
			}
			$content = str_replace($_matches[0][$k1],$map_code,$content);
		}
	}

	return $content;
}

// adds up quicktag button functionality
function afc_gmap_quicktag_button($content) {
	$o = afc_gmap_get_options();
	if($o['quicktag']) {
		require_once(dirname(__FILE__).'/menu_pages/quicktag_button.php');
	}
	return $content;
}

// adds to the list of TinyMCE's valid tags our quicktag
function afc_google_map_mce_valid_elements($valid_elements) {
	$o = afc_gmap_get_options();
	$quicktag_tag = isset($o['comp_tag']) ? strtolower($o['comp_tag']) : 'gmap';
	$valid_elements .= ',+'.$quicktag_tag.'['.implode('|',$o['quicktag_pars']).']';
  return $valid_elements;	
}


?>