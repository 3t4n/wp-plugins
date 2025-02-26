<?php
/*
Plugin Name: Geotag
Plugin URI: http://www.bobsp.de/weblog/geotag/
Description: Provides geocoding features for Wordpress.
Version: 2.0
Author: Boris Pulyer
Author URI: http://www.bobsp.de
Minimum WordPress Version Required: 3.0.0
Tested up to: 3.1.1
*/


/* ==================================================================== */
/* = Hooks, Filters, Globals etc.                                     = */
/* ==================================================================== */

global $geotag_maps, $geotag_options;
$geotag_options = get_option('geotag_options');

Geotag::updatePlugin();
register_activation_hook(__FILE__, array('Geotag', 'registerPlugin'));
add_action('admin_menu', array('Geotag', 'hookAdminMenu'));
add_action('save_post', array('Geotag', 'hookSavePost'));
if ($geotag_options['kml_upload']) {
	add_filter('media_upload_tabs', array('Geotag', 'filterUploadTabs'));
	add_filter('media_upload_geotag', array('Geotag', 'hookUploadTab'));
};
add_action('wp_head', array('Geotag', 'hookWPHeader'));
add_action('wp_footer', array('Geotag', 'hookWPFooter'));
add_filter('the_content', array('Geotag', 'filterTheContent'));
add_shortcode('gmap', array('Geotag', 'parseShortcode'));
if ($geotag_options['wpgeo_compatibility']['shortcode']) {
	add_shortcode('wp_geo_map', array('Geotag', 'parseShortcode'));
};
if ($geotag_options['geotag']['feeds']) {
	add_action('rss2_ns', array('Geotag', 'hookFeedNamespace'));
	add_action('atom_ns', array('Geotag', 'hookFeedNamespace'));
	add_action('rdf_ns', array('Geotag', 'hookFeedNamespace'));
	add_action('rss_item', array('Geotag', 'hookFeedItem'));
	add_action('rss2_item', array('Geotag', 'hookFeedItem'));
	add_action('atom_entry', array('Geotag', 'hookFeedItem'));
	add_action('rdf_item', array('Geotag', 'hookFeedItem'));
}


/* ==================================================================== */
/* = Class Geotag                                                     = */
/* ==================================================================== */

class Geotag {
	
	static $default_options = array(
		/**
		 * General Options
		 */
		'show_map' => array(
			'home' => false,
			'single' => true,
			'page' => true,
			'archive' => false,
			'date' => false,
			'category' => false
		), 
		'auto_map' => array(
			'enable' => false, 
			'position' => 'bottom'
		),
		'geotag' => array(
			'feeds' => true,
			'posts' => true
		),
		/**
		 * Map Appearance
		 */
		// Basic Settings
		'width' => '100%',
		'height' => '300px',
		'center' => array(
			'lat' => 33,
			'lon' => -28,
			'on_markers' => true,
			'on_photos' => true,
			'on_kmlfiles' => true
		),
		'zoom' =>  array(
			'level' => 5,
			'autozoom' => true
		),
		'maptype' => 'hybrid',
		'staticmap' => false,
		// Map Controls
		'maptypecontrol' => array(
			'enable' => true,
			'roadmap' => true,
			'satellite' => true,
			'hybrid' => true,
			'terrain' => true,
			'style' => 'default'
		),
		'navigationcontrol' => array(
			'enable' => true,
			'style' => 'default'
		),
		'streetviewcontrol' => array(
			'enable' => true
		),
		'scalecontrol' => array(
			'enable' => false
		),
		/**
		 * Markers and Overlays
		 */
		// Basic Setting
		'merge_markers' => array(
			'enable' => true,
			'distance' => 2,
			'title' => 'Multiple elements'
		),
		'markermanager' => array(
			'enable' => true,
			'amount' => 50,
			'zoomlevel' => array(0,6,8,10,13),
			'distance' => array(200,70,50,10,0)
		),
		'readexiftag' => true,
		//Appearance
		'overlays_markers' => array(
			'style' => 'default',
			'icon_uri' => null,
			'zindex' => 'posts'
		),
		'overlays_photos' => array(
			'style' => 'thumbnail',
			'icon_uri' => 'http://maps.google.com/mapfiles/kml/pal4/icon46.png',
			'infowindow' => array(
				'resize' => true,
				'width' => 200,
				'height' => 200,
				'cropping_mode' => 3,
				'cropping_align' => 'c',
				'border' => 0,
				'border_color' => '',
				'sharpen' => true
			),
			'thumbnail' => array(
				'width' => 40,
				'height' => 40,
				'cropping_mode' => 1,
				'cropping_align' => 'c',
				'border' => 1,
				'border_color' => '255,255,255',
				'sharpen' => false
			)
		),
		/**
		 * Miscellaneous
		 */
		'kml_upload' => true,
		'wpgeo_compatibility' => array(
			'database' => 'read',
			'shortcode' => false
		),
		//Very Technical Stuff
		'init_on_pageload' => true,
		'debugging' => false
	);
	static $system = array(
		'version' => '2.0'
	);
	static $tmp = array();
	
	
	/* ==================================================================== */
	/* = Register the plugin                                              = */
	/* ==================================================================== */
	
	function registerPlugin() {
		/**
		 * Geotag::registerPlugin()
		 * v2.0
		 *
		 * Saves the default options.
		 */
		add_option('geotag_options', Geotag::$default_options);
	}
	
	function updatePlugin($force_reset=false) {
		/**
		 * Geotag::updatePlugin()
		 * v2.0
		 *
		 * Checks if the plugin has been updated.
		 */
		$geotag_system = get_option('geotag_system');
		if (($geotag_system['version'] != Geotag::$system['version'])
			|| $force_reset) {
			delete_option('geotag_options');
			delete_option('geotag_system');
			add_option('geotag_options', Geotag::$default_options);
			add_option('geotag_system', Geotag::$system);
		}
	}
	
	
	/* ==================================================================== */
	/* = Administration                                                   = */
	/* ==================================================================== */
	
	/**
	 * Hooks
	 */
	
	function hookAdminMenu() {
		/**
		 * Geotag::hookAdminMenu()
		 * v2.0
		 *
		 * Creates the meta boxes, adds an item to the options menu and registers the options
		 */
		add_meta_box('geotag', 'Geotag', array('Geotag', 'printMetaBox'), 'post', 'normal', 'low');
		add_meta_box('geotag', 'Geotag', array('Geotag', 'printMetaBox'), 'page', 'normal', 'low');
		register_setting('geotag', 'geotag_options');
		add_options_page('Geotag Configuration', 'Geotag', 'manage_options', __FILE__, array('Geotag', 'printOptionsPage'));
	}
	
	function hookSavePost($post_id) {
		/**
		 * Geotag::hookSavePost()
		 * v2.0
		 *
		 */
		// Don't run this function twice.
		if (Geotag::$tmp['hookSavePost']['completed']) {return;}
		// Save the coordinates
		if (!empty($_POST['geotag_lat']) && !empty($_POST['geotag_lon'])) {
			Geotag::putCoordinates($_POST['geotag_lat'], $_POST['geotag_lon'], $post_id);
		} else {
			Geotag::putCoordinates(null, null, $post_id);
		}
		// Save the livepost tag
		if ($_POST['geotag_livepost']['livepost'] == 'true') {
			Geotag::putPostmeta('livepost', '1', $post_id);
		} else {
			Geotag::putPostmeta('livepost', null, $post_id);
		}
		Geotag::$tmp['hookSavePost']['completed'] = true;
	}
	
	
	/**
	 * Print HTML
	 */
	
	function printMetaBox() {
		/**
		 * Geotag::printMetaBox()
		 * v2.0
		 *
		 * Creates the meta box for the posts.
		 */
		global $geotag_options, $post;
		list($lat, $lon) = Geotag::getCoordinates();
		$livepost = (Geotag::getPostmeta('livepost') == '1') ? 'livepost' : '';
		$upload_dir = wp_upload_dir();
		// Print the HTML of the Geotag meta box
		?><style type="text/css" media="all">
			#geotag div.inside {margin: 6px 0px 0px;}
			#geotag-tabs {margin: 6px;}
			#geotag-tabs_selector {cursor: pointer;}
			#geotag-tabs div.tabs-panel {display: none; height: 300px; padding: 10px;}
			#geotag-tabs div.tabs-panel h4 {margin: 18px 0 6px;}
			#geotag-tabs div.tabs-panel p.info {font-size: smaller;}
			#geotag-tabs div.tabs-panel ul {font-size: 11px;}
			#geotag-tabs div.tabs-panel input,
			#geotag-tabs div.tabs-panel select {margin-right: 10px;}
			#geotag-tabs div.tabs-panel table.form-table {margin: 3px 0; background-color: #F9F9F9;}
			#geotag-tabs div.tabs-panel table.form-table td {padding: 3px 5px; vertical-align: top;}
			#geotag-tabs div.tabs-panel table.form-table th {width: 90px; padding: 9px 5px; vertical-align: top;}
			#geotag-map_info {
				width: 100%;
				padding: 10px;
				background-color: #EDEDED; 
				-moz-border-radius: 0 0 6px 6px;
			}
			#geotag-map_info th {text-align: left;}
			#geotag-map_info td {font-size: smaller; padding: 3px; vertical-align: top;}
			</style>
		<div id="geotag-tabs" class="categorydiv">
			<ul id="geotag-tabs_selector" class="category-tabs">
				<li><a>Properties</a></li>
				<li><a>Create Tag</a></li>
				<li><a>Help</a></li>
			</ul>
			<div id="geotag-tabs_position" class="tabs-panel">
				<p>Set the position for the current post. All of the following properties will be saved with your post in the Wordpress database.</p>
				<h4>Position of your post</h4>
				<p class="info">Enter the current position of your post, click the map below or search for a place and save your post.</p>
				<table id="geotag-position" class="form-table">
					<tr>
						<th>Latitude:</th>
						<td><input name="geotag_lat" id="geotag-position_lat" type="text" value="<?php echo $lat; ?>" style="width: 200px; font-weight: bold;" /></td>
					</tr>
					<tr>
						<th>Longitude:</th>
						<td><input name="geotag_lon" id="geotag-position_lon" type="text" value="<?php echo $lon; ?>" style="width: 200px; font-weight: bold;" />
							<input type="button" id="" name="" value="Get current position" onclick="gmap.geolocation({msg: '#geotag-position_msg'})" class="button" />
							<input type="button" id="" name="" value="Clear" onclick="gmap.clearForm('#geotag-position', true);" class="button" /></td>
					</tr>
					<tr>
						<th>Search:</th>
						<td><input name="" id="geotag-position_geocode" type="text" value="" style="width: 300px;" />
							<input type="button" id="" name="" value="Search" onclick="gmap.geocode({search: '#geotag-position_geocode', msg: '#geotag-position_msg'});" class="button" /></td>
					</tr>
				</table>
				<p id="geotag-position_msg" style="margin: 10px 0; color: #d54e21; font-weight: bold;"></p>
				<h4>Other Properties</h4>
				<table class="form-table">
					<tr>
						<td><?php Geotag::printCheckboxTag('geotag_livepost', array('livepost' =>'Tag this post as "live from the field"'), $livepost, null, false); ?>
							<p class="info">If supported, your theme can read this value and tell your visitors, that this post was send via notebook or mobile phone and is live from the field.</p></td>
					</tr>
				</table>
			</div>
			<div id="geotag-tabs_createtag" class="tabs-panel">
				<p>Create a customized <em>[gmap]</em> tag and insert it into your post. For properties which are left blank, the default values from the options page will be used. All these properties won't be saved in your Wordpress database.</p>
				<h4>Appearance</h4>
				<p class="info">Change the dimensions, the maptype and the map controls.</p>
				<table id="geotag-tabs_createtag_appearance" class="form-table">
					<tr>
						<th>Width:</th>
						<td><input name="" id="geotag-createtag_width" type="text" style="width: 65px;" />Please add <em>%</em> or <em>px</em></td>
					</tr>
					<tr>
						<td>Height:</th>
						<td><input name="" id="geotag-createtag_height" type="text" style="width: 65px;" />Please add <em>%</em> or <em>px</em></td>
					</tr>
					<tr>
						<th>Maptype:</th>
						<td><?php Geotag::printSelectTag('geotag-createtag_maptype', array('' =>'', 'roadmap' => 'Roadmap', 'satellite' => 'Satellite', 'hybrid' => 'Hybrid', 'terrain' => 'Terrain'), null, 'width: 200px;', true); ?>
							<?php Geotag::printSelectTag('geotag-createtag_staticmap', array('' =>'', 'true' => 'Static map', 'false' => 'Dynamic map'), null, 'width: 200px;', true); ?></td>
					</tr>
					<tr>
						<th>Map Controls:</th>
						<td><?php Geotag::printCheckboxTag('geotag-createtag_control', array('hide' =>'Hide all map controls'), null, null, true); ?></td>
					</tr>
					<tr>
						<th></th>
						<td>Maptype Controls:
							<?php Geotag::printCheckboxTag('geotag-createtag_control', array('roadmap' => 'Roadmap', 'satellite' => 'Satellite', 'hybrid' => 'Hybrid', 'terrain' => 'Terrain'), null, 'margin-right: 10px;', true); ?><br />
							Other Controls:
							<?php Geotag::printCheckboxTag('geotag-createtag_control', array('navigation' => 'Navigation control', 'streetview' => 'Google Streetview control', 'scale' => 'Scale control'), null, 'margin-right: 10px;', true); ?></td>
					</tr>
				</table>
				<h4>Center</h4>
				<p class="info">Enter a position or enable automatic centering.</p>
				<table id="geotag-tabs_createtag_center" class="form-table">
					<tr>
						<th>Latitude:</th>
						<td><input name="" id="geotag-createtag_center_lat" type="text" style="width: 200px;" /></td>
					</tr>
					<tr>
						<th>Longitude:</th>
						<td><input name="" id="geotag-createtag_center_lon" type="text" style="width: 200px;" />
							<input type="button" id="" name="" value="Grab from Map" onclick="var c=gmap.obj[0].map.getCenter(); jQuery('#geotag-createtag_center_lat').val(c.lat()); jQuery('#geotag-createtag_center_lon').val(c.lng());" class="button" /></td>
					</tr>
					<tr>
						<th>Center on:</th>
						<td><?php Geotag::printCheckboxTag('geotag-createtag_center', array('MARKERS' => 'Post Markers', 'PHOTOS' => 'Photo Markers', 'FILES' => 'KML/KMZ files'), null, 'margin-right: 10px;', true); ?></td>
					</tr>
				</table>
				<h4>Zoom Level</h4>
				<p class="info">Enter a zoom level manually or enable automatic zoom level.</p>
				<table id="geotag-tabs_createtag_zoom" class="form-table">
					<tr>
						<th>Zoomlevel:</th>
						<td><?php Geotag::printSelectTag('geotag-createtag_zoom', array('' => '', '0' => '0 (Out)', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19 (In)'), null, 'width: 75px;', true); ?>
							<?php Geotag::printCheckboxTag('geotag-createtag_zoom', array('autozoom' => 'Set automatically'), null, null, true); ?></td>
					</tr>
				</table>
				<h4>Marker</h4>
				<p class="info">Enter the position of the marker, click on the map or enter a query string. If left blank, a marker at the position of the current post will be visible.</p>
				<table id="geotag-tabs_createtag_marker" class="form-table">
					<tr>
						<th>Latitude:</th>
						<td><input name="" id="geotag-createtag_marker_lat" type="text" style="width: 200px;" /></td>
					</tr>
					<tr>
						<th>Longitude:</th>
						<td><input name="" id="geotag-createtag_marker_lon" type="text" style="width: 200px;" />
							<input type="button" id="" name="" value="Get current position" onclick="gmap.geolocation({msg: '#geotag-createtag_msg'})" class="button" /></td>
					</tr>
					<tr>
						<th>Search:</th>
						<td><input name="" id="geotag-createtag_geocode" type="text" value="" style="width: 300px;" />
							<input type="button" id="" name="" value="Search" onclick="gmap.geocode({search: '#geotag-createtag_geocode', msg: '#geotag-createtag_msg'});" class="button" /></td>
					</tr>
					<tr>
						<td colspan="2"><p id="geotag-createtag_msg" style="margin: 10px 0; color: #d54e21; font-weight: bold;"></p></td>
					</tr>
					<tr>
						<th>Marker Query:</th>
						<td><input name="" id="geotag-createtag_marker_query" type="text" style="width: 300px;" />
							<a href="http://codex.wordpress.org/Function_Reference/WP_Query" target="_blank">Info</a></td>
					</tr>
					<tr>
						<th>Marker Icon:</th>
						<td><input name="" id="geotag-createtag_marker_icon" type="text" style="width: 300px;" />
							<a href="http://econym.org.uk/gmap/geicons.htm" target="_blank">Examples</a></td>
					</tr>
				</table>
				<h4>Photos</h4>
				<p class="info">Display the position of your photos in your map.</p>
				<table id="geotag-tabs_createtag_photo" class="form-table">
					<tr>
						<th>Read Geotags:</th>
						<td><?php Geotag::printSelectTag('geotag-createtag_photo_readexiftags', array('' =>'', 'true' => 'Read geotags from photos', 'false' => 'Don\'t read geotags from photos'), null, 'width: 300px;', true); ?></td>
					</tr>
					<tr>
						<th>Photo Icon:</th>
						<td><input type="radio" name="geotag-createtag_photo_icon" id="geotag-createtag_photo_icon_thumbnail" /> Show a thumbnail of your photo<br />
							<input type="radio" name="geotag-createtag_photo_icon" />
							<input name="" id="geotag-createtag_photo_icon_uri" type="text" style="width: 270px;" />
							<a href="http://econym.org.uk/gmap/geicons.htm" target="_blank">Examples</a>
						</td>
					</tr>
				</table>
				<h4>KML-File</h4>
				<p class="info">Display a KML/KMZ-file in your map.</p>
				<table id="geotag-tabs_createtag_kmlfile" class="form-table">
					<tr>
						<th>URI:</th>
						<td><input name="" id="geotag-createtag_kmlfile" type="text" value="<?php echo Geotag::$tmp['kml_filname']; ?>" style="width: 300px;" />
							<input type="button" id="" name="" value="Preview file" onclick="gmap.displayKMLFile(jQuery('#geotag-createtag_kmlfile').val().replace(/__UPLOAD__/, '<?php echo $upload_dir['baseurl']; ?>'), {msg: '#geotag-createtag_kmlfile_msg'});" class="button" /></td>
					</tr>
					<tr>
						<th>Attachments:</th>
						<td><?php 
								$attachments = get_posts(array('post_type' => 'attachment', 'numberposts' => -1, 'post_parent' => $post->ID)); 
								if ($attachments) {
									echo '<ul>';
									foreach ($attachments as $attachment) {
										$filename = str_replace($upload_dir['basedir'], null, get_attached_file($attachment->ID));
										echo '<li><a href="#" onclick="jQuery(\'#geotag-createtag_kmlfile\').val(\'__UPLOAD__'.$filename.'\'); return false;">'.$attachment->post_title.'</a><br />'.$filename.'</li>';
									}
									echo '</ul>';
								} else {
									echo '<em>none</em>';
								}
							?>
						</td>
					</tr>
					<tr>
						<th>Uploaded Files:</th>
						<td><a href="#" onclick="jQuery('#geotag-createtag_uploadedfiles').slideToggle(); return false;">Show all uploaded .kml-files</a><br />
							<?php
								$files = Geotag::getFiles(null, true, 'file', 'kml', $upload_dir['basedir']);
								if ($files) {
									echo '<select id="geotag-createtag_uploadedfiles" size="2" style="height: 200px; width: 300px; display: none;" onclick="jQuery(this).val(\'\').blur();">';
									foreach ($files as $file) {
										echo '<option onclick="jQuery(\'#geotag-createtag_kmlfile\').val(\'__UPLOAD__'.$file.'\');">'.$file.'</option>';
									}
									echo '</select>';
								}
							?>
					</tr>
				</table>
				<div style="margin: 20px 0px 12px;">
					<input type="button" id="" name="" value="Insert tag" onclick="gmap.createTag();" class="button" style="font-weight: bold;" />
					<input type="button" id="" name="" value="Clear everything" onclick="gmap.clearForm('#geotag-tabs_createtag', true);" class="button" />
				</div>
			</div>
			<div class="tabs-panel">
				<p>Got stuck? Why don't you have a look at the <a href="http://projects.bobsp.de/geotag/documentation/" target="_blank">Geotag documentation</a>, 
					the <a href="http://bobsp.de/weblog/geotag/" target="_blank">Geotag website</a> or the <a href="http://wordpress.org/tags/geotag?forum_id=10" target="_blank">Geotag forum at wordpres.org</a></p>
			</div>
		</div>
		<div id="gmap_0_0" style="height: 300px; width: 100%; padding: 0px; margin-top: 20px; background-color: #F9F9F9;"></div>
		<table id="geotag-map_info">
			<tr>
				<th style="width: 40%;">Marker</th>
				<th style="width: 40%;">Center</th>
				<th style="width: 20%;">Zoom Level</th>
			</tr>
			<tr>
				<td>Lat:&nbsp;<span id="geotag-map_marker_lat"></span><br />
					Lon:&nbsp;<span id="geotag-map_marker_lon"></span></td>
				<td>Lat:&nbsp;<span id="geotag-map_center_lat"></span><br />
					Lon:&nbsp;<span id="geotag-map_center_lon"></span></td>
				<td><span id="geotag-map_zoomlevel"></span></td>
				
			</tr>
		</table><?php
		// Load the Javascript
		Geotag::printJSAdminObjects();
	}
	
	function printOptionsPage() {
		/**
		 * Geotag::printOptionsPage()
		 * v2.0
		 *
		 * Prints the options page.
		 */
		global $geotag_options;
		?><style type="text/css" media="all">
			#geotag-options h3 {margin-top: 3em;}
			#geotag-options table.form-table tr {vertical-align: top;}
			#geotag-options table.form-table tr.uneven {background-color: rgb(243,243,243);}
			#geotag-options table.form-table-small td {padding: 0 4px;}
			#geotag-options table.center td {text-align: center; vertical-align: middle;}
			</style>
		<div id="geotag-options" class="wrap">
			<h2>Geotag Configuration</h2>
			<p>Have a look at the <a href="http://projects.bobsp.de/geotag/documentation/" target="_blank">Geotag documentation</a> to learn about this plugin. Maybe the <a href="http://bobsp.de/weblog/geotag/" target="_blank">Geotag website</a> 
				or the <a href="http://wordpress.org/tags/geotag?forum_id=10" target="_blank">Geotag forum at wordpress.org</a> might also be helpful.</p>
			<h3>General Options</h3>
			<form method="post" action="options.php">
			<?php settings_fields('geotag'); ?>
			<table class="form-table">
				<tr class="uneven">
					<th scope="row">Show Map</th>
					<td>Show maps only on these pages:<br />
						<?php Geotag::printCheckboxTag('geotag_options[show_map]', array('home' => 'Home', 'single' => 'Single posts', 'page' => 'Pages', 'date' => 'Date archives', 'category' => 'Category Archives'), $geotag_options['show_map']); ?></td>
				</tr>
				<tr>
					<th scope="row">Automatic Map</th>
					<td><?php Geotag::printCheckboxTag('geotag_options[auto_map]', array('enable' => 'Automatically show a map...'), $geotag_options['auto_map']); ?>
						<?php Geotag::printSelectTag('geotag_options[auto_map][position]', array('top' => 'at the top of every post', 'bottom' => 'at the bottom of every post'), $geotag_options['auto_map']['position']); ?></td>
				</tr>
				<tr class="uneven">
					<th scope="row">Add Geotags</th>
					<td><?php Geotag::printCheckboxTag('geotag_options[geotag]', array('feeds' => 'Add geographical information to feeds'), $geotag_options['geotag']); ?>
						<?php Geotag::printCheckboxTag('geotag_options[geotag]', array('posts' => 'Add geographical information to the HTML header of your posts'), $geotag_options['geotag']); ?></td>
				</tr>
			</table>
			<h3>Map Appearance</h3>
			<h4>Basic Settings</h4>
			<table class="form-table">
				<tr class="uneven">
					<th scope="row">Dimensions</th>
					<td>Width:&nbsp;&nbsp;<input name="geotag_options[width]" type="text" value="<?php echo $geotag_options['width']; ?>" size="10" /> Please add <em>%</em> or <em>px</em><br />
						Height:&nbsp;<input name="geotag_options[height]" type="text" value="<?php echo $geotag_options['height']; ?>" size="10" /> Please add <em>%</em> or <em>px</em></td>
				</tr>
				<tr>
					<th scope="row">Map Center</th>
					<td><strong>Default Center</strong><br />
						Center the map on the following default position, if no other position is available:<br />
						Latitude:&nbsp;&nbsp;&nbsp;<input name="geotag_options[center][lat]" type="text" value="<?php echo $geotag_options['center']['lat']; ?>" size="10" /><br />
						Longitude:&nbsp;<input name="geotag_options[center][lon]" type="text" value="<?php echo $geotag_options['center']['lon']; ?>" size="10" /><br />
						<span style="font-size: smaller;">These values will only have an effect, if you haven't set a position for your post and if there aren't any items on which the map can center automatically (see below).</span><br />&nbsp;<br />
						<strong>Automatic Centering</strong><br />
						Automatically center the map on the following items:<br />
						<?php Geotag::printCheckboxTag('geotag_options[center]', array('on_markers' => 'Post Markers', 'on_photos' => 'Photo Markers', 'on_kmlfiles' => 'KML/KMZ files'), $geotag_options['center']); ?></td>
				</tr>
				<tr class="uneven">
					<th scope="row">Map Zoom</th>
					<td><strong>Default Zoom Level</strong><br />
						Default zoom level: <?php Geotag::printSelectTag('geotag_options[zoom][level]', array('0' => '0 - Zoomed out', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19 - Zoomed In'), $geotag_options['zoom']['level']); ?><br />&nbsp;<br />
						<strong>Automatic Zoom Level</strong><br />
						<?php Geotag::printCheckboxTag('geotag_options[zoom]', array('autozoom' => 'Set the zoomlevel automatically'), $geotag_options['zoom']); ?>
						<span style="font-size: smaller;">If the automatic centering is enabled (see above), it is also possible to automatically determine a proper zoom level. This
							won't have any effect, if there is only a single item to display on the map of if automatic centering (see above) is disabled.</span></td>
				</tr>
				<tr>
					<th scope="row">Map Type</th>
					<td><?php Geotag::printSelectTag('geotag_options[maptype]', array('roadmap' => 'Roadmap', 'satellite' => 'Satellite', 'hybrid' => 'Hybrid', 'terrain' => 'Physical (terrain information)'), $geotag_options['maptype']); ?></td>
				</tr>
				<tr class="uneven">
					<th scope="row">Static Map</th>
					<td><?php Geotag::printCheckboxTag('geotag_options', array('staticmap' => 'Create static maps'), $geotag_options); ?>
						<span style="font-size: smaller;">Maps will be displayed as images without interactivity. Pages will load faster and doen't require JavaScript. Please note that the width and height of the maps must be defined in pixels and is restriced to 640x640px.</span></td>
				</tr>
			</table>
			<h4>Map Controls</h4>
			<table class="form-table">
				<tr class="uneven">
					<th scope="row">Map Type Control</th>
					<td><?php Geotag::printCheckboxTag('geotag_options[maptypecontrol]', array('enable' => 'Show map type controls'), $geotag_options['maptypecontrol']); ?><br />
						<strong>Visible Map Type Controls</strong><br />
						Show a control for the following map types:<br />
						<?php Geotag::printCheckboxTag('geotag_options[maptypecontrol]', array('roadmap' => 'Roadmap', 'satellite' => 'Satellite', 'hybrid' => 'Hybrid', 'terrain' => 'Physical (terrain information)'), $geotag_options['maptypecontrol']); ?><br />
						<strong>Map Type Control Style</strong><br />
						<?php Geotag::printSelectTag('geotag_options[maptypecontrol][style]', array('default' => 'Default (depends on the size of the map)', 'horizontal_bar' => 'Horizontal bar', 'dropdown_menu' => 'Dropdown menu'), $geotag_options['maptypecontrol']['style']); ?></td>
				</tr>
				<tr>
					<th scope="row">Navigation Control</th>
					<td><?php Geotag::printCheckboxTag('geotag_options[navigationcontrol]', array('enable' => 'Show navigation controls'), $geotag_options['navigationcontrol']); ?><br />
						<strong>Navigation Control Style</strong><br />
						<?php Geotag::printSelectTag('geotag_options[navigationcontrol][style]', array('default' => 'Default (depends on the size of the map)', 'zoom_pan' => 'Standard zoom/pan control', 'small' => 'Small zoom control', 'android' => 'Andorid style zoom control'), $geotag_options['navigationcontrol']['style']); ?></td>
				</tr>
				<tr class="uneven">
					<th scope="row">Other Map Controls</th>
					<td><?php Geotag::printCheckboxTag('geotag_options[streetviewcontrol]', array('enable' => 'Show Google Street View control'), $geotag_options['streetviewcontrol']); ?>
						<?php Geotag::printCheckboxTag('geotag_options[scalecontrol]', array('enable' => 'Show scale control'), $geotag_options['scalecontrol']); ?>
				</tr>
			</table>
			<h3>Markers and Overlays</h3>
			<h4>Basic Settings</h4>
			<table class="form-table">
				<tr class="uneven">
					<th scope="row">Merge Markers</th>
					<td><?php Geotag::printCheckboxTag('geotag_options[merge_markers]', array('enable' => 'Combine single markers if the distance is less than'), $geotag_options['merge_markers']); ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="geotag_options[merge_markers][distance]" type="text" value="<?php echo $geotag_options['merge_markers']['distance']; ?>" size="10" /> meters.<br />
						<span style="font-size: smaller;">Merged markers will be displayed with a single icon. The info windows of the markers will be combined. Post and photo markers will be merged seperately.</span><br />
						Title of a merged marker: <input name="geotag_options[merge_markers][title]" type="text" value="<?php echo $geotag_options['merge_markers']['title']; ?>" size="30" /><br /></td>
				</tr>
				<tr>
					<th scope="row">Marker Manager</th>
					<td><?php Geotag::printCheckboxTag('geotag_options[markermanager]', array('enable' => 'Use the MarkerManager if you want to display more than'), $geotag_options['markermanager']); ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="geotag_options[markermanager][amount]" type="text" value="<?php echo $geotag_options['markermanager']['amount']; ?>" size="10" /> markers per map.<br />
						<span style="font-size: smaller;">The <a href="http://google-maps-utility-library-v3.googlecode.com/svn/tags/markermanager/1.0/docs/reference.html" target="_blank">MarkerManager</a> is a Google Maps utility which hides markers depending on the viewport of the user. Markers beyond the current viewport and markers which are too close to each other to be visible with the current zoom level will be hidden. Hence, you will get a better performance with a huge amount of markers on your map. </span><br />&nbsp;<br />
						<strong>Marker Manager Options</strong><br />
						Specify the minimum distance between two markers to display both of them on a specific zoom level.<br />
						<table class="form-table-small center">
							<tr>
								<td>Zoomlevel</td>
								<td>Distance</td>
							</tr>
							<tr>
								<td>0 or closer<input name="geotag_options[markermanager][zoomlevel][0]" type="hidden" value="0" /></td>
								<td><input name="geotag_options[markermanager][distance][0]" type="text" value="<?php echo $geotag_options['markermanager']['distance'][0]; ?>" size="5" /> km</td>
							</tr>
							<tr>
								<td><?php Geotag::printSelectTag('geotag_options[markermanager][zoomlevel][1]', array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19'), $geotag_options['markermanager']['zoomlevel'][1], 'width: 50px;'); ?> or closer</td>
								<td><input name="geotag_options[markermanager][distance][1]" type="text" value="<?php echo $geotag_options['markermanager']['distance'][1]; ?>" size="5" /> km</td>
							</tr>
							<tr>
								<td><?php Geotag::printSelectTag('geotag_options[markermanager][zoomlevel][2]', array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19'), $geotag_options['markermanager']['zoomlevel'][2], 'width: 50px;'); ?> or closer</td>
								<td><input name="geotag_options[markermanager][distance][2]" type="text" value="<?php echo $geotag_options['markermanager']['distance'][2]; ?>" size="5" /> km</td>
							</tr>
							<tr>
								<td><?php Geotag::printSelectTag('geotag_options[markermanager][zoomlevel][3]', array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19'), $geotag_options['markermanager']['zoomlevel'][3], 'width: 50px;'); ?> or closer</td>
								<td><input name="geotag_options[markermanager][distance][3]" type="text" value="<?php echo $geotag_options['markermanager']['distance'][3]; ?>" size="5" /> km</td>
							</tr>
							<tr>
								<td><?php Geotag::printSelectTag('geotag_options[markermanager][zoomlevel][4]', array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19'), $geotag_options['markermanager']['zoomlevel'][4], 'width: 50px;'); ?> or closer</td>
								<td>Show all markers<input name="geotag_options[markermanager][distance][4]" type="hidden" value="0" /></td>
							</tr>
						</table>
						</td>
				</tr>
				<tr class="uneven">
					<th scope="row">Read Exif Tags</th>
					<td><?php Geotag::printCheckboxTag('geotag_options', array('readexiftags' => 'Try to read the geotags from the photos of your posts and display a photo marker on the map'), $geotag_options); ?></td>
				</tr>
			</table>
			<h4>Appearance</h4>
			<table class="form-table">
				<tr class="uneven">
					<th scope="row">Post Markers</th>
					<td>Specify the appearance of the markers which indicate the position of your posts:<br />
						<?php Geotag::printRadioTag('geotag_options[overlays_markers][style]', array('default' => 'Use the default style&nbsp;&nbsp;<img src="http://maps.gstatic.com/intl/de_de/mapfiles/markers/marker_sprite.png" style="width: 32px; height 32px; vertical-align: middle;" />', 'individual' => 'Use an individual marker icon:'), $geotag_options['overlays_markers']['style']); ?>
						Icon URI:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="geotag_options[overlays_markers][icon_uri]" id="geotag_options_postmarker_iconuri" type="text" value="<?php echo $geotag_options['overlays_markers']['icon_uri']; ?>" size="50" />
						Examples: 
							<a href="#" onclick="jQuery('#geotag_options_postmarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal3/icon56.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal3/icon56.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_postmarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal2/icon31.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal2/icon31.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_postmarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal5/icon13.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal5/icon13.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_postmarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal5/icon14.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal5/icon14.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_postmarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal3/icon43.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal3/icon43.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_postmarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal4/icon47.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal4/icon47.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<br />
						<!--Shadow URI:&nbsp;<input name="geotag_options[overlays_markers][shadow_uri]" id="geotag_options_postmarker_iconshadow" type="text" value="<?php echo $geotag_options['overlays_markers']['shadow_uri']; ?>" size="30" /> <span style="font-size: smaller;">(optional)</span><br />-->
						<span style="font-size: smaller;">See <a href="http://econym.org.uk/gmap/geicons.htm" target="_blank">http://econym.org.uk/gmap/geicons.htm</a> for some icons provided by Google.</span></td>
				</tr>
				<tr>
					<th scope="row">Photo Markers</th>
					<td>Specify the appearance of the markers which indicate the position of your photos:<br />
						<?php Geotag::printRadioTag('geotag_options[overlays_photos][style]', array('default' => 'Use the default style&nbsp;&nbsp;<img src="http://maps.gstatic.com/intl/de_de/mapfiles/markers/marker_sprite.png" style="width: 32px; height 32px; vertical-align: middle;" />', 'thumbnail' => 'Use a thumbnail of the photo (more options below)', 'individual' => 'Use an individual marker icon:'), $geotag_options['overlays_photos']['style']); ?>
						Icon URI:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="geotag_options[overlays_photos][icon_uri]" id="geotag_options_photomarker_iconuri" type="text" value="<?php echo $geotag_options['overlays_photos']['icon_uri']; ?>" size="50" />
						Examples: 
							<a href="#" onclick="jQuery('#geotag_options_photomarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal4/icon46.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal4/icon46.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_photomarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal3/icon43.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal3/icon43.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_photomarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal4/icon47.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal4/icon47.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_photomarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal2/icon13.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal2/icon13.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_photomarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal3/icon55.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal3/icon55.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<a href="#" onclick="jQuery('#geotag_options_photomarker_iconuri').val('http://maps.google.com/mapfiles/kml/pal3/icon40.png'); return false;"><img src="http://maps.google.com/mapfiles/kml/pal3/icon40.png" style="width: 24px; height 24px; vertical-align: middle;"></a>
							<br />
						<!--Shadow URI:&nbsp;<input name="geotag_options[overlays_photos][shadow_uri]" id="geotag_options_photomarker_iconshadow" type="text" value="<?php echo $geotag_options['overlays_photos']['shadow_uri']; ?>" size="50" /> <span style="font-size: smaller;">(optional)</span><br />-->
						<span style="font-size: smaller;">See <a href="http://econym.org.uk/gmap/geicons.htm" target="_blank">http://econym.org.uk/gmap/geicons.htm</a> for more icons provided by Google.</span><br />&nbsp;<br />
						<strong>Dimensions of the Photos in the Google Maps Info Window</strong><br />
						<?php Geotag::printCheckboxTag('geotag_options[overlays_photos][infowindow]', array('resize' => 'Resize photos for the Google Maps info window:'), $geotag_options['overlays_photos']['infowindow']); ?>
						<table class="form-table-small">
							<tr>
								<td>Width:</td><td><input name="geotag_options[overlays_photos][infowindow][width]" type="text" value="<?php echo $geotag_options['overlays_photos']['infowindow']['width']; ?>" size="5" /> px</td>
							</tr>
							<tr>
								<td>Height:</td><td><input name="geotag_options[overlays_photos][infowindow][height]" type="text" value="<?php echo $geotag_options['overlays_photos']['infowindow']['height']; ?>" size="5" /> px</td>
							</tr>
							<tr>
								<td>Cropping Mode:</td><td><input name="geotag_options[overlays_photos][infowindow][cropping_mode]" type="text" value="<?php echo $geotag_options['overlays_photos']['infowindow']['cropping_mode']; ?>" size="5" /> (0, 1, 2, 3)</td>
							</tr>
							<tr>
								<td>Cropping Align:</td><td><input name="geotag_options[overlays_photos][infowindow][cropping_align]" type="text" value="<?php echo $geotag_options['overlays_photos']['infowindow']['cropping_align']; ?>" size="5" /> (c, t, tr, tl, b, br, bl, l, r)</td>
							</tr>
							<tr>
								<td>Border:</td><td><input name="geotag_options[overlays_photos][infowindow][border]" type="text" value="<?php echo $geotag_options['overlays_photos']['infowindow']['border']; ?>" size="5" /> px</td>
							</tr>
							<tr>
								<td>Border Color:</td><td><input name="geotag_options[overlays_photos][infowindow][border_color]" type="text" value="<?php echo $geotag_options['overlays_photos']['infowindow']['border_color']; ?>" size="11" /> (Red, Green, Blue)</td>
							</tr>
							<tr>
								<td colspan="2"><?php Geotag::printCheckboxTag('geotag_options[overlays_photos][infowindow]', array('sharpen' => 'Sharpen images after resize'), $geotag_options['overlays_photos']['infowindow']); ?></td>
							</tr>
						</table>
						<span style="font-size: smaller;">Resizing will be done by a slightly modified (added the ability to create borders) version of <a href="http://www.binarymoon.co.uk/projects/timthumb/" target="_blank">timthumb</a>. Read the <a href="http://code.google.com/p/timthumb/wiki/HowTo">HowTo</a> for a explanation of the cropping options. To use timthumbs caching feature, your geotag plugin directory must be writable.</span><br />&nbsp;<br />
						<strong>Dimensions of the Photo Marker Thumbnails </strong><br />
						<table class="form-table-small">
							<tr>
								<td>Width:</td><td><input name="geotag_options[overlays_photos][thumbnail][width]" type="text" value="<?php echo $geotag_options['overlays_photos']['thumbnail']['width']; ?>" size="5" /> px</td>
							</tr>
							<tr>
								<td>Height:</td><td><input name="geotag_options[overlays_photos][thumbnail][height]" type="text" value="<?php echo $geotag_options['overlays_photos']['thumbnail']['height']; ?>" size="5" /> px</td>
							</tr>
							<tr>
								<td>Cropping Mode:</td><td><input name="geotag_options[overlays_photos][thumbnail][cropping_mode]" type="text" value="<?php echo $geotag_options['overlays_photos']['thumbnail']['cropping_mode']; ?>" size="5" /> (0, 1, 2, 3)</td>
							</tr>
							<tr>
								<td>Cropping Align:</td><td><input name="geotag_options[overlays_photos][thumbnail][cropping_align]" type="text" value="<?php echo $geotag_options['overlays_photos']['thumbnail']['cropping_align']; ?>" size="5" /> (c, t, tr, tl, b, br, bl, l, r)</td>
							</tr>
							<tr>
								<td>Border:</td><td><input name="geotag_options[overlays_photos][thumbnail][border]" type="text" value="<?php echo $geotag_options['overlays_photos']['thumbnail']['border']; ?>" size="5" /> px</td>
							</tr>
							<tr>
								<td>Border Color:</td><td><input name="geotag_options[overlays_photos][thumbnail][border_color]" type="text" value="<?php echo $geotag_options['overlays_photos']['thumbnail']['border_color']; ?>" size="11" /> (Red, Green, Blue)</td>
							</tr>
							<tr>
								<td colspan="2"><?php Geotag::printCheckboxTag('geotag_options[overlays_photos][thumbnail]', array('sharpen' => 'Sharpen thumbnails after resize'), $geotag_options['overlays_photos']['thumbnail']); ?>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="uneven">
					<th scope="row">zIndex</th>
					<td>Select the order of the markers on the map: <br />
						<?php Geotag::printSelectTag('geotag_options[overlays_markers][zindex]', array('posts' => 'Show post markers in front of photo markers', 'photos' => 'Show photo markers in front of post markers', 'null' => 'Honestly, I don\'t care'), $geotag_options['overlays_markers']['zindex'], 'width: 350px;'); ?></td>
				</tr>
			</table>
			<h3>Miscellaneous</h3>
			<table class="form-table">
				<tr class="uneven">
					<th scope="row">KML File Upload</th>
					<td><?php Geotag::printCheckboxTag('geotag_options', array('kml_upload' => 'Add an upload tab to the media upload window for KML/KMZ files.'), $geotag_options); ?></td>
				</tr>
				<tr>
					<th scope="row"><em>WP Geo</em> Compatibility</th>
					<td><strong>Database</strong><br /><?php Geotag::printRadioTag('geotag_options[wpgeo_compatibility][database]', array('false' => 'No compatibility - <em>WP Geo</em> coordinates will be ignored', 'read' => 'Read compatibility - read the <em>WP Geo</em> coordinates only if no <em>Geotag</em> coordinates were saved', 'write' => 'Read and write compatibility - read the <em>WP Geo</em> coordinates and save new coordinates in the <em>WP Geo</em> database field'), $geotag_options['wpgeo_compatibility']['database']); ?><br />
						<strong>Shortcode</strong><br /><?php Geotag::printCheckboxTag('geotag_options[wpgeo_compatibility]', array('shortcode' => 'Process the <em>WP Geo</em> Shortcode <code>[wp_geo_map]</code> in posts'), $geotag_options['wpgeo_compatibility']); ?></td>
				</tr>
			</table>
			<h4>Very Technical Stuff</h4>
			<table class="form-table">
				<tr class="uneven">
					<th scope="row">Init maps when page loads</th>
					<td><?php Geotag::printCheckboxTag('geotag_options', array('init_on_pageload' => 'Automatically init the mpas when the page loads (default: <em>enabled</em>)'), $geotag_options); ?>
						<span style="font-size: smaller;">If you want to integrate the plugin to your own JavaScript code, you can disable this option and init the maps manually by running <code>gmap.init(gmap_no_init);</code>. When disabled, the JSON code will be stored in the variable <em>gmap_no_init</em>.</td>
				</tr>
				<!--<tr>
					<th scope="row">Debug</th>
					<td><?php Geotag::printCheckboxTag('geotag_options', array('debugging' => 'Add debugging info to pages (default: <em>disabled</em>)'), $geotag_options); ?></td>
				</tr>-->
			</table>
			<p class="submit">
				<input type="submit" name="submit" value="<?php _e('Save Changes'); ?>" class="button-primary" />
			</p>
			</form>
		</div><?php
		// For debugging:
		//echo '<pre>'; var_dump($geotag_options); echo '</pre>';
	}
	
	
	/**
	 * Other
	 */
	
	function printJSAdminObjects() {
		/**
		 * Geotag::printJSAdminObjects()
		 * v2.0
		 *
		 * Prints the JavaScript objects for the admin pages.
		 */
		global $geotag_options;
		list($lat, $lon) = Geotag::getCoordinates();
		$map[0] = array(
			'center' => array(
				'lat' => $lat ? $lat : $geotag_options['center']['lat'],
				'lon' => $lon ? $lon : $geotag_options['center']['lon']
			),
			'zoom' => array(
				'level' => (is_null($lat) || is_null($lon)) ? 2 : $geotag_options['zoom']['level']
			),
			'maptype' => $geotag_options['maptype'],
			'maptypecontrol' => $geotag_options['maptypecontrol'],
			'navigationcontrol' => $geotag_options['navigationcontrol'],
			'post_id' => 0,
			'map_id' => 0,
			'markers' => array(
				'posts' => array(
					array(
						'lat' => $lat ? $lat : null,
						'lon' => $lon ? $lon : null,
						'draggable' => true,
						'visible' => (is_null($lat) || is_null($lon)) ? false : true
					), 
					array(
						'lat' => null,
						'lon' => null,
						'draggable' => true,
						'visible' => false
					))
			),
			'init_on_pageload' => true
		);
		Geotag::printJSObjects();
		?><script type="text/javascript">
			GMap3.prototype.initAdmin = function(json) {
				this.init(json);
				var self = this,
					map = this.obj[0].map;
				this.obj[0].geocoder = new google.maps.Geocoder();
				this.obj[0].mapInfo = {
					$markerLat: jQuery('#geotag-map_marker_lat'),
					$markerLon: jQuery('#geotag-map_marker_lon'),
					$centerLat: jQuery('#geotag-map_center_lat'),
					$centerLon: jQuery('#geotag-map_center_lon'),
					$zoom: jQuery('#geotag-map_zoomlevel')
				}
				this.obj[0].mapLayer = {
					activeLayer: null,
					layers: [{
						$textboxLat: jQuery('#geotag-position_lat'),
						$textboxLon: jQuery('#geotag-position_lon'),
						marker: self.obj[0].markers[0],
						markerVisible: self.obj[0].markers[0].getVisible(),
						mapBounds: null
					}, {
						$textboxLat: jQuery('#geotag-createtag_marker_lat'),
						$textboxLon: jQuery('#geotag-createtag_marker_lon'),
						marker: self.obj[0].markers[1],
						markerVisible: self.obj[0].markers[1].getVisible(),
						mapBounds: null
					}]
				};
				google.maps.event.addListener(map, 'bounds_changed', function() {
					self.displayMapInfo(false, this.getCenter(), this.getZoom());
				});
				google.maps.event.addListener(map, 'click', function(event) {
					self.changePosition(event.latLng, {center: false})
				});
				google.maps.event.addListener(self.obj[0].markers[0], 'dragend', function(event) {
					self.changePosition(event.latLng, {center: false})
				});
			}
			GMap3.prototype.geolocation = function(options) {
				 var self = this,
					$msg = jQuery(options.msg);
				 if (navigator.geolocation) {
					$msg.text('Trying to find you. Please wait...');
					navigator.geolocation.getCurrentPosition(function(pos) {
						self.changePosition(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude), {center: true});
						$msg.text('');
					}, function() {
						$msg.text('Sorry, wasn\'t able to get your position. Try to search for an address.');
					});
				} else {
					$msg.text('Your browser doesn\'t support geolocation...maybe should get a new one?');
				}
			}
			GMap3.prototype.geocode = function(options) {
				var self = this,
					address = jQuery(options.search).val()
					$msg = jQuery(options.msg);
				this.obj[0].geocoder.geocode({'address': address}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						$msg.text('');
						self.changePosition(results[0].geometry.location, {center: true});
					} else {
						$msg.text('Sorry, wasn\'t able to find that address. Try again.');
					}
				});
			}
			GMap3.prototype.changePosition = function(latLng, options) {
				var obj = this.obj[0],
					l = obj.mapLayer.layers[obj.mapLayer.activeLayer];
				l.$textboxLat.val(latLng.lat());
				l.$textboxLon.val(latLng.lng());
				l.marker.setPosition(latLng);
				l.marker.setVisible(true);
				if (options.center) {obj.map.setCenter(latLng);}
				this.displayMapInfo(latLng);
			}
			GMap3.prototype.changeMapLayer = function(layer) {
				var l = this.obj[0].mapLayer
					l_old = l.layers[l.activeLayer],
					l_new = l.layers[layer];
				l.activeLayer = layer;
				if (l_old) {
					l_old.markerVisible = l_old.marker.getVisible();
					l_old.marker.setVisible(false);
				}
				if (l_new) {l_new.marker.setVisible(l_new.markerVisible);}
				if (l_new  && l_new.markerVisible) {
					this.changePosition(l_new.marker.getPosition(), {center: true});
				} else {
					this.displayMapInfo(new google.maps.LatLng(0,0));
				}
			}
			GMap3.prototype.displayMapInfo = function(markerLatLng, centerLatLng, zoom) {
				var m = this.obj[0].mapInfo;
				if (markerLatLng) {
					m.$markerLat.text(markerLatLng.lat());
					m.$markerLon.text(markerLatLng.lng());
				}
				if (centerLatLng) {
					m.$centerLat.text(centerLatLng.lat());
					m.$centerLon.text(centerLatLng.lng());
				}
				if (zoom) {
					m.$zoom.text(zoom);
				}
			}
			GMap3.prototype.createTag = function() {
				var control = [],
					center = [],
					zoom,
					tag = '[gmap';
				if (jQuery('#geotag-createtag_control-hide').is(':checked')) {
					control = ['false'];
				} else {
					if (jQuery('#geotag-createtag_control-roadmap').is(':checked')) {control.push('roadmap');}
					if (jQuery('#geotag-createtag_control-satellite').is(':checked')) {control.push('satellite');}
					if (jQuery('#geotag-createtag_control-hybrid').is(':checked')) {control.push('hybrid');}
					if (jQuery('#geotag-createtag_control-terrain').is(':checked')) {control.push('terrain');}
					if (jQuery('#geotag-createtag_control-navigation').is(':checked')) {control.push('navigation');}
					if (jQuery('#geotag-createtag_control-streetview').is(':checked')) {control.push('streetview');}
					if (jQuery('#geotag-createtag_control-scale').is(':checked')) {control.push('scale');}
				}
				if (jQuery('#geotag-createtag_center-markers').is(':checked')) {center.push('markers');}
				if (jQuery('#geotag-createtag_center-photos').is(':checked')) {center.push('photos');}
				if (jQuery('#geotag-createtag_center-files').is(':checked')) {center.push('files');}
				if (jQuery('#geotag-createtag_zoom-autozoom').is(':checked')) {
					zoom = 'auto';
				} else {
					zoom = jQuery('#geotag-createtag_zoom').val();
				}
				var attr = {
						width: jQuery('#geotag-createtag_width').val(),
						height: jQuery('#geotag-createtag_height').val(),
						type: jQuery('#geotag-createtag_maptype').val(),
						static: jQuery('#geotag-createtag_staticmap').val(),
						center_lat: (jQuery('#geotag-createtag_center_lat').val() && jQuery('#geotag-createtag_center_lat').val()) ? jQuery('#geotag-createtag_center_lat').val() : null,
						center_lon: (jQuery('#geotag-createtag_center_lat').val() && jQuery('#geotag-createtag_center_lat').val()) ? jQuery('#geotag-createtag_center_lon').val() : null,
						center: center.join(','),
						zoom: zoom,
						control: control.join(','),
						marker_lat: (jQuery('#geotag-createtag_marker_lat').val() && jQuery('#geotag-createtag_marker_lat').val()) ? jQuery('#geotag-createtag_marker_lat').val() : null,
						marker_lon: (jQuery('#geotag-createtag_marker_lat').val() && jQuery('#geotag-createtag_marker_lat').val()) ? jQuery('#geotag-createtag_marker_lon').val() : null,
						marker_query: jQuery('#geotag-createtag_marker_query').val(),
						marker_icon: jQuery('#geotag-createtag_marker_icon').val(),
						photo: jQuery('#geotag-createtag_photo_readexiftags').val(),
						photo_icon: jQuery('#geotag-createtag_photo_icon_thumbnail').is(':checked') ? 'thumbnail' : jQuery('#geotag-createtag_photo_icon_uri').val(),
						file: jQuery('#geotag-createtag_kmlfile').val()
					};
				for (var p in attr) {
					tag+= attr[p] ? (' ' + p + '="' + attr[p] + '"') : '';
				}
				tag+= ']';
				jQuery('#content').val(function(i, val) {return val + '\n' + tag;})
			}
			GMap3.prototype.displayKMLFile = function(file) {
				if (this.obj[0].kmlLayer) {this.obj[0].kmlLayer.setMap(null);}
				this.obj[0].kmlLayer = file ? new google.maps.KmlLayer(file, {map: this.obj[0].map, preserveViewport: false}) : null;
			}
			GMap3.prototype.clearForm = function(selector, clear_map) {
				jQuery(':text,select', selector).val('');
				jQuery(':checkbox,:radio', selector).attr('checked', '');
				jQuery('p[id$="msg"]', selector).text('');
				if (clear_map) {
					this.obj[0].mapLayer.layers[this.obj[0].mapLayer.activeLayer].marker.setVisible(false);
					if (this.obj[0].kmlLayer) {this.obj[0].kmlLayer.setMap(null);}
				}
			}
			var gmap = new GMap3();
			gmap.initAdmin(<?php echo Geotag::getJSONData($map) ?>);
			/** 
			 * Tabs
			 **/
			jQuery(document).ready(function($) {
				// Init the tabs
				var $menubuttons = $('#geotag-tabs_selector li'),
					$containers = $('#geotag-tabs div.tabs-panel');
				$menubuttons.each(function(i) {
					$(this).click(function() {
						$menubuttons.removeClass('tabs');
						$containers.hide()
							.eq(i).show();
						$(this).addClass('tabs');
						gmap.changeMapLayer(i);
					});
				});
				$menubuttons.eq(0).click();
			});
		</script><?php
	}
	
	function printSelectTag($name, $options, $selected=null, $style=null, $id=null) {
		/**
		 * Geotag::printSelectTag()
		 * v2.0
		 *
		 * Auxiliary function for the options page. Prints a <select> tag with the given values.
		 */
		$style = $style ? $style : 'width: 270px';
		$output = '<select name="'.$name.'"';
		$output.= $style ? ' style="'.$style.'"' : null;
		if ($id === true) {
			$output.= ' id="'.$name.'"';
		} elseif ($id) {
			$output.= ' id="'.$id.'"';
		}
		$output.= '>';
		foreach ($options as $key => $val) {
			$output.= '<option value="'.$key.'"';
			if ($selected == strval($key)) {$output.= ' selected="selected"';}
			$output.= '>'.$val.'</option>';
		}
		$output.= '</select>';
		echo $output;
	}
	
	function printCheckboxTag($name, $options, $selected=null, $style='display: block;', $id=null) {
		/**
		 * Geotag::printCheckboxTag()
		 * v2.0
		 *
		 * Auxiliary function for the options page. Prints a <input type="checkbox"> tag with the given values.
		 */
		$output = null;
		foreach ($options as $key => $val) {
			$output.= '<span style="'.$style.'"><input name="'.$name.'['.$key.']" type="checkbox" value="true" style="margin-right: 5px;"';
			if ($id == true) {
				$output.= ' id="'.$name.'-'.$key.'"';
			} elseif ($id) {
				$output.= ' id="'.$id.'-'.$key.'"';
			}
			$output.= $selected[$key] ? ' checked="checked"' : null;
			$output.= ' />'.$val.'</span>';
		}
		echo $output;
	}
	
	function printRadioTag($name, $options, $selected=null, $style=null, $id=null) {
		/**
		 * Geotag::printRadioTag()
		 * v2.0
		 *
		 * Auxiliary function for the options page. Prints a <input type="radio"> tag with the given values.
		 */
		foreach ($options as $key => $val) {
			$output.= '<input name="'.$name.'" type="radio" value="'.$key.'"';
			$output.= $style ? ' syle="'.$style.'"' : null;
			if ($id === true) {
				$output.= ' id="'.$name.'"';
			} elseif ($id) {
				$output.= ' id="'.$id.'"';
			}
			$output.= $selected == $key ? ' checked="checked"' : null;
			$output.= ' />'.$val.'<br />';
		}
		echo $output;
	}
	
	
	/* ==================================================================== */
	/* = Media Upload                                                     = */
	/* ==================================================================== */
	
	/**
	 * Hooks, Filters
	 */
	
	function filterUploadTabs($tabs) {
		/**
		 * Geotag::filterUploadTabs()
		 * v2.0
		 *
		 * Adds the kml file upload tab to the mdia upload window.
		 */
		$newtab = array('geotag' => 'KML/KMZ files');
		return array_merge($tabs, $newtab);
	}
	
	function hookUploadTab() {
		/**
		 * Geotag::hookUploadTab()
		 * v2.0
		 *
		 */
		return wp_iframe(array('Geotag','mediaTab'));
	}
	
	
	/**
	 * Print HTML
	 */
	
	function mediaTab() {
		/**
		 * Geotag::mediaTab()
		 * v2.0
		 *
		 * Prints the kml file upload form for the media upload window. Function name must start with "media".
		 */
		?><style type="text/css" media="all">
			#geotag-uploader div.media-item {padding-top: 5px;}
			#geotag-uploader table.describe th {vertical-align: top;}
		</style><?php
		media_upload_header();
		if (!current_user_can('upload_files')) {wp_die(__('You do not have permission to upload files.'));}
		if (empty($_POST['geotag-action'])) {
			?><form enctype="multipart/form-data" method="post" id="geotag-uploader" action="<?php echo admin_url('media-upload.php?tab='.$_REQUEST['tab'].'&post_id='.$_REQUEST['post_id']); ?>" class="media-upload-form type-form validate" id="file-form">
				<h3 class="media-title">Upload KML/KMZ Files</h3>
				<div id="media-items">
					<div class="media-item">
						<table class="describe">
							<tr>
								<th class="label"><label>Filename</label></th>
								<td><input name="filename" type="file" size="40"style="width: 450px;" /></td>
							</tr>
							<tr>
								<th class="label"><label>Attachment</label></th>
								<td><input name="create_attachment" type="checkbox" value="true" style="margin-right: 5px;" checked="checked" />Register the file as an attachment in the wordpress database</td>
							</tr>
							<tr>
								<th class="label"><label>Title</label></th>
								<td><input name="title" type="text" style="width: 450px;" /></td>
							</tr>
							<tr>
								<th class="label"><label>Description</label></th>
								<td><textarea name="description" style="width: 450px; height: 50px;"></textarea></td>
							</tr>
							<?php if (PHP_MAJOR_VERSION >= 5) { ?>
							<tr>
								<th class="label"><label>GPS-Tracks</label></th>
								<td><input name="process_track" type="checkbox" value="true" style="margin-right: 5px;" onclick="if(jQuery(this).is(':checked')) {jQuery('#geotag-process_track').slideDown();} else {jQuery('#geotag-process_track').slideUp();}" />Convert GPS-Track to a single path</td>
							</tr>
							<tr>
								<th class="label"></th>
								<td class="help">If enabled, the Geotag plugin tries to read the points from a kml file (e.g. from a GPS tracklog) and creates a new kml file with a single path.</td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<?php if (PHP_MAJOR_VERSION >= 5) { ?>
					<div id="geotag-process_track" class="media-item" style="display: none;">
						<h3 class="media-title" style="margin-left: 0.5em;">Convert GPS-Track</h3>
						<table id="basic" class="describe">
							<tr>
								<th class="label"><label>Title and Description</label></th>
								<td><input name="use_title" type="checkbox" value="true" style="margin-right: 5px;" checked="checked" />Save the title and the description in the kml file</td>
							</tr>
							<tr>
								<th class="label"><label>Sensitivity</label></th>
								<td>Distance between two points must be at least <input name="sensitivity" type="text" value="10" style="width: 70px;" /> meters</td>
							</tr>
							<tr>
								<th class="label"><label>Path Color</label></th>
								<td><input name="color" type="text" value="0000FF" class="color" style="width: 70px;" /> RGB</td>
							</tr>
							<tr>
								<th class="label"><label>Path Transparency</label></th>
								<td><input name="transparency" type="text" value="7F" style="width: 70px;" /> 00 to FF</td>
							</tr>
							<tr>
								<th class="label"><label>Path Size</label></th>
								<td><input name="size" type="text" value="5" style="width: 70px;" /> px</td>
							</tr>
						</table>
					</div>
					<?php } ?>
				</div>
				<?php wp_nonce_field('media-form'); ?>
				<input name="geotag-action" type="hidden" value="upload" />
				<p class="ml-submit">
					<input type="submit" name="submit" value="<?php _e('Upload'); ?>" class="button-primary" />
					<input type="button" value="Close" class="button" style="margin-left: 10px;" onclick="try{top.tb_remove();}catch(e){};" />
				</p>
			</form>
			<script type="text/javascript" src="<?php echo content_url('/plugins/geotag/tools/jscolor/jscolor.js') ?>"></script><?php
		} elseif ($_POST['geotag-action'] == 'upload') {
			$upload = Geotag::uploadKMLFile();
			$css_class = $upload['error'] ? 'error' : 'updated';
			?><form enctype="multipart/form-data" method="post" id="geotag-uploader" action="<?php echo admin_url('media-upload.php?tab='.$_REQUEST['tab'].'&post_id='.$_REQUEST['post_id']); ?>" class="media-upload-form type-form validate" id="file-form">
				<h3 class="media-title">Upload KML/KMZ Files</h3>
				<div id="message" class="<?php echo $css_class; ?>" style="width: 613px; margin: 20px 0; padding: 5px;"><?php echo $upload['message']; ?></div>
				<?php
				if (!$upload['error']) { ?>
					<div id="media-items">
						<div class="media-item">
							<table class="describe">
								<tr>
									<th class="label"><label>Filename</label></th>
									<td style="font-size: smaller;"><?php echo $upload['file']; ?></td>
								</tr>
								<tr>
									<th class="label"><label>URI</label></th>
									<td style="font-size: smaller;"><?php echo $upload['uri']; ?></td>
								</tr>
								<tr>
									<th class="label"><label>Title</label></th>
									<td><?php echo $upload['title']; ?></td>
								</tr>
								<tr>
									<th class="label"><label>Description</label></th>
									<td><?php echo $upload['description']; ?></td>
								</tr>
								<tr>
									<th class="label"><label>Preview</label></th>
									<td><a href="http://maps.google.de/maps?q=<?php echo urlencode($upload['uri']); ?>" target="_blank">Preview file in Google Maps</a></td>
								</tr>
							</table>
						</div>
					</div>
				<?php } ?>
				<p class="ml-submit" style="margin: 1em;">
					<input type="button" value="Close" class="button" style="margin-right: 10px;" onclick="try{top.tb_remove();}catch(e){};" />
					<a href="<?php echo admin_url('media-upload.php?tab='.$_REQUEST['tab'].'&post_id='.$_REQUEST['post_id']); ?>" />Upload another file</a>
				</p>
			</form><?php
		}
	}
	
	
	/**
	 * Other
	 */
	
	function uploadKMLFile() {
		/**
		 * Geotag::uploadKMLFile()
		 * v2.0
		 *
		 * Handles the upload of kml/kmz files.
		 */
		if (empty($_FILES['filename'])) {return array('error' => true, 'message' => 'Please select a file.');}
		$upload_dir = wp_upload_dir();
		list($dirname, $filename, $extension) = array_values(pathinfo(realpath($upload_dir['path']).'/'.$_FILES['filename']['name']));
		if (!($extension == 'kml' || $extension == 'kmz')) {return array('error' => true, 'message' => 'Please select a *.kml or *.kmz file.');}
		// Try to find a free filename
		if (file_exists($dirname.'/'.$filename)) {
			$filename = basename($filename, '.'.$extension).date('-ymd_His', current_time('timestamp')).'.'.$extension;
			if (file_exists($dirname.'/'.$filename)) {return array('error' => true, 'message' => 'Filename already exists. Please rename your file nad try again.');}
		}
		$file = $dirname.'/'.$filename;
		// Process the kml file or just copy it to the upload dir
		if ($_REQUEST['process_track'] == 'true'
			&& $extension == 'kml'
			&& PHP_MAJOR_VERSION >= 5) {
			$options = array (
				'name' => ($_POST['use_title'] == 'true') ? $_POST['title'] : null,
				'description' => ($_POST['use_title'] == 'true') ? $_POST['description'] : null,
				'sensitivity' => $_POST['sensitivity'],
				'linestyle_width' => $_POST['size'],
				'linestyle_color' => $_POST['transparency'].substr($_POST['color'], 4, 2).substr($_POST['color'], 2, 2).substr($_POST['color'], 0, 2)
			);
			$kmlfile = Geotag::createKMLFile($_FILES['filename']['tmp_name'], $options);
			if (!kmlfile)  {return array('error' => true, 'message' => 'Sorry, could not modify your kml file.');}
			if (file_put_contents($file, $kmlfile) === false) {return array('error' => true, 'message' => 'Sorry, could not write the modified kml file.');}
		} else {
			if (!copy($_FILES['filename']['tmp_name'], $file))  {return array('error' => true, 'message' => 'Sorry, could not copy the file to your upload directory.');}
		}
		// Create the attachment
		if ($_POST['create_attachment'] == 'true') {
			$filetype = wp_check_filetype($file, null);
			$attachment = array(
				'post_mime_type' => $filetype['type'],
				'post_title' => (!empty($_POST['title'])) ? $_POST['title'] : basename($filename, '.'.$extension),
				'post_content' => $_POST['description'],
				'post_status' => 'inherit'
			);
			$attachment_id = wp_insert_attachment($attachment, str_replace(realpath($upload_dir['basedir']), $upload_dir['basedir'], $file), intval($_REQUEST['post_id']));
		}
		return array(
			'error' => false, 
			'message' => 'Successfuly uploaded.', 
			'file' => $file, 
			'uri' => $upload_dir['url'].'/'.$filename, 
			'attachment' => ($_POST['create_attachment'] == 'true') ? true : false,
			'title' => $_POST['title'],
			'description' => $_POST['description']);
	}
	
	function createKMLFile($file, $options=null) {
		/**
		 * Geotag::createKMLFile()
		 * v2.0
		 *
		 * Takes the points from a kml file and creates a single path.
		 */
		if (!(PHP_MAJOR_VERSION >= 5)) {return false;}
		$tracklog = DOMDocument::load($file);
		$placemarks = $tracklog->getElementsByTagName('Placemark');
		$i = 0;
		foreach ($placemarks as $placemark) {
			$point = $placemark->getElementsByTagName('Point')->item(0);
			if (!is_null($point)) {
				// Read coordinates
				$tmp = $point->getElementsByTagName('coordinates')->item(0)->nodeValue;
				list($coordinates[$i]['lon'], $coordinates[$i]['lat']) = explode(',', ltrim($tmp, '\n'));
				$i++;
			}
		}
		$kml[] = '<?xml version="1.0" encoding="UTF-8"?>';
		$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2">';
		$kml[] = '	<Document>';
		$kml[] = '	<Style id="path">';
		$kml[] = '		<LineStyle>';
		$kml[] = '			<width>'.$options['linestyle_width'].'</width>';
		$kml[] = '			<color>'.$options['linestyle_color'].'</color>';
		$kml[] = '		</LineStyle>';
		$kml[] = '	</Style>';
		$kml[] = '	<Placemark>';
		$kml[] = '		<name>'.$options['name'].'</name>';
		$kml[] = '		<description>'.$options['description'].'</description>';
		$kml[] = '		<styleUrl>#path</styleUrl>';
		$kml[] = '		<LineString>';
		$kml[] = '			<tessellate>1</tessellate>';
		$kml[] = '			<altitudeMode>clampToGround</altitudeMode>';
		$kml[] = '			<coordinates>';
		if ($coordinates) {
			foreach ($coordinates as $coordinate) {
				if ((sqrt(pow(($coordinate['lat'] - $last_coordinate['lat']) * 71.44, 2) + pow(($coordinate['lon'] - $last_coordinate['lon']) * 111.13, 2))) > $options['sensitivity'] / 1000) {
					$kml[] = $coordinate['lon'].','.$coordinate['lat'];
				}
				$last_coordinate['lat'] = $coordinate['lat'];
				$last_coordinate['lon'] = $coordinate['lon'];
			}
		}
		$kml[] = '			</coordinates>';
		$kml[] = '		</LineString>';
		$kml[] = '	</Placemark>';
		$kml[] = '	</Document>';
		$kml[] = '</kml>';
		return join("\n", $kml);
	}
	
	
	/* ==================================================================== */
	/* = Display the posts                                                = */
	/* ==================================================================== */
	
	/**
	 * Hooks, Shortcode, Filter
	 */
	
	function filterTheContent($content=null) {
		/**
		 * Geotag::filterTheContent()
		 * v2.0
		 *
		 * Filters the content of a post and adds a automatic map at the beginning
		 * or at the end, if this feature is turned on.
		 */
		global $geotag_options;
		if (!Geotag::getDisplayMap()
			|| !$geotag_options['auto_map']['enable']) {return $content;}
		/**
		 * Get the position of the post
		 */
		list($lat, $lon) = Geotag::getCoordinates();
		if (!is_null($lat) && !is_null($lon)) {
			$map['markers']['posts'][0] = $map['center'] = array('lat' => $lat, 'lon' => $lon);
		} else {
			return $content;
		}
		/**
		 * Create the dynamic or static map container
		 */
		if ($geotag_options['staticmap']) {
			$container = Geotag::createStaticMap($map);
		} else {
			$map['map_id'] = 0;
			$container = Geotag::createDynamicMap($map);
		}
		/**
		 * Add the map container to the page
		 */
		switch ($geotag_options["auto_map"]["position"]) {
		case "top":
			return $container.$content;
		break;
		case "bottom":
			return $content.$container;
		break;
		}
	}
	
	function parseShortcode ($atts, $content=null) {
		/**
		 * Geotag::parseShortcode()
		 * v2.0
		 *
		 * Parses the [gmap]-sortcode and its values. Based upon the manually set values
		 * this function creates an array which stores the corresponding settings. 
		 * Later, these settings will be merged with the default options.
		 */
		global $geotag_options, $post;
		$coordinates = Geotag::getCoordinates();
		$default_atts = array(
			/** Properties **/
			'lat' => false,
			'lon' => false,
			'livepost' => false,
			'visible' => false,
			/** Appearance **/
			'width' => false,
			'height' => false,
			'type' => false,
			'static' => false,
			'control' => false,
			'zoom' => false,
			'center_lat' => false,
			'center_lon' => false,
			'center' => false,
			'marker_lat' => false,
			'marker_lon' => false,
			'marker_query' => false,
			'marker_icon' => false,
			'photo' => false,
			'photo_icon' => false,
			'file' => false,
			/** Deprecated **/
			'display_photos' => false
		);
		$atts = shortcode_atts($default_atts, $atts);
		/**
		 * Store the given coordinates for this post, if no position was set yet.
		 * Store whether the current post is live from the field.
		 */
		if ($atts['lat'] && $atts['lon'] && is_null($coordinates)) {Geotag::putCoordinates($atts['lat'], $atts['lon'], $post->ID);}
		if ($atts['livepost']) {Geotag::putPostmeta('livepost', '1', $post->ID);}
		/**
		 * Check whether the map should be displayed
		 */
		if (strtolower($atts['visible']) == 'true') {
			$map['visible'] = true;
		} elseif (strtolower($atts['visible']) == 'false' || !Geotag::getDisplayMap()) {
			return $content;
		}
		/**
		 * Handle the dimensions
		 */
		if ($atts['width']) {$map['width'] = $atts['width'];}
		if ($atts['height']) {$map['height'] = $atts['height'];}
		/**
		 * Handle the maptype
		 */
		if ($atts['type']) {
			$atts['type'] = strtolower(str_replace(array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_PHYSICAL_MAP', 'G_STATIC_MAP'), array('ROADMAP', 'SATELLITE', 'HYBRID', 'TERRAIN', 'STATIC'), $atts['type']));
			if ($atts['type'] == 'static') {
				$map['staticmap'] = true;
			} else {
				$map['maptype'] = $atts['type'];
			}
		}
		if (strtolower($atts['static']) == 'true') {
			$map['staticmap'] = true;
		} elseif (strtolower($atts['static']) == 'false') {
			$map['staticmap'] = false;
		}
		/**
		 * Handle the zoom level
		 */
		if (strtolower($atts['zoom']) == 'auto') {
			$map['zoom']['autozoom'] = true;
		} elseif (is_numeric($atts['zoom'])) {
			$map['zoom']['level'] = $atts['zoom'];
			$map['zoom']['autozoom'] = false;
		}
		/**
		 * Handle the center of the map
		 */
		if ($atts['center_lat'] && $atts['center_lon']) {
			$map['center']['on_markers'] = false;
			$map['center']['on_photos'] = false;
			$map['center']['on_kmlfiles'] = false;
			list($map['center']['lat'], $map['center']['lon']) = Geotag::getValidatedCoordinates($atts['center_lat'], $atts['center_lon']);
		} elseif ($atts['center']) {
			$map['center']['on_markers'] = false;
			$map['center']['on_photos'] = false;
			$map['center']['on_kmlfiles'] = false;
			$center = explode(',', $atts['center']);
			foreach ($center as $val) {
				switch (strtolower($val)) {
				case 'markers':
				case 'marker':
				case 'posts':
				case 'post':
					$map['center']['on_markers'] = true;
				break;
				case 'photos':
				case 'photo':
					$map['center']['on_photos'] = true;
				break;
				case 'files':
				case 'file':
				case 'kml':
				case 'kmlfiles':
					$map['center']['on_kmlfiles'] = true;
				break;
				}
			}
		}
		/**
		 * Handle the map controls
		 */
		if ($atts['control'] !== false) {
			$map['maptypecontrol'] = array (
				'enable' => false,
				'roadmap' => false,
				'satellite' => false,
				'hybrid' => false,
				'terrain' => false,
			);
			$map['navigationcontrol']['enable'] = false;
			$map['streetviewcontrol']['enable'] = false;
			$map['scalecontrol']['enable'] = false;
		}
		if (strtolower($atts['control']) != 'false') {
			$controls = explode(',', $atts['control']);
			foreach ($controls as $val) {
				switch (strtolower($val)) {
				case 'roadmap':
					$map['maptypecontrol']['enable'] = true;
					$map['maptypecontrol']['roadmap'] = true;
				break;
				case 'satellite':
					$map['maptypecontrol']['enable'] = true;
					$map['maptypecontrol']['satellite'] = true;
				break;
				case 'hybrid':
					$map['maptypecontrol']['enable'] = true;
					$map['maptypecontrol']['hybrid'] = true;
				break;
				case 'terrain':
					$map['maptypecontrol']['enable'] = true;
					$map['maptypecontrol']['terrain'] = true;
				break;
				case 'navigation':
					$map['navigationcontrol']['enable'] = true;
				break;
				case 'streetview':
					$map['streetviewcontrol']['enable'] = true;
				break;
				case 'scale':
					$map['scalecontrol']['enable'] = true;
				break;
				}
			}
		}
		/**
		 * Check whether to read exif tags
		 */
		if (strtolower($atts['display_photos']) == 'true' || strtolower($atts['photo']) == 'true') {
			$map['readexiftags'] = true;
		} elseif (strtolower($atts['display_photos']) == 'false' || strtolower($atts['photo']) == 'false') {
			$map['readexiftags'] = false;
		}
		/**
		 * Handle the markers
		 */
		if ($atts['marker_query']) {
			$posts = get_posts(str_replace('&#038;', '&', $atts['marker_query']));
			// Get post coordinates
			foreach ($posts as $val) {
				list($lat, $lon) = Geotag::getCoordinates($val->ID);
				if (!is_null($lat) && !is_null($lon)) {$map['markers']['posts'][] = array('lat' => $lat, 'lon' => $lon, 'uri' => $val->guid, 'title' => $val->post_title, 'date' => date(get_option('date_format'), strtotime($val->post_date)), 'infowindow' => true);}
			}
			// Get photo coordinates
			if (Geotag::getOptions($geotag_options['readexiftags'], $map['readexiftags'])) {
				$tmp = Geotag::getGeotagsFromPhotos($posts);
				if ($tmp) {$map['markers']['photos'] = $tmp;}
			}
		} else {
			// Get post coordinates
			if ($atts['marker_lat'] && $atts['marker_lon']) {
				list($lat, $lon) = Geotag::getValidatedCoordinates($atts['marker_lat'], $atts['marker_lon']);
			} else {
				list($lat, $lon) = $coordinates;
			}
			if (!is_null($lat) && !is_null($lon)) {$map['markers']['posts'][] = array('lat' => $lat, 'lon' => $lon, 'title' => $post->post_title, 'infowindow' => false);}
			// Get photo coordinates
			if (Geotag::getOptions($geotag_options['readexiftags'], $map['readexiftags'])) {
				$tmp = Geotag::getGeotagsFromPhotos();
				if ($tmp) {$map['markers']['photos'] = $tmp;}
			}
		}
		// Set the marker icons
		if($atts['marker_icon']) {
			$map['overlays_markers']['style'] = 'individual';
			$map['overlays_markers']['icon_uri'] = $atts['marker_icon'];
		}
		if(strtolower($atts['photo_icon']) == 'thumbnail') {
			$map['overlays_markers']['style'] = 'thumbnail';
		} elseif ($atts['photo_icon']) {
			$map['overlays_photos']['style'] = 'individual';
			$map['overlays_photos']['icon_uri'] = $atts['photo_icon'];
		}
		/**
		 * Handle the KML-file
		 */
		if ($atts['file']) {
			$upload_dir = wp_upload_dir();
			if (!empty($upload_dir['baseurl'])) {
				$map['file'] = str_replace('__UPLOAD__', $upload_dir['baseurl'], $atts['file']);
			} else {
				$map['file'] = str_replace('__UPLOAD__', get_option('siteurl').'/'.get_option('upload_path'), $atts['file']);
			}
		}
		/**
		 * Finally, create the dynamic or static map
		 */
		$maptype = Geotag::getOptions($geotag_options['staticmap'], $map['staticmap']);
		if ($maptype) {
			return Geotag::createStaticMap($map);
		} else {
			return Geotag::createDynamicMap($map);
		}
	}
	
	function hookWPHeader() {
		/**
		 * Geotag::hookWPHeader()
		 * v2.0
		 *
		 * Creates the header of a HTML file, especially adds a geotag.
		 */
		global $geotag_options;
		if ($geotag_options['geotag']['posts']) {
			$coordinates = Geotag::getCoordinates();
			if ($coordinates) {
				list($lat, $lon) = $coordinates;
				echo '<meta name="geo.position" content="'.$lat.';'.$lon.'" />
					<meta name="ICBM" content="'.$lat.', '.$lon.'" />';
			}
		}
	}
	
	function hookWPFooter () {
		/**
		 * Geotag::hookWPFooter()
		 * v2.0
		 *
		 * Creates the footer, especially converts the $geotag_maps array to JSON and prints the
		 * JavaScript objects.
		 */
		?><!-- This page uses Geotag by Boris Pulyer to provide geocoding features for Wordpress - see http://www.bobsp.de/weblog/geotag/ for details --><?php
		global $geotag_options, $geotag_maps;
		if (empty($geotag_maps)) {return;}
		$maps = $geotag_maps;
		unset($maps['options']);
		/**
		 * Add the JavaScript code to the footer.
		 */
		Geotag::printJSObjects($geotag_maps['options']['markermanager']);
		?><script type="text/javascript">
			var gmap = new GMap3();
			gmap.init(<?php echo Geotag::getJSONData($maps) ?>);
			var gmap_no_init = <?php echo Geotag::getJSONData($maps, false) ?>;
		</script><?php
		/**
		 * Add debuggin info if requested.
		 */
		if ($geotag_options['debugging']) {
			echo "\n\n<!--\n";
			?>
				/* ==================================================================== */
				/* = Geotag Debugging Information                                     = */
				/* ==================================================================== */
			<?php
			var_dump($geotag_options);
			var_dump($geotag_maps);
			
			echo "\n-->\n\n";
		}
	}
	
	
	/**
	 * Other
	 */
	
	function createDynamicMap(&$map=array()) {
		/**
		 * Geotag::createDynamicMap()
		 * v2.0
		 *
		 * Creates the data for a dynamic map which is stored in global $geotag_maps
		 * and later passed on to the JavaScript module.
		 * Returns a <div>-container for the map if we are not dealing with an auto map.
		 */
		global $geotag_options, $geotag_maps, $post;
		/**
		 * Merge the default options with the individual settings and assign to global $geotag_maps
		 */
		$options = array ('width', 'height', 'center', 'zoom', 'maptype', 'maptypecontrol', 'navigationcontrol', 'streetviewcontrol', 'scalecontrol', 'merge_markers', 'markermanager', 'overlays_markers', 'overlays_photos', 'init_on_pageload');
		foreach ($options as $label) {
			$presets[$label] = !is_null($geotag_options[$label]) ? $geotag_options[$label] : false;
			$settings[$label] = $map[$label];
		}
		$tmp = Geotag::getOptions($presets, $settings);
		/**
		 * Add the post id and map id to global $geotag_maps
		 */
		$tmp['post_id'] = !is_null($map['post_id']) ? $map['post_id'] : $post->ID;
		if (!is_null($map['map_id'])) {
			$tmp['map_id'] = $map['map_id'];
		} else {
			$geotag_maps['options']['count'][$tmp['post_id']]++;
			$tmp['map_id'] = $geotag_maps['options']['count'][$tmp['post_id']] - 1;
		}
		/**
		 * Add the markers to global $geotag_maps
		 */
		if ($map['markers']) {
			$tmp['markers'] = $map['markers'];
		}
		/**
		 * Check if we use the MarkerManager
		 */
		if ($tmp['markermanager']['enable']
			&& (count($tmp['markers']['posts']) + count($tmp['markers']['photos'])) > $tmp['markermanager']['amount']) {
			Geotag::getMarkerManagerZoomLevels($tmp['markers']['posts'], $tmp['markermanager']['zoomlevel'], $tmp['markermanager']['distance']);
			Geotag::getMarkerManagerZoomLevels($tmp['markers']['photos'], $tmp['markermanager']['zoomlevel'], $tmp['markermanager']['distance']);
			$tmp['markermanager'] = $geotag_maps['options']['markermanager'] = true;
		} else {
			$tmp['markermanager'] = false;
		}
		/**
		 * Add the kml file to global $geotag_maps
		 */
		if ($map['file']) {
			$tmp['file'] = $map['file'];
		}
		/**
		 * Add the settings to the global $geotag_map
		 * and create a <div>-container for the map, if necessary
		 */
		if ($geotag_maps) {
			foreach($geotag_maps as $key => $val) {
				if ($val['post_id'] == $tmp['post_id']
					&& $val['map_id'] == $tmp['map_id']) {
					$geotag_maps[$key] = $tmp;
					return null;
				}
			}
		}
		$geotag_maps[] = $tmp;
		return '<div id="gmap_'.$tmp['post_id'].'_'.$tmp['map_id'].'" class="gmap dynamic" style="width:'.$tmp['width'].'; height:'.$tmp['height'].';">'.$content.'</div>';
	}
	
	function createStaticMap(&$map=array()) {
		/**
		 * Geotag::createStaticMap()
		 * v2.0
		 *
		 * Creates the URI for the static map and returns the <img>-tag.
		 */
		global $geotag_options;
		/**
		 * Merge the default options with the individual settings
		 */
		$options = array ('width', 'height', 'center', 'zoom', 'maptype', 'readexiftags', 'merge_markers');
		foreach ($options as $label) {
			$presets[$label] = !is_null($geotag_options[$label]) ? $geotag_options[$label] : false;
			$settings[$label] = $map[$label];
		}
		$tmp = Geotag::getOptions($presets, $settings);
		/**
		 * Add the post markers
		 */
		$tmp['markers']['posts'] = $map['markers']['posts'];
		/**
		 * Add the photo markers
		 */
		$tmp['markers']['photos'] = $map['markers']['photos'];
		/**
		 * Create the URI and return an <img>-tag
		 */
		// Dimensions
		$parameter[] = 'size='.rtrim($tmp['width'], '%px').'x'.rtrim($tmp['height'], '%px');
		// Maptype
		$parameter[] = 'maptype='.strtolower($tmp['maptype']);
		// Zoomlevel
		if (!($tmp['zoom']['autozoom'] && count($tmp['markers']) > 1)) {
			$parameter[] = 'zoom='.$tmp['zoom']['level'];
		}
		// Center
		if (!$tmp['center']['on_markers'] && !$tmp['center']['on_photos']) {
			$parameter[] = 'center='.$tmp['center']['lat'].','.$tmp['center']['lon'];
		}
		// Post markers
		if ($tmp['markers']['posts']) {
			$tmp_parameter = 'markers=';
			foreach ($tmp['markers']['posts'] as $i => $marker) {
				if ($tmp['merge_markers']['enable']) {
					for ($j=0; $j<$i; $j++) {
						if (!empty($tmp['markers']['posts'][$j])
							&& sqrt(pow(($tmp['markers']['posts'][$j]['lat'] - $marker['lat']) * 71.44, 2) + pow(($tmp['markers']['posts'][$j]['lon'] - $marker['lon']) * 111.13, 2)) <= ($tmp['merge_markers']['distance']/1000)) {
							continue 2;
						}
					}
				}
				$tmp_parameter.= '|'.$marker['lat'].','.$marker['lon'];
			}
			$parameter[] = $tmp_parameter;
		}
		// Photo markers
		if ($tmp['markers']['photos']) {
			$tmp_parameter = 'markers=color:blue|label:P|size:mid';
			foreach ($tmp['markers']['photos'] as $i => $marker) {
				if ($tmp['merge_markers']['enable']) {
					for ($j=0; $j<$i; $j++) {
						if (!empty($tmp['markers']['photos'][$j])
							&& sqrt(pow(($tmp['markers']['photos'][$j]['lat'] - $marker['lat']) * 71.44, 2) + pow(($tmp['markers']['photos'][$j]['lon'] - $marker['lon']) * 111.13, 2)) <= ($tmp['merge_markers']['distance']/1000)) {
							continue 2;
						}
					}
				}
				$tmp_parameter.= '|'.$marker['lat'].','.$marker['lon'];
			}
			$parameter[] = $tmp_parameter;
		}
		// Create the <img>-tag
		$parameter = implode('&', $parameter);
		return '<img class="gmap static" src="http://maps.google.com/maps/api/staticmap?sensor=false&'.$parameter.'" titel="" />';
	}
	
	function getGeotagsFromPhotos($posts=null) {
		/**
		 * Geotag::getGeotagsFromPhotos()
		 * v2.0
		 *
		 * Identifies all images in the given or current post and tries to get read the coordinates
		 * from the exif header
		 */
		if (is_null($posts)) {
			global $post;
			$posts[0] = $post;
		}
		$geotags = array();
		foreach ($posts as $val) {
			preg_match_all('/<img[^>]+src=[\'"]*([^\'" ]*)[\'" ][^>]*>/i', $val->post_content, $result); 
			foreach ($result[1] as $id => $image_uri) {
				$image_abs = rtrim($_SERVER['DOCUMENT_ROOT'], '/').parse_url($image_uri, PHP_URL_PATH);
				$path_parts = pathinfo($image_abs);
				$file_type = strtolower($path_parts['extension']);
				if (!file_exists($image_abs)
					|| ($file_type != 'jpg' 
						&& $file_type != 'jpeg'
						&& $file_type != 'tif'
						&& $file_type != 'tiff')) {continue;}
				preg_match('/title=[\'"]*([^\'" ]*)[\'" ]/i', $result[0][$id], $result2);
				$title = $result2[1];
				$exif = exif_read_data($image_abs, 0, true);
				if (!empty($exif['GPS'])) {
					$raw_coordinates = array($exif['GPS']['GPSLatitude'], $exif['GPS']['GPSLongitude']);
					$raw_references = array($exif['GPS']['GPSLatitudeRef'], $exif['GPS']['GPSLongitudeRef']);
					$coordinates = array();
					foreach ($raw_coordinates as $i => $raw_coordinate) {
						for ($j=0; $j<=2; $j++) {
							list($num, $dec) = explode('/', $raw_coordinate[$j]);
							$coordinates[$i] = $coordinates[$i] + ($num/$dec/pow(60, $j));
						}
						if ($raw_references[$i] == 'S' || $raw_references[$i] == 'W') {$coordinates[$i] = -$coordinates[$i];}
					}
					if ($title) {
						$geotags[] = array('lat' => $coordinates[0], 'lon' => $coordinates[1], 'uri' => $val->guid, 'image' => $image_uri, 'infowindow' => true);
					} else {
						$geotags[] = array('lat' => $coordinates[0], 'lon' => $coordinates[1], 'uri' => $val->guid, 'image' => $image_uri, 'title' => $title, 'infowindow' => true);
					}
				}
			}
		}
		if (empty($geotags)) {return null;} else {return $geotags;}
	}
	
	function printJSObjects($marker_manager=false) {
		/**
		 * Geotag::printJSObjects()
		 * v2.0
		 *
		 * Prints the Google Maps API and the GMap3 class which 
		 * integrates all JavaScript functions.
		 */
		?><script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<?php if ($marker_manager) {?><script src="http://google-maps-utility-library-v3.googlecode.com/svn/tags/markermanager/1.0/src/markermanager.js" type="text/javascript"></script><?php } ?>
		<script type="text/javascript">
			(function(window) {
				var GMap3 = function() {};
				GMap3.prototype = {
					obj: [],
					init: function(json) {
						for (var i in json) {
							var obj = {
									map: new google.maps.Map(document.getElementById(json[i].selector), json[i].mapOptions),
									infoWindow: new google.maps.InfoWindow(),
									viewport: new google.maps.LatLngBounds(),
									markers: [],
									kmlLayer: {}
								},
								self = this;
							if (json[i].options.markerMgr) {
								obj.markerMgr = new MarkerManager(obj.map);
								obj.markerMgr.i = i;
								google.maps.event.addListenerOnce(obj.markerMgr, 'loaded', function() {
									var i = this.i;
									for (var j in json[i].markers) {
										var marker = self.createMarker(json[i].markers[j], self.obj[i].infoWindow);
										self.obj[i].markerMgr.addMarker(marker, json[i].markers[j].zoomlevel);
										if (json[i].markers[j].autocenter) {self.changeViewport(self.obj[i].viewport, json[i].markers[j].markerOptions.position);}
										self.obj[i].markers.push(marker);
									}
									self.changeViewport(self.obj[i].viewport, null, {map: self.obj[i].map, zoom: json[i].options.autoZoom});
									google.maps.event.trigger(self.obj[i].map, 'zoom_changed');
								});
							} else {
								for (var j in json[i].markers) {
									json[i].markers[j].markerOptions.map = obj.map;
									obj.markers.push(this.createMarker(json[i].markers[j], obj.infoWindow));
									if (json[i].markers[j].autocenter) {self.changeViewport(obj.viewport, json[i].markers[j].markerOptions.position);}
								}
								self.changeViewport(obj.viewport, null, {map: obj.map, zoom: json[i].options.autoZoom});
							}
							obj.kmlLayer = json[i].kmlLayer.url ? new google.maps.KmlLayer(json[i].kmlLayer.url, {map: obj.map, preserveViewport: true}) : null;
							if (obj.kmlLayer && json[i].kmlLayer.autoCenter) {
								obj.map.i = i;
								google.maps.event.addListenerOnce(obj.map, 'idle', function() {
									var i = this.i;
									self.changeViewport(self.obj[i].viewport, self.obj[i].kmlLayer.getDefaultViewport(), {map: self.obj[i].map, zoom: json[i].options.autoZoom});
								});
							}
							this.obj[i] = obj;
						}
						return true;
					},
					createMarker: function(data, infoWindow) {
						var marker = new google.maps.Marker(data.markerOptions);
						if (data.infoWindow) {
							google.maps.event.addListener(marker, 'click', function() {
								infoWindow.setContent(data.infoWindowContent);
								infoWindow.open(this.map, this);
							});
						}
						return marker;
					},
					changeViewport: function(viewport, newItem, options) {
						if (newItem && newItem.getCenter) {
							viewport = viewport ? viewport.union(newItem) : newItem;
						} else if (newItem && newItem.lat && newItem.lng) {
							viewport = viewport ? viewport.extend(newItem) : new google.maps.LatLngBounds();
						}
						if (options && options.map && !viewport.isEmpty()) {
							if (options.zoom && viewport.toSpan().lat() != 0 && viewport.toSpan().lng() != 0) {
								options.map.fitBounds(viewport);
							} else {
								options.map.setCenter(viewport.getCenter());
							}
						}
						return viewport;
					}
				};
				window.GMap3 = GMap3;
			})(window);
		</script><?php
	}
	
	function getJSONData(&$maps, $init=true) {
		/**
		 * Geotag::()
		 * v2.0
		 *
		 *  
		 */
		foreach ($maps as $map) {
			if (($init && !$map['init_on_pageload'])
				|| (!$init && $map['init_on_pageload'])) {
				continue;
			}
			$json[] = '{
				selector: \'gmap_'.intval($map['post_id']).'_'.intval($map['map_id']).'\',
				mapOptions: {
					zoom: '.intval($map['zoom']['level']).',
					center: new google.maps.LatLng('.floatval($map['center']['lat']).', '.floatval($map['center']['lon']).'),
					mapTypeId: google.maps.MapTypeId[\''.strtoupper($map['maptype']).'\'],
					mapTypeControl: '.Geotag::getIfThenElse($map['maptypecontrol']['enable'], 'true', 'false').',
					mapTypeControlOptions: {
						mapTypeIds: [
							'.Geotag::getIfThenElse($map['maptypecontrol']['roadmap'], 'google.maps.MapTypeId.ROADMAP', 'null').',
							'.Geotag::getIfThenElse($map['maptypecontrol']['satellite'], 'google.maps.MapTypeId.SATELLITE', 'null').',
							'.Geotag::getIfThenElse($map['maptypecontrol']['hybrid'], 'google.maps.MapTypeId.HYBRID', 'null').',
							'.Geotag::getIfThenElse($map['maptypecontrol']['terrain'], 'google.maps.MapTypeId.TERRAIN', 'null').'
						],
						style: google.maps.MapTypeControlStyle[\''.strtoupper($map['maptypecontrol']['style']).'\']
					},
					navigationControl: '.Geotag::getIfThenElse($map['navigationcontrol']['enable'], 'true', 'false').',
					navigationControlOptions: {
						style: google.maps.NavigationControlStyle[\''.strtoupper($map['navigationcontrol']['style']).'\']
					},
					scaleControl: '.Geotag::getIfThenElse($map['scalecontrol']['enable'], 'true', 'false').',
					streetViewControl: '.Geotag::getIfThenElse($map['streetviewcontrol']['enable'], 'true', 'false').'
				},
				markers: [
					'.Geotag::getJSONData_Markers($map).'
				],
				kmlLayer: {
					url: '.Geotag::getIfThenElse($map['file'], '\''.$map['file'].'\'', 'null').',
					autoCenter: '.Geotag::getIfThenElse($map['center']['on_kmlfiles'], 'true', 'false').'
				},
				options: {
					autoZoom: '.Geotag::getIfThenElse($map['zoom']['autozoom'], 'true', 'false').',
					markerMgr: '.Geotag::getIfThenElse($map['markermanager'], 'true', 'false').'
				}
			}';
		}
		$json = !empty($json) ? '['.implode(', ', $json).']' : 'null';
		return str_replace(array("\t", "\n"), array('', ' '), $json);
		return $json;
	}
	
	function getJSONData_Markers(&$map) {
		/**
		 * Geotag::()
		 * v2.0
		 *
		 *  
		 */
		if (empty($map['markers'])) {return null;}
		foreach ($map['markers'] as $type => $markers) {
			if (empty($markers)) {continue;}
			$n = count($markers);
			for ($i=0; $i<$n; $i++) {
				switch ($type) {
				case 'posts':
					$icon_uri = ($map['overlays_markers']['style'] == 'individual') ? '\''.$map['overlays_markers']['icon_uri'].'\'' : 'null';
					$center = $map['center']['on_markers'] ? 'true' : 'false';
					$markers[$i]['content'] = '<div class="gmap_infowindow"><p class="headline"><a href="'.$markers[$i]['uri'].'">'.htmlentities($markers[$i]['title'], ENT_QUOTES, get_option('blog_charset')).'</a></p><p class="date">'.htmlentities($markers[$i]['date'], ENT_QUOTES, get_option('blog_charset')).'</p></div>';
					switch ($map['overlays_markers']['zindex']) {
					case 'posts':
						$zindex=2;
					break;
					case 'photos':
						$zindex=0;
					break;
					default:
						$zindex=1;
					break;
					}
				break;
				case 'photos':
					$icon_uri = ($map['overlays_photos']['style'] == 'individual') ? '\''.$map['overlays_photos']['icon_uri'].'\'' : 'null';
					$icon_uri = ($map['overlays_photos']['style'] == 'thumbnail') ? '\''.get_bloginfo('wpurl').'/wp-content/plugins/geotag/tools/timthumb/timthumb.php?src='.$markers[$i]['image'].'&w='.intval($map['overlays_photos']['thumbnail']['width']).'&h='.intval($map['overlays_photos']['thumbnail']['height']).'&b='.intval($map['overlays_photos']['thumbnail']['border']).Geotag::getIfThenElse($map['overlays_photos']['thumbnail']['border_color'], ','.$map['overlays_photos']['thumbnail']['border_color'], '').Geotag::getIfThenElse($map['overlays_photos']['thumbnail']['sharpen'], '&s=1', '').Geotag::getIfThenElse($map['overlays_photos']['thumbnail']['cropping_mode'], '&zc='.$map['overlays_photos']['thumbnail']['cropping_mode'], '').Geotag::getIfThenElse($map['overlays_photos']['thumbnail']['cropping_align'], '&a='.$map['overlays_photos']['thumbnail']['cropping_align'], '').'\'' : $icon_uri;
					$center = $map['center']['on_photos'] ? 'true' : 'false';
					$markers[$i]['content'] = $map['overlays_photos']['infowindow']['resize'] ? '<div class="gmap_infowindow"><a href="'.$markers[$i]['uri'].'"><img src="'.get_bloginfo('wpurl').'/wp-content/plugins/geotag/tools/timthumb/timthumb.php?src='.$markers[$i]['image'].'&w='.intval($map['overlays_photos']['infowindow']['width']).'&h='.intval($map['overlays_photos']['infowindow']['height']).'&b='.intval($map['overlays_photos']['infowindow']['border']).Geotag::getIfThenElse($map['overlays_photos']['infowindow']['border_color'], ','.$map['overlays_photos']['infowindow']['border_color'], '').Geotag::getIfThenElse($map['overlays_photos']['infowindow']['sharpen'], '&s=1', '').Geotag::getIfThenElse($map['overlays_photos']['infowindow']['cropping_mode'], '&zc='.$map['overlays_photos']['infowindow']['cropping_mode'], '').Geotag::getIfThenElse($map['overlays_photos']['infowindow']['cropping_align'], '&a='.$map['overlays_photos']['infowindow']['cropping_align'], '').'" title="'.$markers[$i]['title'].'"></a></div>' : '<div class="gmap_infowindow"><a href="'.$markers[$i]['uri'].'"><img src="'.$markers[$i]['image'].'" title="'.$markers[$i]['title'].'"></a></div>';
					$zindex=1;
				break;
				}
				// Merge markers
				if ($map['merge_markers']['enable']) {
					for ($j=0; $j<$i; $j++) {
						if (!empty($markers[$j])
							&& sqrt(pow(($markers[$j]['lat'] - $markers[$i]['lat']) * 71.44, 2) + pow(($markers[$j]['lon'] - $markers[$i]['lon']) * 111.13, 2)) <= ($map['merge_markers']['distance']/1000)) {
							$markers[$i]['count'] = $markers[$j]['count'] + 1;
							$markers[$i]['title'] = $map['merge_markers']['title'].' ('.($markers[$i]['count'] + 1).')';
							$markers[$i]['content'] = $markers[$j]['content'].$markers[$i]['content'];
							if ($markers[$i]['zoomlevel'] > $markers[$j]['zoomlevel']) {$markers[$i]['zoomlevel'] = $markers[$j]['zoomlevel'];}
							unset($json[$j], $markers[$j]);
						}
					}
				}
				// Create JSON
				$json[$i] = '{
					markerOptions: {
						position: new google.maps.LatLng('.floatval($markers[$i]['lat']).', '.floatval($markers[$i]['lon']).'),
						icon: '.$icon_uri.',
						title: \''.htmlentities($markers[$i]['title'], ENT_QUOTES, get_option('blog_charset')).'\',
						draggable: '.Geotag::getIfThenElse($markers[$i]['draggable'], 'true', 'false').',
						visible: '.Geotag::getIfThenElse($markers[$i]['visible'] === false, 'false', 'true').',
						zIndex: '.$zindex.'
					},
					infoWindow: '.Geotag::getIfThenElse($markers[$i]['infowindow'], 'true', 'false').',
					infoWindowContent: \''.Geotag::getIfThenElse($markers[$i]['infowindow'], $markers[$i]['content'], null).'\',
					zoomlevel: '.intval($markers[$i]['zoomlevel']).',
					autocenter: '.$center.'
				}';
			}
			$tmp[] = implode(', ', $json);
		}
		if ($tmp) {return implode(', ', $tmp);} else {return null;}
	}
	
	/** deprecated**/ function getJSON($array) {
		/**
		 * Geotag::getJSON()
		 * v2.0 (deprecated)
		 *
		 * Converts an array to JSON. If you have PHP 5.2 or above, 
		 * you may use the json_encode function.
		 * 
		 * NOTE: The strings 'true' and 'false' will be treated as boolean values. Empty values
		 * will be treted as null.
		 *
		 * In Geotag v2.0 this function is not longer used.
		 */
		if (!is_array($array)){return false;}
		$associative = count(array_diff(array_keys($array), array_keys(array_keys($array)))); 
		foreach ($array as $key => $val) {
			if (is_array($val)) {
				$val = Geotag::getJSON($val);
			} elseif (is_numeric($val) || $val == 'true' || $val == 'false') {
				// Don't change anything
			} elseif (is_bool($val)) {
				$val = ($val) ? 'true' : 'false';
			} elseif (is_null($val) || empty($val)) {
				$val = 'null';
			} else {
				$val = '\''.htmlentities($val, ENT_QUOTES, get_option('blog_charset')).'\'';
			}
			$json[] = ($associative) ? $key.':'.$val : $val;
		}
		return ($associative) ? ('{'.implode(', ', $json).'}') : ('['.implode(', ', $json).']');
	}
	
	
	/* ==================================================================== */
	/* = Feeds                                                            = */
	/* ==================================================================== */
	
	function hookFeedNamespace() {
		/**
		 * Geotag::hookFeedNamespace()
		 * v2.0
		 *
		 * Adds the georss namespace to a feed
		 */
		echo 'xmlns:georss="http://www.georss.org/georss"';
	}
	
	function hookFeedItem() {
		/**
		 * Geotag::hookFeedItem()
		 * v2.0
		 *
		 * Adds a georss item to the feed
		 */
		$coordinates = Geotag::getCoordinates();
		if ($coordinates) {
			list ($lat, $lon) = $coordinates;
			echo '<georss:point>'.$lat.' '.$lon.'</georss:point>';
		}
	}
	
	
	/* ==================================================================== */
	/* = Auxiliary functions                                              = */
	/* ==================================================================== */
	
	function getValidatedCoordinates($lat=null, $lon=null) {
		/**
		 * Geotag::getValidatedCoordinates()
		 * v2.0
		 *
		 * Validates the given coordinates and returns them with a decimal fraction.
		 */
		$coordinates = compact('lat', 'lon');
		if ($coordinates) {
			foreach ($coordinates as $key => $val) {
				if (!is_null($val)) {
					$val = str_replace(',', '.', $val);
					list($latlon, $minutes, $seconds) = explode(' ', $val);
					$latlon = floatval($latlon);
					if (is_numeric($seconds)) {$minutes = ($seconds / 60) + $minutes;}
					if (is_numeric($minutes)) {$latlon = ($minutes / 60) + $latlon;}
					if (stripos($val, 's') !== false
						|| stripos($val, 'w') !== false) {$latlon = 0 - $latlon;}
					$result[] = $latlon;
				}
			}
		}
		return $result;
	}
	
	function getCoordinates($post_id=null) {
		/**
		 * Geotag::getCoordinates()
		 * v2.0
		 *
		 * Loads the coordinates of a post.
		 */
		global $geotag_options, $post;
		if (is_null($post_id)) {
			$post_id = $post->ID;
		}
		switch ($geotag_options['wpgeo_compatibility']['database']) {
		case 'false':
			$lat = get_post_meta($post_id, '_geotag_lat', true);
			$lon = get_post_meta($post_id, '_geotag_lon', true);
		break;
		case 'write':
			$lat = get_post_meta($post_id, '_wp_geo_latitude', true);
			$lon = get_post_meta($post_id, '_wp_geo_longitude', true);
		break;
		default:
			$lat = get_post_meta($post_id, '_geotag_lat', true);
			$lon = get_post_meta($post_id, '_geotag_lon', true);
			// Try to get WP Geo meta information
			if (empty($lat)) {$lat = get_post_meta($post_id, '_wp_geo_latitude', true);}
			if (empty($lon)) {$lon = get_post_meta($post_id, '_wp_geo_longitude', true);}
		break;
		}
		if (empty($lat) || empty($lon)) {return null;} else {return array($lat, $lon, $post_id);}
	}
	
	function putCoordinates($lat=null, $lon=null, $post_id=null) {
		/**
		 * Geotag::putCoordinates()
		 * v2.0
		 *
		 * Save the coordinates for the post. Coordinates will always be validated.
		 */
		global $geotag_options, $post;
		if (is_null($post_id)) {
			$post_id = $post->ID;
		}
		if (!is_null($lat) && !is_null($lon)) {
			// Save coordinates
			list($lat, $lon) = Geotag::getValidatedCoordinates($lat, $lon);
			switch ($geotag_options['wpgeo_compatibility']['database']) {
			case 'write':
				add_post_meta($post_id, '_wp_geo_latitude', $lat, true) or update_post_meta($post_id, '_wp_geo_latitude', $lat);
				add_post_meta($post_id, '_wp_geo_longitude', $lon, true) or update_post_meta($post_id, '_wp_geo_longitude', $lon);
			break;
			default:
				add_post_meta($post_id, '_geotag_lat', $lat, true) or update_post_meta($post_id, '_geotag_lat', $lat);
				add_post_meta($post_id, '_geotag_lon', $lon, true) or update_post_meta($post_id, '_geotag_lon', $lon);
			break;
			}
		} else {
			// Delete coordinates
			delete_post_meta($post_id, '_geotag_lat');
			delete_post_meta($post_id, '_geotag_lon');
			if ($geotag_options['wpgeo_compatibility']['database'] == 'write') {
				delete_post_meta($post_id, '_wp_geo_latitude');
				delete_post_meta($post_id, '_wp_geo_latitude');
			}
		}
	}
	
	function getPostmeta($id=null, $post_id=null) {
		/**
		 * Geotag::getPostmeta()
		 * v2.0
		 *
		 * Loads metadata of a post.
		 */
		global $post;
		if (is_null($id)) {return false;}
		if (is_null($post_id)) {
			$post_id = $post->ID;
		}
		return get_post_meta($post_id, '_geotag_'.$id, true);
	}
	
	function putPostmeta($id=null, $value=null, $post_id=null) {
		/**
		 * Geotag::putPostmeta()
		 * v2.0
		 *
		 * Saves metadata for a post.
		 */
		global $post;
		if (is_null($id)) {return false;}
		if (is_null($post_id)) {
			$post_id = $post->ID;
		}
		if (!is_null($value)) {
			// Save metadata
			add_post_meta($post_id, '_geotag_'.$id, $value, true) or update_post_meta($post_id, '_geotag_'.$id, $value);
		} else {
			// Delete metadata
			delete_post_meta($post_id, '_geotag_'.$id);
		}
	}
	
	function getDisplayMap() {
		/**
		 * Geotag::getDisplayMap()
		 * v2.0
		 *
		 * Checks whether a map should be displayed on the current page.
		 */
		global $geotag_options;
		if ((is_home() && $geotag_options['show_map']['home'])
			|| (is_single() && $geotag_options['show_map']['single'])
			|| (is_page() && $geotag_options['show_map']['page']) 
			|| (is_date() && $geotag_options['show_map']['date'])
			|| (is_category() && $geotag_options['show_map']['category'])) {
			return true;
		} else {
			return false;
		}
	}
	
	function getOptions(&$presets=null, &$settings=null) {
		/**
		 * Geotag::getOptions()
		 * v2.0
		 *
		 * Merges the $presets and the $settings arrays.
		 */
		$options = $presets;
		if (!is_null($settings)) {
			if (!is_array($settings)) {return $settings;}
			foreach ($settings as $label => $setting) {
				if (is_array($setting)) {
					$options[$label] = Geotag::getOptions($presets[$label], $setting);
				} else {
					if (!is_null($setting)) {$options[$label] = $setting;}
				}
			}
		}
		return $options;
	}
	
	function getMarkerManagerZoomLevels(&$markers, $zoomlevels, $distances) {
		/**
		 * Geotag::getMarkerManagerZoomLevels()
		 * v2.0
		 *
		 * Calculates a proper zoomlevel for the MarkerManager denpending on a given minimum distance.
		 */
		for ($i=0; $i<count($markers); $i++) {
			$markers[$i]['zoomlevel'] = 0;
			for ($j=0; $j<$i; $j++) {
				$distance = sqrt(pow(($markers[$i]['lat'] - $markers[$j]['lat']) * 71.44, 2) + pow(($markers[$i]['lon'] - $markers[$j]['lon']) * 111.13, 2));
				foreach ($distances as $k => $val) {
					if ($distance >= $val) {
						$markers[$i]['zoomlevel'] = ($markers[$i]['zoomlevel'] > $zoomlevels[$k]) ? $markers[$i]['zoomlevel'] : $zoomlevels[$k];
						break;
					}
				}
			}
		}
	}
	
	function getFiles($dir, $subdirs=true, $type='file', $ext=null, $basedir=null) {
		/**
		 * Geotag::getFiles()
		 * v2.0
		 *
		 * Read the given directory and return the filnames/dirnames as an array
		 */
		$files = array();
		if (!($d = dir($basedir.$dir))) {return false;};
		while (($entry = $d->read()) !== false) {
			$path_parts = pathinfo($d->path.'/'.$entry);
			if ($entry == '.' || $entry == '..') {continue;}
			if (is_dir($d->path.'/'.$entry) && $subdirs) {
				$files = array_merge($files, Geotag::getFiles($dir.'/'.$entry, $subdirs, $type, $ext, $basedir));
			}
			if ((!$ext || $path_parts['extension'] == $ext)
				&& filetype($d->path.'/'.$entry) == $type) {
				$files[] = $dir.'/'.$entry;
			}
		}
		$d->close();
		rsort($files, SORT_STRING);
		return $files;
	}
	
	function getIfThenElse($if, $then=null, $else=null) {
		/**
		 * Geotag::getIfThenElse()
		 * v2.0
		 *
		 */
		return $if ? $then : $else;
	}
	
	
	/* ==================================================================== */
	/* = Functions for the templates                                      = */
	/* ==================================================================== */
	
	/** deprecated**/ function the_coordinates() {
		/**
		 * Geotag::the_coordinates()
		 * v2.0 (deprecated)
		 *
		 * For compatibility reasons with versions < 2.0.
		 */
		Geotag::the_geotag('print_coordinates');
	}
	
	function the_geotag($action=null, $options=null) {
		/**
		 * Geotag::the_geotag()
		 * v2.0
		 *
		 * Function for templates.
		 */
		global $geotag_options, $geotag_maps, $post;
		switch ($action) {
		case 'is_geotaged':
			/**
			 * Returns true if a post is geotaged
			 *
			 * $options: array(
			 *	'post_id' => (number)
			 *	)
			 */
			return is_null(Geotag::getCoordinates($options['post_id'])) ? false : true;
		break;
		case 'is_livepost':
			/**
			 * Returns true if a post was posted live from the field
			 *
			 * $options: array(
			 *	'post_id' => (number)
			 *	)
			 */
			return (Geotag::getPostmeta('livepost', $options['post_id']) == '1') ? true : false;
		break;
		case 'get_postmeta':
			/**
			 * Returns the Geotag meta information for a post
			 *
			 * $options: array(
			 *	'value' => (string)
			 *	'post_id' => (number)
			 *	)
			 */
			return Geotag::getPostmeta($options['value'], $options['post_id']);
		break;
		case 'print_coordinates':
			list ($lat, $lon) = Geotag::getCoordinates($options['post_id']);
			if (!empty($lat) && !empty($lon)) {
				$latitude = floor(abs($lat)).'&deg; ';
				$latitude = $latitude.round((abs($lat) - floor(abs($lat))) * 60, 3).'\' ';
				$latitude = ($lat >= 0) ? $latitude.'N' : $latitude.'S';
				$longitude = floor(abs($lon)).'&deg; ';
				$longitude = $longitude.round((abs($lon) - floor(abs($lon))) * 60, 3).'\' ';
				$longitude =  ($lon >= 0) ? $longitude.'E' : $longitude.'W';
				echo '<a href="http://maps.google.de/maps?ll='.$lat.','.$lon.'&spn=0.01,0.01&t=k&q='.$post->post_title.'@'.$lat.','.$lon.'">'.$latitude.', '.$longitude.'</a>';
			}
		break;
		case 'print_map':
			/**
			 * Creates a map.
			 *
			 * $options: array(
			 *	...
			 *	)
			 */
			if (is_null($options['post_id'])) {$options['post_id'] = 0;}
			/**
			 * Check whether the map should be displayed
			 */
			if ($options['visible'] === true) {
				$map['visible'] = true;
			} elseif ($options['visible'] === false || !Geotag::getDisplayMap()) {
				return null;
			}
			/**
			 * Handle the markers
			 */
			if ($options['marker_query']) {
				$posts = get_posts($options['marker_query']);
				// Get post coordinates
				foreach ($posts as $val) {
					list($lat, $lon) = Geotag::getCoordinates($val->ID);
					if (!is_null($lat) && !is_null($lon)) {$options['markers']['posts'][] = array('lat' => $lat, 'lon' => $lon, 'uri' => $val->guid, 'title' => $val->post_title, 'date' => date(get_option('date_format'), strtotime($val->post_date)), 'infowindow' => true);}
				}
				// Get photo coordinates
				if (Geotag::getOptions($geotag_options['readexiftags'], $options['readexiftags'])) {
					$tmp = Geotag::getGeotagsFromPhotos($posts);
					if ($tmp) {$options['markers']['photos'] = $tmp;}
				}
			}
			/**
			 * Handle the KML-file
			 */
			if ($options['file']) {
				$upload_url_path = get_option('upload_url_path');
				if (!empty($upload_url_path)) {
					$options['file'] = str_replace('__UPLOAD__', $upload_url_path, $options['file']);
				} else {
					$options['file'] = str_replace('__UPLOAD__', get_option('siteurl').'/'.get_option('upload_path'), $options['file']);
				}
			}
			/**
			 * Finally, create the dynamic or static map
			 */
			$maptype = Geotag::getOptions($geotag_options['staticmap'], $options['staticmap']);
			if ($maptype) {
				echo Geotag::createStaticMap($options);
			} else {
				echo Geotag::createDynamicMap($options);
			}
			return true;
		break;
		case 'debug':
			/**
			 * Print some information
			 */
			echo "<pre>";
			echo "\n*******************************************************\n* \$geotag_maps                                        *\n*******************************************************\n\n";
			print_r($geotag_maps);
			echo "\n\n\n*******************************************************\n* \$geotag_options                                     *\n*******************************************************\n\n";
			print_r($geotag_options);
			echo "</pre>";
		break;
		case 'test':
			
		break;
		default:
			/**
			 * No default action.
			 */
			return false;
		break;
		}
	}
}
?>