<?php
/*
Plugin Name: Arrow Maps - Custom Maps for WordPress  
Plugin URI: https://wordpress.org/plugins/ap-google-maps
Description: Add Responsive Google Maps into your Posts, Pages, Contact us or in Widgets
Author: Arrow Plugins
Author URI: https://www.arrowplugins.com
Version: 1.0.9
License: GplV2
Copyright: 2019 Arrow Plugins
*/

/*
Params:
- version - 1.0
- pretty name - Arrow Google Maps for WordPress
- class name - ArrowGoogleMaps
- pligin name - arrow-google-maps
- plugin description - Customizable Google Maps for your site.
- shortcode name - arrowgooglemaps
*/


if (!class_exists('ArrowGoogleMaps')) {
	class ArrowGoogleMaps {
		function __construct() {
			$this->admin_options_name = 'arrow-google-maps-admin-options';
			$this->default_settings = array(
				'title' => 'Untitled Map',
				'shortcode' => 'untitled'

				
			);
			$this->pagename = 'arrow-google-maps';
			$this->new_pagename = 'new_arrow-google-maps';
		}

		function get_admin_options() {
			// delete_option($this->admin_options_name);

			// $options = array(
			// 	array(
			// 		"id" => "123",
			// 		"title" => "the-title",
			// 		"settings" => array(
			// 			"key" => "val"
			// 			"key" => "val"
			// 			"key" => "val"
			// 		)
			// 	),
			// 	array(
			// 		"id" => "123",
			// 		"title" => "the-title",
			// 		"settings" => array(
			// 			"key" => "val"
			// 			"key" => "val"
			// 			"key" => "val"
			// 		)
			// 	),
			// );

			$admin_options = array(
				"instances" => array()
			);

			$loaded_options = get_option($this->admin_options_name);

			if (!empty($loaded_options)) {
				foreach ($loaded_options as $key => $option) {
					$admin_options[$key] = $option;
				}
			}

			// print_r($admin_options);
			// die();



			update_option($this->admin_options_name, $admin_options);
			return $admin_options;
		}
		function init_pages() {
			add_menu_page(
			"Google Maps by Arrow Plugins",
			"Google Maps by Arrow Plugins",
			"manage_options",
			$this->pagename,
			array($this, "print_options_page"),
			'dashicons-location-alt',
			25
		);
	}



	function admin_includes() {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('jquery');
		wp_enqueue_style('thickbox');



		wp_enqueue_style('arrow-google-maps-bootstrap-css', plugins_url('/css/bootstrap.css', __FILE__), false, '1.0', false);
		wp_enqueue_script('arrow-google-maps-bootstrap-js', plugins_url('/js/bootstrap.min.js', __FILE__), false, '1.0', true);

		wp_enqueue_style('arrow-google-maps-admin-css', plugins_url('/css/admin.css', __FILE__), false, '1.0', false);
		wp_enqueue_script('arrow-google-maps-admin-js', plugins_url('/js/admin.js', __FILE__), false, '1.0', true);

		wp_enqueue_script('arrow-google-maps-styles-js', plugins_url('/js/styles.js', __FILE__), false, '1.0', true);

		wp_enqueue_style('arrow-google-maps-editor-css', plugins_url('/css/arrow-google-maps-editor.css', __FILE__), false, '1.0', false);
		wp_enqueue_script('arrow-google-maps-editor-js', plugins_url('/js/arrow-google-maps-editor.js', __FILE__), false, '1.0', true);

		wp_enqueue_style('arrow-google-maps-css', plugins_url('/css/arrow-google-maps.css', __FILE__), false, '1.0', false);
		wp_enqueue_script('arrow-google-maps-js', plugins_url('/js/arrow-google-maps.js', __FILE__), false, '1.0', true);
	}
	function client_includes() {
		wp_enqueue_style('arrow-google-maps-css', plugins_url('/css/arrow-google-maps.css', __FILE__), false, '1.0', false);
		wp_enqueue_script('arrow-google-maps-js', plugins_url('/js/arrow-google-maps.js', __FILE__), false, '1.0', true);
	}
	function call_plugin() {
		$options = $this->get_admin_options();
		$instances = $options['instances'];

		?>
		<script>
		jQuery('.style-preset').click(function(){
        alert('hello');
    });
		;(function ( $, window, document, undefined ) {
			$(document).ready(function() {
jQuery('.style-preset').click(function(){
        alert('hello');
    });
				<?php
				for ($i=0; $i<count($instances); $i++) {
					$id = $instances[$i]['id'];
					$settings = json_encode($instances[$i]['settings']);

					// $settings = preg_replace('/\\\n/', '<br>', $settings);

					$settings = str_replace("\\n", "<br>", $settings);
					$settings = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) { return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE'); }, $settings);
					$settings = stripslashes($settings);

					?>

					$('#uber-google-map-<?php echo $id; ?>').UberGoogleMaps(<?php echo $settings; ?>);

					<?php
				}
				?>

			});
		})( jQuery, window, document );
		</script>
		<style>.uber-google-map img {max-width: none !important;}</style>
		<?php
	}
	function print_options_page() {
		$options = $this->get_admin_options();
		$instances = $options['instances'];



		?>
		<div class="bootstrap-wrap">

			<!--



			MAIN OPTIONS ===========================================================================



		-->

		<div id="main-options-wrap">
			<div class="col-md-12">
				<h1 class="plugin-name" style="    display: inline-block;
    font-size: 25px;
    margin-top: 24px;
    margin-bottom: 25px;">Google Maps by Arrow Plugins</h1>

<p style="display: inline-block;
    float: right;
    font-size: 20px;
    margin-top: 25px;">
    Need help? 
    <a href="https://www.arrowplugins.com/google-map-support/">Click here</a> to get support or see 
    <a href="https://www.arrowplugins.com/google-maps-docs">Documentation </a>
    </p>

				<div id="instances-container">

				</div>

			</div>

		</div>






		<!--
		INSTANCE OPTIONS ===========================================================================
	-->

	<div id="instance-options-wrap">

		<div id="img-folder-url" data-url="<?php echo PLUGINS_URL('/img/', __FILE__); ?>"></div>
		<div id="map-editor-wrap">

		</div>

	</div> <!-- instance-options-wrap -->

	<!--
	FOOTER ===========================================================================
-->

<div class="clear"></div>


<div id="main-footer" class="col-md-12">


	<!--    <hr style="border: 0;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #fafafa;">-->
    <p style="    text-align: center;
    font-size: 14px;
    font-weight: bold;"> 
        Made with &hearts; by <a target="_blank"
                                      href="https://profiles.wordpress.org/arrowplugins#content-plugins">ArrowPlugins</a> <br/>
        
        If you like our plugin please leave us a ★★★★★ rating on  <a target="_blank"
                          href="https://wordpress.org/support/plugin/ap-google-maps/reviews/?rate=5#new-post">WordPress</a>
    </p>
<!-- 	   <hr style="border: 0;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #fafafa;"> -->
    
	</ul>

</div>

<!--
MODALS ===========================================================================
-->

<!-- Modal delete instance -->
<div class="modal fade" id="modal-delete-instance" tabindex="-1" role="dialog" aria-labelledby="modal-delete-instance-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="modal-delete-instance-label">Warning</h4>
			</div>
			<div class="modal-body">
				This action is permanent. Are you sure you want to delete this instance?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" id="button-instance-delete-confirm">Delete</button>
			</div>
		</div>
	</div>
</div>


</div> <!-- bootstrap-wrap -->
<?php

$this->admin_includes();
}
function print_shortcode($atts) {
	$options = $this->get_admin_options();
	$shortcode = $atts["name"];

	foreach ($options["instances"] as $instance) {
		if ($instance["settings"]["shortcode"] == $shortcode) {
			$result = $instance;
		}
	}

	$final = '<div class="uber-google-map" id="uber-google-map-' . $result['id'] . '"></div>';

	$this->client_includes();

	return $final;
}
function shortcodes() {
	$options = $this->get_admin_options();
	add_shortcode("arrowgooglemaps", array($this, "print_shortcode"));
}

// AJAX
function create_instance() {

	$options = $this->get_admin_options();
	$checking = $options['instances'];
	if(count($checking) >= 1 ){die();}
	$new_instance = array(
		"id" => rand(0, 10000),
		"settings" => $this->default_settings
	);

	if (!isset($options["instances"])) {
		$options["instances"] = array();
	}

	array_push($options["instances"], $new_instance);

	// Save
	update_option($this->admin_options_name, $options);

	// return
	echo json_encode($new_instance);

	die();
}
function load_instances() {
	$options = $this->get_admin_options();
	$instances = $options['instances'];
	if (count($instances) > 0) {
		// INSTANCES EXIST
		?>
		<div id="maps-creation"></div>
		<div class="admin-panel-section">
			<table class="table table-hover" id="table-instance-list">
				<thead>
					<tr>
						<!-- <th>ID</th> -->
						<th>Map Title</th>
						<th>Shortcode</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php

					for ($i=0; $i<count($instances); $i++) {
						?>
						<tr>
							<!-- <td><?php // echo $instances[$i]["id"]; ?></td> -->
							<td><?php echo $instances[$i]["settings"]["title"]; ?></td>
							<td>[arrowgooglemaps name="<?php echo $instances[$i]["settings"]["shortcode"]; ?>"]</td>
							<td>
								<button data-instance-id="<?php echo $instances[$i]["id"]; ?>"
									class="btn button-instance-edit">
									<span class="glyphicon glyphicon-edit"></span> Edit
								</button>
							</td>
							<td>
								<button data-instance-id="<?php echo $instances[$i]["id"]; ?>"
									class="btn btn-danger button-instance-delete"
									data-toggle="modal"
									data-target="#modal-delete-instance">
									<span class="glyphicon glyphicon-remove"></span> Delete
								</button>
							</td>
						</tr>
						<?php
					}

					?>
				</tbody>
			</table>

			<?php
		} else {
			// INSTANCES DON'T EXIST => SHOW A HELP TOOLTIP
			?>
			<p class="bg-info">
				<span class="glyphicon glyphicon-info-sign"></span>
				Click the button below to create a new map.
			</p>
			<?php
		}
		?>

		<button class="btn btn-primary" id="button-new-instance"><span class="glyphicon glyphicon-plus"></span> New Map</button>
	</div>
	<div style="padding: 15px;
    background: white;
    display: block;
    margin-top: 18px;
    border: 1px solid #dddddd;">
		<p style="text-align: center;
    font-size: 16px;margin:0;font-weight: bold;    
    color: black;">Only one Map can be created in Free Version, to Create Unlimited number of Maps Please buy <a target="_blank" href="https://www.arrowplugins.com/google-maps">Premium Version</a> with same awesome Features.</p>
	</div>
	<?php

	die();
}
function buyPremium(){
	alert('This feature is locked, Please buy Premium Version');
}
function buyPremium2(){
	alert('This feature is locked, Please buy Premium Version');
	return false;
}
function get_instance_options() {
	$options = $this->get_admin_options();
	$instances = $options['instances'];

	$id = $_POST['id'];

	for ($i=0; $i<count($instances); $i++) {
		if ($instances[$i]['id'] == $id) {
			$instance = $instances[$i];
			break;
		}
	}

	echo json_encode($instance);
	die();
}
function delete_instance() {
	$options = $this->get_admin_options();
	$instances = $options['instances'];

	$id = $_POST['id'];

	for ($i=0; $i<count($instances); $i++) {
		if ($instances[$i]['id'] == $id) {
			if ($i == 0) {
				array_shift($instances);
			} else if ($i == count($instances)) {
				array_pop($instances);
			} else {
				array_splice($instances, $i, 1);
			}

			break;
		}
	}

	// Save
	$options['instances'] = $instances;

	update_option($this->admin_options_name, $options);

	die();
}
function save_instance() {
	$options = $this->get_admin_options();
	$instances = $options['instances'];

	$id = $_POST['id'];
	$settings = $_POST['settings'];

	// // Replace \" with "
	// $settings = str_replace('\\"', '"', $settings);
	//
	// // Replace \' with '
	// $settings = str_replace('\\\'', '\'', $settings);
	//
	// // Replace \\ with \
	// $settings = str_replace('\\\\', '\\', $settings);

	for ($i=0; $i<count($instances); $i++) {
		if ($instances[$i]['id'] == $id) {
			$instances[$i]['settings'] = $settings;

			break;
		}
	}

	$options['instances'] = $instances;
	update_option($this->admin_options_name, $options);

	print_r($settings);
	die();
}
function get_map_editor() {
	// $html_file = file_get_contents(PLUGINS_URL() . '/arrow-google-maps/map_editor.html');
	// $arr = explode('<!-- * -->', $html_file);
	// $html = $arr[1];

	// $html = str_replace('img/', PLUGINS_URL() . '/arrow-google-maps/img/', $html);

	// echo $html;

	?>
	<style type="text/css">
		.premium-google-maps-class{
			margin-top: 10px;
    display: block;
    font-size: 18px;
    margin-bottom: -15px;
    text-align: center;
		}
				.premium-google-maps-class2{
    display: block;
		}
	</style>
	<div class="col-sm-12">
		<h1 class="pull-left">Map Editor</h1>
		<button class="btn btn-lg btn-default pull-left" id="button-back-to-main-options"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
		<button class="btn btn-lg btn-default pull-left" id="button-save-instance"><span class="glyphicon glyphicon-save"></span> Save</button>
		<p class="bg-success pull-left" id="changes-saved-notification"><span class="glyphicon glyphicon-saved"></span> Changes saved.</p>
		<!-- <button class="btn btn-lg btn-default pull-right" id="button-go-fullscreen"><span class="glyphicon glyphicon-fullscreen"></span> Go Fullscreen</button> -->
		<div class="clear"></div>
	</div>

	<div class="col-sm-12">
		<div id="map-container-wrap">
			<div class="marker-editor-mode-controls" id="marker-editor-mode-controls-add-markers">
				<p class="pull-left">
					Left-Click on the map to add a marker. Right-Click a marker to delete it. Drag a marker to move it around.
				</p>
				<button class="btn pull-right" id="button-finish-adding-markers">Done</button>
				<div class="clear">

				</div>
			</div>
			<div class="marker-editor-mode-controls" id="marker-editor-mode-controls-add-info-windows">
				<p class="pull-left">
					Left-Click a marker to attach an info window to it, or Right-Click to remove it.
				</p>
				<button class="btn pull-right" id="button-finish-adding-info-windows">Done</button>
				<div class="clear">

				</div>
			</div>
			<div id="map-container">

			</div>
		</div>
	</div>


	<div class="form-horizontal" id="map-form">


		<!-- ============================================================ -->


		<div class="col-md-4 col-sm-6">
			<div class="map-editor-form-group">
				<h2>1. Map Position</h2>

				<div class="form-group">
					<div class="btn-group btn-group-justified col-sm-12" data-toggle="buttons">
						<label class="btn btn-lg btn-default active">
							<input type="radio" name="options" id="radio-map-position-manual" autocomplete="off" checked>Manual
						</label>
						<label class="btn btn-lg btn-default">
							<input type="radio" name="options" id="radio-map-position-search" autocomplete="off">Search Query
						</label>
					</div>
				</div>

				<div class="form-group">
					<label for="input-zoom" class="col-sm-4 control-label">Zoom</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="input-zoom">
					</div>
				</div>

				<div id="settings-group-position-manual">
					<div class="form-group">
						<label for="input-lat" class="col-sm-4 control-label">Latitude</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="input-lat">
						</div>
					</div>

					<div class="form-group">
						<label for="input-lng" class="col-sm-4 control-label">Longtitude</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="input-lng">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button class="btn btn-default form-control" id="button-sample-position"><span class="glyphicon glyphicon-pushpin"></span> Get Current Position</button>
						</div>
					</div>
				</div>

				<div id="settings-group-position-search-query">
					<div class="form-group">
						<label for="input-search-query" class="col-sm-4 control-label">Search</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="input-search-query">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button class="btn btn-default form-control" id="button-search"><span class="glyphicon glyphicon-search"></span> Search</button>
						</div>
					</div>
				</div>

			</div>
		</div>


		<!-- ============================================================ -->


		<div class="col-md-4 col-sm-6">
			<div class="map-editor-form-group">
				<h2>2. Markers</h2>

				<div class="form-group">
					<div class="col-sm-12">
						<button class="btn btn-lg btn-default btn-block" id="button-add-marker"><span class="glyphicon glyphicon-edit"></span> Edit Markers</button>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" id="checkbox-animate-markers"> Animate markers on map load
							</label>
						</div>
					</div>
				</div>

				<div class="items-list" id="marker-list-container">
					<!-- <div class="list-item">
					<div class="list-item-title pull-left">My Marker</div>
					<span class="glyphicon glyphicon-remove pull-right" id="button-list-item-delete"></span>
					<span class="glyphicon glyphicon-edit pull-right" id="button-list-item-edit"></span>
				</div> -->
			</div>
			<div class="clear"></div>
		</div>
	</div>


	<!-- ============================================================ -->


	<div class="col-md-4 col-sm-6">
		<div class="map-editor-form-group">
			<h2>3. Info Windows</h2>

			<div class="form-group">
				<div class="col-sm-12">
					<button class="btn btn-lg btn-default btn-block" id="button-add-info-window"><span class="glyphicon glyphicon-edit"></span> Edit Info Windows</button>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-4">
					<label for="select-info-windows-open" class="control-label">Show windows on</label>
				</div>
				<div class="col-sm-8">
					<select id="select-info-windows-open" class="form-control">
						<option value="mouseover">
							Mouse Over
						</option>
						<option value="click">
							Click
						</option>
					</select>
				</div>
			</div>

			<div class="items-list" id="window-list-container">
				<!-- <div class="list-item">
				<div class="list-item-title pull-left">My Marker</div>
				<span class="glyphicon glyphicon-remove pull-right" id="button-list-item-delete"></span>
				<span class="glyphicon glyphicon-edit pull-right" id="button-list-item-edit"></span>
			</div> -->
		</div>

		<div class="clear"></div>
	</div>
</div>


<div class="clear"></div>
<!-- ============================================================ -->


<div class="col-md-4 col-sm-6">
	<div class="map-editor-form-group">
		<h2>4. Style</h2>

		<div class="form-group">
			<div class="btn-group btn-group-justified col-sm-12" data-toggle="buttons">
				<label class="btn btn-lg btn-default active">
					<input type="radio" name="options" id="radio-style-default" checked autocomplete="off">Default
				</label>
				<label class="btn btn-lg btn-default">
					<input type="radio" name="options" id="radio-style-preset" autocomplete="off">Preset
				</label>
				<label class="btn btn-lg btn-default">
					<input type="radio" name="options" id="radio-style-custom" autocomplete="off">Custom
				</label>
			</div>
		</div>

		<div id="container-style-default">

		</div>
		<div id="container-style-preset">
			<div class="form-group">
				<div class="col-sm-12">
					<a class="premium-google-maps-class2" target="_blank" href="https://www.arrowplugins.com/google-maps">Included in Premium Version</a>
					<div id="styles-container" style="pointer-events: none;display: block;background: #f1f1f1;height: auto;max-height: 100%;">

					</div>
				</div>
			</div>
		</div>
		<div id="container-style-custom">
			<div class="form-group">
				<label for="textarea-style-array" class="form-label col-sm-4">Style array</label>
				<div class="col-sm-8">
					<textarea id="textarea-style-array" class="form-control" rows="10"></textarea>
					<br />
					<p class="bg-info">
						Visit <a href="https://snazzymaps.com/editor">https://snazzymaps.com/editor</a> to create a custom style array.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ============================================================ -->


<div class="col-md-4 col-sm-6">
	<div class="map-editor-form-group">
		<h2>5. Map Size</h2>

		<div class="form-group">
			<label for="input-width" class="control-label col-sm-4">Width</label>
			<div class="col-sm-8">
				<div class="input-group">
					<input type="text" class="form-control" id="input-width">
					<div class="input-group-addon">px</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input-height" class="control-label col-sm-4">Height</label>
			<div class="col-sm-8">
				<div class="input-group">
					<input type="text" class="form-control" id="input-height">
					<div class="input-group-addon">px</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="checkbox-responsive"> Responsive
					</label>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- ============================================================ -->



<div class="col-md-4 col-sm-6">
	<div class="map-editor-form-group">
		<h2>6. Settings</h2>

		<div class="form-group">
			<label for="input-instance-title" class="control-label col-sm-4">Title</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="input-instance-title">
			</div>
		</div>

		<div class="form-group">
			<label for="input-instance-shortcode" class="control-label col-sm-4">Shortcode</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="input-instance-shortcode">
				<p class="help-block" id="help-block-shortcode">Full shortcode: <br><code>[arrowgooglemaps name="shortcode"]</code></p>
			</div>
		</div>

		<div class="form-group">
			<label for="input-region" class="control-label col-sm-4">Language</label>
			<div class="col-sm-8">
				<select class="form-control" id="select-language"></select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="checkbox-fullscreen-enabled"> Allow fullscreen
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="checkbox-auto-sign-in"> Auto sign-in
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="checkbox-disable-scroll"> Disable Scroll
					</label>
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="checkbox-load-api"> Load Google Maps API
					</label>
				</div>
			</div>
		</div>
	</div>
</div>


</div>

<!-- Modals -->
<div class="modal fade" id="modal-confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Are you sure?</h4>
			</div>
			<!-- <div class="modal-body">
			<p>One fine body&hellip;</p>
		</div> -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal" id="button-confirm-delete">Delete</button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal-edit-marker">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit Marker</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="input-marker-title" class="control-label col-sm-2">Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="input-marker-title">
						</div>
					</div>
					<div class="form-group">
						<label for="input-marker-icon-url" class="control-label col-sm-2">Icon</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="input-marker-icon-url" style="display: none">
							<div class="btn-group btn-group-justified" data-toggle="buttons">
								<label class="btn btn-default active">
									<input type="radio" name="options" id="radio-marker-icon-default" autocomplete="off" checked>Default
								</label>
								<label class="btn btn-default">
									<input type="radio" name="options" id="radio-marker-icon-preset" autocomplete="off">Preset
								</label>
								<label class="btn btn-default">
									<input type="radio" name="options" id="radio-marker-icon-custom" autocomplete="off">Custom
								</label>
							</div>
							<div id="marker-icons-preset" >
								<a class="premium-google-maps-class" target="_blank" href="https://www.arrowplugins.com/google-maps">Preset Marker are included in Premium Version</a>
								<div id="preset-icons-container" style="     pointer-events: none;
    display: block;
    background: #f1f1f1;
    height: 420px;">

								</div>
								<div class="clear"></div>
							</div>
							<div id="marker-icons-custom">
							<a style="text-align: left;" class="premium-google-maps-class" target="_blank" href="https://www.arrowplugins.com/google-maps">Custom Marker Selection is included in Premium Version</a>
								<div id="marker-custom-icon-container" onclick="buyPremium()" style="pointer-events: none;display: block;background: #f1f1f1;">
									<img src="<?php echo plugins_url('/img/icons/66.png',__FILE__);?>" id="">
								</div>
								<div class="clear">

								</div>
								<p class="bg-info pull-left">
									<span class="glyphicon glyphicon-info-sign"></span> Click the image to change it
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-edit-marker">Done</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="modal-edit-window">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit Window</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="input-window-title" class="control-label col-sm-2">Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="input-window-title">
						</div>
					</div>
					<div class="form-group">
						<label for="input-window-subtitle" class="control-label col-sm-2">Subtitle</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="input-window-subtitle">
						</div>
					</div>
					<div class="form-group">
						<label for="input-window-phone" class="control-label col-sm-2">Phone</label>
						<div class="col-sm-10">
							<a class="premium-google-maps-class2" target="_blank" href="https://www.arrowplugins.com/google-maps">Included in Premium Version</a>
							<input type="text" disabled class="form-control" id="input-window-phone" placeholder="+000 000 000 0000">
						</div>
					</div>
					<div class="form-group">
						<label for="input-window-address" class="control-label col-sm-2">Address</label>
						<div class="col-sm-10">
							<a class="premium-google-maps-class2" target="_blank" href="https://www.arrowplugins.com/google-maps">Included in Premium Version</a>
							<input type="text" disabled class="form-control" id="input-window-address" placeholder="John Smith Str. 1, Melbourne">
						</div>
					</div>
					<div class="form-group">
						<label for="input-window-email" class="control-label col-sm-2">E-Mail</label>
						<div class="col-sm-10">
							<a class="premium-google-maps-class2" target="_blank" href="https://www.arrowplugins.com/google-maps">Included in Premium Version</a>
							<input type="text" disabled class="form-control" id="input-window-email" placeholder="john@smith.com">
						</div>
					</div>
					<div class="form-group">
						<label for="input-window-web" class="control-label col-sm-2">Web</label>
						<div class="col-sm-10">
							<a class="premium-google-maps-class2" target="_blank" href="https://www.arrowplugins.com/google-maps">Included in Premium Version</a>
							<input type="text" disabled class="form-control" id="input-window-web" placeholder="johnsmith.com">
						</div>
					</div>
					<div class="form-group">
						<label for="textarea-window-content" class="control-label col-sm-2">Content</label>
						<div class="col-sm-10">
							<a class="premium-google-maps-class2" target="_blank" href="https://www.arrowplugins.com/google-maps">Included in Premium Version</a>
							<textarea disabled class="form-control" id="textarea-window-content" rows="6" placeholder="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<p class="bg-info">
								Leave a field empty to remove it from the window.
							</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<a class="premium-google-maps-class2" target="_blank" href="https://www.arrowplugins.com/google-maps">Included in Premium Version</a>
									<input disabled type="checkbox" id="checkbox-window-open-on-load"> Open window on map load
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-edit-window">Done</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="modal-image-url">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Enter image URL</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="input-modal-image-url" class="control-label col-sm-2">URL</label>
						<div class="col-sm-10">
							<input type="text" id="input-modal-image-url" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-modal-image-url">Done</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php

die();
}
}
}

if (class_exists('ArrowGoogleMaps')) {
	$instance = new ArrowGoogleMaps();
	$instance->shortcodes();
}

add_action('admin_menu', array($instance, 'init_pages'));
add_action('wp_ajax_uber_google_maps_create_instance', array($instance, 'create_instance'));
add_action('wp_ajax_uber_google_maps_load_instances', array($instance, 'load_instances'));
add_action('wp_ajax_uber_google_maps_get_instance_options', array($instance, 'get_instance_options'));
add_action('wp_ajax_uber_google_maps_get_map_editor', array($instance, 'get_map_editor'));
add_action('wp_ajax_uber_google_maps_delete_instance', array($instance, 'delete_instance'));
add_action('wp_ajax_uber_google_maps_save_instance', array($instance, 'save_instance'));

add_action('wp_head', array($instance, 'client_includes'));
add_action('wp_footer', array($instance, 'call_plugin'));

?>
